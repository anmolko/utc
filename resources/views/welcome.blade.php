@extends('frontend.layouts.master')
@section('title') Home @endsection
@section('slider')

<div class="divider30"></div>

@if(count($sliders) > 0)

<section class="flat-row flat-slider style3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="slider owl-carousel-14">
                    @foreach(@$sliders as $slider)

                    <div class="slider-item style2 v2">
                        <div class="item-text">
                            <div class="header-item">
                                <p>{{ucwords(@$slider->subheading)}}</p>
                                <h2 class="name">{{ucwords(@$slider->heading)}}</h2>
                                <p>{{ucwords(@$slider->description)}} </p>
                            </div>
                            <div class="content-item">
                                @if(@$slider->discount_price)
                                <div class="price">
                                    <span class="sale">NPR. {{number_format(@$slider->discount_price)}}</span>
                                    <span class="btn-shop">
                                        <a href="{{@$slider->button_link}}" title="">SHOP NOW <img src="{{asset('assets/frontend/images/icons/right-2.png')}}" alt=""></a>
                                    </span>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="regular">
                                    NPR. {{number_format(@$slider->price)}}
                                </div>
                                @else
                                <div class="price">
                                    <span class="sale"> NPR. {{number_format(@$slider->price)}}</span>
                                    <span class="btn-shop">
                                        <a href="{{@$slider->button_link}}" title="">SHOP NOW <img src="{{asset('assets/frontend/images/icons/right-2.png')}}" alt=""></a>
                                    </span>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="regular">
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="item-image">
                            <img src="{{asset('/images/uploads/sliders/'.$slider->image) }}" alt="">
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- /.slider -->
                    @endforeach

                </div><!-- /.slider -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-slider -->
@endif


@endsection

@section('content')
 <!-- START PAGE CONTENT -->
 @if(count($latestProducts) > 0)
 <section class="flat-row flat-imagebox">
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <div class="box-wrap">
                     <div class="flat-row-title">
                         <h3>Latest Products</h3>
                     </div>
                     <div class="owl-carousel-12">
                         @foreach($latestProducts->chunk(6) as $firstchunk)
                             <div class="box-owl-carousel style1">
                                 @foreach($firstchunk->chunk(3) as $secondchunk)
                                     <div class="rows">
                                         @foreach($secondchunk as $final)
                                             <div class="imagebox style7">
                                                 <div class="box-image latest-product">
                                                     <a href="{{route('product.single',@$final->slug)}}" title="">
                                                         <img src="{{asset('images/uploads/products/'.$final->thumbnail)}}" alt="">
                                                     </a>
                                                 </div>
                                                 <!-- /.box-image -->
                                                 <div class="box-content">
                                                     <div class="cat-name">
                                                         <a href="{{route('product.brand',@$final->brand->slug)}}" title="">{{$final->brand->name}}</a>
                                                     </div>
                                                     <div class="product-name">
                                                         <a href="{{route('product.single',@$final->slug)}}" title="">{{$final->name}}</a>
                                                     </div>
                                                     <div class="price">
                                                         <span class="sale">NPR. {{number_format($final->price)}}.</span>
                                                         {{--                                                        <span class="regular">$2,999.00</span>--}}
                                                     </div>
                                                 </div>
                                                 <!-- /.box-content -->
                                             </div>
                                         @endforeach
                                         <div class="clearfix"></div>
                                     </div>
                                 @endforeach
                             </div>
                     @endforeach
                     <!-- /.box-owl-carousel style1 -->
                     </div>
                     <!-- /.owl-carousel-12 -->
                 </div>
                 <!-- /.box-wrap -->
             </div>
             <!-- /.col-md-9 -->

             <!-- /.col-md-3 -->
         </div>
         <!-- /.row -->
     </div>
     <!-- /.container -->
 </section>
 @endif

 @if(count($laptopbybrands) > 0)

 <section class="flat-row flat-imagebox style1">
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <div class="box-wrap">
                     <div class="flat-row-title">
                         <h3>Laptops</h3>
                     </div>
                     <div class="owl-carousel-12">
                         @foreach($laptopbybrands->chunk(6) as $firstchunk)

                             <div class="box-owl-carousel">
                                 @foreach($firstchunk->chunk(3) as $secondchunk)
                                    <div class="rows">
                                        @foreach($secondchunk as $final)
                                            <div class="imagebox style1 v1">
                                                 <div class="box-image latest-laptop">
                                                     <a href="{{route('product.single',@$final->slug)}}" title="">
                                                         <img src="{{asset('images/uploads/products/'.$final->thumbnail)}}"  alt="">
                                                     </a>
                                                 </div>
                                                 <!-- /.box-image -->
                                                 <div class="box-content">
                                                     <div class="cat-name">
                                                         <a href="{{route('product.brand',@$final->brand->slug)}}" title="">{{$final->brand->name}}</a>
                                                     </div>
                                                     <div class="product-name">
                                                         <a href="{{route('product.single',@$final->slug)}}" title="">{{ucwords(Str::limit(@$final->name,60,' ...'))}} </br></a>
                                                     </div>
                                                     <div class="price">

                                                         <span class="sale">NPR. {{number_format($final->price)}}.</span>
                                                     </div>
                                                 </div>
                                                 <!-- /.box-content -->
                                             </div>
                                        @endforeach
                                     <!-- /.imagbox style1 -->
                                     <div class="clearfix"></div>
                                 </div>
                                 @endforeach

                             </div>
                             <!-- /.box-owl-carousel -->
                         @endforeach


                     </div>
                     <!-- /.owl-carousel-12 -->
                 </div>
                 <!-- /.box-wrap -->
             </div>
             <!-- /.col-md-12 -->
         </div>
         <!-- /.row -->
     </div>
     <!-- /.container -->
 </section>
 <!-- /.flat-imagebox style1 -->
 @endif

 @if(count($electronics) > 0)
    <section class="flat-row flat-imagebox style4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-wrap">
                        <div class="flat-row-title">
                            <h3>Electronic Products</h3>
                        </div>
                        <!-- /.flat-row-title -->
                        <div class="box-owl-carousel margin-box">
                            <div class="owl-carousel-13">
                                @foreach($electronics as $final)
                                    <div class="imagebox style4 v1">
                                        <div class="box-image latest-electronic">
                                            <a href="{{route('product.single',@$final->slug)}}" title="">
                                                <img src="{{asset('images/uploads/products/'.$final->thumbnail)}}" alt="">
                                            </a>
                                        </div>
                                        <!-- /.box-image -->
                                        <div class="box-content">
                                            <div class="cat-name">
                                                <a href="{{route('product.brand',@$final->brand->slug)}}" title="">{{$final->brand->name}}</a>
                                            </div>
                                            <div class="product-name">
                                                <a href="{{route('product.single',@$final->slug)}}" title="">{{ucwords(Str::limit(@$final->name,55,' ...'))}} </a>
                                            </div>
                                            <div class="price">
                                                <span class="sale">NPR. {{number_format($final->price)}}.</span>
                                            </div>
                                        </div>
                                        <!-- /.box-content -->
                                    </div>
                                @endforeach
                            </div>
                            <!-- /.owl-carousel-3 -->
                        </div>
                        <!-- /.owl-carousel-2 -->
                    </div>
                    <!-- /.box-wrap -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.flat-imagebox style4 -->
