{{-- Added and customized by Yuris --}}
@if ($paginator->hasPages())
    <div class="row mb-1">
        <div class="col s4 purple lighten-2 white-text">
            <ul class="">
            <li>
                {!! __('Showing') !!}
                    <span class="">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
            </li>
            </ul>
        </div>
        <div class="col s8 purple lighten-2 right-align">
            <ul id="navlist" class="">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="">
                            <span class="">&lsaquo;</span>
                        </li>
                    @else
                        <li class="">
                            <a class="white-text" href="{{ $paginator->previousPageUrl() }}" rel="prev">&lt;</a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class=""><span class="">{{ $element }}</span></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class=""><span class="">{{ $page }}</span></li>
                                @else
                                    <li class=""><a class="white-text" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="">
                            <a class="white-text" href="{{ $paginator->nextPageUrl() }}" rel="next">&gt;</a>
                        </li>
                    @else
                        <li class="">
                            <span class="">&rsaquo;</span>
                        </li>
                    @endif
            </ul>
        </div>
    </div>
@endif
