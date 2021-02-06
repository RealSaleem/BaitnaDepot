@if ($paginator->hasPages())
<div class="row">
    <div class="col s12">
        <ul class="pagination float-right">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled">
                    <a href="javascript:;">
                        <i class="material-icons">chevron_left</i>
                    </a>
                </li>
            @else
                <li class="waves-effect">
                    <a href="{{ $paginator->previousPageUrl() }}">
                        <i class="material-icons">chevron_left</i>
                    </a>
                </li>
            @endif
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"><a href="javascript:;">{{ $page }}</a></li>
                        @else
                            <li><a class="waves-effect" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif    
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="waves-effect">
                    <a href="{{ $paginator->nextPageUrl() }}">
                        <i class="material-icons">chevron_right</i>
                    </a>
                </li>
            @else
               <li class="disabled">
                    <a href="javascript:;">
                        <i class="material-icons">chevron_right</i>
                    </a>
                </li>
            @endif
            
        </ul>
        <div class="mt-1">
            <p class="text-sm text-gray-700 leading-5">
                {{ __('site.showing') }}
                <span class="font-medium">{{ $paginator->firstItem() }}</span>
                {{ __('site.to') }}
                <span class="font-medium">{{ $paginator->lastItem() }}</span>
                {{ __('site.of') }}
                <span class="font-medium">{{ $paginator->total() }}</span>
                {{ __('site.results') }}
            </p>
        </div>
    </div>
</div>
@endif