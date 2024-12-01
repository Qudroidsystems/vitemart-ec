<!DOCTYPE html>

<html lang="en" >
    <!--begin::Head-->

<head>
        <title>ViteMart | Dashboard</title>
        <meta charset="utf-8"/>
        <meta name="description" content=" "/>
        <meta name="keywords" content=""/>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <link rel="shortcut icon" href="<?php echo e(asset('html/assets/assets/media/logos/favicon.ico')); ?>"/>

        <!--begin::Fonts(mandatory for all pages)-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
        <!--end::Fonts-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.12.0/tagify.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.12.0/tagify.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <style>
            * {
                /* box-sizing: border-box;
                margin: 0;
                padding: 0; */
            }

            .fraction {
                display: inline-flex;
                flex-direction: column;
                align-items: center;
                font-family: Arial, sans-serif;
                font-size: 10px;
            }

            .fraction .numerator {
                border-bottom: 2px solid black;
                padding: 0 5px;
            }

            .fraction .denominator {
                padding-top: 5px;
            }

            tr.rt>th,
            tr.rt>td {
                text-align: center;
            }

            div.grade>span {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 16px;
                font-weight: bold;
            }

            span.text-space-on-dots {
                position: relative;
                width: 500px;
                border-bottom-style: dotted;
            }

            span.text-dot-space2 {
                position: relative;
                width: 300px;
                border-bottom-style: dotted;
            }

            @media print {
                div.print-body {
                    background-color: white;
                }

                @page {
                    size: 940px;
                    margin: 0px;
                }

                div.print-body {
                    background-color: white;
                }

                html,
                body {
                    width: 940px;
                }

                body {
                    margin: 0;
                }

                nav {
                    display: none;
                }
            }

            p.school-name1 {
                font-family: 'Times New Roman', Times, serif;
                font-size: 40px;
                font-weight: 500;
            }

            p.school-name2 {
                font-family: 'Times New Roman', Times, serif;
                font-size: 30px;
                font-weight: bolder;
            }

            div.school-logo {
                width: 80px;
                height: 60px;
            }

            div.header-divider {
                width: 100%;
                height: 3px;
                background-color: black;
                margin-bottom: 3px;
            }

            div.header-divider2 {
                width: 100%;
                height: 1px;
                background-color: black;
            }

            span.result-details {
                font-size: 16px;
                font-family: 'Times New Roman', Times, serif;
                font-weight: lighter;
                font-style: italic;
            }

            span.rd1 {
                position: relative;
                width: 86.1%;
                border-bottom-style: dotted;
            }

            span.rd2 {
                position: relative;
                width: 30%;
                border-bottom-style: dotted;
            }

            span.rd3 {
                position: relative;
                width: 30%;
                border-bottom-style: dotted;
            }

            span.rd4 {
                position: relative;
                width: 30%;
                border-bottom-style: dotted;
            }

            span.rd5 {
                position: relative;
                width: 25%;
                border-bottom-style: dotted;
            }

            span.rd6 {
                position: relative;
                width: 28%;
                border-bottom-style: dotted;
            }

            span.rd7 {
                position: relative;
                width: 17.2%;
                border-bottom-style: dotted;
            }

            span.rd8 {
                position: relative;
                width: 12%;
                border-bottom-style: dotted;
            }

            span.rd9 {
                position: relative;
                width: 11%;
                border-bottom-style: dotted;
            }

            span.rd10 {
                position: relative;
                width: 11%;
                border-bottom-style: dotted;
            }

 .modal-body {
    padding: 20px;
    background-color: #f8f9fa;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
 }

.icon-head {
    margin-bottom: 20px;
}

.icon-head img {
    display: inline-block;
    border-radius: 5px;
}

.info {
    margin-bottom: 20px;
}

.info h6 {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 5px;
    color: #333;
}

.info p {
    font-size: 14px;
    color: #666;
    margin: 2px 0;
}

.tax-invoice h6 {
    font-size: 18px;
    font-weight: bold;
    color: #333;
    margin-bottom: 15px;
}

.invoice-user-name {
    font-size: 14px;
    color: #555;
    margin-bottom: 5px;
}

.invoice-user-name span:first-child {
    font-weight: bold;
}

.table-fit {
    margin-top: 20px;
    font-size: 14px;
    color: #555;
    width: 100%;
}

.table-fit th,
.table-fit td {
    padding: 5px 10px;
}

.table-fit th {
    text-align: left;
    font-weight: bold;
    border-bottom: 2px solid #ddd;
}

.table-fit td {
    text-align: left;
    border-bottom: 1px solid #eee;
}

.table-fit .text-end {
    text-align: right;
}

.invoice-bar {
    margin-top: 30px;
}

.invoice-bar p {
    font-size: 12px;
    color: #666;
    margin: 5px 0;
}

