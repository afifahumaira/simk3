<!--begin::Header-->
<div id="kt_app_header" class="app-header d-flex flex-column flex-stack mb-5">
    <!--begin::Header main-->
    <div class="d-flex align-items-center  flex-stack flex-grow-1"style="background: #ffffff">
        <div class="app-header-logo d-flex align-items-center justify-content-center flex-stack h-100 "
            id="kt_app_header_logo" style="background:#16243D">
            <!--begin::Sidebar mobile toggle-->
            <div class="btn btn-icon btn-active-color-primary w-35px h-35px ms-3 me-2 d-flex d-lg-none"
                id="kt_app_sidebar_mobile_toggle">
                <i class="ki-duotone ki-abstract-14 fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </div>
            <!--end::Sidebar mobile toggle-->
            <!--begin::Logo-->
            <div>
                <a href="#" class="app-sidebar-logo d-flex text-center fs-1 text-white">
                    SIM K3
                </a>
            </div>
            <!--end::Logo-->
            <!--begin::Sidebar toggle-->
            <div id="kt_app_sidebar_toggle"
                class="app-sidebar-toggle btn btn-sm btn-icon btn-color-warning  me-n2 d-none d-lg-flex "
                style="padding-left: 100px;" data-kt-toggle="true" data-kt-toggle-state="active"
                data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
                <i class="ki-duotone ki-exit-left fs-2x rotate-180">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </div>
            <!--end::Sidebar toggle-->
        </div>
        <!--begin::Navbar-->
        <div class="app-navbar flex-grow-1 justify-content-end" id="kt_app_header_navbar">
            <div class="app-navbar-item d-flex align-items-center flex-lg-grow-1 me-2 me-lg-0">
                <div class="menu-item px-3">
                    <div class="menu-content d-flex align-items-center px-3">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-50px me-5 rounded-circle">
                            <img alt="Logo" src="https://a.fsdn.com/allura/p/xampp/icon?1599843055?&w=90"
                                class="rounded-circle" />
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Username-->
                        <div class="d-flex flex-column">
                            <div class="fw-bold d-flex align-items-center fs-4" style="font-family: Roboto Flex;">
                                Selamat datang, {{ auth()->user()->name }}
                            </div>
                            <a href="#" class="fw-semibold text-muted fs-7"
                                style="font-family: Roboto">{{ auth()->user()->hak_akses }}</a>
                        </div>
                        <!--end::Username-->
                    </div>
                </div>
            </div>
        </div>
        <div class="app-navbar-item d-flex align-items-stretch justify-content-end flex-lg-grow-1 me-5 me-lg-7 pe-5">
            <div class="d-flex justify-content-end me-5 px-5">
                <div class="cursor-pointer symbol symbol-30px symbol-lg-40px"
                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                    data-kt-menu-placement="bottom-end">
                    <i class="bi bi-bell-fill fs-1"></i>
                </div>
                <!--begin::Notification menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold ms-4 py-4 px-4 fs-6 w-400px"
                    data-kt-menu="true">
                    <!--begin::Alert-->
                    <div class="alert alert-dismissible bg-light-primary border border-primary border-2 border-dashed d-flex flex-column flex-sm-row w-100 p-5">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-row pe-0 pe-sm-10">
                            <!--begin::Title-->
                            <i class="ki-duotone ki-notification-bing fs-2 text-primary me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                            <h4 class="fw-semibold">Notifikasi 1</h4>
                            <!--end::Title-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Alert-->

                    <!--begin::Alert-->
                    <div class="alert alert-dismissible bg-light-primary border border-primary border-2 border-dashed d-flex flex-column flex-sm-row w-100 p-5">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-row pe-0 pe-sm-10">
                            <!--begin::Title-->
                            <i class="ki-duotone ki-notification-bing fs-2 text-primary me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                            <h4 class="fw-semibold">Notifikasi 2</h4>
                            <!--end::Title-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Alert-->
                </div>
                <!--end::Notification menu-->
            </div>
            <div class="cursor-pointer symbol symbol-30px symbol-lg-40px"
                data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                data-kt-menu-placement="bottom-end">
                <i class="bi bi-person-circle fs-1"></i>
            </div>
            <!--begin::User account menu-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold me-5 py-4 fs-6 w-200px"
                data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content d-flex align-items-center px-3">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-50px me-5">
                            <i class="bi bi-person-circle" style="font-size: 3rem"></i>
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Username-->
                        <div class="d-flex flex-column">
                            <div class="fw-bold d-flex align-items-center fs-5">
                                {{ auth()->user()->name }}
                            </div>
                            <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
                        </div>
                        <!--end::Username-->
                    </div>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu separator-->
                <div class="separator my-2"></div>
                <!--end::Menu separator-->
                <!--begin::Menu item-->
                <div class="menu-item px-5">
                    <a href="#" class="menu-link px-5">Profile</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item px-5">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="menu-link px-5">Sign Out</button>
                    </form>
                    {{-- <a href="" ></a> --}}
                </div>
                <!--end::Menu item-->
            </div>
        </div>
        <!--end::Quick links-->
        <!--begin::User menu-->
    </div>
    <!--end::Navbar-->
</div>
<!--end::Header main-->
