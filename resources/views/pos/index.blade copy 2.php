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
        Add Order
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
                                                    eCommerce                                            </li>
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
<form id="kt_ecommerce_edit_order_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="listing.html">
    <!--begin::Aside column-->
    <div class="w-200 flex-lg-row-auto w-lg-300px mb-7 me-7 me-lg-10">



<!--begin::Pos order-->
<div class="card card-flush bg-body " id="kt_pos_form">
    <!--begin::Header-->
    <div class="card-header pt-5">
        <h3 class="card-title fw-bold text-gray-800 fs-2qx">Current Order</h3>

        <!--begin::Toolbar-->
        <div class="card-toolbar">
            <a href="#" class="btn btn-light-primary fs-4 fw-bold py-4">Clear All</a>
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
                <tbody>
                                            <tr data-kt-pos-element="item" data-kt-pos-item-price="33">
                            <td class="pe-0">
                                <div class="d-flex align-items-center">
                                    <img src="../assets/media/stock/food/img-2.jpg" class="w-50px h-50px rounded-3 me-3" alt=""/>
                                    <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6 me-1">T-Bone Stake</span>
                                </div>
                            </td>

                            <td class="pe-0">
                                <!--begin::Dialer-->
                                <div class="position-relative d-flex align-items-center"
                                    data-kt-dialer="true"
                                    data-kt-dialer-min="1"
                                    data-kt-dialer-max="10"
                                    data-kt-dialer-step="1"
                                    data-kt-dialer-decimals="0">

                                    <!--begin::Decrease control-->
                                    <button type="button" class="btn btn-icon btn-sm btn-light btn-icon-gray-400" data-kt-dialer-control="decrease">
                                        <i class="ki-duotone ki-minus fs-3x"></i>                                    </button>
                                    <!--end::Decrease control-->

                                    <!--begin::Input control-->
                                    <input type="text" class="form-control border-0 text-center px-0 fs-3 fw-bold text-gray-800 w-30px" data-kt-dialer-control="input" placeholder="Amount" name="manageBudget" readonly value="2"/>
                                    <!--end::Input control-->

                                    <!--begin::Increase control-->
                                    <button type="button" class="btn btn-icon btn-sm btn-light btn-icon-gray-400" data-kt-dialer-control="increase">
                                        <i class="ki-duotone ki-plus fs-3x"></i>                                    </button>
                                    <!--end::Increase control-->
                                </div>
                                <!--end::Dialer-->
                            </td>

                            <td class="text-end">
                                <span class="fw-bold text-primary fs-2" data-kt-pos-element="item-total">$66.00</span>
                            </td>
                        </tr>
                                            <tr data-kt-pos-element="item" data-kt-pos-item-price="7.5">
                            <td class="pe-0">
                                <div class="d-flex align-items-center">
                                    <img src="../assets/media/stock/food/img-9.jpg" class="w-50px h-50px rounded-3 me-3" alt=""/>
                                    <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6 me-1">Soup of the Day</span>
                                </div>
                            </td>

                            <td class="pe-0">
                                <!--begin::Dialer-->
                                <div class="position-relative d-flex align-items-center"
                                    data-kt-dialer="true"
                                    data-kt-dialer-min="1"
                                    data-kt-dialer-max="10"
                                    data-kt-dialer-step="1"
                                    data-kt-dialer-decimals="0">

                                    <!--begin::Decrease control-->
                                    <button type="button" class="btn btn-icon btn-sm btn-light btn-icon-gray-400" data-kt-dialer-control="decrease">
                                        <i class="ki-duotone ki-minus fs-3x"></i>                                    </button>
                                    <!--end::Decrease control-->

                                    <!--begin::Input control-->
                                    <input type="text" class="form-control border-0 text-center px-0 fs-3 fw-bold text-gray-800 w-30px" data-kt-dialer-control="input" placeholder="Amount" name="manageBudget" readonly value="1"/>
                                    <!--end::Input control-->

                                    <!--begin::Increase control-->
                                    <button type="button" class="btn btn-icon btn-sm btn-light btn-icon-gray-400" data-kt-dialer-control="increase">
                                        <i class="ki-duotone ki-plus fs-3x"></i>                                    </button>
                                    <!--end::Increase control-->
                                </div>
                                <!--end::Dialer-->
                            </td>

                            <td class="text-end">
                                <span class="fw-bold text-primary fs-2" data-kt-pos-element="item-total">$7.50</span>
                            </td>
                        </tr>
                                            <tr data-kt-pos-element="item" data-kt-pos-item-price="13.5">
                            <td class="pe-0">
                                <div class="d-flex align-items-center">
                                    <img src="../assets/media/stock/food/img-3.jpg" class="w-50px h-50px rounded-3 me-3" alt=""/>
                                    <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6 me-1">Pancakes</span>
                                </div>
                            </td>

                            <td class="pe-0">
                                <!--begin::Dialer-->
                                <div class="position-relative d-flex align-items-center"
                                    data-kt-dialer="true"
                                    data-kt-dialer-min="1"
                                    data-kt-dialer-max="10"
                                    data-kt-dialer-step="1"
                                    data-kt-dialer-decimals="0">

                                    <!--begin::Decrease control-->
                                    <button type="button" class="btn btn-icon btn-sm btn-light btn-icon-gray-400" data-kt-dialer-control="decrease">
                                        <i class="ki-duotone ki-minus fs-3x"></i>                                    </button>
                                    <!--end::Decrease control-->

                                    <!--begin::Input control-->
                                    <input type="text" class="form-control border-0 text-center px-0 fs-3 fw-bold text-gray-800 w-30px" data-kt-dialer-control="input" placeholder="Amount" name="manageBudget" readonly value="2"/>
                                    <!--end::Input control-->

                                    <!--begin::Increase control-->
                                    <button type="button" class="btn btn-icon btn-sm btn-light btn-icon-gray-400" data-kt-dialer-control="increase">
                                        <i class="ki-duotone ki-plus fs-3x"></i>                                    </button>
                                    <!--end::Increase control-->
                                </div>
                                <!--end::Dialer-->
                            </td>

                            <td class="text-end">
                                <span class="fw-bold text-primary fs-2" data-kt-pos-element="item-total">$27.00</span>
                            </td>
                        </tr>
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
                <span class="d-block mb-9">Tax(12%)</span>
                <span class="d-block fs-2qx lh-1">Total</span>
            </div>
            <!--end::Content-->

            <!--begin::Content-->
            <div class="fs-6 fw-bold text-white text-end">
                <span class="d-block lh-1 mb-2" data-kt-pos-element="total">$100.50</span>
                <span class="d-block mb-2" data-kt-pos-element="discount">-$8.00</span>
                <span class="d-block mb-9" data-kt-pos-element="tax">$11.20</span>
                <span class="d-block fs-2qx lh-1" data-kt-pos-element="grant-total">$93.46</span>
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
                        <input class="btn-check" type="radio" name="method" value="0"/>
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
                        <input class="btn-check" type="radio" name="method" value="1"/>
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
                        <input class="btn-check" type="radio" name="method" value="2"/>
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
            <button class="btn btn-primary fs-1 w-100 py-4">Print Bills</button>
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
    <div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">

<!--begin::Order details-->
<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <div class="card-title">
            <h2>Select Products</h2>
        </div>
    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body pt-0">
        <div class="d-flex flex-column gap-5">
            <!--begin::Input group-->
            <div>
                <!--begin::Label-->
                <label class="form-label">Add products to this order</label>
                <!--end::Label-->

                <!--begin::Selected products-->
                <div class="row row-cols-1 row-cols-xl-3 row-cols-md-2 border border-dashed rounded pt-3 pb-1 px-2 mb-5 mh-300px overflow-scroll" id="kt_ecommerce_edit_order_selected_products">
                    <!--begin::Empty message-->
                    <span class="w-100 text-muted ">Select one or more products from the list below by ticking the checkbox.</span>
                    <!--end::Empty message-->

                                    </div>
                <!--begin::Selected products-->

                <!--begin::Total price-->
                <div class="fw-bold fs-4">
                    Total Cost: $
                    <span id="kt_ecommerce_edit_order_total_price">
                                                    0.00
                                            </span>
                </div>
                <!--end::Total price-->
            </div>
            <!--end::Input group-->

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
                                            <div class="d-flex align-items-center" data-kt-ecommerce-edit-order-filter="product" data-kt-ecommerce-edit-order-id="product_1">
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
                                                       <span class="fw-bold text-success ms-3">{{ number_format($product->base_price, 2) }}</span>
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

