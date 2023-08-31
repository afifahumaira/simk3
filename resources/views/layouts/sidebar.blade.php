<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle"
    style="background-color:#16243D">
    <!--begin::Main-->
    <div class="d-flex flex-column justify-content-between h-100 hover-scroll-overlay-y my-2 d-flex flex-column"
        id="kt_app_sidebar_main" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_app_header" data-kt-scroll-wrappers="#kt_app_main" data-kt-scroll-offset="5px">
        <!--begin::Sidebar menu-->
        <div id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false"
            class="flex-column-fluid menu menu-sub-indention menu-column menu-rounded menu-active-bg mb-7 ">
            <!--begin:Menu item-->
            {{-- View Admin --}}
            @if (auth()->user()->hak_akses == 'admin')
                <div class="menu-item here show menu-accordion ">
                    <!--begin:Menu link-->
                    <a href="{{ route('dashboard') }}" class="menu-link ">
                        <span class="menu-icon">
                            <i class="bi bi-speedometer2 fs-3 text-white"></i>
                        </span>
                        <span class="menu-title text-white">Dashboards</span>

                    </a>
                </div>
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('laporan-insiden.index') }}" class="menu-link">
                        <span class="menu-icon ">
                            <i class="bi bi-clipboard-check-fill text-white fs-3"></i>
                        </span>
                        <span class="menu-title text-white">Daftar Laporan Insiden</span>

                    </a>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                {{-- <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('daftarinvestigasi.index') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-person-lines-fill text-white fs-3"></i>
                        </span>
                        <span class="menu-title text-white">Daftar Investigasi</span>

                    </a>
                </div> --}}
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('potensibahaya.index') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-exclamation-octagon text-white fs-3"></i>
                        </span>
                        <span class="menu-title text-white">Daftar Laporan Potensi Bahaya</span>

                    </a>
                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-card-checklist text-white fs-3"></i>
                        </span>
                        <span class="menu-title text-white">Daftar Investigasi</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('daftarinvestigasi.index') }}" class="menu-link">
                                <span class="menu-bullet">
                                    <i class="bi bi-person-lines-fill text-white fs-3"></i>
                                </span>
                                <span class="menu-title text-white">Daftar Investigasi Insiden</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('investigasipotensi.index') }}" class="menu-link">
                                <span class="menu-bullet">
                                    <i class="bi bi-exclamation-diamond text-white fs-3"></i>
                                </span>
                                <span class="menu-title text-white">Daftar Investigasi Potensi Bahaya</span>
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
                    <a href="{{ route('hirarc.index') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-diagram-2 text-white fs-3"></i>
                        </span>
                        <span class="menu-title text-white">Hirarc</span>

                    </a>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                {{-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-inboxes text-white fs-3"></i>
                        </span>
                        <span class="menu-title text-white">Inventory</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('apar.index') }}" class="menu-link">
                                <span class="menu-bullet">
                                    <i class="bi bi-fire text-white fs-3 "></i>
                                </span>
                                <span class="menu-title text-white">Apar</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('p3k.index') }}" class="menu-link">
                                <span class="menu-bullet">
                                    <i class="bi bi-prescription2 text-white fs-3"></i>
                                </span>
                                <span class="menu-title text-white">P3K</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>

                    </div>
                    <!--end:Menu sub--> 
                </div>
                <!--end:Menu item--> --}}

                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-people text-white fs-3"></i>
                        </span>
                        <span class="menu-title text-white">Users</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('p2k3.index') }}" class="menu-link">
                                <span class="menu-bullet">
                                    <i class="bi bi-person-fill text-white fs-3"></i>
                                </span>
                                <span class="menu-title text-white">P2K3</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('user.index') }}" class="menu-link">
                                <span class="menu-bullet">
                                    <i class="bi bi-people text-white fs-3"></i>
                                </span>
                                <span class="menu-title text-white">Role User</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                {{-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-some-files text-white fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title text-white">Inspeksi</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('aparinspeksi.index') }}" class="menu-link">
                                <span class="menu-bullet">
                                    <i class="bi bi-fire text-white fs-3 "></i>
                                </span>
                                <span class="menu-title text-white">APAR</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('p3kinspeksi.index') }}" class="menu-link">
                                <span class="menu-bullet">
                                    <i class="bi bi-prescription2 text-white fs-3"></i>
                                </span>
                                <span class="menu-title text-white">P3K</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>
                    </div>
                    <!--end:Menu sub-->
                </div> --}}
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-database-add text-white fs-3"></i>
                        </span>
                        <span class="menu-title text-white">Data Master</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('lokasimaster.index') }}" class="menu-link">
                                <span class="menu-bullet">
                                    <i class="bi bi-pin-map text-white fs-3 "></i>
                                </span>
                                <span class="menu-title text-white">Lokasi</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('aktifitasmaster.index') }}" class="menu-link">
                                <span class="menu-bullet">
                                    <i class="bi bi-activity text-white fs-3"></i>
                                </span>
                                <span class="menu-title text-white">Aktifitas</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>

                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('hazard.index') }}" class="menu-link">
                                <span class="menu-bullet">
                                    <i class="bi bi-exclamation-octagon text-white fs-3"></i>
                                </span>
                                <span class="menu-title text-white">Hazard</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('risiko.index') }}" class="menu-link">
                                <span class="menu-bullet">
                                    <i class="bi bi-exclamation-triangle text-white fs-3"></i>
                                </span>
                                <span class="menu-title text-white">Risiko</span>
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
                    <a href="{{ route('maps.index') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-map text-white fs-3 "></i>
                        </span>
                        <span class="menu-title text-white">Maps</span>
                    </a>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('daftardokumen.index') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-filetype-doc text-white fs-3"></i>
                        </span>
                        <span class="menu-title text-white">Daftar Dokumen</span>
                    </a>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('simk3.index') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-house-door text-white fs-3"></i>
                        </span>
                        <span class="menu-title text-white">Back Home</span>
                    </a>
                </div>
                <!--end:Menu item-->
            @endif
            {{-- End View Admin --}}

            {{-- View tamu --}}
            @if (auth()->user()->hak_akses == 'pengguna')
                <div class="menu-item here show menu-accordion ">
                    <!--begin:Menu link-->
                    <a href="{{ route('dashboard') }}" class="menu-link ">
                        <span class="menu-icon">
                            <i class="bi bi-speedometer2 fs-3 text-white"></i>
                        </span>
                        <span class="menu-title text-white">Dashboards</span>

                    </a>
                </div>
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('laporan-insiden.index') }}" class="menu-link">
                        <span class="menu-icon ">
                            <i class="bi bi-clipboard-check-fill text-white fs-3"></i>
                        </span>
                        <span class="menu-title text-white">Daftar Lapor Insiden</span>

                    </a>
                </div>
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('potensibahaya.index') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-exclamation-octagon text-white fs-3"></i>
                        </span>
                        <span class="menu-title text-white">Daftar Lapor Potensi Bahaya</span>

                    </a>
                </div>
                <!--begin:Menu item-->
                {{-- <div class=" ms-1 menu-item here show menu-accordion">
                    <a href="{{ route('p2k3.index') }}" class="menu-link">
                        <span class="menu-bullet">
                            <i class="bi bi-people-fill text-white fs-3"></i>
                        </span>
                        <span class="menu-title ms-3 text-white">P2K3</span>
                    </a>

                </div> --}}
                <!--end:Menu item-->
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('maps.index') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-map text-white fs-3 "></i>
                        </span>
                        <span class="menu-title text-white">Maps</span>
                    </a>
                </div>
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('simk3.index') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-house-door text-white fs-3"></i>
                        </span>
                        <span class="menu-title text-white">Back Home</span>
                    </a>
                </div>
            @endif
            {{-- End View Pengguna --}}

            {{-- View P2K3 --}}
            @if (auth()->user()->hak_akses == 'p2k3' ||
                    auth()->user()->hak_akses == 'k3_departemen' ||
                    auth()->user()->hak_akses == 'pimpinan')
                <!--begin:Menu item-->

                <div class="menu-item here show menu-accordion ">
                    <!--begin:Menu link-->
                    <a href="{{ route('dashboard') }}" class="menu-link ">
                        <span class="menu-icon">
                            <i class="bi bi-speedometer2 fs-3 text-white"></i>
                        </span>
                        <span class="menu-title text-white">Dashboards</span>

                    </a>
                </div>
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('laporan-insiden.index') }}" class="menu-link">
                        <span class="menu-icon ">
                            <i class="bi bi-clipboard-check-fill text-white fs-3"></i>
                        </span>
                        <span class="menu-title text-white">Daftar Lapor Insiden</span>

                    </a>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('daftarinvestigasi.index') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-person-lines-fill text-white fs-3"></i>
                        </span>
                        <span class="menu-title text-white">Daftar Investigasi</span>

                    </a>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('potensibahaya.index') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-exclamation-octagon text-white fs-3"></i>
                        </span>
                        <span class="menu-title text-white">Daftar Lapor Potensi Bahaya</span>

                    </a>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('hirarc.index') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-diagram-2 text-white fs-3"></i>
                        </span>
                        <span class="menu-title text-white">Hirarc</span>

                    </a>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                {{-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-inboxes text-white fs-3"></i>
                        </span>
                        <span class="menu-title text-white">Inventory</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('apar.index') }}" class="menu-link">
                                <span class="menu-bullet">
                                    <i class="bi bi-fire text-white fs-3 "></i>
                                </span>
                                <span class="menu-title text-white">Apar</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('p3k.index') }}" class="menu-link">
                                <span class="menu-bullet">
                                    <i class="bi bi-prescription2 text-white fs-3"></i>
                                </span>
                                <span class="menu-title text-white">P3K</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>

                    </div>
                    <!--end:Menu sub-->
                </div> --}}
                <!--end:Menu item-->

                <!--begin:Menu item-->
                {{-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-some-files text-white fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title text-white">Inspeksi</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('aparinspeksi.index') }}" class="menu-link">
                                <span class="menu-bullet">
                                    <i class="bi bi-fire text-white fs-3 "></i>
                                </span>
                                <span class="menu-title text-white">APAR</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('p3kinspeksi.index') }}" class="menu-link">
                                <span class="menu-bullet">
                                    <i class="bi bi-prescription2 text-white fs-3"></i>
                                </span>
                                <span class="menu-title text-white">P3K</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>
                    </div>
                    <!--end:Menu sub-->
                </div> --}}
                <!--end:Menu item-->


                <!--begin:Menu item-->
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('maps.index') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-map text-white fs-3 "></i>
                        </span>
                        <span class="menu-title text-white">Maps</span>
                    </a>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <a href="{{ route('daftardokumen.index') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-filetype-doc text-white fs-3"></i>
                        </span>
                        <span class="menu-title text-white">Daftar Dokumen</span>
                    </a>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-people text-white fs-3"></i>
                        </span>
                        <span class="menu-title text-white">Users</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('p2k3.index') }}" class="menu-link">
                                <span class="menu-bullet">
                                    <i class="bi bi-person-fill text-white fs-3"></i>
                                </span>
                                <span class="menu-title text-white">P2K3</span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-house-door text-white fs-3"></i>
                        </span>
                        <span class="menu-title text-white">Back Home</span>
                    </span>
                </div>
            @endif
            {{-- End View P2K3 --}}



            <!--end:Menu item-->
        </div>
        <!--end::Sidebar menu-->

    </div>
    <!--end::Main-->
</div>

<style>
    #kt_app_sidebar {
        font-size: 16px !important;
        font-family: Roboto Flex !important;
        font-weight: 400 !important;
    }
</style>
