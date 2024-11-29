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
        Orders Listing
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
<div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_6486985b8de0a">
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
                <select class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_6486985b8de0a" data-allow-clear="true">
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
            <!--begin::Products-->
<div class="card card-flush">
    <!--begin::Card header-->
    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
        <!--begin::Card title-->
        <div class="card-title">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4"><span class="path1"></span><span class="path2"></span></i>                <input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Order" />
            </div>
            <!--end::Search-->
        </div>
        <!--end::Card title-->

        <!--begin::Card toolbar-->
        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
            <!--begin::Flatpickr-->
            <div class="input-group w-250px">
                <input class="form-control form-control-solid rounded rounded-end-0" placeholder="Pick date range" id="kt_ecommerce_sales_flatpickr" />
                <button class="btn btn-icon btn-light" id="kt_ecommerce_sales_flatpickr_clear">
                    <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>                </button>
            </div>
            <!--end::Flatpickr-->

            <div class="w-100 mw-150px">
                <!--begin::Select2-->
                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-order-filter="status">
                    <option></option>
                    <option value="all">All</option>
                    <option value="Cancelled">Cancelled</option>
                    <option value="Completed">Completed</option>
                    <option value="Denied">Denied</option>
                    <option value="Expired">Expired</option>
                    <option value="Failed">Failed</option>
                    <option value="Pending">Pending</option>
                    <option value="Processing">Processing</option>
                    <option value="Refunded">Refunded</option>
                    <option value="Delivered">Delivered</option>
                    <option value="Delivering">Delivering</option>
                </select>
                <!--end::Select2-->
            </div>

            <!--begin::Add product-->
            <a href="../catalog/add-product.html" class="btn btn-primary">
                Add Order
            </a>
            <!--end::Add product-->
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body pt-0">

