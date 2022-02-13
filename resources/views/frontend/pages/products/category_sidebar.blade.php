    <!-- widget-search -->
    <aside class="widget-search mb-30">
            <input type="text" name="search"  placeholder="Enter Keyword" class="searchby"
            oninvalid="this.setCustomValidity('Type a keyword')" oninput="this.setCustomValidity('')" required />
            <button class="search-product"><i class="zmdi zmdi-search"></i></button>
    </aside>
    <!-- widget-categories -->

    @if(count($product_primary_categories) > 0)
    @foreach(@$product_primary_categories as $pcategory)
    <input type="hidden" name="primary[]" class="check-with-label common-selector primary-category" value="{{@$pcategory->slug}}">

    <aside class="widget operating-system box-shadow mb-30 attribute-container">
        <h6 class="widget-title border-left mb-10 attribute-title">Categories</h6>

            <div class="panel">
                @foreach(@$pcategory->secondary as $psecondary)
                    <label class="@if($loop->last) mb-0 @endif">
                        <input type="checkbox" class="check-with-label common-selector secondary-category" name="secondary[]" value="{{@$psecondary->slug}}">
                        <span class="attribute-value-title">{{ucwords(@$psecondary->name)}}</span>
                    </label>
                    </br>
                @endforeach
            </div>
    </aside>
    @endforeach
    @endif

  

    <!-- product attribute -->
    
    @if(count($product_attributes) > 0)
    @foreach(@$product_attributes as $p_attribute)
    <aside class="widget operating-system box-shadow mb-30 attribute-container">
        <h6 class="widget-title border-left mb-10 attribute-title">{{ucwords(@$p_attribute->name)}}</h6>
            <div class="panel">
                @foreach(@$p_attribute->values as $attribute_value)
                    <label class="@if($loop->last) mb-0 @endif">
                        <input type="checkbox" class="check-with-label common-selector product-attribute" name="attribute_value[]" value="{{@$attribute_value->slug}}">
                        <span class="attribute-value-title">{{ucwords(@$attribute_value->name)}}</span>
                    </label>
                    </br>
                @endforeach
            </div>
    </aside>
    @endforeach
    @endif

    <!-- widget-product -->

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
                <h3 class="pro-price">{{ucwords(@$product->primaryCategory->name)}}</h3>
            </div>
        </div>
        @endforeach

                                  
    </aside>
@endif
