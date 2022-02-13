@extends('frontend.layouts.master')
@section('title') Search Products  @endsection
@section('styles')
<style>

    .product-cat label {
        display: block;
    }
    button.pull-right {
        float: right;
    }

</style>

</style>
@endsection
@section('breadcrumb')

   <!-- BREADCRUMBS SETCTION START -->
   <div class="breadcrumbs-section plr-200 mb-80 section">
            <div class="{{($product_banner == null) ? 'breadcrumbs':''}} overlay-bg" @if($product_banner !== null) style="background: #f6f6f6 url('{{asset('/images/uploads/banners/'.@$product_banner->image)}}') no-repeat scroll center center;" @endif>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">Search Result For: <strong>{{@$query}} </strong></h1>

                                <ol class="breadcrumb">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="{{route('product.frontend')}}">Product</a></li>
                                    <li class="active">Search </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS SETCTION END -->
@endsection


@section('content')

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

                        @include('frontend.pages.products.sidebar')

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
            var searchq = '{{$query}}';

            var url = '{{ route("productsearch.filter") }}';
            $.ajax({
                url:"/products/search?page="+page,
                data:{scategory:scategory,pattribute:pattribute,orderby:orderby,pcategory:pcategory,s:s,searchby:searchq},
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
