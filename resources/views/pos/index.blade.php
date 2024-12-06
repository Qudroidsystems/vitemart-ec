@extends('layouts.master')
@section('content')

             <!--begin::Main-->
             <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <!--begin::Content wrapper-->
                <div class="d-flex flex-column flex-column-fluid">

<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 "

         >

            <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">



<!--begin::Page title-->
<div  class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
    <!--begin::Title-->
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
        Pos
            </h1>
    <!--end::Title-->


        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                                    <a href="../../../index.html" class="text-muted text-hover-primary">
                                Home                            </a>
                                            </li>
                                <!--end::Item-->
                                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->

                            <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                                   Inventory
                                                    </li>
                                <!--end::Item-->
                                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->

                            <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                                    Sales                                            </li>
                                <!--end::Item-->

                    </ul>
        <!--end::Breadcrumb-->
    </div>
<!--end::Page title-->
<!--begin::Actions-->
<div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->
        <div class="m-0">
            <!--begin::Menu toggle-->
            <a href="#" class="btn btn-sm btn-flex bg-body btn-color-gray-700 btn-active-color-primary fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <i class="ki-duotone ki-filter fs-6 text-muted me-1"><span class="path1"></span><span class="path2"></span></i>
                Filter
            </a>
            <!--end::Menu toggle-->



<!--begin::Menu 1-->
<div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_6486985c279a4">
    <!--begin::Header-->
    <div class="px-7 py-5">
        <div class="fs-5 text-dark fw-bold">Filter Options</div>
    </div>
    <!--end::Header-->

    <!--begin::Menu separator-->
    <div class="separator border-gray-200"></div>
    <!--end::Menu separator-->

    <!--begin::Form-->
    <div class="px-7 py-5">
        <!--begin::Input group-->
        <div class="mb-10">
            <!--begin::Label-->
            <label class="form-label fw-semibold">Status:</label>
            <!--end::Label-->

            <!--begin::Input-->
            <div>
                <select class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_6486985c279a4" data-allow-clear="true">
                    <option></option>
                    <option value="1">Approved</option>
                    <option value="2">Pending</option>
                    <option value="2">In Process</option>
                    <option value="2">Rejected</option>
                </select>
            </div>
            <!--end::Input-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="mb-10">
            <!--begin::Label-->
            <label class="form-label fw-semibold">Member Type:</label>
            <!--end::Label-->

            <!--begin::Options-->
            <div class="d-flex">
                <!--begin::Options-->
                <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                    <input class="form-check-input" type="checkbox" value="1"/>
                    <span class="form-check-label">
                        Author
                    </span>
                </label>
                <!--end::Options-->

                <!--begin::Options-->
                <label class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" value="2" checked="checked"/>
                    <span class="form-check-label">
                        Customer
                    </span>
                </label>
                <!--end::Options-->
            </div>
            <!--end::Options-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="mb-10">
            <!--begin::Label-->
            <label class="form-label fw-semibold">Notifications:</label>
            <!--end::Label-->

            <!--begin::Switch-->
            <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="" name="notifications" checked />
                <label class="form-check-label">
                    Enabled
                </label>
            </div>
            <!--end::Switch-->
        </div>
        <!--end::Input group-->

        <!--begin::Actions-->
        <div class="d-flex justify-content-end">
            <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>

            <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Form-->
</div>
<!--end::Menu 1-->        </div>
        <!--end::Filter menu-->


    <!--begin::Secondary button-->
        <!--end::Secondary button-->

    <!--begin::Primary button-->
            <a href="#" class="btn btn-sm fw-bold btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">
            Create        </a>
        <!--end::Primary button-->
</div>
<!--end::Actions-->
        </div>
        <!--end::Toolbar container-->
    </div>
<!--end::Toolbar-->

