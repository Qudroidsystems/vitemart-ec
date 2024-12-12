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


    // document.addEventListener('DOMContentLoaded', function () {
    //                 // Utility Functions
    //                 const formatMoney = (amount) => {
    //                     const number = parseFloat(amount);
    //                     if (isNaN(number)) return '₦0.00';
    //                     return '₦' + number.toLocaleString('en-NG', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    //                 };

    //                 const generateOrderId = () => 'ORD-' + new Date().getTime();

    //                 // DOM Elements
    //                 const printBillsButton = document.querySelector('.btn-primary.fs-1');
    //                 const printPreviewModal = new bootstrap.Modal(document.getElementById('print-receipt'));
    //                 const printSlipButton = document.getElementById('printSlip');
    //                 const itemSelectedTable = document.getElementById('itemSelectedTable');
    //                 const barcodeInput = document.getElementById('searchInput');
    //                 const clearAllButton = document.querySelector('.btn-light-primary');

    //                 const quantityModal = document.getElementById('quantityModal');
    //                 const modalQuantityInput = document.getElementById('modalQuantityInput');
    //                 const updateQuantityBtn = document.getElementById('updateQuantityBtn');


    //                 // Total Calculation Elements
    //                 const totalElement = document.querySelector('[data-kt-pos-element="total"]');
    //                 const discountElement = document.querySelector('[data-kt-pos-element="discount"]');
    //                 const taxElement = document.querySelector('[data-kt-pos-element="tax"]');
    //                 const grandTotalElement = document.querySelector('[data-kt-pos-element="grant-total"]');

    //                 // State Variables
    //                 let orderItems = [];
    //                 let orderId = generateOrderId();
    //                 let barcodeBuffer = '';
    //                 let timeout;

    //                 // Preloader for Barcode
    //                 const barcodePreloader = document.createElement('div');
    //                 barcodePreloader.id = 'barcodePreloader';
    //                 barcodePreloader.classList.add('position-absolute', 'd-none', 'align-items-center', 'justify-content-center');
    //                 barcodePreloader.style.cssText = 'top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1050; width: 50px; height: 50px;';
    //                 barcodePreloader.innerHTML = `
    //                     <div class="spinner-border text-primary" role="status" style="width: 30px; height: 30px;">
    //                         <span class="visually-hidden">Loading...</span>
    //                     </div>
    //                 `;
    //                 document.body.appendChild(barcodePreloader);

    //                 // Utility Functions for Order Management
    //                 const calculateTotals = () => {
    //                     let subtotal = orderItems.reduce((total, item) => total + parseFloat(item.total), 0);
    //                     const discount = 0; // Implement discount logic if needed
    //                     const taxRate = 0.075; // Example: 7.5% tax
    //                     const tax = subtotal * taxRate;
    //                     const grandTotal = subtotal + tax - discount;

    //                     totalElement.innerHTML = formatMoney(subtotal);
    //                     discountElement.innerHTML = `- ${formatMoney(discount)}`;
    //                     taxElement.innerHTML = formatMoney(tax);
    //                     grandTotalElement.innerHTML = formatMoney(grandTotal);
    //                 };

    //                 const updatePrintBillsButtonState = () => {
    //                     if (printBillsButton) {
    //                         printBillsButton.disabled = orderItems.length === 0;
    //                     }
    //                 };



    //                 // Disable Print Bills Button Initially
    //                 if (printBillsButton) {
    //                     printBillsButton.disabled = true;
    //                 }




    //                                 // Handle quantity change in the modal
    //                                 const handleQuantityClick = (event) => {
    //                                     selectedProductRow = event.target.closest('[data-kt-pos-element="item"]');
    //                                     const currentQuantity = selectedProductRow.querySelector('#quantityInput').value;
    //                                     modalQuantityInput.value = currentQuantity;

    //                                     const modal = new bootstrap.Modal(quantityModal);
    //                                     modal.show();
    //                                 };

    //                                 // Update the quantity after modal confirmation
    //                                 const updateQuantity = () => {
    //                                     if (selectedProductRow) {
    //                                         const newQuantity = parseInt(modalQuantityInput.value);
    //                                         const price = parseFloat(selectedProductRow.getAttribute('data-kt-pos-item-price'));

    //                                         if (isNaN(newQuantity) || newQuantity <= 0) {
    //                                             Swal.fire({
    //                                                 icon: 'error',
    //                                                 title: 'Invalid Quantity',
    //                                                 text: 'Please enter a valid quantity (positive integer).',
    //                                             });
    //                                             return;
    //                                         }

    //                                         const total = (newQuantity * price).toFixed(2);
    //                                         selectedProductRow.querySelector('#quantityInput').value = newQuantity;
    //                                         selectedProductRow.querySelector('[data-kt-pos-element="item-total"]').innerHTML = formatMoney(total);

    //                                         // Update orderItems array with the new quantity and total
    //                                         const updatedItem = orderItems.find(item => item.productId === selectedProductRow.getAttribute('data-kt-ecommerce-edit-order-id-ajax'));
    //                                         if (updatedItem) {
    //                                             updatedItem.quantity = newQuantity;
    //                                             updatedItem.total = total;
    //                                         }

    //                                         // Recalculate totals after quantity change
    //                                         calculateTotals();
    //                                     }
    //                                 };



    //                 const addProductToOrder = (product) => {
    //                     // Check if product already exists in order
    //                     const existingItemIndex = orderItems.findIndex(item => item.productId === product.id);

    //                     if (existingItemIndex > -1) {
    //                         // Increment quantity of existing item
    //                         orderItems[existingItemIndex].quantity += 1;
    //                         orderItems[existingItemIndex].total = (
    //                             orderItems[existingItemIndex].quantity * product.base_price
    //                         ).toFixed(2);

    //                         // Update existing row in the table
    //                         const existingRow = itemSelectedTable.querySelector(`[data-kt-ecommerce-edit-order-id="${product.id}"]`);
    //                         if (existingRow) {
    //                             const quantityInput = existingRow.querySelector('.quantityInput');
    //                             const totalElement = existingRow.querySelector('[data-kt-pos-element="item-total"]');

    //                             quantityInput.value = orderItems[existingItemIndex].quantity;
    //                             totalElement.textContent = formatMoney(orderItems[existingItemIndex].total);
    //                         }
    //                     } else {
    //                         // Add new product to order
    //                         const newItem = {
    //                             productId: product.id,
    //                             productName: product.name,
    //                             productPrice: product.base_price,
    //                             quantity: 1,
    //                             total: product.base_price,
    //                             barcode: product.sku
    //                         };

    //                         orderItems.push(newItem);

    //                         // Create and append new row
    //                         const row = document.createElement('tr');
    //                         row.setAttribute('data-kt-ecommerce-edit-order-id', product.id);
    //                         row.setAttribute('data-barcode', product.sku);
    //                         row.innerHTML = `
    //                             <td>${product.name}</td>
    //                             <td>
    //                                 <input type="number"
    //                                     class="form-control quantityInput"
    //                                     value="1"
    //                                     min="1"
    //                                     data-product-id="${product.id}"
    //                                 />
    //                             </td>
    //                             <td data-kt-pos-element="item-total">${formatMoney(product.base_price)}</td>
    //                             <td>
    //                                 <button class="btn btn-sm btn-icon btn-light-danger remove-item" data-product-id="${product.id}">
    //                                     <i class="ki-duotone ki-cross fs-2"></i>
    //                                 </button>
    //                             </td>


                                
    //                         `;

    //                         // Quantity change event
    //                         const quantityInput = row.querySelector('.quantityInput');
    //                         quantityInput.addEventListener('change', (e) => {
    //                             const newQuantity = parseInt(e.target.value);
    //                             const productId = e.target.getAttribute('data-product-id');

    //                             const itemIndex = orderItems.findIndex(item => item.productId === productId);
    //                             if (itemIndex > -1) {
    //                                 orderItems[itemIndex].quantity = newQuantity;
    //                                 orderItems[itemIndex].total = (newQuantity * orderItems[itemIndex].productPrice).toFixed(2);

    //                                 const totalCell = row.querySelector('[data-kt-pos-element="item-total"]');
    //                                 totalCell.textContent = formatMoney(orderItems[itemIndex].total);

    //                                 calculateTotals();
    //                             }
    //                         });

    //                         // Remove item event
    //                         const removeButton = row.querySelector('.remove-item');
    //                         removeButton.addEventListener('click', (e) => {
    //                             const productId = e.currentTarget.getAttribute('data-product-id');

    //                             // Remove from orderItems
    //                             orderItems = orderItems.filter(item => item.productId !== productId);

    //                             // Remove row from table
    //                             row.remove();

    //                             // Uncheck corresponding product in product table
    //                             const productTableRow = document.querySelector(`#kt_ecommerce_edit_order_product_table-ajax tr[data-kt-ecommerce-edit-order-id-ajax="${productId}"]`);
    //                             if (productTableRow) {
    //                                 const checkbox = productTableRow.querySelector('input[type="checkbox"]');
    //                                 if (checkbox) checkbox.checked = false;
    //                             }

    //                             calculateTotals();
    //                             updatePrintBillsButtonState();
    //                         });

    //                         itemSelectedTable.appendChild(row);
    //                     }

    //                     calculateTotals();
    //                     updatePrintBillsButtonState();
    //                 };

    //                 // Search and Barcode Scanning
    //                 const handleSearchOrScan = () => {
    //                     barcodeInput.addEventListener('input', (e) => {
    //                         clearTimeout(timeout);
    //                         barcodeBuffer = e.target.value.trim();

    //                         barcodePreloader.classList.remove('d-none');
    //                         barcodePreloader.classList.add('d-flex');

    //                         timeout = setTimeout(() => {
    //                             const inputValue = barcodeBuffer.trim();
    //                             barcodeBuffer = '';

    //                             if (inputValue) {
    //                                 fetch(`${productSearchQuery}?query=${inputValue}`)
    //                                     .then(response => response.json())
    //                                     .then(data => {
    //                                         barcodePreloader.classList.remove('d-flex');
    //                                         barcodePreloader.classList.add('d-none');

    //                                         if (data.status === 'success' && data.data.length > 0) {
    //                                             // If exact match found, add first product
    //                                             addProductToOrder(data.data[0]);
    //                                             populateTable(data.data);
    //                                         } else {
    //                                             Swal.fire({
    //                                                 icon: 'error',
    //                                                 title: 'Error',
    //                                                 text: 'No products found.',
    //                                             });
    //                                         }
    //                                     })
    //                                     .catch(error => {
    //                                         console.error('Error fetching products:', error);
    //                                         barcodePreloader.classList.remove('d-flex');
    //                                         barcodePreloader.classList.add('d-none');
    //                                     });
    //                             } else {
    //                                 barcodePreloader.classList.remove('d-flex');
    //                                 barcodePreloader.classList.add('d-none');
    //                             }
    //                         }, 300);
    //                     });
    //                 };

    //                 const populateTable = (products) => {
    //                     const tbody = document.querySelector('#kt_ecommerce_edit_order_product_table-ajax tbody');
    //                     tbody.innerHTML = ''; // Clear the table

    //                     products.forEach(product => {
    //                         const row = document.createElement('tr');
    //                         row.setAttribute('data-barcode', product.sku);
    //                         row.setAttribute('data-product-id', product.id);
    //                         row.setAttribute('data-kt-ecommerce-edit-order-id-ajax', product.id);

    //                         row.innerHTML = `
    //                             <td>
    //                                 <div class="form-check form-check-sm form-check-custom form-check-solid">
    //                                     <input class="form-check-input product-checkbox" type="checkbox" value="${product.id}" />
    //                                 </div>
    //                             </td>
    //                             <td>
    //                                 <div class="d-flex align-items-center">
    //                                     <div class="ms-5">
    //                                         <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">${product.name}</a>
    //                                         <div class="fw-semibold fs-7">Price: ₦<span>${formatMoney(product.base_price)}</span></div>
    //                                         <div class="text-muted fs-7">SKU: ${product.sku}</div>
    //                                     </div>
    //                                 </div>
    //                             </td>
    //                             <td class="text-end pe-5"><span class="fw-bold text-success ms-3">${Number(product.stock).toFixed(2)}</span></td>
    //                         `;

    //                         // Add checkbox event listener
    //                         const checkbox = row.querySelector('.product-checkbox');
    //                         checkbox.addEventListener('change', (e) => {
    //                             if (e.target.checked) {
    //                                 addProductToOrder(product);
    //                             } else {
    //                                 // Remove product from order
    //                                 orderItems = orderItems.filter(item => item.productId !== product.id);
    //                                 const existingRow = itemSelectedTable.querySelector(`[data-kt-ecommerce-edit-order-id="${product.id}"]`);
    //                                 if (existingRow) existingRow.remove();

    //                                 calculateTotals();
    //                                 updatePrintBillsButtonState();
    //                             }
    //                         });

    //                         tbody.appendChild(row);
    //                     });
    //                 };

    //                 // Clear All Button
    //                 clearAllButton.addEventListener('click', () => {
    //                     itemSelectedTable.innerHTML = '';
    //                     orderItems = [];
    //                     calculateTotals();
    //                     updatePrintBillsButtonState();

    //                     // Uncheck all checkboxes in product table
    //                     const checkboxes = document.querySelectorAll('#kt_ecommerce_edit_order_product_table-ajax .product-checkbox');
    //                     checkboxes.forEach(checkbox => checkbox.checked = false);
    //                 });

    //                 // Initialize
    //                 handleSearchOrScan();
    //                 updatePrintBillsButtonState();

    //                 // Attach order submission logic (you might need to adapt this to your specific backend)
    //                 const sendOrderToBackend = () => {
    //                     // Implement your order submission logic here
    //                     // This is a placeholder implementation
    //                     Swal.fire({
    //                         title: 'Order Submitted',
    //                         text: `Order ${orderId} has been processed`,
    //                         icon: 'success'
    //                     });
    //                 };

    //                 // Print Bills Button
    //                 if (printBillsButton) {
    //                     printBillsButton.addEventListener('click', sendOrderToBackend);
    //                 }

    // });




