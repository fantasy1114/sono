{{-- Added and customized by Yuris --}}
@if ($paginator->hasPages())
<!-- <div class="navbar-fixed"> -->
    <nav>
        <div class="nav-wrapper blue darken-2">
            {!! __('Showing') !!}
                    <span class="">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
            <ul class="right">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="disabled">
                            <span class="ml-5">&lsaquo;</span>
                        </li>
                    @else
                        <li class="">
                            <a class="" href="{{ $paginator->previousPageUrl() }}" rel="prev">&lsaquo;</a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="disabled"><span class="">{{ $element }}</span></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class=""><span class="">{{ $page }}</span></li>
                                @else
                                    <li class=""><a class="" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="">
                            <a class="" href="{{ $paginator->nextPageUrl() }}" rel="next">&rsaquo;</a>
                        </li>
                    @else
                        <li class="">
                            <span class="">&rsaquo;</span>
                        </li>
                    @endif
            </ul>
        </div>
    </nav>
<!-- </div> -->
@endif
