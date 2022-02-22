<span class="showing">
@if ($paginator->hasPages())

Showing : {{ $paginator->firstItem() }}-{{ $paginator->lastItem() }} of {{ $paginator->total() }} results
@endif
</span>

