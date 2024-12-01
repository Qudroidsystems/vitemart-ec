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
    <div class="w-100 flex-lg-row-auto w-lg-500px mb-7 me-7 me-lg-10">

{{-- <!--begin::Order details-->
<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <div class="card-title">
            <h2>Order Details</h2>
        </div>
    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body pt-0">
        <div class="d-flex flex-column gap-10">
            <!--begin::Input group-->
            <div class="fv-row">
                <!--begin::Label-->
                <label class="form-label">Order ID</label>
                <!--end::Label-->

                <!--begin::Auto-generated ID-->
                <div class="fw-bold fs-3">#13758</div>
                <!--end::Input-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="fv-row">
                <!--begin::Label-->
                <label class="required form-label">Payment Method</label>
                <!--end::Label-->

                <!--begin::Select2-->
                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" name="payment_method" id="kt_ecommerce_edit_order_payment">
                    <option></option>
                    <option value="cod">Cash on Delivery</option>
                    <option value="visa" >Credit Card (Visa)</option>
                    <option value="mastercard">Credit Card (Mastercard)</option>
                    <option value="paypal">Paypal</option>
                </select>
                <!--end::Select2-->

                <!--begin::Description-->
                <div class="text-muted fs-7">Set the date of the order to process.</div>
                <!--end::Description-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="fv-row">
                <!--begin::Label-->
                <label class="required form-label">Shipping Method</label>
                <!--end::Label-->

                <!--begin::Select2-->
                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" name="shipping_method"  id="kt_ecommerce_edit_order_shipping">
                    <option></option>
                    <option value="none">N/A - Virtual Product</option>
                    <option value="standard" >Standard Rate</option>
                    <option value="express">Express Rate</option>
                    <option value="speed">Speed Overnight Rate</option>
                </select>
                <!--end::Select2-->

                <!--begin::Description-->
                <div class="text-muted fs-7">Set the date of the order to process.</div>
                <!--end::Description-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="fv-row">
                <!--begin::Label-->
                <label class="required form-label">Order Date</label>
                <!--end::Label-->

                <!--begin::Editor-->
                <input id="kt_ecommerce_edit_order_date" name="order_date" placeholder="Select a date" class="form-control mb-2" value="" />
                <!--end::Editor-->

                <!--begin::Description-->
                <div class="text-muted fs-7">Set the date of the order to process.</div>
                <!--end::Description-->
            </div>
            <!--end::Input group-->
        </div>
    </div>
    <!--end::Card header-->
</div>
<!--end::Order details--> --}}


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
    <!--end::Aside column-->





    <!--begin::Main column-->
    <div class="d-flex flex-column flex-lg-row-fluid gap-4 gap-lg-10">

        <!--begin::Order details-->
        <div class="card card-flush py-4">

            <!--begin::Card body-->
            <div class="card-body pt-0">
                <div class="d-flex flex-column gap-10">


                    <!--begin::Separator-->
                    <div class="separator"></div>
                    <!--end::Separator-->

                    <!--begin::Search products-->
                    <div class="d-flex align-items-center position-relative mb-n7 ">
                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4"><span class="path1"></span><span class="path2"></span></i>                <input type="text" data-kt-ecommerce-edit-order-filter="search" class="form-control form-control-solid w-100 w-lg-50 ps-12" placeholder="Search Products" />
                    </div>
                    <!--end::Search products-->

                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_edit_order_product_table">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-25px pe-2"></th>
                                <th class="min-w-200px">Product</th>
                                <th class="min-w-100px text-end pe-5">Qty Remaining</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            @foreach($products as $product)
                            <tr>
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
                                    </tr>
                                @endforeach

                            </tbody>
                    </table>
                    <!--end::Table-->
                </div>
            </div>
            <!--end::Card header-->
        </div>
        <!--end::Order details-->



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



<!-- Modal for Print Confirmation -->
<div class="modal fade" id="printConfirmationModal" tabindex="-1" aria-labelledby="printConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="printConfirmationModalLabel">Confirm Print</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="https://dreamspos.dreamstechnologies.com/html/template/pos.html">
                    <div class="icon-head">
                        <a href="javascript:void(0);">
                            <i data-feather="check-circle" class="feather-40"></i>
                        </a>
                    </div>
                    <h4>Payment Completed</h4>
                    <p class="mb-0">Do you want to Print Receipt for the Completed Order</p>
                    <div class="modal-footer d-sm-flex justify-content-between">
                        <button type="button" class="btn btn-primary flex-fill" data-bs-toggle="modal" data-bs-target="#print-receipt">Print Receipt<i class="feather-arrow-right-circle icon-me-5"></i></button>
                        <button type="submit" class="btn btn-secondary flex-fill">Next Order<i class="feather-arrow-right-circle icon-me-5"></i></button>
                    </div>
                </form>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmPrint">Yes, Proceed</button>
            </div> --}}
        </div>
    </div>
</div>



