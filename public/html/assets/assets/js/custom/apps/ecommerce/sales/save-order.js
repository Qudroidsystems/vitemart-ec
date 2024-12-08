"use strict";

// Class definition
var KTAppEcommerceSalesSaveOrder = function () {
    // Shared variables
    var table;
    var datatable;

    // Private functions
    const initSaveOrder = () => {
        // Init flatpickr
        $('#kt_ecommerce_edit_order_date').flatpickr({
            altInput: true,
            altFormat: "d F, Y",
            dateFormat: "Y-m-d",
        });

        // Init select2 country options
        // Format options
        const optionFormat = (item) => {
            if ( !item.id ) {
                return item.text;
            }

            var span = document.createElement('span');
            var template = '';

            template += '<img src="' + item.element.getAttribute('data-kt-select2-country') + '" class="rounded-circle h-20px me-2" alt="image"/>';
            template += item.text;

            span.innerHTML = template;

            return $(span);
        }

        // Init Select2 --- more info: https://select2.org/
        $('#kt_ecommerce_edit_order_billing_country').select2({
            placeholder: "Select a country",
            minimumResultsForSearch: Infinity,
            templateSelection: optionFormat,
            templateResult: optionFormat
        });

        $('#kt_ecommerce_edit_order_shipping_country').select2({
            placeholder: "Select a country",
            minimumResultsForSearch: Infinity,
            templateSelection: optionFormat,
            templateResult: optionFormat
        });

        // Init datatable --- more info on datatables: https://datatables.net/manual/
        table = document.querySelector('#kt_ecommerce_edit_order_product_table-ajax');
        datatable = $(table).DataTable({
            'order': [],
            "scrollY": "400px",
            "scrollCollapse": true,
            "paging": false,
            "info": false,
            'columnDefs': [
                { orderable: false, targets: 0 }, // Disable ordering on column 0 (checkbox)
            ]
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-ecommerce-edit-order-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    // Handle shipping form
    const handleShippingForm = () => {
        // Select elements
        const element = document.getElementById('kt_ecommerce_edit_order_shipping_form');
        const checkbox = document.getElementById('same_as_billing');

        // Show/hide shipping form
        checkbox.addEventListener('change', e => {
            if (e.target.checked) {
                element.classList.add('d-none');
            } else {
                element.classList.remove('d-none');
            }
        });
    }



    document.addEventListener('DOMContentLoaded', function () {
        // Utility Functions
        const formatMoney = (amount) => {
            const number = parseFloat(amount);
            if (isNaN(number)) return '₦0.00';
            return '₦' + number.toLocaleString('en-NG', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        };

        const generateOrderId = () => 'ORD-' + new Date().getTime();

                // DOM Elements
                const printBillsButton = document.querySelector('.btn-primary.fs-1');
                const printPreviewModal = new bootstrap.Modal(document.getElementById('print-receipt'));
                const printSlipButton = document.getElementById('printSlip');
                const orderItemsTable = document.getElementById('orderItems');
                const itemSelectedTable = document.getElementById('itemselected');
                const quantityModal = document.getElementById('quantityModal');
                const modalQuantityInput = document.getElementById('modalQuantityInput');
                const updateQuantityBtn = document.getElementById('updateQuantityBtn');
                const clearAllButton = document.querySelector('.btn-light-primary');
                const checkboxes = document.querySelectorAll('[type="checkbox"]');
                const barcodeInput = document.getElementById('searchInput');

                let selectedProductRow = null;
                let orderItems = [];
                let orderId = generateOrderId();
                let barcodeBuffer = '';
                let timeout;

                // Disable Print Bills Button Initially
                if (printBillsButton) {
                    printBillsButton.disabled = true;
                }

                const updatePrintBillsButtonState = () => {
                    printBillsButton.disabled = orderItems.length === 0;
                };

                const calculateTotals = () => {
                    const items = Array.from(itemSelectedTable.querySelectorAll('[data-kt-pos-element="item-total"]'));
                    let total = 0;

                    items.forEach((item) => {
                        total += parseFloat(item.innerHTML.replace('₦', '').replace(/,/g, ''));
                    });

                    const grandTotal = total;
                    document.querySelector('[data-kt-pos-element="total"]').innerHTML = formatMoney(total);
                    document.querySelector('[data-kt-pos-element="grant-total"]').innerHTML = formatMoney(grandTotal);
                };



                        const handleQuantityClick = (event) => {
                            selectedProductRow = event.target.closest('[data-kt-pos-element="item"]');
                            const currentQuantity = selectedProductRow.querySelector('#quantityInput').value;
                            modalQuantityInput.value = currentQuantity;

                            const modal = new bootstrap.Modal(quantityModal);
                            modal.show();
                        };

                        const updateQuantity = () => {
                            if (selectedProductRow) {
                                const newQuantity = parseInt(modalQuantityInput.value);
                                const price = parseFloat(selectedProductRow.getAttribute('data-kt-pos-item-price'));

                                if (isNaN(newQuantity) || newQuantity <= 0) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Invalid Quantity',
                                        text: 'Please enter a valid quantity (positive integer).',
                                    });
                                    return;
                                }

                                const total = (newQuantity * price).toFixed(2);
                                selectedProductRow.querySelector('#quantityInput').value = newQuantity;
                                selectedProductRow.querySelector('[data-kt-pos-element="item-total"]').innerHTML = formatMoney(total);

                                const updatedItem = orderItems.find(item => item.productId === selectedProductRow.getAttribute('data-kt-ecommerce-edit-order-id-ajax'));
                                if (updatedItem) {
                                    updatedItem.quantity = newQuantity;
                                    updatedItem.total = total;
                                }

                                calculateTotals();
                            }
                        };

                        const sendOrderToBackend = () => {
                            const paymentMethod = document.querySelector('input[name="paymentmethod"]:checked');
                            if (!paymentMethod) {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Payment Method Required',
                                    text: 'Please select a payment method before proceeding.',
                                });
                                return;
                            }

                            Swal.fire({
                                title: 'Confirm Order',
                                text: 'Are you sure you want to submit this order?',
                                icon: 'question',
                                showCancelButton: true,
                                confirmButtonText: 'Yes, submit it!',
                                cancelButtonText: 'Cancel',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    fetch(paymentStoreUrl, {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                        },
                                        body: JSON.stringify({
                                            items: orderItems,
                                            payment_method: paymentMethod.value,
                                        }),
                                    })
                                        .then(response => response.json())
                                        .then(data => {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Order Submitted',
                                                text: 'Your order has been submitted successfully.',
                                            }).then(() => {
                                                const receiptTableBody = document.querySelector('#receiptTableBody');
                                                receiptTableBody.innerHTML = '';

                                                data.items.forEach((item, index) => {
                                                    const row = document.createElement('tr');
                                                    row.innerHTML = `
                                                        <td>${index + 1}</td>
                                                        <td>${item.product_name}</td>
                                                        <td>${item.quantity}</td>
                                                        <td>${formatMoney(item.price)}</td>
                                                        <td>${formatMoney(item.total)}</td>
                                                    `;
                                                    receiptTableBody.appendChild(row);
                                                });

                                                const summaryRow = document.createElement('tr');
                                                summaryRow.classList.add('subtotal-row');
                                                summaryRow.innerHTML = `
                                                    <td colspan="5">
                                                        <table class="table-borderless w-100 table-fit">
                                                            <tr>
                                                                <td>Sub Total :</td>
                                                                <td class="text-end">${formatMoney(data.total_amount)}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Discount :</td>
                                                                <td class="text-end">${formatMoney(data.discount)}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total Payable :</td>
                                                                <td class="text-end">${formatMoney(data.total_amount)}</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                `;
                                                receiptTableBody.appendChild(summaryRow);

                                                document.querySelector('#receiptOrderId').textContent = data.order_id;
                                                document.querySelector('#receiptGrandTotal').textContent = formatMoney(data.grand_total);

                                                document.querySelector('#invoiceUserName').textContent = data.customer_name || 'N/A';
                                                document.querySelector('#invoiceNumber').textContent = data.invoice_id.invoice_no || 'N/A';
                                                document.querySelector('#orderId').textContent = data.order_id || 'N/A';
                                                document.querySelector('#invoiceDate').textContent = data.date || new Date().toLocaleDateString();

                                                printPreviewModal.show();
                                            });
                                        })
                                        .catch(error => {
                                            console.error('Error:', error);
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Submission Failed',
                                                text: 'There was an error submitting your order. Please try again.',
                                            });
                                        });
                                }
                            });
                        };


                            // Create a dismissible alert for barcode scanner mode
                        const createBarcodeAlert = () => {
                            // Remove any existing alerts first
                            const existingAlert = document.getElementById('barcodeScannerAlert');
                            if (existingAlert) {
                                existingAlert.remove();
                            }

                            // Create alert element
                            const alertDiv = document.createElement('div');
                            alertDiv.id = 'barcodeScannerAlert';
                            alertDiv.className = 'alert alert-primary alert-dismissible fade show position-fixed';
                            alertDiv.style.cssText = `
                                z-index: 1060;
                                top: 20px;
                                left: 50%;
                                transform: translateX(-50%);
                                max-width: 400px;
                                width: 90%;
                            `;
                            alertDiv.innerHTML = `
                                <strong>Barcode Scanner Mode:</strong> Scan items to add them to the order.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            `;

                            // Append to body to ensure visibility
                            document.body.appendChild(alertDiv);

                            // Initialize Bootstrap dismiss functionality
                            const alert = new bootstrap.Alert(alertDiv);

                            // Optional: Auto-dismiss after 5 seconds
                            setTimeout(() => {
                                if (alertDiv) {
                                    bootstrap.Alert.getInstance(alertDiv)?.close();
                                }
                            }, 5000);
                        };




                    // Create a preloader element
                    const barcodePreloader = document.createElement('div');
                                barcodePreloader.id = 'barcodePreloader';
                                barcodePreloader.classList.add('position-absolute', 'd-none', 'align-items-center', 'justify-content-center');
                                barcodePreloader.style.cssText = 'top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1050; width: 50px; height: 50px;';
                                barcodePreloader.innerHTML = `
                                    <div class="spinner-border text-primary" role="status" style="width: 30px; height: 30px;">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                `;
                                document.body.appendChild(barcodePreloader); // Add preloader to the body or relevant container

                                // Add event listener to show alert when barcode input is focused
                                barcodeInput.addEventListener('focus', createBarcodeAlert);

                                // Optional: Programmatic trigger for testing
                                document.addEventListener('click', (event) => {
                                    // If clicked anywhere, focus the input to trigger the alert
                                    if (event.target !== barcodeInput) {
                                        barcodeInput.focus();
                                    }
                                });

                                // Ensure the barcode input always regains focus after other interactions
                                document.addEventListener('click', (e) => {
                                    if (e.target && e.target.id === 'quantityInput') {
                                        const quantityInput = e.target;
                                        quantityInput.focus();
                                        quantityInput.addEventListener('blur', () => {
                                            barcodeInput.focus();
                                        }, { once: true });
                                    } else {
                                        barcodeInput.focus();
                                    }
                                });

                                // Handle direct blur events on the barcode input to refocus
                                barcodeInput.addEventListener('blur', () => {
                                    setTimeout(() => {
                                        if (
                                            document.activeElement.tagName !== 'INPUT' ||
                                            document.activeElement.id !== 'quantityInput'
                                        ) {
                                            barcodeInput.focus();
                                        }
                                    }, 100);
                                });

                                // Handle both barcode scanning and manual search
                                const handleSearchOrScan = () => {
                                    barcodeInput.addEventListener('input', (e) => {
                                        clearTimeout(timeout);

                                        // Collect typed characters and keep the input field value visible
                                        barcodeBuffer = e.target.value.trim();

                                        // Show preloader only if scanning a barcode
                                        barcodePreloader.classList.remove('d-none');
                                        barcodePreloader.classList.add('d-flex');

                                        timeout = setTimeout(() => {
                                            const inputValue = barcodeBuffer.trim();
                                            barcodeBuffer = ''; // Clear buffer for the next input

                                            if (inputValue) {
                                                if (e.inputType === "insertText" || e.key === "Enter") {
                                                    // Handle manual search by filtering the table
                                                    searchTable(inputValue);
                                                }
                                            }

                                            // Hide preloader after the scan or manual search
                                            barcodePreloader.classList.remove('d-flex');
                                            barcodePreloader.classList.add('d-none');
                                        }, 300); // Debounce delay
                                    });

                                    // Detect 'Enter' key to trigger barcode scanning logic (for barcode)
                                    barcodeInput.addEventListener('keydown', (e) => {
                                        if (e.key === 'Enter') {
                                            e.preventDefault(); // Prevent form submission or default behavior
                                            const scannedBarcode = barcodeBuffer.trim();
                                            if (scannedBarcode) {
                                                processBarcode(scannedBarcode);
                                            }
                                            barcodeBuffer = ''; // Clear buffer after processing
                                        }
                                    });
                                };

                                // Function to search the table for manual input
                                const searchTable = (query) => {
                                    const rows = document.querySelectorAll('#kt_ecommerce_edit_order_product_table-ajax tbody tr');
                                    rows.forEach(row => {
                                        const cells = row.querySelectorAll('td');
                                        let matched = false;

                                        cells.forEach(cell => {
                                            if (cell.textContent.toLowerCase().includes(query.toLowerCase())) {
                                                matched = true;
                                            }
                                        });

                                        if (matched) {
                                            row.style.display = '';
                                        } else {
                                            row.style.display = 'none';
                                        }
                                    });
                                };

                                // Function to process scanned barcode when "Enter" key is pressed
                                const processBarcode = (barcode) => {
                                    const productRow = document.querySelector(`#kt_ecommerce_edit_order_product_table-ajax tr[data-barcode="${barcode}"]`);

                                    if (productRow) {
                                        const existingSelectedRow = document.querySelector(`#itemselected tr[data-kt-ecommerce-edit-order-id-ajax="${productRow.getAttribute('data-kt-ecommerce-edit-order-id-ajax')}"]`);

                                        if (existingSelectedRow) {
                                            selectedProductRow = existingSelectedRow;
                                            const currentQuantity = parseInt(existingSelectedRow.querySelector('#quantityInput').value, 10) || 1;
                                            modalQuantityInput.value = currentQuantity + 1;
                                            updateQuantity();
                                        } else {
                                            const checkbox = productRow.querySelector('input[type="checkbox"]');
                                            if (!checkbox.checked) {
                                                checkbox.checked = true;
                                                checkbox.dispatchEvent(new Event('change'));
                                            }
                                        }
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Item Not Found',
                                            text: `No item found for the scanned barcode: ${barcode}`,
                                        });
                                    }
                        };

                        // Initialize the search or barcode scan functionality
                        handleSearchOrScan();





                             // Checkbox Handling
                              checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', (e) => {
                const parent = checkbox.closest('tr');
                const productId = parent.querySelector('[data-kt-ecommerce-edit-order-id-ajax]').getAttribute('data-kt-ecommerce-edit-order-id-ajax');
                const productName = parent.querySelector('.text-gray-800').innerText;
                const productPrice = parseFloat(parent.querySelector('[data-kt-ecommerce-edit-order-filter-ajax="price"]').innerText.replace('₦', '').replace(/,/g, ''));
                const productBarcode = parent.getAttribute('data-barcode');

                if (e.target.checked) {
                    const newRow = document.createElement('tr');
                    newRow.setAttribute('data-kt-pos-element', 'item');
                    newRow.setAttribute('data-kt-pos-item-price', productPrice);
                    newRow.setAttribute('data-kt-ecommerce-edit-order-id-ajax', productId);
                    newRow.setAttribute('data-barcode', productBarcode);

                    // Adding the new attributes for product name and product price
                    newRow.setAttribute('data-product-name', productName); // Assuming `productName` is available
                    newRow.setAttribute('data-product-price', productPrice); // Assuming `productPrice` is available


                    const initialQuantity = 1;
                    const initialTotal = (initialQuantity * productPrice).toFixed(2);




                    newRow.innerHTML = `
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center" data-kt-ecommerce-edit-order-filter="product" data-kt-ecommerce-edit-order-id="">

                                            <!-- Title and Details -->
                                            <div class="ms-5">
                                                <!-- Title -->
                                                <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold"> ${productName}</a>
                                                <!-- Price -->
                                                <div class="fw-semibold fs-7">Price: ₦<span data-kt-ecommerce-edit-order-filter="price">
                                                <span class="fw-bold text-success ms-3">${formatMoney(productPrice)}</span>
                                                </span></div>
                                                <!-- SKU -->
                                                <div class="text-muted fs-7">SKU:sku</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-5" data-order="0">
                                        <input type="text" id="quantityInput" value="${initialQuantity}" readonly class="form-control border-0 text-center px-0 quantityInput" style="font-size: 18px; width: 50px;">
                                    </td>
                                    <td class="text-end pe-5" data-order="0">

                                         <span class="fw-bold text-success ms-3" data-kt-pos-element="item-total">${formatMoney(initialTotal)}</span>
                                    </td>
                                    <td class="text-end">
                                        <button class="btn btn-sm btn-icon btn-light-danger remove-item" type="button">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </button>
                                        </td>

                                `;


                                 newRow.style.borderBottom = '1px solid green';

                                 const removeButton = newRow.querySelector('.remove-item');
                                 removeButton.addEventListener('click', () => {
                                     // Remove the row
                                     newRow.remove();

                                     // Uncheck the corresponding checkbox in the product table
                                    //  const correspondingCheckbox = document.querySelector(
                                    //      `#kt_ecommerce_edit_order_product_table-ajax tr[data-product-id="${productId}"] input[type="checkbox"]`
                                    //  );

                                      const correspondingCheckbox = document.querySelector(`[data-kt-ecommerce-edit-order-id-ajax="${productId}"]`)
                                                        .closest('tr')
                                                        .querySelector('input[type="checkbox"]');
                                     if (correspondingCheckbox) {
                                         correspondingCheckbox.checked = false;
                                     }

                                     // Remove the item from the orderItems array
                                     orderItems = orderItems.filter(item => item.productId !== productId);

                                     // Recalculate totals and update the Print Bills button state
                                     calculateTotals();
                                     updatePrintBillsButtonState();
                                 });

                                            // Append new row to the selected items table
                                            itemSelectedTable.appendChild(newRow);

                                            // Add to order items array
                                            orderItems.push({ productId, productName, productPrice, quantity: initialQuantity, total: initialTotal });

                                            // Quantity input click handler
                                            newRow.querySelector('#quantityInput').addEventListener('click', handleQuantityClick);
                                        } else {
                                            // Remove existing row if unchecked
                                            const row = itemSelectedTable.querySelector(`[data-kt-pos-item-price="${productPrice}"]`);
                                            if (row) row.remove();
                                            orderItems = orderItems.filter(item => item.productId !== productId);
                                        }

                                        calculateTotals();
                                        updatePrintBillsButtonState();
                                    });
                                });
                                        // Clear All Button
                                        clearAllButton.addEventListener('click', () => {
                                            itemSelectedTable.innerHTML = '';
                                            checkboxes.forEach(checkbox => checkbox.checked = false);
                                            orderItems = [];
                                            calculateTotals();
                                            updatePrintBillsButtonState();
                                        });

                                        // Print Bills Button
                                        printBillsButton.addEventListener('click', sendOrderToBackend);

                                        // Update Quantity Modal Button
                                        updateQuantityBtn.addEventListener('click', updateQuantity);

                                        // Print Slip Button
                                        printSlipButton.addEventListener('click', () => {
                                            window.print();
                                            printPreviewModal.hide();
                                        });

                                        // Clear Items Function
                                        const clearItems = () => {
                                            itemSelectedTable.innerHTML = '';
                                            orderItems.length = 0;

                                            checkboxes.forEach((checkbox) => {
                                                checkbox.checked = false;
                                            });

                                            calculateTotals();
                                            updatePrintBillsButtonState();
                                        };

                                        // Listen for when the modal is shown
                                        printPreviewModal._element.addEventListener('shown.bs.modal', function () {
                                            clearItems();
                                        });
                                    });


    // Submit form handler
    const handleSubmit = () => {
        // Define variables
        let validator;

        // Get elements
        const form = document.getElementById('kt_ecommerce_edit_order_form');
        const submitButton = document.getElementById('kt_ecommerce_edit_order_submit');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'payment_method': {
                        validators: {
                            notEmpty: {
                                message: 'Payment method is required'
                            }
                        }
                    },
                    'shipping_method': {
                        validators: {
                            notEmpty: {
                                message: 'Shipping method is required'
                            }
                        }
                    },
                    'order_date': {
                        validators: {
                            notEmpty: {
                                message: 'Order date is required'
                            }
                        }
                    },
                    'billing_order_address_1': {
                        validators: {
                            notEmpty: {
                                message: 'Address line 1 is required'
                            }
                        }
                    },
                    'billing_order_postcode': {
                        validators: {
                            notEmpty: {
                                message: 'Postcode is required'
                            }
                        }
                    },
                    'billing_order_state': {
                        validators: {
                            notEmpty: {
                                message: 'State is required'
                            }
                        }
                    },
                    'billing_order_country': {
                        validators: {
                            notEmpty: {
                                message: 'Country is required'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );

        // Handle submit button
        submitButton.addEventListener('click', e => {
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    console.log('validated!');

                    if (status == 'Valid') {
                        submitButton.setAttribute('data-kt-indicator', 'on');

                        // Disable submit button whilst loading
                        submitButton.disabled = true;

                        setTimeout(function () {
                            submitButton.removeAttribute('data-kt-indicator');

                            Swal.fire({
                                text: "Form has been successfully submitted!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then(function (result) {
                                if (result.isConfirmed) {
                                    // Enable submit button after loading
                                    submitButton.disabled = false;

                                    // Redirect to customers list page
                                    window.location = form.getAttribute("data-kt-redirect");
                                }
                            });
                        }, 2000);
                    } else {
                        Swal.fire({
                            html: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            }
        })
    }


    // Public methods
    return {
        init: function () {

            initSaveOrder();
            handleSearchDatatable();
            handleShippingForm();
            handleProductSelect();
            handleSubmit();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceSalesSaveOrder.init();
});
