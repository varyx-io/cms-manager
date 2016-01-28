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

		<!-- Bootstrap CSS -->
		<link href="/ux/css/bootstrap.css" rel="stylesheet" media="screen">

		<!-- Animate CSS -->
		<link href="/ux/css/animate.css" rel="stylesheet" media="screen">

		<!-- Main CSS -->
		<link href="/ux/css/main.css" rel="stylesheet" media="screen">

		<!-- Main CSS -->
		<link href="/ux/css/login.css" rel="stylesheet">

		<!-- Font Awesome -->
		<link href="/ux/fonts/font-awesome.min.css" rel="stylesheet">

		<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="/us/js/html5shiv.js"></script>
			<script src="/ux/js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<!-- BOF : Primary (Default) page layout
			================================================== -->

		<?php echo $template['body']; ?>

		<!-- EOF : Primary (Default) page layout
			================================================== -->
						
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="/ux/js/jquery.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="/ux/js/bootstrap.min.js"></script>

		<script type="text/javascript">
			(function($) {
				// constants
				var SHOW_CLASS = 'show',
					HIDE_CLASS = 'hide',
					ACTIVE_CLASS = 'active';
				
				$('a').on('click', function(e){
					e.preventDefault();
					var a = $(this),
					href = a.attr('href');
				
					$('.active').removeClass(ACTIVE_CLASS);
					a.addClass(ACTIVE_CLASS);

					$('.show')
					.removeClass(SHOW_CLASS)
					.addClass(HIDE_CLASS)
					.hide();
					
					$(href)
					.removeClass(HIDE_CLASS)
					.addClass(SHOW_CLASS)
					.hide()
					.fadeIn(550);
				});
			})(jQuery);
		</script>
		
		<?php echo $template['partials']['ga']; ?>
			
	</body>
</html>
