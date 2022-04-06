@extends('frontend.layouts.single_product_master')
@section('seo')
    <title>{{ucfirst(@$product->productSEO->title)}}</title>
    <meta name='description' itemprop='description'  content='{{ucfirst(@$product->productSEO->description)}}' />
    <meta name='keywords' content='{{ucfirst(@$product->productSEO->keywords)}}' />
    <meta property='article:published_time' content='<?php if(@$product->productSEO->updated_at !=''){?>{{@$product->productSEO->updated_at}} <?php }else {?> {{@$product->productSEO->created_at}} <?php }?>' />
    <meta property='article:section' content='article' />
    <meta property="og:description" content="{{ucfirst(@$product->productSEO->description)}}" />
    <meta property="og:title" content="{{ucfirst(@$product->productSEO->title)}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:type" content="ecommerce" />
    <meta property="og:locale" content="en-us" />
    <meta property="og:locale:alternate"  content="en-us" />
    <meta property="og:site_name" content="@if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else Universal Trading Concern @endif" />
    <meta property="og:image" content="<?php if(@$product->thumbnail){?>{{asset('/images/uploads/products/'.@$product->thumbnail)}}<?php }?>" />
    <meta property="og:image:url" content="<?php if(@$product->thumbnail){?>{{asset('/images/uploads/products/'.@$product->thumbnail)}}<?php }?>" />
    <meta property="og:image:size" content="300" />
@endsection
@section('styles')
<style>
    .tecnical-specs table tr td:first-child {
        width: 210px;
        font-weight: bold;
        color: #484848;
    }
    .owl-carousel .owl-stage{
        display: flex !important;
        flex-wrap: wrap !important;
    }
    .owl-carousel .owl-item{
        display: flex;
    }
    .product-detail .footer-detail .quanlity-box > div.quanlity {
        position: relative;
        margin-right: 8px;
    }

    .box-cart.style2.detail-wishlist{
        margin-top:15px;
        margin-bottom:0px;
    }


    @media only screen and (min-width: 1024px){

        .product-detail .footer-detail .social-single{
            float:right;
        }
    }
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
                                <a href="#" title="">{{ucwords(@$product->name)}}</a>
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
<section class="flat-product-detail">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="flexslider">
                    <ul class="slides">
                        @if(count(@$product->gallery) > 0)
                            @foreach(@$product->gallery as $gallery)
                                <li data-thumb="{{asset('/images/uploads/products/gallery/'.@$gallery->resized_name)}}">
                                        <a href='#' id="zoom{{$loop->iteration}}" class='zoom'><img src="{{asset('/images/uploads/products/gallery/'.@$gallery->resized_name)}}" alt='' width='400' height='300' /></a>
                                </li>
                            @endforeach
                        @else
                        <li data-thumb="{{asset('/images/uploads/products/'.@$product->thumbnail)}}">
                                        <a href='#' id="zoom1" class='zoom'><img src="{{asset('/images/uploads/products/'.@$product->thumbnail)}}" alt='' width='400' height='300' /></a>
                                </li>
                        @endif
                    </ul><!-- /.slides -->
                </div><!-- /.flexslider -->
            </div><!-- /.col-md-6 -->
            <div class="col-md-6">
                <div class="product-detail">
                    <div class="header-detail">
                        <h4 class="name">{{ucwords(@$product->name)}}</h4>

                    </div><!-- /.header-detail -->
                    <div class="brand-details">
                        <div ><span class="brand">Brand: </span><span class="id">{{ucwords(@$product->brand->name)}}</span></div>
                        @if($product->brandSeries)
                        <div ><span class="brand-series">Brand Series: </span><span class="id">{{ucwords(@$product->brandSeries->name)}}</span></div>
                        @endif
                    </div>
                    <div class="content-detail">
                        <div class="price">
                            @if($product->state == "sale")

                            <div class="regular">
                                NPR. {{number_format(@$product->price)}}
                            </div>
                            <div class="sale">
                                NPR. {{number_format(@$product->discount_price)}}
                            </div>
                            @else
                            <div class="sale">
                                NPR. {{number_format(@$product->price)}}
                            </div>
                            @endif
                        </div>
                        <div class="info-text">
                        {{@$product->summary}}
                        </div>

                    </div><!-- /.content-detail -->
                    <div class="footer-detail">

                        <div class="box-cart style2">
                            <form style="display: inline-block;" action="{{ route('cart.store') }}" id="form_{{$product->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->name }}" name="name">
                                <input type="hidden" value="{{ $product->price }}" name="price">
                                <input type="hidden" value="{{ $product->discount_price }}" name="discount">
                                <input type="hidden" value="{{ $product->thumbnail }}"  name="image">
                                <input type="hidden" value="{{ $product->slug }}"  name="slug">
                                <input type="hidden" value="1" name="quantity">
                                <div class="btn-add-cart">
                                    <a  onclick="document.getElementById('form_{{$product->id}}').submit();" title="">
                                        <img src="{{asset('assets/frontend/images/icons/add-cart.png')}}" alt="">Add to Cart
                                    </a>
                                </div>
                            </form>

                            <div class="social-single">
                                <span>SHARE</span>
                                <ul class="social-list style2">
                                    <li>
                                        <a href="#" onclick='fbShare("{{route('product.single',@$product->slug)}}")' title="">
                                            <i class="fab fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick='twitShare("{{route('product.single',@$product->slug)}}","{{ $product->name }}")'  title="">
                                            <i class="fab fa-twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" onclick='whatsappShare("{{route('product.single',@$product->slug)}}","{{ $product->name }}")'  title="">
                                            <i class="fab fa-whatsapp" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul><!-- /.social-list -->
                            </div><!-- /.social-single -->
                        </div><!-- /.box-cart -->

                    </div><!-- /.footer-detail -->
                </div><!-- /.product-detail -->
            </div><!-- /.col-md-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-product-detail -->

