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
                                                 <div class="box-image">
                                                     <a href="#" title="">
                                                         <img src="{{asset('images/uploads/products/'.$final->thumbnail)}}" alt="">
                                                     </a>
                                                 </div>
                                                 <!-- /.box-image -->
                                                 <div class="box-content">
                                                     <div class="cat-name">
                                                         <a href="#" title="">{{$final->brand->name}}</a>
                                                     </div>
                                                     <div class="product-name">
                                                         <a href="#" title="">{{$final->name}}</a>
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
                                                 <div class="box-image" style="width: 178px;">
                                                     <a href="#" title="">
                                                         <img src="{{asset('images/uploads/products/'.$final->thumbnail)}}" style="width: 100%; height: 100%;object-fit: cover;" alt="">
                                                     </a>
                                                 </div>
                                                 <!-- /.box-image -->
                                                 <div class="box-content">
                                                     <div class="cat-name">
                                                         <a href="#" title="">{{$final->brand->name}}</a>
                                                     </div>
                                                     <div class="product-name">
                                                         <a href="#" title="">{{$final->name}}</a>
                                                     </div>
                                                     <div class="price">
{{--                                                         <span class="regular">$2,999.00</span>--}}
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



        <!-- /.flat-imagebox style1 -->

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
{{--                                        <div class="view">--}}
{{--                                            1256 viewed--}}
{{--                                        </div>--}}
                                        <div class="box-image">
                                            <a href="#" title="">
                                                <img src="{{asset('images/uploads/products/'.$final->thumbnail)}}" style="width: 100%; height: 100%;object-fit: cover;" alt="">
                                            </a>
                                        </div>
                                        <!-- /.box-image -->
                                        <div class="box-content">
                                            <div class="cat-name">
                                                <a href="#" title="">{{$final->brand->name}}</a>
                                            </div>
                                            <div class="product-name">
                                                <a href="#" title="">{{$final->name}}</a>
                                            </div>
                                            <div class="price">
                                                <span class="sale">NPR. {{number_format($final->price)}}.</span>
{{--                                                <span class="regular">$2,999.00</span>--}}
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


    <section class="flat-row flat-imagebox">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-wrap">
                        <div class="flat-row-title">
                            <h3>Top Categories</h3>
                        </div>
                        <div class="box-owl-carousel style2">
                            <div class="rows">
                                <div class="imagebox style1 v1">
                                    <div class="box-image">
                                        <a href="#" title="">
                                            <img src="images/product/other/s07.jpg" alt="">
                                        </a>
                                    </div>
                                    <!-- /.box-image -->
                                    <div class="box-content">
                                        <div class="cat-name">
                                            <a href="#" title="">Cell Phones</a>
                                        </div>
                                        <ul class="cat-list">
                                            <li><a href="#" title="">HTC</a></li>
                                            <li><a href="#" title="">Iphone</a></li>
                                            <li><a href="#" title="">LG</a></li>
                                            <li><a href="#" title="">Microsoft</a></li>
                                            <li><a href="#" title="">Oppo phone</a></li>
                                        </ul>
                                        <div class="btn-more">
                                            <a href="#" title="">See All</a>
                                        </div>
                                    </div>
                                    <!-- /.box-content -->
                                </div>
                                <!-- /.imagebox style1 -->
                                <div class="imagebox style1 v1">
                                    <div class="box-image">
                                        <a href="#" title="">
                                            <img src="images/product/other/15.jpg" alt="">
                                        </a>
                                    </div>
                                    <!-- /.box-image -->
                                    <div class="box-content">
                                        <div class="cat-name">
                                            <a href="#" title="">Televisions</a>
                                        </div>
                                        <ul class="cat-list">
                                            <li><a href="#" title="">4K Ultra HD TVs</a></li>
                                            <li><a href="#" title="">Curved TVs</a></li>
                                            <li><a href="#" title="">LED & LCD TVs</a></li>
                                            <li><a href="#" title="">OLED TVs</a></li>
                                            <li><a href="#" title="">Outdoor TVs</a></li>
                                        </ul>
                                        <div class="btn-more">
                                            <a href="#" title="">See All</a>
                                        </div>
                                    </div>
                                    <!-- /.box-content -->
                                </div>
                                <!-- /.imagebox style1 -->
                                <div class="imagebox style1 v1">
                                    <div class="box-image">
                                        <a href="#" title="">
                                            <img src="images/product/other/16.jpg" alt="">
                                        </a>
                                    </div>
                                    <!-- /.box-image -->
                                    <div class="box-content">
                                        <div class="cat-name">
                                            <a href="#" title="">Laptops</a>
                                        </div>
                                        <ul class="cat-list">
                                            <li><a href="#" title="">Computers & Tablets</a></li>
                                            <li><a href="#" title="">Curved TVs</a></li>
                                            <li><a href="#" title="">Hard Drives & Storage</a></li>
                                            <li><a href="#" title="">Inkjet Printers</a></li>
                                            <li><a href="#" title="">Laptop Accessories</a></li>
                                        </ul>
                                        <div class="btn-more">
                                            <a href="#" title="">See All</a>
                                        </div>
                                    </div>
                                    <!-- /.box-content -->
                                </div>
                                <!-- /.imagbox style1 -->
                                <div class="clearfix"></div>
                            </div>
                            <!-- /.rows -->
                            <div class="rows">
                                <div class="imagebox style1 v1">
                                    <div class="box-image">
                                        <a href="#" title="">
                                            <img src="images/product/other/s05.jpg" alt="">
                                        </a>
                                    </div>
                                    <!-- /.box-image -->
                                    <div class="box-content">
                                        <div class="cat-name">
                                            <a href="#" title="">Games & Drones</a>
                                        </div>
                                        <ul class="cat-list">
                                            <li><a href="#" title="">Audio</a></li>
                                            <li><a href="#" title="">Furniture & Decor</a></li>
                                            <li><a href="#" title="">OLED TVs</a></li>
                                            <li><a href="#" title="">LG</a></li>
                                            <li><a href="#" title="">Headphones</a></li>
                                        </ul>
                                        <div class="btn-more">
                                            <a href="#" title="">See All</a>
                                        </div>
                                    </div>
                                    <!-- /.box-content -->
                                </div>
                                <!-- /.imagbox style1 -->
                                <div class="imagebox style1 v1">
                                    <div class="box-image">
                                        <a href="#" title="">
                                            <img src="images/product/other/03.jpg" alt="">
                                        </a>
                                    </div>
                                    <!-- /.box-image -->
                                    <div class="box-content">
                                        <div class="cat-name">
                                            <a href="#" title="">Headphones</a>
                                        </div>
                                        <ul class="cat-list">
                                            <li><a href="#" title="">4K Ultra HD TVs</a></li>
                                            <li><a href="#" title="">Curved TVs</a></li>
                                            <li><a href="#" title="">LED & LCD TVs</a></li>
                                            <li><a href="#" title="">OLED TVs</a></li>
                                            <li><a href="#" title="">Outdoor TVs</a></li>
                                        </ul>
                                        <div class="btn-more">
                                            <a href="#" title="">See All</a>
                                        </div>
                                    </div>
                                    <!-- /.box-content -->
                                </div>
                                <!-- /.imagebox style1 -->
                                <div class="imagebox style1 v1">
                                    <div class="box-image">
                                        <a href="#" title="">
                                            <img src="images/product/other/14.jpg" alt="">
                                        </a>
                                    </div>
                                    <!-- /.box-image -->
                                    <div class="box-content">
                                        <div class="cat-name">
                                            <a href="#" title="">Tablets</a>
                                        </div>
                                        <ul class="cat-list">
                                            <li><a href="#" title="">Car Speakers</a></li>
                                            <li><a href="#" title="">Car Subwoofers</a></li>
                                            <li><a href="#" title="">Enclosures</a></li>
                                            <li><a href="#" title="">Musical Instruments</a></li>
                                            <li><a href="#" title="">OLED TVs</a></li>
                                        </ul>
                                        <div class="btn-more">
                                            <a href="#" title="">See All</a>
                                        </div>
                                    </div>
                                    <!-- /.box-content -->
                                </div>
                                <!-- /.imagebox style1 -->
                                <div class="clearfix"></div>
                            </div>
                            <!-- /.rows -->
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

    <section class="flat-row">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="box-wrap style1">
                        <div class="flat-row-title">
                            <h3>Bestsellers</h3>
                        </div>
                        <!-- /.flat-row-title -->
                        <ul class="product-list style1">
                            <li>
                                <div class="img-product">
                                    <a href="#" title="">
                                        <img src="images/product/highlights/10.jpg" alt="">
                                    </a>
                                </div>
                                <div class="info-product">
                                    <div class="name">
                                        <a href="#" title="">Razer RZ02-01071500-R3M1</a>
                                    </div>
                                    <div class="queue">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="price">
                                        <span class="sale">$50.00</span>
                                        <span class="regular">$2,999.00</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li>
                                <div class="img-product">
                                    <a href="#" title="">
                                        <img src="images/product/highlights/9.jpg" alt="">
                                    </a>
                                </div>
                                <div class="info-product">
                                    <div class="name">
                                        <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                    </div>
                                    <div class="queue">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="price">
                                        <span class="sale">$24.00</span>
                                        <span class="regular">$2,999.00</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li>
                                <div class="img-product">
                                    <a href="#" title="">
                                        <img src="images/product/highlights/8.jpg" alt="">
                                    </a>
                                </div>
                                <div class="info-product">
                                    <div class="name">
                                        <a href="#" title="">Beats Snarkitecture<br />Headphones</a>
                                    </div>
                                    <div class="queue">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="price">
                                        <span class="sale">$90.00</span>
                                        <span class="regular">$2,999.00</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                        </ul>
                        <!-- /.product-list style1 -->
                    </div>
                </div>
                <!-- /.col-md-4 -->
                <div class="col-md-4">
                    <div class="box-wrap style1">
                        <div class="flat-row-title">
                            <h3>Featured</h3>
                        </div>
                        <!-- /.flat-row-title -->
                        <ul class="product-list style1">
                            <li>
                                <div class="img-product">
                                    <a href="#" title="">
                                        <img src="images/product/highlights/3.jpg" alt="">
                                    </a>
                                </div>
                                <div class="info-product">
                                    <div class="name">
                                        <a href="#" title="">Razer RZ02-01071500-R3M1</a>
                                    </div>
                                    <div class="queue">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="price">
                                        <span class="sale">$50.00</span>
                                        <span class="regular">$2,999.00</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li>
                                <div class="img-product">
                                    <a href="#" title="">
                                        <img src="images/product/highlights/2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="info-product">
                                    <div class="name">
                                        <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                    </div>
                                    <div class="queue">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="price">
                                        <span class="sale">$24.00</span>
                                        <span class="regular">$2,999.00</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li>
                                <div class="img-product">
                                    <a href="#" title="">
                                        <img src="images/product/highlights/1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="info-product">
                                    <div class="name">
                                        <a href="#" title="">Beats Snarkitecture Headphones</a>
                                    </div>
                                    <div class="queue">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="price">
                                        <span class="sale">$90.00</span>
                                        <span class="regular">$2,999.00</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                        </ul>
                        <!-- /.product-list style1 -->
                    </div>
                </div>
                <!-- /.col-md-4 -->
                <div class="col-md-4">
                    <div class="box-wrap style1">
                        <div class="flat-row-title">
                            <h3>Hot Sale</h3>
                        </div>
                        <!-- /.flat-row-title -->
                        <ul class="product-list style1">
                            <li>
                                <div class="img-product">
                                    <a href="#" title="">
                                        <img src="images/product/highlights/19.jpg" alt="">
                                    </a>
                                </div>
                                <div class="info-product">
                                    <div class="name">
                                        <a href="#" title="">Razer RZ02-01071500-R3M1</a>
                                    </div>
                                    <div class="queue">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="price">
                                        <span class="sale">$50.00</span>
                                        <span class="regular">$2,999.00</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li>
                                <div class="img-product">
                                    <a href="#" title="">
                                        <img src="images/product/highlights/11.jpg" alt="">
                                    </a>
                                </div>
                                <div class="info-product">
                                    <div class="name">
                                        <a href="#" title="">Apple iPad Mini<br />G2356</a>
                                    </div>
                                    <div class="queue">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="price">
                                        <span class="sale">$24.00</span>
                                        <span class="regular">$2,999.00</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li>
                                <div class="img-product">
                                    <a href="#" title="">
                                        <img src="images/product/highlights/20.jpg" alt="">
                                    </a>
                                </div>
                                <div class="info-product">
                                    <div class="name">
                                        <a href="#" title="">Beats Snarkitecture<br />Headphones</a>
                                    </div>
                                    <div class="queue">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="price">
                                        <span class="sale">$90.00</span>
                                        <span class="regular">$2,999.00</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                        </ul>
                        <!-- /.product-list style1 -->
                    </div>
                </div>
                <!-- /.col-md-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.flat-highlights -->

<!-- END PAGE CONTENT -->
@endsection