.invoice-bar img {
    margin: 10px auto;
    display: block;
    max-width: 150px;
}

.invoice-bar .btn {
    margin-top: 10px;
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    text-transform: uppercase;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.invoice-bar .btn:hover {
    background-color: #0056b3;
}


.table-fit {
    margin-top: 20px;
    font-size: 14px;
    color: #555;
    width: 100%;
}

.table-fit th,
.table-fit td {
    padding: 5px 10px;
}

.table-fit th {
    text-align: left;
    font-weight: bold;
    border-bottom: 2px solid #ddd;
}

.table-fit tbody tr:not(:last-child) {
    border-bottom: 1px dotted #aaa; /* Dotted line for item rows */
}

.table-fit tbody tr:last-child td {
    border: none; /* Remove border for the final subtotal row */
}

.table-fit .text-end {
    text-align: right;
}

.table-fit .subtotal-row {
    border-top: 1px dotted #aaa; /* Dotted line separating items and subtotal */
}

 :root {
    --background-light: #ffffff;
    --background-dark: #1a1a1a;
    --text-light: #000000;
    --text-dark: #ffffff;
    --secondary-text-light: #555555;
    --secondary-text-dark: #bbbbbb;
    --border-light: #ddd;
    --border-dark: #444;
}

body.light-theme {
    background-color: var(--background-light);
    color: var(--text-light);
}

body.dark-theme {
    background-color: var(--background-dark);
    color: var(--text-dark);
}

.table-fit {
    margin-top: 20px;
    font-size: 14px;
    width: 100%;
    border-collapse: collapse;
}

.table-fit th,
.table-fit td {
    padding: 5px 10px;
    color: inherit;
}

 .table-fit th {
    font-weight: bold;
    border-bottom: 2px solid var(--border-light);
}

 body.dark-theme .table-fit th {
    border-bottom: 2px solid var(--border-dark);
}

.table-fit tbody tr:not(:last-child) {
    border-bottom: 1px dotted var(--border-light);
}

body.dark-theme .table-fit tbody tr:not(:last-child) {
    border-bottom: 1px dotted var(--border-dark);
}

.table-fit .text-end {
    text-align: right;
}

.icon-head img, .invoice-bar img {
    max-width: 100px;
    height: auto;
}

 Additional Styling for Secondary Text
 .info p, .invoice-bar p {
    color: var(--secondary-text-light);
}

body.dark-theme .info p,
body.dark-theme .invoice-bar p {
    color: var(--secondary-text-dark);
}

        </style>

        <?php if(Route::is('dashboard')): ?>
             <?php echo $__env->make('layouts.pages-assets.css.dashboard-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php if(Route::is('users.*')): ?>
            <?php echo $__env->make('layouts.pages-assets.css.users-list-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php if(Route::is('user.overview')): ?>
            <?php echo $__env->make('layouts.pages-assets.css.users-list-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php if(Route::is('user.settings')): ?>
             <?php echo $__env->make('layouts.pages-assets.css.users-list-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php if(Route::is('roles.*')): ?>
            <?php echo $__env->make('layouts.pages-assets.css.users-list-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php if(Route::is('permissions.*')): ?>
             <?php echo $__env->make('layouts.pages-assets.css.permission-list-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(Route::is('category.*')): ?>
           <?php echo $__env->make('layouts.pages-assets.css.users-list-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(Route::is('brand.*')): ?>
            <?php echo $__env->make('layouts.pages-assets.css.users-list-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(Route::is('product.*')): ?>
             <?php echo $__env->make('layouts.pages-assets.css.users-list-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(Route::is('unit.*')): ?>
             <?php echo $__env->make('layouts.pages-assets.css.users-list-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(Route::is('tag.*')): ?>
              <?php echo $__env->make('layouts.pages-assets.css.users-list-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(Route::is('variant.*')): ?>
             <?php echo $__env->make('layouts.pages-assets.css.users-list-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(Route::is('store.*')): ?>
             <?php echo $__env->make('layouts.pages-assets.css.users-list-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(Route::is('pos.*')): ?>
             <?php echo $__env->make('layouts.pages-assets.css.users-list-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>



            <!--begin::Body-->
    <body  id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true"  class="app-default" >
        <!--begin::Theme mode setup on page load-->
<script>
	var defaultThemeMode = "light";
	var themeMode;

	if ( document.documentElement ) {
		if ( document.documentElement.hasAttribute("data-bs-theme-mode")) {
			themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
		} else {
			if ( localStorage.getItem("data-bs-theme") !== null ) {
				themeMode = localStorage.getItem("data-bs-theme");
			} else {
				themeMode = defaultThemeMode;
			}
		}

		if (themeMode === "system") {
			themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
		}

		document.documentElement.setAttribute("data-bs-theme", themeMode);
	}
</script>

<!--begin::App-->
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <!--begin::Page-->
    <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">


<!--begin::Header-->
<div id="kt_app_header" class="app-header ">

                        <!--begin::Header container-->
            <div class="app-container  container-fluid d-flex align-items-stretch justify-content-between " id="kt_app_header_container">

	<!--begin::Sidebar mobile toggle-->
	<div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
		<div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
			<i class="ki-duotone ki-abstract-14 fs-2 fs-md-1"><span class="path1"></span><span class="path2"></span></i>		</div>
	</div>
	<!--end::Sidebar mobile toggle-->


	<!--begin::Mobile logo-->
	<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
		<a href="assets/index.html')}}" class="d-lg-none">
			<img alt="Logo" src="<?php echo e(asset('html/assets/assets/media/logos/default-small.svg')); ?>" class="h-30px"/>
		</a>
	</div>
	<!--end::Mobile logo-->

<!--begin::Header wrapper-->
<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">

<!--begin::Menu wrapper-->
<div
    class="
        app-header-menu
        app-header-mobile-drawer
        align-items-stretch
    "

    data-kt-drawer="true"
	data-kt-drawer-name="app-header-menu"
	data-kt-drawer-activate="{default: true, lg: false}"
	data-kt-drawer-overlay="true"
	data-kt-drawer-width="250px"
	data-kt-drawer-direction="end"
	data-kt-drawer-toggle="#kt_app_header_menu_toggle"

    data-kt-swapper="true"
    data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
    data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}"
>

</div>
<!--end::Menu wrapper-->


<?php echo $__env->make('layouts.inc.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--begin::Wrapper-->
<div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">

                <?php echo $__env->make('layouts.inc.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



                <?php echo $__env->yieldContent('content'); ?>



</div>
<!--end::Content wrapper-->
<!--begin::Footer-->
<div id="kt_app_footer" class="app-footer " >
            <!--begin::Footer container-->
        <div class="app-container  container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3 ">
            <!--begin::Copyright-->
<div class="text-dark order-2 order-md-1">
    <span class="text-muted fw-semibold me-1">2023&copy;</span>
    <a href="#" target="_blank" class="text-gray-800 text-hover-primary">Powered By Qudroid Systems</a>
</div>
<!--end::Copyright-->

<!--begin::Menu-->
<ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
    <li class="menu-item">
        <a href="https://keenthemes.com/" target="_blank" class="menu-link px-2">
        About
       </a>
    <li>
</ul>
<!--end::Menu-->
     </div>
        <!--end::Footer container-->
    </div>
<!--end::Footer-->
     </div>
    <!--end:::Main-->
  </div>
        <!--end::Wrapper-->
     </div>
    <!--end::Page-->
</div>
<!--end::App-->


<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
	<i class="ki-duotone ki-arrow-up"><span class="path1"></span><span class="path2"></span></i></div>
<!--end::Scrolltop-->



        <!--begin::Javascript-->
        <script>
            // var hostUrl = "<?php echo e(asset('html/assets/assets/index.html')); ?>";
              </script>


        <?php if(Route::is('dashboard')): ?>
             <?php echo $__env->make('layouts.pages-assets.js.dashboard-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php if(Route::is('users.*')): ?>
              <?php echo $__env->make('layouts.pages-assets.js.users-list-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php if(Route::is('user.overview')): ?>
              <?php echo $__env->make('layouts.pages-assets.js.users-list-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php if(Route::is('user.settings')): ?>
             <?php echo $__env->make('layouts.pages-assets.js.users-list-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php if(Route::is('roles.*')): ?>
             <?php echo $__env->make('layouts.pages-assets.js.role-list-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php if(Route::is('permissions.*')): ?>
             <?php echo $__env->make('layouts.pages-assets.js.permissions-list-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(Route::is('category.*')): ?>
             <?php echo $__env->make('layouts.pages-assets.js.category-list-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(Route::is('product.*')): ?>
           <?php echo $__env->make('layouts.pages-assets.js.product-list-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(Route::is('unit.*')): ?>
            <?php echo $__env->make('layouts.pages-assets.js.unit-list-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(Route::is('tag.*')): ?>
             <?php echo $__env->make('layouts.pages-assets.js.tag-list-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(Route::is('brand.*')): ?>
             <?php echo $__env->make('layouts.pages-assets.js.brand-list-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(Route::is('variant.*')): ?>
             <?php echo $__env->make('layouts.pages-assets.js.variant-list-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(Route::is('store.*')): ?>
             <?php echo $__env->make('layouts.pages-assets.js.store-list-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(Route::is('pos.*')): ?>
             <?php echo $__env->make('layouts.pages-assets.js.pos-list-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>



  <!--end::Custom Javascript-->


     </body>
</html>
<?php /**PATH C:\xampp\htdocs\vitemart-ec\resources\views/layouts/master.blade.php ENDPATH**/ ?>