@endif

@if(count($product_brands) > 0)
    <section class="flat-row flat-imagebox">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-wrap">
                        <div class="flat-row-title">
                            <h3>Top Brands</h3>
                        </div>
                       
                        <div class="box-owl-carousel style2">
                        @foreach($product_brands->chunk(3) as $row)
                                <div class="rows">
                                    @foreach($row as $product_brand)
                                        <div class="imagebox style1 v1">
                                            <div class="box-image laptopbrand">
                                                <a href="#" title="">
                                                    <img src="<?php if(@$product_brand->image){?>{{asset('/images/uploads/brands/'.@$product_brand->image)}}<?php }?>" alt="{{@$product_brand->slug}}">
                                                </a>
                                            </div>
                                            <!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="cat-name">
                                                    <a href="{{route('product.brand',$product_brand->slug)}}" title="">{{ucwords(@$product_brand->name)}}</a>
                                                </div>
                                                <ul class="cat-list">
                                                    @foreach($product_brand->series as $series)
                                                    <li><a href="{{route('product.brandseries',[@$product_brand->slug,@$series->slug])}}" title="">{{ucwords(@$series->name)}}</a></li>
                                                    @endforeach
                                                </ul>
                                                <div class="btn-more">
                                                    <a href="{{route('product.brand',$product_brand->slug)}}" title="">See All</a>
                                                </div>
                                            </div>
                                            <!-- /.box-content -->
                                        </div>
                                        <!-- /.imagebox style1 -->
                                    @endforeach
                                    <!-- /.imagbox style1 -->
                                    <div class="clearfix"></div>
                                </div>
                            <!-- /.rows -->
                        @endforeach

                        </div>
                        <!-- /.box-owl-carousel style2 -->
                    </div>
                    <!-- /.box-wrap -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.flat-imagebox style1 -->
@endif

 

<!-- END PAGE CONTENT -->
@endsection
