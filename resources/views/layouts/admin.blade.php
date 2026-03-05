<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/" />
    <title>@yield('title', 'Admin Penjadwalan')</title>
    <meta charset="utf-8" />
    <meta name="description" content="Scheduling system" />
    <meta name="keywords" content="schedule, shift, admin" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .app-shell {
            background: #f6f8fb;
        }

        .page-shell {
            max-width: 1320px;
            margin: 0 auto;
        }

        .card-soft {
            border: 1px solid #eef1f6;
            box-shadow: 0 8px 20px rgba(31, 50, 70, 0.08);
        }

        .stat-tile {
            border: 1px solid #eef1f6;
            border-radius: 16px;
            padding: 18px 20px;
            background: #ffffff;
            height: 100%;
        }

        .table-slim th,
        .table-slim td {
            padding: 0.55rem 0.6rem;
            vertical-align: middle;
            white-space: nowrap;
        }

        .schedule-grid {
            overflow-x: auto;
        }

        .sticky-col {
            position: sticky;
            left: 0;
            z-index: 2;
            background: #ffffff;
            border-right: 1px solid #e9edf5;
        }

        .sticky-col.header {
            z-index: 3;
            background: #f9fbff;
        }

        .token-text {
            font-family: "Courier New", monospace;
            font-size: 12px;
            color: #4b5563;
        }

        .form-compact .form-control,
        .form-compact .form-select {
            border-radius: 10px;
        }

        .mobile-stack {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        @media (max-width: 991px) {
            .page-shell {
                padding-left: 12px;
                padding-right: 12px;
            }

            .app-toolbar {
                padding-top: 12px;
                padding-bottom: 12px;
            }

            .table-slim th,
            .table-slim td {
                padding: 0.45rem 0.5rem;
                font-size: 12px;
            }
        }
    </style>
    @stack('styles')
</head>
<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-sidebar-stacked="true" data-kt-app-toolbar-enabled="true" class="app-default app-shell admin-shell">
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

    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            @if (empty($hideHeader))
                <div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize" data-kt-sticky-offset="{default: '200px', lg: '300px'}" data-kt-sticky-animation="false">
                    <div class="app-container container-fluid d-flex align-items-stretch flex-stack" id="kt_app_header_container">
                        <div class="d-flex align-items-center d-lg-none">
                            <button id="kt_app_sidebar_mobile_toggle" class="btn btn-icon btn-color-gray-500 btn-active-color-primary ms-n4 me-1">
                                <i class="ki-outline ki-burger-menu-6 fs-2x"></i>
                            </button>
                            <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
                                <a href="{{ route('admin.schedule') }}">
                                    <img alt="Logo" src="{{ asset('assets/media/logos/demo50.svg') }}" class="h-30px" />
                                </a>
                            </div>
                        </div>
                        <div class="d-flex flex-stack justify-content-end flex-row-fluid" id="kt_app_navbar_wrapper">
                            <div class="app-page-entry d-flex align-items-center flex-row-fluid gap-3">
                                <div class="symbol symbol-40px">
                                    <div class="symbol-label bg-light-primary">
                                        <i class="ki-outline ki-setting-2 fs-2 text-primary"></i>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <h1 class="text-gray-900 fs-2 fw-bold mb-0">Admin Penjadwalan</h1>
                                    <span class="text-gray-500 fw-semibold">Kontrol dan monitoring</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                @if (empty($hideSidebar))
                    <div id="kt_app_sidebar" class="app-sidebar" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                        @include('partials.sidebar-admin')
                    </div>
                @endif

                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        @if (empty($hideToolbar))
                            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-5">
                                <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack flex-wrap">
                                    <div class="page-title d-flex flex-column justify-content-center me-3">
                                        <h1 class="page-heading text-gray-900 fw-bold fs-3 my-0">@yield('page-title', 'Dashboard')</h1>
                                        <span class="text-gray-500 fw-semibold fs-7">@yield('page-subtitle', 'Jadwal dan monitoring')</span>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <div id="kt_app_content_container" class="app-container container-fluid page-shell">
                                @yield('content')
                            </div>
                        </div>
                    </div>

                    <div id="kt_app_footer" class="app-footer">
                        <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                            <div class="text-gray-900 order-2 order-md-1">
                                <span class="text-muted fw-semibold me-1">2026&copy;</span>
                                <span class="text-gray-800">Jadwal Shift</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
</body>
</html>
