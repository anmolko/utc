    <!-- widget-search -->
    <aside class="widget-search mb-30">
            <input type="text" name="search"  placeholder="Enter Keyword" class="searchby"
            oninvalid="this.setCustomValidity('Type a keyword')" oninput="this.setCustomValidity('')" required />
            <button class="search-product"><i class="zmdi zmdi-search"></i></button>
    </aside>
    <!-- widget-categories -->
    <aside class="widget widget-categories box-shadow mb-30 primary-category-container">
        <h6 class="widget-title border-left mb-10 primary-category-title">Categories</h6>
        @if(count($product_primary_categories) > 0)
        <div id="cat-treeview" class="product-cat">
            <ul>
            @foreach(@$product_primary_categories as $pcategory)
                <li class="closed">
                    <label class="label-for-check">
                        <input type="checkbox" name="primary[]" class="check-with-label common-selector primary-category" value="{{@$pcategory->slug}}">
                        <a>{{ucwords(@$pcategory->name)}} </a>
                    </label>
                    <ul>
                        @foreach(@$pcategory->secondary as $psecondary)
                        <li>
                            <label>
                                <input type="checkbox" class="check-with-label common-selector secondary-category" name="secondary[]" value="{{@$psecondary->slug}}">
                                <a href="#">{{ucwords(@$psecondary->name)}}</a>
                            </label>
                        </li>
                        @endforeach

                    </ul>
                </li>   
            @endforeach
            </ul>
        </div>
        @endif

    </aside>

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
