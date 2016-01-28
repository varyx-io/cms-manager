<!DOCTYPE html>
	<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
	<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
	<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
	<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta name="description" content="Everest Admin Panel" />
		<meta name="keywords" content="Admin, Dashboard, Bootstrap3, Sass, transform, CSS3, HTML5, Web design, UI Design, Responsive Dashboard, Responsive Admin, Admin Theme, Best Admin UI, Bootstrap Theme, Wrapbootstrap, Bootstrap" />
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="shortcut icon" href="img/favicon.ico">
		<title>Everest Admin Panel</title>

		<base href="<?php echo site_url(); ?>" />

		<!-- Bootstrap CSS -->
		<link href="<?php echo base_url('ux/css/bootstrap.css'); ?>" rel="stylesheet" media="screen">

		<!-- Animate CSS -->
		<link href="<?php echo base_url('ux/css/animate.css'); ?>" rel="stylesheet" media="screen">

		<!-- Alertify CSS -->
		<link href="<?php echo base_url('ux/css/alertify/alertify.core.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('ux/css/alertify/alertify.default.css'); ?>" rel="stylesheet">

		<!-- Main CSS -->
		<link href="<?php echo base_url('ux/css/main.css'); ?>" rel="stylesheet" media="screen">


		<!--	Add CSS -->
		<link href="<?php echo base_url('ux/css/add.css'); ?>" rel="stylesheet">

		<!-- Tokenfield CSS -->
		<link href="<?php echo base_url('ux/css/tokenfield/tokenfield-typeahead.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('ux/css/tokenfield/bootstrap-tokenfield.css'); ?>" rel="stylesheet">


		<!-- Summer Note CSS -->
		<link rel="stylesheet" href="<?php echo base_url('ux/css/summernote.css'); ?>">

		<!-- Datepicker CSS -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('ux/css/datepicker.css'); ?>">

		<!-- Font Awesome -->
		<link href="<?php echo base_url('ux/fonts/font-awesome.min.css'); ?>" rel="stylesheet">

		<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="<?php echo base_url('ux/js/html5shiv.js'); ?>"></script>
			<script src="<?php echo base_url('ux/js/respond.min.js'); ?>"></script>
		<![endif]-->
	</head>
	<body>	

		<!-- Header Start -->
		<header>

			<!-- Logo starts -->
			<div class="logo">
				<a href="#">
					<img src="<?php echo base_url('img/logo.png'); ?>" alt="logo">
					<span class="menu-toggle hidden-xs">
						<i class="fa fa-bars"></i>
					</span>
				</a>
			</div>
			<!-- Logo ends -->

			<!-- Custom Search Starts -->
			<div class="custom-search pull-left hidden-xs hidden-sm">
				<input type="text" class="search-query" placeholder="Search here">
				<i class="fa fa-search"></i>
			</div>
			<!-- Custom Search Ends -->

			<!-- Mini right nav starts -->
			<div class="pull-right">
				<ul id="mini-nav" class="clearfix">
					<li class="list-box hidden-lg hidden-md hidden-sm" id="mob-nav">
						<a href="#">
							<i class="fa fa-reorder"></i>
						</a>
					</li>
					<li class="list-box dropdown hidden-xs">
						<a id="drop7" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-image"></i>
						</a>
						<span class="info-label info-bg animated rubberBand">7+</span>
						<ul class="blog-gallery dropdown-menu fadeInDown animated clearfix recent-tweets">
							<li>
								<img src="<?php echo base_url('img/user1.jpg'); ?>" alt="User">
							</li>
							<li>
								<img src="<?php echo base_url('img/user2.jpg'); ?>" alt="User">
							</li>
							<li>
								<img src="<?php echo base_url('img/user3.jpg'); ?>" alt="User">
							</li>
							<li>
								<img src="<?php echo base_url('img/user4.jpg'); ?>" alt="User">
							</li>
							<li>
								<img src="<?php echo base_url('img/user5.jpg'); ?>" alt="User">
							</li>
							<li>
								<img src="<?php echo base_url('img/user6.jpg'); ?>" alt="User">
							</li>
							<li>
								<img src="<?php echo base_url('img/user7.jpg'); ?>" alt="User">
							</li>
							<li>
								<img src="<?php echo base_url('img/user8.jpg'); ?>" alt="User">
							</li>
							<li>
								<img src="<?php echo base_url('img/user9.jpg'); ?>" alt="User">
							</li>
							<li>
								<img src="<?php echo base_url('img/user3.jpg'); ?>" alt="User">
							</li>
						</ul>
					</li>
					<li class="list-box dropdown hidden-xs">
						<a id="drop5" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-th"></i>
						</a>
						<span class="info-label success-bg animated rubberBand">6</span>
						<ul class="dropdown-menu fadeInDown animated quick-actions">
							<li class="plain">Recently Viewed</li>
							<li>
								<a href="profile.html">
									<i class="fa fa-file-word-o text-success"></i>
									<p>Profile</p>
								</a>
							</li>
							<li>
								<a href="gallery.html">
									<i class="fa fa-image text-danger"></i>
									<p>Gallery</p>
								</a>
							</li>
							<li>
								<a href="timeline.html">
									<i class="fa fa-list-ol text-info"></i>
									<p>Timeline</p>
								</a>
							</li>
							<li>
								<a href="graphs.html">
									<i class="fa fa-map-marker text-warning"></i>
									<p>Charts</p>
								</a>
							</li>
							<li>
								<a href="editor.html">
									<i class="fa fa-pencil text-danger"></i>
									<p>Editor</p>
								</a>
							</li>
							<li>
								<a href="blog.html">
									<i class="fa fa-file-text text-success"></i>
									<p>Blog</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="list-box dropdown hidden-xs">
						<a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-bell"></i>
						</a>
						<span class="info-label danger-bg animated rubberBand">4</span>
						<ul class="dropdown-menu bounceIn animated messages">
							<li class="plain">
								Messages
							</li>
							<li>
								<div class="user-pic">
									<img src="<?php echo base_url('img/user4.jpg'); ?>" alt="User">
								</div>
								<div class="details">
									<strong class="text-danger">Wilson</strong>
									<span>Uploaded 28 new files yesterday.</span>
									<div class="progress progress-xs no-margin">
										<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
										</div>
									</div>
								</div>
							</li>
							<li>
								<div class="user-pic">
									<img src="<?php echo base_url('img/user1.jpg'); ?>" alt="User">
								</div>
								<div class="details">
									<strong class="text-danger">Adams</strong>
									<span>Got 12 new messages.</span>
									<div class="progress progress-xs no-margin">
										<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
										</div>
									</div>
								</div>
							</li>
							<li>
								<div class="user-pic">
									<img src="<?php echo base_url('img/user3.jpg'); ?>" alt="User">
								</div>
								<div class="details">
									<strong class="text-info">Sam</strong>
									<span>Uploaded new project files today.</span>
									<div class="progress progress-xs no-margin">
										<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
										</div>
									</div>
								</div>
							</li>
							<li>
								<div class="user-pic">
									<img src="<?php echo base_url('img/user5.jpg'); ?>" alt="User">
								</div>
								<div class="details">
									<strong class="text-info">Jennifer</strong>
									<span>128 new purchases last 3 hours.</span>
									<div class="progress progress-xs no-margin">
										<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
										</div>
									</div>
								</div>
							</li>
						</ul>
					</li>
					<li class="list-box user-profile hidden-xs">
						<a href="{{ url('/logout') }}" class="user-avtar animated rubberBand">
							<img src="<?php echo base_url('img/user4.jpg'); ?>" alt="user avatar">
						</a>
					</li>
				</ul>
			</div>
			<!-- Mini right nav ends -->

		</header>
		<!-- Header ends -->

		<!-- Left sidebar starts -->
		<aside id="sidebar">

			<!-- Current User Starts -->
			<div class="current-user">
				<div class="user-avatar animated rubberBand">
					<img src="<?php echo base_url('img/user4.jpg'); ?>" alt="Current User">
					<span class="busy"></span>
				</div>
				<div class="user-name">Welcome Mr. James</div>
				<ul class="user-links">
					<li>
						<a href="{{ url('/profile') }}">
							<i class="fa fa-user text-success"></i>
						</a>
					</li>
					<li>
						<a href="invoice.html">
							<i class="fa fa-file-pdf-o text-warning"></i>
						</a>
					</li>
					<li>
						<a href="components.html">
							<i class="fa fa-sliders text-info"></i>
						</a>
					</li>
					<li>
						<a href="{{ url('/logout') }}">
							<i class="fa fa-sign-out text-danger"></i>
						</a>
					</li>
				</ul>
			</div>
			<!-- Current User Ends -->

			<!-- Menu start -->
			<div id='menu'>
				<ul>
					<li class="highlight">
						<a href='index.html'>
							<i class="fa fa-desktop"></i>
							<span>Dashboard</span>
							<span class="current-page"></span>
						</a>
					</li>
					<li>
						<a href='timeline.html'>
							<i class="fa fa-sliders"></i> 
							<span>Timeline</span>
						</a>
					</li>
					<li>
						<a href='blog.html'>
							<i class="fa fa-pencil"></i> 
							<span>Blog</span>
						</a>
					</li>
					<li>
						<a href='graphs.html'>
							<i class="fa fa-flask"></i> 
							<span>Graphs</span>
						</a>
					</li>
					<li>
						<a href='calendar.html'>
							<i class="fa fa-calendar"></i> 
							<span>Calendar</span>
						</a>
					</li>
					<li>
						<a href='gallery.html'>
							<i class="fa fa-image"></i> 
							<span>Gallery</span>
						</a>
					</li>
					<li>
						<a href='maps.html'>
							<i class="fa fa-globe"></i> 
							<span>Vector Maps</span>
						</a>
					</li>
					<li class='has-sub'>
						<a href='#'>
							<i class="fa fa-flask"></i> 
							<span>Bonus Pages</span>
						</a>
						<ul>
							<li>
								<a href='invoice.html'>
									<span>Invoice</span>
								</a>
							</li>
							<li>
								<a href='profile.html'>
									<span>Profile</span>
								</a>
							</li>
							<li>
								<a href="pricing.html">
									<span>Pricing</span>
								</a>
							</li>
							<li>
								<a href='login.html'>
									<span>Login</span>
								</a>
							</li>
							<li>
								<a href='error.html'>
									<span>404</span>
								</a>
							</li>
							<li>
								<a href='basic-template.html'>
									<span>Basic Template</span>
								</a>
							</li>
						</ul>
					</li>
					<li class='has-sub'>
						<a href='#'>
							<i class="fa fa-tasks"></i>
							<span>UI Elements</span>
						</a>
						<ul>
							<li>
								<a href='buttons.html'>
									<span>Buttons</span>
								</a>
							</li>
							<li>
								<a href='panels.html'>
									<span>Panels</span>
								</a>
							</li>
							<li>
								<a href='icons.html'>
									<span>Icons</span>
								</a>
							</li>
							<li>
								<a href='grid.html'>
									<span>Grid</span>
								</a>
							</li>
							<li>
								<a href='components.html'>
									<span>Components</span>
								</a>
							</li>
							<li>
								<a href='notifications.html'>
									<span>Notifications</span>
								</a>
							</li>
						</ul>
					</li>
					<li class='has-sub'>
						<a href='#'>
							<i class="fa fa-columns"></i>
							<span>Forms</span>
						</a>
						<ul>
							<li>
								<a href='form-elements.html'>
									<span>Form Elements</span>
								</a>
							</li>
							<li>
								<a href='form-layouts.html'>
									<span>Form Layouts</span>
								</a>
							</li>
							<li>
								<a href='editor.html'>
									<span>Editor</span>
								</a>
							</li>
						</ul>
					</li>
					<li class='has-sub'>
						<a href='#'>
							<i class="fa fa-bars"></i> 
							<span>Tables</span>
						</a>
						<ul>
							<li>
								<a href='tables.html'>
									<span>Normal Tables</span>
								</a>
							</li>
							<li>
								<a href='datatables.html'>
									<span>Data Tables</span>
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="<?php echo site_url('posts'); ?>">
							<i class="fa fa-bars"></i> 
							<span>Posts</span>
						</a>
					</li>
				</ul>
			</div>
			<!-- Menu End -->

			<!-- Freebies Starts -->
			<div class="freebies">

				<!-- Sidebar Extras -->      
				<div class="sidebar-addons">
					<ul class="views">
						<li>
							<i class="fa fa-circle-o text-success"></i>
							<div class="details">
								<p>Signups</p>
							</div>
							<span class="label label-success">8</span>
						</li>
						<li>
							<i class="fa fa-circle-o text-info"></i>
							<div class="details">
								<p>Users Online</p>
							</div>
							<span class="label label-info">7</span>
						</li> 
						<li>
							<i class="fa fa-circle-o text-danger"></i>
							<div class="details">
								<p>Images Uploaded</p>
							</div>
							<span class="label label-danger">4</span>
						</li>         
					</ul>
				</div>

			</div>
			<!-- Freebies Starts -->

		</aside>
		<!-- Left sidebar ends -->

		<!-- Dashboard Wrapper starts -->
		<div class="dashboard-wrapper">

			<!-- Top Bar starts -->
			<div class="top-bar">
				<div class="page-title">
					Dashboard
				</div>
				<ul class="stats hidden-xs">
					<li>
						<div class="stats-block hidden-sm hidden-xs">
							<span id="downloads_graph"></span>
						</div>
						<div class="stats-details">
							<h4>$<span id="today_income">580</span> <i class="fa fa-chevron-up up"></i></h4>
							<h5>Today's Income</h5>
						</div>
					</li>
					<li>
						<div class="stats-block hidden-sm hidden-xs">
							<span id="users_online_graph"></span>
						</div>
						<div class="stats-details">
							<h4>$<span id="today_expenses">235</span> <i class="fa fa-chevron-down down"></i></h4>
							<h5>Today's Expenses</h5>
						</div>
					</li>
				</ul>
			</div>
			<!-- Top Bar ends -->		
		<?php echo $template['body']; ?>

		<!-- Footer starts -->
		<footer>
			Copyright Everest Admin Panel 2014.
		</footer>
		<!-- Footer ends -->

	</div>
	<!-- Dashboard Wrapper ends -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?php echo base_url('ux/js/jquery.js'); ?>"></script>

	<!-- jQuery UI JS -->
	<script src="<?php echo base_url('ux/js/jquery-ui-v1.10.3.js'); ?>"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php echo base_url('ux/js/bootstrap.min.js'); ?>"></script>

	<!-- Sparkline graphs -->
	<script src="<?php echo base_url('ux/js/sparkline.js'); ?>"></script>

	<!-- jquery ScrollUp JS -->
	<script src="<?php echo base_url('ux/js/scrollup/jquery.scrollUp.js'); ?>"></script>

	<!-- Notifications JS -->
	<script src="<?php echo base_url('ux/js/alertify/alertify.js'); ?>"></script>
	<script src="<?php echo base_url('ux/js/alertify/alertify-custom.js'); ?>"></script>

	<!-- Flot Charts -->
	<script src="<?php echo base_url('ux/js/flot/jquery.flot.js'); ?>"></script>
	<script src="<?php echo base_url('ux/js/flot/jquery.flot.tooltip.min.js'); ?>"></script>
	<script src="<?php echo base_url('ux/js/flot/jquery.flot.resize.min.js'); ?>"></script>
	<script src="<?php echo base_url('ux/js/flot/jquery.flot.stack.min.js'); ?>"></script>
	<script src="<?php echo base_url('ux/js/flot/jquery.flot.orderBar.min.js'); ?>"></script>
	<script src="<?php echo base_url('ux/js/flot/jquery.flot.pie.min.js'); ?>"></script>

	<!-- JVector Map -->
	<script src="<?php echo base_url('ux/js/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
	<script src="<?php echo base_url('ux/js/jvectormap/jquery-jvectormap-usa.js'); ?>"></script>

	<!--	Tokenfield -->
	<script src="{{ URL::asset('ux/js/tokenfield/bootstrap-tokenfield.js') }}"></script>
	
	<!-- Summer Note JS -->
	<script src="<?php echo base_url('ux/js/summernote/summernote.js'); ?>"></script>
	
	<!-- Custom Index -->
	<script src="<?php echo base_url('ux/js/custom.js'); ?>"></script>
	<script src="<?php echo base_url('ux/js/custom-index.js'); ?>"></script>


		<!-- Custom JS -->

		<script type="text/javascript">
			// Default
			$(document).ready(function() {
				$('.summernote').summernote({height: 280});
				$('.tokenfield').tokenfield({});
			});
		</script>
	
		<?php echo $template['partials']['ga']; ?>
	</body>
</html>
