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

