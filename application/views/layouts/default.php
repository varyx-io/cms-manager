<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<title> SmartAdmin </title>
		<meta name="description" content="">
		<meta name="author" content="">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- #CSS Links -->
		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('ux/css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('ux/css/font-awesome.min.css'); ?>">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('ux/css/smartadmin-production-plugins.min.css'); ?>">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('ux/css/smartadmin-production.min.css'); ?>">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('ux/css/smartadmin-skins.min.css'); ?>">

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('ux/css/your_style.css'); ?>"> -->

		<!-- #FAVICONS -->
		<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">

		<!-- #GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- #APP SCREEN / ICONS -->
		<!-- Specifying a Webpage Icon for Web Clip 
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">

	</head>

	<!--

	TABLE OF CONTENTS.
	
	Use search to find needed section.
	
	===================================================================
	
	|  01. #CSS Links                |  all CSS links and file paths  |
	|  02. #FAVICONS                 |  Favicon links and file paths  |
	|  03. #GOOGLE FONT              |  Google font link              |
	|  04. #APP SCREEN / ICONS       |  app icons, screen backdrops   |
	|  05. #BODY                     |  body tag                      |
	|  06. #HEADER                   |  header tag                    |
	|  07. #PROJECTS                 |  project lists                 |
	|  08. #TOGGLE LAYOUT BUTTONS    |  layout buttons and actions    |
	|  09. #MOBILE                   |  mobile view dropdown          |
	|  10. #SEARCH                   |  search field                  |
	|  11. #NAVIGATION               |  left panel & navigation       |
	|  12. #MAIN PANEL               |  main panel                    |
	|  13. #MAIN CONTENT             |  content holder                |
	|  14. #PAGE FOOTER              |  page footer                   |
	|  15. #SHORTCUT AREA            |  dropdown shortcuts area       |
	|  16. #PLUGINS                  |  all scripts and plugins       |
	
	===================================================================
	
	-->
	
	<!-- #BODY -->
	<!-- Possible Classes

		* 'smart-style-{SKIN#}'
		* 'smart-rtl'         - Switch theme mode to RTL
		* 'menu-on-top'       - Switch to top navigation (no DOM change required)
		* 'no-menu'			  - Hides the menu completely
		* 'hidden-menu'       - Hides the main menu but still accessable by hovering over left edge
		* 'fixed-header'      - Fixes the header
		* 'fixed-navigation'  - Fixes the main menu
		* 'fixed-ribbon'      - Fixes breadcrumb
		* 'fixed-page-footer' - Fixes footer
		* 'container'         - boxed layout mode (non-responsive: will not work with fixed-navigation & fixed-ribbon)
	-->
	<body class="">

		<!-- #HEADER -->
		<header id="header">
			<div id="logo-group">

				<!-- PLACE YOUR LOGO HERE -->
				<span id="logo"> <img src="<?php echo base_url('ux/assets/images/logos/varyx-logo.png'); ?>" alt="SmartAdmin"> </span>
				<!-- END LOGO PLACEHOLDER -->

				<!-- Note: The activity badge color changes when clicked and resets the number to 0
				Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->
				<span id="activity" class="activity-dropdown"> <i class="fa fa-user"></i> <b class="badge"> 21 </b> </span>

				<!-- AJAX-DROPDOWN : control this dropdown height, look and feel from the LESS variable file -->
				<div class="ajax-dropdown">

					<!-- the ID links are fetched via AJAX to the ajax container "ajax-notifications" -->
					<div class="btn-group btn-group-justified" data-toggle="buttons">
						<label class="btn btn-default">
							<input type="radio" name="activity" id="ajax/notify/mail.html">
							Msgs (14) </label>
						<label class="btn btn-default">
							<input type="radio" name="activity" id="ajax/notify/notifications.html">
							notify (3) </label>
						<label class="btn btn-default">
							<input type="radio" name="activity" id="ajax/notify/tasks.html">
							Tasks (4) </label>
					</div>

					<!-- notification content -->
					<div class="ajax-notifications custom-scroll">

						<div class="alert alert-transparent">
							<h4>Click a button to show messages here</h4>
							This blank page message helps protect your privacy, or you can show the first message here automatically.
						</div>

						<i class="fa fa-lock fa-4x fa-border"></i>

					</div>
					<!-- end notification content -->

					<!-- footer: refresh area -->
					<span> Last updated on: 12/12/2013 9:43AM
						<button type="button" data-loading-text="<i class='fa fa-refresh fa-spin'></i> Loading..." class="btn btn-xs btn-default pull-right">
							<i class="fa fa-refresh"></i>
						</button> 
					</span>
					<!-- end footer -->

				</div>
				<!-- END AJAX-DROPDOWN -->
			</div>

			<!-- projects dropdown -->
			<div class="project-context hidden-xs">

				<span class="label">Projects:</span>
				<span class="project-selector dropdown-toggle" data-toggle="dropdown">Recent projects <i class="fa fa-angle-down"></i></span>

				<!-- Suggestion: populate this list with fetch and push technique -->
				<ul class="dropdown-menu">
					<li>
						<a href="javascript:void(0);">Online e-merchant management system - attaching integration with the iOS</a>
					</li>
					<li>
						<a href="javascript:void(0);">Notes on pipeline upgradee</a>
					</li>
					<li>
						<a href="javascript:void(0);">Assesment Report for merchant account</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="javascript:void(0);"><i class="fa fa-power-off"></i> Clear</a>
					</li>
				</ul>
				<!-- end dropdown-menu-->

			</div>
			<!-- end projects dropdown -->

			<!-- pulled right: nav area -->
			<div class="pull-right">
				
				<!-- collapse menu button -->
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>
				<!-- end collapse menu -->
				
				<!-- #MOBILE -->
				<!-- Top menu profile link : this shows only when top menu is active -->
				<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
					<li class="">
						<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
							<img src="img/avatars/sunny.png" alt="John Doe" class="online" />  
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="<?php echo site_url('logout'); ?>" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
							</li>
						</ul>
					</li>
				</ul>

				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span> <a href="<?php echo site_url('logout'); ?>" title="Sign Out" data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i class="fa fa-sign-out"></i></a> </span>
				</div>
				<!-- end logout button -->

				<!-- search mobile button (this is hidden till mobile view port) -->
				<div id="search-mobile" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
				</div>
				<!-- end search mobile button -->

				<!-- input: search field -->
				<form action="search.html" class="header-search pull-right">
					<input id="search-fld"  type="text" name="param" placeholder="Find reports and more" data-autocomplete='[
					"ActionScript",
					"AppleScript",
					"Asp",
					"BASIC",
					"C",
					"C++",
					"Clojure",
					"COBOL",
					"ColdFusion",
					"Erlang",
					"Fortran",
					"Groovy",
					"Haskell",
					"Java",
					"JavaScript",
					"Lisp",
					"Perl",
					"PHP",
					"Python",
					"Ruby",
					"Scala",
					"Scheme"]'>
					<button type="submit">
						<i class="fa fa-search"></i>
					</button>
					<a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
				</form>
				<!-- end input: search field -->

				<!-- fullscreen button -->
				<div id="fullscreen" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
				</div>
				<!-- end fullscreen button -->
				
				<!-- multiple lang dropdown : find all flags in the flags page -->
				<ul class="header-dropdown-list hidden-xs">
					<li>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="img/blank.gif" class="flag flag-us" alt="United States"> <span> English (US) </span> <i class="fa fa-angle-down"></i> </a>
						<ul class="dropdown-menu pull-right">
							<li class="active">
								<a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-us" alt="United States"> English (US)</a>
							</li>
							<li>
								<a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-fr" alt="France"> Français</a>
							</li>
							<li>
								<a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-es" alt="Spanish"> Español</a>
							</li>
							<li>
								<a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-de" alt="German"> Deutsch</a>
							</li>
							<li>
								<a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-jp" alt="Japan"> 日本語</a>
							</li>
							<li>
								<a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-cn" alt="China"> 中文</a>
							</li>	
							<li>
								<a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-it" alt="Italy"> Italiano</a>
							</li>	
							<li>
								<a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-pt" alt="Portugal"> Portugal</a>
							</li>
							<li>
								<a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-ru" alt="Russia"> Русский язык</a>
							</li>
							<li>
								<a href="javascript:void(0);"><img src="img/blank.gif" class="flag flag-kr" alt="Korea"> 한국어</a>
							</li>						
							
						</ul>
					</li>
				</ul>
				<!-- end multiple lang -->

			</div>
			<!-- end pulled right: nav area -->

		</header>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel">

			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
					
					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<img src="img/avatars/sunny.png" alt="me" class="online" /> 
						<span>
							<?php echo $this->session->user_data['handle']; ?> 
						</span>
						<i class="fa fa-angle-down"></i>
					</a> 
					
				</span>
			</div>
			<!-- end user info -->

			<!-- NAVIGATION : This navigation is also responsive-->
			<nav>
				<!-- 
				NOTE: Notice the gaps after each icon usage <i></i>..
				Please note that these links work a bit different than
				traditional href="" links. See documentation for details.
				-->

				<ul>
					<li<?php if($active == 'dashboard'): ?> class="active"<?php endif; ?>>
						<a href="<?php echo site_url('dashboard'); ?>" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
					</li>
					<li class="top-menu-invisible">
						<a href="#"><i class="fa fa-lg fa-fw fa-cube txt-color-blue"></i> <span class="menu-item-parent">SmartAdmin Intel</span></a>
						<ul>
							<li class="">
								<a href="layouts.html" title="Dashboard"><i class="fa fa-lg fa-fw fa-gear"></i> <span class="menu-item-parent">App Layouts</span></a>
							</li>
							<li class="">
								<a href="skins.html" title="Dashboard"><i class="fa fa-lg fa-fw fa-picture-o"></i> <span class="menu-item-parent">Prebuilt Skins</span></a>
							</li>
							<li>
								<a href="applayout.html"><i class="fa fa-cube"></i> App Settings</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="inbox.html"><i class="fa fa-lg fa-fw fa-inbox"></i> <span class="menu-item-parent">Outlook</span> <span class="badge pull-right inbox-badge margin-right-13">14</span></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Graphs</span></a>
						<ul>
							<li>
								<a href="flot.html">Flot Chart</a>
							</li>
							<li>
								<a href="morris.html">Morris Charts</a>
							</li>
							<li>
								<a href="sparkline-charts.html">Sparklines</a>
							</li>
							<li>
								<a href="easypie-charts.html">EasyPieCharts</a>
							</li>
							<li>
								<a href="dygraphs.html">Dygraphs</a>
							</li>
							<li>
								<a href="chartjs.html">Chart.js</a>
							</li>
							<li>
								<a href="hchartable.html">HighchartTable <span class="badge pull-right inbox-badge bg-color-yellow">new</span></a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-table"></i> <span class="menu-item-parent">Tables</span></a>
						<ul>
							<li>
								<a href="table.html">Normal Tables</a>
							</li>
							<li>
								<a href="datatables.html">Data Tables <span class="badge inbox-badge bg-color-greenLight hidden-mobile">responsive</span></a>
							</li>
							<li>
								<a href="jqgrid.html">Jquery Grid</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span class="menu-item-parent">Forms</span></a>
						<ul>
							<li>
								<a href="form-elements.html">Smart Form Elements</a>
							</li>
							<li>
								<a href="form-templates.html">Smart Form Layouts</a>
							</li>
							<li>
								<a href="validation.html">Smart Form Validation</a>
							</li>
							<li>
								<a href="bootstrap-forms.html">Bootstrap Form Elements</a>
							</li>
							<li>
								<a href="bootstrap-validator.html">Bootstrap Form Validation</a>
							</li>
							<li>
								<a href="plugins.html">Form Plugins</a>
							</li>
							<li>
								<a href="wizard.html">Wizards</a>
							</li>
							<li>
								<a href="other-editors.html">Bootstrap Editors</a>
							</li>
							<li>
								<a href="dropzone.html">Dropzone</a>
							</li>
							<li>
								<a href="image-editor.html">Image Cropping</a>
							</li>
							<li>
								<a href="ckeditor.html">CK Editor</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-desktop"></i> <span class="menu-item-parent">UI Elements</span></a>
						<ul>
							<li>
								<a href="general-elements.html">General Elements</a>
							</li>
							<li>
								<a href="buttons.html">Buttons</a>
							</li>
							<li>
								<a href="#">Icons</a>
								<ul>
									<li>
										<a href="fa.html"><i class="fa fa-plane"></i> Font Awesome</a>
									</li>
									<li>
										<a href="glyph.html"><i class="glyphicon glyphicon-plane"></i> Glyph Icons</a>
									</li>
									<li>
										<a href="flags.html"><i class="fa fa-flag"></i> Flags</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="grid.html">Grid</a>
							</li>
							<li>
								<a href="treeview.html">Tree View</a>
							</li>
							<li>
								<a href="nestable-list.html">Nestable Lists</a>
							</li>
							<li>
								<a href="jqui.html">JQuery UI</a>
							</li>
							<li>
								<a href="typography.html">Typography</a>
							</li>
							<li>
								<a href="#">Six Level Menu</a>
								<ul>
									<li>
										<a href="#"><i class="fa fa-fw fa-folder-open"></i> Item #2</a>
										<ul>
											<li>
												<a href="#"><i class="fa fa-fw fa-folder-open"></i> Sub #2.1 </a>
												<ul>
													<li>
														<a href="#"><i class="fa fa-fw fa-file-text"></i> Item #2.1.1</a>
													</li>
													<li>
														<a href="#"><i class="fa fa-fw fa-plus"></i> Expand</a>
														<ul>
															<li>
																<a href="#"><i class="fa fa-fw fa-file-text"></i> File</a>
															</li>
														</ul>
													</li>
												</ul>
											</li>
										</ul>
									</li>
									<li>
										<a href="#"><i class="fa fa-fw fa-folder-open"></i> Item #3</a>
		
										<ul>
											<li>
												<a href="#"><i class="fa fa-fw fa-folder-open"></i> 3ed Level </a>
												<ul>
													<li>
														<a href="#"><i class="fa fa-fw fa-file-text"></i> File</a>
													</li>
													<li>
														<a href="#"><i class="fa fa-fw fa-file-text"></i> File</a>
													</li>
												</ul>
											</li>
										</ul>	
									</li>
									<li>
										<a href="#" class="inactive"><i class="fa fa-fw fa-folder-open"></i> Item #4 (disabled)</a>
									</li>	
									
								</ul>
							</li>
						</ul>
					</li>	
					<li>
						<a href="widgets.html"><i class="fa fa-lg fa-fw fa-list-alt"></i> <span class="menu-item-parent">Widgets</span></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-cloud"><em>3</em></i> <span class="menu-item-parent">Cool Features!</span></a>
						<ul>
							<li>
								<a href="calendar.html"><i class="fa fa-lg fa-fw fa-calendar"></i> <span class="menu-item-parent">Calendar</span></a>
							</li>
							<li>
								<a href="gmap-xml.html"><i class="fa fa-lg fa-fw fa-map-marker"></i> <span class="menu-item-parent">GMap Skins</span><span class="badge bg-color-greenLight pull-right inbox-badge">9</span></a>
							</li>
						</ul>
					</li>	
					<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-puzzle-piece"></i> <span class="menu-item-parent">App Views</span></a>
						<ul>
							<li>
								<a href="projects.html"><i class="fa fa-file-text-o"></i> Projects</a>
							</li>	
							<li>
								<a href="blog.html"><i class="fa fa-paragraph"></i> Blog</a>
							</li>
							<li>
								<a href="gallery.html"><i class="fa fa-picture-o"></i> Gallery</a>
							</li>
							<li>
								<a href="#"><i class="fa fa-comments"></i> Forum Layout</a>
								<ul>
									<li><a href="forum.html">General View</a></li>
									<li><a href="forum-topic.html">Topic View</a></li>
									<li><a href="forum-post.html">Post View</a></li>
								</ul>
							</li>
							<li>
								<a href="profile.html"><i class="fa fa-group"></i> Profile</a>
							</li>
							<li>
								<a href="timeline.html"><i class="fa fa-clock-o"></i> Timeline</a>
							</li>
							<li>
								<a href="search.html"><i class="fa fa-search"></i>  Search Page</a>
							</li>
						</ul>		
					</li>
					<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-shopping-cart"></i> <span class="menu-item-parent">E-Commerce</span></a>
						<ul>
							<li><a href="orders.html">Orders</a></li>
							<li><a href="products-view.html">Products View</a></li>
							<li><a href="products-detail.html">Products Detail</a></li>
						</ul>
					</li>	
					<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-windows"></i> <span class="menu-item-parent">Miscellaneous</span></a>
						<ul>
							<li>
								<a href="../Landing_Page/" target="_blank">Landing Page <i class="fa fa-external-link"></i></a>
							</li>
							<li>
								<a href="pricing-table.html">Pricing Tables</a>
							</li>
							<li>
								<a href="invoice.html">Invoice</a>
							</li>
							<li>
								<a href="login.html" target="_top">Login</a>
							</li>
							<li>
								<a href="register.html" target="_top">Register</a>
							</li>
							<li>
								<a href="forgotpassword.html" target="_top">Forgot Password</a>
							</li>
							<li>
								<a href="lock.html" target="_top">Locked Screen</a>
							</li>
							<li>
								<a href="error404.html">Error 404</a>
							</li>
							<li>
								<a href="error500.html">Error 500</a>
							</li>
							<li>
								<a href="blank_.html">Blank Page</a>
							</li>
						</ul>
					</li>
					<li class="chat-users top-menu-invisible">
						<a href="#"><i class="fa fa-lg fa-fw fa-comment-o"><em class="bg-color-pink flash animated">!</em></i> <span class="menu-item-parent">Smart Chat API <sup>beta</sup></span></a>
						<ul>
							<li>
								<!-- DISPLAY USERS -->
								<div class="display-users">

									<input class="form-control chat-user-filter" placeholder="Filter" type="text">
									
								  	<a href="#" class="usr" 
									  	data-chat-id="cha1" 
									  	data-chat-fname="Sadi" 
									  	data-chat-lname="Orlaf" 
									  	data-chat-status="busy" 
									  	data-chat-alertmsg="Sadi Orlaf is in a meeting. Please do not disturb!" 
									  	data-chat-alertshow="true" 
									  	data-rel="popover-hover" 
									  	data-placement="right" 
									  	data-html="true" 
									  	data-content="
											<div class='usr-card'>
												<img src='img/avatars/5.png' alt='Sadi Orlaf'>
												<div class='usr-card-content'>
													<h3>Sadi Orlaf</h3>
													<p>Marketing Executive</p>
												</div>
											</div>
										"> 
									  	<i></i>Sadi Orlaf
								  	</a>
								  
									<a href="#" class="usr" 
										data-chat-id="cha2" 
									  	data-chat-fname="Jessica" 
									  	data-chat-lname="Dolof" 
									  	data-chat-status="online" 
									  	data-chat-alertmsg="" 
									  	data-chat-alertshow="false" 
									  	data-rel="popover-hover" 
									  	data-placement="right" 
									  	data-html="true" 
									  	data-content="
											<div class='usr-card'>
												<img src='img/avatars/1.png' alt='Jessica Dolof'>
												<div class='usr-card-content'>
													<h3>Jessica Dolof</h3>
													<p>Sales Administrator</p>
												</div>
											</div>
										"> 
									  	<i></i>Jessica Dolof
									</a>
								  
									<a href="#" class="usr" 
									  	data-chat-id="cha3" 
									  	data-chat-fname="Zekarburg" 
									  	data-chat-lname="Almandalie" 
									  	data-chat-status="online" 
									  	data-rel="popover-hover" 
									  	data-placement="right" 
									  	data-html="true" 
									  	data-content="
											<div class='usr-card'>
												<img src='img/avatars/3.png' alt='Zekarburg Almandalie'>
												<div class='usr-card-content'>
													<h3>Zekarburg Almandalie</h3>
													<p>Sales Admin</p>
												</div>
											</div>
										"> 
									  	<i></i>Zekarburg Almandalie
									</a>
								 
									<a href="#" class="usr" 
									  	data-chat-id="cha4" 
									  	data-chat-fname="Barley" 
									  	data-chat-lname="Krazurkth" 
									  	data-chat-status="away" 
									  	data-rel="popover-hover" 
									  	data-placement="right" 
									  	data-html="true" 
									  	data-content="
											<div class='usr-card'>
												<img src='img/avatars/4.png' alt='Barley Krazurkth'>
												<div class='usr-card-content'>
													<h3>Barley Krazurkth</h3>
													<p>Sales Director</p>
												</div>
											</div>
										"> 
									  	<i></i>Barley Krazurkth
									</a>
								  
									<a href="#" class="usr offline" 
									  	data-chat-id="cha5" 
									  	data-chat-fname="Farhana" 
									  	data-chat-lname="Amrin" 
									  	data-chat-status="incognito" 
									  	data-rel="popover-hover" 
									  	data-placement="right" 
									  	data-html="true" 
									  	data-content="
											<div class='usr-card'>
												<img src='img/avatars/female.png' alt='Farhana Amrin'>
												<div class='usr-card-content'>
													<h3>Farhana Amrin</h3>
													<p>Support Admin <small><i class='fa fa-music'></i> Playing Beethoven Classics</small></p>
												</div>
											</div>
										"> 
									  	<i></i>Farhana Amrin (offline)
									</a>
								  
									<a href="#" class="usr offline" 
										data-chat-id="cha6" 
									  	data-chat-fname="Lezley" 
									  	data-chat-lname="Jacob" 
									  	data-chat-status="incognito" 
									  	data-rel="popover-hover" 
									  	data-placement="right" 
									  	data-html="true" 
									  	data-content="
											<div class='usr-card'>
												<img src='img/avatars/male.png' alt='Lezley Jacob'>
												<div class='usr-card-content'>
													<h3>Lezley Jacob</h3>
													<p>Sales Director</p>
												</div>
											</div>
										"> 
									  	<i></i>Lezley Jacob (offline)
									</a>
									
									<a href="ajax/chat.html" class="btn btn-xs btn-default btn-block sa-chat-learnmore-btn">About the API</a>

								</div>
								<!-- END DISPLAY USERS -->
							</li>
						</ul>	
					</li>
				</ul>
			</nav>
			

			<span class="minifyme" data-action="minifyMenu"> 
				<i class="fa fa-arrow-circle-left hit"></i> 
			</span>

		</aside>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<span class="ribbon-button-alignment"> 
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
						<i class="fa fa-refresh"></i>
					</span> 
				</span>

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Home</li><li>Dashboard</li>
				</ol>
				<!-- end breadcrumb -->

				<!-- You can also add more buttons to the
				ribbon for further usability

				Example below:

				<span class="ribbon-button-alignment pull-right">
				<span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
				<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
				<span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
				</span> -->

			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

				
				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> <?php echo $page_title; ?> <?php if(isset($page_sub_title) && strlen($page_sub_title) > 0): echo sprintf(' <span>&GT;%s</span>',$page_sub_title); endif; ?></h1>
					</div>
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
						<ul id="sparks" class="">
							<li class="sparks-info">
								<h5> My Income <span class="txt-color-blue">$47,171</span></h5>
								<div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm">
									1300, 1877, 2500, 2577, 2000, 2100, 3000, 2700, 3631, 2471, 2700, 3631, 2471
								</div>
							</li>
							<li class="sparks-info">
								<h5> Site Traffic <span class="txt-color-purple"><i class="fa fa-arrow-circle-up"></i>&nbsp;45%</span></h5>
								<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm">
									110,150,300,130,400,240,220,310,220,300, 270, 210
								</div>
							</li>
							<li class="sparks-info">
								<h5> Site Orders <span class="txt-color-greenDark"><i class="fa fa-shopping-cart"></i>&nbsp;2447</span></h5>
								<div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm">
									110,150,300,130,400,240,220,310,220,300, 270, 210
								</div>
							</li>
						</ul>
					</div>
				</div>
				
					<?php	echo $this->alert->display(); ?>
					<?php echo $template['body']; ?>
									
			</div>
			<!-- END #MAIN CONTENT -->

		</div>
		<!-- END #MAIN PANEL -->

		<!-- #PAGE FOOTER -->
		<div class="page-footer">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<span class="txt-color-white">VarYX <span class="hidden-xs"> - Content Publishing CMP</span> © 2014-2016</span>
				</div>
			</div>
			<!-- end row -->
		</div>
		<!-- END FOOTER -->

		<!-- #SHORTCUT AREA : With large tiles (activated via clicking user name tag)
			 Note: These tiles are completely responsive, you can add as many as you like -->
		<div id="shortcut">
			<ul>
				<li>
					<a href="index.html" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Mail <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
				</li>
			</ul>
		</div>
		<!-- END SHORTCUT AREA -->

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script src="<?php echo base_url('ux/js/plugin/pace/pace.min.js'); ?>"></script>
		
		<!-- #PLUGINS -->
		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
			if (!window.jQuery) {
				document.write('<script src="js/libs/jquery-2.1.1.min.js"><\/script>');
			}
		</script>

		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');
			}
		</script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="<?php echo base_url('ux/js/app.config.js'); ?>"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="<?php echo base_url('ux/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js'); ?>"></script> 

		<!-- BOOTSTRAP JS -->
		<script src="<?php echo base_url('ux/js/bootstrap/bootstrap.min.js'); ?>"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="<?php echo base_url('ux/js/notification/SmartNotification.min.js'); ?>"></script>

		<!-- JARVIS WIDGETS -->
		<script src="<?php echo base_url('ux/js/smartwidgets/jarvis.widget.min.js'); ?>"></script>

		<!-- EASY PIE CHARTS -->
		<script src="<?php echo base_url('ux/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js'); ?>"></script>

		<!-- SPARKLINES -->
		<script src="<?php echo base_url('ux/js/plugin/sparkline/jquery.sparkline.min.js'); ?>"></script>

		<!-- JQUERY VALIDATE -->
		<script src="<?php echo base_url('ux/js/plugin/jquery-validate/jquery.validate.min.js'); ?>"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="<?php echo base_url('ux/js/plugin/masked-input/jquery.maskedinput.min.js'); ?>"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="<?php echo base_url('ux/js/plugin/select2/select2.min.js'); ?>"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="<?php echo base_url('ux/js/plugin/bootstrap-slider/bootstrap-slider.min.js'); ?>"></script>

		<!-- browser msie issue fix -->
		<script src="<?php echo base_url('ux/js/plugin/msie-fix/jquery.mb.browser.min.js'); ?>"></script>

		<!-- FastClick: For mobile devices -->
		<script src="<?php echo base_url('ux/js/plugin/fastclick/fastclick.min.js'); ?>"></script>

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- MAIN APP JS FILE -->
		<script src="<?php echo base_url('ux/js/app.min.js'); ?>"></script>

		<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
		<!-- Voice command : plugin -->
		<script src="<?php echo base_url('ux/js/speech/voicecommand.min.js'); ?>"></script>

		<!-- SmartChat UI : plugin -->
		<script src="<?php echo base_url('ux/js/smart-chat-ui/smart.chat.ui.min.js'); ?>"></script>
		<script src="<?php echo base_url('ux/js/smart-chat-ui/smart.chat.manager.min.js'); ?>"></script>
		
		<!-- PAGE RELATED PLUGIN(S) -->
		
		<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
		<script src="<?php echo base_url('ux/js/plugin/flot/jquery.flot.cust.min.js'); ?>"></script>
		<script src="<?php echo base_url('ux/js/plugin/flot/jquery.flot.resize.min.js'); ?>"></script>
		<script src="<?php echo base_url('ux/js/plugin/flot/jquery.flot.time.min.js'); ?>"></script>
		<script src="<?php echo base_url('ux/js/plugin/flot/jquery.flot.tooltip.min.js'); ?>"></script>
		
		<!-- Vector Maps Plugin: Vectormap engine, Vectormap language -->
		<script src="<?php echo base_url('ux/js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
		<script src="<?php echo base_url('ux/js/plugin/vectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
		
		<!-- Full Calendar -->
		<script src="<?php echo base_url('ux/js/plugin/moment/moment.min.js'); ?>"></script>
		<script src="<?php echo base_url('ux/js/plugin/fullcalendar/jquery.fullcalendar.min.js'); ?>"></script>

		<script>
			$(document).ready(function() {

				// DO NOT REMOVE : GLOBAL FUNCTIONS!
				pageSetUp();

				/*
				 * PAGE RELATED SCRIPTS
				 */

				$(".js-status-update a").click(function() {
					var selText = $(this).text();
					var $this = $(this);
					$this.parents('.btn-group').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
					$this.parents('.dropdown-menu').find('li').removeClass('active');
					$this.parent().addClass('active');
				});

				/*
				* TODO: add a way to add more todo's to list
				*/

				// initialize sortable
				$(function() {
					$("#sortable1, #sortable2").sortable({
						handle : '.handle',
						connectWith : ".todo",
						update : countTasks
					}).disableSelection();
				});

				// check and uncheck
				$('.todo .checkbox > input[type="checkbox"]').click(function() {
					var $this = $(this).parent().parent().parent();

					if ($(this).prop('checked')) {
						$this.addClass("complete");

						// remove this if you want to undo a check list once checked
						//$(this).attr("disabled", true);
						$(this).parent().hide();

						// once clicked - add class, copy to memory then remove and add to sortable3
						$this.slideUp(500, function() {
							$this.clone().prependTo("#sortable3").effect("highlight", {}, 800);
							$this.remove();
							countTasks();
						});
					} else {
						// insert undo code here...
					}

				})
				// count tasks
				function countTasks() {

					$('.todo-group-title').each(function() {
						var $this = $(this);
						$this.find(".num-of-tasks").text($this.next().find("li").size());
					});

				}

				/*
				* RUN PAGE GRAPHS
				*/

				/* TAB 1: UPDATING CHART */
				// For the demo we use generated data, but normally it would be coming from the server

				var data = [], totalPoints = 200, $UpdatingChartColors = $("#updating-chart").css('color');

				function getRandomData() {
					if (data.length > 0)
						data = data.slice(1);

					// do a random walk
					while (data.length < totalPoints) {
						var prev = data.length > 0 ? data[data.length - 1] : 50;
						var y = prev + Math.random() * 10 - 5;
						if (y < 0)
							y = 0;
						if (y > 100)
							y = 100;
						data.push(y);
					}

					// zip the generated y values with the x values
					var res = [];
					for (var i = 0; i < data.length; ++i)
						res.push([i, data[i]])
					return res;
				}

				// setup control widget
				var updateInterval = 1500;
				$("#updating-chart").val(updateInterval).change(function() {

					var v = $(this).val();
					if (v && !isNaN(+v)) {
						updateInterval = +v;
						$(this).val("" + updateInterval);
					}

				});

				// setup plot
				var options = {
					yaxis : {
						min : 0,
						max : 100
					},
					xaxis : {
						min : 0,
						max : 100
					},
					colors : [$UpdatingChartColors],
					series : {
						lines : {
							lineWidth : 1,
							fill : true,
							fillColor : {
								colors : [{
									opacity : 0.4
								}, {
									opacity : 0
								}]
							},
							steps : false

						}
					}
				};

				var plot = $.plot($("#updating-chart"), [getRandomData()], options);

				/* live switch */
				$('input[type="checkbox"]#start_interval').click(function() {
					if ($(this).prop('checked')) {
						$on = true;
						updateInterval = 1500;
						update();
					} else {
						clearInterval(updateInterval);
						$on = false;
					}
				});

				function update() {
					if ($on == true) {
						plot.setData([getRandomData()]);
						plot.draw();
						setTimeout(update, updateInterval);

					} else {
						clearInterval(updateInterval)
					}

				}

				var $on = false;

				/*end updating chart*/

				/* TAB 2: Social Network  */

				$(function() {
					// jQuery Flot Chart
					var twitter = [[1, 27], [2, 34], [3, 51], [4, 48], [5, 55], [6, 65], [7, 61], [8, 70], [9, 65], [10, 75], [11, 57], [12, 59], [13, 62]], facebook = [[1, 25], [2, 31], [3, 45], [4, 37], [5, 38], [6, 40], [7, 47], [8, 55], [9, 43], [10, 50], [11, 47], [12, 39], [13, 47]], data = [{
						label : "Twitter",
						data : twitter,
						lines : {
							show : true,
							lineWidth : 1,
							fill : true,
							fillColor : {
								colors : [{
									opacity : 0.1
								}, {
									opacity : 0.13
								}]
							}
						},
						points : {
							show : true
						}
					}, {
						label : "Facebook",
						data : facebook,
						lines : {
							show : true,
							lineWidth : 1,
							fill : true,
							fillColor : {
								colors : [{
									opacity : 0.1
								}, {
									opacity : 0.13
								}]
							}
						},
						points : {
							show : true
						}
					}];

					var options = {
						grid : {
							hoverable : true
						},
						colors : ["#568A89", "#3276B1"],
						tooltip : true,
						tooltipOpts : {
							//content : "Value <b>$x</b> Value <span>$y</span>",
							defaultTheme : false
						},
						xaxis : {
							ticks : [[1, "JAN"], [2, "FEB"], [3, "MAR"], [4, "APR"], [5, "MAY"], [6, "JUN"], [7, "JUL"], [8, "AUG"], [9, "SEP"], [10, "OCT"], [11, "NOV"], [12, "DEC"], [13, "JAN+1"]]
						},
						yaxes : {

						}
					};

					var plot3 = $.plot($("#statsChart"), data, options);
				});

				// END TAB 2

				// TAB THREE GRAPH //
				/* TAB 3: Revenew  */

				$(function() {

					var trgt = [[1354586000000, 153], [1364587000000, 658], [1374588000000, 198], [1384589000000, 663], [1394590000000, 801], [1404591000000, 1080], [1414592000000, 353], [1424593000000, 749], [1434594000000, 523], [1444595000000, 258], [1454596000000, 688], [1464597000000, 364]], prft = [[1354586000000, 53], [1364587000000, 65], [1374588000000, 98], [1384589000000, 83], [1394590000000, 980], [1404591000000, 808], [1414592000000, 720], [1424593000000, 674], [1434594000000, 23], [1444595000000, 79], [1454596000000, 88], [1464597000000, 36]], sgnups = [[1354586000000, 647], [1364587000000, 435], [1374588000000, 784], [1384589000000, 346], [1394590000000, 487], [1404591000000, 463], [1414592000000, 479], [1424593000000, 236], [1434594000000, 843], [1444595000000, 657], [1454596000000, 241], [1464597000000, 341]], toggles = $("#rev-toggles"), target = $("#flotcontainer");

					var data = [{
						label : "Target Profit",
						data : trgt,
						bars : {
							show : true,
							align : "center",
							barWidth : 30 * 30 * 60 * 1000 * 80
						}
					}, {
						label : "Actual Profit",
						data : prft,
						color : '#3276B1',
						lines : {
							show : true,
							lineWidth : 3
						},
						points : {
							show : true
						}
					}, {
						label : "Actual Signups",
						data : sgnups,
						color : '#71843F',
						lines : {
							show : true,
							lineWidth : 1
						},
						points : {
							show : true
						}
					}]

					var options = {
						grid : {
							hoverable : true
						},
						tooltip : true,
						tooltipOpts : {
							//content: '%x - %y',
							//dateFormat: '%b %y',
							defaultTheme : false
						},
						xaxis : {
							mode : "time"
						},
						yaxes : {
							tickFormatter : function(val, axis) {
								return "$" + val;
							},
							max : 1200
						}

					};

					plot2 = null;

					function plotNow() {
						var d = [];
						toggles.find(':checkbox').each(function() {
							if ($(this).is(':checked')) {
								d.push(data[$(this).attr("name").substr(4, 1)]);
							}
						});
						if (d.length > 0) {
							if (plot2) {
								plot2.setData(d);
								plot2.draw();
							} else {
								plot2 = $.plot(target, d, options);
							}
						}

					};

					toggles.find(':checkbox').on('change', function() {
						plotNow();
					});
					plotNow()

				});

				/*
				 * VECTOR MAP
				 */

				data_array = {
					"US" : 4977,
					"AU" : 4873,
					"IN" : 3671,
					"BR" : 2476,
					"TR" : 1476,
					"CN" : 146,
					"CA" : 134,
					"BD" : 100
				};

				$('#vector-map').vectorMap({
					map : 'world_mill_en',
					backgroundColor : '#fff',
					regionStyle : {
						initial : {
							fill : '#c4c4c4'
						},
						hover : {
							"fill-opacity" : 1
						}
					},
					series : {
						regions : [{
							values : data_array,
							scale : ['#85a8b6', '#4d7686'],
							normalizeFunction : 'polynomial'
						}]
					},
					onRegionLabelShow : function(e, el, code) {
						if ( typeof data_array[code] == 'undefined') {
							e.preventDefault();
						} else {
							var countrylbl = data_array[code];
							el.html(el.html() + ': ' + countrylbl + ' visits');
						}
					}
				});

				/*
				 * FULL CALENDAR JS
				 */

				if ($("#calendar").length) {
					var date = new Date();
					var d = date.getDate();
					var m = date.getMonth();
					var y = date.getFullYear();

					var calendar = $('#calendar').fullCalendar({

						editable : true,
						draggable : true,
						selectable : false,
						selectHelper : true,
						unselectAuto : false,
						disableResizing : false,

						header : {
							left : 'title', //,today
							center : 'prev, next, today',
							right : 'month, agendaWeek, agenDay' //month, agendaDay,
						},

						select : function(start, end, allDay) {
							var title = prompt('Event Title:');
							if (title) {
								calendar.fullCalendar('renderEvent', {
									title : title,
									start : start,
									end : end,
									allDay : allDay
								}, true // make the event "stick"
								);
							}
							calendar.fullCalendar('unselect');
						},

						events : [{
							title : 'All Day Event',
							start : new Date(y, m, 1),
							description : 'long description',
							className : ["event", "bg-color-greenLight"],
							icon : 'fa-check'
						}, {
							title : 'Long Event',
							start : new Date(y, m, d - 5),
							end : new Date(y, m, d - 2),
							className : ["event", "bg-color-red"],
							icon : 'fa-lock'
						}, {
							id : 999,
							title : 'Repeating Event',
							start : new Date(y, m, d - 3, 16, 0),
							allDay : false,
							className : ["event", "bg-color-blue"],
							icon : 'fa-clock-o'
						}, {
							id : 999,
							title : 'Repeating Event',
							start : new Date(y, m, d + 4, 16, 0),
							allDay : false,
							className : ["event", "bg-color-blue"],
							icon : 'fa-clock-o'
						}, {
							title : 'Meeting',
							start : new Date(y, m, d, 10, 30),
							allDay : false,
							className : ["event", "bg-color-darken"]
						}, {
							title : 'Lunch',
							start : new Date(y, m, d, 12, 0),
							end : new Date(y, m, d, 14, 0),
							allDay : false,
							className : ["event", "bg-color-darken"]
						}, {
							title : 'Birthday Party',
							start : new Date(y, m, d + 1, 19, 0),
							end : new Date(y, m, d + 1, 22, 30),
							allDay : false,
							className : ["event", "bg-color-darken"]
						}, {
							title : 'Smartadmin Open Day',
							start : new Date(y, m, 28),
							end : new Date(y, m, 29),
							className : ["event", "bg-color-darken"]
						}],

						eventRender : function(event, element, icon) {
							if (!event.description == "") {
								element.find('.fc-event-title').append("<br/><span class='ultra-light'>" + event.description + "</span>");
							}
							if (!event.icon == "") {
								element.find('.fc-event-title').append("<i class='air air-top-right fa " + event.icon + " '></i>");
							}
						}
					});

				};

				/* hide default buttons */
				$('.fc-header-right, .fc-header-center').hide();

				// calendar prev
				$('#calendar-buttons #btn-prev').click(function() {
					$('.fc-button-prev').click();
					return false;
				});

				// calendar next
				$('#calendar-buttons #btn-next').click(function() {
					$('.fc-button-next').click();
					return false;
				});

				// calendar today
				$('#calendar-buttons #btn-today').click(function() {
					$('.fc-button-today').click();
					return false;
				});

				// calendar month
				$('#mt').click(function() {
					$('#calendar').fullCalendar('changeView', 'month');
				});

				// calendar agenda week
				$('#ag').click(function() {
					$('#calendar').fullCalendar('changeView', 'agendaWeek');
				});

				// calendar agenda day
				$('#td').click(function() {
					$('#calendar').fullCalendar('changeView', 'agendaDay');
				});

				/*
				 * CHAT
				 */

				$.filter_input = $('#filter-chat-list');
				$.chat_users_container = $('#chat-container > .chat-list-body')
				$.chat_users = $('#chat-users')
				$.chat_list_btn = $('#chat-container > .chat-list-open-close');
				$.chat_body = $('#chat-body');

				/*
				* LIST FILTER (CHAT)
				*/

				// custom css expression for a case-insensitive contains()
				jQuery.expr[':'].Contains = function(a, i, m) {
					return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
				};

				function listFilter(list) {// header is any element, list is an unordered list
					// create and add the filter form to the header

					$.filter_input.change(function() {
						var filter = $(this).val();
						if (filter) {
							// this finds all links in a list that contain the input,
							// and hide the ones not containing the input while showing the ones that do
							$.chat_users.find("a:not(:Contains(" + filter + "))").parent().slideUp();
							$.chat_users.find("a:Contains(" + filter + ")").parent().slideDown();
						} else {
							$.chat_users.find("li").slideDown();
						}
						return false;
					}).keyup(function() {
						// fire the above change event after every letter
						$(this).change();

					});

				}

				// on dom ready
				listFilter($.chat_users);

				// open chat list
				$.chat_list_btn.click(function() {
					$(this).parent('#chat-container').toggleClass('open');
				})

				$.chat_body.animate({
					scrollTop : $.chat_body[0].scrollHeight
				}, 500);

			});

		</script>

		<!-- Your GOOGLE ANALYTICS CODE Below -->
		

	</body>

</html>