<!--begin::Order details-->
<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <div class="card-title">
            <h2>Delivery Details</h2>
        </div>
    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Billing address-->
        <div class="d-flex flex-column gap-5 gap-md-7">
            <!--begin::Title-->
            <div class="fs-3 fw-bold mb-n2">Billing Address</div>
            <!--end::Title-->

            <!--begin::Input group-->
            <div class="d-flex flex-column flex-md-row gap-5">
                <div class="fv-row flex-row-fluid">
                    <!--begin::Label-->
                    <label class="required form-label">Address Line 1</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input class="form-control" name="billing_order_address_1" placeholder="Address Line 1" value="" />
                    <!--end::Input-->
                </div>

                <div class="flex-row-fluid">
                    <!--begin::Label-->
                    <label class="form-label">Address Line 2</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input class="form-control" name="billing_order_address_2" placeholder="Address Line 2" />
                    <!--end::Input-->
                </div>
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="d-flex flex-column flex-md-row gap-5">
                <div class="flex-row-fluid">
                    <!--begin::Label-->
                    <label class="form-label">City</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input class="form-control" name="billing_order_city" placeholder="" value="" />
                    <!--end::Input-->
                </div>

                <div class="fv-row flex-row-fluid">
                    <!--begin::Label-->
                    <label class="required form-label">Postcode</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input class="form-control" name="billing_order_postcode" placeholder="" value="" />
                    <!--end::Input-->
                </div>

                <div class="fv-row flex-row-fluid">
                    <!--begin::Label-->
                    <label class="required form-label">State</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input class="form-control" name="billing_order_state" placeholder="" value="" />
                    <!--end::Input-->
                </div>
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="fv-row">
                <!--begin::Label-->
                <label class="required form-label">Country</label>
                <!--end::Label-->

                <!--begin::Select2-->
                <select class="form-select" data-placeholder="Select an option" id="kt_ecommerce_edit_order_billing_country" name="billing_order_country">
                    <option></option>
                                            <option value="AF" data-kt-select2-country="/metronic8/demo1/assets/media/flags/afghanistan.svg" >Afghanistan</option>
                                            <option value="AX" data-kt-select2-country="/metronic8/demo1/assets/media/flags/aland-islands.svg" >Aland Islands</option>
                                            <option value="AL" data-kt-select2-country="/metronic8/demo1/assets/media/flags/albania.svg" >Albania</option>
                                            <option value="DZ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/algeria.svg" >Algeria</option>
                                            <option value="AS" data-kt-select2-country="/metronic8/demo1/assets/media/flags/american-samoa.svg" >American Samoa</option>
                                            <option value="AD" data-kt-select2-country="/metronic8/demo1/assets/media/flags/andorra.svg" >Andorra</option>
                                            <option value="AO" data-kt-select2-country="/metronic8/demo1/assets/media/flags/angola.svg" >Angola</option>
                                            <option value="AI" data-kt-select2-country="/metronic8/demo1/assets/media/flags/anguilla.svg" >Anguilla</option>
                                            <option value="AG" data-kt-select2-country="/metronic8/demo1/assets/media/flags/antigua-and-barbuda.svg" >Antigua and Barbuda</option>
                                            <option value="AR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/argentina.svg" >Argentina</option>
                                            <option value="AM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/armenia.svg" >Armenia</option>
                                            <option value="AW" data-kt-select2-country="/metronic8/demo1/assets/media/flags/aruba.svg" >Aruba</option>
                                            <option value="AU" data-kt-select2-country="/metronic8/demo1/assets/media/flags/australia.svg" >Australia</option>
                                            <option value="AT" data-kt-select2-country="/metronic8/demo1/assets/media/flags/austria.svg" >Austria</option>
                                            <option value="AZ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/azerbaijan.svg" >Azerbaijan</option>
                                            <option value="BS" data-kt-select2-country="/metronic8/demo1/assets/media/flags/bahamas.svg" >Bahamas</option>
                                            <option value="BH" data-kt-select2-country="/metronic8/demo1/assets/media/flags/bahrain.svg" >Bahrain</option>
                                            <option value="BD" data-kt-select2-country="/metronic8/demo1/assets/media/flags/bangladesh.svg" >Bangladesh</option>
                                            <option value="BB" data-kt-select2-country="/metronic8/demo1/assets/media/flags/barbados.svg" >Barbados</option>
                                            <option value="BY" data-kt-select2-country="/metronic8/demo1/assets/media/flags/belarus.svg" >Belarus</option>
                                            <option value="BE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/belgium.svg" >Belgium</option>
                                            <option value="BZ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/belize.svg" >Belize</option>
                                            <option value="BJ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/benin.svg" >Benin</option>
                                            <option value="BM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/bermuda.svg" >Bermuda</option>
                                            <option value="BT" data-kt-select2-country="/metronic8/demo1/assets/media/flags/bhutan.svg" >Bhutan</option>
                                            <option value="BO" data-kt-select2-country="/metronic8/demo1/assets/media/flags/bolivia.svg" >Bolivia, Plurinational State of</option>
                                            <option value="BQ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/bonaire.svg" >Bonaire, Sint Eustatius and Saba</option>
                                            <option value="BA" data-kt-select2-country="/metronic8/demo1/assets/media/flags/bosnia-and-herzegovina.svg" >Bosnia and Herzegovina</option>
                                            <option value="BW" data-kt-select2-country="/metronic8/demo1/assets/media/flags/botswana.svg" >Botswana</option>
                                            <option value="BR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/brazil.svg" >Brazil</option>
                                            <option value="IO" data-kt-select2-country="/metronic8/demo1/assets/media/flags/british-indian-ocean-territory.svg" >British Indian Ocean Territory</option>
                                            <option value="BN" data-kt-select2-country="/metronic8/demo1/assets/media/flags/brunei.svg" >Brunei Darussalam</option>
                                            <option value="BG" data-kt-select2-country="/metronic8/demo1/assets/media/flags/bulgaria.svg" >Bulgaria</option>
                                            <option value="BF" data-kt-select2-country="/metronic8/demo1/assets/media/flags/burkina-faso.svg" >Burkina Faso</option>
                                            <option value="BI" data-kt-select2-country="/metronic8/demo1/assets/media/flags/burundi.svg" >Burundi</option>
                                            <option value="KH" data-kt-select2-country="/metronic8/demo1/assets/media/flags/cambodia.svg" >Cambodia</option>
                                            <option value="CM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/cameroon.svg" >Cameroon</option>
                                            <option value="CA" data-kt-select2-country="/metronic8/demo1/assets/media/flags/canada.svg" >Canada</option>
                                            <option value="CV" data-kt-select2-country="/metronic8/demo1/assets/media/flags/cape-verde.svg" >Cape Verde</option>
                                            <option value="KY" data-kt-select2-country="/metronic8/demo1/assets/media/flags/cayman-islands.svg" >Cayman Islands</option>
                                            <option value="CF" data-kt-select2-country="/metronic8/demo1/assets/media/flags/central-african-republic.svg" >Central African Republic</option>
                                            <option value="TD" data-kt-select2-country="/metronic8/demo1/assets/media/flags/chad.svg" >Chad</option>
                                            <option value="CL" data-kt-select2-country="/metronic8/demo1/assets/media/flags/chile.svg" >Chile</option>
                                            <option value="CN" data-kt-select2-country="/metronic8/demo1/assets/media/flags/china.svg" >China</option>
                                            <option value="CX" data-kt-select2-country="/metronic8/demo1/assets/media/flags/christmas-island.svg" >Christmas Island</option>
                                            <option value="CC" data-kt-select2-country="/metronic8/demo1/assets/media/flags/cocos-island.svg" >Cocos (Keeling) Islands</option>
                                            <option value="CO" data-kt-select2-country="/metronic8/demo1/assets/media/flags/colombia.svg" >Colombia</option>
                                            <option value="KM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/comoros.svg" >Comoros</option>
                                            <option value="CK" data-kt-select2-country="/metronic8/demo1/assets/media/flags/cook-islands.svg" >Cook Islands</option>
                                            <option value="CR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/costa-rica.svg" >Costa Rica</option>
                                            <option value="CI" data-kt-select2-country="/metronic8/demo1/assets/media/flags/ivory-coast.svg" >Côte d'Ivoire</option>
                                            <option value="HR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/croatia.svg" >Croatia</option>
                                            <option value="CU" data-kt-select2-country="/metronic8/demo1/assets/media/flags/cuba.svg" >Cuba</option>
                                            <option value="CW" data-kt-select2-country="/metronic8/demo1/assets/media/flags/curacao.svg" >Curaçao</option>
                                            <option value="CZ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/czech-republic.svg" >Czech Republic</option>
                                            <option value="DK" data-kt-select2-country="/metronic8/demo1/assets/media/flags/denmark.svg" >Denmark</option>
                                            <option value="DJ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/djibouti.svg" >Djibouti</option>
                                            <option value="DM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/dominica.svg" >Dominica</option>
                                            <option value="DO" data-kt-select2-country="/metronic8/demo1/assets/media/flags/dominican-republic.svg" >Dominican Republic</option>
                                            <option value="EC" data-kt-select2-country="/metronic8/demo1/assets/media/flags/ecuador.svg" >Ecuador</option>
                                            <option value="EG" data-kt-select2-country="/metronic8/demo1/assets/media/flags/egypt.svg" >Egypt</option>
                                            <option value="SV" data-kt-select2-country="/metronic8/demo1/assets/media/flags/el-salvador.svg" >El Salvador</option>
                                            <option value="GQ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/equatorial-guinea.svg" >Equatorial Guinea</option>
                                            <option value="ER" data-kt-select2-country="/metronic8/demo1/assets/media/flags/eritrea.svg" >Eritrea</option>
                                            <option value="EE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/estonia.svg" >Estonia</option>
                                            <option value="ET" data-kt-select2-country="/metronic8/demo1/assets/media/flags/ethiopia.svg" >Ethiopia</option>
                                            <option value="FK" data-kt-select2-country="/metronic8/demo1/assets/media/flags/falkland-islands.svg" >Falkland Islands (Malvinas)</option>
                                            <option value="FJ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/fiji.svg" >Fiji</option>
                                            <option value="FI" data-kt-select2-country="/metronic8/demo1/assets/media/flags/finland.svg" >Finland</option>
                                            <option value="FR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/france.svg" >France</option>
                                            <option value="PF" data-kt-select2-country="/metronic8/demo1/assets/media/flags/french-polynesia.svg" >French Polynesia</option>
                                            <option value="GA" data-kt-select2-country="/metronic8/demo1/assets/media/flags/gabon.svg" >Gabon</option>
                                            <option value="GM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/gambia.svg" >Gambia</option>
                                            <option value="GE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/georgia.svg" >Georgia</option>
                                            <option value="DE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/germany.svg" >Germany</option>
                                            <option value="GH" data-kt-select2-country="/metronic8/demo1/assets/media/flags/ghana.svg" >Ghana</option>
                                            <option value="GI" data-kt-select2-country="/metronic8/demo1/assets/media/flags/gibraltar.svg" >Gibraltar</option>
                                            <option value="GR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/greece.svg" >Greece</option>
                                            <option value="GL" data-kt-select2-country="/metronic8/demo1/assets/media/flags/greenland.svg" >Greenland</option>
                                            <option value="GD" data-kt-select2-country="/metronic8/demo1/assets/media/flags/grenada.svg" >Grenada</option>
                                            <option value="GU" data-kt-select2-country="/metronic8/demo1/assets/media/flags/guam.svg" >Guam</option>
                                            <option value="GT" data-kt-select2-country="/metronic8/demo1/assets/media/flags/guatemala.svg" >Guatemala</option>
                                            <option value="GG" data-kt-select2-country="/metronic8/demo1/assets/media/flags/guernsey.svg" >Guernsey</option>
                                            <option value="GN" data-kt-select2-country="/metronic8/demo1/assets/media/flags/guinea.svg" >Guinea</option>
                                            <option value="GW" data-kt-select2-country="/metronic8/demo1/assets/media/flags/guinea-bissau.svg" >Guinea-Bissau</option>
                                            <option value="HT" data-kt-select2-country="/metronic8/demo1/assets/media/flags/haiti.svg" >Haiti</option>
                                            <option value="VA" data-kt-select2-country="/metronic8/demo1/assets/media/flags/vatican-city.svg" >Holy See (Vatican City State)</option>
                                            <option value="HN" data-kt-select2-country="/metronic8/demo1/assets/media/flags/honduras.svg" >Honduras</option>
                                            <option value="HK" data-kt-select2-country="/metronic8/demo1/assets/media/flags/hong-kong.svg" >Hong Kong</option>
                                            <option value="HU" data-kt-select2-country="/metronic8/demo1/assets/media/flags/hungary.svg" >Hungary</option>
                                            <option value="IS" data-kt-select2-country="/metronic8/demo1/assets/media/flags/iceland.svg" >Iceland</option>
                                            <option value="IN" data-kt-select2-country="/metronic8/demo1/assets/media/flags/india.svg" >India</option>
                                            <option value="ID" data-kt-select2-country="/metronic8/demo1/assets/media/flags/indonesia.svg" >Indonesia</option>
                                            <option value="IR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/iran.svg" >Iran, Islamic Republic of</option>
                                            <option value="IQ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/iraq.svg" >Iraq</option>
                                            <option value="IE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/ireland.svg" >Ireland</option>
                                            <option value="IM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/isle-of-man.svg" >Isle of Man</option>
                                            <option value="IL" data-kt-select2-country="/metronic8/demo1/assets/media/flags/israel.svg" >Israel</option>
                                            <option value="IT" data-kt-select2-country="/metronic8/demo1/assets/media/flags/italy.svg" >Italy</option>
                                            <option value="JM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/jamaica.svg" >Jamaica</option>
                                            <option value="JP" data-kt-select2-country="/metronic8/demo1/assets/media/flags/japan.svg" >Japan</option>
                                            <option value="JE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/jersey.svg" >Jersey</option>
                                            <option value="JO" data-kt-select2-country="/metronic8/demo1/assets/media/flags/jordan.svg" >Jordan</option>
                                            <option value="KZ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/kazakhstan.svg" >Kazakhstan</option>
                                            <option value="KE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/kenya.svg" >Kenya</option>
                                            <option value="KI" data-kt-select2-country="/metronic8/demo1/assets/media/flags/kiribati.svg" >Kiribati</option>
                                            <option value="KP" data-kt-select2-country="/metronic8/demo1/assets/media/flags/north-korea.svg" >Korea, Democratic People's Republic of</option>
                                            <option value="KW" data-kt-select2-country="/metronic8/demo1/assets/media/flags/kuwait.svg" >Kuwait</option>
                                            <option value="KG" data-kt-select2-country="/metronic8/demo1/assets/media/flags/kyrgyzstan.svg" >Kyrgyzstan</option>
                                            <option value="LA" data-kt-select2-country="/metronic8/demo1/assets/media/flags/laos.svg" >Lao People's Democratic Republic</option>
                                            <option value="LV" data-kt-select2-country="/metronic8/demo1/assets/media/flags/latvia.svg" >Latvia</option>
                                            <option value="LB" data-kt-select2-country="/metronic8/demo1/assets/media/flags/lebanon.svg" >Lebanon</option>
                                            <option value="LS" data-kt-select2-country="/metronic8/demo1/assets/media/flags/lesotho.svg" >Lesotho</option>
                                            <option value="LR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/liberia.svg" >Liberia</option>
                                            <option value="LY" data-kt-select2-country="/metronic8/demo1/assets/media/flags/libya.svg" >Libya</option>
                                            <option value="LI" data-kt-select2-country="/metronic8/demo1/assets/media/flags/liechtenstein.svg" >Liechtenstein</option>
                                            <option value="LT" data-kt-select2-country="/metronic8/demo1/assets/media/flags/lithuania.svg" >Lithuania</option>
                                            <option value="LU" data-kt-select2-country="/metronic8/demo1/assets/media/flags/luxembourg.svg" >Luxembourg</option>
                                            <option value="MO" data-kt-select2-country="/metronic8/demo1/assets/media/flags/macao.svg" >Macao</option>
                                            <option value="MG" data-kt-select2-country="/metronic8/demo1/assets/media/flags/madagascar.svg" >Madagascar</option>
                                            <option value="MW" data-kt-select2-country="/metronic8/demo1/assets/media/flags/malawi.svg" >Malawi</option>
                                            <option value="MY" data-kt-select2-country="/metronic8/demo1/assets/media/flags/malaysia.svg" >Malaysia</option>
                                            <option value="MV" data-kt-select2-country="/metronic8/demo1/assets/media/flags/maldives.svg" >Maldives</option>
                                            <option value="ML" data-kt-select2-country="/metronic8/demo1/assets/media/flags/mali.svg" >Mali</option>
                                            <option value="MT" data-kt-select2-country="/metronic8/demo1/assets/media/flags/malta.svg" >Malta</option>
                                            <option value="MH" data-kt-select2-country="/metronic8/demo1/assets/media/flags/marshall-island.svg" >Marshall Islands</option>
                                            <option value="MQ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/martinique.svg" >Martinique</option>
                                            <option value="MR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/mauritania.svg" >Mauritania</option>
                                            <option value="MU" data-kt-select2-country="/metronic8/demo1/assets/media/flags/mauritius.svg" >Mauritius</option>
                                            <option value="MX" data-kt-select2-country="/metronic8/demo1/assets/media/flags/mexico.svg" >Mexico</option>
                                            <option value="FM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/micronesia.svg" >Micronesia, Federated States of</option>
                                            <option value="MD" data-kt-select2-country="/metronic8/demo1/assets/media/flags/moldova.svg" >Moldova, Republic of</option>
                                            <option value="MC" data-kt-select2-country="/metronic8/demo1/assets/media/flags/monaco.svg" >Monaco</option>
                                            <option value="MN" data-kt-select2-country="/metronic8/demo1/assets/media/flags/mongolia.svg" >Mongolia</option>
                                            <option value="ME" data-kt-select2-country="/metronic8/demo1/assets/media/flags/montenegro.svg" >Montenegro</option>
                                            <option value="MS" data-kt-select2-country="/metronic8/demo1/assets/media/flags/montserrat.svg" >Montserrat</option>
                                            <option value="MA" data-kt-select2-country="/metronic8/demo1/assets/media/flags/morocco.svg" >Morocco</option>
                                            <option value="MZ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/mozambique.svg" >Mozambique</option>
                                            <option value="MM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/myanmar.svg" >Myanmar</option>
                                            <option value="NA" data-kt-select2-country="/metronic8/demo1/assets/media/flags/namibia.svg" >Namibia</option>
                                            <option value="NR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/nauru.svg" >Nauru</option>
                                            <option value="NP" data-kt-select2-country="/metronic8/demo1/assets/media/flags/nepal.svg" >Nepal</option>
                                            <option value="NL" data-kt-select2-country="/metronic8/demo1/assets/media/flags/netherlands.svg" >Netherlands</option>
                                            <option value="NZ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/new-zealand.svg" >New Zealand</option>
                                            <option value="NI" data-kt-select2-country="/metronic8/demo1/assets/media/flags/nicaragua.svg" >Nicaragua</option>
                                            <option value="NE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/niger.svg" >Niger</option>
                                            <option value="NG" data-kt-select2-country="/metronic8/demo1/assets/media/flags/nigeria.svg" >Nigeria</option>
                                            <option value="NU" data-kt-select2-country="/metronic8/demo1/assets/media/flags/niue.svg" >Niue</option>
                                            <option value="NF" data-kt-select2-country="/metronic8/demo1/assets/media/flags/norfolk-island.svg" >Norfolk Island</option>
                                            <option value="MP" data-kt-select2-country="/metronic8/demo1/assets/media/flags/northern-mariana-islands.svg" >Northern Mariana Islands</option>
                                            <option value="NO" data-kt-select2-country="/metronic8/demo1/assets/media/flags/norway.svg" >Norway</option>
                                            <option value="OM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/oman.svg" >Oman</option>
                                            <option value="PK" data-kt-select2-country="/metronic8/demo1/assets/media/flags/pakistan.svg" >Pakistan</option>
                                            <option value="PW" data-kt-select2-country="/metronic8/demo1/assets/media/flags/palau.svg" >Palau</option>
                                            <option value="PS" data-kt-select2-country="/metronic8/demo1/assets/media/flags/palestine.svg" >Palestinian Territory, Occupied</option>
                                            <option value="PA" data-kt-select2-country="/metronic8/demo1/assets/media/flags/panama.svg" >Panama</option>
                                            <option value="PG" data-kt-select2-country="/metronic8/demo1/assets/media/flags/papua-new-guinea.svg" >Papua New Guinea</option>
                                            <option value="PY" data-kt-select2-country="/metronic8/demo1/assets/media/flags/paraguay.svg" >Paraguay</option>
                                            <option value="PE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/peru.svg" >Peru</option>
                                            <option value="PH" data-kt-select2-country="/metronic8/demo1/assets/media/flags/philippines.svg" >Philippines</option>
                                            <option value="PL" data-kt-select2-country="/metronic8/demo1/assets/media/flags/poland.svg" >Poland</option>
                                            <option value="PT" data-kt-select2-country="/metronic8/demo1/assets/media/flags/portugal.svg" >Portugal</option>
                                            <option value="PR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/puerto-rico.svg" >Puerto Rico</option>
                                            <option value="QA" data-kt-select2-country="/metronic8/demo1/assets/media/flags/qatar.svg" >Qatar</option>
                                            <option value="RO" data-kt-select2-country="/metronic8/demo1/assets/media/flags/romania.svg" >Romania</option>
                                            <option value="RU" data-kt-select2-country="/metronic8/demo1/assets/media/flags/russia.svg" >Russian Federation</option>
                                            <option value="RW" data-kt-select2-country="/metronic8/demo1/assets/media/flags/rwanda.svg" >Rwanda</option>
                                            <option value="BL" data-kt-select2-country="/metronic8/demo1/assets/media/flags/st-barts.svg" >Saint Barthélemy</option>
                                            <option value="KN" data-kt-select2-country="/metronic8/demo1/assets/media/flags/saint-kitts-and-nevis.svg" >Saint Kitts and Nevis</option>
                                            <option value="LC" data-kt-select2-country="/metronic8/demo1/assets/media/flags/st-lucia.svg" >Saint Lucia</option>
                                            <option value="MF" data-kt-select2-country="/metronic8/demo1/assets/media/flags/sint-maarten.svg" >Saint Martin (French part)</option>
                                            <option value="VC" data-kt-select2-country="/metronic8/demo1/assets/media/flags/st-vincent-and-the-grenadines.svg" >Saint Vincent and the Grenadines</option>
                                            <option value="WS" data-kt-select2-country="/metronic8/demo1/assets/media/flags/samoa.svg" >Samoa</option>
                                            <option value="SM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/san-marino.svg" >San Marino</option>
                                            <option value="ST" data-kt-select2-country="/metronic8/demo1/assets/media/flags/sao-tome-and-prince.svg" >Sao Tome and Principe</option>
                                            <option value="SA" data-kt-select2-country="/metronic8/demo1/assets/media/flags/saudi-arabia.svg" >Saudi Arabia</option>
                                            <option value="SN" data-kt-select2-country="/metronic8/demo1/assets/media/flags/senegal.svg" >Senegal</option>
                                            <option value="RS" data-kt-select2-country="/metronic8/demo1/assets/media/flags/serbia.svg" >Serbia</option>
                                            <option value="SC" data-kt-select2-country="/metronic8/demo1/assets/media/flags/seychelles.svg" >Seychelles</option>
                                            <option value="SL" data-kt-select2-country="/metronic8/demo1/assets/media/flags/sierra-leone.svg" >Sierra Leone</option>
                                            <option value="SG" data-kt-select2-country="/metronic8/demo1/assets/media/flags/singapore.svg" >Singapore</option>
                                            <option value="SX" data-kt-select2-country="/metronic8/demo1/assets/media/flags/sint-maarten.svg" >Sint Maarten (Dutch part)</option>
                                            <option value="SK" data-kt-select2-country="/metronic8/demo1/assets/media/flags/slovakia.svg" >Slovakia</option>
                                            <option value="SI" data-kt-select2-country="/metronic8/demo1/assets/media/flags/slovenia.svg" >Slovenia</option>
                                            <option value="SB" data-kt-select2-country="/metronic8/demo1/assets/media/flags/solomon-islands.svg" >Solomon Islands</option>
                                            <option value="SO" data-kt-select2-country="/metronic8/demo1/assets/media/flags/somalia.svg" >Somalia</option>
                                            <option value="ZA" data-kt-select2-country="/metronic8/demo1/assets/media/flags/south-africa.svg" >South Africa</option>
                                            <option value="KR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/south-korea.svg" >South Korea</option>
                                            <option value="SS" data-kt-select2-country="/metronic8/demo1/assets/media/flags/south-sudan.svg" >South Sudan</option>
                                            <option value="ES" data-kt-select2-country="/metronic8/demo1/assets/media/flags/spain.svg" >Spain</option>
                                            <option value="LK" data-kt-select2-country="/metronic8/demo1/assets/media/flags/sri-lanka.svg" >Sri Lanka</option>
                                            <option value="SD" data-kt-select2-country="/metronic8/demo1/assets/media/flags/sudan.svg" >Sudan</option>
                                            <option value="SR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/suriname.svg" >Suriname</option>
                                            <option value="SZ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/swaziland.svg" >Swaziland</option>
                                            <option value="SE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/sweden.svg" >Sweden</option>
                                            <option value="CH" data-kt-select2-country="/metronic8/demo1/assets/media/flags/switzerland.svg" >Switzerland</option>
                                            <option value="SY" data-kt-select2-country="/metronic8/demo1/assets/media/flags/syria.svg" >Syrian Arab Republic</option>
                                            <option value="TW" data-kt-select2-country="/metronic8/demo1/assets/media/flags/taiwan.svg" >Taiwan, Province of China</option>
                                            <option value="TJ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/tajikistan.svg" >Tajikistan</option>
                                            <option value="TZ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/tanzania.svg" >Tanzania, United Republic of</option>
                                            <option value="TH" data-kt-select2-country="/metronic8/demo1/assets/media/flags/thailand.svg" >Thailand</option>
                                            <option value="TG" data-kt-select2-country="/metronic8/demo1/assets/media/flags/togo.svg" >Togo</option>
                                            <option value="TK" data-kt-select2-country="/metronic8/demo1/assets/media/flags/tokelau.svg" >Tokelau</option>
                                            <option value="TO" data-kt-select2-country="/metronic8/demo1/assets/media/flags/tonga.svg" >Tonga</option>
                                            <option value="TT" data-kt-select2-country="/metronic8/demo1/assets/media/flags/trinidad-and-tobago.svg" >Trinidad and Tobago</option>
                                            <option value="TN" data-kt-select2-country="/metronic8/demo1/assets/media/flags/tunisia.svg" >Tunisia</option>
                                            <option value="TR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/turkey.svg" >Turkey</option>
                                            <option value="TM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/turkmenistan.svg" >Turkmenistan</option>
                                            <option value="TC" data-kt-select2-country="/metronic8/demo1/assets/media/flags/turks-and-caicos.svg" >Turks and Caicos Islands</option>
                                            <option value="TV" data-kt-select2-country="/metronic8/demo1/assets/media/flags/tuvalu.svg" >Tuvalu</option>
                                            <option value="UG" data-kt-select2-country="/metronic8/demo1/assets/media/flags/uganda.svg" >Uganda</option>
                                            <option value="UA" data-kt-select2-country="/metronic8/demo1/assets/media/flags/ukraine.svg" >Ukraine</option>
                                            <option value="AE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/united-arab-emirates.svg" >United Arab Emirates</option>
                                            <option value="GB" data-kt-select2-country="/metronic8/demo1/assets/media/flags/united-kingdom.svg" >United Kingdom</option>
                                            <option value="US" data-kt-select2-country="/metronic8/demo1/assets/media/flags/united-states.svg" >United States</option>
                                            <option value="UY" data-kt-select2-country="/metronic8/demo1/assets/media/flags/uruguay.svg" >Uruguay</option>
                                            <option value="UZ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/uzbekistan.svg" >Uzbekistan</option>
                                            <option value="VU" data-kt-select2-country="/metronic8/demo1/assets/media/flags/vanuatu.svg" >Vanuatu</option>
                                            <option value="VE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/venezuela.svg" >Venezuela, Bolivarian Republic of</option>
                                            <option value="VN" data-kt-select2-country="/metronic8/demo1/assets/media/flags/vietnam.svg" >Vietnam</option>
                                            <option value="VI" data-kt-select2-country="/metronic8/demo1/assets/media/flags/virgin-islands.svg" >Virgin Islands</option>
                                            <option value="YE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/yemen.svg" >Yemen</option>
                                            <option value="ZM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/zambia.svg" >Zambia</option>
                                            <option value="ZW" data-kt-select2-country="/metronic8/demo1/assets/media/flags/zimbabwe.svg" >Zimbabwe</option>
                                    </select>
                <!--end::Select2-->
            </div>
            <!--end::Input group-->

            <!--begin::Checkbox-->
            <div class="form-check form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="" id="same_as_billing" checked />
                <label class="form-check-label" for="same_as_billing">
                    Shipping address is the same as billing address
                </label>
            </div>
            <!--end::Checkbox-->

            <!--begin::Shipping address-->
            <div class="d-none d-flex flex-column gap-5 gap-md-7" id="kt_ecommerce_edit_order_shipping_form">
                <!--begin::Title-->
                <div class="fs-3 fw-bold mb-n2">Shipping Address</div>
                <!--end::Title-->

                <!--begin::Input group-->
                <div class="d-flex flex-column flex-md-row gap-5">
                    <div class="fv-row flex-row-fluid">
                        <!--begin::Label-->
                        <label class="form-label">Address Line 1</label>
                        <!--end::Label-->

                        <!--begin::Input-->
                        <input class="form-control" name="kt_ecommerce_edit_order_address_1" placeholder="Address Line 1" value="" />
                        <!--end::Input-->
                    </div>

                    <div class="flex-row-fluid">
                        <!--begin::Label-->
                        <label class="form-label">Address Line 2</label>
                        <!--end::Label-->

                        <!--begin::Input-->
                        <input class="form-control" name="kt_ecommerce_edit_order_address_2" placeholder="Address Line 2" />
                        <!--end::Input-->
                    </div>
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="d-flex flex-column flex-md-row gap-5">
                    <div class="flex-row-fluid">
                        <!--begin::Label-->
                        <label class="form-label">City</label>
                        <!--end::Label-->

                        <!--begin::Input-->
                        <input class="form-control" name="kt_ecommerce_edit_order_city" placeholder="" value="" />
                        <!--end::Input-->
                    </div>

                    <div class="fv-row flex-row-fluid">
                        <!--begin::Label-->
                        <label class="form-label">Postcode</label>
                        <!--end::Label-->

                        <!--begin::Input-->
                        <input class="form-control" name="kt_ecommerce_edit_order_postcode" placeholder="" value="" />
                        <!--end::Input-->
                    </div>

                    <div class="fv-row flex-row-fluid">
                        <!--begin::Label-->
                        <label class="form-label">State</label>
                        <!--end::Label-->

                        <!--begin::Input-->
                        <input class="form-control" name="kt_ecommerce_edit_order_state" placeholder="" value="" />
                        <!--end::Input-->
                    </div>
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="fv-row">
                    <!--begin::Label-->
                    <label class="form-label">Country</label>
                    <!--end::Label-->

                    <!--begin::Select2-->
                    <select class="form-select" data-placeholder="Select an option" id="kt_ecommerce_edit_order_shipping_country">
                        <option></option>
                                                    <option value="AF" data-kt-select2-country="/metronic8/demo1/assets/media/flags/afghanistan.svg" >Afghanistan</option>
                                                    <option value="AX" data-kt-select2-country="/metronic8/demo1/assets/media/flags/aland-islands.svg" >Aland Islands</option>
                                                    <option value="AL" data-kt-select2-country="/metronic8/demo1/assets/media/flags/albania.svg" >Albania</option>
                                                    <option value="DZ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/algeria.svg" >Algeria</option>
                                                    <option value="AS" data-kt-select2-country="/metronic8/demo1/assets/media/flags/american-samoa.svg" >American Samoa</option>
                                                    <option value="AD" data-kt-select2-country="/metronic8/demo1/assets/media/flags/andorra.svg" >Andorra</option>
                                                    <option value="AO" data-kt-select2-country="/metronic8/demo1/assets/media/flags/angola.svg" >Angola</option>
                                                    <option value="AI" data-kt-select2-country="/metronic8/demo1/assets/media/flags/anguilla.svg" >Anguilla</option>
                                                    <option value="AG" data-kt-select2-country="/metronic8/demo1/assets/media/flags/antigua-and-barbuda.svg" >Antigua and Barbuda</option>
                                                    <option value="AR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/argentina.svg" >Argentina</option>
                                                    <option value="AM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/armenia.svg" >Armenia</option>
                                                    <option value="AW" data-kt-select2-country="/metronic8/demo1/assets/media/flags/aruba.svg" >Aruba</option>
                                                    <option value="AU" data-kt-select2-country="/metronic8/demo1/assets/media/flags/australia.svg" >Australia</option>
                                                    <option value="AT" data-kt-select2-country="/metronic8/demo1/assets/media/flags/austria.svg" >Austria</option>
                                                    <option value="AZ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/azerbaijan.svg" >Azerbaijan</option>
                                                    <option value="BS" data-kt-select2-country="/metronic8/demo1/assets/media/flags/bahamas.svg" >Bahamas</option>
                                                    <option value="BH" data-kt-select2-country="/metronic8/demo1/assets/media/flags/bahrain.svg" >Bahrain</option>
                                                    <option value="BD" data-kt-select2-country="/metronic8/demo1/assets/media/flags/bangladesh.svg" >Bangladesh</option>
                                                    <option value="BB" data-kt-select2-country="/metronic8/demo1/assets/media/flags/barbados.svg" >Barbados</option>
                                                    <option value="BY" data-kt-select2-country="/metronic8/demo1/assets/media/flags/belarus.svg" >Belarus</option>
                                                    <option value="BE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/belgium.svg" >Belgium</option>
                                                    <option value="BZ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/belize.svg" >Belize</option>
                                                    <option value="BJ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/benin.svg" >Benin</option>
                                                    <option value="BM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/bermuda.svg" >Bermuda</option>
                                                    <option value="BT" data-kt-select2-country="/metronic8/demo1/assets/media/flags/bhutan.svg" >Bhutan</option>
                                                    <option value="BO" data-kt-select2-country="/metronic8/demo1/assets/media/flags/bolivia.svg" >Bolivia, Plurinational State of</option>
                                                    <option value="BQ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/bonaire.svg" >Bonaire, Sint Eustatius and Saba</option>
                                                    <option value="BA" data-kt-select2-country="/metronic8/demo1/assets/media/flags/bosnia-and-herzegovina.svg" >Bosnia and Herzegovina</option>
                                                    <option value="BW" data-kt-select2-country="/metronic8/demo1/assets/media/flags/botswana.svg" >Botswana</option>
                                                    <option value="BR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/brazil.svg" >Brazil</option>
                                                    <option value="IO" data-kt-select2-country="/metronic8/demo1/assets/media/flags/british-indian-ocean-territory.svg" >British Indian Ocean Territory</option>
                                                    <option value="BN" data-kt-select2-country="/metronic8/demo1/assets/media/flags/brunei.svg" >Brunei Darussalam</option>
                                                    <option value="BG" data-kt-select2-country="/metronic8/demo1/assets/media/flags/bulgaria.svg" >Bulgaria</option>
                                                    <option value="BF" data-kt-select2-country="/metronic8/demo1/assets/media/flags/burkina-faso.svg" >Burkina Faso</option>
                                                    <option value="BI" data-kt-select2-country="/metronic8/demo1/assets/media/flags/burundi.svg" >Burundi</option>
                                                    <option value="KH" data-kt-select2-country="/metronic8/demo1/assets/media/flags/cambodia.svg" >Cambodia</option>
                                                    <option value="CM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/cameroon.svg" >Cameroon</option>
                                                    <option value="CA" data-kt-select2-country="/metronic8/demo1/assets/media/flags/canada.svg" >Canada</option>
                                                    <option value="CV" data-kt-select2-country="/metronic8/demo1/assets/media/flags/cape-verde.svg" >Cape Verde</option>
                                                    <option value="KY" data-kt-select2-country="/metronic8/demo1/assets/media/flags/cayman-islands.svg" >Cayman Islands</option>
                                                    <option value="CF" data-kt-select2-country="/metronic8/demo1/assets/media/flags/central-african-republic.svg" >Central African Republic</option>
                                                    <option value="TD" data-kt-select2-country="/metronic8/demo1/assets/media/flags/chad.svg" >Chad</option>
                                                    <option value="CL" data-kt-select2-country="/metronic8/demo1/assets/media/flags/chile.svg" >Chile</option>
                                                    <option value="CN" data-kt-select2-country="/metronic8/demo1/assets/media/flags/china.svg" >China</option>
                                                    <option value="CX" data-kt-select2-country="/metronic8/demo1/assets/media/flags/christmas-island.svg" >Christmas Island</option>
                                                    <option value="CC" data-kt-select2-country="/metronic8/demo1/assets/media/flags/cocos-island.svg" >Cocos (Keeling) Islands</option>
                                                    <option value="CO" data-kt-select2-country="/metronic8/demo1/assets/media/flags/colombia.svg" >Colombia</option>
                                                    <option value="KM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/comoros.svg" >Comoros</option>
                                                    <option value="CK" data-kt-select2-country="/metronic8/demo1/assets/media/flags/cook-islands.svg" >Cook Islands</option>
                                                    <option value="CR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/costa-rica.svg" >Costa Rica</option>
                                                    <option value="CI" data-kt-select2-country="/metronic8/demo1/assets/media/flags/ivory-coast.svg" >Côte d'Ivoire</option>
                                                    <option value="HR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/croatia.svg" >Croatia</option>
                                                    <option value="CU" data-kt-select2-country="/metronic8/demo1/assets/media/flags/cuba.svg" >Cuba</option>
                                                    <option value="CW" data-kt-select2-country="/metronic8/demo1/assets/media/flags/curacao.svg" >Curaçao</option>
                                                    <option value="CZ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/czech-republic.svg" >Czech Republic</option>
                                                    <option value="DK" data-kt-select2-country="/metronic8/demo1/assets/media/flags/denmark.svg" >Denmark</option>
                                                    <option value="DJ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/djibouti.svg" >Djibouti</option>
                                                    <option value="DM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/dominica.svg" >Dominica</option>
                                                    <option value="DO" data-kt-select2-country="/metronic8/demo1/assets/media/flags/dominican-republic.svg" >Dominican Republic</option>
                                                    <option value="EC" data-kt-select2-country="/metronic8/demo1/assets/media/flags/ecuador.svg" >Ecuador</option>
                                                    <option value="EG" data-kt-select2-country="/metronic8/demo1/assets/media/flags/egypt.svg" >Egypt</option>
                                                    <option value="SV" data-kt-select2-country="/metronic8/demo1/assets/media/flags/el-salvador.svg" >El Salvador</option>
                                                    <option value="GQ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/equatorial-guinea.svg" >Equatorial Guinea</option>
                                                    <option value="ER" data-kt-select2-country="/metronic8/demo1/assets/media/flags/eritrea.svg" >Eritrea</option>
                                                    <option value="EE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/estonia.svg" >Estonia</option>
                                                    <option value="ET" data-kt-select2-country="/metronic8/demo1/assets/media/flags/ethiopia.svg" >Ethiopia</option>
                                                    <option value="FK" data-kt-select2-country="/metronic8/demo1/assets/media/flags/falkland-islands.svg" >Falkland Islands (Malvinas)</option>
                                                    <option value="FJ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/fiji.svg" >Fiji</option>
                                                    <option value="FI" data-kt-select2-country="/metronic8/demo1/assets/media/flags/finland.svg" >Finland</option>
                                                    <option value="FR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/france.svg" >France</option>
                                                    <option value="PF" data-kt-select2-country="/metronic8/demo1/assets/media/flags/french-polynesia.svg" >French Polynesia</option>
                                                    <option value="GA" data-kt-select2-country="/metronic8/demo1/assets/media/flags/gabon.svg" >Gabon</option>
                                                    <option value="GM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/gambia.svg" >Gambia</option>
                                                    <option value="GE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/georgia.svg" >Georgia</option>
                                                    <option value="DE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/germany.svg" >Germany</option>
                                                    <option value="GH" data-kt-select2-country="/metronic8/demo1/assets/media/flags/ghana.svg" >Ghana</option>
                                                    <option value="GI" data-kt-select2-country="/metronic8/demo1/assets/media/flags/gibraltar.svg" >Gibraltar</option>
                                                    <option value="GR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/greece.svg" >Greece</option>
                                                    <option value="GL" data-kt-select2-country="/metronic8/demo1/assets/media/flags/greenland.svg" >Greenland</option>
                                                    <option value="GD" data-kt-select2-country="/metronic8/demo1/assets/media/flags/grenada.svg" >Grenada</option>
                                                    <option value="GU" data-kt-select2-country="/metronic8/demo1/assets/media/flags/guam.svg" >Guam</option>
                                                    <option value="GT" data-kt-select2-country="/metronic8/demo1/assets/media/flags/guatemala.svg" >Guatemala</option>
                                                    <option value="GG" data-kt-select2-country="/metronic8/demo1/assets/media/flags/guernsey.svg" >Guernsey</option>
                                                    <option value="GN" data-kt-select2-country="/metronic8/demo1/assets/media/flags/guinea.svg" >Guinea</option>
                                                    <option value="GW" data-kt-select2-country="/metronic8/demo1/assets/media/flags/guinea-bissau.svg" >Guinea-Bissau</option>
                                                    <option value="HT" data-kt-select2-country="/metronic8/demo1/assets/media/flags/haiti.svg" >Haiti</option>
                                                    <option value="VA" data-kt-select2-country="/metronic8/demo1/assets/media/flags/vatican-city.svg" >Holy See (Vatican City State)</option>
                                                    <option value="HN" data-kt-select2-country="/metronic8/demo1/assets/media/flags/honduras.svg" >Honduras</option>
                                                    <option value="HK" data-kt-select2-country="/metronic8/demo1/assets/media/flags/hong-kong.svg" >Hong Kong</option>
                                                    <option value="HU" data-kt-select2-country="/metronic8/demo1/assets/media/flags/hungary.svg" >Hungary</option>
                                                    <option value="IS" data-kt-select2-country="/metronic8/demo1/assets/media/flags/iceland.svg" >Iceland</option>
                                                    <option value="IN" data-kt-select2-country="/metronic8/demo1/assets/media/flags/india.svg" >India</option>
                                                    <option value="ID" data-kt-select2-country="/metronic8/demo1/assets/media/flags/indonesia.svg" >Indonesia</option>
                                                    <option value="IR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/iran.svg" >Iran, Islamic Republic of</option>
                                                    <option value="IQ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/iraq.svg" >Iraq</option>
                                                    <option value="IE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/ireland.svg" >Ireland</option>
                                                    <option value="IM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/isle-of-man.svg" >Isle of Man</option>
                                                    <option value="IL" data-kt-select2-country="/metronic8/demo1/assets/media/flags/israel.svg" >Israel</option>
                                                    <option value="IT" data-kt-select2-country="/metronic8/demo1/assets/media/flags/italy.svg" >Italy</option>
                                                    <option value="JM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/jamaica.svg" >Jamaica</option>
                                                    <option value="JP" data-kt-select2-country="/metronic8/demo1/assets/media/flags/japan.svg" >Japan</option>
                                                    <option value="JE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/jersey.svg" >Jersey</option>
                                                    <option value="JO" data-kt-select2-country="/metronic8/demo1/assets/media/flags/jordan.svg" >Jordan</option>
                                                    <option value="KZ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/kazakhstan.svg" >Kazakhstan</option>
                                                    <option value="KE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/kenya.svg" >Kenya</option>
                                                    <option value="KI" data-kt-select2-country="/metronic8/demo1/assets/media/flags/kiribati.svg" >Kiribati</option>
                                                    <option value="KP" data-kt-select2-country="/metronic8/demo1/assets/media/flags/north-korea.svg" >Korea, Democratic People's Republic of</option>
                                                    <option value="KW" data-kt-select2-country="/metronic8/demo1/assets/media/flags/kuwait.svg" >Kuwait</option>
                                                    <option value="KG" data-kt-select2-country="/metronic8/demo1/assets/media/flags/kyrgyzstan.svg" >Kyrgyzstan</option>
                                                    <option value="LA" data-kt-select2-country="/metronic8/demo1/assets/media/flags/laos.svg" >Lao People's Democratic Republic</option>
                                                    <option value="LV" data-kt-select2-country="/metronic8/demo1/assets/media/flags/latvia.svg" >Latvia</option>
                                                    <option value="LB" data-kt-select2-country="/metronic8/demo1/assets/media/flags/lebanon.svg" >Lebanon</option>
                                                    <option value="LS" data-kt-select2-country="/metronic8/demo1/assets/media/flags/lesotho.svg" >Lesotho</option>
                                                    <option value="LR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/liberia.svg" >Liberia</option>
                                                    <option value="LY" data-kt-select2-country="/metronic8/demo1/assets/media/flags/libya.svg" >Libya</option>
                                                    <option value="LI" data-kt-select2-country="/metronic8/demo1/assets/media/flags/liechtenstein.svg" >Liechtenstein</option>
                                                    <option value="LT" data-kt-select2-country="/metronic8/demo1/assets/media/flags/lithuania.svg" >Lithuania</option>
                                                    <option value="LU" data-kt-select2-country="/metronic8/demo1/assets/media/flags/luxembourg.svg" >Luxembourg</option>
                                                    <option value="MO" data-kt-select2-country="/metronic8/demo1/assets/media/flags/macao.svg" >Macao</option>
                                                    <option value="MG" data-kt-select2-country="/metronic8/demo1/assets/media/flags/madagascar.svg" >Madagascar</option>
                                                    <option value="MW" data-kt-select2-country="/metronic8/demo1/assets/media/flags/malawi.svg" >Malawi</option>
                                                    <option value="MY" data-kt-select2-country="/metronic8/demo1/assets/media/flags/malaysia.svg" >Malaysia</option>
                                                    <option value="MV" data-kt-select2-country="/metronic8/demo1/assets/media/flags/maldives.svg" >Maldives</option>
                                                    <option value="ML" data-kt-select2-country="/metronic8/demo1/assets/media/flags/mali.svg" >Mali</option>
                                                    <option value="MT" data-kt-select2-country="/metronic8/demo1/assets/media/flags/malta.svg" >Malta</option>
                                                    <option value="MH" data-kt-select2-country="/metronic8/demo1/assets/media/flags/marshall-island.svg" >Marshall Islands</option>
                                                    <option value="MQ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/martinique.svg" >Martinique</option>
                                                    <option value="MR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/mauritania.svg" >Mauritania</option>
                                                    <option value="MU" data-kt-select2-country="/metronic8/demo1/assets/media/flags/mauritius.svg" >Mauritius</option>
                                                    <option value="MX" data-kt-select2-country="/metronic8/demo1/assets/media/flags/mexico.svg" >Mexico</option>
                                                    <option value="FM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/micronesia.svg" >Micronesia, Federated States of</option>
                                                    <option value="MD" data-kt-select2-country="/metronic8/demo1/assets/media/flags/moldova.svg" >Moldova, Republic of</option>
                                                    <option value="MC" data-kt-select2-country="/metronic8/demo1/assets/media/flags/monaco.svg" >Monaco</option>
                                                    <option value="MN" data-kt-select2-country="/metronic8/demo1/assets/media/flags/mongolia.svg" >Mongolia</option>
                                                    <option value="ME" data-kt-select2-country="/metronic8/demo1/assets/media/flags/montenegro.svg" >Montenegro</option>
                                                    <option value="MS" data-kt-select2-country="/metronic8/demo1/assets/media/flags/montserrat.svg" >Montserrat</option>
                                                    <option value="MA" data-kt-select2-country="/metronic8/demo1/assets/media/flags/morocco.svg" >Morocco</option>
                                                    <option value="MZ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/mozambique.svg" >Mozambique</option>
                                                    <option value="MM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/myanmar.svg" >Myanmar</option>
                                                    <option value="NA" data-kt-select2-country="/metronic8/demo1/assets/media/flags/namibia.svg" >Namibia</option>
                                                    <option value="NR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/nauru.svg" >Nauru</option>
                                                    <option value="NP" data-kt-select2-country="/metronic8/demo1/assets/media/flags/nepal.svg" >Nepal</option>
                                                    <option value="NL" data-kt-select2-country="/metronic8/demo1/assets/media/flags/netherlands.svg" >Netherlands</option>
                                                    <option value="NZ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/new-zealand.svg" >New Zealand</option>
                                                    <option value="NI" data-kt-select2-country="/metronic8/demo1/assets/media/flags/nicaragua.svg" >Nicaragua</option>
                                                    <option value="NE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/niger.svg" >Niger</option>
                                                    <option value="NG" data-kt-select2-country="/metronic8/demo1/assets/media/flags/nigeria.svg" >Nigeria</option>
                                                    <option value="NU" data-kt-select2-country="/metronic8/demo1/assets/media/flags/niue.svg" >Niue</option>
                                                    <option value="NF" data-kt-select2-country="/metronic8/demo1/assets/media/flags/norfolk-island.svg" >Norfolk Island</option>
                                                    <option value="MP" data-kt-select2-country="/metronic8/demo1/assets/media/flags/northern-mariana-islands.svg" >Northern Mariana Islands</option>
                                                    <option value="NO" data-kt-select2-country="/metronic8/demo1/assets/media/flags/norway.svg" >Norway</option>
                                                    <option value="OM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/oman.svg" >Oman</option>
                                                    <option value="PK" data-kt-select2-country="/metronic8/demo1/assets/media/flags/pakistan.svg" >Pakistan</option>
                                                    <option value="PW" data-kt-select2-country="/metronic8/demo1/assets/media/flags/palau.svg" >Palau</option>
                                                    <option value="PS" data-kt-select2-country="/metronic8/demo1/assets/media/flags/palestine.svg" >Palestinian Territory, Occupied</option>
                                                    <option value="PA" data-kt-select2-country="/metronic8/demo1/assets/media/flags/panama.svg" >Panama</option>
                                                    <option value="PG" data-kt-select2-country="/metronic8/demo1/assets/media/flags/papua-new-guinea.svg" >Papua New Guinea</option>
                                                    <option value="PY" data-kt-select2-country="/metronic8/demo1/assets/media/flags/paraguay.svg" >Paraguay</option>
                                                    <option value="PE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/peru.svg" >Peru</option>
                                                    <option value="PH" data-kt-select2-country="/metronic8/demo1/assets/media/flags/philippines.svg" >Philippines</option>
                                                    <option value="PL" data-kt-select2-country="/metronic8/demo1/assets/media/flags/poland.svg" >Poland</option>
                                                    <option value="PT" data-kt-select2-country="/metronic8/demo1/assets/media/flags/portugal.svg" >Portugal</option>
                                                    <option value="PR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/puerto-rico.svg" >Puerto Rico</option>
                                                    <option value="QA" data-kt-select2-country="/metronic8/demo1/assets/media/flags/qatar.svg" >Qatar</option>
                                                    <option value="RO" data-kt-select2-country="/metronic8/demo1/assets/media/flags/romania.svg" >Romania</option>
                                                    <option value="RU" data-kt-select2-country="/metronic8/demo1/assets/media/flags/russia.svg" >Russian Federation</option>
                                                    <option value="RW" data-kt-select2-country="/metronic8/demo1/assets/media/flags/rwanda.svg" >Rwanda</option>
                                                    <option value="BL" data-kt-select2-country="/metronic8/demo1/assets/media/flags/st-barts.svg" >Saint Barthélemy</option>
                                                    <option value="KN" data-kt-select2-country="/metronic8/demo1/assets/media/flags/saint-kitts-and-nevis.svg" >Saint Kitts and Nevis</option>
                                                    <option value="LC" data-kt-select2-country="/metronic8/demo1/assets/media/flags/st-lucia.svg" >Saint Lucia</option>
                                                    <option value="MF" data-kt-select2-country="/metronic8/demo1/assets/media/flags/sint-maarten.svg" >Saint Martin (French part)</option>
                                                    <option value="VC" data-kt-select2-country="/metronic8/demo1/assets/media/flags/st-vincent-and-the-grenadines.svg" >Saint Vincent and the Grenadines</option>
                                                    <option value="WS" data-kt-select2-country="/metronic8/demo1/assets/media/flags/samoa.svg" >Samoa</option>
                                                    <option value="SM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/san-marino.svg" >San Marino</option>
                                                    <option value="ST" data-kt-select2-country="/metronic8/demo1/assets/media/flags/sao-tome-and-prince.svg" >Sao Tome and Principe</option>
                                                    <option value="SA" data-kt-select2-country="/metronic8/demo1/assets/media/flags/saudi-arabia.svg" >Saudi Arabia</option>
                                                    <option value="SN" data-kt-select2-country="/metronic8/demo1/assets/media/flags/senegal.svg" >Senegal</option>
                                                    <option value="RS" data-kt-select2-country="/metronic8/demo1/assets/media/flags/serbia.svg" >Serbia</option>
                                                    <option value="SC" data-kt-select2-country="/metronic8/demo1/assets/media/flags/seychelles.svg" >Seychelles</option>
                                                    <option value="SL" data-kt-select2-country="/metronic8/demo1/assets/media/flags/sierra-leone.svg" >Sierra Leone</option>
                                                    <option value="SG" data-kt-select2-country="/metronic8/demo1/assets/media/flags/singapore.svg" >Singapore</option>
                                                    <option value="SX" data-kt-select2-country="/metronic8/demo1/assets/media/flags/sint-maarten.svg" >Sint Maarten (Dutch part)</option>
                                                    <option value="SK" data-kt-select2-country="/metronic8/demo1/assets/media/flags/slovakia.svg" >Slovakia</option>
                                                    <option value="SI" data-kt-select2-country="/metronic8/demo1/assets/media/flags/slovenia.svg" >Slovenia</option>
                                                    <option value="SB" data-kt-select2-country="/metronic8/demo1/assets/media/flags/solomon-islands.svg" >Solomon Islands</option>
                                                    <option value="SO" data-kt-select2-country="/metronic8/demo1/assets/media/flags/somalia.svg" >Somalia</option>
                                                    <option value="ZA" data-kt-select2-country="/metronic8/demo1/assets/media/flags/south-africa.svg" >South Africa</option>
                                                    <option value="KR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/south-korea.svg" >South Korea</option>
                                                    <option value="SS" data-kt-select2-country="/metronic8/demo1/assets/media/flags/south-sudan.svg" >South Sudan</option>
                                                    <option value="ES" data-kt-select2-country="/metronic8/demo1/assets/media/flags/spain.svg" >Spain</option>
                                                    <option value="LK" data-kt-select2-country="/metronic8/demo1/assets/media/flags/sri-lanka.svg" >Sri Lanka</option>
                                                    <option value="SD" data-kt-select2-country="/metronic8/demo1/assets/media/flags/sudan.svg" >Sudan</option>
                                                    <option value="SR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/suriname.svg" >Suriname</option>
                                                    <option value="SZ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/swaziland.svg" >Swaziland</option>
                                                    <option value="SE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/sweden.svg" >Sweden</option>
                                                    <option value="CH" data-kt-select2-country="/metronic8/demo1/assets/media/flags/switzerland.svg" >Switzerland</option>
                                                    <option value="SY" data-kt-select2-country="/metronic8/demo1/assets/media/flags/syria.svg" >Syrian Arab Republic</option>
                                                    <option value="TW" data-kt-select2-country="/metronic8/demo1/assets/media/flags/taiwan.svg" >Taiwan, Province of China</option>
                                                    <option value="TJ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/tajikistan.svg" >Tajikistan</option>
                                                    <option value="TZ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/tanzania.svg" >Tanzania, United Republic of</option>
                                                    <option value="TH" data-kt-select2-country="/metronic8/demo1/assets/media/flags/thailand.svg" >Thailand</option>
                                                    <option value="TG" data-kt-select2-country="/metronic8/demo1/assets/media/flags/togo.svg" >Togo</option>
                                                    <option value="TK" data-kt-select2-country="/metronic8/demo1/assets/media/flags/tokelau.svg" >Tokelau</option>
                                                    <option value="TO" data-kt-select2-country="/metronic8/demo1/assets/media/flags/tonga.svg" >Tonga</option>
                                                    <option value="TT" data-kt-select2-country="/metronic8/demo1/assets/media/flags/trinidad-and-tobago.svg" >Trinidad and Tobago</option>
                                                    <option value="TN" data-kt-select2-country="/metronic8/demo1/assets/media/flags/tunisia.svg" >Tunisia</option>
                                                    <option value="TR" data-kt-select2-country="/metronic8/demo1/assets/media/flags/turkey.svg" >Turkey</option>
                                                    <option value="TM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/turkmenistan.svg" >Turkmenistan</option>
                                                    <option value="TC" data-kt-select2-country="/metronic8/demo1/assets/media/flags/turks-and-caicos.svg" >Turks and Caicos Islands</option>
                                                    <option value="TV" data-kt-select2-country="/metronic8/demo1/assets/media/flags/tuvalu.svg" >Tuvalu</option>
                                                    <option value="UG" data-kt-select2-country="/metronic8/demo1/assets/media/flags/uganda.svg" >Uganda</option>
                                                    <option value="UA" data-kt-select2-country="/metronic8/demo1/assets/media/flags/ukraine.svg" >Ukraine</option>
                                                    <option value="AE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/united-arab-emirates.svg" >United Arab Emirates</option>
                                                    <option value="GB" data-kt-select2-country="/metronic8/demo1/assets/media/flags/united-kingdom.svg" >United Kingdom</option>
                                                    <option value="US" data-kt-select2-country="/metronic8/demo1/assets/media/flags/united-states.svg" >United States</option>
                                                    <option value="UY" data-kt-select2-country="/metronic8/demo1/assets/media/flags/uruguay.svg" >Uruguay</option>
                                                    <option value="UZ" data-kt-select2-country="/metronic8/demo1/assets/media/flags/uzbekistan.svg" >Uzbekistan</option>
                                                    <option value="VU" data-kt-select2-country="/metronic8/demo1/assets/media/flags/vanuatu.svg" >Vanuatu</option>
                                                    <option value="VE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/venezuela.svg" >Venezuela, Bolivarian Republic of</option>
                                                    <option value="VN" data-kt-select2-country="/metronic8/demo1/assets/media/flags/vietnam.svg" >Vietnam</option>
                                                    <option value="VI" data-kt-select2-country="/metronic8/demo1/assets/media/flags/virgin-islands.svg" >Virgin Islands</option>
                                                    <option value="YE" data-kt-select2-country="/metronic8/demo1/assets/media/flags/yemen.svg" >Yemen</option>
                                                    <option value="ZM" data-kt-select2-country="/metronic8/demo1/assets/media/flags/zambia.svg" >Zambia</option>
                                                    <option value="ZW" data-kt-select2-country="/metronic8/demo1/assets/media/flags/zimbabwe.svg" >Zimbabwe</option>
                                            </select>
                    <!--end::Select2-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Shipping address-->
        </div>
        <!--end::Billing address-->


    </div>
    <!--end::Card body-->
</div>
<!--end::Order details-->
        <div class="d-flex justify-content-end">
            <!--begin::Button-->
            <a href="../catalog/products.html" id="kt_ecommerce_edit_order_cancel" class="btn btn-light me-5">
                Cancel
            </a>
            <!--end::Button-->

            <!--begin::Button-->
            <button type="submit" id="kt_ecommerce_edit_order_submit" class="btn btn-primary">
                <span class="indicator-label">
                    Save Changes
                </span>
                <span class="indicator-progress">
                    Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
            </button>
            <!--end::Button-->
        </div>
    </div>
    <!--end::Main column-->
</form>
<!--end::Form-->        </div>
        <!--end::Content container-->
    </div>
<!--end::Content-->


@endsection