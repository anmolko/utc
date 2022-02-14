<!-- widget-search -->

<div class="widget widget-search">
    <form action="{{route('searchBlog')}}" method="get" accept-charset="utf-8">
        <input type="text" name="s" placeholder="Search" oninvalid="this.setCustomValidity('Type a keyword')" oninput="this.setCustomValidity('')" required>
    </form>
</div><!-- /.widget widget-search -->
@if(count($bcategories) > 0)

<div class="widget widget-categories">
    <div class="widget-title">
        <h3>Categories</h3>
    </div>
    <ul class="cat-list">
        @foreach(@$bcategories as $bcategory)
            <li class="@if(Request::url() === url('/blog/categories/'.$bcategory->slug)) active @endif">
                <a href="{{url('/blog/categories/'.$bcategory->slug)}}" title="">{{ucwords(@$bcategory->name)}}</a>
            </li>
        @endforeach

    </ul>
</div><!-- /.widget widget-categories -->
@endif

@if(count($latestPosts) > 0)
<div class="widget widget-products">
    <div class="widget-title">
        <h3>Latest Posts</h3>
    </div>
    <ul class="product-list">
        @foreach($latestPosts as $index => $latest)

        <li>
            <div class="img-product">
                <a href="{{route('blog.single',@$latest->slug)}}" title="">
                    <img src="<?php if(@$latest->thumb_image){?>{{asset('/images/uploads/blog/thumb/'.@$latest->thumb_image)}}<?php }?>" alt="{{@$latest->slug}}" >
                </a>
            </div>
            <div class="info-product">
                <div class="name">
                    <a href="{{route('blog.single',@$latest->slug)}}" title="">{{ucwords(@$latest->title)}}</a>
                </div>
                <div class="price">
                    <span class="sale">{{date('M j, Y',strtotime(@$latest->created_at))}}</span>
                </div>
            </div>
        </li>	
        @endforeach
       
    </ul>
</div><!-- /.widget widget-product -->  
@endif