<!--begin::Content-->
<div id="kt_app_content" class="app-content  flex-column-fluid " >


        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container  container-xxl ">
            <!--begin::Form-->
 <div id="kt_ecommerce_edit_order_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="listing.html">


    <!--begin::Aside column-->
    <div class="w-100 flex-lg-row-auto w-lg-700px mb-7 me-7 me-lg-10">


                         <!--begin::Order details-->
                            <div class="card card-flush py-4">

                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div class="d-flex flex-column gap-10">


                                        <!--begin::Separator-->
                                        <div class="separator"></div>
                                        <!--end::Separator-->


                                                    <!-- Barcode Input -->
                                                    <div class="form-group">
                                                        <label for="barcodeInput">Scan Barcode:</label>
                                                        <input type="text"  class="form-control" placeholder="Scan or Enter Barcode">
                                                    </div>


                                                    <input type="text" id="barcodeInput" style="position: absolute; opacity: 0;">


                                                    <!--begin::Search products-->
                                        <div class="d-flex align-items-center position-relative mb-n7 ">
                                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4"><span class="path1"></span><span class="path2"></span></i>
                                                    <input type="text" data-kt-ecommerce-edit-order-filter="search" id="barcodeScanner" class="form-control form-control-solid w-100 w-lg-50 ps-12" placeholder="Search Products" />
                                        </div>
                                        <!--end::Search products-->

                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_edit_order_product_table">
                                            <thead>
                                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                    <th class="w-25px pe-2"></th>
                                                    <th class="min-w-200px">Product</th>
                                                    <th class="min-w-100px text-end pe-5">Qty Remaining</th>
                                                    <th class="min-w-100px text-end pe-5">Category</th>
                                                </tr>
                                            </thead>
                                            <tbody class="fw-semibold text-gray-600">
                                                @foreach($products as $product)
                                                <tr data-barcode="{{ $product->sku }}" data-kt-ecommerce-edit-order-id="{{ $product->id}}">
                                                                    <td>
                                                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                                            <input class="form-check-input" type="checkbox" value="1"  />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center" data-kt-ecommerce-edit-order-filter="product" data-kt-ecommerce-edit-order-id="{{ $product->id}}">
                                                                            <!--begin::Thumbnail-->
                                                                            <a href="#" class="symbol symbol-50px">
                                                                                <span class="symbol-label" style="background-image:url('{{ $product->cover ? asset('storage/' . $product->cover->path) : asset('storage/uploads/category_default.jpg') }}');"></span>
                                                                            </a>
                                                                            <!--end::Thumbnail-->

                                                                            <div class="ms-5">
                                                                                <!--begin::Title-->
                                                                                <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">{{ $product->name }}</a>
                                                                                <!--end::Title-->

                                                                                <!--begin::Price-->
                                                                                <div class="fw-semibold fs-7">Price: ₦<span data-kt-ecommerce-edit-order-filter="price">
                                                                                <span class="fw-bold text-success ms-3">{{ $product->base_price}}</span>
                                                                                </span></div>
                                                                                <!--end::Price-->

                                                                                <!--begin::SKU-->
                                                                                <div class="text-muted fs-7">SKU: {{ $product->sku }}</div>
                                                                                <!--end::SKU-->
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-end pe-5" data-order="0">
                                                                                                            {{-- <span class="badge badge-light-danger">Sold out</span> --}}
                                                                            <span class="fw-bold text-success ms-3">{{ number_format($product->stock, 2) }}</span>
                                                                    </td>
                                                                    <td class="text-end pe-5" data-order="0">
                                                                        {{-- <span class="badge badge-light-danger">Sold out</span> --}}
                                                                            <span class="fw-bold text-success ms-3">{{ number_format($product->stock, 2) }}</span>
                                                                    </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                        </table>
                                        <!--end::Table-->




                                         <!--begin::Table-->
                                         <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_edit_order_product_table">
                                            <thead>
                                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                    <th class="w-25px pe-2"></th>
                                                    <th class="min-w-200px">Product</th>
                                                    <th class="min-w-100px text-end pe-5">Qty Remaining</th>
                                                    <th class="min-w-100px text-end pe-5">Category</th>
                                                </tr>
                                            </thead>
                                            <tbody class="fw-semibold text-gray-600">
                                          
                                                <tr data-barcode="{{ $product->sku }}" data-kt-ecommerce-edit-order-id="{{ $product->id}}">
                                                                    <td>
                                                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                                            <input class="form-check-input" type="checkbox" value="1"  />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center" data-kt-ecommerce-edit-order-filter="product" data-kt-ecommerce-edit-order-id="{{ $product->id}}">
                                                                            <!--begin::Thumbnail-->
                                                                            <a href="#" class="symbol symbol-50px">
                                                                                <span class="symbol-label" style="background-image:url('{{ $product->cover ? asset('storage/' . $product->cover->path) : asset('storage/uploads/category_default.jpg') }}');"></span>
                                                                            </a>
                                                                            <!--end::Thumbnail-->

                                                                            <div class="ms-5">
                                                                                <!--begin::Title-->
                                                                                <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">{{ $product->name }}</a>
                                                                                <!--end::Title-->

                                                                                <!--begin::Price-->
                                                                                <div class="fw-semibold fs-7">Price: ₦<span data-kt-ecommerce-edit-order-filter="price">
                                                                                <span class="fw-bold text-success ms-3">{{ $product->base_price}}</span>
                                                                                </span></div>
                                                                                <!--end::Price-->

                                                                                <!--begin::SKU-->
                                                                                <div class="text-muted fs-7">SKU: {{ $product->sku }}</div>
                                                                                <!--end::SKU-->
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-end pe-5" data-order="0">
                                                                                                            {{-- <span class="badge badge-light-danger">Sold out</span> --}}
                                                                            <span class="fw-bold text-success ms-3">{{ number_format($product->stock, 2) }}</span>
                                                                    </td>
                                                                    <td class="text-end pe-5" data-order="0">
                                                                        {{-- <span class="badge badge-light-danger">Sold out</span> --}}
                                                                            <span class="fw-bold text-success ms-3">{{ number_format($product->stock, 2) }}</span>
                                                                    </td>
                                                        </tr>


                                                </tbody>
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                </div>
                                <!--end::Card header-->
                            </div>
                            <!--end::Order details-->
    </div>
    <!--end::Aside column-->





        <!--begin::Main column-->
        <div class="d-flex flex-column flex-lg-row-fluid gap-4 gap-lg-10">



                <!--begin::Pos order-->
                <div class="card card-flush bg-body " id="kt_pos_form">
                    <!--begin::Separator-->
                    <div class="separator"></div>
                    <!--end::Separator-->
                    <!--begin::Header-->
                    <h6 class="card-title fw-bold text-gray-800 fs-2qx">Choose Customer</h6>
                    <!--begin::Separator-->
                    <div class="separator"></div>
                    <!--end::Separator-->
                    <!--begin::Select2-->
                    <select name="status" class="form-select mb-2" data-control="select2" data-placeholder="Select an option" id="kt_ecommerce_add_product_status_select">
                        <option></option>
                        <option value="published" selected>Walk in Customer</option>
                        <option value="draft">Draft</option>
                        <option value="scheduled">Scheduled</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    <!--end::Select2-->
                    <div class="card-header pt-5">
                        <h3 class="card-title fw-bold text-gray-800 fs-2qx">Current Order</h3>

                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <button  class="btn btn-light-primary fs-4 fw-bold py-4">Clear All</button>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Header-->

                    <!--begin::Body-->
                    <div class="card-body pt-0">
                        <!--begin::Table container-->
                        <div class="table-responsive mb-8">
                            <!--begin::Table-->
                            <table class="table align-middle gs-0 gy-4 my-0">
                                <!--begin::Table head-->
                                <thead>
                                    <tr>
                                        <th class="min-w-175px"></th>
                                        <th class="w-125px"></th>
                                        <th class="w-60px"></th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->

                                <!--begin::Table body-->
                                <tbody id="itemselected">


                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->

                        <!--begin::Summary-->
                        <div class="d-flex flex-stack bg-success rounded-3 p-6 mb-11">
                            <!--begin::Content-->
                            <div class="fs-6 fw-bold text-white">
                                <span class="d-block lh-1 mb-2">Subtotal</span>
                                <span class="d-block mb-2">Discounts</span>
                                <span class="d-block mb-9">Tax(%)</span>
                                <span class="d-block fs-2qx lh-1">Total</span>
                            </div>
                            <!--end::Content-->

                            <!--begin::Content-->
                            <div class="fs-6 fw-bold text-white text-end">
                                <span class="d-block lh-1 mb-2" data-kt-pos-element="total">₦0.00</span>
                                <span class="d-block mb-2" data-kt-pos-element="discount">-₦0.00</span>
                                <span class="d-block mb-9" data-kt-pos-element="tax">₦0.00</span>
                                <span class="d-block fs-2qx lh-1" data-kt-pos-element="grant-total">₦0.00</span>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Summary-->

                        <!--begin::Payment Method-->
                        <div class="m-0">
                            <!--begin::Title-->
                            <h1 class="fw-bold text-gray-800 mb-5">Payment Method</h1>
                            <!--end::Title-->

                            <!--begin::Radio group-->
                            <div class="d-flex flex-equal gap-5 gap-xxl-9 px-0 mb-12" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                                                    <!--begin::Radio-->
                                    <label class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4 " data-kt-button="true">
                                        <!--begin::Input-->
                                        <input class="btn-check" type="radio" name="paymentmethod" value="cash"/>
                                        <!--end::Input-->

                                        <!--begin::Icon-->
                                        <i class="ki-duotone ki-dollar fs-2hx mb-2 pe-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>                        <!--end::Icon-->

                                        <!--begin::Title-->
                                        <span class="fs-7 fw-bold d-block">Cash</span>
                                        <!--end::Title-->
                                    </label>
                                    <!--end::Radio-->
                                                    <!--begin::Radio-->
                                    <label class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4 active" data-kt-button="true">
                                        <!--begin::Input-->
                                        <input class="btn-check" type="radio" name="paymentmethod" value="card"/>
                                        <!--end::Input-->

                                        <!--begin::Icon-->
                                        <i class="ki-duotone ki-credit-cart fs-2hx mb-2 pe-0"><span class="path1"></span><span class="path2"></span></i>                        <!--end::Icon-->

                                        <!--begin::Title-->
                                        <span class="fs-7 fw-bold d-block">Card</span>
                                        <!--end::Title-->
                                    </label>
                                    <!--end::Radio-->
                                                    <!--begin::Radio-->
                                    <label class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4 " data-kt-button="true">
                                        <!--begin::Input-->
                                        <input class="btn-check" type="radio" name="paymentmethod" value="transfer"/>
                                        <!--end::Input-->

                                        <!--begin::Icon-->
                                        <i class="ki-duotone ki-paypal fs-2hx mb-2 pe-0"><span class="path1"></span><span class="path2"></span></i>                        <!--end::Icon-->

                                        <!--begin::Title-->
                                        <span class="fs-7 fw-bold d-block">E-Wallet</span>
                                        <!--end::Title-->
                                    </label>
                                    <!--end::Radio-->
                                            </div>
                            <!--end::Radio group-->

                            <!--begin::Actions-->
                            <button class="btn btn-primary fs-1 w-100 py-4" >Print Bills</button>
                            <!--end::Actions-->

                        </div>
                        <!--end::Payment Method-->
                    </div>
                    <!--end: Card Body-->
                </div>
                <!--end::Pos order-->




        </div>
        <!--end::Main column-->
