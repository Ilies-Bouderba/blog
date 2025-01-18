@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex">
        <div class="flex mx-2"> <!-- Removed padding/margin from the div -->
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="px-4 py-2 bg-black text-white opacity-50 cursor-not-allowed rounded-lg">Previous</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 bg-black text-white hover:bg-gray-900 rounded-lg transition-colors">Previous</a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class=" mx-2 px-4 py-2 bg-black text-white hover:bg-gray-900 rounded-lg transition-colors">Next</a>
            @else
                <span class="mx-2 px-4 py-2 bg-black text-white opacity-50 cursor-not-allowed rounded-lg">Next</span>
            @endif
        </div>
    </nav>
@endif