//     document.addEventListener('DOMContentLoaded', function () {
//         // Utility Functions
//         const formatMoney = (amount) => {
//             const number = parseFloat(amount);
//             if (isNaN(number)) return '₦0.00';
//             return '₦' + number.toLocaleString('en-NG', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
//         };
    
//         const generateOrderId = () => 'ORD-' + new Date().getTime();
    
//         // DOM Elements
//         const printBillsButton = document.querySelector('.btn-primary.fs-1');
//         const printPreviewModal = new bootstrap.Modal(document.getElementById('print-receipt'));
//         const printSlipButton = document.getElementById('printSlip');
//         const itemSelectedTable = document.getElementById('itemSelectedTable');
//         const barcodeInput = document.getElementById('searchInput');
//         const clearAllButton = document.querySelector('.btn-light-primary');
    
//         const quantityModal = document.getElementById('quantityModal');
//         const modalQuantityInput = document.getElementById('modalQuantityInput');
//         const updateQuantityBtn = document.getElementById('updateQuantityBtn');
    
//         // Total Calculation Elements
//         const totalElement = document.querySelector('[data-kt-pos-element="total"]');
//         const discountElement = document.querySelector('[data-kt-pos-element="discount"]');
//         const taxElement = document.querySelector('[data-kt-pos-element="tax"]');
//         const grandTotalElement = document.querySelector('[data-kt-pos-element="grant-total"]');
    
