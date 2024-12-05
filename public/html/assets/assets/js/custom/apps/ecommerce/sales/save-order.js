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
        table = document.querySelector('#kt_ecommerce_edit_order_product_table');
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

        let selectedProductRow = null;
        let orderItems = [];
        let orderId = generateOrderId();

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

            const grandTotal = total; // Adjust for tax or discount if needed
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
                const newQuantity = parseInt(modalQuantityInput.value); // Use parseInt to convert to integer
                const price = parseFloat(selectedProductRow.getAttribute('data-kt-pos-item-price'));

                // Check if the quantity is a valid positive integer
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

                // Update the orderItems array with the new quantity and total
                const updatedItem = orderItems.find(item => item.productId === selectedProductRow.getAttribute('data-kt-ecommerce-edit-order-id'));
                if (updatedItem) {
                    updatedItem.quantity = newQuantity;
                    updatedItem.total = total;
                }

                calculateTotals(); // Recalculate totals after updating quantity
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
                           // console.log('Order saved:', data);
                            Swal.fire({
                                icon: 'success',
                                title: 'Order Submitted',
                                text: 'Your order has been submitted successfully.',
                            }).then(() => {
                                // Populate the print receipt modal table
                                const receiptTableBody = document.querySelector('#receiptTableBody'); // Target your table body
                                receiptTableBody.innerHTML = ''; // Clear previous content

                                // Assuming `data.items` contains the array of ordered items
                                data.items.forEach((item, index) => {
                                    const row = document.createElement('tr');
                                    row.innerHTML = `
                                        <td>${index + 1}</td> <!-- Serial Number -->
                                        <td>${item.product_name}</td> <!-- Product Name -->
                                        <td>${item.quantity}</td> <!-- Quantity -->
                                        <td>${formatMoney(item.price)}</td> <!-- Price -->
                                        <td>${formatMoney(item.total)}</td> <!-- Total -->
                                    `;
                                    receiptTableBody.appendChild(row);
                                });
                                // Insert subtotal, discount, and total bill
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

                                // Update other dynamic fields if needed
                                document.querySelector('#receiptOrderId').textContent = data.order_id; // Order ID
                                document.querySelector('#receiptGrandTotal').textContent = formatMoney(data.grand_total); // Grand Total

                                 // Update invoice details
                                document.querySelector('#invoiceUserName').textContent = data.customer_name || 'N/A'; // Customer Name
                                document.querySelector('#invoiceNumber').textContent = data.invoice_id.invoice_no || 'N/A'; // Invoice No
                                document.querySelector('#orderId').textContent = data.order_id ||'N/A'; // Customer ID
                                document.querySelector('#invoiceDate').textContent = data.date || new Date().toLocaleDateString(); // Date

                                // Show the print receipt modal
                                printPreviewModal.show();
                                // Show Print Receipt Modal
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


        // Checkbox Handling
        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', (e) => {
                const parent = checkbox.closest('tr');
                const productId = parent.querySelector('[data-kt-ecommerce-edit-order-id]').getAttribute('data-kt-ecommerce-edit-order-id');
                const productName = parent.querySelector('.text-gray-800').innerText;
                const productPrice = parseFloat(parent.querySelector('[data-kt-ecommerce-edit-order-filter="price"]').innerText.replace('₦', '').replace(/,/g, ''));

                if (e.target.checked) {
                    const newRow = document.createElement('tr');
                    newRow.setAttribute('data-kt-pos-element', 'item');
                    newRow.setAttribute('data-kt-pos-item-price', productPrice);
                    newRow.setAttribute('data-kt-ecommerce-edit-order-id', productId);

                    const initialQuantity = 1;
                    const initialTotal = (initialQuantity * productPrice).toFixed(2);

                    newRow.innerHTML = `
                            <td class="pe-0" style="font-size: 18px; padding: 8px;">${productName}
                        
                                <div class="fw-semibold fs-7">Price:<span>
                                    <span class="fw-bold text-success ms-3">${formatMoney(productPrice)}</span>
                                    </span>
                                </div>
                                                
                            </td>
                            <td class="pe-0" style="font-size: 18px; padding: 8px;">
                                <input type="text" id="quantityInput" value="${initialQuantity}" readonly class="form-control border-0 text-center px-0" style="font-size: 18px; width: 50px;">
                            </td>
                            <td class="text-end" style="font-size: 18px; padding: 8px;">
                                <span data-kt-pos-element="item-total">${formatMoney(initialTotal)}</span>
                            </td>
                        `;

                        newRow.style.borderBottom = '2px solid green'; // Add a green bottom border to each row

                    itemSelectedTable.appendChild(newRow);
                    orderItems.push({ productId, productName, productPrice, quantity: initialQuantity, total: initialTotal });
                    newRow.querySelector('#quantityInput').addEventListener('click', handleQuantityClick);
                } else {
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


            // Function to clear the table after printing
            const clearItemsTable = () => {
                itemSelectedTable.innerHTML = '';  // Clear the table content
            };





            // Clear Items Function
            const clearItems = () => {
                itemSelectedTable.innerHTML = ''; // Clear the order items table
                orderItems.length = 0; // Clear the orderItems array

                // Uncheck all checkboxes
                checkboxes.forEach((checkbox) => {
                    checkbox.checked = false;
                });

                calculateTotals(); // Recalculate totals after clearing
                updatePrintBillsButtonState(); // Update the print button state
            };

            // Listen for when the modal is shown
            printPreviewModal._element.addEventListener('shown.bs.modal', function () {
                clearItems();  // Clear items and uncheck checkboxes when the print modal is shown
            });

            // The print button click event
            //const printSlipButton = document.getElementById('printSlip');
            printSlipButton.addEventListener('click', () => {
                window.print(); // Trigger print dialog
                printPreviewModal.hide(); // Hide the modal after printing
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
