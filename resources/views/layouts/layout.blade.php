<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Saul
Product Version: 1.0.0
Upgrade to Pro: https://keenthemes.com/products/saul-html-pro
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="" />
    <title>SIM K3 FT UNDIP</title>
    <meta charset="utf-8" />
    <meta name="description" content="Saul HTML Free - Bootstrap 5 HTML Multipurpose Admin Dashboard Theme" />
    <meta name="keywords"
        content="Saul, bootstrap, bootstrap 5, dmin themes, free admin themes, bootstrap admin, bootstrap dashboard" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Saul HTML Free - Bootstrap 5 HTML Multipurpose Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/products/saul-html-pro" />
    <meta property="og:site_name" content="Keenthemes | Saul HTML Free" />
    <link rel="canonical" href="https://preview.keenthemes.com/saul-html-free" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Flex:wght@100;200;300;400;500;600;700;800;900;1000&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <!--end::Vendor Stylesheets-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css">
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <style>
        h2 {
            font-family: Roboto Flex !important;
            font-size: 24px !important;
            font-weight: 700 !important;
        }

        strong {
            font-family: Roboto Flex !important;
            font-size: 16px !important;
        }

        thead {
            font-family: Roboto Flex;
            font-size: 16px;
            color: #16243D;
            font-weight: 700;
        }

        tbody {
            font-size: 16px !important;
            font-family: Roboto !important;
            font-weight: 400 !important;
        }

        #kt_app_content {
            font-size: 12px !important;
            font-family: Roboto !important;
            font-weight: 400 !important;
        }


        /* .pagination .page-link:hover {
      color: #DC3545 !important;
    }
    .pagination .page-link i .next:hover {
      color: #DC3545 !important;
    } */

        .page-item.active .page-link {
            background-color: #DC3545 !Important;
            border: solid 1px #DC3545 !Important;
        }

        .pagination>li>a:focus,
        .pagination>li>a:hover,
        .pagination>li>span:focus,
        .pagination>li:not(.active)>span:hover {
            color: #DC3545 !important;
            background-color: #eee;
            border-color: #ddd;
        }

        .pagination>.active>a {
            color: white;
            background-color: #DC3545 !Important;
            border: solid 1px #DC3545 !Important;
        }

        .pagination>.active>a:hover {
            color: white !important;
            background-color: #DC3545 !Important;
            border: solid 1px #DC3545;
        }
    </style>
    @yield ('custom-css')

    <!--end::Global Stylesheets Bundle-->
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
    </script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true"
    data-kt-app-aside-enabled="true" data-kt-app-aside-fixed="true" data-kt-app-aside-push-toolbar="true"
    data-kt-app-aside-push-footer="true" class="app-default">
    @include('sweetalert::alert')
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
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
    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root" style="background-color:#fff!important;">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            @include ('layouts.header')
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                @include ('layouts.sidebar')
                <!--end::Sidebar-->
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    @yield ('content')
                    <!--end::Content wrapper-->

                </div>
                <!--end:::Main-->
                <!--begin::aside-->

                <!--end::aside-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->
    <!--begin::Drawers-->
    <!--begin::Activities drawer-->
    <!--end::Activities drawer-->
    <!--begin::Chat drawer-->

    <!--end::Chat drawer-->
    <!--begin::Chat drawer-->

    <!--end::Chat drawer-->
    <!--end::Drawers-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    @yield ('customscript')
    <!--end::Global Javascript Bundle-->

    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