//         // State Variables
//         let orderItems = [];
//         let orderId = generateOrderId();
//         let barcodeBuffer = '';
//         let timeout;
    
//         // Preloader for Barcode
//         const barcodePreloader = document.createElement('div');
//         barcodePreloader.id = 'barcodePreloader';
//         barcodePreloader.classList.add('position-absolute', 'd-none', 'align-items-center', 'justify-content-center');
//         barcodePreloader.style.cssText = 'top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1050; width: 50px; height: 50px;';
//         barcodePreloader.innerHTML = `
//             <div class="spinner-border text-primary" role="status" style="width: 30px; height: 30px;">
//                 <span class="visually-hidden">Loading...</span>
//             </div>
//         `;
//         document.body.appendChild(barcodePreloader);
    
//         // Utility Functions for Order Management
//         const calculateTotals = () => {
//             let subtotal = orderItems.reduce((total, item) => total + parseFloat(item.total), 0);
//             const discount = 0; // Implement discount logic if needed
//             const taxRate = 0.075; // Example: 7.5% tax
//             const tax = subtotal * taxRate;
//             const grandTotal = subtotal + tax - discount;
    
//             totalElement.innerHTML = formatMoney(subtotal);
//             discountElement.innerHTML = `- ${formatMoney(discount)}`;
//             taxElement.innerHTML = formatMoney(tax);
//             grandTotalElement.innerHTML = formatMoney(grandTotal);
//         };
    