<!-- Modal for Print Preview -->
<div class="modal fade" id="printPreviewModal" tabindex="-1" aria-labelledby="printPreviewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="printPreviewModalLabel">Print Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="orderSlip">
                    <h4>Order Summary</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="orderItems">
                            <!-- Dynamic item rows will be inserted here -->
                        </tbody>
                    </table>
                    <p><strong>Subtotal:</strong> $100.50</p>
                    <p><strong>Discounts:</strong> -$8.00</p>
                    <p><strong>Tax (12%):</strong> $11.20</p>
                    <p><strong>Total:</strong> $93.46</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="printSlip">Print</button>
            </div>
        </div>
    </div>
</div>



	<!-- Payment Completed -->
    <div class="modal fade modal-default" id="payment-completed" aria-labelledby="payment-completed">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <form action="https://dreamspos.dreamstechnologies.com/html/template/pos.html">
                        <div class="icon-head">
                            <a href="javascript:void(0);">
                                <i data-feather="check-circle" class="feather-40"></i>
                            </a>
                        </div>
                        <h4>Payment Completed</h4>
                        <p class="mb-0">Do you want to Print Receipt for the Completed Order</p>
                        <div class="modal-footer d-sm-flex justify-content-between">
                            <button type="button" class="btn btn-primary flex-fill" data-bs-toggle="modal" data-bs-target="#print-receipt">Print Receipt<i class="feather-arrow-right-circle icon-me-5"></i></button>
                            <button type="submit" class="btn btn-secondary flex-fill">Next Order<i class="feather-arrow-right-circle icon-me-5"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Payment Completed -->

    <!-- Print Receipt -->
    <div class="modal fade modal-default" id="print-receipt" aria-labelledby="print-receipt">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="d-flex justify-content-end">
                    <button type="button" class="close p-0" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="icon-head text-center">
                        <a href="javascript:void(0);">
                            <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/logo.png" width="100" height="30" alt="Receipt Logo">
                        </a>
                    </div>
                    <div class="text-center info text-center">
                        <h6>Dreamguys Technologies Pvt Ltd.,</h6>
                        <p class="mb-0">Phone Number: +1 5656665656</p>
                        <p class="mb-0">Email: <a href="https://dreamspos.dreamstechnologies.com/cdn-cgi/l/email-protection#f7928f969a879b92b7909a969e9bd994989a"><span class="__cf_email__" data-cfemail="cbaeb3aaa6bba7ae8baca6aaa2a7e5a8a4a6">[email&#160;protected]</span></a></p>
                    </div>
                    <div class="tax-invoice">
                        <h6 class="text-center">Tax Invoice</h6>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="invoice-user-name"><span>Name: </span><span>John Doe</span></div>
                                <div class="invoice-user-name"><span>Invoice No: </span><span>CS132453</span></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="invoice-user-name"><span>Customer Id: </span><span>#LL93784</span></div>
                                <div class="invoice-user-name"><span>Date: </span><span>01.07.2022</span></div>
                            </div>
                        </div>
                    </div>
                    <table class="table-borderless w-100 table-fit">
                        <thead>
                            <tr>
                                <th># Item</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1. Red Nike Laser</td>
                                <td>$50</td>
                                <td>3</td>
                                <td class="text-end">$150</td>
                            </tr>
                            <tr>
                                <td>2. Iphone 14</td>
                                <td>$50</td>
                                <td>2</td>
                                <td class="text-end">$100</td>
                            </tr>
                            <tr>
                                <td>3. Apple Series 8</td>
                                <td>$50</td>
                                <td>3</td>
                                <td class="text-end">$150</td>
                            </tr>
                            <tr class="subtotal-row">
                                <td colspan="4">
                                    <table class="table-borderless w-100 table-fit">
                                        <tr>
                                            <td>Sub Total :</td>
                                            <td class="text-end">$700.00</td>
                                        </tr>
                                        <tr>
                                            <td>Discount :</td>
                                            <td class="text-end">-$50.00</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping :</td>
                                            <td class="text-end">0.00</td>
                                        </tr>
                                        <tr>
                                            <td>Tax (5%) :</td>
                                            <td class="text-end">$5.00</td>
                                        </tr>
                                        <tr>
                                            <td>Total Bill :</td>
                                            <td class="text-end">$655.00</td>
                                        </tr>
                                        <tr>
                                            <td>Due :</td>
                                            <td class="text-end">$0.00</td>
                                        </tr>
                                        <tr>
                                            <td>Total Payable :</td>
                                            <td class="text-end">$655.00</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                        <button id="printSlip">Print Slip</button>
                    </table>
                    <div class="text-center invoice-bar">
                        <p>**VAT against this challan is payable through central registration. Thank you for your business!</p>
                        <a href="javascript:void(0);">
                            <img src="https://dreamspos.dreamstechnologies.com/html/template/assets/img/barcode/barcode-03.jpg" alt="Barcode">
                        </a>
                        <p>Sale 31</p>
                        <p>Thank You For Shopping With Us. Please Come Again</p>
                        <a href="javascript:void(0);" class="btn btn-primary">Print Receipt</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Print Receipt -->


<script>
    // Set the URL for the payments.store route in a JavaScript variable
    const paymentStoreUrl = '{{ route('orders.saveorders') }}';
</script>
@endsection
