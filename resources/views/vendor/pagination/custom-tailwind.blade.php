@if ($paginator->hasPages())
    <div class="mt-8 flex justify-center">
        <nav class="flex items-center space-x-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="px-3 py-2 text-gray-500 bg-white rounded-md">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.793 14.707a1 1 0 01-1.414 0L7.586 10l3.793-3.793a1 1 0 011.414 1.414L10.414 10l2.379 2.379a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                    </svg>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-2 text-gray-500 bg-white rounded-md hover:bg-gray-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.793 14.707a1 1 0 01-1.414 0L7.586 10l3.793-3.793a1 1 0 011.414 1.414L10.414 10l2.379 2.379a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a href="#" class="px-4 py-2 text-gray-700 bg-white rounded-md hidden sm:inline-block">
                        {{ $element }}
                    </a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-4 py-2 text-blue-600 bg-blue-100 rounded-md font-bold">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="px-4 py-2 text-gray-700 bg-white rounded-md hover:bg-gray-200">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-2 text-gray-500 bg-white rounded-md hover:bg-gray-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.207 5.293a1 1 0 010 1.414L11.414 10l-4.207 4.293a1 1 0 01-1.414-1.414L9.586 10 5.793 6.207a1 1 0 011.414-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            @else
                <span class="px-3 py-2 text-gray-500 bg-white rounded-md">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.207 5.293a1 1 0 010 1.414L11.414 10l-4.207 4.293a1 1 0 01-1.414-1.414L9.586 10 5.793 6.207a1 1 0 011.414-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </span>
            @endif
        </nav>
    </div>
@endif
