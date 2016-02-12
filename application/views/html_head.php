<!doctype html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <title><?php echo $title;?></title>

    <!-- FAVICON AND APPLE TOUCH -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/square_logo.png');?>">
	<link rel="apple-touch-icon-precomposed" sizes="180x180" href="apple-touch-180x180.png">

    <!-- FONTS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,400italic,300italic,300,500,500italic,700,700italic">
    <link href="http://fonts.googleapis.com/css?family=Raleway:400,300,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    
    <!-- NOTIFICATIONSTYLES -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/NotificationStyles/normalize.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/NotificationStyles/demo.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/NotificationStyles/ns-default.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/NotificationStyles/ns-style-growl.css');?>" />
    

    <!-- SELECT2 CSS -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/star-rating.min.css';?>">

    <!-- MT ICONS FONT -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/fonts/mt-icons/mt-icons.css';?>">

    <!-- FANCYBOX -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/fancybox/jquery.fancybox.css';?>">

	<!-- REVOLUTION SLIDER -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/revolutionslider/css/settings.css';?>">

    <!-- OWL Carousel -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/owl-carousel/owl.carousel.css';?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/owl-carousel/owl.transitions.css';?>">

    <!-- ANIMATIONS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/animations/animate.min.css';?>">

    <!-- CUSTOM & PAGES STYLE -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/custom.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/pages-style.css';?>">

    <!-- ALTERNATIVE STYLES -->
    <link rel="stylesheet" href="#" data-style="styles">

    <!-- OPEN SANS FONT -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <!-- ILYASHRN STYLES -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css';?>">


    <!-- SCRIPTSS! -->

    <!-- GO TOP -->
    <a id="go-top"><i class="mt-icon-arrow-up2"></i></a>

    <!-- STYLE SWITCHER -->
    <div id="style-switcher"></div>

    <!-- jQUERY -->
    <script src="<?php echo base_url().'assets/plugins/jquery/jquery-2.1.4.min.js';?>"></script>
    
    <!-- NOTIFICATIONSTYLES -->
    <script src="<?php echo base_url('assets/js/NotificationStyles/modernizr.custom.js');?>"></script>
    
    <!-- SELECT2 -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/bootstrap/js/star-rating.min.js';?>"></script>

    <!-- VIEWPORT -->
    <script src="<?php echo base_url().'assets/plugins/viewport/jquery.viewport.js';?>"></script>

    <!-- MENU -->
    <script src="<?php echo base_url().'assets/plugins/menu/hoverIntent.js';?>"></script>
    <script src="<?php echo base_url().'assets/plugins/menu/superfish.js';?>"></script>

    <!-- FANCYBOX -->
    <script src="<?php echo base_url().'assets/plugins/fancybox/jquery.fancybox.pack.js';?>"></script>

    <!-- REVOLUTION SLIDER -->
    <script src="<?php echo base_url().'assets/plugins/revolutionslider/js/jquery.themepunch.tools.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/plugins/revolutionslider/js/jquery.themepunch.revolution.min.js';?>"></script>

    <!-- OWL Carousel -->
    <script src="<?php echo base_url().'assets/plugins/owl-carousel/owl.carousel.min.js';?>"></script>

    <!-- PARALLAX -->
    <script src="<?php echo base_url().'assets/plugins/parallax/jquery.stellar.min.js';?>"></script>

    <!-- ISOTOPE -->
    <script src="<?php echo base_url().'assets/plugins/isotope/imagesloaded.pkgd.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/plugins/isotope/isotope.pkgd.min.js';?>"></script>

    <!-- PLACEHOLDER -->
    <script src="<?php echo base_url().'assets/plugins/placeholders/jquery.placeholder.min.js';?>"></script>

    <!-- BOOTSTRAP VALIDATOR JS -->
    <script src="<?php echo base_url().'assets/bootstrap/js/validator.js';?>"></script>

    <!-- CONTACT FORM VALIDATE & SUBMIT -->
    <script src="<?php echo base_url().'assets/plugins/validate/jquery.validate.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/plugins/submit/jquery.form.min.js';?>"></script>

    <!-- CHARTS -->
    <script src="<?php echo base_url().'assets/plugins/charts/jquery.easypiechart.min.js';?>"></script>

    <!-- COUNTER -->
    <script src="<?php echo base_url().'assets/plugins/counter/jQuerySimpleCounter.js';?>"></script>

    <!-- STATISTICS -->
    <script src="<?php echo base_url().'assets/plugins/statistics/chart.min.js';?>"></script>

    <!-- YOUTUBE PLAYER -->
    <script src="<?php echo base_url().'assets/plugins/ytplayer/jquery.mb.YTPlayer.min.js';?>"></script>

    <!-- INSTAFEED -->
    <script src="<?php echo base_url().'assets/plugins/instafeed/instafeed.min.js';?>"></script>

    <!-- ANIMATIONS -->
    <script src="<?php echo base_url().'assets/plugins/animations/wow.min.js';?>"></script>

    <!-- COUNTDOWN -->
    <script src="<?php echo base_url().'assets/plugins/countdown/jquery.countdown.min.js';?>"></script>

    <!-- CUSTOM JS -->
    <script src="<?php echo base_url().'assets/js/custom.js';?>"></script>

</head>

<body class="boxed">
