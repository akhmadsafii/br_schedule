<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: MetronicProduct Version: 8.3.3
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<head>
    <base href="/" />
    <title>@yield('title', 'Sistem Penjadwalan')</title>
    <meta charset="utf-8" />
    <meta name="description" content="Scheduling system" />
    <meta name="keywords" content="schedule, shift, admin, public" />
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
            max-width: 1280px;
            margin: 0 auto;
        }

        .card-soft {
            border: 1px solid #eef1f6;
            box-shadow: 0 8px 20px rgba(31, 50, 70, 0.08);
        }

        .card-hero {
            background: linear-gradient(135deg, #ffffff 0%, #f2f6ff 100%);
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
<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-sidebar-stacked="true" data-kt-app-toolbar-enabled="true" class="app-default app-shell">
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
                                <a href="/">
                                    <img alt="Logo" src="{{ asset('assets/media/logos/demo50.svg') }}" class="h-30px" />
                                </a>
                            </div>
                        </div>
                        <div class="d-flex flex-stack justify-content-end flex-row-fluid" id="kt_app_navbar_wrapper">
                            <div class="app-page-entry d-flex align-items-center flex-row-fluid gap-3">
                                <div class="symbol symbol-40px">
                                    <div class="symbol-label bg-light-primary">
                                        <i class="ki-outline ki-calendar fs-2 text-primary"></i>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <h1 class="text-gray-900 fs-2 fw-bold mb-0">Sistem Penjadwalan</h1>
                                    <span class="text-gray-500 fw-semibold">Admin & Public</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                @if (empty($hideSidebar))
                    <div id="kt_app_sidebar" class="app-sidebar" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                        
                        <div class="app-sidebar-primary">
							<div class="app-sidebar-logo d-none d-md-flex flex-center pt-10 pb-10" id="kt_app_sidebar_logo">
								<a href="{{ route('public.schedule') }}">
									<img alt="Logo" src="{{ asset('assets/media/logos/demo62.svg') }}" class="h-30px" />
								</a>
							</div>
							<div class="app-sidebar-menu flex-grow-1 hover-scroll-y scroll-ms my-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
								<div id="kt_aside_menu" class="menu menu-column menu-title-gray-600 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-semibold fs-6" data-kt-menu="true">
									<div class="menu-item py-2">
										<a class="menu-link menu-center" href="{{ route('public.schedule') }}">
											<span class="menu-icon me-0">
												<i class="ki-outline ki-home-1 fs-2"></i>
											</span>
										</a>
									</div>
									@if (!empty($isAdmin))
										<div class="menu-item py-2">
											<a class="menu-link menu-center" href="{{ route('admin.schedule') }}">
												<span class="menu-icon me-0">
													<i class="ki-outline ki-chart-line-star fs-2"></i>
												</span>
											</a>
										</div>
										<div class="menu-item py-2">
											<a class="menu-link menu-center" href="{{ route('admin.employees.index') }}">
												<span class="menu-icon me-0">
													<i class="ki-outline ki-people fs-2"></i>
												</span>
											</a>
										</div>
									@endif
								</div>
							</div>
							<div class="d-flex flex-column flex-center pb-4 pb-lg-8" id="kt_app_sidebar_footer">
								<!--begin::User menu-->
								<div class="cursor-pointer symbol symbol-40px symbol-circle mb-9" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-attach="parent" data-kt-menu-placement="right-end">
									<img src="{{ asset('assets/media/avatars/300-9.jpg') }}" alt="user" />
								</div>
								<!--begin::User account menu-->
								<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<div class="menu-content d-flex align-items-center px-3">
											<!--begin::Avatar-->
											<div class="symbol symbol-50px me-5">
												<img alt="Logo" src="{{ asset('assets/media/avatars/300-9.jpg') }}" />
											</div>
											<!--end::Avatar-->
											<!--begin::Username-->
											<div class="d-flex flex-column">
												<div class="fw-bold d-flex align-items-center fs-5">Max Smith 
												<span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span></div>
												<a href="#" class="fw-semibold text-muted text-hover-primary fs-7">emma@kt.com</a>
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
										<a href="account/overview.html" class="menu-link px-5">My Profile</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-5">
										<a href="apps/projects/list.html" class="menu-link px-5">
											<span class="menu-text">My Projects</span>
											<span class="menu-badge">
												<span class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
											</span>
										</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-end" data-kt-menu-offset="-15px, 0">
										<a href="#" class="menu-link px-5">
											<span class="menu-title">My Subscription</span>
											<span class="menu-arrow"></span>
										</a>
										<!--begin::Menu sub-->
										<div class="menu-sub menu-sub-dropdown w-175px py-4">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="account/referrals.html" class="menu-link px-5">Referrals</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="account/billing.html" class="menu-link px-5">Billing</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="account/statements.html" class="menu-link px-5">Payments</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="account/statements.html" class="menu-link d-flex flex-stack px-5">Statements 
												<span class="ms-2 lh-0" data-bs-toggle="tooltip" title="View your statements">
													<i class="ki-outline ki-information-5 fs-5"></i>
												</span></a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu separator-->
											<div class="separator my-2"></div>
											<!--end::Menu separator-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<div class="menu-content px-3">
													<label class="form-check form-switch form-check-custom form-check-solid">
														<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
														<span class="form-check-label text-muted fs-7">Notifications</span>
													</label>
												</div>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu sub-->
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-5">
										<a href="account/statements.html" class="menu-link px-5">My Statements</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu separator-->
									<div class="separator my-2"></div>
									<!--end::Menu separator-->
									<!--begin::Menu item-->
									<div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
										<a href="#" class="menu-link px-5">
											<span class="menu-title position-relative">Mode 
											<span class="ms-5 position-absolute translate-middle-y top-50 end-0">
												<i class="ki-outline ki-night-day theme-light-show fs-2"></i>
												<i class="ki-outline ki-moon theme-dark-show fs-2"></i>
											</span></span>
										</a>
										<!--begin::Menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
											<!--begin::Menu item-->
											<div class="menu-item px-3 my-0">
												<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
													<span class="menu-icon" data-kt-element="icon">
														<i class="ki-outline ki-night-day fs-2"></i>
													</span>
													<span class="menu-title">Light</span>
												</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3 my-0">
												<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
													<span class="menu-icon" data-kt-element="icon">
														<i class="ki-outline ki-moon fs-2"></i>
													</span>
													<span class="menu-title">Dark</span>
												</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3 my-0">
												<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
													<span class="menu-icon" data-kt-element="icon">
														<i class="ki-outline ki-screen fs-2"></i>
													</span>
													<span class="menu-title">System</span>
												</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="0, 0">
										<a href="#" class="menu-link px-5">
											<span class="menu-title position-relative">Language 
											<span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English 
											<img class="w-15px h-15px rounded-1 ms-2" src="assets/media/flags/united-states.svg" alt="" /></span></span>
										</a>
										<!--begin::Menu sub-->
										<div class="menu-sub menu-sub-dropdown w-175px py-4">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="account/settings.html" class="menu-link d-flex px-5 active">
												<span class="symbol symbol-20px me-4">
													<img class="rounded-1" src="assets/media/flags/united-states.svg" alt="" />
												</span>English</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="account/settings.html" class="menu-link d-flex px-5">
												<span class="symbol symbol-20px me-4">
													<img class="rounded-1" src="assets/media/flags/spain.svg" alt="" />
												</span>Spanish</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="account/settings.html" class="menu-link d-flex px-5">
												<span class="symbol symbol-20px me-4">
													<img class="rounded-1" src="assets/media/flags/germany.svg" alt="" />
												</span>German</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="account/settings.html" class="menu-link d-flex px-5">
												<span class="symbol symbol-20px me-4">
													<img class="rounded-1" src="assets/media/flags/japan.svg" alt="" />
												</span>Japanese</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="account/settings.html" class="menu-link d-flex px-5">
												<span class="symbol symbol-20px me-4">
													<img class="rounded-1" src="assets/media/flags/france.svg" alt="" />
												</span>French</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu sub-->
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-5 my-1">
										<a href="account/settings.html" class="menu-link px-5">Account Settings</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-5">
										<a href="authentication/layouts/corporate/sign-in.html" class="menu-link px-5">Sign Out</a>
									</div>
									<!--end::Menu item-->
								</div>
								<!--end::User account menu-->
								<!--begin::Action-->
								<div class="app-navbar-item">
									<!--begin::Link-->
									<a href="authentication/layouts/corporate/sign-in.html" class="">
										<i class="ki-outline ki-exit-right fs-2"></i>
									</a>
									<!--end::Link-->
								</div>
								<!--end::Action-->
							</div>
							<!--end::Footer-->
						</div>
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
