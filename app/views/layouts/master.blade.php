<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Magicmedia | Gestor de Proyectos</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="/assets/global/css/fonts.googleapis.com.css" rel="stylesheet" type="text/css"/>
<link href="/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
<link href="/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<link href="/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="/assets/global/plugins/jquery-multi-select/css/multi-select.css"/>
<link rel="stylesheet" type="text/css" href="/assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="/assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
<link href="/assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="/assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="/assets/admin/layout4/css/themes/light.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="/assets/admin/layout4/css/custom.css" rel="stylesheet" type="text/css"/>

<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>

@yield('css')

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-sidebar-closed-hide-logo ppage-sidebar-closed-hide-logo">
	<!-- BEGIN HEADER -->
	<div class="page-header navbar navbar-fixed-top">
		<!-- BEGIN HEADER INNER -->
		<div class="page-header-inner">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<a href="/">
				<img src="/assets/admin/layout4/img/logo-light.png" alt="logo" class="logo-default"/>
				</a>
				<div class="menu-toggler sidebar-toggler">
					<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
				</div>
			</div>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
			</a>
			<!-- END RESPONSIVE MENU TOGGLER -->
			<!-- BEGIN PAGE ACTIONS -->
			<!-- DOC: Remove "hide" class to enable the page header actions -->
			<div class="page-actions">
				<div class="btn-group">
					<button type="button" class="btn red-haze btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<span class="hidden-sm hidden-xs">Acciones&nbsp;</span><i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="#">
							<i class="icon-docs"></i> New Post </a>
						</li>
						<li>
							<a href="#">
							<i class="icon-tag"></i> New Comment </a>
						</li>
						<li>
							<a href="#">
							<i class="icon-share"></i> Share </a>
						</li>
						<li class="divider">
						</li>
						<li>
							<a href="#">
							<i class="icon-flag"></i> Comments <span class="badge badge-success">4</span>
							</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-users"></i> Feedbacks <span class="badge badge-danger">2</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- END PAGE ACTIONS -->
			<!-- BEGIN PAGE TOP -->
			<div class="page-top">
				<!-- BEGIN HEADER SEARCH BOX -->
				<!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
				<form class="search-form" action="/" method="post">
					<div class="input-group">
						<input type="text" class="form-control input-sm" placeholder="Search..." name="query">
						<span class="input-group-btn">
						<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
						</span>
					</div>
				</form>
				<!-- END HEADER SEARCH BOX -->
				<!-- BEGIN TOP NAVIGATION MENU -->
				<div class="top-menu">
					<ul class="nav navbar-nav pull-right">
						<li class="separator hide"></li>
						<!-- BEGIN NOTIFICATION DROPDOWN -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-bell"></i>
							<span class="badge badge-success">
							7 </span>
							</a>
							<ul class="dropdown-menu">
								<li class="external">
									<h3><span class="bold">12 pending</span> notifications</h3>
									<a href="/me/notifications">view all</a>
								</li>
								<li>
									<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
										<li>
											<a href="javascript:;">
											<span class="time">just now</span>
											<span class="details">
											<span class="label label-sm label-icon label-success">
											<i class="fa fa-plus"></i>
											</span>
											New user registered. </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="time">3 mins</span>
											<span class="details">
											<span class="label label-sm label-icon label-danger">
											<i class="fa fa-bolt"></i>
											</span>
											Server #12 overloaded. </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="time">10 mins</span>
											<span class="details">
											<span class="label label-sm label-icon label-warning">
											<i class="fa fa-bell-o"></i>
											</span>
											Server #2 not responding. </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="time">14 hrs</span>
											<span class="details">
											<span class="label label-sm label-icon label-info">
											<i class="fa fa-bullhorn"></i>
											</span>
											Application error. </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="time">2 days</span>
											<span class="details">
											<span class="label label-sm label-icon label-danger">
											<i class="fa fa-bolt"></i>
											</span>
											Database overloaded 68%. </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="time">3 days</span>
											<span class="details">
											<span class="label label-sm label-icon label-danger">
											<i class="fa fa-bolt"></i>
											</span>
											A user IP blocked. </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="time">4 days</span>
											<span class="details">
											<span class="label label-sm label-icon label-warning">
											<i class="fa fa-bell-o"></i>
											</span>
											Storage Server #4 not responding dfdfdfd. </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="time">5 days</span>
											<span class="details">
											<span class="label label-sm label-icon label-info">
											<i class="fa fa-bullhorn"></i>
											</span>
											System Error. </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="time">9 days</span>
											<span class="details">
											<span class="label label-sm label-icon label-danger">
											<i class="fa fa-bolt"></i>
											</span>
											Storage server failed. </span>
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<!-- END NOTIFICATION DROPDOWN -->
						<li class="separator hide"></li>
						<!-- BEGIN INBOX DROPDOWN -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-envelope-open"></i>
							<span class="badge badge-danger">
							4 </span>
							</a>
							<ul class="dropdown-menu">
								<li class="external">
									<h3>You have <span class="bold">7 New</span> Messages</h3>
									<a href="/me/inbox">view all</a>
								</li>
								<li>
									<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
										<li>
											<a href="/me/inbox/{{ Crypt::encrypt('1') }}">
											<span class="photo">
											<img src="/assets/admin/layout3/img/avatar2.jpg" class="img-circle" alt="">
											</span>
											<span class="subject">
											<span class="from">
											Lisa Wong </span>
											<span class="time">Just Now </span>
											</span>
											<span class="message">
											Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
											</a>
										</li>
										<li>
											<a href="/me/inbox/{{ Crypt::encrypt('2') }}">
											<span class="photo">
											<img src="/assets/admin/layout3/img/avatar3.jpg" class="img-circle" alt="">
											</span>
											<span class="subject">
											<span class="from">
											Richard Doe </span>
											<span class="time">16 mins </span>
											</span>
											<span class="message">
											Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
											</a>
										</li>
										<li>
											<a href="/me/inbox/{{ Crypt::encrypt('3') }}">
											<span class="photo">
											<img src="/assets/admin/layout3/img/avatar1.jpg" class="img-circle" alt="">
											</span>
											<span class="subject">
											<span class="from">
											Bob Nilson </span>
											<span class="time">2 hrs </span>
											</span>
											<span class="message">
											Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
											</a>
										</li>
										<li>
											<a href="/me/inbox/{{ Crypt::encrypt('4') }}">
											<span class="photo">
											<img src="/assets/admin/layout3/img/avatar2.jpg" class="img-circle" alt="">
											</span>
											<span class="subject">
											<span class="from">
											Lisa Wong </span>
											<span class="time">40 mins </span>
											</span>
											<span class="message">
											Vivamus sed auctor 40% nibh congue nibh... </span>
											</a>
										</li>
										<li>
											<a href="/me/inbox/{{ Crypt::encrypt('5') }}">
											<span class="photo">
											<img src="/assets/admin/layout3/img/avatar3.jpg" class="img-circle" alt="">
											</span>
											<span class="subject">
											<span class="from">
											Richard Doe </span>
											<span class="time">46 mins </span>
											</span>
											<span class="message">
											Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<!-- END INBOX DROPDOWN -->
						<li class="separator hide"></li>
						<!-- BEGIN TODO DROPDOWN -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-calendar"></i>
							<span class="badge badge-primary">
							3 </span>
							</a>
							<ul class="dropdown-menu extended tasks">
								<li class="external">
									<h3>You have <span class="bold">12 pending</span> tasks</h3>
									<a href="/me/tasks">view all</a>
								</li>
								<li>
									<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
										<li>
											<a href="javascript:;">
											<span class="task">
											<span class="desc">New release v1.2 </span>
											<span class="percent">30%</span>
											</span>
											<span class="progress">
											<span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">40% Complete</span></span>
											</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="task">
											<span class="desc">Application deployment</span>
											<span class="percent">65%</span>
											</span>
											<span class="progress">
											<span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">65% Complete</span></span>
											</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="task">
											<span class="desc">Mobile app release</span>
											<span class="percent">98%</span>
											</span>
											<span class="progress">
											<span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">98% Complete</span></span>
											</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="task">
											<span class="desc">Database migration</span>
											<span class="percent">10%</span>
											</span>
											<span class="progress">
											<span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">10% Complete</span></span>
											</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="task">
											<span class="desc">Web server upgrade</span>
											<span class="percent">58%</span>
											</span>
											<span class="progress">
											<span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">58% Complete</span></span>
											</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="task">
											<span class="desc">Mobile development</span>
											<span class="percent">85%</span>
											</span>
											<span class="progress">
											<span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">85% Complete</span></span>
											</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
											<span class="task">
											<span class="desc">New UI release</span>
											<span class="percent">38%</span>
											</span>
											<span class="progress progress-striped">
											<span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">38% Complete</span></span>
											</span>
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<!-- END TODO DROPDOWN -->
						<li class="separator hide"></li>
						<!-- BEGIN LANGUAGE BAR -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<!-- <li class="dropdown dropdown-language">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<img alt="" src="/assets/global/img/flags/us.png">
							<span class="langname">
							US </span>
							<i class="fa fa-angle-down"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-default">
								<li>
									<a href="#">
									<img alt="" src="/assets/global/img/flags/es.png"> Spanish </a>
								</li>
								<li>
									<a href="#">
									<img alt="" src="/assets/global/img/flags/de.png"> German </a>
								</li>
								<li>
									<a href="#">
									<img alt="" src="/assets/global/img/flags/ru.png"> Russian </a>
								</li>
								<li>
									<a href="#">
									<img alt="" src="/assets/global/img/flags/fr.png"> French </a>
								</li>
							</ul>
						</li> -->
						<!-- END LANGUAGE BAR -->
						<li class="separator hide"></li>
						<!-- BEGIN USER LOGIN DROPDOWN -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<li class="dropdown dropdown-user">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<span class="username username-hide-on-mobile">
								{{ Auth::user()->displayname }}
								</span>
								<!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
								&nbsp;
								<img alt="" class="img-circle" src="/assets/admin/layout4/img/avatar9.jpg"/>
							</a>
							<ul class="dropdown-menu dropdown-menu-default">
								<li>
									<a href="/me">
									<i class="icon-user"></i> My Profile </a>
								</li>
								<li>
									<a href="/me/calendar">
									<i class="icon-calendar"></i> My Calendar </a>
								</li>
								<li>
									<a href="/me/inbox">
									<i class="icon-envelope-open"></i> My Inbox <span class="badge badge-danger">
									3 </span>
									</a>
								</li>
								<li>
									<a href="/me/tasks">
									<i class="icon-rocket"></i> My Tasks <span class="badge badge-success">
									7 </span>
									</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="/auth/lock">
									<i class="icon-lock"></i> Lock Screen </a>
								</li>
								<li>
									<a href="/auth/logout">
									<i class="icon-key"></i> Log Out </a>
								</li>
							</ul>
						</li>
						<!-- END USER LOGIN DROPDOWN -->
					</ul>
				</div>
				<!-- END TOP NAVIGATION MENU -->
			</div>
			<!-- END PAGE TOP -->
		</div>
		<!-- END HEADER INNER -->
	</div>
	<!-- END HEADER -->
	<div class="clearfix"></div>
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar-wrapper">
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<div class="page-sidebar navbar-collapse collapse">
				<!-- BEGIN SIDEBAR MENU -->
				<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
				<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
				<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
				<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
				<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
				<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
				<ul class="page-sidebar-menu page-sidebar-menu-hover-submenu1" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
					<li class="heading">
						<h3>GENERAL</h3>
					</li>
					<li class="tooltips {{ $module['name'] == 'dashboard' ? 'active open' : '' }}">
						<a href="/">
						<i class="icon-home"></i>
						<span class="title">Escritorio</span>
						</a>
					</li>
					<!-- BEGIN ANGULARJS LINK -->
					<li class="tooltips {{ $module['name'] == 'projects' ? 'active open' : '' }}" data-container="body" data-placement="right" data-html="true" data-original-title="Módulo de Proyectos">
						<a href="/projects">
						<i class="icon-paper-plane"></i>
						<span class="title">
						Proyectos </span>
						</a>
					</li>
					<li class="tooltips {{ $module['name'] == 'stock' ? 'active open' : '' }}" data-container="body" data-placement="right" data-html="true" data-original-title="Módulo de Stock">
						<a href="/stock">
						<i class="icon-puzzle"></i>
						<span class="title">
						Stock </span>
						</a>
					</li>
					<li class="tooltips {{ $module['name'] == 'clients' ? 'active open' : '' }}" data-container="body" data-placement="right" data-html="true" data-original-title="Módulo de Clientes">
						<a href="/clients">
						<i class="icon-user"></i>
						<span class="title">
						Clientes </span>
						</a>
					</li>
					<li class="tooltips {{ $module['name'] == 'providers' ? 'active open' : '' }}" data-container="body" data-placement="right" data-html="true" data-original-title="Módulo de Proveedores">
						<a href="/providers">
						<i class="icon-briefcase"></i>
						<span class="title">
						Proveedores </span>
						</a>
					</li>
					<li class="tooltips {{ $module['name'] == 'sells' ? 'active open' : '' }}" data-container="body" data-placement="right" data-html="true" data-original-title="Módulo de Ventas">
						<a href="/sells">
						<i class="icon-basket-loaded"></i>
						<span class="title">
						Ventas </span>
						</a>
					</li>
					<li class="tooltips {{ $module['name'] == 'reports' ? 'active open' : '' }}" data-container="body" data-placement="right" data-html="true" data-original-title="Módulo de Reportes">
						<a href="/reports">
						<i class="icon-bar-chart"></i>
						<span class="title">
						Reportes </span>
						</a>
					</li>
					<li class="tooltips {{ $module['name'] == 'users' || $module['name'] == 'roles' || $module['name'] == 'capabilities' ? 'active open' : '' }}" data-container="body" data-placement="right" data-html="true" data-original-title="Módulo de Usuario, Roles y Capacidades">
						<a href="/users">
						<i class="icon-users"></i>
						<span class="title">
						Usuarios </span>
						<span class="arrow"></span>
						</a>
						<ul class="sub-menu">
							<li class="{{ $module['name'] == 'users' ? 'active' : '' }}">
								<a href="/users">
								<i class="icon-list"></i>
								Todos</a>
							</li>
							<li class="{{ $module['name'] == 'roles' ? 'active' : '' }}">
								<a href="/roles">
								<i class="icon-lock"></i>
								Roles</a>
							</li>
							<li class="{{ $module['name'] == 'capabilities' ? 'active' : '' }}">
								<a href="/capabilities">
								<i class="icon-key"></i>
								Capacidades</a>
							</li>
						</ul>
					</li>
					<!-- END ANGULARJS LINK -->
					<!--
					<li>
						<a href="javascript:;">
						<i class="icon-basket"></i>
						<span class="title">eCommerce</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="index_extended.html">
								<i class="icon-home"></i>
								Dashboard</a>
							</li>
							<li>
								<a href="index_extended.html">
								<i class="icon-basket"></i>
								Orders</a>
							</li>
							<li>
								<a href="index_extended.html">
								<i class="icon-tag"></i>
								Order View</a>
							</li>
							<li>
								<a href="index_extended.html">
								<i class="icon-handbag"></i>
								Products</a>
							</li>
							<li>
								<a href="index_extended.html">
								<i class="icon-pencil"></i>
								Product Edit</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-rocket"></i>
						<span class="title">Page Layouts</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="index_extended.html">
								<span class="badge badge-roundless badge-danger">new</span>Layout with Fontawesome Icons</a>
							</li>
							<li>
								<a href="index_extended.html">
								Layout with Glyphicon</a>
							</li>
							<li>
								<a href="index_extended.html">
								<span class="badge badge-roundless badge-warning">new</span>Full Height Content</a>
							</li>
							<li>
								<a href="index_extended.html">
								<span class="badge badge-roundless badge-warning">new</span>Right Sidebar Page</a>
							</li>
							<li>
								<a href="index_extended.html">
								Sidebar Fixed Page</a>
							</li>
							<li>
								<a href="index_extended.html">
								Sidebar Closed Page</a>
							</li>
							<li>
								<a href="index_extended.html">
								Content Loading via Ajax</a>
							</li>
							<li>
								<a href="index_extended.html">
								Disabled Menu Links</a>
							</li>
							<li>
								<a href="index_extended.html">
								Blank Page</a>
							</li>
							<li>
								<a href="index_extended.html">
								Fluid Page</a>
							</li>
							<li>
								<a href="index_extended.html">
								Language Switch Bar</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-diamond"></i>
						<span class="title">UI Features</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="ui_general.html">
								General Components</a>
							</li>
							<li>
								<a href="ui_buttons.html">
								Buttons</a>
							</li>
							<li>
								<a href="ui_confirmations.html">
								Popover Confirmations</a>
							</li>
							<li>
								<a href="ui_icons.html">
								<span class="badge badge-roundless badge-danger">new</span>Font Icons</a>
							</li>
							<li>
								<a href="ui_colors.html">
								Flat UI Colors</a>
							</li>
							<li>
								<a href="ui_typography.html">
								Typography</a>
							</li>
							<li>
								<a href="ui_tabs_accordions_navs.html">
								Tabs, Accordions & Navs</a>
							</li>
							<li>
								<a href="ui_tree.html">
								<span class="badge badge-roundless badge-danger">new</span>Tree View</a>
							</li>
							<li>
								<a href="ui_page_progress_style_1.html">
								<span class="badge badge-roundless badge-warning">new</span>Page Progress Bar</a>
							</li>
							<li>
								<a href="ui_blockui.html">
								Block UI</a>
							</li>
							<li>
								<a href="ui_notific8.html">
								Notific8 Notifications</a>
							</li>
							<li>
								<a href="ui_toastr.html">
								Toastr Notifications</a>
							</li>
							<li>
								<a href="ui_alert_dialog_api.html">
								<span class="badge badge-roundless badge-danger">new</span>Alerts & Dialogs API</a>
							</li>
							<li>
								<a href="ui_session_timeout.html">
								Session Timeout</a>
							</li>
							<li>
								<a href="ui_idle_timeout.html">
								User Idle Timeout</a>
							</li>
							<li>
								<a href="ui_modals.html">
								Modals</a>
							</li>
							<li>
								<a href="ui_extended_modals.html">
								Extended Modals</a>
							</li>
							<li>
								<a href="ui_tiles.html">
								Tiles</a>
							</li>
							<li>
								<a href="ui_datepaginator.html">
								<span class="badge badge-roundless badge-success">new</span>Date Paginator</a>
							</li>
							<li>
								<a href="ui_nestable.html">
								Nestable List</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-folder"></i>
						<span class="title">Multi Level Menu</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="javascript:;">
								<i class="icon-settings"></i> Item 1 <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="javascript:;">
										<i class="icon-user"></i>
										Sample Link 1 <span class="arrow"></span>
										</a>
										<ul class="sub-menu">
											<li>
												<a href="#"><i class="icon-power"></i> Sample Link 1</a>
											</li>
											<li>
												<a href="#"><i class="icon-paper-plane"></i> Sample Link 1</a>
											</li>
											<li>
												<a href="#"><i class="icon-star"></i> Sample Link 1</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="#"><i class="icon-camera"></i> Sample Link 1</a>
									</li>
									<li>
										<a href="#"><i class="icon-link"></i> Sample Link 2</a>
									</li>
									<li>
										<a href="#"><i class="icon-pointer"></i> Sample Link 3</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="javascript:;">
								<i class="icon-globe"></i> Item 2 <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="#"><i class="icon-tag"></i> Sample Link 1</a>
									</li>
									<li>
										<a href="#"><i class="icon-pencil"></i> Sample Link 1</a>
									</li>
									<li>
										<a href="#"><i class="icon-graph"></i> Sample Link 1</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#">
								<i class="icon-bar-chart"></i>
								Item 3 </a>
							</li>
						</ul>
					</li>
					<li class="heading">
						<h3>MORE FEATURES</h3>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-settings"></i>
						<span class="title">Form Stuff</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="index_extended.html">
								Form Controls</a>
							</li>
							<li>
								<a href="index_extended.html">
								iCheck Controls</a>
							</li>
							<li>
								<a href="index_extended.html">
								Form Layouts</a>
							</li>
							<li>
								<a href="index_extended.html">
								<span class="badge badge-roundless badge-warning">new</span>Form X-editable</a>
							</li>
							<li>
								<a href="index_extended.html">
								Form Wizard</a>
							</li>
							<li>
								<a href="index_extended.html">
								Form Validation</a>
							</li>
							<li>
								<a href="index_extended.html">
								<span class="badge badge-roundless badge-danger">new</span>Image Cropping</a>
							</li>
							<li>
								<a href="index_extended.html">
								Multiple File Upload</a>
							</li>
							<li>
								<a href="index_extended.html">
								Dropzone File Upload</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-briefcase"></i>
						<span class="title">Data Tables</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="index_extended.html">
								Basic Datatables</a>
							</li>
							<li>
								<a href="index_extended.html">
								Responsive Datatables</a>
							</li>
							<li>
								<a href="index_extended.html">
								Managed Datatables</a>
							</li>
							<li>
								<a href="index_extended.html">
								Editable Datatables</a>
							</li>
							<li>
								<a href="index_extended.html">
								Advanced Datatables</a>
							</li>
							<li>
								<a href="index_extended.html">
								Ajax Datatables</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-present"></i>
						<span class="title">Extra</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="index_extended.html">
								About Us</a>
							</li>
							<li>
								<a href="index_extended.html">
								Contact Us</a>
							</li>
							<li>
								<a href="index_extended.html">
								Search Results</a>
							</li>
							<li>
								<a href="index_extended.html">
								Pricing Tables</a>
							</li>
							<li>
								<a href="index_extended.html">
								404 Page Option 1</a>
							</li>
							<li>
								<a href="index_extended.html">
								404 Page Option 2</a>
							</li>
							<li>
								<a href="index_extended.html">
								404 Page Option 3</a>
							</li>
							<li>
								<a href="index_extended.html">
								500 Page Option 1</a>
							</li>
							<li>
								<a href="index_extended.html">
								500 Page Option 2</a>
							</li>
						</ul>
					</li>
					-->
				</ul>
				<!-- END SIDEBAR MENU -->
			</div>
		</div>
		<!-- END SIDEBAR -->
		<!-- BEGIN CONTENT -->

		@yield('content')

		<!-- END CONTENT -->
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="page-footer">
		<div class="page-footer-inner">
			2014 © Magicmedia Inc. Todos los Derechos Reservados.
		</div>
		<div class="scroll-to-top">
			<i class="icon-arrow-up"></i>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	<!--[if lt IE 9]>
	<script src="/assets/global/plugins/respond.min.js"></script>
	<script src="/assets/global/plugins/excanvas.min.js"></script> 
	<![endif]-->
	<script src="/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	
	<script type="text/javascript" src="/assets/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/select2/select2.min.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
	<script src="/assets/admin/pages/scripts/components-dropdowns.js"></script>

	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
	<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
	<script src="/assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
	<script src="/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="/assets/global/scripts/metronic.js" type="text/javascript"></script>
	<script src="/assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
	<script src="/assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
	<script src="/assets/admin/pages/scripts/index3.js" type="text/javascript"></script>
	<script src="/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
	<!-- BEGIN PAGE DATATABLES SCRIPTS -->
	<script type="text/javascript" src="/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
	<!-- END PAGE DATATABLES SCRIPTS -->
	<script type="text/javascript" src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
	<!-- END JAVASCRIPTS -->

	@yield('javascripts')

</body>
<!-- END BODY -->
</html>