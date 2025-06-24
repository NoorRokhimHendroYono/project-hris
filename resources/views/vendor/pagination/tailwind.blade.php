@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center mt-6">
        <div class="inline-flex">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="px-3 py-2 text-gray-500 bg-white border border-gray-300 rounded-l">‹</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-2 text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 rounded-l">‹</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-3 py-2 text-gray-700 bg-white border border-gray-300">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-3 py-2 text-white bg-blue-900 border border-blue-900">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="px-3 py-2 text-gray-700 bg-white border border-gray-300 hover:bg-gray-100">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-2 text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 rounded-r">›</a>
            @else
                <span class="px-3 py-2 text-gray-500 bg-white border border-gray-300 rounded-r">›</span>
            @endif
        </div>
    </nav>
@endif
