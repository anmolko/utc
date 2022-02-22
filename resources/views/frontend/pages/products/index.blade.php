@extends('frontend.layouts.master')
@section('title') Products  @endsection
@section('styles')
<style>


</style>

@endsection
@section('breadcrumb')

   <!-- BREADCRUMBS SETCTION START -->
        <section class="flat-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumbs">
                            <li class="trail-item">
                                <a href="/" title="">Home</a>
                                <span><img src="{{asset('assets/frontend/images/icons/arrow-right.png')}}" alt=""></span>
                            </li>
                            
                            <li class="trail-end">
                                <a href="#" title="">Products</a>
                            </li>
                        </ul><!-- /.breacrumbs -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-breadcrumb -->
    <!-- BREADCRUMBS SETCTION END -->
@endsection
@section('content')

<main id="shop">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-3">
                <div class="sidebar ">
                    @include('frontend.pages.products.sidebar')
                  
                  
                </div><!-- /.sidebar -->
            </div><!-- /.col-md-4 col-lg-3 -->
            <div class="col-md-8 col-lg-9">
                <div class="main-shop">
                    @if(count(@$product_banners) > 0)
                
                    <div class="slider owl-carousel-16 style1">
                        @foreach(@$product_banners as $product_banner)

                        <div class="slider-item style9">
                            
                            <div class="item-image">
                                <img src="<?php if(@$product_banner->image){?>{{asset('/images/uploads/products/banner_gallery/'.@$product_banner->image)}}<?php }?>" alt="">
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- /.slider-item style9 -->
                       @endforeach
                    </div><!-- /.slider -->
                    @endif
                    <div class="wrap-imagebox">
                        <div class="flat-row-title style1">
                            <h3>Product Lists</h3>
                            <span>
                                Showing 1–15 of 20 results
                            </span>
                            <div class="clearfix"></div>
                        </div>
                        <div class="sort-product">
                          
                            <div class="sort">
                                <div class="popularity">
                                    <select name="popularity">
                                        <option value="">Sort by popularity</option>
                                        <option value="">Sort by popularity</option>
                                        <option value="">Sort by popularity</option>
                                        <option value="">Sort by popularity</option>
                                    </select>
                                </div>
                                <div class="showed">
                                    <select name="showed">
                                        <option value="">Show 15</option>
                                        <option value="">Show 15</option>
                                        <option value="">Show 15</option>
                                        <option value="">Show 15</option>
                                    </select>
                                </div>
                            </div><!-- /.sort -->
                            <div class="clearfix"></div>
                        </div><!-- /.sort-product -->
                        <div class="tab-product">
                         
                            <div class="row sort-box">
                               
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-box">
                                        <div class="imagebox">
                                            <span class="item-sale">SALE</span>
                                            <div class="box-image owl-carousel-1">
                                                <a href="#" title="">
                                                    <img src="images/product/other/04.jpg" alt="">
                                                </a>
                                                <a href="#" title="">
                                                    <img src="images/product/other/04.jpg" alt="">
                                                </a>
                                                <a href="#" title="">
                                                    <img src="images/product/other/04.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Computers</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple İmac Z0SC4824<br />Retina</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$5,759.68</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox -->
                                    </div>
                                </div><!-- /.col-lg-4 col-sm-6 -->
                            
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-box">
                                        <div class="imagebox">
                                            <span class="item-new">NEW</span>
                                            <div class="box-image owl-carousel-1">
                                                <a href="#" title="">
                                                    <img src="images/product/other/01.jpg" alt="">
                                                </a>
                                                <a href="#" title="">
                                                    <img src="images/product/other/01.jpg" alt="">
                                                </a>
                                                <a href="#" title="">
                                                    <img src="images/product/other/01.jpg" alt="">
                                                </a>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="#" title="">Laptops</a>
                                                </div>
                                                <div class="product-name">
                                                    <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                                </div>
                                                <div class="price">
                                                    <span class="sale">$1,250.00</span>
                                                    <span class="regular">$2,999.00</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="#" title="">
                                                        <img src="images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagebox -->
                                    </div>
                                </div><!-- /.col-lg-4 col-sm-6 -->
                               
                            </div><!-- /.sort-box -->
                        </div><!-- /.tab-product -->
                    </div><!-- /.wrap-imagebox -->
                    <div class="blog-pagination">
                        <span>
                            Showing 1–15 of 20 results
                        </span>
                        <ul class="flat-pagination style1">
                            <li class="prev">
                                <a href="#" title="">
                                    <img src="images/icons/left-1.png" alt="">Prev Page
                                </a>
                            </li>
                            <li>
                                <a href="#" class="waves-effect" title="">01</a>
                            </li>
                            <li>
                                <a href="#" class="waves-effect" title="">02</a>
                            </li>
                            <li class="active">
                                <a href="#" class="waves-effect" title="">03</a>
                            </li>
                            <li>
                                <a href="#" class="waves-effect" title="">04</a>
                            </li>
                            <li class="next">
                                <a href="#" title="">
                                    Next Page<img src="images/icons/right-1.png" alt="">
                                </a>
                            </li>
                        </ul><!-- /.flat-pagination style1 -->
                        <div class="clearfix"></div>
                    </div><!-- /.blog-pagination -->
                </div><!-- /.main-shop -->
            </div><!-- /.col-md-8 col-lg-9 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</main><!-- /#shop -->
   <!-- Start page content -->
   <div id="page-content" class="page-wrapper section">

        <!-- SHOP SECTION START -->
        <div class="shop-section mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 order-lg-2 order-1">
                        <div class="shop-content">
                            <!-- shop-option start -->
                            <div class="shop-option box-shadow mb-30 clearfix">
                                <!-- Nav tabs -->
                                <ul class="nav shop-tab f-left" role="tablist">
                                    <li>
                                        <a class="active" href="#grid-view" data-bs-toggle="tab"><i class="zmdi zmdi-view-module"></i></a>
                                    </li>
                                    <li>
                                        <a href="#list-view" data-bs-toggle="tab"><i class="zmdi zmdi-view-list-alt"></i></a>
                                    </li>
                                </ul>

                                <!-- short-by -->
                                <div class="short-by f-left text-center">
                                    <span>Sort by :</span>
                                    <select class="orderby">
                                            <option selected disabled>Choose One</option>
                                            <option value="latest">Latest</option>
                                            <option value="old">Oldest</option>
                                            <option value="asc">Name(A to Z)</option>
                                            <option value="desc">Name(Z to A)</option>

                                    </select>
                                </div>

                                 <!-- showing -->
                                 <div class="showing f-right text-right">
                                 {{ $allProducts->links('vendor.pagination.simple-pagination') }}

                                </div>

                            </div>
                            <!-- shop-option end -->
                            <!-- Tab Content start -->
                            <div id="loading" style="" ></div>
                            <div id="content-loader">
                                <div class="tab-content">
                                    <!-- grid-view -->
                                    <div id="grid-view" class="tab-pane active show" role="tabpanel">
                                        <div class="row">
                                            <!-- product-item start -->
                                            @if(count($allProducts) > 0)
                                                @foreach(@$allProducts as $product)
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="product-item">
                                                            <div class="product-img">
                                                                <a href="{{route('product.single',['category'=>@$product->primaryCategory->slug,'slug'=>@$product->slug])}}">
                                                                    <img src="<?php if(@$product->thumbnail){?>{{asset('/images/uploads/products/'.@$product->thumbnail)}}<?php }?>" alt="{{@$product->slug}}"/>
                                                                </a>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-title">
                                                                    <a href="{{route('product.single',['category'=>@$product->primaryCategory->slug,'slug'=>@$product->slug])}}">{{ucwords(@$product->name)}} </a>
                                                                </h6>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <!-- product-item end -->

                                        </div>
                                    </div>
                                    <!-- list-view -->
                                    <div id="list-view" class="tab-pane" role="tabpanel">
                                        <div class="row">
                                            <!-- product-item start -->
                                            @if(count($allProducts) > 0)
                                                @foreach(@$allProducts as $product)
                                                    <div class="col-lg-12">
                                                        <div class="shop-list product-item">
                                                            <div class="product-img">
                                                                <a href="{{route('product.single',['category'=>@$product->primaryCategory->slug,'slug'=>@$product->slug])}}">
                                                                    <img src="<?php if(@$product->thumbnail){?>{{asset('/images/uploads/products/'.@$product->thumbnail)}}<?php }?>" alt="{{@$product->slug}}"/>
                                                                </a>
                                                            </div>
                                                            <div class="product-info">
                                                                <div class="clearfix">
                                                                    <h6 class="product-title f-left">
                                                                        <a href="{{route('product.single',['category'=>@$product->primaryCategory->slug,'slug'=>@$product->slug])}}">{{ucwords(@$product->name)}} </a>
                                                                    </h6>

                                                                </div>
                                                                <h6 class="brand-name mb-30">{{ucwords(@$product->primaryCategory->name)}}</h6>
                                                                <p>{{Str::limit(@$product->summary,400,' ...')}}</p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <!-- product-item end -->

                                        </div>
                                    </div>
                                </div>
                                    <!-- Tab Content end -->
                                <!-- shop-pagination start -->
                                {{ $allProducts->appends($_GET)->links('vendor.pagination.default') }}

                                <!-- shop-pagination end -->
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 order-lg-1 order-2">


                    </div>
                </div>
            </div>
        </div>
        <!-- SHOP SECTION END -->

    </div>
    <!-- End page content -->
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $(document).on('click', '.shop-pagination a', function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
            filter_data(page);
        });

        filter_data(1);

        function filter_data(page)
        {
            if(page=="" || page=="undefined" || page==null) {
                page = 1;
            }
            var action = 'fetch_data';
            var clicked = false;
            var pcategory = get_filter('primary-category');
            var scategory = get_filter('secondary-category');
            var pattribute = get_filter('product-attribute');
            var orderby = $('.orderby').val();
            var s = $('.searchby').val();

            var url = '{{ route("product.filter") }}';
            $.ajax({
                url:"/products?page="+page,
                data:{scategory:scategory,pattribute:pattribute,orderby:orderby,pcategory:pcategory,s:s},
                type: 'get',
                contentType: "application/json; charset=utf-8",
                beforeSend:function(){
                  $('#loading').show(); // loader

                  if(!clicked){
                     $('#content-loader').html('');
                     $('.showing').html('');

                  }
                }
            }).done(function(data){
               setTimeout(function(){
                  $('#loading').hide();
                    $('#content-loader').html(data.view);
                    $('.showing').html(data.topnav);
                    //  console.log(data.view)

               }, 1000);

            });

        }

        function get_filter(class_name)
        {
            var filter = [];
            $('.'+class_name+':checked').each(function(){
                filter.push($(this).val());
            });
            return filter;
        }

        $('.common-selector').on('click',function(){
            clicked=true;
            filter_data();
        });



        $('.search-product').on('click',function(){
            clicked=true;
            filter_data();
        });


        $('.orderby').on('change',function(){
            clicked=true;
            filter_data();
        });

    });
</script>

@endsection
