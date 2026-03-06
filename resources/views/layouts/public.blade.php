<!DOCTYPE html>
<html lang="en">
	<head>
<base href="./" />
		<base href="/" />
    <title>@yield('title', 'Sistem Penjadwalan')</title>
    <meta charset="utf-8" />
    <meta name="description" content="Scheduling system" />
    <meta name="keywords" content="schedule, shift, public" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	</head>
	<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-sidebar-stacked="true" data-kt-app-sidebar-secondary-enabled="true" data-kt-app-toolbar-enabled="true" class="app-default">
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize" data-kt-sticky-offset="{default: '200px', lg: '300px'}" data-kt-sticky-animation="false">
					<div class="app-container container-fluid d-flex align-items-stretch flex-stack" id="kt_app_header_container">
						<div class="d-flex align-items-center d-lg-none">
							<button id="kt_app_sidebar_mobile_toggle" class="btn btn-icon btn-color-gray-500 btn-active-color-primary ms-n4 me-1">
								<i class="ki-outline ki-burger-menu-6 fs-2x"></i>
							</button>
							<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
								<a href="index.html">
									<img alt="Logo" src="{{ asset('assets/media/logos/demo50.svg') }}" class="h-30px" />
								</a>
							</div>
							<div class="d-flex align-items-center d-lg-none ms-2" title="Show sidebar menu">
								<div class="btn btn-icon btn-color-white bg-white bg-opacity-0 bg-hover-opacity-10 w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
									<i class="ki-outline ki-abstract-14 fs-2"></i>
								</div>
							</div>
						</div>
						<div class="d-flex flex-stack justify-content-end flex-row-fluid" id="kt_app_navbar_wrapper">
							<div class="app-page-entry d-flex align-items-center flex-row-fluid gap-3">
								<img src="assets/media//stock/600x600/img-87.jpg" class="h-40px rounded" />
								<div class="d-flex flex-column">
									<h1 class="text-gray-900 fs-2 fw-bold mb-0">Project Nebula</h1>
								</div>
							</div>
							<div class="app-navbar flex-shrink-0 gap-1 gap-lg-3">
								<div class="app-navbar-item">
									<div class="btn btn-icon btn-icon-gray-500 btn-active-light btn-active-color-primary w-35px h-35px w-lg-40px h-lg-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
										<i class="ki-outline ki-add-notepad fs-1"></i>
									</div>
									<div class="menu menu-sub menu-sub-dropdown menu-column w-250px w-lg-325px" data-kt-menu="true">
										<div class="d-flex flex-column flex-center bgi-no-repeat rounded-top px-9 py-10" style="background-image:url('/assets/media/misc/menu-header-bg.jpg')">
											<h3 class="text-white fw-semibold mb-3">Quick Links</h3>
											<span class="badge bg-primary text-inverse-primary py-2 px-3">25 pending tasks</span>
										</div>
										<div class="row g-0">
											<div class="col-6">
												<a href="apps/projects/budget.html" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end border-bottom">
													<i class="ki-outline ki-dollar fs-3x text-primary mb-2"></i>
													<span class="fs-5 fw-semibold text-gray-800 mb-0">Accounting</span>
													<span class="fs-7 text-gray-500">eCommerce</span>
												</a>
											</div>
											<div class="col-6">
												<a href="apps/projects/settings.html" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-bottom">
													<i class="ki-outline ki-sms fs-3x text-primary mb-2"></i>
													<span class="fs-5 fw-semibold text-gray-800 mb-0">Administration</span>
													<span class="fs-7 text-gray-500">Console</span>
												</a>
											</div>
											<div class="col-6">
												<a href="apps/projects/list.html" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end">
													<i class="ki-outline ki-abstract-41 fs-3x text-primary mb-2"></i>
													<span class="fs-5 fw-semibold text-gray-800 mb-0">Projects</span>
													<span class="fs-7 text-gray-500">Pending Tasks</span>
												</a>
											</div>
											<div class="col-6">
												<a href="apps/projects/users.html" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light">
													<i class="ki-outline ki-briefcase fs-3x text-primary mb-2"></i>
													<span class="fs-5 fw-semibold text-gray-800 mb-0">Customers</span>
													<span class="fs-7 text-gray-500">Latest cases</span>
												</a>
											</div>
										</div>
										<div class="py-2 text-center border-top">
											<a href="pages/user-profile/activity.html" class="btn btn-color-gray-600 btn-active-color-primary">View All 
											<i class="ki-outline ki-arrow-right fs-5"></i></a>
										</div>
									</div>
								</div>
								<div class="app-navbar-item">
									<div class="btn btn-icon btn-icon-gray-500 btn-active-light btn-active-color-primary w-35px h-35px w-lg-40px h-lg-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
										<i class="ki-outline ki-element-11 fs-1"></i>
									</div>
									<div class="menu menu-sub menu-sub-dropdown menu-column w-100 w-sm-350px" data-kt-menu="true">
										<div class="card">
											<div class="card-header">
												<div class="card-title">My Apps</div>
												<div class="card-toolbar">
													<button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n3" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-end">
														<i class="ki-outline ki-setting-3 fs-2"></i>
													</button>
													<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
														<div class="menu-item px-3">
															<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
														</div>
														<div class="menu-item px-3">
															<a href="#" class="menu-link px-3">Create Invoice</a>
														</div>
														<div class="menu-item px-3">
															<a href="#" class="menu-link flex-stack px-3">Create Payment 
															<span class="ms-2" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference">
																<i class="ki-outline ki-information fs-6"></i>
															</span></a>
														</div>
														<div class="menu-item px-3">
															<a href="#" class="menu-link px-3">Generate Bill</a>
														</div>
														<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
															<a href="#" class="menu-link px-3">
																<span class="menu-title">Subscription</span>
																<span class="menu-arrow"></span>
															</a>
															<div class="menu-sub menu-sub-dropdown w-175px py-4">
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">Plans</a>
																</div>
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">Billing</a>
																</div>
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3">Statements</a>
																</div>
																<div class="separator my-2"></div>
																<div class="menu-item px-3">
																	<div class="menu-content px-3">
																		<label class="form-check form-switch form-check-custom form-check-solid">
																			<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
																			<span class="form-check-label text-muted fs-6">Recuring</span>
																		</label>
																	</div>
																</div>
															</div>
														</div>
														<div class="menu-item px-3 my-1">
															<a href="#" class="menu-link px-3">Settings</a>
														</div>
													</div>
												</div>
											</div>
											<div class="card-body py-5">
												<div class="mh-450px scroll-y me-n5 pe-5">
													<div class="row g-2">
														<div class="col-4">
															<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
																<img src="assets/media/svg/brand-logos/amazon.svg" class="w-25px h-25px mb-2" alt="" />
																<span class="fw-semibold">AWS</span>
															</a>
														</div>
														<div class="col-4">
															<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
																<img src="assets/media/svg/brand-logos/angular-icon-1.svg" class="w-25px h-25px mb-2" alt="" />
																<span class="fw-semibold">AngularJS</span>
															</a>
														</div>
														<div class="col-4">
															<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
																<img src="assets/media/svg/brand-logos/atica.svg" class="w-25px h-25px mb-2" alt="" />
																<span class="fw-semibold">Atica</span>
															</a>
														</div>
														<div class="col-4">
															<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
																<img src="assets/media/svg/brand-logos/beats-electronics.svg" class="w-25px h-25px mb-2" alt="" />
																<span class="fw-semibold">Music</span>
															</a>
														</div>
														<div class="col-4">
															<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
																<img src="assets/media/svg/brand-logos/codeigniter.svg" class="w-25px h-25px mb-2" alt="" />
																<span class="fw-semibold">Codeigniter</span>
															</a>
														</div>
														<div class="col-4">
															<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
																<img src="assets/media/svg/brand-logos/bootstrap-4.svg" class="w-25px h-25px mb-2" alt="" />
																<span class="fw-semibold">Bootstrap</span>
															</a>
														</div>
														<div class="col-4">
															<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
																<img src="assets/media/svg/brand-logos/google-tag-manager.svg" class="w-25px h-25px mb-2" alt="" />
																<span class="fw-semibold">GTM</span>
															</a>
														</div>
														<div class="col-4">
															<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
																<img src="assets/media/svg/brand-logos/disqus.svg" class="w-25px h-25px mb-2" alt="" />
																<span class="fw-semibold">Disqus</span>
															</a>
														</div>
														<div class="col-4">
															<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
																<img src="assets/media/svg/brand-logos/dribbble-icon-1.svg" class="w-25px h-25px mb-2" alt="" />
																<span class="fw-semibold">Dribble</span>
															</a>
														</div>
														<div class="col-4">
															<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
																<img src="assets/media/svg/brand-logos/google-play-store.svg" class="w-25px h-25px mb-2" alt="" />
																<span class="fw-semibold">Play Store</span>
															</a>
														</div>
														<div class="col-4">
															<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
																<img src="assets/media/svg/brand-logos/google-podcasts.svg" class="w-25px h-25px mb-2" alt="" />
																<span class="fw-semibold">Podcasts</span>
															</a>
														</div>
														<div class="col-4">
															<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
																<img src="assets/media/svg/brand-logos/figma-1.svg" class="w-25px h-25px mb-2" alt="" />
																<span class="fw-semibold">Figma</span>
															</a>
														</div>
														<div class="col-4">
															<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
																<img src="assets/media/svg/brand-logos/github.svg" class="w-25px h-25px mb-2" alt="" />
																<span class="fw-semibold">Github</span>
															</a>
														</div>
														<div class="col-4">
															<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
																<img src="assets/media/svg/brand-logos/gitlab.svg" class="w-25px h-25px mb-2" alt="" />
																<span class="fw-semibold">Gitlab</span>
															</a>
														</div>
														<div class="col-4">
															<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
																<img src="assets/media/svg/brand-logos/instagram-2-1.svg" class="w-25px h-25px mb-2" alt="" />
																<span class="fw-semibold">Instagram</span>
															</a>
														</div>
														<div class="col-4">
															<a href="#" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
																<img src="assets/media/svg/brand-logos/pinterest-p.svg" class="w-25px h-25px mb-2" alt="" />
																<span class="fw-semibold">Pinterest</span>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="app-navbar-item">
									<div class="btn btn-icon btn-icon-gray-500 btn-active-light btn-active-color-primary w-35px h-35px w-lg-40px h-lg-40px position-relative" id="kt_drawer_chat_toggle">
										<i class="ki-outline ki-notification-on fs-1"></i>
										<span class="position-absolute top-0 start-100 translate-middle badge badge-circle badge-danger w-15px h-15px ms-n4 mt-3">5</span>
									</div>
								</div>
								<div class="app-navbar-item ps-lg-2">
									<a href="#" class="btn btn-flex btn-icon align-self-center fw-bold btn-success w-35px w-md-100 h-35px h-md-40px px-4" data-bs-toggle="tooltip" data-bs-placement="top" title="Try Preemium">
										<i class="ki-outline ki-crown-2 fs-4"></i>
										<span class="d-none d-md-inline ms-2">Try Premium</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
					@if (empty($hideSidebar))
					<div id="kt_app_sidebar" class="app-sidebar" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle" style="width: auto !important">
						<div class="app-sidebar-secondary">
							@include('partials.sidebar-public')
						</div>
					</div>
					@endif
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<div class="d-flex flex-column flex-column-fluid">
							<div id="kt_app_toolbar" class="app-toolbar mb-5 mb-lg-0">
								<div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack flex-wrap">
									<ul class="nav nav-stretch nav-line-tabs flex-grow-1 fs-5 fw-semibold mb-10">
										<li class="nav-item">
											<a class="nav-link text-active-primary ms-0 me-5 me-lg-8 pt-2 pb-3 pt-lg-4 pb-lg-5 active" href="index.html">Overview</a>
										</li>
										<li class="nav-item">
											<a class="nav-link text-active-primary ms-0 me-5 me-lg-8 pt-2 pb-3 pt-lg-4 pb-lg-5" href="pages/user-profile/overview.html">Projects</a>
										</li>
										<li class="nav-item">
											<a class="nav-link text-active-primary ms-0 me-5 me-lg-8 pt-2 pb-3 pt-lg-4 pb-lg-5" href="pages/user-profile/campaigns.html">Campaigns</a>
										</li>
										<li class="nav-item">
											<a class="nav-link text-active-primary ms-0 me-5 me-lg-8 pt-2 pb-3 pt-lg-4 pb-lg-5" href="pages/user-profile/documents.html">Documents</a>
										</li>
										<li class="nav-item">
											<a class="nav-link text-active-primary ms-0 me-5 me-lg-8 pt-2 pb-3 pt-lg-4 pb-lg-5" href="pages/user-profile/followers.html">Followers</a>
										</li>
										<li class="nav-item">
											<a class="nav-link text-active-primary ms-0 me-5 me-lg-8 pt-2 pb-3 pt-lg-4 pb-lg-5" href="pages/user-profile/activity.html">Activity</a>
										</li>
									</ul>
								</div>
							</div>
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<div id="kt_app_content_container" class="app-container container-fluid">
									@yield('content')
								</div>
							</div>
						</div>
						<div id="kt_app_footer" class="app-footer">
							<div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
								<div class="text-gray-900 order-2 order-md-1">
									<span class="text-muted fw-semibold me-1">2026&copy;</span>
									<a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
								</div>
								<ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
									<li class="menu-item">
										<a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
									</li>
									<li class="menu-item">
										<a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
									</li>
									<li class="menu-item">
										<a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-outline ki-arrow-up"></i>
		</div>
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
		<script>
			(function () {
				var body = document.body;
				var sidebar = document.getElementById("kt_app_sidebar");
				if (!body || !sidebar) {
					return;
				}

				function applySidebarWidth() {
					if (window.innerWidth < 992) {
						return;
					}
					var width = sidebar.getBoundingClientRect().width;
					body.style.setProperty("--bs-app-sidebar-width", width + "px");
					body.style.setProperty("--bs-app-sidebar-width-actual", width + "px");
				}

				if ("ResizeObserver" in window) {
					var observer = new ResizeObserver(function () {
						applySidebarWidth();
					});
					observer.observe(sidebar);
				}

				window.addEventListener("load", applySidebarWidth);
				window.addEventListener("resize", applySidebarWidth);
				applySidebarWidth();
			})();
		</script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>