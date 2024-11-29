
<!--begin::Sidebar-->
<div id="kt_app_sidebar" class="app-sidebar  flex-column "
     data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle"
     >


<!--begin::Logo-->
<div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
    <!--begin::Logo image-->
    <a href="../index.html">
                    <img alt="Logo" src="{{ asset('html/assets/assets/media/logos/rsslogo.png') }}"
                     class="h-65px app-sidebar-logo-default" style="margin-left: 70px"/>
    </a>
    <!--end::Logo image-->

            <!--begin::Sidebar toggle-->
        <!--begin::Minimized sidebar setup:
            if (isset($_COOKIE["sidebar_minimize_state"]) && $_COOKIE["sidebar_minimize_state"] === "on") {
                1. "src/js/layout/sidebar.js" adds "sidebar_minimize_state" cookie value to save the sidebar minimize state.
                2. Set data-kt-app-sidebar-minimize="on" attribute for body tag.
                3. Set data-kt-toggle-state="active" attribute to the toggle element with "kt_app_sidebar_toggle" id.
                4. Add "active" class to to sidebar toggle element with "kt_app_sidebar_toggle" id.
            }
        -->
        <div
            id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate "
            data-kt-toggle="true"
            data-kt-toggle-state="active"
            data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize"
            >

            <i class="ki-duotone ki-double-left fs-2 rotate-180"><span class="path1"></span><span class="path2"></span></i>        </div>
        <!--end::Sidebar toggle-->
    </div>
