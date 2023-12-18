<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle"
    style="background-color:#FFFFFF">
    <!--begin::Main-->
    <div class="d-flex flex-column justify-content-between h-100 hover-scroll-overlay-y my-2 d-flex flex-column"
        id="kt_app_sidebar_main" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_app_header" data-kt-scroll-wrappers="#kt_app_main" data-kt-scroll-offset="5px">
        <!--begin::Sidebar menu-->
        <div id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false"
            class="flex-column-fluid menu menu-sub-indention menu-column menu-rounded menu-active-bg mb-7 ">
            <!--begin:Menu item-->
            {{-- View Admin --}}
            @if (auth()->user()->hak_akses == 'Admin')
                <div class="menu-title menu-item here show menu-accordion ">
                    <!--begin:Menu link-->
                    <a href="{{ route('dashboard') }}" class="menu-link {{ Request::is('dashboard') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <i class="bi bi-speedometer2 fs-3 "></i>
                        </span>
                        <span class="menu-title ">Dashboards</span>

                    </a>
                </div>
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('laporan-insiden.index') }}"
                        class="menu-link hvr {{ Request::is('laporan-insiden') ? 'active' : '' }}">
                        <span class="menu-icon ">
                            <i class="bi bi-clipboard-check-fill  fs-3"></i>
                        </span>
                        <span class="menu-title ">Daftar Laporan Insiden</span>

                    </a>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->

                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('potensibahaya.index') }}"
                        class="menu-link {{ Request::is('potensibahaya') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <i class="bi bi-exclamation-octagon  fs-3"></i>
                        </span>
                        <span class="menu-title ">Daftar Laporan Potensi Bahaya</span>

                    </a>
                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-card-checklist  fs-3"></i>
                        </span>
                        <span class="menu-title ">Daftar Investigasi</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('daftarinvestigasi.index') }}"
                                class="menu-link {{ Request::is('daftarinvestigasi') ? 'active' : '' }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-person-lines-fill  fs-3"></i>
                                </span>
                                <span class="menu-title ">Daftar Investigasi Insiden</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('investigasipotensi.index') }}"
                                class="menu-link {{ Request::is('investigasipotensi') ? 'active' : '' }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-exclamation-diamond  fs-3"></i>
                                </span>
                                <span class="menu-title ">Daftar Investigasi Potensi Bahaya</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('hirarc.index') }}"
                        class="menu-link {{ Request::is('hirarc') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <i class="bi bi-diagram-2  fs-3"></i>
                        </span>
                        <span class="menu-title ">HIRADC</span>

                    </a>
                </div>
                <!--end:Menu item-->



                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-people  fs-3"></i>
                        </span>
                        <span class="menu-title ">Users</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('p2k3.index') }}"
                                class="menu-link {{ Request::is('p2k3') ? 'active' : '' }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-person-fill  fs-3"></i>
                                </span>
                                <span class="menu-title ">P2K3</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('user.index') }}"
                                class="menu-link {{ Request::is('user') ? 'active' : '' }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-people  fs-3"></i>
                                </span>
                                <span class="menu-title ">Role User</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->



                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-database-add  fs-3"></i>
                        </span>
                        <span class="menu-title ">Data Master</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('lokasimaster.index') }}"
                                class="menu-link {{ Request::is('lokasimaster') ? 'active' : '' }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-pin-map  fs-3 "></i>
                                </span>
                                <span class="menu-title ">Lokasi</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('aktifitasmaster.index') }}"
                                class="menu-link {{ Request::is('aktifitasmaster') ? 'active' : '' }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-activity  fs-3"></i>
                                </span>
                                <span class="menu-title ">Aktifitas</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>

                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('hazard.index') }}"
                                class="menu-link {{ Request::is('hazard') ? 'active' : '' }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-exclamation-octagon  fs-3"></i>
                                </span>
                                <span class="menu-title ">Hazard</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('risiko.index') }}"
                                class="menu-link {{ Request::is('risiko') ? 'active' : '' }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-exclamation-triangle  fs-3"></i>
                                </span>
                                <span class="menu-title ">Risiko</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('departemenmaster.index') }}"
                                class="menu-link {{ Request::is('departemenmaster') ? 'active' : '' }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-building  fs-3"></i>
                                </span>
                                <span class="menu-title ">Departemen</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--begin:Menu item-->
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('maps.index') }}" class="menu-link {{ Request::is('maps') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <i class="bi bi-map  fs-3 "></i>
                        </span>
                        <span class="menu-title ">Maps</span>
                    </a>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('daftardokumen.index') }}"
                        class="menu-link {{ Request::is('daftardokumen') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <i class="bi bi-filetype-doc  fs-3"></i>
                        </span>
                        <span class="menu-title ">Daftar Dokumen</span>
                    </a>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('simk3.index') }}"
                        class="menu-link {{ Request::is('simk3') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <i class="bi bi-house-door  fs-3"></i>
                        </span>
                        <span class="menu-title ">Back Home</span>
                    </a>
                </div>
                <!--end:Menu item-->
            @endif
            {{-- End View Admin --}}

            {{-- View P2K3 --}}
            @if (auth()->user()->hak_akses == 'P2K3' ||
                    auth()->user()->hak_akses == 'K3 Departemen' ||
                    auth()->user()->hak_akses == 'Pimpinan')
                <!--begin:Menu item-->
                <div class="menu-item here show menu-accordion ">
                    <!--begin:Menu link-->
                    <a href="{{ route('dashboard') }}"
                        class="menu-link {{ Request::is('dashboard') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <i class="bi bi-speedometer2 fs-3 "></i>
                        </span>
                        <span class="menu-title ">Dashboards</span>

                    </a>
                </div>
                @if (auth()->user()->hak_akses == 'K3 Departemen')
                    <!--begin:Menu item-->
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="bi bi-clipboard-check-fill  fs-3"></i>
                            </span>
                            <span class="menu-title ">Daftar Laporan Insiden</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion">
                                <!--begin:Menu link-->
                                <a href="{{ route('laporan-insiden.index') }}"
                                    class="menu-link {{ Request::is('laporan-insiden') ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <i class="bi bi-clipboard-minus-fill  fs-3"></i>
                                    </span>
                                    <span class="menu-title ">Daftar Laporan Insiden Departemen</span>
                                    <!-- <span class="menu-arrow"></span> -->
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion">
                                <!--begin:Menu link-->
                                <a href="{{ route('laporan-insiden.k3dep') }}"
                                    class="menu-link {{ Request::is('laporan-insiden/k3departemen') ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <i class="bi bi-clipboard-data-fill  fs-3"></i>
                                    </span>
                                    <span class="menu-title ">Daftar Laporan Insiden</span>
                                    <!-- <span class="menu-arrow"></span> -->
                                </a>
                                <!--end:Menu link-->
                            </div>
                        </div>
                        <!--end:Menu sub-->
                    </div>
                    <!--End begin:Menu item-->

                    <!--begin:Menu item-->
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="bi bi-exclamation-octagon  fs-3"></i>
                            </span>
                            <span class="menu-title ">Daftar Laporan Potensi Bahaya</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion">
                                <!--begin:Menu link-->
                                <a href="{{ route('potensibahaya.index') }}"
                                    class="menu-link {{ Request::is('potensibahaya') ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <i class="bi bi-building-fill-exclamation  fs-3"></i>
                                    </span>
                                    <span class="menu-title ">Daftar Laporan Potensi Bahaya Departemen</span>
                                    <!-- <span class="menu-arrow"></span> -->
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion">
                                <!--begin:Menu link-->
                                <a href="{{ route('potensibahaya.k3dep') }}"
                                    class="menu-link {{ Request::is('potensibahaya/k3departemen') ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <i class="bi bi-database-fill-exclamation  fs-3"></i>
                                    </span>
                                    <span class="menu-title ">Daftar Laporan Potensi Bahaya</span>
                                    <!-- <span class="menu-arrow"></span> -->
                                </a>
                                <!--end:Menu link-->
                            </div>
                        </div>
                        <!--end:Menu sub-->
                    </div>
                    <!--End begin:Menu item-->

                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="bi bi-card-checklist  fs-3"></i>
                            </span>
                            <span class="menu-title ">Daftar Investigasi</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion">
                                <!--begin:Menu link-->
                                <a href="{{ route('daftarinvestigasi.index') }}"
                                    class="menu-link {{ Request::is('daftarinvestigasi') ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <i class="bi bi-person-fill-gear  fs-3"></i>
                                    </span>
                                    <span class="menu-title ">Daftar Investigasi Insiden Departemen</span>
                                    <!-- <span class="menu-arrow"></span> -->
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <div class="menu-item menu-accordion">
                                <!--begin:Menu link-->
                                <a href="{{ route('daftarinvestigasi.k3dep') }}"
                                    class="menu-link {{ Request::is('daftarinvestigasi/k3departemen') ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <i class="bi bi-person-lines-fill  fs-3"></i>
                                    </span>
                                    <span class="menu-title ">Daftar Investigasi Insiden</span>
                                    <!-- <span class="menu-arrow"></span> -->
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion">
                                <!--begin:Menu link-->
                                <a href="{{ route('investigasipotensi.index') }}"
                                    class="menu-link {{ Request::is('investigasipotensi') ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <i class="bi bi-house-exclamation-fill  fs-3"></i>
                                    </span>
                                    <span class="menu-title ">Daftar Investigasi Potensi Bahaya
                                        Departemen</span>
                                    <!-- <span class="menu-arrow"></span> -->
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <div class="menu-item menu-accordion">
                                <!--begin:Menu link-->
                                <a href="{{ route('investigasipotensi.k3dep') }}"
                                    class="menu-link {{ Request::is('investigasipotensi/k3departemen') ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <i class="bi bi-exclamation-diamond  fs-3"></i>
                                    </span>
                                    <span class="menu-title ">Daftar Investigasi Potensi Bahaya</span>
                                    <!-- <span class="menu-arrow"></span> -->
                                </a>
                                <!--end:Menu link-->
                            </div>
                        </div>
                        <!--end:Menu sub-->
                    </div>
                @else
                    <div class="menu-item here show menu-accordion">
                        <!--begin:Menu link-->
                        <a href="{{ route('laporan-insiden.index') }}"
                            class="menu-link {{ Request::is('laporan-insiden') ? 'active' : '' }}">
                            <span class="menu-icon ">
                                <i class="bi bi-clipboard-check-fill  fs-3"></i>
                            </span>
                            <span class="menu-title ">Daftar Laporan Insiden</span>

                        </a>
                    </div>
                    <!--end:Menu item-->

                    <!--begin:Menu item-->
                    <div class="menu-item here show menu-accordion">
                        <!--begin:Menu link-->
                        <a href="{{ route('potensibahaya.index') }}"
                            class="menu-link {{ Request::is('potensibahaya') ? 'active' : '' }}">
                            <span class="menu-icon">
                                <i class="bi bi-exclamation-octagon  fs-3"></i>
                            </span>
                            <span class="menu-title ">Daftar Laporan Potensi Bahaya</span>

                        </a>
                    </div>
                    <!--end:Menu item-->

                    <!--begin:Menu item-->
                    <!--begin:Menu item-->
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="bi bi-card-checklist  fs-3"></i>
                            </span>
                            <span class="menu-title ">Daftar Investigasi</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion">
                                <!--begin:Menu link-->
                                <a href="{{ route('daftarinvestigasi.index') }}"
                                    class="menu-link {{ Request::is('daftarinvestigasi') ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <i class="bi bi-person-lines-fill  fs-3"></i>
                                    </span>
                                    <span class="menu-title ">Daftar Investigasi Insiden</span>
                                    <!-- <span class="menu-arrow"></span> -->
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion">
                                <!--begin:Menu link-->
                                <a href="{{ route('investigasipotensi.index') }}"
                                    class="menu-link {{ Request::is('investigasipotensi') ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <i class="bi bi-exclamation-diamond  fs-3"></i>
                                    </span>
                                    <span class="menu-title ">Daftar Investigasi Potensi Bahaya</span>
                                    <!-- <span class="menu-arrow"></span> -->
                                </a>
                                <!--end:Menu link-->
                            </div>
                        </div>
                        <!--end:Menu sub-->
                    </div>
                    <!--end:Menu item-->
                    <!--end:Menu item-->
                @endif


                <!--begin:Menu item-->
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('hirarc.index') }}"
                        class="menu-link {{ Request::is('hirarc') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <i class="bi bi-diagram-2  fs-3"></i>
                        </span>
                        <span class="menu-title ">HIRADC</span>

                    </a>
                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-people  fs-3"></i>
                        </span>
                        <span class="menu-title ">Users</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('p2k3.index') }}"
                                class="menu-link {{ Request::is('p2k3') ? 'active' : '' }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-person-fill  fs-3"></i>
                                </span>
                                <span class="menu-title ">P2K3</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                    </div>
                    <!--end:Menu sub-->
                </div>

                <!--end:Menu item-->
                @if (auth()->user()->hak_akses == 'P2K3' || auth()->user()->hak_akses == 'K3 Departemen')
                    <!--begin:Menu item-->
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="bi bi-database-add  fs-3"></i>
                            </span>
                            <span class="menu-title ">Data Master</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion">
                                <!--begin:Menu link-->
                                <a href="{{ route('lokasimaster.index') }}"
                                    class="menu-link {{ Request::is('lokasimaster') ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <i class="bi bi-pin-map  fs-3 "></i>
                                    </span>
                                    <span class="menu-title ">Lokasi</span>
                                    <!-- <span class="menu-arrow"></span> -->
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion">
                                <!--begin:Menu link-->
                                <a href="{{ route('aktifitasmaster.index') }}"
                                    class="menu-link {{ Request::is('aktifitasmaster') ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <i class="bi bi-activity  fs-3"></i>
                                    </span>
                                    <span class="menu-title ">Aktifitas</span>
                                    <!-- <span class="menu-arrow"></span> -->
                                </a>
                                <!--end:Menu link-->
                            </div>

                            <div class="menu-item menu-accordion">
                                <!--begin:Menu link-->
                                <a href="{{ route('hazard.index') }}"
                                    class="menu-link {{ Request::is('hazard') ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <i class="bi bi-exclamation-octagon  fs-3"></i>
                                    </span>
                                    <span class="menu-title ">Hazard</span>
                                    <!-- <span class="menu-arrow"></span> -->
                                </a>
                                <!--end:Menu link-->
                            </div>

                            <div class="menu-item menu-accordion">
                                <!--begin:Menu link-->
                                <a href="{{ route('risiko.index') }}"
                                    class="menu-link {{ Request::is('risiko') ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <i class="bi bi-exclamation-triangle  fs-3"></i>
                                    </span>
                                    <span class="menu-title ">Risiko</span>
                                    <!-- <span class="menu-arrow"></span> -->
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <div class="menu-item menu-accordion">
                                <!--begin:Menu link-->
                                <a href="{{ route('departemenmaster.index') }}"
                                    class="menu-link {{ Request::is('departemenmaster') ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <i class="bi bi-building  fs-3"></i>
                                    </span>
                                    <span class="menu-title ">Departemen</span>
                                    <!-- <span class="menu-arrow"></span> -->
                                </a>
                                <!--end:Menu link-->
                            </div>
                        </div>
                        <!--end:Menu sub-->
                    </div>
                @endif

                <!--begin:Menu item-->
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('maps.index') }}" class="menu-link {{ Request::is('maps') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <i class="bi bi-map  fs-3 "></i>
                        </span>
                        <span class="menu-title ">Maps</span>
                    </a>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('daftardokumen.index') }}"
                        class="menu-link {{ Request::is('daftardokumen') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <i class="bi bi-filetype-doc  fs-3"></i>
                        </span>
                        <span class="menu-title ">Daftar Dokumen</span>
                    </a>
                </div>

                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('simk3.index') }}"
                        class="menu-link {{ Request::is('simk3') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <i class="bi bi-house-door  fs-3"></i>
                        </span>
                        <span class="menu-title ">Back Home</span>
                    </a>
                </div>
            @endif
            {{-- End View P2K3 --}}

            {{-- View pengguna --}}
            @if (auth()->user()->hak_akses == 'Pengguna')
                <div class=" menu-item here show menu-accordion ">
                    <!--begin:Menu link-->
                    <a href="{{ route('dashboard') }}"
                        class="menu-link {{ Request::is('dashboard') ? 'active' : '' }} ">
                        <span class="menu-icon">
                            <i class="bi bi-speedometer2 fs-3 "></i>
                        </span>
                        <span class="menu-title ">Dashboards</span>

                    </a>
                </div>
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('laporan-insiden.index') }}"
                        class="menu-link {{ Request::is('laporan-insiden') ? 'active' : '' }}">
                        <span class="menu-icon ">
                            <i class="bi bi-clipboard-check-fill  fs-3"></i>
                        </span>
                        <span class="menu-title ">Daftar Laporan Insiden</span>

                    </a>
                </div>
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('potensibahaya.index') }}"
                        class="menu-link {{ Request::is('potensibahaya') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <i class="bi bi-exclamation-octagon  fs-3"></i>
                        </span>
                        <span class="menu-title ">Daftar Laporan Potensi Bahaya</span>

                    </a>
                </div>
                <!--begin:Menu item-->

                <!--end:Menu item-->
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('maps.index') }}" class="menu-link {{ Request::is('maps') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <i class="bi bi-map  fs-3 "></i>
                        </span>
                        <span class="menu-title ">Maps</span>
                    </a>
                </div>
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('simk3.index') }}"
                        class="menu-link {{ Request::is('simk3') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <i class="bi bi-house-door  fs-3"></i>
                        </span>
                        <span class="menu-title ">Back Home</span>
                    </a>
                </div>
            @endif
            {{-- End View Pengguna --}}


            <!--end:Menu item-->
        </div>
        <!--end::Sidebar menu-->

    </div>
    <!--end::Main-->
</div>

<style>
    #kt_app_sidebar {
        font-size: 16px !important;
        font-family: Plus Jakarta Sans, sans-serif !important;
        font-weight: 400 !important;
    }
</style>
