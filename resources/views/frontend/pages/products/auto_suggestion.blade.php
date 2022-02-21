

<div class="box-suggestions" >
    
    @if(count($search_product_data) > 0)
    <div class="title">
        Search Products
    </div>
        <ul>
            @foreach(@$search_product_data as $product)
            <li>
                <div class="image">
                    <img src="<?php if(@$product->thumbnail){?>{{asset('/images/uploads/products/'.@$product->thumbnail)}}<?php }?>" alt="{{@$product->slug}}">
                </div>
                <div class="info-product">
                    <div class="name">
                        <a href="{{route('product.single',@$product->slug)}}" title="">{{ucwords(Str::limit(@$product->name,45,' ...'))}}</a>
                    </div>
                    <div class="price">
                        <span class="sale">
                            NPR. {{number_format(@$product->price)}}
                        </span>
                       
                    </div>
                </div>
            </li>
            @endforeach
        
        </ul>
    @else
   
    <p class="text-danger">Opps related product not found !!</p>
    <div class="title">
        Suggested Products
    </div>
    <ul>
            @foreach(@$random_product_data as $product)
            <li>
                <div class="image">
                    <img src="<?php if(@$product->thumbnail){?>{{asset('/images/uploads/products/'.@$product->thumbnail)}}<?php }?>" alt="{{@$product->slug}}">
                </div>
                <div class="info-product">
                    <div class="name">
                        <a href="{{route('product.single',@$product->slug)}}" title="">{{ucwords(Str::limit(@$product->name,45,' ...'))}}</a>
                    </div>
                    <div class="price">
                        <span class="sale">
                            NPR. {{number_format(@$product->price)}}
                        </span>
                       
                    </div>
                </div>
            </li>
            @endforeach
        
        </ul>
    @endif

</div><!-- /.box-suggestions -->

<div class="box-cat" >
    <div class="cat-list-search">
       
        @if(count($search_primary_data) > 0)
        <div class="title">
           Search Categories
        </div>
        <ul>
            @foreach(@$search_primary_data as $bcategory)
                <li>
                    <a href="{{route('product.category',$bcategory->slug)}}">{{ucwords(@$bcategory->name)}}</a>
                </li>
            @endforeach
        </ul>
        @else
        
            <p class="text-danger">Opps related product catagories not found !!</p>
            <div class="title">
                Suggested Categories
            </div>
            <ul>
                @foreach(@$primary_data as $bcategory)
                    <li>
                        <a href="{{route('product.category',$bcategory->slug)}}">{{ucwords(@$bcategory->name)}}</a>
                    </li>
                @endforeach
            </ul>
        @endif

    </div><!-- /.cat-list-search -->
</div><!-- /.box-cat -->