<!--begin::Table-->
<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_sales_table">
    <thead>
        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
            <th class="w-10px pe-2">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_sales_table .form-check-input" value="1" />
                </div>
            </th>
            <th class="min-w-100px">Order ID</th>
            <th class="min-w-175px">Customer</th>
            <th class="text-end min-w-70px">Status</th>
            <th class="text-end min-w-100px">Total</th>
            <th class="text-end min-w-100px">Date Added</th>
            <th class="text-end min-w-100px">Date Modified</th>
            <th class="text-end min-w-100px">Actions</th>
        </tr>
    </thead>
    <tbody class="fw-semibold text-gray-600">
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13738                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-13.jpg" alt="John Miller" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">John Miller</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Completed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Completed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$461.00</span>
                </td>
                                <td class="text-end" data-order="2023-06-07">
                    <span class="fw-bold">07/06/2023</span>
                </td>
                <td class="text-end" data-order="2023-06-11">
                    <span class="fw-bold">11/06/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13739                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label fs-3 bg-light-danger text-danger">
                                        O                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Olivia Wild</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Failed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-danger">Failed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$91.00</span>
                </td>
                                <td class="text-end" data-order="2023-06-05">
                    <span class="fw-bold">05/06/2023</span>
                </td>
                <td class="text-end" data-order="2023-06-10">
                    <span class="fw-bold">10/06/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13740                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-23.jpg" alt="Dan Wilson" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Dan Wilson</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Denied">
                    <!--begin::Badges-->
                    <div class="badge badge-light-danger">Denied</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$403.00</span>
                </td>
                                <td class="text-end" data-order="2023-06-02">
                    <span class="fw-bold">02/06/2023</span>
                </td>
                <td class="text-end" data-order="2023-06-09">
                    <span class="fw-bold">09/06/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13741                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label fs-3 bg-light-danger text-danger">
                                        M                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Melody Macy</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Completed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Completed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$268.00</span>
                </td>
                                <td class="text-end" data-order="2023-06-05">
                    <span class="fw-bold">05/06/2023</span>
                </td>
                <td class="text-end" data-order="2023-06-08">
                    <span class="fw-bold">08/06/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13742                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-25.jpg" alt="Brian Cox" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Brian Cox</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Processing">
                    <!--begin::Badges-->
                    <div class="badge badge-light-primary">Processing</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$338.00</span>
                </td>
                                <td class="text-end" data-order="2023-06-04">
                    <span class="fw-bold">04/06/2023</span>
                </td>
                <td class="text-end" data-order="2023-06-07">
                    <span class="fw-bold">07/06/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13743                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-13.jpg" alt="John Miller" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">John Miller</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Completed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Completed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$290.00</span>
                </td>
                                <td class="text-end" data-order="2023-06-02">
                    <span class="fw-bold">02/06/2023</span>
                </td>
                <td class="text-end" data-order="2023-06-06">
                    <span class="fw-bold">06/06/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13744                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-13.jpg" alt="John Miller" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">John Miller</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Completed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Completed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$285.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-29">
                    <span class="fw-bold">29/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-06-05">
                    <span class="fw-bold">05/06/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13745                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-6.jpg" alt="Emma Smith" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Emma Smith</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Completed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Completed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$490.00</span>
                </td>
                                <td class="text-end" data-order="2023-06-02">
                    <span class="fw-bold">02/06/2023</span>
                </td>
                <td class="text-end" data-order="2023-06-04">
                    <span class="fw-bold">04/06/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13746                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label fs-3 bg-light-danger text-danger">
                                        M                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Melody Macy</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Completed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Completed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$135.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-28">
                    <span class="fw-bold">28/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-06-03">
                    <span class="fw-bold">03/06/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13747                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-21.jpg" alt="Ethan Wilder" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ethan Wilder</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Completed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Completed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$153.00</span>
                </td>
                                <td class="text-end" data-order="2023-06-01">
                    <span class="fw-bold">01/06/2023</span>
                </td>
                <td class="text-end" data-order="2023-06-02">
                    <span class="fw-bold">02/06/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13748                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-13.jpg" alt="John Miller" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">John Miller</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Failed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-danger">Failed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$37.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-31">
                    <span class="fw-bold">31/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-06-01">
                    <span class="fw-bold">01/06/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13749                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-6.jpg" alt="Emma Smith" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Emma Smith</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Completed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Completed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$466.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-25">
                    <span class="fw-bold">25/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-31">
                    <span class="fw-bold">31/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13750                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-5.jpg" alt="Sean Bean" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Sean Bean</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Failed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-danger">Failed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$280.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-26">
                    <span class="fw-bold">26/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-30">
                    <span class="fw-bold">30/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13751                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-9.jpg" alt="Francis Mitcham" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Francis Mitcham</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Failed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-danger">Failed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$11.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-22">
                    <span class="fw-bold">22/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-29">
                    <span class="fw-bold">29/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13752                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label fs-3 bg-light-danger text-danger">
                                        E                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Emma Bold</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Expired">
                    <!--begin::Badges-->
                    <div class="badge badge-light-danger">Expired</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$388.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-25">
                    <span class="fw-bold">25/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-28">
                    <span class="fw-bold">28/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13753                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-23.jpg" alt="Dan Wilson" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Dan Wilson</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Completed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Completed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$59.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-26">
                    <span class="fw-bold">26/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-27">
                    <span class="fw-bold">27/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13754                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-6.jpg" alt="Emma Smith" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Emma Smith</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Completed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Completed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$189.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-21">
                    <span class="fw-bold">21/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-26">
                    <span class="fw-bold">26/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13755                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-9.jpg" alt="Francis Mitcham" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Francis Mitcham</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Completed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Completed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$334.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-21">
                    <span class="fw-bold">21/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-25">
                    <span class="fw-bold">25/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13756                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label fs-3 bg-light-primary text-primary">
                                        N                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Neil Owen</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Delivering">
                    <!--begin::Badges-->
                    <div class="badge badge-light-primary">Delivering</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$34.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-18">
                    <span class="fw-bold">18/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-24">
                    <span class="fw-bold">24/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13757                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-5.jpg" alt="Sean Bean" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Sean Bean</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Completed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Completed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$261.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-18">
                    <span class="fw-bold">18/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-23">
                    <span class="fw-bold">23/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13758                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label fs-3 bg-light-success text-success">
                                        L                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Lucy Kunic</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Delivering">
                    <!--begin::Badges-->
                    <div class="badge badge-light-primary">Delivering</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$226.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-20">
                    <span class="fw-bold">20/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-22">
                    <span class="fw-bold">22/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13759                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label fs-3 bg-light-primary text-primary">
                                        N                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Neil Owen</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Cancelled">
                    <!--begin::Badges-->
                    <div class="badge badge-light-danger">Cancelled</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$240.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-17">
                    <span class="fw-bold">17/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-21">
                    <span class="fw-bold">21/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13760                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label fs-3 bg-light-danger text-danger">
                                        M                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Melody Macy</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Cancelled">
                    <!--begin::Badges-->
                    <div class="badge badge-light-danger">Cancelled</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$294.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-19">
                    <span class="fw-bold">19/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-20">
                    <span class="fw-bold">20/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13761                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label fs-3 bg-light-danger text-danger">
                                        E                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Emma Bold</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Completed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Completed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$110.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-17">
                    <span class="fw-bold">17/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-19">
                    <span class="fw-bold">19/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13762                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-5.jpg" alt="Sean Bean" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Sean Bean</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Completed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Completed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$479.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-11">
                    <span class="fw-bold">11/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-18">
                    <span class="fw-bold">18/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13763                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-12.jpg" alt="Ana Crown" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ana Crown</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Completed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Completed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$284.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-11">
                    <span class="fw-bold">11/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-17">
                    <span class="fw-bold">17/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13764                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-23.jpg" alt="Dan Wilson" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Dan Wilson</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Completed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Completed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$276.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-15">
                    <span class="fw-bold">15/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-16">
                    <span class="fw-bold">16/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13765                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-6.jpg" alt="Emma Smith" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Emma Smith</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Completed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Completed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$39.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-14">
                    <span class="fw-bold">14/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-15">
                    <span class="fw-bold">15/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13766                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label fs-3 bg-light-info text-info">
                                        A                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Robert Doe</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Completed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Completed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$39.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-12">
                    <span class="fw-bold">12/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-14">
                    <span class="fw-bold">14/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13767                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label fs-3 bg-light-danger text-danger">
                                        O                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Olivia Wild</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Pending">
                    <!--begin::Badges-->
                    <div class="badge badge-light-warning">Pending</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$139.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-10">
                    <span class="fw-bold">10/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-13">
                    <span class="fw-bold">13/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13768                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-13.jpg" alt="John Miller" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">John Miller</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Processing">
                    <!--begin::Badges-->
                    <div class="badge badge-light-primary">Processing</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$334.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-06">
                    <span class="fw-bold">06/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-12">
                    <span class="fw-bold">12/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13769                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label fs-3 bg-light-danger text-danger">
                                        O                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Olivia Wild</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Completed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Completed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$39.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-06">
                    <span class="fw-bold">06/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-11">
                    <span class="fw-bold">11/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13770                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label fs-3 bg-light-primary text-primary">
                                        N                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Neil Owen</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Failed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-danger">Failed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$87.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-04">
                    <span class="fw-bold">04/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-10">
                    <span class="fw-bold">10/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13771                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label fs-3 bg-light-danger text-danger">
                                        M                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Melody Macy</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Completed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Completed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$401.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-08">
                    <span class="fw-bold">08/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-09">
                    <span class="fw-bold">09/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13772                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-12.jpg" alt="Ana Crown" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ana Crown</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Delivered">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Delivered</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$225.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-01">
                    <span class="fw-bold">01/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-08">
                    <span class="fw-bold">08/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13773                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-21.jpg" alt="Ethan Wilder" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ethan Wilder</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Pending">
                    <!--begin::Badges-->
                    <div class="badge badge-light-warning">Pending</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$217.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-01">
                    <span class="fw-bold">01/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-07">
                    <span class="fw-bold">07/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13774                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label fs-3 bg-light-success text-success">
                                        L                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Lucy Kunic</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Denied">
                    <!--begin::Badges-->
                    <div class="badge badge-light-danger">Denied</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$195.00</span>
                </td>
                                <td class="text-end" data-order="2023-04-30">
                    <span class="fw-bold">30/04/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-06">
                    <span class="fw-bold">06/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13775                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-23.jpg" alt="Dan Wilson" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Dan Wilson</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Expired">
                    <!--begin::Badges-->
                    <div class="badge badge-light-danger">Expired</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$94.00</span>
                </td>
                                <td class="text-end" data-order="2023-05-01">
                    <span class="fw-bold">01/05/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-05">
                    <span class="fw-bold">05/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13776                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label fs-3 bg-light-primary text-primary">
                                        N                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Neil Owen</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Completed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Completed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$207.00</span>
                </td>
                                <td class="text-end" data-order="2023-04-28">
                    <span class="fw-bold">28/04/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-04">
                    <span class="fw-bold">04/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13777                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label fs-3 bg-light-danger text-danger">
                                        O                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Olivia Wild</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Pending">
                    <!--begin::Badges-->
                    <div class="badge badge-light-warning">Pending</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$120.00</span>
                </td>
                                <td class="text-end" data-order="2023-04-26">
                    <span class="fw-bold">26/04/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-03">
                    <span class="fw-bold">03/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13778                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label fs-3 bg-light-warning text-warning">
                                        C                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Mikaela Collins</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Delivered">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Delivered</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$258.00</span>
                </td>
                                <td class="text-end" data-order="2023-04-25">
                    <span class="fw-bold">25/04/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-02">
                    <span class="fw-bold">02/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13779                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-23.jpg" alt="Dan Wilson" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Dan Wilson</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Completed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Completed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$188.00</span>
                </td>
                                <td class="text-end" data-order="2023-04-29">
                    <span class="fw-bold">29/04/2023</span>
                </td>
                <td class="text-end" data-order="2023-05-01">
                    <span class="fw-bold">01/05/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13780                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label fs-3 bg-light-warning text-warning">
                                        C                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Mikaela Collins</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Failed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-danger">Failed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$92.00</span>
                </td>
                                <td class="text-end" data-order="2023-04-26">
                    <span class="fw-bold">26/04/2023</span>
                </td>
                <td class="text-end" data-order="2023-04-30">
                    <span class="fw-bold">30/04/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13781                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-23.jpg" alt="Dan Wilson" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Dan Wilson</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Expired">
                    <!--begin::Badges-->
                    <div class="badge badge-light-danger">Expired</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$256.00</span>
                </td>
                                <td class="text-end" data-order="2023-04-23">
                    <span class="fw-bold">23/04/2023</span>
                </td>
                <td class="text-end" data-order="2023-04-29">
                    <span class="fw-bold">29/04/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13782                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-6.jpg" alt="Emma Smith" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Emma Smith</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Failed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-danger">Failed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$410.00</span>
                </td>
                                <td class="text-end" data-order="2023-04-22">
                    <span class="fw-bold">22/04/2023</span>
                </td>
                <td class="text-end" data-order="2023-04-28">
                    <span class="fw-bold">28/04/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13783                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-21.jpg" alt="Ethan Wilder" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ethan Wilder</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Pending">
                    <!--begin::Badges-->
                    <div class="badge badge-light-warning">Pending</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$79.00</span>
                </td>
                                <td class="text-end" data-order="2023-04-20">
                    <span class="fw-bold">20/04/2023</span>
                </td>
                <td class="text-end" data-order="2023-04-27">
                    <span class="fw-bold">27/04/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13784                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label fs-3 bg-light-danger text-danger">
                                        E                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Emma Bold</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Expired">
                    <!--begin::Badges-->
                    <div class="badge badge-light-danger">Expired</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$340.00</span>
                </td>
                                <td class="text-end" data-order="2023-04-24">
                    <span class="fw-bold">24/04/2023</span>
                </td>
                <td class="text-end" data-order="2023-04-26">
                    <span class="fw-bold">26/04/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13785                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label fs-3 bg-light-danger text-danger">
                                        O                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Olivia Wild</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Expired">
                    <!--begin::Badges-->
                    <div class="badge badge-light-danger">Expired</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$357.00</span>
                </td>
                                <td class="text-end" data-order="2023-04-21">
                    <span class="fw-bold">21/04/2023</span>
                </td>
                <td class="text-end" data-order="2023-04-25">
                    <span class="fw-bold">25/04/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13786                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label">
                                        <img src="../../../assets/media/avatars/300-21.jpg" alt="Ethan Wilder" class="w-100" />
                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Ethan Wilder</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Completed">
                    <!--begin::Badges-->
                    <div class="badge badge-light-success">Completed</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$24.00</span>
                </td>
                                <td class="text-end" data-order="2023-04-19">
                    <span class="fw-bold">19/04/2023</span>
                </td>
                <td class="text-end" data-order="2023-04-24">
                    <span class="fw-bold">24/04/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
                    <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" />
                    </div>
                </td>
                <td data-kt-ecommerce-order-filter="order_id">
                    <a href="details.html" class="text-gray-800 text-hover-primary fw-bold">
                        13787                    </a>
                </td>
                                <td>
                    <div class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="../../user-management/users/view.html">
                                                                    <div class="symbol-label fs-3 bg-light-danger text-danger">
                                        O                                    </div>
                                                            </a>
                        </div>
                        <!--end::Avatar-->

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="../../user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Olivia Wild</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>
                                <td class="text-end pe-0" data-order="Denied">
                    <!--begin::Badges-->
                    <div class="badge badge-light-danger">Denied</div>
                    <!--end::Badges-->
                </td>
                <td class="text-end pe-0">
                    <span class="fw-bold">$404.00</span>
                </td>
                                <td class="text-end" data-order="2023-04-20">
                    <span class="fw-bold">20/04/2023</span>
                </td>
                <td class="text-end" data-order="2023-04-23">
                    <span class="fw-bold">23/04/2023</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                    <!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="details.html" class="menu-link px-3">
            View
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="edit-order.html" class="menu-link px-3">
            Edit
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">
            Delete
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->                </td>
            </tr>
            </tbody>
</table>
<!--end::Table-->    </div>
    <!--end::Card body-->
</div>
<!--end::Products-->        </div>
        <!--end::Content container-->
    </div>
<!--end::Content-->	


@endsection
