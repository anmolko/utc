@extends('frontend.layouts.master')
@section('title') {{ucwords(@$product_primary_category->name)}}  @endsection
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
                            
                            <li class="trail-item">
                                <a href="{{route('product.frontend')}}" title="">Product</a>
                                <span><img src="{{asset('assets/frontend/images/icons/arrow-right.png')}}" alt=""></span>
                            </li>
                            
                            <li class="trail-end">
                                <a href="#" title="">{{ucwords(@$product_primary_category->name)}}</a>
                            </li>
                        </ul><!-- /.breacrumbs -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-breadcrumb -->
    <!-- BREADCRUMBS SETCTION END -->
@endsection

@section('content')

   <!-- Start page content -->
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
                    @if(count(@$product_banners) > 1)
                
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
                     
                        <div class="sort-product">
                            {{ $allProducts->links('vendor.pagination.simple-pagination') }}
                          
                            <div class="sort">
                                <div class="popularity">
                                    <select class="orderby">
                                            <option selected disabled>Sort By</option>
                                            <option value="latest">Latest</option>
                                            <option value="old">Oldest</option>
                                            <option value="asc">Name(A to Z)</option>
                                            <option value="desc">Name(Z to A)</option>

                                    </select>
                                </div>
                              
                            </div><!-- /.sort -->
                            <div class="clearfix"></div>
                        </div><!-- /.sort-product -->
                        <div id="loading" style="" ></div>
                            <div id="content-loader">
                                <div class="tab-product">
                                
                                    <div class="row sort-box">
                                        @if(count($allProducts) > 0)
                                            @foreach(@$allProducts as $product)
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="product-box">
                                                    <div class="imagebox">
                                                        @if($product->state == "new_arrival")
                                                            <span class="item-new">NEW</span>
                                                        @elseif($product->state == "sale")
                                                            <span class="item-sale">SALE</span>
                                                        @endif
                                                        <div class="box-image single-image">
                                                            <a href="{{route('product.single',@$product->slug)}}" title="">
                                                                <img src="<?php if(@$product->thumbnail){?>{{asset('/images/uploads/products/'.@$product->thumbnail)}}<?php }?>" alt="{{@$product->slug}}"/>
                                                            </a>
                                                            
                                                        </div><!-- /.box-image -->
                                                        <div class="box-content">
                                                            <div class="cat-name">
                                                                <a href="#" title="">{{@ucwords($product->type)}}</a>
                                                            </div>
                                                            <div class="product-name">
                                                                <a href="{{route('product.single',@$product->slug)}}" title="">{{ucwords(Str::limit(@$product->name,40,' ...'))}}</a>
                                                            </div>
                                                            <div class="price">
                                                                @if($product->state == "sale")
                                                                    <span class="sale">NPR {{number_format(@$product->discount_price)}}</span>
                                                                    <span class="regular">NPR {{number_format(@$product->price)}}</span>
                                                                @else
                                                                    <span class="sale">NPR {{number_format(@$product->price)}}</span>
                                                                @endif
                                                            </div>
                                                        </div><!-- /.box-content -->
                                                        <div class="box-bottom">
                                                            <div class="btn-add-cart">
                                                                <a href="#" title="">
                                                                    <img src="{{asset('assets/frontend/images/icons/add-cart.png')}}" alt="">Add to Cart
                                                                </a>
                                                            </div>
                                                         
                                                        </div><!-- /.box-bottom -->
                                                    </div><!-- /.imagebox -->
                                                </div>
                                            </div><!-- /.col-lg-4 col-sm-6 -->
                                            @endforeach
                                        @endif
                                      
                                    
                                    </div><!-- /.sort-box -->
                                </div><!-- /.tab-product -->
                            </div>
                        </div>
                    </div><!-- /.wrap-imagebox -->
                        {{ $allProducts->appends($_GET)->links('vendor.pagination.product-pagination') }}
                </div><!-- /.main-shop -->
            </div><!-- /.col-md-8 col-lg-9 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</main><!-- /#shop -->
    <!-- End page content -->
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $(document).on('click', '.flat-pagination a', function(event){
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
            var min_price = $('#min_price').val();
            var max_price = $('#max_price').val();
            var pattribute = get_filter('product-attribute');
            var pbrand = get_filter('product-brand');
            var orderby = $('.orderby').val();
            var pcategory = '{{$product_primary_category->slug}}';
            var s = $('.searchby').val();
            var url = '{{ route("product.categoryfilter") }}';
            $.ajax({
                url:"/product/pcategory?page="+page,
                data:{pcategory:pcategory,min_price:min_price,pattribute:pattribute,pbrand:pbrand,orderby:orderby,max_price:max_price,s:s},
                type: 'get',
                contentType: "application/json; charset=utf-8",
                beforeSend:function(){
                  $('#loading').show(); // loader

                  if(!clicked){
                     $('#content-loader').html('');
                     $('.showing').html('');
                     $('.allpagination').html('');

                  }
                }
            }).done(function(data){
               setTimeout(function(){
                  $('#loading').hide();
                    $('#content-loader').html(data.view);
                    $('.showing').html(data.topnav);
                    $('.allpagination').html(data.alltopnav);

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

        $("#slider-range").on("slidestop", function(event, ui) {
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