</div>
<!--end::Form-->
  </div>
        <!--end::Content container-->
    </div>
<!--end::Content-->

<!-- Modal for Quantity Input -->
<div class="modal" id="quantityModal" tabindex="-1" aria-labelledby="quantityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quantityModalLabel">Enter Quantity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="number" id="modalQuantityInput" class="form-control" min="1" value="1" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updateQuantityBtn">Update</button>
            </div>
        </div>
    </div>
</div>



<

    <!-- Print Receipt -->
    <div class="modal fade modal-default" id="print-receipt" aria-labelledby="print-receipt" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="d-flex justify-content-end">
                    <button type="button" class="close p-0" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="receiptContent">

                                <div class="icon-head text-center">
                                            <a href="javascript:void(0);">
                                                <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/logo.png" width="100" height="30" alt="Receipt Logo">
                                            </a>
                                </div>

                                <div class="text-center info text-center">
                                    <h6>Gozak Supermarket, Ondo.</h6>
                                    <p class="mb-0">Phone Number: +1 5656665656</p>
                                    <p class="mb-0">Email: <a href="https://dreamspos.dreamstechnologies.com/cdn-cgi/l/email-protection#f7928f969a879b92b7909a969e9bd994989a"><span class="__cf_email__" data-cfemail="cbaeb3aaa6bba7ae8baca6aaa2a7e5a8a4a6">[email&#160;protected]</span></a></p>
                                </div>
                                <div class="tax-invoice">
                                    <h6 class="text-center">Invoice Receipt </h6>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="invoice-user-name"><span>Name: </span><span id="invoiceUserName">John Doe</span></div>
                                            <div class="invoice-user-name"><span>Invoice No: </span><span id="invoiceNumber">CS132453</span></div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="invoice-user-name"><span>Order Id: </span><span id="orderId">#LL93784</span></div>
                                            <div class="invoice-user-name"><span>Date: </span><span id="invoiceDate">01.07.2022</span></div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table-borderless w-100 table-fit">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="receiptTableBody">

                                        <tr class="subtotal-row">
                                            <td colspan="4">
                                                <table class="table-borderless w-100 table-fit">
                                                    <tr>
                                                        <td>Sub Total :</td>
                                                        <td class="text-end">$700.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Discount :</td>
                                                        <td class="text-end">00.00</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Total Bill :</td>
                                                        <td class="text-end">$655.00</td>
                                                    </tr>

                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                                <div>
                                    <p>Order ID: <span id="receiptOrderId"></span></p>
                                    <p>Grand Total: <span id="receiptGrandTotal"></span></p>
                                </div>
                     </div>
                                <div class="text-center invoice-bar">
                                    {{-- <p>**VAT against this challan is payable through central registration. Thank you for your business!</p> --}}
                                    <a href="javascript:void(0);">
                                        <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/barcode/barcode-03.jpg" alt="Barcode">
                                    </a>
                                    {{-- <p>Sale 31</p> --}}
                                    <p>Thank You For Shopping With Us. Please Come Again</p>

                                    <button id="printSlip" class="btn btn-primary">Print Receipt</button>
                                </div>


                </div>
            </div>
        </div>
    </div>
    <!-- /Print Receipt -->



     <!-- Print Receipt -->
     <div class="modal fade modal-default" id="printout" aria-labelledby="printout" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="d-flex justify-content-end">
                    <button type="button" class="close p-0" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="receiptContent">

                                <div class="icon-head text-center">
                                            <a href="javascript:void(0);">
                                                <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/logo.png" width="100" height="30" alt="Receipt Logo">
                                            </a>
                                </div>

                                <div class="text-center info text-center">
                                    <h6>Gozak Supermarket,Ondo,</h6>
                                    <p class="mb-0">Phone Number: +1 5656665656</p>
                                    <p class="mb-0">Email: <a href="https://dreamspos.dreamstechnologies.com/cdn-cgi/l/email-protection#f7928f969a879b92b7909a969e9bd994989a"><span class="__cf_email__" data-cfemail="cbaeb3aaa6bba7ae8baca6aaa2a7e5a8a4a6">[email&#160;protected]</span></a></p>
                                </div>
                                <div class="tax-invoice">
                                    <h6 class="text-center">Invoice Receipt </h6>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="invoice-user-name"><span>Name: </span><span id="invoiceUserName">John Doe</span></div>
                                            <div class="invoice-user-name"><span>Invoice No: </span><span id="invoiceNumber">CS132453</span></div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="invoice-user-name"><span>Order Id: </span><span id="orderId">#LL93784</span></div>
                                            <div class="invoice-user-name"><span>Date: </span><span id="invoiceDate">01.07.2022</span></div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table-borderless w-100 table-fit">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="receiptTableBody">

                                        <tr class="subtotal-row">
                                            <td colspan="4">
                                                <table class="table-borderless w-100 table-fit">
                                                    <tr>
                                                        <td>Sub Total :</td>
                                                        <td class="text-end">$700.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Discount :</td>
                                                        <td class="text-end">00.00</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Total Bill :</td>
                                                        <td class="text-end">$655.00</td>
                                                    </tr>

                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                                <div>
                                    <p>Order ID: <span id="receiptOrderId"></span></p>
                                    <p>Grand Total: <span id="receiptGrandTotal"></span></p>
                                </div>
                     </div>
                                <div class="text-center invoice-bar">
                                    {{-- <p>**VAT against this challan is payable through central registration. Thank you for your business!</p> --}}
                                    <a href="javascript:void(0);">
                                        <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/barcode/barcode-03.jpg" alt="Barcode">
                                    </a>
                                    {{-- <p>Sale 31</p> --}}
                                    <p>Thank You For Shopping With Us. Please Come Again</p>

                                    <button id="printSlip" class="btn btn-primary">Print Receipt</button>
                                </div>


                </div>
            </div>
        </div>
    </div>
    <!-- /Print Receipt -->


<script>
    // Set the URL for the payments.store route in a JavaScript variable
    const paymentStoreUrl = '{{ route('orders.saveorders') }}';

    document.addEventListener('click', () => {
        document.getElementById('barcodeInput').focus();
    });

            //     document.addEventListener('DOMContentLoaded', function () {
            //     class BarcodeScanner {
            //         constructor() {
            //             this.port = null;
            //             this.reader = null;
            //             this.writer = null;
            //             this.keepReading = false;
            //         }

            //         async detectScanner() {
            //             try {
            //                 // Request port selection dialog
            //                 this.port = await navigator.serial.requestPort({
            //                     // Optional filters if you know specific vendor/product IDs
            //                     filters: [
            //                         // Example filter (replace with your scanner's actual IDs)
            //                         // { usbVendorId: 0x05E0, usbProductId: 0x1200 }
            //                     ]
            //                 });

            //                 await this.connectScanner();
            //             } catch (error) {
            //                 console.error('Scanner connection error:', error);
            //                 this.showConnectionAlert('error', 'Failed to connect scanner');
            //             }
            //         }

            //         async connectScanner() {
            //             try {
            //                 // Open the port
            //                 await this.port.open({
            //                     baudRate: 9600 // Common scanner baud rate, adjust as needed
            //                 });

            //                 this.keepReading = true;
            //                 this.startReading();

            //                 this.showConnectionAlert('success', 'Barcode Scanner Connected');
            //             } catch (error) {
            //                 console.error('Connection failed:', error);
            //                 this.showConnectionAlert('error', 'Scanner Connection Failed');
            //             }
            //         }

            //         async startReading() {
            //             while (this.port && this.keepReading) {
            //                 try {
            //                     const { value, done } = await this.port.readable.getReader().read();
            //                     if (done) break;

            //                     // Process the scanned barcode
            //                     const barcode = new TextDecoder().decode(value);
            //                     this.processBarcode(barcode);
            //                 } catch (error) {
            //                     console.error('Reading error:', error);
            //                     break;
            //                 }
            //             }
            //         }

            //         processBarcode(barcode) {
            //             // Handle the scanned barcode
            //             console.log('Scanned Barcode:', barcode.trim());
            //             // You can add your existing barcode processing logic here
            //         }

            //         async disconnectScanner() {
            //             this.keepReading = false;

            //             if (this.port) {
            //                 try {
            //                     await this.port.close();
            //                     this.showConnectionAlert('warning', 'Barcode Scanner Disconnected');
            //                 } catch (error) {
            //                     console.error('Disconnection error:', error);
            //                 }
            //                 this.port = null;
            //             }
            //         }

            //         showConnectionAlert(type, message) {
            //             // Remove existing alerts
            //             const existingAlert = document.getElementById('scannerConnectionAlert');
            //             if (existingAlert) {
            //                 existingAlert.remove();
            //             }

            //             // Create alert
            //             const alertDiv = document.createElement('div');
            //             alertDiv.id = 'scannerConnectionAlert';
            //             alertDiv.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
            //             alertDiv.style.cssText = `
            //                 z-index: 1060;
            //                 top: 20px;
            //                 left: 50%;
            //                 transform: translateX(-50%);
            //                 max-width: 400px;
            //                 width: 90%;
            //             `;

            //             alertDiv.innerHTML = `
            //                 <strong>Scanner Status:</strong> ${message}
            //                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            //             `;

            //             // Append to body
            //             document.body.appendChild(alertDiv);

            //             // Auto-dismiss after 5 seconds
            //             setTimeout(() => {
            //                 const bsAlert = bootstrap.Alert.getInstance(alertDiv);
            //                 bsAlert?.close();
            //             }, 5000);
            //         }
            //     }

            //     // Initialize the barcode scanner
            //     const scanner = new BarcodeScanner();

            //     // Add connection button
            //     const connectButton = document.createElement('button');
            //     connectButton.textContent = 'Connect Barcode Scanner';
            //     connectButton.className = 'btn btn-primary';
            //     connectButton.addEventListener('click', () => scanner.detectScanner());

            //     // Add disconnect button
            //     const disconnectButton = document.createElement('button');
            //     disconnectButton.textContent = 'Disconnect Scanner';
            //     disconnectButton.className = 'btn btn-danger';
            //     disconnectButton.addEventListener('click', () => scanner.disconnectScanner());

            //     // Add buttons to the page
            //     const buttonContainer = document.createElement('div');
            //     buttonContainer.style.position = 'fixed';
            //     buttonContainer.style.bottom = '20px';
            //     buttonContainer.style.left = '50%';
            //     buttonContainer.style.transform = 'translateX(-50%)';
            //     buttonContainer.style.zIndex = '1060';
            //     buttonContainer.appendChild(connectButton);
            //     buttonContainer.appendChild(disconnectButton);
            //     document.body.appendChild(buttonContainer);

            //     // Listen for connection events
            //     navigator.serial?.addEventListener('connect', (event) => {
            //         console.log('Scanner connected:', event.port);
            //         scanner.showConnectionAlert('success', 'New Scanner Connected');
            //     });

            //     navigator.serial?.addEventListener('disconnect', (event) => {
            //         console.log('Scanner disconnected:', event.port);
            //         scanner.showConnectionAlert('warning', 'Scanner Disconnected');
            //     });
            // });

</script>
@endsection
