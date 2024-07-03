<div class="pagination justify-content-center mt-5">
    <ul class="pagination">
        @if ($products->currentPage() > 1)
        <li class="page-item">
            <a class="page-link bg-success link-warning" href="{{$products->previousPageUrl()}}">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        @endif

        @for ($i = 1; $i <= $products->lastPage(); $i++)
        <li class="page-item {{ $i === $products->currentPage() ? 'active' : '' }}">
            <a class="page-link {{ $i === $products->currentPage() ? 'bg-warning text-dark' : 'bg-success link-warning' }}" href="{{ $products->url($i) }}">
                {{ $i }}
            </a>
        </li>
        @endfor

        @if ($products->hasMorePages())
        <li class="page-item">
            <a class="page-link bg-success link-warning" href="{{ $products->nextPageUrl() }}">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
        @endif
    </ul>
</div>
