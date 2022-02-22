    <!-- widget-search -->
    <div class="widget widget-categories">
        <div class="widget-title widget-title-category">
            <h3>Categories<span></span></h3>
        </div>
        @if(count($product_primary_categories) > 0)

        <ul class="cat-list style1 widget-content">
            @foreach(@$product_primary_categories as $pcategory)

            <li>
                <span><a href="{{route('product.category',$pcategory->slug)}}">{{ucwords(@$pcategory->name)}}</a><i>({{@$pcategory->secondary->count()}})</i></span>
                <ul class="cat-child">
                    @foreach(@$pcategory->secondary as $psecondary)
                    <li>
                        <a href="{{route('product.secondary',[@$pcategory->slug,@$psecondary->slug])}}" title="">{{ucwords(@$psecondary->name)}}</a>
                    </li>
                    @endforeach
                    
                </ul>
            </li>
            @endforeach
            
        </ul><!-- /.cat-list -->
        @endif

    </div><!-- /.widget-categories -->
    <div class="widget widget-price">
        <div class="widget-title">
            <h3>Price<span></span></h3>
        </div>
        <div class="widget-content">
            <p>Price</p>
            <div class="price search-filter-input">
            <div id="slider-range" class="price-slider ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                <div class="ui-slider-range ui-corner-all ui-widget-header" ></div>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default filter-product-price"></span>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default filter-product-price"></span>
            </div>
            <p class="amount">
                <input type="text" id="amount" value="" disabled="">
                <input type="hidden" id="min_price" value="" >
                <input type="hidden" id="max_price" value="" >
            </p>
        </div>
        </div>
    </div><!-- /.widget widget-price -->
    @if(count($product_attributes) > 0)
    @foreach(@$product_attributes as $p_attribute)
    <div class="widget widget-brands">
        <div class="widget-title utc-attribute-values">
            <h3>{{@$p_attribute->name}}<span></span></h3>
        </div>
        <div class="widget-content">
            <ul class="box-checkbox scroll">
            @foreach(@$p_attribute->values as $attribute_value)

                <li class="check-box">
                    <input type="checkbox" class="common-selector product-attribute" id="checkbox_{{@$attribute_value->slug}}" name="attribute_value[]" value="{{@$attribute_value->slug}}">
                    <label for="checkbox_{{@$attribute_value->slug}}">{{ucwords(@$attribute_value->name)}}</label>
                </li>
                @endforeach

            </ul>
        </div>
    </div><!-- /.widget widget-brands -->
    <!-- widget-categories -->
    @endforeach
    @endif


