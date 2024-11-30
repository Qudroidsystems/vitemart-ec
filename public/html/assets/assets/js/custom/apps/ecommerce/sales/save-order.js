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

    // Handle product select
    // const handleProductSelect = () => {
    //     // Define variables
    //     const checkboxes = table.querySelectorAll('[type="checkbox"]');
    //     const target = document.getElementById('kt_ecommerce_edit_order_selected_products');
    //     const totalPrice = document.getElementById('kt_ecommerce_edit_order_total_price');

    //     // Loop through all checked products
    //     checkboxes.forEach(checkbox => {
    //         checkbox.addEventListener('change', e => {
    //             // Select parent row element
    //             const parent = checkbox.closest('tr');

    //             // Clone parent element as variable
    //             const product = parent.querySelector('[data-kt-ecommerce-edit-order-filter="product"]').cloneNode(true);

    //             // Create inner wrapper
    //             const innerWrapper = document.createElement('div');

    //             // Store inner content
    //             const innerContent = product.innerHTML;

    //             // Add & remove classes on parent wrapper
    //             const wrapperClassesAdd = ['col', 'my-2'];
    //             const wrapperClassesRemove = ['d-flex', 'align-items-center'];

    //             // Define additional classes
    //             const additionalClasses = ['border', 'border-dashed', 'rounded', 'p-3', 'bg-body'];

    //             // Update parent wrapper classes
    //             product.classList.remove(...wrapperClassesRemove);
    //             product.classList.add(...wrapperClassesAdd);

    //             // Remove parent default content
    //             product.innerHTML = '';

    //             // Update inner wrapper classes
    //             innerWrapper.classList.add(...wrapperClassesRemove);
    //             innerWrapper.classList.add(...additionalClasses);

    //             // Apply stored inner content into new inner wrapper
    //             innerWrapper.innerHTML = innerContent;

    //             // Append new inner wrapper to parent wrapper
    //             product.appendChild(innerWrapper);

    //             // Get product id
    //             const productId = product.getAttribute('data-kt-ecommerce-edit-order-id');

    //             if (e.target.checked) {
    //                 // Add product to selected product wrapper
    //                 target.appendChild(product);
    //             } else {
    //                 // Remove product from selected product wrapper
    //                 const selectedProduct = target.querySelector('[data-kt-ecommerce-edit-order-id="' + productId + '"]');
    //                 if (selectedProduct) {
    //                     target.removeChild(selectedProduct);
    //                 }
    //             }

    //             // Trigger empty message logic
    //             detectEmpty();
    //         });
    //     });

    //     // Handle empty list message
    //     const detectEmpty = () => {
    //         // Select elements
    //         const message = target.querySelector('span');
    //         const products = target.querySelectorAll('[data-kt-ecommerce-edit-order-filter="product"]');

    //         // Detect if element is empty
    //         if (products.length < 1) {
    //             // Show message
    //             message.classList.remove('d-none');

    //             // Reset price
    //             totalPrice.innerText = '0.00';
    //         } else {
    //             // Hide message
    //             message.classList.add('d-none');

    //             // Calculate price
    //             calculateTotal(products);
    //         }
    //     }

    //     // Calculate total cost
    //     const calculateTotal = (products) => {
    //         let countPrice = 0;

    //         // Loop through all selected prodcucts
    //         products.forEach(product => {
    //             // Get product price
    //             const price = parseFloat(product.querySelector('[data-kt-ecommerce-edit-order-filter="price"]').innerText);

    //             // Add to total
    //             countPrice = parseFloat(countPrice + price);
    //         });

    //         // Update total price
    //         totalPrice.innerText = countPrice.toFixed(2);
    //     }
    // }


    // const handleProductSelect = () => {
    //     // Define variables
    //     const checkboxes = document.querySelectorAll('[type="checkbox"]');
    //     const target = document.getElementById('kt_ecommerce_edit_order_selected_products');
    //     const itemSelectedTable = document.getElementById('itemselected'); // Second table's tbody
    //     const totalPrice = document.getElementById('kt_ecommerce_edit_order_total_price');
    //     const quantityModal = document.getElementById('quantityModal');
    //     const modalQuantityInput = document.getElementById('modalQuantityInput');
    //     const updateQuantityBtn = document.getElementById('updateQuantityBtn');
    //     let selectedProductRow = null; // To store the selected product row for updating

    //     // Function to calculate the total price of all selected items
    //     const calculateTotals = function () {
    //         const items = [].slice.call(itemSelectedTable.querySelectorAll('[data-kt-pos-element="item-total"]'));
    //         let total = 0;
    //         let tax = 12; // Tax percentage
    //         let discount = 8; // Discount amount
    //         let grantTotal = 0;

    //         // Sum all item totals
    //         items.forEach(function (item) {
    //             total += parseFloat(item.innerHTML.replace('$', ''));
    //         });

    //         // Calculate grand total
    //         grantTotal = total - discount + (total * tax / 100);

    //         // Update totals in the UI
    //         document.querySelector('[data-kt-pos-element="total"]').innerHTML = `$${total.toFixed(2)}`;
    //         document.querySelector('[data-kt-pos-element="grant-total"]').innerHTML = `$${grantTotal.toFixed(2)}`;
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
    //             const newQuantity = parseInt(modalQuantityInput.value);
    //             const price = parseFloat(selectedProductRow.getAttribute('data-kt-pos-item-price'));
    //             const total = newQuantity * price;

    //             // Update the input field and item total
    //             selectedProductRow.querySelector('#quantityInput').value = newQuantity;
    //             selectedProductRow.querySelector('[data-kt-pos-element="item-total"]').innerHTML = `$${total.toFixed(2)}`;

    //             // Recalculate totals
    //             calculateTotals();
    //         }
    //     };

    //     // Loop through all checkboxes
    //     checkboxes.forEach(checkbox => {
    //         checkbox.addEventListener('change', e => {
    //             // Select parent row element
    //             const parent = checkbox.closest('tr');

    //             // Clone parent element as a product
    //             const productId = parent.querySelector('[data-kt-ecommerce-edit-order-id]').getAttribute('data-kt-ecommerce-edit-order-id');
    //             const productName = parent.querySelector('.text-gray-800').innerText; // Product Name
    //             const productImage = parent.querySelector('.symbol-label').style.backgroundImage.match(/url\("(.*?)"\)/)[1]; // Image URL
    //             const productPrice = parseFloat(parent.querySelector('[data-kt-ecommerce-edit-order-filter="price"]').innerText).toFixed(2); // Product Price
    //             const productStock = parent.querySelector('.text-success').innerText; // Stock Value

    //             // Check if the row is already in the second table (to prevent duplicates)
    //             const existingRow = itemSelectedTable.querySelector(`[data-kt-pos-element="item"][data-kt-pos-item-price="${productPrice}"][data-kt-ecommerce-edit-order-id="${productId}"]`);

    //             if (e.target.checked && !existingRow) {
    //                 // Create a new row for the second table
    //                 const newRow = document.createElement('tr');
    //                 newRow.setAttribute('data-kt-pos-element', 'item');
    //                 newRow.setAttribute('data-kt-pos-item-price', productPrice);
    //                 newRow.setAttribute('data-kt-ecommerce-edit-order-id', productId);

    //                 newRow.innerHTML = `
    //                     <td class="pe-0">
    //                         <div class="d-flex align-items-center">
    //                             <img src="${productImage}" class="w-50px h-50px rounded-3 me-3" alt="${productName}" />
    //                             <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6 me-1">${productName}</span>
    //                         </div>
    //                     </td>
    //                     <td class="pe-0">
    //                         <input type="text" class="form-control border-0 text-center px-0 fs-3 fw-bold text-gray-800 w-30px" id="quantityInput" value="1" readonly />
    //                     </td>
    //                     <td class="text-end">
    //                         <span class="fw-bold text-primary fs-2" data-kt-pos-element="item-total">$${productPrice}</span>
    //                     </td>
    //                 `;

    //                 // Append the new row to the second table
    //                 itemSelectedTable.appendChild(newRow);

    //                 // Add event listener for quantity click (open modal)
    //                 newRow.querySelector('#quantityInput').addEventListener('click', handleQuantityClick);
    //             } else if (!e.target.checked && existingRow) {
    //                 // Remove the product row from the second table if unchecked
    //                 itemSelectedTable.removeChild(existingRow);
    //             }

    //             // Update empty message and calculate total cost
    //             detectEmpty();
    //             calculateTotals();
    //         });
    //     });

    //     // Event listener for modal button to update quantity
    //     updateQuantityBtn.addEventListener('click', updateQuantity);

    //     // Handle empty list message
    //     const detectEmpty = () => {
    //         const message = target.querySelector('span');
    //         const products = target.querySelectorAll('[data-kt-ecommerce-edit-order-filter="product"]');

    //         // Detect if empty
    //         if (products.length < 1) {
    //             message.classList.remove('d-none');
    //             totalPrice.innerText = '0.00';
    //         } else {
    //             message.classList.add('d-none');
    //             calculateTotal(products);
    //         }
    //     };

    //     // Calculate total cost for the products in the first table
    //     const calculateTotal = (products) => {
    //         let countPrice = 0;
    //         products.forEach(product => {
    //             const price = parseFloat(product.querySelector('[data-kt-ecommerce-edit-order-filter="price"]').innerText);
    //             countPrice += price;
    //         });
    //         totalPrice.innerText = countPrice.toFixed(2);
    //     };
    // };

    // // Initialize the handleProductSelect function
    // handleProductSelect();

    // const handleProductSelect = () => {
    //     // Define variables
    //     const checkboxes = document.querySelectorAll('[type="checkbox"]');
    //     const target = document.getElementById('kt_ecommerce_edit_order_selected_products');
    //     const itemSelectedTable = document.getElementById('itemselected'); // Second table's tbody
    //     const totalPrice = document.getElementById('kt_ecommerce_edit_order_total_price');
    //     const quantityModal = document.getElementById('quantityModal');
    //     const modalQuantityInput = document.getElementById('modalQuantityInput');
    //     const updateQuantityBtn = document.getElementById('updateQuantityBtn');
    //     let selectedProductRow = null; // To store the selected product row for updating

    //     // Function to calculate the total price of all selected items
    //     const calculateTotals = function () {
    //         const items = Array.from(itemSelectedTable.querySelectorAll('[data-kt-pos-element="item-total"]'));
    //         let total = 0;
    //         const tax = 12; // Tax percentage
    //         const discount = 8; // Discount amount
    //         let grandTotal = 0;

    //         // Sum all item totals
    //         items.forEach(function (item) {
    //             total += parseFloat(item.innerHTML.replace('$', ''));
    //         });

    //         // Calculate grand total
    //         grandTotal = total - discount + (total * tax / 100);

    //         // Update totals in the UI
    //         document.querySelector('[data-kt-pos-element="total"]').innerHTML = `$${total.toFixed(2)}`;
    //         document.querySelector('[data-kt-pos-element="grant-total"]').innerHTML = `$${grandTotal.toFixed(2)}`;
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
    //             const newQuantity = parseInt(modalQuantityInput.value);
    //             const price = parseFloat(selectedProductRow.getAttribute('data-kt-pos-item-price'));
    //             const total = newQuantity * price;

    //             // Update the input field and item total
    //             selectedProductRow.querySelector('#quantityInput').value = newQuantity;
    //             selectedProductRow.querySelector('[data-kt-pos-element="item-total"]').innerHTML = `$${total.toFixed(2)}`;

    //             // Recalculate totals
    //             calculateTotals();
    //         }
    //     };

    //     // Loop through all checkboxes
    //     checkboxes.forEach((checkbox) => {
    //         checkbox.addEventListener('change', (e) => {
    //             // Select parent row element
    //             const parent = checkbox.closest('tr');

    //             // Get product details
    //             const productId = parent.querySelector('[data-kt-ecommerce-edit-order-id]').getAttribute('data-kt-ecommerce-edit-order-id');
    //             const productName = parent.querySelector('.text-gray-800').innerText; // Product Name
    //             const productImage = parent.querySelector('.symbol-label').style.backgroundImage.match(/url\("(.*?)"\)/)[1]; // Image URL
    //             const productPrice = parseFloat(parent.querySelector('[data-kt-ecommerce-edit-order-filter="price"]').innerText).toFixed(2); // Product Price

    //             // Check if the row is already in the second table (to prevent duplicates)
    //             const existingRow = itemSelectedTable.querySelector(`[data-kt-pos-element="item"][data-kt-pos-item-price="${productPrice}"][data-kt-ecommerce-edit-order-id="${productId}"]`);

    //             if (e.target.checked && !existingRow) {
    //                 // Create a new row for the second table
    //                 const newRow = document.createElement('tr');
    //                 newRow.setAttribute('data-kt-pos-element', 'item');
    //                 newRow.setAttribute('data-kt-pos-item-price', productPrice);
    //                 newRow.setAttribute('data-kt-ecommerce-edit-order-id', productId);

    //                 newRow.innerHTML = `
    //                     <td class="pe-0">
    //                         <div class="d-flex align-items-center">
    //                             <img src="${productImage}" class="w-50px h-50px rounded-3 me-3" alt="${productName}" />
    //                             <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6 me-1">${productName}</span>
    //                         </div>
    //                     </td>
    //                     <td class="pe-0">
    //                         <input type="text" class="form-control border-0 text-center px-0 fs-3 fw-bold text-gray-800 w-30px" id="quantityInput" value="1" readonly />
    //                     </td>
    //                     <td class="text-end">
    //                         <span class="fw-bold text-primary fs-2" data-kt-pos-element="item-total">$${productPrice}</span>
    //                     </td>
    //                 `;

    //                 // Append the new row to the second table
    //                 itemSelectedTable.appendChild(newRow);

    //                 // Add event listener for quantity click (open modal)
    //                 newRow.querySelector('#quantityInput').addEventListener('click', handleQuantityClick);
    //             } else if (!e.target.checked && existingRow) {
    //                 // Remove the product row from the second table if unchecked
    //                 itemSelectedTable.removeChild(existingRow);
    //             }

    //             // Recalculate totals after every checkbox change
    //             calculateTotals();
    //         });
    //     });

    //     // Event listener for modal button to update quantity
    //     updateQuantityBtn.addEventListener('click', updateQuantity);
    // };

    // // Initialize the handleProductSelect function
    // handleProductSelect();



    // const handleProductSelect = () => {
    //     // Define variables
    //     const checkboxes = document.querySelectorAll('[type="checkbox"]');
    //     const target = document.getElementById('kt_ecommerce_edit_order_selected_products');
    //     const itemSelectedTable = document.getElementById('itemselected'); // Second table's tbody
    //     const totalPrice = document.getElementById('kt_ecommerce_edit_order_total_price');
    //     const quantityModal = document.getElementById('quantityModal');
    //     const modalQuantityInput = document.getElementById('modalQuantityInput');
    //     const updateQuantityBtn = document.getElementById('updateQuantityBtn');
    //     const clearAllButton = document.querySelector('.btn-light-primary'); // "Clear All" button
    //     let selectedProductRow = null; // To store the selected product row for updating

    //     // Function to calculate the total price of all selected items
    //     const calculateTotals = function () {
    //         const items = Array.from(itemSelectedTable.querySelectorAll('[data-kt-pos-element="item-total"]'));
    //         let total = 0;
    //         const tax = 12; // Tax percentage
    //         const discount = 8; // Discount amount
    //         let grandTotal = 0;

    //         // Sum all item totals
    //         items.forEach(function (item) {
    //             total += parseFloat(item.innerHTML.replace('$', ''));
    //         });

    //         // Calculate grand total
    //         grandTotal = total - discount + (total * tax / 100);

    //         // Update totals in the UI
    //         document.querySelector('[data-kt-pos-element="total"]').innerHTML = `$${total.toFixed(2)}`;
    //         document.querySelector('[data-kt-pos-element="grant-total"]').innerHTML = `$${grandTotal.toFixed(2)}`;
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
    //             const newQuantity = parseInt(modalQuantityInput.value);
    //             const price = parseFloat(selectedProductRow.getAttribute('data-kt-pos-item-price'));
    //             const total = newQuantity * price;

    //             // Update the input field and item total
    //             selectedProductRow.querySelector('#quantityInput').value = newQuantity;
    //             selectedProductRow.querySelector('[data-kt-pos-element="item-total"]').innerHTML = `$${total.toFixed(2)}`;

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

    //         // Recalculate totals
    //         calculateTotals();
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
    //             const productPrice = parseFloat(parent.querySelector('[data-kt-ecommerce-edit-order-filter="price"]').innerText).toFixed(2); // Product Price

    //             // Check if the row is already in the second table (to prevent duplicates)
    //             const existingRow = itemSelectedTable.querySelector(`[data-kt-pos-element="item"][data-kt-pos-item-price="${productPrice}"][data-kt-ecommerce-edit-order-id="${productId}"]`);

    //             if (e.target.checked && !existingRow) {
    //                 // Create a new row for the second table
    //                 const newRow = document.createElement('tr');
    //                 newRow.setAttribute('data-kt-pos-element', 'item');
    //                 newRow.setAttribute('data-kt-pos-item-price', productPrice);
    //                 newRow.setAttribute('data-kt-ecommerce-edit-order-id', productId);

    //                 newRow.innerHTML = `
    //                     <td class="pe-0">
    //                         <div class="d-flex align-items-center">
    //                             <img src="${productImage}" class="w-50px h-50px rounded-3 me-3" alt="${productName}" />
    //                             <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6 me-1">${productName}</span>
    //                         </div>
    //                     </td>
    //                     <td class="pe-0">
    //                         <input type="text" class="form-control border-0 text-center px-0 fs-3 fw-bold text-gray-800 w-30px" id="quantityInput" value="1" readonly />
    //                     </td>
    //                     <td class="text-end">
    //                         <span class="fw-bold text-primary fs-2" data-kt-pos-element="item-total">$${productPrice}</span>
    //                     </td>
    //                 `;

    //                 // Append the new row to the second table
    //                 itemSelectedTable.appendChild(newRow);

    //                 // Add event listener for quantity click (open modal)
    //                 newRow.querySelector('#quantityInput').addEventListener('click', handleQuantityClick);
    //             } else if (!e.target.checked && existingRow) {
    //                 // Remove the product row from the second table if unchecked
    //                 itemSelectedTable.removeChild(existingRow);
    //             }

    //             // Recalculate totals after every checkbox change
    //             calculateTotals();
    //         });
    //     });

    //     // Event listener for modal button to update quantity
    //     updateQuantityBtn.addEventListener('click', updateQuantity);
    // };

    // // Initialize the handleProductSelect function
    // handleProductSelect();

    // const handleProductSelect = () => {
    //     // Define variables
    //     const checkboxes = document.querySelectorAll('[type="checkbox"]');
    //     const itemSelectedTable = document.getElementById('itemselected'); // Second table's tbody
    //     const totalPrice = document.getElementById('kt_ecommerce_edit_order_total_price');
    //     const quantityModal = document.getElementById('quantityModal');
    //     const modalQuantityInput = document.getElementById('modalQuantityInput');
    //     const updateQuantityBtn = document.getElementById('updateQuantityBtn');
    //     const clearAllButton = document.querySelector('.btn-light-primary'); // "Clear All" button
    //     let selectedProductRow = null; // To store the selected product row for updating

    //     // Function to calculate the total price of all selected items
    //     const calculateTotals = function () {
    //         const items = Array.from(itemSelectedTable.querySelectorAll('[data-kt-pos-element="item-total"]'));
    //         let total = 0;
    //         const tax = 12; // Tax percentage
    //         const discount = 8; // Discount amount
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

    //         // Recalculate totals
    //         calculateTotals();
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
    //             } else if (!e.target.checked && existingRow) {
    //                 // Remove the product row from the second table if unchecked
    //                 itemSelectedTable.removeChild(existingRow);
    //             }

    //             // Recalculate totals after every checkbox change
    //             calculateTotals();
    //         });
    //     });

    //     // Event listener for modal button to update quantity
    //     updateQuantityBtn.addEventListener('click', updateQuantity);

    // };

    // // Function to format money as Naira (₦)
    // const formatMoney = (amount) => {
    //     const number = parseFloat(amount);
    //     if (isNaN(number)) {
    //         return '₦0.00'; // Return default value if the number is invalid
    //     }
    //     return number.toLocaleString('en-NG', {
    //         style: 'currency',
    //         currency: 'NGN',
    //         minimumFractionDigits: 2,
    //         maximumFractionDigits: 2
    //     });
    // };

    // Initialize the handleProductSelect function
   // handleProductSelect();



   const handleProductSelect = () => {
    // DOM elements
    const checkboxes = document.querySelectorAll('[type="checkbox"]');
    const itemSelectedTable = document.getElementById('itemselected'); // Second table's tbody
    const totalPrice = document.getElementById('kt_ecommerce_edit_order_total_price');
    const quantityModal = document.getElementById('quantityModal');
    const modalQuantityInput = document.getElementById('modalQuantityInput');
    const updateQuantityBtn = document.getElementById('updateQuantityBtn');
    const clearAllButton = document.querySelector('.btn-light-primary'); // "Clear All" button
    let selectedProductRow = null; // To store the selected product row for updating
    let orderItems = []; // Initialize empty array to store order items
    let orderId = generateOrderId(); // Placeholder for order ID generation logic

    // Function to calculate the total price of all selected items
    const calculateTotals = function () {
        const items = Array.from(itemSelectedTable.querySelectorAll('[data-kt-pos-element="item-total"]'));
        let total = 0;
        const tax = 12; // Tax percentage
        const discount = 8; // Discount amount
        let grandTotal = 0;

        // Sum all item totals
        items.forEach(function (item) {
            total += parseFloat(item.innerHTML.replace('₦', '').replace(/,/g, '')); // Remove currency and commas
        });

        // Calculate grand total
        grandTotal = total - discount + (total * tax / 100);

        // Update totals in the UI
        document.querySelector('[data-kt-pos-element="total"]').innerHTML = formatMoney(total);
        document.querySelector('[data-kt-pos-element="grant-total"]').innerHTML = formatMoney(grandTotal);
    };

    // Function to handle quantity input click (open modal)
    const handleQuantityClick = (event) => {
        const productRow = event.target.closest('[data-kt-pos-element="item"]');
        selectedProductRow = productRow; // Store reference to the row

        // Get current quantity and set it in the modal
        const currentQuantity = productRow.querySelector('#quantityInput').value;
        modalQuantityInput.value = currentQuantity;

        // Show the modal
        const modal = new bootstrap.Modal(quantityModal);
        modal.show();
    };

    // Function to update the quantity and total cost
    const updateQuantity = () => {
        if (selectedProductRow) {
            const newQuantity = parseFloat(modalQuantityInput.value);
            const price = parseFloat(selectedProductRow.getAttribute('data-kt-pos-item-price'));

            // Check if price and quantity are valid numbers
            if (isNaN(price) || isNaN(newQuantity) || newQuantity <= 0) {
                console.error("Invalid price or quantity");
                return;
            }

            const total = (newQuantity * price).toFixed(2); // Ensure the total has two decimal places

            // Update the input field and item total
            selectedProductRow.querySelector('#quantityInput').value = newQuantity;
            selectedProductRow.querySelector('[data-kt-pos-element="item-total"]').innerHTML = formatMoney(total);

            // Recalculate totals
            calculateTotals();
        }
    };

    // Clear All button functionality
    clearAllButton.addEventListener('click', () => {
        // Clear all rows in the second table
        while (itemSelectedTable.firstChild) {
            itemSelectedTable.removeChild(itemSelectedTable.firstChild);
        }

        // Uncheck all checkboxes
        checkboxes.forEach((checkbox) => {
            checkbox.checked = false;
        });

        // Clear the orderItems array
        orderItems = [];

        // Recalculate totals
        calculateTotals();
    });

    // Loop through all checkboxes
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', (e) => {
            // Select parent row element
            const parent = checkbox.closest('tr');

            // Get product details
            const productId = parent.querySelector('[data-kt-ecommerce-edit-order-id]').getAttribute('data-kt-ecommerce-edit-order-id');
            const productName = parent.querySelector('.text-gray-800').innerText; // Product Name
            const productImage = parent.querySelector('.symbol-label').style.backgroundImage.match(/url\("(.*?)"\)/)[1]; // Image URL
            const productPrice = parseFloat(parent.querySelector('[data-kt-ecommerce-edit-order-filter="price"]').innerText.replace('₦', '').replace(/,/g, '')); // Product Price

            // Check if price is valid
            if (isNaN(productPrice)) {
                console.error("Invalid product price");
                return;
            }

            // Check if the row is already in the second table (to prevent duplicates)
            const existingRow = itemSelectedTable.querySelector(`[data-kt-pos-element="item"][data-kt-pos-item-price="${productPrice}"][data-kt-ecommerce-edit-order-id="${productId}"]`);

            if (e.target.checked && !existingRow) {
                // Create a new row for the second table
                const newRow = document.createElement('tr');
                newRow.setAttribute('data-kt-pos-element', 'item');
                newRow.setAttribute('data-kt-pos-item-price', productPrice);
                newRow.setAttribute('data-kt-ecommerce-edit-order-id', productId);

                const initialQuantity = 1;
                const initialTotal = (initialQuantity * productPrice).toFixed(2); // Ensure the initial total has two decimal places

                newRow.innerHTML = `
                    <td class="pe-0">
                        <div class="d-flex align-items-center">
                            <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6 me-1">${productName}</span>
                        </div>
                    </td>
                    <td class="pe-0">
                        <input type="text" class="form-control border-0 text-center px-0 fs-3 fw-bold text-gray-800 w-30px" id="quantityInput" value="${initialQuantity}" readonly />
                    </td>
                    <td class="text-end">
                        <span class="fw-bold text-primary fs-2" data-kt-pos-element="item-total">${formatMoney(initialTotal)}</span>
                    </td>
                `;

                // Append the new row to the second table
                itemSelectedTable.appendChild(newRow);

                // Add event listener for quantity click (open modal)
                newRow.querySelector('#quantityInput').addEventListener('click', handleQuantityClick);

                // Add item to the orderItems array
                orderItems.push({
                    productId,
                    productName,
                    productImage,
                    productPrice,
                    quantity: initialQuantity,
                    total: initialTotal,
                });
            } else if (!e.target.checked && existingRow) {
                // Remove the product row from the second table if unchecked
                itemSelectedTable.removeChild(existingRow);

                // Remove item from the orderItems array
                orderItems = orderItems.filter(item => item.productId !== productId);
            }

            // Recalculate totals after every checkbox change
            calculateTotals();
        });
    });

    // Event listener for modal button to update quantity
    updateQuantityBtn.addEventListener('click', updateQuantity);

    // Function to generate unique order ID (for example, using a timestamp or a UUID)
    function generateOrderId() {
        return 'ORD-' + new Date().getTime(); // Simple order ID based on timestamp
    }

    // Function to send the order data to the backend
    const sendOrderToBackend = () => {

            // Get all selected items from the second table
            const selectedRows = document.querySelectorAll('#itemselected tr[data-kt-pos-element="item"]');

            // If no items are selected, alert the user and exit
            if (selectedRows.length === 0) {
                alert('No items selected for the order.');
                return;
            }


        // Check if there are any selected items
        if (orderItems.length > 0) {
            // Send the order details (orderId and items) to the backend
            fetch(paymentStoreUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // CSRF token for security
                },
                body: JSON.stringify({
                    items: orderItems, // Array of items in the order
                }),
            })
            .then(response => response.json())
            .then(data => {
                console.log('Order saved:', data);
                // Handle the response here (e.g., show a success message)
            })
            .catch(error => {
                console.error('Error:', error);
                // Handle any error here (e.g., show an error message)
            });
        } else {
            console.log('No items selected for the order.');
        }
    };



    // Add an event listener to the Print Receipt button
    const printReceiptButton = document.querySelector('.btn.btn-primary.flex-fill[data-bs-toggle="modal"]');
    if (printReceiptButton) {
        printReceiptButton.addEventListener('click', sendOrderToBackend);
    }

    // Function to format money as Naira (₦)
    const formatMoney = (amount) => {
        const number = parseFloat(amount);
        if (isNaN(number)) return '₦0.00';
        return '₦' + number.toLocaleString('en-NG', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    };
};

handleProductSelect();

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
