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
                            console.log('Order saved:', data);
                            Swal.fire({
                                icon: 'success',
                                title: 'Order Submitted',
                                text: 'Your order has been submitted successfully.',
                            }).then(() => {
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
                            <td class="pe-0" style="font-size: 19px; padding: 8px;">${productName}</td>
                            <td class="pe-0" style="font-size: 19px; padding: 8px;">
                                <input type="text" id="quantityInput" value="${initialQuantity}" readonly class="form-control border-0 text-center px-0" style="font-size: 14px; width: 50px;">
                            </td>
                            <td class="text-end" style="font-size: 19px; padding: 8px;">
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





// document.addEventListener('DOMContentLoaded', function () {
//     // Get the Print Bills button and bind the modal actions
//     const printBillsButton = document.querySelector('.btn-primary.fs-1'); // Ensure this targets your button
//     const printPreviewModal = new bootstrap.Modal(document.getElementById('print-receipt'));
//     const printSlipButton = document.getElementById('printSlip');
//     const orderItems = document.getElementById('orderItems');

//     // Example order data (this would be dynamically generated in your app)
//     const items = [
//         { name: 'T-Bone Steak', quantity: 2, total: '$66.00' },
//         { name: 'Product Name', quantity: 1, total: '$100.00' },
//     ];

//     // Function to check if a payment method is selected
//     const isPaymentMethodSelected = () => {
//         const paymentMethod = document.querySelector('input[name="paymentmethod"]:checked');
//         return paymentMethod !== null; // Returns true if a payment method is selected
//     };

//     // When Print Bills button is clicked, first check if payment method is selected
//     printBillsButton.addEventListener('click', function () {
//         if (!isPaymentMethodSelected()) {
//             // Show SweetAlert if no payment method is selected
//             Swal.fire({
//                 icon: 'warning',
//                 title: 'Payment Method Required',
//                 text: 'Please select a payment method before proceeding.',
//             });
//             return; // Stop further execution
//         }

//         // If payment method is selected, show a confirmation alert
//         Swal.fire({
//             title: 'Are you sure?',
//             text: 'Do you want to proceed with printing the bill?',
//             icon: 'warning',
//             showCancelButton: true,
//             confirmButtonText: 'Yes, proceed!',
//             cancelButtonText: 'No, cancel',
//         }).then((result) => {
//             if (result.isConfirmed) {
//                 // Proceed to the print preview modal
//                 // Populate the order items in the print preview modal
//                 orderItems.innerHTML = '';
//                 items.forEach(item => {
//                     const row = document.createElement('tr');
//                     row.innerHTML = `
//                         <td>${item.name}</td>
//                         <td>${item.quantity}</td>
//                         <td>${item.total}</td>
//                     `;
//                     orderItems.appendChild(row);
//                 });

//                 // Show the print preview modal
//                 printPreviewModal.show();
//             }
//         });
//     });

//     // Simulate the printing process when the Print button in the preview modal is clicked
//     printSlipButton.addEventListener('click', function () {
//         window.print(); // Simulate print action
//         printPreviewModal.hide(); // Hide the print preview modal after printing
//     });
// });



//    const handleProductSelect = () => {


//     // DOM elements
//     const checkboxes = document.querySelectorAll('[type="checkbox"]');
//     const itemSelectedTable = document.getElementById('itemselected'); // Second table's tbody
//     const totalPrice = document.getElementById('kt_ecommerce_edit_order_total_price');
//     const quantityModal = document.getElementById('quantityModal');
//     const modalQuantityInput = document.getElementById('modalQuantityInput');
//     const updateQuantityBtn = document.getElementById('updateQuantityBtn');
//     const clearAllButton = document.querySelector('.btn-light-primary'); // "Clear All" button
//     let selectedProductRow = null; // To store the selected product row for updating
//     let orderItems = []; // Initialize empty array to store order items
//     let orderId = generateOrderId(); // Placeholder for order ID generation logic


//     // Reference to the Print Bills button
//     const printBillsButton = document.querySelector('.btn.btn-primary.fs-1.w-100.py-4');

//     // Disable Print Bills button initially
//     if (printBillsButton) {
//         printBillsButton.disabled = true;
//     }

//     // Function to update Print Bills button state based on item selection
//     const updatePrintBillsButtonState = () => {
//         if (orderItems.length > 0) {
//             printBillsButton.disabled = false; // Enable the button if items are selected
//         } else {
//             printBillsButton.disabled = true; // Disable the button if no items are selected
//         }
//     };


//     // Function to calculate the total price of all selected items
//     const calculateTotals = function () {
//         const items = Array.from(itemSelectedTable.querySelectorAll('[data-kt-pos-element="item-total"]'));
//         let total = 0;
//         const tax = 0; // Tax percentage
//         const discount = 0; // Discount amount
//         let grandTotal = 0;

//         // Sum all item totals
//         items.forEach(function (item) {
//             total += parseFloat(item.innerHTML.replace('₦', '').replace(/,/g, '')); // Remove currency and commas
//         });

//         // Calculate grand total
//         grandTotal = total - discount + (total * tax / 100);

//         // Update totals in the UI
//         document.querySelector('[data-kt-pos-element="total"]').innerHTML = formatMoney(total);
//         document.querySelector('[data-kt-pos-element="grant-total"]').innerHTML = formatMoney(grandTotal);
//     };

//     // Function to handle quantity input click (open modal)
//     const handleQuantityClick = (event) => {
//         const productRow = event.target.closest('[data-kt-pos-element="item"]');
//         selectedProductRow = productRow; // Store reference to the row

//         // Get current quantity and set it in the modal
//         const currentQuantity = productRow.querySelector('#quantityInput').value;
//         modalQuantityInput.value = currentQuantity;

//         // Show the modal
//         const modal = new bootstrap.Modal(quantityModal);
//         modal.show();
//     };

//     // Function to update the quantity and total cost
//     const updateQuantity = () => {
//         if (selectedProductRow) {
//             const newQuantity = parseFloat(modalQuantityInput.value);
//             const price = parseFloat(selectedProductRow.getAttribute('data-kt-pos-item-price'));

//             // Check if price and quantity are valid numbers
//             if (isNaN(price) || isNaN(newQuantity) || newQuantity <= 0) {
//                 console.error("Invalid price or quantity");
//                 return;
//             }

//             const total = (newQuantity * price).toFixed(2); // Ensure the total has two decimal places

//             // Update the input field and item total
//             selectedProductRow.querySelector('#quantityInput').value = newQuantity;
//             selectedProductRow.querySelector('[data-kt-pos-element="item-total"]').innerHTML = formatMoney(total);

//             // Update the quantity and total in the orderItems array
//             const updatedItem = orderItems.find(item => item.productId === selectedProductRow.getAttribute('data-kt-ecommerce-edit-order-id'));
//             if (updatedItem) {
//                 updatedItem.quantity = newQuantity;
//                 updatedItem.total = total; // Update the total based on the new quantity
//             }

//             // Recalculate totals
//             calculateTotals();

//         }
//     };
//     // Clear All button functionality
//     clearAllButton.addEventListener('click', () => {
//         // Clear all rows in the second table
//         while (itemSelectedTable.firstChild) {
//             itemSelectedTable.removeChild(itemSelectedTable.firstChild);
//         }

//         // Uncheck all checkboxes
//         checkboxes.forEach((checkbox) => {
//             checkbox.checked = false;
//         });

//         // Clear the orderItems array
//         orderItems = [];

//         // Recalculate totals
//         calculateTotals();

//          // Update the Print Bills button state
//          updatePrintBillsButtonState();
//     });

//     // Loop through all checkboxes
//     checkboxes.forEach((checkbox) => {
//         checkbox.addEventListener('change', (e) => {
//             // Select parent row element
//             const parent = checkbox.closest('tr');

//             // Get product details
//             const productId = parent.querySelector('[data-kt-ecommerce-edit-order-id]').getAttribute('data-kt-ecommerce-edit-order-id');
//             const productName = parent.querySelector('.text-gray-800').innerText; // Product Name
//             const productImage = parent.querySelector('.symbol-label').style.backgroundImage.match(/url\("(.*?)"\)/)[1]; // Image URL
//             const productPrice = parseFloat(parent.querySelector('[data-kt-ecommerce-edit-order-filter="price"]').innerText.replace('₦', '').replace(/,/g, '')); // Product Price

//             // Check if price is valid
//             if (isNaN(productPrice)) {
//                 console.error("Invalid product price");
//                 return;
//             }

//             // Check if the row is already in the second table (to prevent duplicates)
//             const existingRow = itemSelectedTable.querySelector(`[data-kt-pos-element="item"][data-kt-pos-item-price="${productPrice}"][data-kt-ecommerce-edit-order-id="${productId}"]`);

//             if (e.target.checked && !existingRow) {
//                 // Create a new row for the second table
//                 const newRow = document.createElement('tr');
//                 newRow.setAttribute('data-kt-pos-element', 'item');
//                 newRow.setAttribute('data-kt-pos-item-price', productPrice);
//                 newRow.setAttribute('data-kt-ecommerce-edit-order-id', productId);

//                 const initialQuantity = 1;
//                 const initialTotal = (initialQuantity * productPrice).toFixed(2); // Ensure the initial total has two decimal places

//                 newRow.innerHTML = `
//                     <td class="pe-0">
//                         <div class="d-flex align-items-center">
//                             <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6 me-1">${productName}</span>
//                         </div>
//                     </td>
//                     <td class="pe-0">
//                         <input type="text" class="form-control border-0 text-center px-0 fs-3 fw-bold text-gray-800 w-30px" id="quantityInput" value="${initialQuantity}" readonly />
//                     </td>
//                     <td class="text-end">
//                         <span class="fw-bold text-primary fs-2" data-kt-pos-element="item-total">${formatMoney(initialTotal)}</span>
//                     </td>
//                 `;

//                 // Append the new row to the second table
//                 itemSelectedTable.appendChild(newRow);

//                 // Add event listener for quantity click (open modal)
//                 newRow.querySelector('#quantityInput').addEventListener('click', handleQuantityClick);

//                 // Add item to the orderItems array
//                 orderItems.push({
//                     productId,
//                     productName,
//                     productImage,
//                     productPrice,
//                     quantity: initialQuantity,
//                     total: initialTotal,
//                 });
//             } else if (!e.target.checked && existingRow) {
//                 // Remove the product row from the second table if unchecked
//                 itemSelectedTable.removeChild(existingRow);

//                 // Remove item from the orderItems array
//                 orderItems = orderItems.filter(item => item.productId !== productId);
//             }

//             // Recalculate totals after every checkbox change
//             calculateTotals();

//               // Update the Print Bills button state
//               updatePrintBillsButtonState();
//         });
//     });

//     // Event listener for modal button to update quantity
//     updateQuantityBtn.addEventListener('click', updateQuantity);

//     // Function to generate unique order ID (for example, using a timestamp or a UUID)
//     function generateOrderId() {
//         return 'ORD-' + new Date().getTime(); // Simple order ID based on timestamp
//     }

//     // Function to send the order data to the backend
//     const sendOrderToBackend = () => {



//         // Get all selected items from the second table
//         const selectedRows = document.querySelectorAll('#itemselected tr[data-kt-pos-element="item"]');

//         // If no items are selected, alert the user and exit
//         if (selectedRows.length === 0) {
//             alert('No items selected for the order.');
//             return;
//         }

//         // // Get the selected payment method from the radio buttons
//          const paymentMethod = document.querySelector('input[name="paymentmethod"]:checked');

//         if (!paymentMethod) {
//             Swal.fire({
//                 icon: 'warning',
//                 title: 'Payment Method Required',
//                 text: 'Please select a payment method before proceeding.',
//             });
//             return;
//         }

//         // Get the selected payment method value
//        // const selectedPaymentMethod = paymentMethod.value;

//         // Check if there are any selected items
//         // if (orderItems.length > 0) {
//         //     // Send the order details (orderId, items, and payment method) to the backend
//         //     fetch(paymentStoreUrl, {
//         //         method: 'POST',
//         //         headers: {
//         //             'Content-Type': 'application/json',
//         //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // CSRF token for security
//         //         },
//         //         body: JSON.stringify({
//         //             items: orderItems, // Send the order items with updated quantities and totals
//         //             payment_method: selectedPaymentMethod, // Include the selected payment method
//         //         }),
//         //     })
//         //     .then(response => response.json())
//         //     .then(data => {
//         //         console.log('Order saved:', data);
//         //         // Handle the response here (e.g., show a success message)
//         //     })
//         //     .catch(error => {
//         //         console.error('Error:', error);
//         //         // Handle any error here (e.g., show an error message)
//         //     });
//         // } else {
//         //     console.log('No items selected for the order.');
//         // }




//            // If payment method is selected, confirm with SweetAlert
//             Swal.fire({
//                 title: 'Confirm Order',
//                 text: 'Are you sure you want to submit this order?',
//                 icon: 'question',
//                 showCancelButton: true,
//                 confirmButtonText: 'Yes, submit it!',
//                 cancelButtonText: 'Cancel',
//             }).then((result) => {
//                 if (result.isConfirmed) {
//                     // Get the selected payment method value
//                     const selectedPaymentMethod = paymentMethod.value;

//                     // Send the order details (orderId, items, and payment method) to the backend
//                     fetch(paymentStoreUrl, {
//                         method: 'POST',
//                         headers: {
//                             'Content-Type': 'application/json',
//                             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // CSRF token for security
//                         },
//                         body: JSON.stringify({
//                             items: orderItems, // Send the order items with updated quantities and totals
//                             payment_method: selectedPaymentMethod, // Include the selected payment method
//                         }),
//                     })
//                     .then(response => response.json())
//                     .then(data => {
//                         console.log('Order saved:', data);
//                         // Handle the response here (e.g., show a success message)
//                     })
//                     .catch(error => {
//                         console.error('Error:', error);
//                         // Handle any error here (e.g., show an error message)
//                     });
//                 }
//             });
//     };

//     // Add an event listener to the Print Receipt button
//     const printReceiptButton = document.querySelector('.btn.btn-primary.flex-fill[data-bs-toggle="modal"]');
//     if (printReceiptButton) {
//         printReceiptButton.addEventListener('click', sendOrderToBackend);
//     }

//     // Function to format money as Naira (₦)
//     const formatMoney = (amount) => {
//         const number = parseFloat(amount);
//         if (isNaN(number)) return '₦0.00';
//         return '₦' + number.toLocaleString('en-NG', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
//     };
// };



// handleProductSelect();

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
