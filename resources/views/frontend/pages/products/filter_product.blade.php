

    
    <div class="tab-content">
    @if(count($allProducts) > 0)
                <!-- grid-view -->
                <div id="grid-view" class="tab-pane active show" role="tabpanel">
                    <div class="row">
                        <!-- product-item start -->
                        @if(count($allProducts) > 0)
                            @foreach(@$allProducts as $product)
                                <div class="col-lg-4 col-md-6">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="{{route('product.single',['category'=>@$product->primaryCategory->slug,'slug'=>@$product->slug])}}">
                                                <img src="<?php if(@$product->thumbnail){?>{{asset('/images/uploads/products/'.@$product->thumbnail)}}<?php }?>" alt="{{@$product->slug}}"/>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="{{route('product.single',['category'=>@$product->primaryCategory->slug,'slug'=>@$product->slug])}}">{{ucwords(@$product->name)}} </a>
                                            </h6>
                                        
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <!-- product-item end -->
                        
                    </div>
                </div>
                <!-- list-view -->
                <div id="list-view" class="tab-pane" role="tabpanel">
                    <div class="row">
                        <!-- product-item start -->
                        @if(count($allProducts) > 0)
                            @foreach(@$allProducts as $product)
                                <div class="col-lg-12">
                                    <div class="shop-list product-item">
                                        <div class="product-img">
                                            <a href="{{route('product.single',['category'=>@$product->primaryCategory->slug,'slug'=>@$product->slug])}}">
                                                <img src="<?php if(@$product->thumbnail){?>{{asset('/images/uploads/products/'.@$product->thumbnail)}}<?php }?>" alt="{{@$product->slug}}"/>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <div class="clearfix">
                                                <h6 class="product-title f-left">
                                                    <a href="{{route('product.single',['category'=>@$product->primaryCategory->slug,'slug'=>@$product->slug])}}">{{ucwords(@$product->name)}} </a>
                                                </h6>
                                            
                                            </div>
                                            <h6 class="brand-name mb-30">{{ucwords(@$product->primaryCategory->name)}}</h6>
                                            <p>{{Str::limit(@$product->summary,400,' ...')}}</p>
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <!-- product-item end -->
                        
                    </div>                                        
                </div>
    @else
    <!-- grid-view -->
    <div id="grid-view" class="tab-pane active show" role="tabpanel">
        <div class="row">
                
            <h3>No Data Found</h3>    
        </div>
    </div>
    <!-- list-view -->
    <div id="list-view" class="tab-pane" role="tabpanel">
        <div class="row">
            <h3>No Data Found</h3>    
        
        </div>                                        
    </div>
    @endif
    </div>

    {{ $allProducts->appends($_GET)->links('vendor.pagination.default') }}
  
        