//         const updatePrintBillsButtonState = () => {
//             if (printBillsButton) {
//                 printBillsButton.disabled = orderItems.length === 0;
//             }
//         };
    
//         // Disable Print Bills Button Initially
//         if (printBillsButton) {
//             printBillsButton.disabled = true;
//         }


//         document.addEventListener('DOMContentLoaded', function () {
//             // Existing utility functions and setup...
        
//             // Update the function to handle removing items
//             const setupRemoveItemListeners = () => {
//                 const removeButtons = itemSelectedTable.querySelectorAll('.remove-item');
//                 removeButtons.forEach(button => {
//                     button.addEventListener('click', (e) => {
//                         const row = e.target.closest('tr');
//                         const productId = row.getAttribute('data-kt-ecommerce-edit-order-id');
//                         removeProductFromOrder(productId);
        
//                         // Uncheck the corresponding checkbox in the product list
//                         const productCheckbox = document.querySelector(`#kt_ecommerce_edit_order_product_table-ajax input[value="${productId}"]`);
//                         if (productCheckbox) {
//                             productCheckbox.checked = false;
//                         }
//                     });
//                 });
//             };
        
//             // Modify addProductToOrder to call setupRemoveItemListeners
//             const addProductToOrder = (product) => {
//                 // Existing addProductToOrder logic...
        
//                 // After adding the row, set up remove item listeners
//                 setupRemoveItemListeners();
                
//                 // Add click event for quantity input to show modal
//                 const quantityInputs = itemSelectedTable.querySelectorAll('.quantityInput');
//                 quantityInputs.forEach(input => {
//                     input.addEventListener('click', handleQuantityClick);
//                 });
//             };
        
//             // Modify handleQuantityClick to use the correct row
//             const handleQuantityClick = (event) => {
//                 const selectedProductRow = event.target.closest('[data-kt-pos-element="item"]');
//                 const currentQuantity = selectedProductRow.querySelector('#quantityInput').value;
                
//                 modalQuantityInput.value = currentQuantity;
                
//                 const modal = new bootstrap.Modal(quantityModal);
//                 modal.show();
        
//                 // Update the update quantity button to use the correct row
//                 updateQuantityBtn.onclick = () => {
//                     updateQuantity(selectedProductRow);
//                 };
//             };
        
//             // Modify updateQuantity to accept the row as a parameter
//             const updateQuantity = (selectedProductRow) => {
//                 const newQuantity = parseInt(modalQuantityInput.value);
//                 const price = parseFloat(selectedProductRow.getAttribute('data-product-price'));
        
//                 if (isNaN(newQuantity) || newQuantity <= 0) {
//                     Swal.fire({
//                         icon: 'error',
//                         title: 'Invalid Quantity',
//                         text: 'Please enter a valid quantity (positive integer).',
//                     });
//                     return;
//                 }
        
//                 const total = (newQuantity * price).toFixed(2);
//                 selectedProductRow.querySelector('#quantityInput').value = newQuantity;
//                 selectedProductRow.querySelector('[data-kt-pos-element="item-total"]').innerHTML = formatMoney(total);
        
//                 // Update orderItems array
//                 const productId = selectedProductRow.getAttribute('data-kt-ecommerce-edit-order-id');
//                 const updatedItem = orderItems.find(item => item.productId === productId);
//                 if (updatedItem) {
//                     updatedItem.quantity = newQuantity;
//                     updatedItem.total = total;
//                 }
        
//                 calculateTotals();
        
//                 // Close the modal
//                 const modal = bootstrap.Modal.getInstance(quantityModal);
//                 modal.hide();
//             };
        
//             // Modify barcode input event listener
//             barcodeInput.addEventListener('input', (e) => {
//                 clearTimeout(timeout);
//                 barcodeBuffer = e.target.value.trim();
        
//                 barcodePreloader.classList.remove('d-none');
//                 barcodePreloader.classList.add('d-flex');
        
//                 timeout = setTimeout(() => {
//                     const inputValue = barcodeBuffer.trim();
//                     barcodeBuffer = '';
        
//                     if (inputValue) {
//                         // Ensure productSearchQuery is defined
//                         if (typeof productSearchQuery === 'undefined') {
//                             console.error('productSearchQuery is not defined');
//                             return;
//                         }
        
//                         fetch(`${productSearchQuery}?query=${inputValue}`)
//                             .then(response => response.json())
//                             .then(data => {
//                                 barcodePreloader.classList.remove('d-flex');
//                                 barcodePreloader.classList.add('d-none');
        
//                                 if (data.status === 'success' && data.data && data.data.length > 0) {
//                                     populateTable(data.data);
//                                     bindCheckboxEvents(); // Rebind events after populating
//                                 } else {
//                                     Swal.fire({
//                                         icon: 'error',
//                                         title: 'Error',
//                                         text: 'No products found.',
//                                     });
//                                 }
//                             })
//                             .catch(error => {
//                                 console.error('Error fetching products:', error);
//                                 barcodePreloader.classList.remove('d-flex');
//                                 barcodePreloader.classList.add('d-none');
//                             });
//                     } else {
//                         barcodePreloader.classList.remove('d-flex');
//                         barcodePreloader.classList.add('d-none');
//                     }
//                 }, 300);
//             });
        
