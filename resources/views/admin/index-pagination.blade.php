<style>
    .index_pagination {
        display: flex;
        justify-content: center;
        margin-top: 2rem;
        font-size: 1.2rem;
        list-style: none;
    }

    .index_pagination li {
        align-items: center;
    }

    .index_pagination li a {
        color: #2f3859;
        margin: 0.5rem;
        padding: 0.5rem; 
    }
    .index_pagination li a.active {
        width: 3rem;
        height: 3rem;
        background-color: #0E8088;
        color: #fff;
        border-radius: 50%;
        box-shadow:  0 10px 25px 0 #D0D0D0;
    }
    .index_pagination li a:hover:not(.active) {
        background-color: #e1e7f0;
        border-radius: 50%;;
    }

</style>

@if ($paginator->hasPages())
    <ul class="index_pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li aria-disabled="true" aria-label="@lang('pagination.previous')">
                &lsaquo;
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li aria-disabled="true">{{ $element }}</li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li aria-current="page"><a class="active" href="#">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        @else
            <li aria-disabled="true" aria-label="@lang('pagination.next')">
            &rsaquo;
            </li>
        @endif
    </ul>
@endif