<!--end::Logo-->
<!--begin::sidebar menu-->
<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <!--begin::Menu wrapper-->
    <div
        id="kt_app_sidebar_menu_wrapper"
        class="app-sidebar-wrapper hover-scroll-overlay-y my-5"

        data-kt-scroll="true"
        data-kt-scroll-activate="true"
        data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
        data-kt-scroll-wrappers="#kt_app_sidebar_menu"
        data-kt-scroll-offset="5px"
        data-kt-scroll-save-state="true"
    >
        <!-- begin::Menu-->
        <div class="menu menu-column menu-rounded menu-sub-indention px-3"
            id="#kt_app_sidebar_menu"
            data-kt-menu="true"
            data-kt-menu-expand="false">

            <!--begin:Menu item-->
            <div  data-kt-menu-trigger="click"  class="menu-item {{
                request()->is('dashboard')
                ? ' here show menu-accordion' : '' }}" >
                <!--begin:Menu link-->
                <span class="menu-link" >
                    <span  class="menu-icon" >
                        <i class="ki-duotone ki-element-11 fs-2">
                            <span class="path1">
                                </span><span class="path2">
                                </span><span class="path3">
                                </span><span class="path4">
                                </span></i></span>
                                <span  class="menu-title" >
                                    Dashboards
                                </span>
                                <span  class="menu-arrow" >
                                    </span></span>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->
                                    <div  class="menu-sub menu-sub-accordion" >
                                        <!--begin:Menu item-->
                                        <div  class="menu-item" >
                                            <!--begin:Menu link-->
                                            <a class="menu-link"  href="/dashboard" >
                                                <span  class="menu-bullet" >
                                                    <span class="bullet bullet-dot">
                                                        </span>
                                                    </span>
                                                    <span  class="menu-title" >
                                                      Dashboard
                                                    </span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                    </div>
                                  <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->


             <!--begin:Menu item-->
             <div  class="menu-item pt-5" >
                <!--begin:Menu content-->
                <div  class="menu-content" >
                    <span class="menu-heading fw-bold text-uppercase fs-7">
                        USERS & PRIVILEGES
                    </span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->

               <!--begin:Menu item-->
               <div  data-kt-menu-trigger="click"  class="menu-item {{
               request()->is('users*') ||
               request()->is('roles*') ||
               request()->is('permissions*')
               ? ' here show menu-accordion' : '' }}" >
                <!--begin:Menu link-->
                <span class="menu-link" >
                    <span  class="menu-icon" >
                        <i class="ki-duotone ki-element-11 fs-2">
                            <span class="path1">
                                </span><span class="path2">
                                </span><span class="path3">
                                </span><span class="path4">
                                </span></i></span>
                                <span  class="menu-title" >
                                   User Management
                                </span>
                                <span  class="menu-arrow" >
                                    </span></span>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->
                                 <div  class="menu-sub menu-sub-accordion" >
                                        <!--begin:Menu item-->
                                        <div  class="menu-item" >
                                            <!--begin:Menu link-->
                                            <a class="menu-link  {{ request()->is('users*')
                                                ? ' active' : '' }}"  href="{{ route('users.index') }}" >
                                                <span  class="menu-bullet" >
                                                    <span class="bullet bullet-dot">
                                                        </span>
                                                    </span>
                                                    <span  class="menu-title" >
                                                        All Users List
                                                    </span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        @can('role-list')


                                        <!--begin:Menu item-->
                                        <div  class="menu-item" >
                                            <!--begin:Menu link-->
                                            <a class="menu-link {{ request()->is('roles*')
                                                ? ' active' : '' }}"
                                             href="{{ route('roles.index') }}" >
                                                <span  class="menu-bullet" >
                                                    <span class="bullet bullet-dot">
                                                        </span>
                                                    </span>
                                                    <span  class="menu-title" >
                                                        Roles List
                                                    </span>
                                                </a>
                                                <!--end:Menu link-->
                                        </div>
                                            <!--end:Menu item-->
                                            @endcan
                                            <!--begin:Menu item-->
                                         <div  class="menu-item" >
                                                <!--begin:Menu link-->
                                                <a class="menu-link {{ request()->is('permissions*')
                                                    ? ' active' : '' }}"
                                                  href="{{ route('permissions.index') }}" >
                                                    <span  class="menu-bullet" >
                                                        <span class="bullet bullet-dot">
                                                            </span></span>
                                                            <span  class="menu-title" >
                                                               Permissions List
                                                            </span>
                                                </a>
                                               <!--end:Menu link-->
                                        </div>
                                            <!--end:Menu item-->
                                </div>
                                  <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->




              <!--begin:Menu item-->
              <div  class="menu-item pt-5" >
                <!--begin:Menu content-->
                <div  class="menu-content" >
                    <span class="menu-heading fw-bold text-uppercase fs-7">
                       PROFILE ACCOUNT
                    </span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->

               <!--begin:Menu item-->
               <div  data-kt-menu-trigger="click"  class="menu-item {{
                   request()->is('overview*') ||
                    request()->is('settings*')
                    ? ' here show menu-accordion' : '' }}" >
                <!--begin:Menu link-->
                <span class="menu-link" >
                    <span  class="menu-icon" >
                        <i class="ki-duotone ki-element-11 fs-2">
                            <span class="path1">
                                </span><span class="path2">
                                </span><span class="path3">
                                </span><span class="path4">
                                </span></i></span>
                                <span  class="menu-title" >
                                 My Account
                                </span>
                                <span  class="menu-arrow" >
                                    </span></span>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->
                                 <div  class="menu-sub menu-sub-accordion" >
                                        <!--begin:Menu item-->
                                        <div  class="menu-item" >
                                            <!--begin:Menu link-->
                                            <a class="menu-link  {{ request()->is('user.overview')
                                                ? ' active' : '' }}"  href="{{ route('user.overview',Auth::user()->id) }}" >
                                                <span  class="menu-bullet" >
                                                    <span class="bullet bullet-dot">
                                                        </span>
                                                    </span>
                                                    <span  class="menu-title" >
                                                      Overview
                                                    </span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->
                                        <!--begin:Menu item-->
                                        <div  class="menu-item" >
                                            <!--begin:Menu link-->
                                            <a class="menu-link {{ request()->is('settings*')
                                                ? ' active' : '' }}"
                                             href="{{ route('user.settings',Auth::user()->id) }}" >
                                                <span  class="menu-bullet" >
                                                    <span class="bullet bullet-dot">
                                                        </span>
                                                    </span>
                                                    <span  class="menu-title" >
                                                     Settings
                                                    </span>
                                                </a>
                                                <!--end:Menu link-->
                                        </div>
                                            <!--end:Menu item-->

                                </div>
                                  <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->






            <!--begin:Menu item-->
            <div  class="menu-item pt-5" >
                <!--begin:Menu content-->
                <div  class="menu-content" >
                    <span class="menu-heading fw-bold text-uppercase fs-7">
                            INVENTORY MANAGEMENT
                    </span>
                    </div>
                    <!--end:Menu content-->
            </div>
            <!--end:Menu item-->



               <!--begin:Menu item-->
                    <div  data-kt-menu-trigger="click"  class="menu-item {{
                        request()->is('category*') ||
                        request()->is('product*') ||
                        request()->is('brand*') ||
                        request()->is('unit*') ||
                         request()->is('tag*') ||
                        request()->is('variant*')
                        ? ' here show menu-accordion' : '' }}" >
                        <!--begin:Menu link-->
                        <span class="menu-link" >
                            <span  class="menu-icon" >
                                <i class="ki-duotone ki-element-11 fs-2">
                                    <span class="path1">
                                        </span><span class="path2">
                                        </span><span class="path3">
                                        </span><span class="path4">
                                        </span></i></span>
                                        <span  class="menu-title" >
                                          Inventory
                                        </span>
                                        <span  class="menu-arrow" >
                                            </span></span>
                                            <!--end:Menu link-->
                                            <!--begin:Menu sub-->
                                        <div  class="menu-sub menu-sub-accordion" >
                                            {{-- @can('student-list') --}}
                                                <!--begin:Menu item-->
                                              <div  class="menu-item" >
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link
                                                     {{ request()->is('category*')
                                                        ? ' active' : '' }}"
                                                         href="{{ route('category.index') }}" >
                                                        <span  class="menu-bullet" >
                                                            <span class="bullet bullet-dot">
                                                                </span>
                                                            </span>
                                                            <span  class="menu-title" >
                                                               Category
                                                            </span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                                {{-- @endcan --}}
                                        </div>
                                        <!--end:Menu sub-->


                                         <!--begin:Menu sub-->
                                         <div  class="menu-sub menu-sub-accordion" >
                                            {{-- @can('student-list') --}}
                                                <!--begin:Menu item-->
                                              <div  class="menu-item" >
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link
                                                     {{ request()->is('product*')
                                                        ? ' active' : '' }}"
                                                         href="{{ route('product.index') }}" >
                                                        <span  class="menu-bullet" >
                                                            <span class="bullet bullet-dot">
                                                                </span>
                                                            </span>
                                                            <span  class="menu-title" >
                                                              Product
                                                            </span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                                {{-- @endcan --}}
                                        </div>
                                        <!--end:Menu sub-->

                                           <!--begin:Menu sub-->
                                           <div  class="menu-sub menu-sub-accordion" >
                                            {{-- @can('student-list') --}}
                                                <!--begin:Menu item-->
                                              <div  class="menu-item" >
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link
                                                     {{ request()->is('product*')
                                                        ? ' active' : '' }}"
                                                         href="{{ route('product.index') }}" >
                                                        <span  class="menu-bullet" >
                                                            <span class="bullet bullet-dot">
                                                                </span>
                                                            </span>
                                                            <span  class="menu-title" >
                                                             Low Stock
                                                            </span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                                {{-- @endcan --}}
                                        </div>
                                        <!--end:Menu sub-->


                                         <!--begin:Menu sub-->
                                         <div  class="menu-sub menu-sub-accordion" >
                                            {{-- @can('student-list') --}}
                                                <!--begin:Menu item-->
                                              <div  class="menu-item" >
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link
                                                     {{ request()->is('brand*')
                                                        ? ' active' : '' }}"
                                                         href="{{ route('brand.index') }}" >
                                                        <span  class="menu-bullet" >
                                                            <span class="bullet bullet-dot">
                                                                </span>
                                                            </span>
                                                            <span  class="menu-title" >
                                                           Brand
                                                            </span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                                {{-- @endcan --}}
                                        </div>
                                        <!--end:Menu sub-->

                                         <!--begin:Menu sub-->
                                         <div  class="menu-sub menu-sub-accordion" >
                                            {{-- @can('student-list') --}}
                                                <!--begin:Menu item-->
                                              <div  class="menu-item" >
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link
                                                     {{ request()->is('unit*')
                                                        ? ' active' : '' }}"
                                                         href="{{ route('unit.index') }}" >
                                                        <span  class="menu-bullet" >
                                                            <span class="bullet bullet-dot">
                                                                </span>
                                                            </span>
                                                            <span  class="menu-title" >
                                                              Unit
                                                            </span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                                {{-- @endcan --}}
                                        </div>
                                        <!--end:Menu sub-->

                                        <!--begin:Menu sub-->
                                        <div  class="menu-sub menu-sub-accordion" >
                                            {{-- @can('student-list') --}}
                                                <!--begin:Menu item-->
                                              <div  class="menu-item" >
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link
                                                     {{ request()->is('tag*')
                                                        ? ' active' : '' }}"
                                                         href="{{ route('tag.index') }}" >
                                                        <span  class="menu-bullet" >
                                                            <span class="bullet bullet-dot">
                                                                </span>
                                                            </span>
                                                            <span  class="menu-title" >
                                                              Tag
                                                            </span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                                {{-- @endcan --}}
                                        </div>
                                        <!--end:Menu sub-->

                                         <!--begin:Menu sub-->
                                         <div  class="menu-sub menu-sub-accordion" >
                                            {{-- @can('student-list') --}}
                                                <!--begin:Menu item-->
                                              <div  class="menu-item" >
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link
                                                     {{ request()->is('variant*')
                                                        ? ' active' : '' }}"
                                                         href="{{ route('variant.index') }}" >
                                                        <span  class="menu-bullet" >
                                                            <span class="bullet bullet-dot">
                                                                </span>
                                                            </span>
                                                            <span  class="menu-title" >
                                                            Variant
                                                            </span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                                {{-- @endcan --}}
                                        </div>
                                        <!--end:Menu sub-->
                                </div>
                                <!--end:Menu item-->



                                   <!--begin:Menu item-->
                    <div  data-kt-menu-trigger="click"  class="menu-item {{
                        request()->is('overview*') ||
                        request()->is('settings*')
                        ? ' here show menu-accordion' : '' }}" >
                    <!--begin:Menu link-->
                    <span class="menu-link" >
                        <span  class="menu-icon" >
                            <i class="ki-duotone ki-element-11 fs-2">
                                <span class="path1">
                                    </span><span class="path2">
                                    </span><span class="path3">
                                    </span><span class="path4">
                                    </span></i></span>
                                    <span  class="menu-title" >
                                 Barcode & QRcode
                             </span>
                             <span  class="menu-arrow" >
                                 </span></span>
                                 <!--end:Menu link-->
                                 <!--begin:Menu sub-->
                              <div  class="menu-sub menu-sub-accordion" >
                                     <!--begin:Menu item-->
                                     <div  class="menu-item" >
                                         <!--begin:Menu link-->
                                         <a class="menu-link  {{ request()->is('user.overview')
                                             ? ' active' : '' }}"  href="{{ route('user.overview',Auth::user()->id) }}" >
                                             <span  class="menu-bullet" >
                                                 <span class="bullet bullet-dot">
                                                     </span>
                                                 </span>
                                                 <span  class="menu-title" >
                                                Print Barcode
                                                 </span>
                                         </a>
                                         <!--end:Menu link-->
                                     </div>
                                     <!--end:Menu item-->
                                     <!--begin:Menu item-->
                                     <div  class="menu-item" >
                                         <!--begin:Menu link-->
                                         <a class="menu-link {{ request()->is('settings*')
                                             ? ' active' : '' }}"
                                          href="{{ route('user.settings',Auth::user()->id) }}" >
                                             <span  class="menu-bullet" >
                                                 <span class="bullet bullet-dot">
                                                     </span>
                                                 </span>
                                                 <span  class="menu-title" >
                                                  Print Qrcode
                                                 </span>
                                             </a>
                                             <!--end:Menu link-->
                                                </div>
                                                    <!--end:Menu item-->

                                        </div>
                                        <!--end:Menu sub-->
                            </div>
                            <!--end:Menu item-->









                  <!--begin:Menu item-->
                    <div  data-kt-menu-trigger="click"  class="menu-item {{
                        request()->is('overview*') ||
                        request()->is('settings*')
                        ? ' here show menu-accordion' : '' }}" >
                    <!--begin:Menu link-->
                    <span class="menu-link" >
                        <span  class="menu-icon" >
                            <i class="ki-duotone ki-element-11 fs-2">
                                <span class="path1">
                                    </span><span class="path2">
                                    </span><span class="path3">
                                    </span><span class="path4">
                                    </span></i></span>
                                    <span  class="menu-title" >
                                  Reports
                             </span>
                             <span  class="menu-arrow" >
                                 </span></span>
                                 <!--end:Menu link-->
                                 <!--begin:Menu sub-->
                              <div  class="menu-sub menu-sub-accordion" >
                                     <!--begin:Menu item-->
                                     <div  class="menu-item" >
                                         <!--begin:Menu link-->
                                         <a class="menu-link  {{ request()->is('user.overview')
                                             ? ' active' : '' }}"  href="{{ route('user.overview',Auth::user()->id) }}" >
                                             <span  class="menu-bullet" >
                                                 <span class="bullet bullet-dot">
                                                     </span>
                                                 </span>
                                                 <span  class="menu-title" >
                                                   Overview
                                                 </span>
                                         </a>
                                         <!--end:Menu link-->
                                     </div>
                                     <!--end:Menu item-->
                                     <!--begin:Menu item-->
                                     <div  class="menu-item" >
                                         <!--begin:Menu link-->
                                         <a class="menu-link {{ request()->is('settings*')
                                             ? ' active' : '' }}"
                                          href="{{ route('user.settings',Auth::user()->id) }}" >
                                             <span  class="menu-bullet" >
                                                 <span class="bullet bullet-dot">
                                                     </span>
                                                 </span>
                                                 <span  class="menu-title" >
                                                  Settings
                                                 </span>
                                             </a>
                                             <!--end:Menu link-->
                                                </div>
                                                    <!--end:Menu item-->

                                        </div>
                                        <!--end:Menu sub-->
                            </div>
                            <!--end:Menu item-->




                  <!--begin:Menu item-->
                    <div  data-kt-menu-trigger="click"  class="menu-item {{
                        request()->is('overview*') ||
                        request()->is('settings*')
                        ? ' here show menu-accordion' : '' }}" >
                    <!--begin:Menu link-->
                    <span class="menu-link" >
                        <span  class="menu-icon" >
                            <i class="ki-duotone ki-element-11 fs-2">
                                <span class="path1">
                                    </span><span class="path2">
                                    </span><span class="path3">
                                    </span><span class="path4">
                                    </span></i></span>
                                    <span  class="menu-title" >
                                   Stock
                             </span>
                             <span  class="menu-arrow" >
                                 </span></span>
                                 <!--end:Menu link-->
                                 <!--begin:Menu sub-->
                              <div  class="menu-sub menu-sub-accordion" >
                                     <!--begin:Menu item-->
                                     <div  class="menu-item" >
                                         <!--begin:Menu link-->
                                         <a class="menu-link  {{ request()->is('user.overview')
                                             ? ' active' : '' }}"  href="{{ route('user.overview',Auth::user()->id) }}" >
                                             <span  class="menu-bullet" >
                                                 <span class="bullet bullet-dot">
                                                     </span>
                                                 </span>
                                                 <span  class="menu-title" >
                                                   Overview
                                                 </span>
                                         </a>
                                         <!--end:Menu link-->
                                     </div>
                                     <!--end:Menu item-->
                                     <!--begin:Menu item-->
                                     <div  class="menu-item" >
                                         <!--begin:Menu link-->
                                         <a class="menu-link {{ request()->is('settings*')
                                             ? ' active' : '' }}"
                                          href="{{ route('user.settings',Auth::user()->id) }}" >
                                             <span  class="menu-bullet" >
                                                 <span class="bullet bullet-dot">
                                                     </span>
                                                 </span>
                                                 <span  class="menu-title" >
                                                  Settings
                                                 </span>
                                             </a>
                                             <!--end:Menu link-->
                                                </div>
                                                    <!--end:Menu item-->

                                        </div>
                                        <!--end:Menu sub-->
                            </div>
                            <!--end:Menu item-->


                              <!--begin:Menu item-->
                            <div  class="menu-item pt-5" >
                                <!--begin:Menu content-->
                                <div  class="menu-content" >
                                    <span class="menu-heading fw-bold text-uppercase fs-7">
                                            STOCK MANAGEMENT
                                    </span>
                                    </div>
                                    <!--end:Menu content-->
                            </div>
                            <!--end:Menu item-->

                             <!--begin:Menu item-->
                             <div  class="menu-item pt-5" >
                                <!--begin:Menu content-->
                                <div  class="menu-content" >
                                    <span class="menu-heading fw-bold text-uppercase fs-7">
                                            SALES MANAGEMENT
                                    </span>
                                    </div>
                                    <!--end:Menu content-->
                            </div>
                            <!--end:Menu item-->


                              <!--begin:Menu item-->
                    <div  data-kt-menu-trigger="click"  class="menu-item {{
                        request()->is('overview*') ||
                        request()->is('settings*')
                        ? ' here show menu-accordion' : '' }}" >
                    <!--begin:Menu link-->
                    <span class="menu-link" >
                        <span  class="menu-icon" >
                            <i class="ki-duotone ki-element-11 fs-2">
                                <span class="path1">
                                    </span><span class="path2">
                                    </span><span class="path3">
                                    </span><span class="path4">
                                    </span></i></span>
                                    <span  class="menu-title" >
                                   Sales
                             </span>
                             <span  class="menu-arrow" >
                                 </span></span>
                                 <!--end:Menu link-->
                                 <!--begin:Menu sub-->
                              <div  class="menu-sub menu-sub-accordion" >
                                     <!--begin:Menu item-->
                                     <div  class="menu-item" >
                                         <!--begin:Menu link-->
                                         <a class="menu-link  {{ request()->is('user.overview')
                                             ? ' active' : '' }}"  href="{{ route('user.overview',Auth::user()->id) }}" >
                                             <span  class="menu-bullet" >
                                                 <span class="bullet bullet-dot">
                                                     </span>
                                                 </span>
                                                 <span  class="menu-title" >
                                                   Overview
                                                 </span>
                                         </a>
                                         <!--end:Menu link-->
                                     </div>
                                     <!--end:Menu item-->
                                     <!--begin:Menu item-->
                                     <div  class="menu-item" >
                                         <!--begin:Menu link-->
                                         <a class="menu-link {{ request()->is('settings*')
                                             ? ' active' : '' }}"
                                          href="{{ route('user.settings',Auth::user()->id) }}" >
                                             <span  class="menu-bullet" >
                                                 <span class="bullet bullet-dot">
                                                     </span>
                                                 </span>
                                                 <span  class="menu-title" >
                                                  Settings
                                                 </span>
                                             </a>
                                             <!--end:Menu link-->
                                                </div>
                                                    <!--end:Menu item-->

                                        </div>
                                        <!--end:Menu sub-->
                            </div>
                            <!--end:Menu item-->



                               <!--begin:Menu item-->
                    <div  data-kt-menu-trigger="click"  class="menu-item {{
                        request()->is('pos*') 
                        ? ' here show menu-accordion' : '' }}" >
                    <!--begin:Menu link-->
                    <span class="menu-link" >
                        <span  class="menu-icon" >
                            <i class="ki-duotone ki-element-11 fs-2">
                                <span class="path1">
                                    </span><span class="path2">
                                    </span><span class="path3">
                                    </span><span class="path4">
                                    </span></i></span>
                                    <span  class="menu-title" >
                                   Pos & Orders
                             </span>
                             <span  class="menu-arrow" >
                                 </span></span>
                                 <!--end:Menu link-->
                                 <!--begin:Menu sub-->
                              <div  class="menu-sub menu-sub-accordion" >
                                     <!--begin:Menu item-->
                                     <div  class="menu-item" >
                                         <!--begin:Menu link-->
                                         <a class="menu-link  {{ request()->is('pos.index')
                                             ? ' active' : '' }}"  href="{{ route('pos.index') }}" >
                                             <span  class="menu-bullet" >
                                                 <span class="bullet bullet-dot">
                                                     </span>
                                                 </span>
                                                 <span  class="menu-title" >
                                                      POS
                                                 </span>
                                         </a>
                                         <!--end:Menu link-->
                                     </div>
                                     <!--end:Menu item-->
                                     <!--begin:Menu item-->
                                     <div  class="menu-item" >
                                         <!--begin:Menu link-->
                                         <a class="menu-link {{ request()->is('settings*')
                                             ? ' active' : '' }}"
                                          href="{{ route('user.settings',Auth::user()->id) }}" >
                                             <span  class="menu-bullet" >
                                                 <span class="bullet bullet-dot">
                                                     </span>
                                                 </span>
                                                 <span  class="menu-title" >
                                                      Orders
                                                 </span>
                                             </a>
                                             <!--end:Menu link-->
                                                </div>
                                                    <!--end:Menu item-->

                                        </div>
                                        <!--end:Menu sub-->
                            </div>
                            <!--end:Menu item-->



                                   <!--begin:Menu item-->
                    <div  data-kt-menu-trigger="click"  class="menu-item {{
                                    request()->is('overview*') ||
                                    request()->is('settings*')
                                    ? ' here show menu-accordion' : '' }}" >
                                <!--begin:Menu link-->
                                <span class="menu-link" >
                                    <span  class="menu-icon" >
                                        <i class="ki-duotone ki-element-11 fs-2">
                                            <span class="path1">
                                                </span><span class="path2">
                                                </span><span class="path3">
                                                </span><span class="path4">
                                                </span></i></span>
                                                <span  class="menu-title" >
                                        Invoice
                                        </span>
                                        <span  class="menu-arrow" >
                                            </span></span>
                                            <!--end:Menu link-->
                                            <!--begin:Menu sub-->
                                        <div  class="menu-sub menu-sub-accordion" >
                                                <!--begin:Menu item-->
                                                <div  class="menu-item" >
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link  {{ request()->is('user.overview')
                                                        ? ' active' : '' }}"  href="{{ route('user.overview',Auth::user()->id) }}" >
                                                        <span  class="menu-bullet" >
                                                            <span class="bullet bullet-dot">
                                                                </span>
                                                            </span>
                                                            <span  class="menu-title" >
                                                            Overview
                                                            </span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                                <!--begin:Menu item-->
                                                <div  class="menu-item" >
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link {{ request()->is('settings*')
                                                        ? ' active' : '' }}"
                                                    href="{{ route('user.settings',Auth::user()->id) }}" >
                                                        <span  class="menu-bullet" >
                                                            <span class="bullet bullet-dot">
                                                                </span>
                                                            </span>
                                                            <span  class="menu-title" >
                                                            Settings
                                                            </span>
                                                        </a>
                                                        <!--end:Menu link-->
                                                            </div>
                                                                <!--end:Menu item-->

                                                    </div>
                                                    <!--end:Menu sub-->
                            </div>
                            <!--end:Menu item-->







                             <!--begin:Menu item-->
                             <div  class="menu-item pt-5" >
                                <!--begin:Menu content-->
                                <div  class="menu-content" >
                                    <span class="menu-heading fw-bold text-uppercase fs-7">
                                           REPORTS
                                    </span>
                                    </div>
                                    <!--end:Menu content-->
                            </div>
                            <!--end:Menu item-->



                             <!--begin:Menu item-->
                             <div  data-kt-menu-trigger="click"  class="menu-item {{
                                        request()->is('overview*') ||
                                        request()->is('settings*')
                                        ? ' here show menu-accordion' : '' }}" >
                                            <!--begin:Menu link-->
                                        <span class="menu-link" >
                                            <span  class="menu-icon" >
                                                <i class="ki-duotone ki-element-11 fs-2">
                                                    <span class="path1">
                                                        </span><span class="path2">
                                                        </span><span class="path3">
                                                        </span><span class="path4">
                                                        </span></i></span>
                                                        <span  class="menu-title" >
                                                    Sales Report
                                                </span>
                                                <span  class="menu-arrow" >
                                                    </span></span>
                                                    <!--end:Menu link-->
                                                    <!--begin:Menu sub-->
                                                <div  class="menu-sub menu-sub-accordion" >
                                                        <!--begin:Menu item-->
                                                        <div  class="menu-item" >
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link  {{ request()->is('user.overview')
                                                                ? ' active' : '' }}"  href="{{ route('user.overview',Auth::user()->id) }}" >
                                                                <span  class="menu-bullet" >
                                                                    <span class="bullet bullet-dot">
                                                                        </span>
                                                                    </span>
                                                                    <span  class="menu-title" >
                                                                    View Sales Report
                                                                    </span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                    </div>
                                                    <!--end:Menu item-->

                                            </div>
                                            <!--end:Menu sub-->
                                 </div>
                                <!--end:Menu item-->


                                 <!--begin:Menu item-->
                             <div  data-kt-menu-trigger="click"  class="menu-item {{
                                request()->is('overview*') ||
                                request()->is('settings*')
                                ? ' here show menu-accordion' : '' }}" >
                                    <!--begin:Menu link-->
                                <span class="menu-link" >
                                    <span  class="menu-icon" >
                                        <i class="ki-duotone ki-element-11 fs-2">
                                            <span class="path1">
                                                </span><span class="path2">
                                                </span><span class="path3">
                                                </span><span class="path4">
                                                </span></i></span>
                                                <span  class="menu-title" >
                                            Inventory Report
                                        </span>
                                        <span  class="menu-arrow" >
                                            </span></span>
                                            <!--end:Menu link-->
                                            <!--begin:Menu sub-->
                                        <div  class="menu-sub menu-sub-accordion" >
                                                <!--begin:Menu item-->
                                                <div  class="menu-item" >
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link  {{ request()->is('user.overview')
                                                        ? ' active' : '' }}"  href="{{ route('user.overview',Auth::user()->id) }}" >
                                                        <span  class="menu-bullet" >
                                                            <span class="bullet bullet-dot">
                                                                </span>
                                                            </span>
                                                            <span  class="menu-title" >
                                                            View Inventory Report
                                                            </span>
                                                    </a>
                                                    <!--end:Menu link-->
                                            </div>
                                            <!--end:Menu item-->

                                    </div>
                                    <!--end:Menu sub-->
                         </div>
                        <!--end:Menu item-->



                         <!--begin:Menu item-->
                         <div  data-kt-menu-trigger="click"  class="menu-item {{
                            request()->is('overview*') ||
                            request()->is('settings*')
                            ? ' here show menu-accordion' : '' }}" >
                                <!--begin:Menu link-->
                            <span class="menu-link" >
                                <span  class="menu-icon" >
                                    <i class="ki-duotone ki-element-11 fs-2">
                                        <span class="path1">
                                            </span><span class="path2">
                                            </span><span class="path3">
                                            </span><span class="path4">
                                            </span></i></span>
                                            <span  class="menu-title" >
                                        Invoice Report
                                    </span>
                                    <span  class="menu-arrow" >
                                        </span></span>
                                        <!--end:Menu link-->
                                        <!--begin:Menu sub-->
                                    <div  class="menu-sub menu-sub-accordion" >
                                            <!--begin:Menu item-->
                                            <div  class="menu-item" >
                                                <!--begin:Menu link-->
                                                <a class="menu-link  {{ request()->is('user.overview')
                                                    ? ' active' : '' }}"  href="{{ route('user.overview',Auth::user()->id) }}" >
                                                    <span  class="menu-bullet" >
                                                        <span class="bullet bullet-dot">
                                                            </span>
                                                        </span>
                                                        <span  class="menu-title" >
                                                        View Invoice Report
                                                        </span>
                                                </a>
                                                <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->

                                </div>
                                <!--end:Menu sub-->

                                <div  class="menu-sub menu-sub-accordion" >
                                    <!--begin:Menu item-->
                                    <div  class="menu-item" >
                                        <!--begin:Menu link-->
                                        <a class="menu-link  {{ request()->is('user.overview')
                                            ? ' active' : '' }}"  href="{{ route('user.overview',Auth::user()->id) }}" >
                                            <span  class="menu-bullet" >
                                                <span class="bullet bullet-dot">
                                                    </span>
                                                </span>
                                                <span  class="menu-title" >
                                                View Rent Report
                                                </span>
                                        </a>
                                        <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->

                        </div>
                        <!--end:Menu sub-->
                     </div>
                    <!--end:Menu item-->



                     <!--begin:Menu item-->
                     <div  data-kt-menu-trigger="click"  class="menu-item {{
                        request()->is('overview*') ||
                        request()->is('settings*')
                        ? ' here show menu-accordion' : '' }}" >
                            <!--begin:Menu link-->
                        <span class="menu-link" >
                            <span  class="menu-icon" >
                                <i class="ki-duotone ki-element-11 fs-2">
                                    <span class="path1">
                                        </span><span class="path2">
                                        </span><span class="path3">
                                        </span><span class="path4">
                                        </span></i></span>
                                        <span  class="menu-title" >
                                    Customers Report
                                </span>
                                <span  class="menu-arrow" >
                                    </span></span>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->
                                <div  class="menu-sub menu-sub-accordion" >
                                        <!--begin:Menu item-->
                                        <div  class="menu-item" >
                                            <!--begin:Menu link-->
                                            <a class="menu-link  {{ request()->is('user.overview')
                                                ? ' active' : '' }}"  href="{{ route('user.overview',Auth::user()->id) }}" >
                                                <span  class="menu-bullet" >
                                                    <span class="bullet bullet-dot">
                                                        </span>
                                                    </span>
                                                    <span  class="menu-title" >
                                                    View Customers Report
                                                    </span>
                                            </a>
                                            <!--end:Menu link-->
                                    </div>
                                    <!--end:Menu item-->

                            </div>
                            <!--end:Menu sub-->
                 </div>
                <!--end:Menu item-->


                 <!--begin:Menu item-->
                 <div  data-kt-menu-trigger="click"  class="menu-item {{
                    request()->is('overview*') ||
                    request()->is('settings*')
                    ? ' here show menu-accordion' : '' }}" >
                        <!--begin:Menu link-->
                    <span class="menu-link" >
                        <span  class="menu-icon" >
                            <i class="ki-duotone ki-element-11 fs-2">
                                <span class="path1">
                                    </span><span class="path2">
                                    </span><span class="path3">
                                    </span><span class="path4">
                                    </span></i></span>
                                    <span  class="menu-title" >
                                Expense Report
                            </span>
                            <span  class="menu-arrow" >
                                </span></span>
                                <!--end:Menu link-->
                                <!--begin:Menu sub-->
                            <div  class="menu-sub menu-sub-accordion" >
                                    <!--begin:Menu item-->
                                    <div  class="menu-item" >
                                        <!--begin:Menu link-->
                                        <a class="menu-link  {{ request()->is('user.overview')
                                            ? ' active' : '' }}"  href="{{ route('user.overview',Auth::user()->id) }}" >
                                            <span  class="menu-bullet" >
                                                <span class="bullet bullet-dot">
                                                    </span>
                                                </span>
                                                <span  class="menu-title" >
                                                View Expense Report
                                                </span>
                                        </a>
                                        <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->

                        </div>
                        <!--end:Menu sub-->
             </div>
            <!--end:Menu item-->



                                        <!--begin:Menu item-->
                                        <div  class="menu-item pt-5" >
                                            <!--begin:Menu content-->
                                            <div  class="menu-content" >
                                                <span class="menu-heading fw-bold text-uppercase fs-7">
                                                        REPORTS
                                                </span>
                                                </div>
                                                <!--end:Menu content-->
                                        </div>
                                        <!--end:Menu item-->

                                        <!--begin:Menu item-->
                                        <div  class="menu-item pt-5" >
                                            <!--begin:Menu content-->
                                            <div  class="menu-content" >
                                                <span class="menu-heading fw-bold text-uppercase fs-7">
                                                        PEOPLES
                                                </span>
                                                </div>
                                                <!--end:Menu content-->
                                        </div>
                                        <!--end:Menu item-->

                                <!--begin:Menu item-->
                                <div  data-kt-menu-trigger="click"  class="menu-item {{
                                    request()->is('overview*') ||
                                    request()->is('settings*')
                                    ? ' here show menu-accordion' : '' }}" >
                                <!--begin:Menu link-->
                                <span class="menu-link" >
                                    <span  class="menu-icon" >
                                        <i class="ki-duotone ki-element-11 fs-2">
                                            <span class="path1">
                                                </span><span class="path2">
                                                </span><span class="path3">
                                                </span><span class="path4">
                                                </span></i></span>
                                                <span  class="menu-title" >
                                            Customers
                                        </span>
                                        <span  class="menu-arrow" >
                                            </span></span>
                                            <!--end:Menu link-->
                                            <!--begin:Menu sub-->
                                        <div  class="menu-sub menu-sub-accordion" >
                                                <!--begin:Menu item-->
                                                <div  class="menu-item" >
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link  {{ request()->is('user.overview')
                                                        ? ' active' : '' }}"  href="{{ route('user.overview',Auth::user()->id) }}" >
                                                        <span  class="menu-bullet" >
                                                            <span class="bullet bullet-dot">
                                                                </span>
                                                            </span>
                                                            <span  class="menu-title" >
                                                            Customers Management
                                                            </span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->


                                        </div>
                                        <!--end:Menu sub-->
                            </div>
                            <!--end:Menu item-->



                               <!--begin:Menu item-->
                               <div  data-kt-menu-trigger="click"  class="menu-item {{
                                request()->is('overview*') ||
                                request()->is('settings*')
                                ? ' here show menu-accordion' : '' }}" >
                            <!--begin:Menu link-->
                            <span class="menu-link" >
                                <span  class="menu-icon" >
                                    <i class="ki-duotone ki-element-11 fs-2">
                                        <span class="path1">
                                            </span><span class="path2">
                                            </span><span class="path3">
                                            </span><span class="path4">
                                            </span></i></span>
                                            <span  class="menu-title" >
                                        Supplier
                                    </span>
                                    <span  class="menu-arrow" >
                                        </span></span>
                                        <!--end:Menu link-->
                                        <!--begin:Menu sub-->
                                    <div  class="menu-sub menu-sub-accordion" >
                                            <!--begin:Menu item-->
                                            <div  class="menu-item" >
                                                <!--begin:Menu link-->
                                                <a class="menu-link  {{ request()->is('user.overview')
                                                    ? ' active' : '' }}"  href="{{ route('user.overview',Auth::user()->id) }}" >
                                                    <span  class="menu-bullet" >
                                                        <span class="bullet bullet-dot">
                                                            </span>
                                                        </span>
                                                        <span  class="menu-title" >
                                                        Suppliers Management
                                                        </span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <!--end:Menu item-->


                                    </div>
                                    <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->


                           <!--begin:Menu item-->
                           <div  data-kt-menu-trigger="click"  class="menu-item {{
                            request()->is('store*')
                            ? ' here show menu-accordion' : '' }}" >
                        <!--begin:Menu link-->
                        <span class="menu-link" >
                            <span  class="menu-icon" >
                                <i class="ki-duotone ki-element-11 fs-2">
                                    <span class="path1">
                                        </span><span class="path2">
                                        </span><span class="path3">
                                        </span><span class="path4">
                                        </span></i></span>
                                        <span  class="menu-title" >
                                   Stores
                                </span>
                                <span  class="menu-arrow" >
                                    </span></span>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->
                                <div  class="menu-sub menu-sub-accordion" >
                                        <!--begin:Menu item-->
                                        <div  class="menu-item" >
                                            <!--begin:Menu link-->
                                            <a class="menu-link
                                                     {{ request()->is('store*')
                                                        ? ' active' : '' }}"
                                                         href="{{ route('store.index') }}" >
                                                        <span  class="menu-bullet" >
                                                            <span class="bullet bullet-dot">
                                                                </span>
                                                            </span>
                                                            <span  class="menu-title" >
                                                          Store
                                                            </span>
                                                    </a>
                                            <!--end:Menu link-->
                                        </div>
                                        <!--end:Menu item-->


                                </div>
                                <!--end:Menu sub-->
                    </div>
                    <!--end:Menu item-->

                            </div>
                            <!--end::Menu -->





            </div>
    <!--end::Menu wrapper-->
</div>
<!--end::sidebar menu-->

</div>
<!--end::Sidebar-->
