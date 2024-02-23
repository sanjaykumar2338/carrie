@if ($paginator->hasPages())
    <nav aria-label="Blog Pagination">
        <ul class="pagination text-center p-t20">

            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link prev" href="javascript:void(0);">Prev</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link prev" href="{{ $paginator->previousPageUrl() }}">Prev</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item"><a class="page-link active" href="javascript:void(0);"><span>{{ $page }}</span></a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}"><span>{{ $page }}</span></a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link next" href="{{ $paginator->nextPageUrl() }}">Next</a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link next">Next</a>
                </li>
            @endif

            
        </ul>
    </nav>
@endif