//             // Initial setup of remove item and quantity listeners
//             setupRemoveItemListeners();
//         });
    
       


//     //      // Modify addProductToOrder to call setupRemoveItemListeners
//     // const addProductToOrder = (product) => {
//     //     // Existing addProductToOrder logic...

//     //     // After adding the row, set up remove item listeners
//     //     setupRemoveItemListeners();
        
//     //     // Add click event for quantity input to show modal
//     //     const quantityInputs = itemSelectedTable.querySelectorAll('.quantityInput');
//     //     quantityInputs.forEach(input => {
//     //         input.addEventListener('click', handleQuantityClick);
//     //     });
//     // };

//     // Modify handleQuantityClick to use the correct row
//     const handleQuantityClick = (event) => {
//         const selectedProductRow = event.target.closest('[data-kt-pos-element="item"]');
//         const currentQuantity = selectedProductRow.querySelector('#quantityInput').value;
        
//         modalQuantityInput.value = currentQuantity;
        
//         const modal = new bootstrap.Modal(quantityModal);
//         modal.show();

//         // Update the update quantity button to use the correct row
//         updateQuantityBtn.onclick = () => {
//             updateQuantity(selectedProductRow);
//         };
//     };

//     // Modify updateQuantity to accept the row as a parameter
//     const updateQuantity = (selectedProductRow) => {
//         const newQuantity = parseInt(modalQuantityInput.value);
//         const price = parseFloat(selectedProductRow.getAttribute('data-product-price'));

//         if (isNaN(newQuantity) || newQuantity <= 0) {
//             Swal.fire({
//                 icon: 'error',
//                 title: 'Invalid Quantity',
//                 text: 'Please enter a valid quantity (positive integer).',
//             });
//             return;
//         }

//         const total = (newQuantity * price).toFixed(2);
//         selectedProductRow.querySelector('#quantityInput').value = newQuantity;
//         selectedProductRow.querySelector('[data-kt-pos-element="item-total"]').innerHTML = formatMoney(total);

//         // Update orderItems array
//         const productId = selectedProductRow.getAttribute('data-kt-ecommerce-edit-order-id');
//         const updatedItem = orderItems.find(item => item.productId === productId);
//         if (updatedItem) {
//             updatedItem.quantity = newQuantity;
//             updatedItem.total = total;
//         }

//         calculateTotals();

//         // Close the modal
//         const modal = bootstrap.Modal.getInstance(quantityModal);
//         modal.hide();
//     };



//         // Function to handle checkbox click and add/remove product from order
//         const handleCheckboxClick = (e, product) => {
//             const checkbox = e.target;
//             if (checkbox.checked) {
//                 // When checked, add the product to the order
//                 addProductToOrder(product);
//             } else {
//                 // Optionally handle uncheck (remove item from order)
//                 removeProductFromOrder(product.id);
//             }
//         };

    
      


//        // Function to add product to order
// const addProductToOrder = (product) => {
//     // Check if product already exists in order
//     const existingItemIndex = orderItems.findIndex(item => item.productId === product.id);

//     if (existingItemIndex > -1) {
//         // Increment quantity of existing item
//         orderItems[existingItemIndex].quantity += 1;
//         orderItems[existingItemIndex].total = (
//             orderItems[existingItemIndex].quantity * product.base_price
//         ).toFixed(2);

//         // Update existing row in the table
//         const existingRow = itemSelectedTable.querySelector(`[data-kt-ecommerce-edit-order-id="${product.id}"]`);
//         if (existingRow) {
//             const quantityInput = existingRow.querySelector('.quantityInput');
//             const totalElement = existingRow.querySelector('[data-kt-pos-element="item-total"]');

//             quantityInput.value = orderItems[existingItemIndex].quantity;
//             totalElement.textContent = formatMoney(orderItems[existingItemIndex].total);
//         }
//     } else {
//         // Add new product to order
//         const newItem = {
//             productId: product.id,
//             productName: product.name,
//             productPrice: product.base_price,
//             quantity: 1,
//             total: product.base_price,
//             barcode: product.sku
//         };

//         orderItems.push(newItem);

//         // Create and append new row with the desired structure
//         const row = document.createElement('tr');
//         row.setAttribute('data-kt-ecommerce-edit-order-id', product.id);
//         row.setAttribute('data-barcode', product.sku);
//         row.setAttribute('data-product-id', product.id);
//         row.setAttribute('data-kt-pos-element', 'item');
//         row.setAttribute('data-kt-pos-item-price', product.base_price);
      
     

//         // Adding the new attributes for product name and product price
//         row.setAttribute('data-product-name', product.name); // Assuming productName is available
//         row.setAttribute('data-product-price', product.base_price); // Assuming productPrice is available
//         const initialQuantity = 1;
//         const initialTotal = (initialQuantity * product.base_price).toFixed(2);

//         row.innerHTML = ` <td>
//                                 <div class="form-check form-check-sm form-check-custom form-check-solid">
//                                             <input class="form-check-input" type="checkbox" value="${product.id}" />
//                                         </div>
//                                     </td>
//                                     <td>
//                                         <div class="d-flex align-items-center" data-kt-ecommerce-edit-order-filter="product" data-kt-ecommerce-edit-order-id="${product.id}">

//                                             <!-- Title and Details -->
//                                             <div class="ms-5">
//                                                 <!-- Title -->
//                                                 <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold"> ${product.name}</a>
//                                                 <!-- Price -->
//                                                 <div class="fw-semibold fs-7">Price: ₦<span data-kt-ecommerce-edit-order-filter="price">
//                                                 <span class="fw-bold text-success ms-3">${formatMoney(product.base_price)}</span>
//                                                 </span></div>
//                                                 <!-- SKU -->
//                                                 <div class="text-muted fs-7">SKU:${product.sku}</div>
//                                             </div>
//                                         </div>
//                                     </td>
//                                     <td class="text-end pe-5" data-order="0">
//                                         <input type="text" id="quantityInput" value="${initialQuantity}" readonly class="form-control border-0 text-center px-0 quantityInput" style="font-size: 18px; width: 50px;">
//                                     </td>
//                                     <td class="text-end pe-5" data-order="0">

//                                          <span class="fw-bold text-success ms-3" data-kt-pos-element="item-total">${formatMoney(initialTotal)}</span>
//                                     </td>
//                                     <td class="text-end">
//                                         <button class="btn btn-sm btn-icon btn-light-danger remove-item" type="button">
//                                             <i class="ki-duotone ki-cross fs-2">
//                                                 <span class="path1"></span>
//                                                 <span class="path2"></span>
//                                             </i>
//                                         </button>
//                                         </td> `;

//         // Append the row to the table
//         itemSelectedTable.appendChild(row);
        
//         // After adding the row, set up remove item listeners
//         setupRemoveItemListeners();
        
//         // Add click event for quantity input to show modal
//         const quantityInputs = itemSelectedTable.querySelectorAll('.quantityInput');
//         quantityInputs.forEach(input => {
//             input.addEventListener('click', handleQuantityClick);
//         });
//     }

//     calculateTotals();
//     updatePrintBillsButtonState();
// };

// // Function to remove product from order
// const removeProductFromOrder = (productId) => {
//     // Remove from orderItems
//     orderItems = orderItems.filter(item => item.productId !== productId);

//     // Remove row from table
//     const rowToRemove = itemSelectedTable.querySelector(`[data-kt-ecommerce-edit-order-id="${productId}"]`);
//     if (rowToRemove) {
//         rowToRemove.remove();
//     }

//     calculateTotals();
//     updatePrintBillsButtonState();
// };


// // Function to bind checkbox events to products in product list
// const bindCheckboxEvents = () => {
//     const productCheckboxes = document.querySelectorAll('#kt_ecommerce_edit_order_product_table-ajax input[type="checkbox"]');
//     productCheckboxes.forEach(checkbox => {
//         checkbox.addEventListener('change', (e) => {
//             const productRow = e.target.closest('tr');
//             const productId = productRow.getAttribute('data-kt-ecommerce-edit-order-id-ajax');
//             const product = products.find(p => p.id === productId); // Assuming 'products' is an array of product objects
            
//             handleCheckboxClick(e, product);
//         });
//     });
// };

// // Call this function after populating the product table
// bindCheckboxEvents();
    



//  // Modify barcode input event listener
//  barcodeInput.addEventListener('input', (e) => {
//     clearTimeout(timeout);
//     barcodeBuffer = e.target.value.trim();

//     barcodePreloader.classList.remove('d-none');
//     barcodePreloader.classList.add('d-flex');

//     timeout = setTimeout(() => {
//         const inputValue = barcodeBuffer.trim();
//         barcodeBuffer = '';

//         if (inputValue) {
//             // Ensure productSearchQuery is defined
//             if (typeof productSearchQuery === 'undefined') {
//                 console.error('productSearchQuery is not defined');
//                 return;
//             }

//             fetch(`${productSearchQuery}?query=${inputValue}`)
//                 .then(response => response.json())
//                 .then(data => {
//                     barcodePreloader.classList.remove('d-flex');
//                     barcodePreloader.classList.add('d-none');

//                     if (data.status === 'success' && data.data && data.data.length > 0) {
//                         populateTable(data.data);
//                         bindCheckboxEvents(); // Rebind events after populating
//                     } else {
//                         Swal.fire({
//                             icon: 'error',
//                             title: 'Error',
//                             text: 'No products found.',
//                         });
//                     }
//                 })
//                 .catch(error => {
//                     console.error('Error fetching products:', error);
//                     barcodePreloader.classList.remove('d-flex');
//                     barcodePreloader.classList.add('d-none');
//                 });
//         } else {
//             barcodePreloader.classList.remove('d-flex');
//             barcodePreloader.classList.add('d-none');
//         }
//     }, 300);
// });

// // Initial setup of remove item and quantity listeners
// setupRemoveItemListeners();
    
       




//         const populateTable = (products) => {
//             const tbody = document.querySelector('#kt_ecommerce_edit_order_product_table-ajax tbody');
//             tbody.innerHTML = '';  // Clear existing table rows
        
//             products.forEach(product => {
//                 const row = document.createElement('tr');
//                 row.setAttribute('data-barcode', product.sku);
//                 row.setAttribute('data-product-id', product.id);
//                 row.setAttribute('data-kt-ecommerce-edit-order-id-ajax', product.id);
//                 row.setAttribute('data-kt-pos-element', 'item');
//                 row.setAttribute('data-kt-pos-item-price', product.base_price);
//                // row.setAttribute('data-kt-ecommerce-edit-order-id', product.id);
               

//                 // Adding the new attributes for product name and product price
//                 row.setAttribute('data-product-name', product.name); // Assuming productName is available
//                 row.setAttribute('data-product-price', product.base_price); // Assuming productPrice is available
             

        
//                 row.innerHTML = `
//                     <td>
//                         <div class="form-check form-check-sm form-check-custom form-check-solid">
//                             <input class="form-check-input" type="checkbox" value="${product.id}" />
//                         </div>
//                     </td>
//                     <td>
//                         <div class="d-flex align-items-center" data-kt-ecommerce-edit-order-filter-ajax="product" data-kt-ecommerce-edit-order-id-ajax="${product.id}">
//                             <!--begin::Thumbnail-->
//                             <a href="#" class="symbol symbol-50px">
//                                 <span class="symbol-label" style="background-image:url('${product.cover ? product.cover.path : '/storage/uploads/category_default.jpg'}');"></span>
//                             </a>
//                             <!--end::Thumbnail-->
//                             <div class="ms-5">
//                                 <!--begin::Title-->
//                                 <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">${product.name}</a>
//                                 <!--end::Title-->
//                                 <!--begin::Price-->
//                                 <div class="fw-semibold fs-7">Price: ₦<span data-kt-ecommerce-edit-order-filter-ajax="price">
//                                     <span class="fw-bold text-success ms-3">${product.base_price}</span>
//                                 </span></div>
//                                 <!--end::Price-->
//                                 <!--begin::SKU-->
//                                 <div class="text-muted fs-7">SKU: ${product.sku}</div>
//                                 <!--end::SKU-->
//                             </div>
//                         </div>
//                     </td>
//                     <td class="text-end pe-5" data-order="0">
//                         <span class="badge badge-light-danger">Sold out</span>
//                         <span class="fw-bold text-success ms-3">${Number(product.stock).toFixed(2)}</span>
//                     </td>
//                     <td class="text-end pe-5" data-order="0">
//                         <span class="badge badge-light-danger">Sold out</span>
//                         <span class="fw-bold text-success ms-3">${Number(product.stock).toFixed(2)}</span>
//                     </td>
//                     <td class="text-end pe-5" data-order="0">
//                         <span class="badge badge-light-danger">Sold out</span>
//                         <span class="fw-bold text-success ms-3">${Number(product.stock).toFixed(2)}</span>
//                     </td>
//                     <td class="text-end pe-5" data-order="0">
//                         <span class="badge badge-light-danger">Sold out</span>
//                         <span class="fw-bold text-success ms-3">${Number(product.stock).toFixed(2)}</span>
//                     </td>
//                 `;
        
//                 const checkbox = row.querySelector('.form-check-input');
//                 checkbox.addEventListener('change', (e) => {
//                     if (e.target.checked) {
//                         addProductToOrder(product);
//                     } else {
//                         orderItems = orderItems.filter(item => item.productId !== product.id);
//                         const rowToRemove = itemSelectedTable.querySelector(`[data-kt-ecommerce-edit-order-id="${product.id}"]`);
//                         if (rowToRemove) rowToRemove.remove();
//                         calculateTotals();
//                         updatePrintBillsButtonState();
//                     }
//                 });
        
//                 tbody.appendChild(row);
//             });
//         };
        
    
//         // Handle clear all action
//         clearAllButton.addEventListener('click', () => {
//             orderItems = [];
//             itemSelectedTable.innerHTML = '';
//             calculateTotals();
//             updatePrintBillsButtonState();
//         });
    
