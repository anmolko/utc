

    
    @if(count($allProducts) > 0)
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
    @else
    <div class="tab-product">
        <div class="row sort-box">
            <h3 class="text-danger">No Data Found</h3>    
        
        </div><!-- /.sort-box -->
    </div><!-- /.tab-product -->
    @endif

  
        