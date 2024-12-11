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
        const itemSelectedTable = document.getElementById('itemSelectedTable');
        const barcodeInput = document.getElementById('searchInput');
        const clearAllButton = document.querySelector('.btn-light-primary');

        // Total Calculation Elements
        const totalElement = document.querySelector('[data-kt-pos-element="total"]');
        const discountElement = document.querySelector('[data-kt-pos-element="discount"]');
        const taxElement = document.querySelector('[data-kt-pos-element="tax"]');
        const grandTotalElement = document.querySelector('[data-kt-pos-element="grant-total"]');

        // State Variables
        let orderItems = [];
        let orderId = generateOrderId();
        let barcodeBuffer = '';
        let timeout;

        // Preloader for Barcode
        const barcodePreloader = document.createElement('div');
        barcodePreloader.id = 'barcodePreloader';
        barcodePreloader.classList.add('position-absolute', 'd-none', 'align-items-center', 'justify-content-center');
        barcodePreloader.style.cssText = 'top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1050; width: 50px; height: 50px;';
        barcodePreloader.innerHTML = `
            <div class="spinner-border text-primary" role="status" style="width: 30px; height: 30px;">
                <span class="visually-hidden">Loading...</span>
            </div>
        `;
        document.body.appendChild(barcodePreloader);

        // Utility Functions for Order Management
        const calculateTotals = () => {
            let subtotal = orderItems.reduce((total, item) => total + parseFloat(item.total), 0);
            const discount = 0; // Implement discount logic if needed
            const taxRate = 0.075; // Example: 7.5% tax
            const tax = subtotal * taxRate;
            const grandTotal = subtotal + tax - discount;

            totalElement.innerHTML = formatMoney(subtotal);
            discountElement.innerHTML = `- ${formatMoney(discount)}`;
            taxElement.innerHTML = formatMoney(tax);
            grandTotalElement.innerHTML = formatMoney(grandTotal);
        };

        const updatePrintBillsButtonState = () => {
            if (printBillsButton) {
                printBillsButton.disabled = orderItems.length === 0;
            }
        };

        const addProductToOrder = (product) => {
            // Check if product already exists in order
            const existingItemIndex = orderItems.findIndex(item => item.productId === product.id);

            if (existingItemIndex > -1) {
                // Increment quantity of existing item
                orderItems[existingItemIndex].quantity += 1;
                orderItems[existingItemIndex].total = (
                    orderItems[existingItemIndex].quantity * product.base_price
                ).toFixed(2);

                // Update existing row in the table
                const existingRow = itemSelectedTable.querySelector(`[data-kt-ecommerce-edit-order-id="${product.id}"]`);
                if (existingRow) {
                    const quantityInput = existingRow.querySelector('.quantityInput');
                    const totalElement = existingRow.querySelector('[data-kt-pos-element="item-total"]');

                    quantityInput.value = orderItems[existingItemIndex].quantity;
                    totalElement.textContent = formatMoney(orderItems[existingItemIndex].total);
                }
            } else {
                // Add new product to order
                const newItem = {
                    productId: product.id,
                    productName: product.name,
                    productPrice: product.base_price,
                    quantity: 1,
                    total: product.base_price,
                    barcode: product.sku
                };

                orderItems.push(newItem);

                // Create and append new row
                const newRow = document.createElement('tr');
                newRow.setAttribute('data-kt-ecommerce-edit-order-id', product.id);
                newRow.setAttribute('data-barcode', product.sku);
                newRow.innerHTML = `
                    <td>${product.name}</td>
                    <td>
                        <input type="number"
                               class="form-control quantityInput"
                               value="1"
                               min="1"
                               data-product-id="${product.id}"
                        />
                    </td>
                    <td data-kt-pos-element="item-total">${formatMoney(product.base_price)}</td>
                    <td>
                        <button class="btn btn-sm btn-icon btn-light-danger remove-item" data-product-id="${product.id}">
                            <i class="ki-duotone ki-cross fs-2"></i>
                        </button>
                    </td>
                `;

                // Quantity change event
                const quantityInput = newRow.querySelector('.quantityInput');
                quantityInput.addEventListener('change', (e) => {
                    const newQuantity = parseInt(e.target.value);
                    const productId = e.target.getAttribute('data-product-id');

                    const itemIndex = orderItems.findIndex(item => item.productId === productId);
                    if (itemIndex > -1) {
                        orderItems[itemIndex].quantity = newQuantity;
                        orderItems[itemIndex].total = (newQuantity * orderItems[itemIndex].productPrice).toFixed(2);

                        const totalCell = newRow.querySelector('[data-kt-pos-element="item-total"]');
                        totalCell.textContent = formatMoney(orderItems[itemIndex].total);

                        calculateTotals();
                    }
                });

                // Remove item event
                const removeButton = newRow.querySelector('.remove-item');
                removeButton.addEventListener('click', (e) => {
                    const productId = e.currentTarget.getAttribute('data-product-id');

                    // Remove from orderItems
                    orderItems = orderItems.filter(item => item.productId !== productId);

                    // Remove row from table
                    newRow.remove();

                    // Uncheck corresponding product in product table
                    const productTableRow = document.querySelector(`#kt_ecommerce_edit_order_product_table-ajax tr[data-kt-ecommerce-edit-order-id-ajax="${productId}"]`);
                    if (productTableRow) {
                        const checkbox = productTableRow.querySelector('input[type="checkbox"]');
                        if (checkbox) checkbox.checked = false;
                    }

                    calculateTotals();
                    updatePrintBillsButtonState();
                });

                itemSelectedTable.appendChild(newRow);
            }

            calculateTotals();
            updatePrintBillsButtonState();
        };

        // Search and Barcode Scanning
        const handleSearchOrScan = () => {
            barcodeInput.addEventListener('input', (e) => {
                clearTimeout(timeout);
                barcodeBuffer = e.target.value.trim();

                barcodePreloader.classList.remove('d-none');
                barcodePreloader.classList.add('d-flex');

                timeout = setTimeout(() => {
                    const inputValue = barcodeBuffer.trim();
                    barcodeBuffer = '';

                    if (inputValue) {
                        fetch(`${productSearchQuery}?query=${inputValue}`)
                            .then(response => response.json())
                            .then(data => {
                                barcodePreloader.classList.remove('d-flex');
                                barcodePreloader.classList.add('d-none');

                                if (data.status === 'success' && data.data.length > 0) {
                                    // If exact match found, add first product
                                    addProductToOrder(data.data[0]);
                                    populateTable(data.data);
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: 'No products found.',
                                    });
                                }
                            })
                            .catch(error => {
                                console.error('Error fetching products:', error);
                                barcodePreloader.classList.remove('d-flex');
                                barcodePreloader.classList.add('d-none');
                            });
                    } else {
                        barcodePreloader.classList.remove('d-flex');
                        barcodePreloader.classList.add('d-none');
                    }
                }, 300);
            });
        };

        const populateTable = (products) => {
            const tbody = document.querySelector('#kt_ecommerce_edit_order_product_table-ajax tbody');
            tbody.innerHTML = ''; // Clear the table

            products.forEach(product => {
                const row = document.createElement('tr');
                row.setAttribute('data-barcode', product.sku);
                row.setAttribute('data-product-id', product.id);
                row.setAttribute('data-kt-ecommerce-edit-order-id-ajax', product.id);

                row.innerHTML = `
                    <td>
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input product-checkbox" type="checkbox" value="${product.id}" />
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ms-5">
                                <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">${product.name}</a>
                                <div class="fw-semibold fs-7">Price: ₦<span>${formatMoney(product.base_price)}</span></div>
                                <div class="text-muted fs-7">SKU: ${product.sku}</div>
                            </div>
                        </div>
                    </td>
                    <td class="text-end pe-5"><span class="fw-bold text-success ms-3">${Number(product.stock).toFixed(2)}</span></td>
                `;

                // Add checkbox event listener
                const checkbox = row.querySelector('.product-checkbox');
                checkbox.addEventListener('change', (e) => {
                    if (e.target.checked) {
                        addProductToOrder(product);
                    } else {
                        // Remove product from order
                        orderItems = orderItems.filter(item => item.productId !== product.id);
                        const existingRow = itemSelectedTable.querySelector(`[data-kt-ecommerce-edit-order-id="${product.id}"]`);
                        if (existingRow) existingRow.remove();

                        calculateTotals();
                        updatePrintBillsButtonState();
                    }
                });

                tbody.appendChild(row);
            });
        };

        // Clear All Button
        clearAllButton.addEventListener('click', () => {
            itemSelectedTable.innerHTML = '';
            orderItems = [];
            calculateTotals();
            updatePrintBillsButtonState();

            // Uncheck all checkboxes in product table
            const checkboxes = document.querySelectorAll('#kt_ecommerce_edit_order_product_table-ajax .product-checkbox');
            checkboxes.forEach(checkbox => checkbox.checked = false);
        });

        // Initialize
        handleSearchOrScan();
        updatePrintBillsButtonState();

        // Attach order submission logic (you might need to adapt this to your specific backend)
        const sendOrderToBackend = () => {
            // Implement your order submission logic here
            // This is a placeholder implementation
            Swal.fire({
                title: 'Order Submitted',
                text: `Order ${orderId} has been processed`,
                icon: 'success'
            });
        };

        // Print Bills Button
        if (printBillsButton) {
            printBillsButton.addEventListener('click', sendOrderToBackend);
        }
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
