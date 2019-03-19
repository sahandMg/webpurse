<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="خرید بیت کوین ,buy bitcoin, فروش بیت کوین , sell bitcoin, خرید داگ کوین , buy dogcoin , فروش داگ کوین ,خرید وبمانی , buy webmoney ,فروش وبمانی , sell webmoney , خرید پرفکت مانی , buy perfect money, فروش پرفکت مانی ,sell perfect money, خرید اوکی پی , buy okpay ,فروش اوکی پی , sell okpay, خرید پی پال , buy paypal , فروش پی پال , sell paypal , خرید بیت کوین کد ,buy BTC_E ,فروش بیت کوین کد , خرید اسکریل , buy skrill , فروش اسکریل , sell skrill , خرید و فروش بیت کوین , خرید و فروش وبمانی , خرید و فروش اسکریل , خرید و فروش پی پال , خرید و فروش بیت کوین کد ,خرید و فروش داگ کوین , خرید و فروش پرفکت مانی">
    <title>WebPurse | خرید و فروش پرفکت مانی ، خرید و فروش بیتکوین ، خرید و فروش اتوماتیک ارز</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/css/animate.min.css" rel="stylesheet"> 
    <link href="/assets/css/lightbox.css" rel="stylesheet"> 
    <link href="/assets/fonts/font.css" rel="stylesheet" type="text/css" charset="utf-8">
	<link href="/assets/css/main.css?v2" rel="stylesheet">
	<link href="/assets/css/responsive.css" rel="stylesheet">
	<link href="/assets/css/screen.css" rel="stylesheet" type="text/css" />
	<link href="/assets/css/additional.css" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
	    <script src="/assets/js/html5shiv.js"></script>
	    <script src="/assets/js/respond.min.js"></script>
    <![endif]-->       
    <link rel="icon" type="image/png" href="/assets/images/ico/favicon.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/assets/images/ico/apple-touch-icon-57-precomposed.png">
</head>
<body>
	<div class="header_bg">
	<header id="header" style="border-top:5px solid #0775C1;">
        <div class="container">
            <div class="row" style="height:20px;"></div>
        </div>
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="index.html">
                    	<h1><img src="/assets/images/logo.png" alt="logo"></h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right pursenav">
                    <?php if(isset($logged_in) && $logged_in){?>
                    	<li><?php echo anchor('auth/logout/', 'خروج');?></li>
                        <li><?php echo anchor('pages/news/', 'اخبار');?></li>
              	  	<li><?php echo anchor('pages/contact/', 'پشتیبانی');?></li>
              	  	<li><?php echo anchor('auth/comment/', 'ثبت نظر');?></li>
              	  	<li><?php echo anchor('auth/history/', 'تاریخچه');?></li>
                        <li><?php echo anchor('auth/your_accounts/', 'حساب های شما');?></li>
                        <li><?php echo anchor('auth/verify/', 'وریفای');?></li>
                        <li class="active"><?php echo anchor('auth/exchange/', 'خرید و فروش');?></li>
                    <?php }else{?>
                        <li><?php echo anchor('pages/contact/', 'تماس با ما');?></li>
                        <li><?php echo anchor('pages/about/', 'درباره ما');?></li>
                        <li><?php echo anchor('pages/terms/', 'شرایط');?></li>
                        <li><?php echo anchor('pages/news/', 'اخبار');?></li>
                        <li><?php echo anchor('auth/login/', 'ورود اعضا');?></li>
                        <li><?php echo anchor('auth/register/', 'ثبت نام');?></li>
                        <li class="active"><?php echo anchor('/', 'صفحه اصلی');?></li>
                	<?php }?>
                    </ul>
                </div>
            </div>
        </div>
	
    </header>
    </div>
    <!--/#header-->
<?php if(isset($is_home)){?>
    <section id="home-slider">
        <div class="container">
            <div class="main-slider pursehome">
                <div class="slide-text">
                    <h1>فروش اتوماتیک ارزهای دیجیتال</h1>
                    <p class="hometext">سیستم های اتوماتیک و مطمئن ما دلار را به صورت خودکار به حساب های ارزی شما واریز کرده و نیازی به انتظار جهت دریافت ارز خود ندارید</p>
                    <a href="#" class="btn btn-common">هم اکنون عضو سایت شوید</a>
                </div>
                <img src="/assets/images/home/slider/slide1/pm.png" class="slider-pm" alt="slider image">
                <img src="/assets/images/home/slider/slide1/bitcoin.png" class="slider-bitcoin" alt="slider image">
                <img src="/assets/images/home/slider/slide1/paypal.png" class="slider-paypal" alt="slider image">
                <img src="/assets/images/home/slider/slide1/okpay.png" class="slider-okpay" alt="slider image">
                <img src="/assets/images/home/slider/slide1/webmoney.png" class="slider-webmoney" alt="slider image">
                <img src="/assets/images/home/slider/slide1/skrill.png" class="slider-skrill" alt="slider image">
            </div>
        </div>
        <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
    </section>
    <!--/#home-slider-->
<?php }?>

    <section id="features">
        <div class="container">
            <div class="row">
                <div <?php if(!isset($is_home)){echo 'id="not_home"';}?> class="single-features">