//         // // Initialize the table with products (example data)
//         // populateTable([
//         //     {
//         //         id: 1,
//         //         name: 'Product 1',
//         //         base_price: 500,
//         //         sku: 'SKU001',
//         //     },
//         //     {
//         //         id: 2,
//         //         name: 'Product 2',
//         //         base_price: 1000,
//         //         sku: 'SKU002',
//         //     },
//         //     // Add more products as needed
//         // ]);
//     });

    

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

    const quantityModal = document.getElementById('quantityModal');
    const modalQuantityInput = document.getElementById('modalQuantityInput');
    const updateQuantityBtn = document.getElementById('updateQuantityBtn');

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
    let selectedProductRow = null;

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

    // Disable Print Bills Button Initially
    if (printBillsButton) {
        printBillsButton.disabled = true;
    }

    // Function to remove product from order
    const removeProductFromOrder = (productId) => {
        // Remove from orderItems
        orderItems = orderItems.filter(item => item.productId !== productId);

        // Remove row from table
        const rowToRemove = itemSelectedTable.querySelector(`[data-kt-ecommerce-edit-order-id="${productId}"]`);
        if (rowToRemove) {
            rowToRemove.remove();
        }

        // Uncheck the corresponding checkbox in the product list
        const productCheckbox = document.querySelector(`#kt_ecommerce_edit_order_product_table-ajax input[value="${productId}"]`);
        if (productCheckbox) {
            productCheckbox.checked = false;
        }

        calculateTotals();
        updatePrintBillsButtonState();
    };

    // Function to handle quantity modal
    const handleQuantityClick = (event) => {
        selectedProductRow = event.target.closest('[data-kt-pos-element="item"]');
        const currentQuantity = selectedProductRow.querySelector('#quantityInput').value;
        
        modalQuantityInput.value = currentQuantity;
        
        const modal = new bootstrap.Modal(quantityModal);
        modal.show();
    };

    // Update quantity in modal
    const updateQuantity = () => {
        if (selectedProductRow) {
            const newQuantity = parseInt(modalQuantityInput.value);
            const price = parseFloat(selectedProductRow.getAttribute('data-product-price'));

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

            // Update orderItems array
            const productId = selectedProductRow.getAttribute('data-kt-ecommerce-edit-order-id');
            const updatedItem = orderItems.find(item => item.productId === productId);
            if (updatedItem) {
                updatedItem.quantity = newQuantity;
                updatedItem.total = total;
            }

            calculateTotals();

            // Close the modal
            const modal = bootstrap.Modal.getInstance(quantityModal);
            modal.hide();
        }
    };

    // Function to add product to order
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

            // Create and append new row with the desired structure
            const row = document.createElement('tr');
            row.setAttribute('data-barcode', product.sku);
            row.setAttribute('data-product-id', product.id);
            row.setAttribute('data-kt-ecommerce-edit-order-id', product.id);
            row.setAttribute('data-kt-pos-element', 'item');
            row.setAttribute('data-kt-pos-item-price', product.base_price);
            row.setAttribute('data-product-name', product.name);
            row.setAttribute('data-product-price', product.base_price);

            const initialQuantity = 1;
            const initialTotal = (initialQuantity * product.base_price).toFixed(2);

            row.innerHTML = `
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="${product.id}" checked />
                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center" data-kt-ecommerce-edit-order-filter="product" data-kt-ecommerce-edit-order-id="${product.id}">
                        <div class="ms-5">
                            <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">${product.name}</a>
                            <div class="fw-semibold fs-7">Price: ₦<span data-kt-ecommerce-edit-order-filter="price">
                                <span class="fw-bold text-success ms-3">${formatMoney(product.base_price)}</span>
                            </span></div>
                            <div class="text-muted fs-7">SKU: ${product.sku}</div>
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

            // Add event listeners to new row elements
            const quantityInput = row.querySelector('.quantityInput');
            quantityInput.addEventListener('click', handleQuantityClick);

            const removeButton = row.querySelector('.remove-item');
            removeButton.addEventListener('click', () => {
                removeProductFromOrder(product.id);
            });

            // Append the row to the table
            itemSelectedTable.appendChild(row);
        }

        calculateTotals();
        updatePrintBillsButtonState();
    };

    // Function to populate product table
    const populateTable = (products) => {
        const tbody = document.querySelector('#kt_ecommerce_edit_order_product_table-ajax tbody');
        tbody.innerHTML = '';  // Clear existing table rows

        products.forEach(product => {
            const row = document.createElement('tr');
            row.setAttribute('data-barcode', product.sku);
            row.setAttribute('data-product-id', product.id);
            row.setAttribute('data-kt-ecommerce-edit-order-id-ajax', product.id);
            row.setAttribute('data-kt-pos-element', 'item');
            row.setAttribute('data-kt-pos-item-price', product.base_price);
            row.setAttribute('data-product-name', product.name);
            row.setAttribute('data-product-price', product.base_price);

            row.innerHTML = `
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="${product.id}" />
                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center" data-kt-ecommerce-edit-order-filter-ajax="product" data-kt-ecommerce-edit-order-id-ajax="${product.id}">
                        <a href="#" class="symbol symbol-50px">
                            <span class="symbol-label" style="background-image:url('${product.cover ? product.cover.path : '/storage/uploads/category_default.jpg'}');"></span>
                        </a>
                        <div class="ms-5">
                            <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">${product.name}</a>
                            <div class="fw-semibold fs-7">Price: ₦<span data-kt-ecommerce-edit-order-filter-ajax="price">
                                <span class="fw-bold text-success ms-3">${product.base_price}</span>
                            </span></div>
                            <div class="text-muted fs-7">SKU: ${product.sku}</div>
                        </div>
                    </div>
                </td>
                <td class="text-end pe-5" data-order="0">
                    <span class="badge badge-light-danger">Stock: ${Number(product.stock).toFixed(2)}</span>
                </td>
            `;

            const checkbox = row.querySelector('.form-check-input');
            checkbox.addEventListener('change', (e) => {
                if (e.target.checked) {
                    addProductToOrder(product);
                } else {
                    removeProductFromOrder(product.id);
                }
            });

            tbody.appendChild(row);
        });
    };

    // Barcode input event listener
    barcodeInput.addEventListener('input', (e) => {
        clearTimeout(timeout);
        barcodeBuffer = e.target.value.trim();

        barcodePreloader.classList.remove('d-none');
        barcodePreloader.classList.add('d-flex');

        timeout = setTimeout(() => {
            const inputValue = barcodeBuffer.trim();
            barcodeBuffer = '';

            if (inputValue) {
                // Ensure productSearchQuery is defined
                if (typeof productSearchQuery === 'undefined') {
                    console.error('productSearchQuery is not defined');
                    return;
                }

                fetch(`${productSearchQuery}?query=${inputValue}`)
                    .then(response => response.json())
                    .then(data => {
                        barcodePreloader.classList.remove('d-flex');
                        barcodePreloader.classList.add('d-none');

                        if (data.status === 'success' && data.data && data.data.length > 0) {
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

// Handle clear all action
clearAllButton.addEventListener('click', () => {
    orderItems = [];
    itemSelectedTable.innerHTML = '';
    calculateTotals();
    updatePrintBillsButtonState();

    // Uncheck all checkboxes in product list
    const productCheckboxes = document.querySelectorAll('#kt_ecommerce_edit_order_product_table-ajax input[type="checkbox"]');
    productCheckboxes.forEach(checkbox => {
        checkbox.checked = false;
    });
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
