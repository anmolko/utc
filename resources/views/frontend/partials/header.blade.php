<!doctype html>
<html class="no-js" lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="author" content="Universal Trading Concern">
    <meta name="description" content="@if(!empty(@$setting_data->website_description)) {{ucwords(@$setting_data->website_description)}} @else Universal Trading Concern @endif ">
    <link rel="canonical" href="" />
    <title>@yield('title') - @if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else Universal Trading Concern @endif </title>
    <meta property="og:title" content="Home" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="Universal Trading Concern" />
	<meta property="og:description" content="@if(!empty(@$setting_data->website_description)) {{ucwords(@$setting_data->website_description)}} @else Universal Trading Concern @endif " />
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php if(@$setting_data->favicon){?>{{asset('/images/uploads/settings/'.@$setting_data->favicon)}}<?php }?>">

    <!-- All CSS Files -->

    <!-- Boostrap style -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/style.css')}}">

    <!-- Reponsive -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/responsive.css')}}">


    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/custom.css')}}">

       <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id={{@$setting_data->google_analytics}}"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', '{{@$setting_data->google_analytics}}');
    

    </script>

    @yield('styles')

</head>


<body class="header_sticky">
    <div class="boxed style1">

        <div class="overlay"></div>

        <!-- Preloader -->
        <div class="preloader">
            <div class="clear-loading loading-effect-2">
                <span></span>
            </div>
        </div><!-- /.preloader -->

        
        
        <section id="header" class="header">
            <div class="header-top style3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="flat-support">
                                <li>
                                <a href="faq.html" title="">Support</a>
                            </li>
                            <li>
                                <a href="store-location.html" title="">Store Locator</a>
                            </li>
                            <li>
                                <a href="order-tracking.html" title="">Track Your Order</a>
                            </li>
                            </ul><!-- /.flat-support -->
                        </div><!-- /.col-md-4 -->
                        <div class="col-md-4">
                            
                        </div><!-- /.col-md-4 -->
                        <div class="col-md-4">
                            <ul class="flat-unstyled">
                                <li class="account">
                                    <a href="#" title="">My Account<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="unstyled">
                                        <li>
                                        <a href="#" title="">Login</a>
                                    </li>
                                    <li>
                                        <a href="wishlist.html" title="">Wishlist</a>
                                    </li>
                                    <li>
                                        <a href="shop-cart.html" title="">My Cart</a>
                                    </li>
                                    <li>
                                        <a href="my-account.html" title="">My Account</a>
                                    </li>
                                    <li>
                                        <a href="shop-checkout.html" title="">Checkout</a>
                                    </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" title="">USD<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="unstyled">
                                        <li>
                                            <a href="#" title="">Euro</a>
                                        </li>
                                        <li>
                                            <a href="#" title="">Dolar</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" title="">English<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="unstyled">
                                        <li>
                                        <a href="#" title="">Turkish</a>
                                    </li>
                                    <li>
                                        <a href="#" title="">English</a>
                                    </li>
                                    <li>
                                        <a href="#" title="">اللغة العربية</a>
                                    </li>
                                    <li>
                                        <a href="#" title="">Español</a>
                                    </li>
                                    <li>
                                        <a href="#" title="">Italiano</a>
                                    </li>
                                    </ul>
                                </li>
                            </ul><!-- /.flat-unstyled -->
                        </div><!-- /.col-md-4 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.header-top -->
            <div class="header-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="logo" class="logo style1">
                                <a href="index.html" title="">
                                    <img src="images/logos/logo.png" alt="">
                                </a>
                            </div><!-- /#logo -->
                            <div class="nav-wrap">
                                <div id="mainnav" class="mainnav style1">
                                    <ul class="menu">
                                        <li class="column-1">
                                            <a href="#" title="">Home</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="index.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Home Layout 01</a>
                                                </li>
                                                <li>
                                                    <a href="index-v2.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Home Layout 02</a>
                                                </li>
                                                <li>
                                                    <a href="index-v3.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Home Layout 03</a>
                                                </li>
                                                <li>
                                                    <a href="index-v4.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Home Layout 04</a>
                                                </li>
                                                <li>
                                                    <a href="index-v5.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Home Layout 05</a>
                                                </li>
                                                <li>
                                                    <a href="index-v6.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Home Layout 06</a>
                                                </li>
                                                <li>
                                                    <a href="index-v7.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Home Layout 07</a>
                                                </li>
                                                <li>
                                                    <a href="index-v8.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Home Layout 08</a>
                                                </li>
                                                <li>
                                                    <a href="index-v9.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Home Layout 09</a>
                                                </li>
                                                <li>
                                                    <a href="index-v10.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Home Layout 10</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="column-1">
                                            <a href="shop.html" title="">Shop</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="shop.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Shop left sidebar</a>
                                                </li>
                                                <li>
                                                    <a href="shop-v2.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Shop right sidebar</a>
                                                </li>
                                                <li>
                                                    <a href="shop-v3.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Shop list view</a>
                                                </li>
                                                <li>
                                                    <a href="shop-v4.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Shop full width</a>
                                                </li>
                                                <li>
                                                    <a href="shop-v5.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Shop 03 column</a>
                                                </li>
                                                <li>
                                                    <a href="shop-cart.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Shop cart</a>
                                                </li>
                                                <li>
                                                    <a href="shop-checkout.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Shop checkout</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="column-1">
                                            <a href="#" title="">Features</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Home Theater Systems</a>
                                                </li>
                                                <li>
                                                    <a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Receivers & Amplifiers</a>
                                                </li>
                                                <li>
                                                    <a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Speakers</a>
                                                </li>
                                                <li>
                                                    <a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>CD Players & Turntables</a>
                                                </li>
                                                <li>
                                                    <a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>High-Resolution Audio</a>
                                                </li>
                                                <li>
                                                    <a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>4K Ultra HD TVs</a>
                                                </li>
                                            </ul><!-- /.submenu -->
                                        </li><!-- /.column-1 -->
                                        <li class="has-mega-menu">
                                            <a href="#" title="">Electronic</a>
                                            <div class="submenu">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <h3 class="cat-title">Accessories</h3>
                                                        <ul>
                                                            <li>
                                                                <a href="#" title="">Electronics</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Furniture</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Accessories</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Divided</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Everyday Fashion</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Modern Classic</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Party</a>
                                                            </li>
                                                        </ul>
                                                        <div class="show">
                                                            <a href="#" title="">Shop All</a>
                                                        </div>
                                                    </div><!-- /.col-md-3 -->
                                                    <div class="col-md-3">
                                                        <h3 class="cat-title">Laptop And Computer</h3>
                                                        <ul>
                                                            <li>
                                                                <a href="#" title="">Networking & Internet Devices</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Laptops, Desktops & Monitors</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Hard Drives & Memory Cards</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Printers & Ink</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Networking & Internet Devices</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Computer Accessories</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Software</a>
                                                            </li>
                                                        </ul>
                                                        <div class="show">
                                                            <a href="#" title="">Shop All</a>
                                                        </div>
                                                    </div><!-- /.col-md-3 -->
                                                    <div class="col-md-4">
                                                        <h3 class="cat-title">Audio & Video</h3>
                                                        <ul>
                                                            <li>
                                                                <a href="#" title="">Headphones & Speakers</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Home Entertainment Systems</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">MP3 & Media Players</a>
                                                            </li>
                                                        </ul>
                                                        <div class="show">
                                                            <a href="#" title="">Shop All</a>
                                                        </div>
                                                    </div><!-- /.col-md-4 -->
                                                    <div class="col-md-2">
                                                        <h3 class="cat-title">Home Audio</h3>
                                                        <ul>
                                                            <li>
                                                                <a href="#" title="">Home Theater Systems</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Receivers & Amplifiers</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">Speakers</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">CD Players & Turntables</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">High-Resolution Audio</a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="">4K Ultra HD TVs</a>
                                                            </li>
                                                        </ul>
                                                        <div class="show">
                                                            <a href="#" title="">Shop All</a>
                                                        </div>
                                                    </div><!-- /.col-md-2 -->
                                                </div><!-- /.row -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="banner-box">
                                                            <div class="inner-box">
                                                                <a href="#" title="">
                                                                    <img src="images/banner_boxes/submenu-01.png" alt="">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div><!-- /.col-md-6 -->
                                                    <div class="col-md-6">
                                                        <div class="banner-box">
                                                            <div class="inner-box">
                                                                <a href="#" title="">
                                                                    <img src="images/banner_boxes/submenu-02.png" alt="">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div><!-- /.col-md-6 -->
                                                </div><!-- /.row -->
                                            </div><!-- /.submenu -->
                                        </li>
                                        <li class="column-1">
                                            <a href="#" title="">Pages</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="about.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>About</a>
                                                </li>
                                                <li>
                                                    <a href="404.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>404 Page</a>
                                                </li>
                                                <li>
                                                    <a href="brands.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Brands Page</a>
                                                </li>
                                                <li>
                                                    <a href="categories.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Categories 01</a>
                                                </li>
                                                <li>
                                                    <a href="categories-v2.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Categories 02</a>
                                                </li>
                                                <li>
                                                    <a href="element.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Element</a>
                                                </li>
                                                <li>
                                                    <a href="faq.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>FAQ</a>
                                                </li>
                                                <li>
                                                    <a href="order-tracking.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Order Tracking</a>
                                                </li>
                                                <li>
                                                <a href="term-condition.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Terms & Conditions</a>
                                            </li>
                                            <li>
                                                <a href="single-product.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Single Product 01</a>
                                            </li>
                                            <li>
                                                <a href="single-product-v2.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Single Product 02</a>
                                            </li>
                                            <li>
                                                <a href="single-product-v3.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Single Product 03</a>
                                            </li>
                                            <li>
                                                <a href="single-product-v4.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Single Product 04</a>
                                            </li>
                                            <li>
                                                <a href="single-product-v5.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Single Product 05</a>
                                            </li>
                                            </ul>
                                        </li>
                                        <li class="column-1">
                                            <a href="blog.html" title="">Blog</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="blog.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Blog left sidebar</a>
                                                </li>
                                                <li>
                                                    <a href="blog-v2.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Blog right sidebar</a>
                                                </li>
                                                <li>
                                                    <a href="blog-v3.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Blog list</a>
                                                </li>
                                                <li>
                                                    <a href="blog-v4.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Blog 02 column</a>
                                                </li>
                                                <li>
                                                    <a href="blog-v5.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Blog full width</a>
                                                </li>
                                                <li>
                                                    <a href="blog-single.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Blog single</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="column-1">
                                            <a href="contact.html" title="">Contact</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="contact.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Contact 01</a>
                                                </li>
                                                <li>
                                                    <a href="contact-v2.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Contact 02</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul><!-- /.menu -->
                                </div><!-- /.mainnav -->
                            </div><!-- /.nav-wrap -->
                            <div class="btn-menu style1">
                                <span></span>
                            </div><!-- //mobile menu button -->
                            <ul class="flat-infomation style1">
                                <li class="phone">
                                    <img src="images/icons/call-3.png" alt="">
                                    Call Us: <a href="#" title="">(888) 1234 56789</a>
                                </li>
                            </ul><!-- /.flat-infomation -->
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.header-middle -->
            <div class="header-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-2">
                            <div id="mega-menu">
                                <div class="btn-mega"><span></span>ALL CATEGORIES</div>
                                <ul class="menu">
                                    <li>
                                        <a href="#" title="" class="dropdown">
                                            <span class="menu-img">
                                                <img src="images/icons/menu/01.png" alt="">
                                            </span>
                                            <span class="menu-title">
                                                Laptops & Mac
                                            </span>
                                        </a>
                                        <div class="drop-menu">
                                            <div class="one-third">
                                                <div class="cat-title">
                                                    Laptop And Computer
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="#" title="">Networking & Internet Devices</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Laptops, Desktops & Monitors</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Hard Drives & Memory Cards</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Printers & Ink</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Networking & Internet Devices</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Computer Accessories</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Software</a>
                                                    </li>
                                                </ul>
                                                <div class="show">
                                                    <a href="#" title="">Shop All</a>
                                                </div>
                                            </div>
                                            <div class="one-third">
                                                <div class="cat-title">
                                                    Audio & Video
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="#" title="">Headphones & Speakers</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Home Entertainment Systems</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">MP3 & Media Players</a>
                                                    </li>
                                                </ul>
                                                <div class="show">
                                                    <a href="#" title="">Shop All</a>
                                                </div>
                                            </div>
                                            <div class="one-third">
                                                <ul class="banner">
                                                    <li>
                                                        <div class="banner-text">
                                                            <div class="banner-title">
                                                                Headphones
                                                            </div>
                                                            <div class="more-link">
                                                                <a href="#" title="">Shop Now <img src="images/icons/right-2.png" alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="banner-img">
                                                            <img src="images/banner_boxes/menu-01.png" alt="">
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </li>
                                                    <li>
                                                        <div class="banner-text">
                                                            <div class="banner-title">
                                                                TV & Audio
                                                            </div>
                                                            <div class="more-link">
                                                                <a href="#" title="">Shop Now <img src="images/icons/right-2.png" alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="banner-img">
                                                            <img src="images/banner_boxes/menu-02.png" alt="">
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </li>
                                                    <li>
                                                        <div class="banner-text">
                                                            <div class="banner-title">
                                                                Computers
                                                            </div>
                                                            <div class="more-link">
                                                                <a href="#" title="">Shop Now <img src="images/icons/right-2.png" alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="banner-img">
                                                            <img src="images/banner_boxes/menu-03.png" alt="">
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </li>
                                                </ul>	
                                            </div>
                                        </div><!-- /.drop-menu -->
                                    </li>
                                    <li>
                                        <a href="#" title="" class="dropdown">
                                            <span class="menu-img">
                                                <img src="images/icons/menu/02.png" alt="">
                                            </span>
                                            <span class="menu-title">
                                                Mobile & Tablet
                                            </span>
                                        </a>
                                        <div class="drop-menu">
                                            <div class="one-third">
                                                <div class="cat-title">
                                                    Laptop And Computer
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="#" title="">Networking & Internet Devices</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Laptops, Desktops & Monitors</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Hard Drives & Memory Cards</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Printers & Ink</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Networking & Internet Devices</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Computer Accessories</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Software</a>
                                                    </li>
                                                </ul>
                                                <div class="show">
                                                    <a href="#" title="">Shop All</a>
                                                </div>
                                            </div>
                                            <div class="one-third">
                                                <div class="cat-title">
                                                    Audio & Video
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="#" title="">Headphones & Speakers</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Home Entertainment Systems</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">MP3 & Media Players</a>
                                                    </li>
                                                </ul>
                                                <div class="show">
                                                    <a href="#" title="">Shop All</a>
                                                </div>
                                            </div>
                                            <div class="one-third">
                                                <ul class="banner">
                                                    <li>
                                                        <div class="banner-text">
                                                            <div class="banner-title">
                                                                Headphones
                                                            </div>
                                                            <div class="more-link">
                                                                <a href="#" title="">Shop Now <img src="images/icons/right-2.png" alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="banner-img">
                                                            <img src="images/banner_boxes/menu-01.png" alt="">
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </li>
                                                    <li>
                                                        <div class="banner-text">
                                                            <div class="banner-title">
                                                                TV & Audio
                                                            </div>
                                                            <div class="more-link">
                                                                <a href="#" title="">Shop Now <img src="images/icons/right-2.png" alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="banner-img">
                                                            <img src="images/banner_boxes/menu-02.png" alt="">
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </li>
                                                    <li>
                                                        <div class="banner-text">
                                                            <div class="banner-title">
                                                                Computers
                                                            </div>
                                                            <div class="more-link">
                                                                <a href="#" title="">Shop Now <img src="images/icons/right-2.png" alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="banner-img">
                                                            <img src="images/banner_boxes/menu-03.png" alt="">
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </li>
                                                </ul>	
                                            </div>
                                        </div><!-- /.drop-menu -->
                                    </li>
                                    <li>
                                        <a href="#" title="" class="dropdown">
                                            <span class="menu-img">
                                                <img src="images/icons/menu/03.png" alt="">
                                            </span>
                                            <span class="menu-title">
                                                Home Devices
                                            </span>
                                        </a>
                                        <div class="drop-menu">
                                            <div class="one-third">
                                                <div class="cat-title">
                                                    Laptop And Computer
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="#" title="">Networking & Internet Devices</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Laptops, Desktops & Monitors</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Hard Drives & Memory Cards</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Printers & Ink</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Networking & Internet Devices</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Computer Accessories</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Software</a>
                                                    </li>
                                                </ul>
                                                <div class="show">
                                                    <a href="#" title="">Shop All</a>
                                                </div>
                                            </div>
                                            <div class="one-third">
                                                <div class="cat-title">
                                                    Audio & Video
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="#" title="">Headphones & Speakers</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Home Entertainment Systems</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">MP3 & Media Players</a>
                                                    </li>
                                                </ul>
                                                <div class="show">
                                                    <a href="#" title="">Shop All</a>
                                                </div>
                                            </div>
                                            <div class="one-third">
                                                <ul class="banner">
                                                    <li>
                                                        <div class="banner-text">
                                                            <div class="banner-title">
                                                                Headphones
                                                            </div>
                                                            <div class="more-link">
                                                                <a href="#" title="">Shop Now <img src="images/icons/right-2.png" alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="banner-img">
                                                            <img src="images/banner_boxes/menu-01.png" alt="">
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </li>
                                                    <li>
                                                        <div class="banner-text">
                                                            <div class="banner-title">
                                                                TV & Audio
                                                            </div>
                                                            <div class="more-link">
                                                                <a href="#" title="">Shop Now <img src="images/icons/right-2.png" alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="banner-img">
                                                            <img src="images/banner_boxes/menu-02.png" alt="">
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </li>
                                                    <li>
                                                        <div class="banner-text">
                                                            <div class="banner-title">
                                                                Computers
                                                            </div>
                                                            <div class="more-link">
                                                                <a href="#" title="">Shop Now <img src="images/icons/right-2.png" alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="banner-img">
                                                            <img src="images/banner_boxes/menu-03.png" alt="">
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </li>
                                                </ul>	
                                            </div>
                                        </div><!-- /.drop-menu -->
                                    </li>
                                    <li>
                                        <a href="#" title="">
                                            <span class="menu-img">
                                                <img src="images/icons/menu/04.png" alt="">
                                            </span>
                                            <span class="menu-title">
                                                Software
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="">
                                            <span class="menu-img">
                                                <img src="images/icons/menu/05.png" alt="">
                                            </span>
                                            <span class="menu-title">
                                                TV & Audio
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="">
                                            <span class="menu-img">
                                                <img src="images/icons/menu/06.png" alt="">
                                            </span>
                                            <span class="menu-title">
                                                Sports & Fitness
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="" class="dropdown">
                                            <span class="menu-img">
                                                <img src="images/icons/menu/07.png" alt="">
                                            </span>
                                            <span class="menu-title">
                                                Games & Toys
                                            </span>
                                        </a>
                                        <div class="drop-menu">
                                            <div class="one-third">
                                                <div class="cat-title">
                                                    Laptop And Computer
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="#" title="">Networking & Internet Devices</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Laptops, Desktops & Monitors</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Hard Drives & Memory Cards</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Printers & Ink</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Networking & Internet Devices</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Computer Accessories</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Software</a>
                                                    </li>
                                                </ul>
                                                <div class="show">
                                                    <a href="#" title="">Shop All</a>
                                                </div>
                                            </div>
                                            <div class="one-third">
                                                <div class="cat-title">
                                                    Audio & Video
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="#" title="">Headphones & Speakers</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Home Entertainment Systems</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">MP3 & Media Players</a>
                                                    </li>
                                                </ul>
                                                <div class="show">
                                                    <a href="#" title="">Shop All</a>
                                                </div>
                                            </div>
                                            <div class="one-third">
                                                <ul class="banner">
                                                    <li>
                                                        <div class="banner-text">
                                                            <div class="banner-title">
                                                                Headphones
                                                            </div>
                                                            <div class="more-link">
                                                                <a href="#" title="">Shop Now <img src="images/icons/right-2.png" alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="banner-img">
                                                            <img src="images/banner_boxes/menu-01.png" alt="">
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </li>
                                                    <li>
                                                        <div class="banner-text">
                                                            <div class="banner-title">
                                                                TV & Audio
                                                            </div>
                                                            <div class="more-link">
                                                                <a href="#" title="">Shop Now <img src="images/icons/right-2.png" alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="banner-img">
                                                            <img src="images/banner_boxes/menu-02.png" alt="">
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </li>
                                                    <li>
                                                        <div class="banner-text">
                                                            <div class="banner-title">
                                                                Computers
                                                            </div>
                                                            <div class="more-link">
                                                                <a href="#" title="">Shop Now <img src="images/icons/right-2.png" alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="banner-img">
                                                            <img src="images/banner_boxes/menu-03.png" alt="">
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </li>
                                                </ul>	
                                            </div>
                                        </div><!-- /.drop-menu -->
                                    </li>
                                    <li>
                                        <a href="#" title="">
                                            <span class="menu-img">
                                                <img src="images/icons/menu/08.png" alt="">
                                            </span>
                                            <span class="menu-title">
                                                Video Cameras
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="" class="dropdown">
                                            <span class="menu-img">
                                                <img src="images/icons/menu/09.png" alt="">
                                            </span>
                                            <span class="menu-title">
                                                Accessories
                                            </span>
                                        </a>
                                        <div class="drop-menu">
                                            <div class="one-third">
                                                <div class="cat-title">
                                                    Laptop And Computer
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="#" title="">Networking & Internet Devices</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Laptops, Desktops & Monitors</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Hard Drives & Memory Cards</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Printers & Ink</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Networking & Internet Devices</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Computer Accessories</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Software</a>
                                                    </li>
                                                </ul>
                                                <div class="show">
                                                    <a href="#" title="">Shop All</a>
                                                </div>
                                            </div>
                                            <div class="one-third">
                                                <div class="cat-title">
                                                    Audio & Video
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="#" title="">Headphones & Speakers</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Home Entertainment Systems</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">MP3 & Media Players</a>
                                                    </li>
                                                </ul>
                                                <div class="show">
                                                    <a href="#" title="">Shop All</a>
                                                </div>
                                            </div>
                                            <div class="one-third">
                                                <ul class="banner">
                                                    <li>
                                                        <div class="banner-text">
                                                            <div class="banner-title">
                                                                Headphones
                                                            </div>
                                                            <div class="more-link">
                                                                <a href="#" title="">Shop Now <img src="images/icons/right-2.png" alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="banner-img">
                                                            <img src="images/banner_boxes/menu-01.png" alt="">
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </li>
                                                    <li>
                                                        <div class="banner-text">
                                                            <div class="banner-title">
                                                                TV & Audio
                                                            </div>
                                                            <div class="more-link">
                                                                <a href="#" title="">Shop Now <img src="images/icons/right-2.png" alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="banner-img">
                                                            <img src="images/banner_boxes/menu-02.png" alt="">
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </li>
                                                    <li>
                                                        <div class="banner-text">
                                                            <div class="banner-title">
                                                                Computers
                                                            </div>
                                                            <div class="more-link">
                                                                <a href="#" title="">Shop Now <img src="images/icons/right-2.png" alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="banner-img">
                                                            <img src="images/banner_boxes/menu-03.png" alt="">
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </li>
                                                </ul>	
                                            </div>
                                        </div><!-- /.drop-menu -->
                                    </li>
                                    <li>
                                        <a href="#" title="" class="dropdown">
                                            <span class="menu-img">
                                                <img src="images/icons/menu/10.png" alt="">
                                            </span>
                                            <span class="menu-title">
                                                Security
                                            </span>
                                        </a>
                                        <div class="drop-menu">
                                            <div class="one-third">
                                                <div class="cat-title">
                                                    Laptop And Computer
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="#" title="">Networking & Internet Devices</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Laptops, Desktops & Monitors</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Hard Drives & Memory Cards</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Printers & Ink</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Networking & Internet Devices</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Computer Accessories</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Software</a>
                                                    </li>
                                                </ul>
                                                <div class="show">
                                                    <a href="#" title="">Shop All</a>
                                                </div>
                                            </div>
                                            <div class="one-third">
                                                <div class="cat-title">
                                                    Audio & Video
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="#" title="">Headphones & Speakers</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Home Entertainment Systems</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">MP3 & Media Players</a>
                                                    </li>
                                                </ul>
                                                <div class="show">
                                                    <a href="#" title="">Shop All</a>
                                                </div>
                                            </div>
                                            <div class="one-third">
                                                <ul class="banner">
                                                    <li>
                                                        <div class="banner-text">
                                                            <div class="banner-title">
                                                                Headphones
                                                            </div>
                                                            <div class="more-link">
                                                                <a href="#" title="">Shop Now <img src="images/icons/right-2.png" alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="banner-img">
                                                            <img src="images/banner_boxes/menu-01.png" alt="">
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </li>
                                                    <li>
                                                        <div class="banner-text">
                                                            <div class="banner-title">
                                                                TV & Audio
                                                            </div>
                                                            <div class="more-link">
                                                                <a href="#" title="">Shop Now <img src="images/icons/right-2.png" alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="banner-img">
                                                            <img src="images/banner_boxes/menu-02.png" alt="">
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </li>
                                                    <li>
                                                        <div class="banner-text">
                                                            <div class="banner-title">
                                                                Computers
                                                            </div>
                                                            <div class="more-link">
                                                                <a href="#" title="">Shop Now <img src="images/icons/right-2.png" alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="banner-img">
                                                            <img src="images/banner_boxes/menu-03.png" alt="">
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </li>
                                                </ul>	
                                            </div>
                                        </div><!-- /.drop-menu -->
                                    </li>
                                </ul><!-- /.menu -->
                            </div>
                        </div><!-- /.col-md-3 col-2 -->
                        <div class="col-md-9 col-10">
                            <div class="top-search style1">
                                <form action="#" method="get" class="form-search" accept-charset="utf-8">
                                    <div class="cat-wrap cat-wrap-v1">
                                        <select name="category">
                                        <option hidden value="">All Category</option>
                                        <option hidden value="">Cameras</option>
                                        <option hidden value="">Computer</option>
                                        <option hidden value="">Laptops</option>
                                    </select>
                                        <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                        <div class="all-categories">
                                            <div class="cat-list-search">
                                                <div class="title">
                                                    Electronics
                                                </div>
                                                <ul>
                                                    <li>Components</li>
                                                    <li>Laptop</li>
                                                    <li>Monitor</li>
                                                    <li>Mp3 player</li>
                                                    <li>Scanners</li>
                                                </ul>
                                            </div><!-- /.cat-list-search -->
                                            <div class="cat-list-search">
                                                <div class="title">
                                                    Furniture
                                                </div>
                                                <ul>
                                                    <li>Bookcases</li>
                                                    <li>Barstools</li>
                                                    <li>TV stands</li>
                                                    <li>Desks</li>
                                                    <li>Accent chairs</li>
                                                </ul>
                                            </div><!-- /.cat-list-search -->
                                            <div class="cat-list-search">
                                                <div class="title">
                                                    Accessories
                                                </div>
                                                <ul>
                                                    <li>Software</li>
                                                    <li>Mobile</li>
                                                    <li>TV stands</li>
                                                    <li>Printers</li>
                                                    <li>Media</li>
                                                </ul>
                                            </div><!-- /.cat-list-search -->
                                        </div><!-- /.all-categories -->
                                    </div><!-- /.cat-wrap -->
                                    <div class="box-search">
                                        <input type="text" name="search" placeholder="Search what you looking for ?">
                                        <span class="btn-search">
                                            <button type="submit" class="waves-effect"><img src="images/icons/search-2.png" alt=""></button>
                                        </span>
                                        <div class="search-suggestions">
                                            <div class="box-suggestions">
                                                <div class="title">
                                                    Search Suggestions
                                                </div>
                                                <ul>
                                                    <li>
                                                        <div class="image">
                                                            <img src="images/product/other/s05.jpg" alt="">
                                                        </div>
                                                        <div class="info-product">
                                                            <div class="name">
                                                                <a href="#" title="">Razer RZ02-01071500-R3M1</a>
                                                            </div>
                                                            <div class="price">
                                                                <span class="sale">
                                                                    $50.00
                                                                </span>
                                                                <span class="regular">
                                                                    $2,999.00
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="image">
                                                            <img src="images/product/other/s06.jpg" alt="">
                                                        </div>
                                                        <div class="info-product">
                                                            <div class="name">
                                                                <a href="#" title="">Notebook Black Spire V Nitro VN7-591G</a>
                                                            </div>
                                                            <div class="price">
                                                                <span class="sale">
                                                                    $24.00
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="image">
                                                            <img src="images/product/other/14.jpg" alt="">
                                                        </div>
                                                        <div class="info-product">
                                                            <div class="name">
                                                                <a href="#" title="">Apple iPad Mini G2356</a>
                                                            </div>
                                                            <div class="price">
                                                                <span class="sale">
                                                                    $90.00
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="image">
                                                            <img src="images/product/other/02.jpg" alt="">
                                                        </div>
                                                        <div class="info-product">
                                                            <div class="name">
                                                                <a href="#" title="">Razer RZ02-01071500-R3M1</a>
                                                            </div>
                                                            <div class="price">
                                                                <span class="sale">
                                                                    $50.00
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="image">
                                                            <img src="images/product/other/l01.jpg" alt="">
                                                        </div>
                                                        <div class="info-product">
                                                            <div class="name">
                                                                <a href="#" title="">Apple iPad Mini G2356</a>
                                                            </div>
                                                            <div class="price">
                                                                <span class="sale">
                                                                    $24.00
                                                                </span>
                                                                <span class="regular">
                                                                    $2,999.00
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="image">
                                                            <img src="images/product/other/s08.jpg" alt="">
                                                        </div>
                                                        <div class="info-product">
                                                            <div class="name">
                                                                <a href="#" title="">Beats Snarkitecture Headphones</a>
                                                            </div>
                                                            <div class="price">
                                                                <span class="sale">
                                                                    $90.00
                                                                </span>
                                                                <span class="regular">
                                                                    $2,999.00
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div><!-- /.box-suggestions -->
                                            <div class="box-cat">
                                                <div class="cat-list-search">
                                                    <div class="title">
                                                        Categories
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <a href="#">Networking & Internet Devices</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Laptops, Desktops & Monitors</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Hard Drives & Memory Cards</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Printers & Ink</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Networking & Internet Devices</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Computer Accessories</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Software</a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.cat-list-search -->
                                            </div><!-- /.box-cat -->
                                        </div><!-- /.search-suggestions -->
                                    </div><!-- /.box-search -->
                                </form><!-- /.form-search -->
                            </div><!-- /.top-search -->
                            <span class="show-search">
                                <button></button>
                            </span><!-- /.show-search -->
                            <div class="box-cart style1">
                                <div class="inner-box">
                                    <ul class="menu-compare-wishlist">
                                        <li class="compare">
                                            <a href="#" title="">
                                                <img src="images/icons/compare-2.png" alt="">
                                            </a>
                                        </li>
                                        <li class="wishlist">
                                            <a href="#" title="">
                                                <img src="images/icons/wishlist-2.png" alt="">
                                            </a>
                                        </li>
                                    </ul><!-- /.menu-compare-wishlist -->
                                </div><!-- /.inner-box -->
                                <div class="inner-box">
                                    <a href="#" title="">
                                        <div class="icon-cart">
                                            <img src="images/icons/add-cart.png" alt="">
                                            <span>4</span>
                                        </div>
                                        <div class="price">
                                            $0.00
                                        </div>
                                    </a>
                                    <div class="dropdown-box">
                                        <ul>
                                            <li>
                                                <div class="img-product">
                                                    <img src="images/product/other/img-cart-1.jpg" alt="">
                                                </div>
                                                <div class="info-product">
                                                    <div class="name">
                                                        Samsung - Galaxy S6 4G LTE <br />with 32GB Memory Cell Phone
                                                    </div>
                                                    <div class="price">
                                                        <span>1 x</span>
                                                        <span>$250.00</span>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <span class="delete">x</span>
                                            </li>
                                            <li>
                                                <div class="img-product">
                                                    <img src="images/product/other/img-cart-2.jpg" alt="">
                                                </div>
                                                <div class="info-product">
                                                    <div class="name">
                                                        Sennheiser - Over-the-Ear Headphone System - Black
                                                    </div>
                                                    <div class="price">
                                                        <span>1 x</span>
                                                        <span>$250.00</span>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <span class="delete">x</span>
                                            </li>
                                        </ul>
                                        <div class="total">
                                            <span>Subtotal:</span>
                                            <span class="price">$1,999.00</span>
                                        </div>
                                        <div class="btn-cart">
                                            <a href="shop-cart.html" class="view-cart" title="">View Cart</a>
                                            <a href="shop-checkout.html" class="check-out" title="">Checkout</a>
                                        </div>
                                    </div><!-- /.dropdown-box -->
                                </div><!-- /.inner-box -->
                            </div><!-- /.box-cart -->
                        </div><!-- /.col-md-9 col-10 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.header-bottom -->
        </section><!-- /#header -->

        <div class="divider30"></div>

        <section class="flat-row flat-slider style1">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="slider owl-carousel-11 style2">
                            <div class="slider-item style4">
                                <div class="item-text">
                                    <div class="header-item">
                                        <p>Enhanced Technology</p>
                                        <h2 class="name">SMART <span>TV</span></h2>
                                        <p>The ship set ground on the shore of this uncharted desert isle
                                        with Gilligan the Skipper too the millionaire and his story.</p>
                                    </div>
                                    <div class="content-item">
                                        <div class="price">
                                            <span class="sale">$2.456.90</span>
                                            <span class="btn-shop">
                                                <a href="#" title="">SHOP NOW <img src="images/icons/right-2.png" alt=""></a>
                                            </span>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="regular">
                                            $2.500.99
                                        </div>
                                    </div>
                                </div>
                                <div class="item-image">
                                    <img src="images/slider/01.png" alt="">
                                </div>
                            </div><!-- /.slider-item style4 -->
                            <div class="slider-item style4">
                                <div class="item-text">
                                    <div class="header-item">
                                        <p>Enhanced Technology</p>
                                        <h2 class="name">SMART <span>TV</span></h2>
                                        <p>The ship set ground on the shore of this uncharted desert isle
                                        with Gilligan the Skipper too the millionaire and his story.</p>
                                    </div>
                                    <div class="content-item">
                                        <div class="price">
                                            <span class="sale">$1.589.99</span>
                                            <span class="btn-shop">
                                                <a href="#" title="">SHOP NOW <img src="images/icons/right-2.png" alt=""></a>
                                            </span>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="regular">
                                            $2.500.99
                                        </div>
                                    </div>
                                </div>
                                <div class="item-image">
                                    <img src="images/slider/01.png" alt="">
                                </div>
                                <div class="clearfix"></div>
                            </div><!-- /.slider-item style4 -->
                            <div class="slider-item style4">
                                <div class="item-text">
                                    <div class="header-item">
                                        <p>Enhanced Technology</p>
                                        <h2 class="name">SMART <span>TV</span></h2>
                                        <p>The ship set ground on the shore of this uncharted desert isle
                                        with Gilligan the Skipper too the millionaire and his story.</p>
                                    </div>
                                    <div class="content-item">
                                        <div class="price">
                                            <span class="sale">$2.456.90</span>
                                            <span class="btn-shop">
                                                <a href="#" title="">SHOP NOW <img src="images/icons/right-2.png" alt=""></a>
                                            </span>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="regular">
                                            $2.500.99
                                        </div>
                                    </div>
                                </div>
                                <div class="item-image">
                                    <img src="images/slider/01.png" alt="">
                                </div>
                            </div><!-- /.slider-item style4 -->
                            <div class="slider-item style4">
                                <div class="item-text">
                                    <div class="header-item">
                                        <p>Enhanced Technology</p>
                                        <h2 class="name">SMART <span>TV</span></h2>
                                        <p>The ship set ground on the shore of this uncharted desert isle
                                        with Gilligan the Skipper too the millionaire and his story.</p>
                                    </div>
                                    <div class="content-item">
                                        <div class="price">
                                            <span class="sale">$1.589.99</span>
                                            <span class="btn-shop">
                                                <a href="#" title="">SHOP NOW <img src="images/icons/right-2.png" alt=""></a>
                                            </span>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="regular">
                                            $2.500.99
                                        </div>
                                    </div>
                                </div>
                                <div class="item-image">
                                    <img src="images/slider/01.png" alt="">
                                </div>
                                <div class="clearfix"></div>
                            </div><!-- /.slider-item style4 -->
                            <div class="slider-item style4">
                                <div class="item-text">
                                    <div class="header-item">
                                        <p>Enhanced Technology</p>
                                        <h2 class="name">SMART <span>TV</span></h2>
                                        <p>The ship set ground on the shore of this uncharted desert isle
                                        with Gilligan the Skipper too the millionaire and his story.</p>
                                    </div>
                                    <div class="content-item">
                                        <div class="price">
                                            <span class="sale">$2.456.90</span>
                                            <span class="btn-shop">
                                                <a href="#" title="">SHOP NOW <img src="images/icons/right-2.png" alt=""></a>
                                            </span>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="regular">
                                            $2.500.99
                                        </div>
                                    </div>
                                </div>
                                <div class="item-image">
                                    <img src="images/slider/01.png" alt="">
                                </div>
                            </div><!-- /.slider-item style4 -->
                            <div class="slider-item style4">
                                <div class="item-text">
                                    <div class="header-item">
                                        <p>Enhanced Technology</p>
                                        <h2 class="name">SMART <span>TV</span></h2>
                                        <p>The ship set ground on the shore of this uncharted desert isle
                                        with Gilligan the Skipper too the millionaire and his story.</p>
                                    </div>
                                    <div class="content-item">
                                        <div class="price">
                                            <span class="sale">$1.589.99</span>
                                            <span class="btn-shop">
                                                <a href="#" title="">SHOP NOW <img src="images/icons/right-2.png" alt=""></a>
                                            </span>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="regular">
                                            $2.500.99
                                        </div>
                                    </div>
                                </div>
                                <div class="item-image">
                                    <img src="images/slider/01.png" alt="">
                                </div>
                                <div class="clearfix"></div>
                            </div><!-- /.slider-item style4 -->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="banner-box">
                            <div class="inner-box">
                                <a href="#" title="">
                                    <img src="images/banner_boxes/02.png" alt="">
                                </a>
                            </div><!-- /.inner-box -->
                            <div class="inner-box">
                                <a href="#" title="">
                                    <img src="images/banner_boxes/01.png" alt="">
                                </a>
                            </div><!-- /.inner-box -->
                            <div class="clearfix"></div>
                        </div><!-- /.box -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-slider -->