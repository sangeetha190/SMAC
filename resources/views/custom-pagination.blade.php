<div class="ltn__pagination-area text-center">
    <div class="ltn__pagination">
        <ul>
            <!-- Previous Page Link -->
            @if ($paginator->onFirstPage())
                <li class="disabled"><span><i class="fas fa-angle-double-left"></i></span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}"><i class="fas fa-angle-double-left"></i></a></li>
            @endif

            <!-- Pagination Links -->
            @foreach ($paginator->getUrlRange($paginator->currentPage() - 2, $paginator->currentPage() + 2) as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active"><span>{{ $page }}</span></li>
                @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach

            <!-- Next Page Link -->
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}"><i class="fas fa-angle-double-right"></i></a></li>
            @else
                <li class="disabled"><span><i class="fas fa-angle-double-right"></i></span></li>
            @endif
        </ul>
    </div>
</div>
