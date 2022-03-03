<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
                <aside class="sidebar sidebar-user">
                    <div class="row">
                        <div class="col-12">
                            <div class="card ctm-border-radius shadow-sm grow">
                                <div class="card-body py-4">
                                    <div class="row">
                                        <div class="col-md-12 mr-auto text-left">
                                            <div class="custom-search input-group">
                                                <div class="custom-breadcrumb">
                                                    <ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
                                                        <li class="breadcrumb-item d-inline-block"><a href="{{route('dashboard')}}" class="text-dark">Home</a></li>
                                                        <li class="breadcrumb-item d-inline-block active">{{str_replace('-',' ',ucfirst((Request::segment(2)) ? Request::segment(2): Request::segment(1) ))}}</li>
                                                    </ol>
                                                    <h4 class="text-dark">{{str_replace('-',' ',ucfirst((Request::segment(2)) ? Request::segment(2): Request::segment(1)))}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(Request::segment(2) == 'dashboard')
                    <div class="user-card card shadow-sm bg-white text-center ctm-border-radius grow">
                        <div class="user-info card-body">
                            <div class="user-avatar mb-4">
                                <img src="{{(!empty(Auth::user()->image)) ? '/images/uploads/profiles/'.Auth::user()->image : '/images/uploads/profiles/default-profile.png'}}" alt="User Avatar" class="img-fluid rounded-circle" width="100">
                            </div>
                            <div class="user-details">
                                <h4><b>Welcome {{ucwords(Auth::user()->name)}}</b></h4>
                                <p>{{\Carbon\Carbon::parse(Auth::user()->created_at)->isoFormat('MMMM Do, YYYY')}}</p>
                            </div>
                        </div>
                    </div>
                    @elseif(Request::segment(2) == 'profile')
                        <div class="user-card card shadow-sm bg-white text-center ctm-border-radius grow">
                            <div class="user-info card-body">
                                <div class="user-avatar mb-4">
                                    <img src="{{(!empty(Auth::user()->image)) ? '/images/uploads/profiles/'.Auth::user()->image : '/images/uploads/profiles/default-profile.png'}}" alt="User Avatar" class="img-fluid rounded-circle" width="100">
                                </div>
                                <div class="user-details">
                                    <h4><b>{{ucwords(Auth::user()->name)}}</b></h4>
                                    <p>{{Auth::user()->email}}</p>
                                </div>
                            </div>
                        </div>
                    @endif


                    <div class="sidebar-wrapper d-lg-block d-md-none d-none">
                        <div class="card ctm-border-radius shadow-sm border-none grow">
                            <div class="card-body">
                                <div class="row no-gutters">
                                    <div class="col-6 align-items-center text-center">
                                        <a href="{{route('dashboard')}}" class="{{(Request::segment(2) == 'dashboard') ? "text-white active":"text-dark"}} p-4 first-slider-btn ctm-border-right ctm-border-left ctm-border-top"><span class="lnr lnr-home pr-0 pb-lg-2 font-23"></span><span class="">Dashboard</span></a>
                                    </div>
                                    <div class="col-6 align-items-center text-center">
                                        <a href="{{route('user.index')}}" class="{{(Request::segment(2) == 'user') ? "text-white active":"text-dark"}} p-4 second-slider-btn ctm-border-right ctm-border-top" title="User Management"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">All Users</span></a>
                                    </div>
{{--                                    <div class="col-6 align-items-center shadow-none text-center">--}}
{{--                                        <a href="{{route('pages.index')}}" class="{{(Request::segment(2) == 'pages') ? "text-white active":"text-dark"}} p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-file-empty pr-0 pb-lg-2 font-23"></span><span class="">Pages</span></a>--}}
{{--                                    </div>--}}
                                    <div class="col-6 align-items-center shadow-none text-center">
                                        <a href="{{route('menu.index')}}" class="{{(Request::segment(2) == 'manage-menus') ? "text-white active":"text-dark"}} p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-menu pr-0 pb-lg-2 font-23"></span><span class="">Menu</span></a>
                                    </div>
                                    <div class="col-6 align-items-center shadow-none text-center">
                                        <a href="{{route('brands.index')}}" class="{{(Request::segment(2) == 'brands') ? "text-white active":"text-dark"}} p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-bold pr-0 pb-lg-2 font-23"></span><span class="">Brands</span></a>
                                    </div>
                                    <div class="col-6 align-items-center shadow-none text-center" >
                                        <a href="{{route('proprimarycat.index')}}" class="{{(Request::segment(2) == 'product-categories') ? "text-white active":"text-dark"}} p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-layers pr-0 pb-lg-2 font-23"></span><span class="">Categories</span></a>
                                    </div>
                                    <div class="col-6 align-items-center shadow-none text-center">
                                        <a href="{{route('productattribute.index')}}" class="{{(Request::segment(2) == 'product-attribute') ? "text-white active":"text-dark"}} p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-text-format pr-0 pb-lg-2 font-23"></span><span class="">Attributes</span></a>
                                    </div>
                                    <div class="col-6 align-items-center shadow-none text-center">
                                        <a href="{{route('specification.index')}}" class="{{(Request::segment(2) == 'specifications') ? "text-white active":"text-dark"}} p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-star-empty pr-0 pb-lg-2 font-23"></span><span class="">Specification</span></a>
                                    </div>
                                    <div class="col-6 align-items-center shadow-none text-center" >
                                        <a href="{{route('products.index')}}" class="{{(Request::segment(2) == 'products') ? "text-white active":"text-dark"}} p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-tag pr-0 pb-lg-2 font-23"></span><span class="">Products</span></a>
                                    </div>
{{--                                    <div class="col-6 align-items-center shadow-none text-center">--}}
{{--                                        <a href="{{route('products.index')}}" class="{{(Request::segment(2) == 'product-attributes') ? "text-white active":"text-dark"}} p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-text-format pr-0 pb-lg-2 font-23"></span><span class="">Dummy</span></a>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-6 align-items-center shadow-none text-center">--}}
{{--                                        <a href="{{route('clients.index')}}" class="{{(Request::segment(2) == 'clients') ? "text-white active":"text-dark"}} p-4 ctm-border-right"><span class="lnr lnr-user pr-0 pb-lg-2 font-23"></span><span class="">Clients</span></a>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-6 align-items-center shadow-none text-center">--}}
{{--                                        <a href="{{route('testimonials.index')}}" class="{{(Request::segment(2) == 'testimonials') ? "text-white active":"text-dark"}} p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-star-half pr-0 pb-lg-2 font-23"></span><span class="">Testimonials</span></a>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-6 align-items-center shadow-none text-center">--}}
{{--                                        <a id="service-cat" href="{{route('service-category.index')}}" class="{{(Request::segment(2) == 'service-category') ? "text-white active":"text-dark"}} p-4 ctm-border-right" data-original-title="Service Category"><span class="lnr lnr-tag pr-0 pb-lg-2 font-23"></span><span class="">Category</span></a>--}}
{{--                                    </div>--}}
                                    <div class="col-6 align-items-center shadow-none text-center">
                                        <a href="{{route('ad.index')}}" class="{{(Request::segment(2) == 'ads') ? "text-white active":"text-dark"}} p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-bullhorn pr-0 pb-lg-2 font-23"></span><span class="">Ads</span></a>
                                    </div>
                                    <div class="col-6 align-items-center shadow-none text-center">
                                        <a href="{{route('orders.index')}}" class="{{(Request::segment(1) == 'orders') ? "text-white active":"text-dark"}} p-4 ctm-border-right"><span class="lnr lnr-cart pr-0 pb-lg-2 font-23"></span><span class="">Orders</span></a>
                                    </div>
                                    <div class="col-6 align-items-center shadow-none text-center">
                                        <a href="{{route('sliders.index')}}" class="{{(Request::segment(2) == 'sliders') ? "text-white active":"text-dark"}} p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-picture pr-0 pb-lg-2 font-23"></span><span class="">Sliders</span></a>
                                    </div>
                                    <div class="col-6 align-items-center shadow-none text-center">
                                        <a href="{{route('blogcategory.index')}}" class="{{(Request::segment(2) == 'blog-category') ? "text-white active":"text-dark"}} p-4 ctm-border-right"><span class="lnr lnr-book pr-0 pb-lg-2 font-23"></span><span class="">Blog</span></a>
                                    </div>

                                    <div class="col-6 align-items-center shadow-none text-center">
                                        <a href="{{route('setting.index')}}" class="{{(Request::segment(2) == 'settings') ? "text-white active":"text-dark"}} p-4 last-slider-btn1 ctm-border-right ctm-border-left"><span class="lnr lnr-cog pr-0 pb-lg-2 font-23"></span><span class="">Settings</span></a>
                                    </div>
                                    <div class="col-6 align-items-center shadow-none text-center">
                                        <a href="{{route('profile')}}" class="{{(Request::segment(2) == 'profile') ? "text-white active":"text-dark"}} p-4 last-slider-btn ctm-border-right"><span class="lnr lnr-smile pr-0 pb-lg-2 font-23"></span><span class="">Profile</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </aside>
            </div>
