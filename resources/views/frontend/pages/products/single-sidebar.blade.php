
    <!-- widget-categories -->
    
    @if(count($product_primary_categories) > 0)

    <aside class="widget operating-system box-shadow mb-30 attribute-container">
        <h6 class="widget-title border-left mb-10 attribute-title single-attribute-title">Categories</h6>

            <div class="panel">
                @foreach(@$product_primary_categories as $pcategory)

                    <label class="@if($loop->last) mb-0 @endif">
                        <a href="{{route('product.category',@$pcategory->slug)}}" class="attribute-value-title">{{ucwords(@$pcategory->name)}}</a>
                    </label>
                    </br>
                @endforeach

            </div>
    </aside>
    @endif


@if(count($latestProducts) > 0)
    <aside class="widget widget-product box-shadow">
        <h6 class="widget-title border-left mb-20">recent products</h6>
        <!-- product-item start -->
        @foreach(@$latestProducts as $product)

        <div class="product-item">
            <div class="product-img">
                <a href="{{route('product.single',['category'=>@$product->primaryCategory->slug,'slug'=>@$product->slug])}}">
                    <img src="<?php if(@$product->thumbnail){?>{{asset('/images/uploads/products/'.@$product->thumbnail)}}<?php }?>" alt="{{@$product->slug}}"/>
                </a>
            </div>
            <div class="product-info">
                <h6 class="product-title">
                    <a href="{{route('product.single',['category'=>@$product->primaryCategory->slug,'slug'=>@$product->slug])}}">{{ucwords(@$product->name)}}</a>
                </h6>
                <h6 class="pro-price">{{ucwords(@$product->primaryCategory->name)}}</h6>
            </div>
        </div>
        @endforeach

                                  
    </aside>
@endif
