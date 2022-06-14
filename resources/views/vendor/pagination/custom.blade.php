@if ($paginator->hasPages())
    <ul class="pagination mb-0">
        @foreach ($elements as $element)
        {{-- Consider using a dropdown to choose a page number
        so that you don't have to navigate in intervals of 5
        (allows you to access any page, even if you are not within 5 pages of it) --}}
            @if (is_string($element))
                <li class="disabled page-item"><span class="page-link">{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active my-active"><span class="page-link" id="page-{{ $page }}">{{ $page }}</span></li>
     {{-- Consider redirecting the first page to the index url --}}
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}" id="page-{{ $page }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
    </ul>
@endif 