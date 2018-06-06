<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SITE_URL?>/lib/skins/ela/images/favicon.png">
        
        <!-- <title><?php echo $page_title; ?></title> -->
        <title><?php echo SITE_NAME; ?> | CrewCenter</title>
        
        <?php echo $page_htmlhead; ?>
        
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo SITE_URL?>/lib/skins/ela/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
        
        <!-- Custom CSS -->
        <link href="<?php echo SITE_URL?>/lib/skins/ela/css/lib/owl.carousel.min.css" rel="stylesheet" />
        <link href="<?php echo SITE_URL?>/lib/skins/ela/css/lib/owl.theme.default.min.css" rel="stylesheet" />
        <link href="<?php echo SITE_URL?>/lib/skins/ela/css/helper.css" rel="stylesheet">
        <link href="<?php echo SITE_URL?>/lib/skins/ela/css/style.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body class="fix-header fix-sidebar">
        <?php echo $page_htmlreq; ?>
		<?php
		// var_dump($_SERVER['REQUEST_URI']);
		# Hide the header if the page is not the registration or login page
		# Bit hacky, don't like doing it this way
		if (!isset($_SERVER['REQUEST_URI']) || ltrim($_SERVER['REQUEST_URI'],'/') !== SITE_URL.'/index.php/login' || ltrim($_SERVER['REQUEST_URI'],'/') !== SITE_URL.'/index.php/registration') {
			if(Auth::LoggedIn()) {
				Template::Show('app_top.php');
			}
		}
		?>
        
        <?php echo $page_content; ?>
        
		<?php
		# Hide the footer if the page is not the registration or login page
		# Bit hacky, don't like doing it this way
		if (!isset($_SERVER['REQUEST_URI']) || ltrim($_SERVER['REQUEST_URI'],'/') !== SITE_URL.'/index.php/login' || ltrim($_SERVER['REQUEST_URI'],'/') !== SITE_URL.'/index.php/registration') {
			if(Auth::LoggedIn()) {
				Template::Show('app_bottom.php');
			}
		}
		?>
        
        <!-- Bootstrap tether Core JavaScript -->
        <script src="<?php echo SITE_URL?>/lib/skins/ela/js/lib/bootstrap/js/popper.min.js"></script>
        <script src="<?php echo SITE_URL?>/lib/skins/ela/js/lib/bootstrap/js/bootstrap.min.js"></script>
        
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="<?php echo SITE_URL?>/lib/skins/ela/js/jquery.slimscroll.js"></script>
        
        <!--Menu sidebar -->
        <script src="<?php echo SITE_URL?>/lib/skins/ela/js/sidebarmenu.js"></script>
        
        <!--stickey kit -->
        <script src="<?php echo SITE_URL?>/lib/skins/ela/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>

        <!-- Calendar 2 -->
    	<script src="<?php echo SITE_URL?>/lib/skins/ela/js/lib/calendar-2/moment.latest.min.js"></script>
        <script src="<?php echo SITE_URL?>/lib/skins/ela/js/lib/calendar-2/semantic.ui.min.js"></script>
        <script src="<?php echo SITE_URL?>/lib/skins/ela/js/lib/calendar-2/prism.min.js"></script>
        <script src="<?php echo SITE_URL?>/lib/skins/ela/js/lib/calendar-2/pignose.calendar.min.js"></script>
        <script src="<?php echo SITE_URL?>/lib/skins/ela/js/lib/calendar-2/pignose.init.js"></script>
    
        <!-- OWL Carousel -->
        <script src="<?php echo SITE_URL?>/lib/skins/ela/js/lib/owl-carousel/owl.carousel.min.js"></script>
        <script src="<?php echo SITE_URL?>/lib/skins/ela/js/lib/owl-carousel/owl.carousel-init.js"></script>
        
        <!-- Scripit -->
        <script src="<?php echo SITE_URL?>/lib/skins/ela/js/scripts.js"></script>
    </body>