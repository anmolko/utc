

@if ($paginator->hasPages())
    <ul class="shop-pagination box-shadow text-center ptblr-10-30">

        @if ($paginator->onFirstPage())

        @else
        
        <li class="disabled"><a  href="{{ $paginator->previousPageUrl() }}" ><i class="zmdi zmdi-chevron-left"></i></a></li>

        @endif

        @if($paginator->currentPage() > 3)
        <li class="nav-item "><a class="page-numbers" href="{{ $paginator->url(1) }}">1</a>

        @endif

        @if($paginator->currentPage() > 4)
        <li class="nav-item disabled" aria-disabled="true"><span class="page-link seperate-pagination-link">...</span></li>

        @endif

        @foreach(range(1, $paginator->lastPage()) as $i)
            @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                @if ($i == $paginator->currentPage())
                    <li class="nav-item active"><a class="active">{{ $i }}</a></li>
                @else
                    <li class="nav-item"><a href="{{ $paginator->url($i) }}"> {{ $i }}</a></li>
                    @endif
            @endif
        @endforeach

        @if($paginator->currentPage() < $paginator->lastPage() - 3)
                 <li class="nav-item disabled" aria-disabled="true"><span class="page-link seperate-pagination-link">...</span></li>

        @endif
        @if($paginator->currentPage() < $paginator->lastPage() - 2)
            <li class="nav-item"><a class="page-numbers" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
        @endif

        @if ($paginator->hasMorePages())
        <li class="nav-item"><a class="next-page page-numbers"
        href="{{ $paginator->nextPageUrl() }}"><i class="zmdi zmdi-chevron-right"></i></a></li>
        @else
        
        @endif

 
    </ul>
@endif



