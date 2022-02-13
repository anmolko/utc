<!-- widget-search -->
<aside class="widget-search mb-30 ">
    <form action="{{route('searchBlog')}}">
        <input type="text" name="s" type="text" placeholder="Enter Keyword" class="form-control"
            oninvalid="this.setCustomValidity('Type a keyword')" oninput="this.setCustomValidity('')" required>
        <button type="submit"><i class="zmdi zmdi-search"></i></button>
    </form>
</aside>
<!-- widget-categories -->
   
@if(count($bcategories) > 0)

<aside class="widget operating-system box-shadow mb-30 attribute-container">
    <h6 class="widget-title border-left mb-10 attribute-title single-attribute-title">Categories</h6>

        <div class="panel">
            @foreach(@$bcategories as $bcategory)

                <label class="@if($loop->last) mb-0 @endif">
                    <a href="{{url('/blog/categories/'.$bcategory->slug)}}" class="attribute-value-title @if(Request::url() === url('/blog/categories/'.$bcategory->slug)) active @endif">{{ucwords(@$bcategory->name)}}</a>
                </label>
                </br>
            @endforeach

        </div>
</aside>
@endif


@if(!empty($latestPosts))
    <!-- widget-product -->
    <aside class="widget widget-product box-shadow">
        <h6 class="widget-title border-left mb-20">recent posts</h6>
        <!-- product-item start -->
        @foreach($latestPosts as $index => $latest)
        <div class="product-item">
            <div class="product-img">
                <a href="{{route('blog.single',@$latest->slug)}}">
                    <img src="<?php if(@$latest->thumb_image){?>{{asset('/images/uploads/blog/thumb/'.@$latest->thumb_image)}}<?php }?>" alt="{{@$latest->slug}}" />
                </a>
            </div>
            <div class="product-info">
                <h6 class="product-title">
                    <a href="{{route('blog.single',@$latest->slug)}}">{{ucwords(@$latest->title)}}</a>
                </h6>
                <h3 class="pro-price">{{date('M j, Y',strtotime(@$latest->created_at))}}</h3>
            </div>
        </div>
        @endforeach
        <!-- product-item end -->
    </aside>
@endif