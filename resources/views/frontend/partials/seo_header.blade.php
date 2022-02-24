<!doctype html>
<html class="no-js" lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Universal Trading Concern">
    <link rel="canonical" href="https://universaltrading.com.np/" />
    @yield('seo')
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php if(@$setting_data->favicon){?>{{asset('/images/uploads/settings/'.@$setting_data->favicon)}}<?php }?>">

    <!-- All CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/style.css')}}">

    <!-- Reponsive -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/responsive.css')}}">


    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/toastr.min.css')}}">

       <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id={{@$setting_data->google_analytics}}"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', '{{@$setting_data->google_analytics}}');
    

    </script>
    <style>
        .img.social-whatsapp i {
            font-size: xxx-large;
        }
        .header-middle #logo a img {
            max-height: 90px;
        }
        .widget-about .logo-ft a img {
            height: 90px;
        }

        .widget-ft.widget-about.logo-details {
            display: flex;
        }
    </style>
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

            <div class="header-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="logo" class="logo style1">
                                <a href="/" title="Universal Trading Concern">
                                    <img src="<?php if(@$setting_data->logo_white){?>{{asset('/images/uploads/settings/'.@$setting_data->logo_white)}}<?php }?>" alt="Universal Trading Concern">
                                </a>
                            </div><!-- /#logo -->
                            <div class="nav-wrap">
                                <div id="mainnav" class="mainnav style1">
                                    <ul class="menu">
                                        <li><a href="/" class="column-1 {{request()->is('/') ? 'active' : ''}}">Home</a>
                                        </li>
                                        <li class="has-mega-menu">
                                            <a href="#" title="">Electronic</a>
                                            <div class="submenu">
                                            @foreach(@$product_primary_data->chunk(4) as $row)

                                                <div class="row">
                                                    @foreach(@$row as $product_primary)
                                                        <div class="col-md-3">
                                                        <a href="{{route('product.category',$product_primary->slug)}}" title=""><h3 class="cat-title">{{ucwords(@$product_primary->name)}}</h3></a>
                                                            <ul>
                                                                @foreach(@$product_primary->secondary as $product_secondary)
                                                                    <li>
                                                                        <a href="{{route('product.secondary',[@$product_primary->slug,@$product_secondary->slug])}}" title="">{{ucwords(@$product_secondary->name)}}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>

                                                        </div><!-- /.col-md-3 -->
                                                    @endforeach
                                                </div><!-- /.row -->
                                             @endforeach
                                            </div><!-- /.submenu -->
                                        </li>

                                        @if(!empty($top_nav_data))
                                            @foreach($top_nav_data as $nav)
                                            @if(!empty($nav->children[0]))

                                            @else
                                                @if($nav->type == 'custom')
                                                <li>
                                                    <a href="/{{$nav->slug}}" class="column-1 {{request()->is(@$nav->slug.'*') ? 'active' : ''}}" @if($nav->target == NULL)  @else target="{{$nav->target}}" @endif>@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
                                                @elseif($nav->type == 'category')
                                                <li >
                                                    <a href="{{url('product')}}/{{$nav->slug}}" class="column-1 {{request()->is('product/'.@$nav->slug.'*') ? 'active' : ''}}">@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
                                                @elseif($nav->type == 'post')
                                                <li >
                                                    <a href="{{url('blog')}}/{{$nav->slug}}" class="column-1 {{request()->is('blog/'.@$nav->slug.'*') ? 'active' : ''}}">@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
                                                @else
                                                <li>
                                                    <a href="{{url('/')}}/{{$nav->slug}}" class="column-1 {{request()->is(@$nav->slug.'*') ? 'active' : ''}}">@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
                                                @endif
                                            @endif
                                            @endforeach
                                        @endif
                                    </ul><!-- /.menu -->
                                </div><!-- /.mainnav -->
                            </div><!-- /.nav-wrap -->
                            <div class="btn-menu style1">
                                <span></span>
                            </div><!-- //mobile menu button -->
                            <ul class="flat-infomation style1">
                                <li class="phone">
                                    <img src="{{asset('assets/frontend/images/icons/call-3.png')}}" alt="">
                                    Call Us: <a href="tel:@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @else +977 1234567 @endif" title="">@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @else +977 1234567 @endif</a>
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
                                <div class="btn-mega"><span></span>Laptops By Brand</div>
                                @if(count($product_brand_data) > 0)
                                <ul class="menu">
                                    @foreach(@$product_brand_data as $product_brand)
                                        <li>
                                            <a href="{{route('product.brand',@$product_brand->slug)}}" title="" class="dropdown">
                                                <span class="menu-title">
                                                    {{ucwords(@$product_brand->name)}}
                                                </span>
                                            </a>
                                            @if(count($product_brand->series) > 0)
                                                <div class="drop-menu">
                                                    <div class="one-third">
                                                        <div class="cat-title">
                                                        {{ucwords(@$product_brand->name)}}
                                                        </div>
                                                        <ul>
                                                        @foreach(@$product_brand->series as $product_series)

                                                            <li>
                                                                <a href="{{route('product.brandseries',[@$product_brand->slug,@$product_series->slug])}}" title="">{{ucwords(@$product_series->name)}}</a>
                                                            </li>
                                                        @endforeach

                                                        </ul>
                                                        <div class="show">
                                                            <a href="{{route('product.brand',@$product_brand->slug)}}" title="">Shop All</a>
                                                        </div>
                                                    </div>

                                                </div><!-- /.drop-menu -->
                                            @endif
                                        </li>


                                    @endforeach
                                </ul><!-- /.menu -->
                                @endif
                            </div>
                        </div><!-- /.col-md-3 col-2 -->
                        <div class="col-md-9 col-10">
                            <div class="top-search style1">
                                <form action="{{route('searchProduct')}}" method="get" class="form-search" accept-charset="utf-8">

                                    <div class="box-search">
                                        <input type="text" name="s" class="searchby" autocomplete="off" id="search_suggestion" placeholder="Search what you looking for ?" oninvalid="this.setCustomValidity('Type a keyword')" oninput="this.setCustomValidity('')" required>
                                        <span class="btn-search">
                                            <button type="submit" class="waves-effect"><img src="{{asset('assets/frontend/images/icons/search-2.png')}}" alt=""></button>
                                        </span>
                                        <div class="search-suggestions" id="search-suggestions">

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
                                            <a href="{{route('front-user.index')}}" title="">
                                                <img src="{{asset('assets/frontend/images/icons/user.png')}}" alt="">
                                            </a>
                                        </li>
                                        <li class="wishlist">
                                            <a href="#" title="">
                                                <img src="{{asset('assets/frontend/images/icons/wishlist-2.png')}}" alt="">
                                            </a>
                                        </li>
                                    </ul><!-- /.menu-compare-wishlist -->
                                </div><!-- /.inner-box -->
                                <div class="inner-box">
                                    <a href="#" title="">
                                        <div class="icon-cart">
                                            <img src="{{asset('assets/frontend/images/icons/add-cart.png')}}" alt="">
                                            <span>{{ \Cart::getTotalQuantity()}}</span>
                                        </div>
                                       
                                    </a>
                                   
                                    @if(count(\Cart::getContent()) > 0)
                                    <div class="dropdown-box">
                                        <ul>
                                        @foreach(\Cart::getContent() as $item)
                                            <li >
                                                <div class="img-product">
                                                    <img src="/images/uploads/products/{{ $item->attributes->image }}" alt="">
                                                </div>
                                                <div class="info-product">
                                                    <div class="name">
                                                        {{$item->name}}
                                                    </div>
                                                    <div class="price">
                                                        <span>{{$item->quantity}} x</span>
                                                        <span>NPR. {{ \Cart::get($item->id)->getPriceSum() }}.00</span>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <form action="{{ route('cart.remove') }}" id="delete_{{$item->id}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                                    <span class="delete" onclick="document.getElementById('delete_{{$item->id}}').submit();">x</span>
                                                </form>
                                                
                                            </li>
                                            
                                        @endforeach
                                        </ul>
                                        <div class="total">
                                            <span>Subtotal:</span>
                                            <span class="price">NPR. {{ number_format(\Cart::getTotal()) }}.00</span>
                                        </div>
                                        <div class="btn-cart">
                                            <a href="{{ route('cart.list') }}" class="view-cart" title="">View Cart</a>
                                            <a href="/" class="check-out" title="">Checkout</a>
                                        </div>
                                    </div>
                                    @else
                                    <div class="dropdown-box">
                                            <p class="text-danger">Your Shopping Cart is Empty</p>
                                    </div>

                                    @endif
                                    
                                </div><!-- /.inner-box -->
                            </div><!-- /.box-cart -->
                        </div><!-- /.col-md-9 col-10 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.header-bottom -->
        </section><!-- /#header -->


        @yield('slider')
        @yield('breadcrumb')

      
