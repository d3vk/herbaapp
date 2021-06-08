@if ($paginator->hasPages())

    <nav class="d-flex justify-content-between align-items-center" aria-label="Page navigation">
        @if ($paginator->hasMorePages())
            <small class="text-muted">Menampilkan {{ ($paginator->currentPage() - 1) * $paginator->perPage() + 1 }}
                sampai
                {{ $paginator->currentPage() * $paginator->perPage() }} dari {{ $paginator->total() }} item</small>
        @else
            <small class="text-muted">Menampilkan {{ ($paginator->currentPage() - 1) * $paginator->perPage() + 1 }}
                sampai
                {{ $paginator->currentPage() * $paginator->perPage() - 1 }} dari {{ $paginator->total() }}
                item</small>
        @endif

        <ul class="pagination justify-content-end font-weight-semi-bold">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous">
                        <i class="gd-angle-left icon-text icon-text-xs d-inline-block" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous">
                        <i class="gd-angle-left icon-text icon-text-xs d-inline-block" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
            @endif

            @foreach ($elements as $element)

                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a class="page-link" href="{{ $url }}">{{ $page }}<span
                                        class="sr-only">(current)</span></a>
                            </li>
                        @else
                            <li class="page-item"><a class="page-link"
                                    href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">
                        <i class="gd-angle-right icon-text icon-text-xs d-inline-block" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">
                        <i class="gd-angle-right icon-text icon-text-xs d-inline-block" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
