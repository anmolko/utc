@extends('frontend.layouts.single_product_master')
@section('seo')
    <title>{{ucfirst(@$product->productSEO->title)}}</title>
    <meta name='description' itemprop='description'  content='{{ucfirst(@$product->productSEO->description)}}' />
    <meta name='keywords' content='{{ucfirst(@$product->productSEO->keywords)}}' />
    <meta property='article:published_time' content='<?php if(@$product->productSEO->updated_at !=''){?>{{@$product->productSEO->updated_at}} <?php }else {?> {{@$product->productSEO->created_at}} <?php }?>' />
    <meta property='article:section' content='article' />
    <meta property="og:description" content="{{ucfirst(@$product->productSEO->description)}}" />
    <meta property="og:title" content="{{ucfirst(@$product->productSEO->title)}}" />
    <meta property="og:url" content="https://weborelectronics.com/,www.weborelectronics.com/,{{url()->current()}}" />
    <meta property="og:type" content="ecommerce" />
    <meta property="og:locale" content="en-us" />
    <meta property="og:locale:alternate"  content="en-us" />
    <meta property="og:site_name" content="@if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else Webor Electronics @endif" />
    <meta property="og:image" content="<?php if(@$product->thumbnail){?>{{asset('/images/uploads/products/'.@$product->thumbnail)}}<?php }?>" />
    <meta property="og:image:url" content="<?php if(@$product->thumbnail){?>{{asset('/images/uploads/products/'.@$product->thumbnail)}}<?php }?>" />
    <meta property="og:image:size" content="300" />
@endsection
@section('breadcrumb')

   <!-- BREADCRUMBS SETCTION START -->
   <div class="breadcrumbs-section plr-200 mb-80 section">
            <div class="{{($product->image == null) ? 'breadcrumbs':''}} overlay-bg" @if($product->image !== null) style="background: #f6f6f6 url('{{asset('/images/uploads/products/banners/'.@$product->image)}}') no-repeat scroll center center;" @endif>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">{{ucwords(@$product->name)}}</h1>

                                <ol class="breadcrumb">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="{{url('/product')}}">Product</a></li>
                                    <li><a href="{{route('product.category',@$product_primary_category->slug)}}">{{ucwords(@$product_primary_category->name)}}</a></li>
                                    <li class="active">{{ucwords(@$product->name)}} </li>
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
  <section id="page-content" class="page-wrapper section">

<!-- SHOP SECTION START -->
<div class="shop-section mb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- single-product-area start -->
                <div class="single-product-area mb-80">
                    <div class="row">
                        <!-- imgs-zoom-area start -->
                        <div class="col-lg-6">
                            <div class="imgs-zoom-area">
                                    @if(count(@$product->gallery) > 0)
                                        @foreach(@$product->gallery as $gallery)
                                            @if($loop->first)
                                                <img id="zoom_03" src="{{asset('/images/uploads/products/gallery/'.@$gallery->resized_name)}}" data-zoom-image="{{asset('/images/uploads/products/gallery/'.@$gallery->resized_name)}}" alt="{{@$product->slug}}">
                                            @endif
                                        @endforeach
                                    @endif
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div id="gallery_01" class="carousel-btn slick-arrow-3 mt-30">
                                            @if(count(@$product->gallery) > 0)
                                                @foreach(@$product->gallery as $gallery)
                                                <div class="p-c">
                                                    <a href="#" data-image="{{asset('/images/uploads/products/gallery/'.@$gallery->resized_name)}}" data-zoom-image="{{asset('/images/uploads/products/gallery/'.@$gallery->resized_name)}}">
                                                        <img class="zoom_03" src="{{asset('/images/uploads/products/gallery/'.@$gallery->resized_name)}}" alt="{{@$product->slug}}">
                                                    </a>
                                                </div>
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- imgs-zoom-area end -->
                        <!-- single-product-info start -->
                        <div class="col-lg-6">
                            <div class="single-product-info">
                                <h3 class="text-black-1">{{ucwords(@$product->name)}} </h3>
                                <h6 class="brand-name-2">Webor</h6>
                                <!--  hr -->
                                <hr>
                                <div class="text-body">
                                {{Str::limit(@$product->summary,470,'')}}
                                </div>
                                <hr>
                                <!-- single-pro-color-rating -->
                                <div class="single-pro-color-rating clearfix">
                                    <div class="sin-pro-color f-left">
                                        <p class="f-left"><span class="color-title "><strong>Category: </strong></span><span class="pro-price">{{ucwords(@$product->primaryCategory->name)}}</span> <span>({{ucwords(@$product->secondaryCategory->name)}})</span></p>

                                    </div>

                                </div>
                                <!-- hr -->
                                <hr>
                                  <!-- plus-minus-pro-action -->
                                <div class="plus-minus-pro-action clearfix">
                                    <div class="sin-plus-minus f-left clearfix">
                                        <p class="color-title f-left"><strong>Share:</strong></p>
                                        <div class="sin-pro-action f-left">
                                            <ul class="footer-social f-left">
                                                <li>
                                                    <a class="facebook" href="#" onclick='fbShare("{{route('product.single',['category'=>@$product->primaryCategory->slug,'slug'=>@$product->slug])}}")' title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a class="whatsapp" href="#" onclick='whatsappShare("{{route('product.single',['category'=>@$product->primaryCategory->slug,'slug'=>@$product->slug])}}","{{ $product->name }}")' title="Whats App"><i class="zmdi zmdi-whatsapp"></i></a>
                                                </li>
                                                <li>
                                                    <a class="twitter" href="#" onclick='twitShare("{{route('product.single',['category'=>@$product->primaryCategory->slug,'slug'=>@$product->slug])}}","{{ $product->name }}")' title="Twitter"><i class="zmdi zmdi-twitter"></i></a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <!-- plus-minus-pro-action end -->
                                <!-- hr -->
                                <hr>


                            </div>
                        </div>
                        <!-- single-product-info end -->
                    </div>
                    <!-- single-product-tab -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- hr -->
                            <hr>
                            <div class="single-product-tab reviews-tab">
                                <ul class="nav mb-20">
                                    <li><a class="active" href="#description" data-bs-toggle="tab">description</a></li>
                                    @if(@$product->information)
                                    <li><a href="#information" data-bs-toggle="tab">information</a></li>
                                    @endif
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active show" id="description">
                                    {!! @$product->description !!}

                                    </div>
                                    @if(@$product->information)

                                    <div role="tabpanel" class="tab-pane" id="information">
                                    {!! @$product->information !!}

                                    </div>
                                    @endif


                                </div>
                            </div>
                            <!--  hr -->
                            <hr>
                        </div>
                    </div>
                </div>
                <!-- single-product-area end -->

             

            </div>
           
        </div>
    </div>
</div>
<!-- SHOP SECTION END -->

</section>
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
