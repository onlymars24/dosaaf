<!-- <div class="block-right-pages">
    <ul class="block-right-all-pages">
        <li class="pages-item pages-item-active"><a href="">1</a></li>
        <li class="pages-item"><a href="">2</a></li>
        <li class="pages-item"><a href="">3</a></li>
        <li class="pages-item"><a href="">4</a></li>
    </ul>
</div> -->

@if ($paginator->hasPages())
    <nav>
        <ul class="block-right-all-pages pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="pages-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="pages-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="pages-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pages-item pages-item-active" style="border-bottom: 3px solid #00355b;" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="pages-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="pages-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="pages-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif