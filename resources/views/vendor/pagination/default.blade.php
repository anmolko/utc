

@if ($paginator->hasPages())
<div class="blog-pagination style2">
    <ul class="flat-pagination">
        @if ($paginator->onFirstPage())

        @else
        <li class="prev disabled">
            <a href="{{ $paginator->previousPageUrl() }}" title="">
                <img src="{{asset('assets/frontend/images/icons/left-1.png')}}" alt="">Prev Page
            </a>
        </li>
        @endif

        @if($paginator->currentPage() > 3)
        <li>
            <a href="{{ $paginator->url(1) }}" class="waves-effect" title="">1</a>
        </li>

        @endif

        @if($paginator->currentPage() > 4)
        <li class="disabled" aria-disabled="true">
            <a  class="waves-effect" title="">...</a>
        </li>
        @endif

        @foreach(range(1, $paginator->lastPage()) as $i)
            @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                @if ($i == $paginator->currentPage())
                    <li class="active">
                        <a href="#" class="waves-effect" title="">{{ $i }}</a>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->url($i) }}" class="waves-effect" title="">{{ $i }}</a>
                    </li>
                @endif
            @endif
        @endforeach

        @if($paginator->currentPage() < $paginator->lastPage() - 3)
            <li class="disabled" aria-disabled="true">
                <a  class="waves-effect" title="">...</a>
            </li>
        @endif
        @if($paginator->currentPage() < $paginator->lastPage() - 2)
            <li>
                <a href="{{ $paginator->url($paginator->lastPage()) }}" class="waves-effect" title="">{{ $paginator->lastPage() }}</a>
            </li>
        @endif

        @if ($paginator->hasMorePages())
    
        <li class="next">
            <a href="{{ $paginator->nextPageUrl() }}" title="">
                Next Page<img src="{{asset('assets/frontend/images/icons/right-1.png')}}" alt="">
            </a>
        </li>
        @else
        
        @endif

    </ul><!-- /.flat-pagination -->
</div>
@endif



