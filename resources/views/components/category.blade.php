@props(['categoryPosts'])

@foreach ($categoryPosts as $categoryPost)
    <div class="container mx-auto px-6 py-6" id="posts-section-{{ $categoryPost->id }}">
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li>
                    <div class="flex items-center">
                        <a href="#"
                            class="text-3xl font-bold text-gray-500 hover:text-gray-900 transition duration-300">Category</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="text-3xl font-bold text-gray-700">{{ $categoryPost->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="container mx-auto px-6 pb-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @if ($categoryPost->posts->count() > 0)
                <x-posts :posts="$categoryPost->posts" />
            @else
                <div class="col-span-3 text-center p-8 rounded-lg">
                    <!-- Icon for visual appeal -->
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>

                    <!-- Message -->
                    <p class="text-gray-600 text-lg font-medium mb-4">No posts found on this page.</p>

                    <!-- Button to go to the first page -->
                    <a href="{{ $categoryPost->posts->url(1) }}#posts-section-{{ $categoryPost->id }}" class="inline-flex items-center px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-900 transition duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Go to the First Page
                    </a>
                </div>
            @endif
        </div>

        <!-- Pagination Links -->
        <span class="mt-8 block">
            {{ $categoryPost->posts->appends([str_replace([' ', '.', '&', '%', '#'], '_', strtolower($categoryPost->name)) . '_page' => $categoryPost->posts->currentPage()])->fragment('posts-section-' . $categoryPost->id)->links('vendor.pagination.simple-default') }}
        </span>
    </div>
@endforeach