<section class="flat-product-content">
    <ul class="product-detail-bar">
        <li class="active">Specifications</li>
    </ul><!-- /.product-detail-bar -->
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="tecnical-specs">
                    <table>
                        <tbody>
                            @foreach(@$product->productSpecification as $spec)
                            <tr>
                                <td>{{ucwords(@$spec->name)}}</td>
                                <td>{!! nl2br($spec->pivot->specification_details) !!}</td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table><!-- /.table -->
                </div><!-- /.tecnical-specs -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

    </div><!-- /.container -->
</section><!-- /.flat-product-content -->


@if(count($latestProducts) > 0)

<section class="flat-imagebox style4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="flat-row-title">
                    <h3>Latest Products</h3>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel-3">
                    @foreach($latestProducts as $index => $latest)

                    <div class="imagebox style4">
                        @if($latest->state == "new_arrival")
                            <span class="item-new">NEW</span>
                        @elseif($latest->state == "sale")
                            <span class="item-sale">SALE</span>
                        @endif

                        <div class="box-image single-image">
                            <a href="{{route('product.single',@$latest->slug)}}" title="">
                                <img src="<?php if(@$latest->thumbnail){?>{{asset('/images/uploads/products/'.@$latest->thumbnail)}}<?php }?>" alt="{{@$latest->slug}}"/>
                            </a>
                        </div><!-- /.box-image -->
                        <div class="box-content">
                            <div class="cat-name">
                                <a href="#" title="">{{@ucwords($latest->type)}}</a>
                            </div>
                            <div class="product-name">
                                <a href="{{route('product.single',@$latest->slug)}}" title="">{{ucwords(Str::limit(@$latest->name,100,' ...'))}}</a>
                            </div>
                            <div class="price">
                                @if($latest->state == "sale")
                                    <span class="sale">NPR {{number_format(@$latest->discount_price)}}</span>
                                    <span class="regular">NPR {{number_format(@$latest->price)}}</span>
                                @else
                                    <span class="sale">NPR {{number_format(@$latest->price)}}</span>
                                @endif
                            </div>
                        </div><!-- /.box-content -->
                    </div><!-- /.imagebox style4 -->
                    @endforeach

                </div><!-- /.owl-carousel-3 -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-imagebox style4 -->
@endif

<!-- End page content -->

@endsection
@section('js')
<script>
function fbShare(url) {
  window.open("https://www.facebook.com/sharer/sharer.php?u=" + url, "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=200, left=500, width=600, height=400");
}
function twitShare(url, title) {
    window.open("https://twitter.com/intent/tweet?text=" + encodeURIComponent(title) + "+" + url + "", "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=200, left=500, width=600, height=400");
}
function whatsappShare(url, title) {
    message = title + " " + url;
    window.open("https://api.whatsapp.com/send?text=" + message);
}

</script>
@endsection
