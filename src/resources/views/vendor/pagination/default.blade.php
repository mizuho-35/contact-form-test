@if ($paginator->hasPages())
    <div class="pagination-area">
        {{-- 前ページ --}}
        @if ($paginator->onFirstPage())
            <span class="page-arrow disabled" aria-hidden="true">&lt;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="page-arrow" rel="prev" aria-label="Previous">&lt;</a>
        @endif

        <ul class="pagination">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>

        {{-- 次ページ --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="page-arrow" rel="next" aria-label="Next">&gt;</a>
        @else
            <span class="page-arrow disabled" aria-hidden="true">&gt;</span>
        @endif
    </div>
@endif
