@if ($paginator->hasPages())

<span>Showing : {{ $paginator->firstItem() }}-{{ $paginator->lastItem() }} of {{ $paginator->total() }}.</span>
@endif

