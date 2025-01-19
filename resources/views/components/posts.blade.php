@props(['posts'])

@if ($posts->count() == 0)
    <div class="col-span-3 text-center p-8 rounded-lg">
        <!-- Icon for visual appeal -->
        <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>

        <!-- Message -->
        <p class="text-gray-600 text-lg font-medium mb-4">No posts found on this page.</p>

        <!-- Button to go to the first page -->
        <a href="{{ $posts->url(1) }}#posts-section-0" class="inline-flex items-center px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-900 transition duration-300">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            Go to the First Page
        </a>
    </div>
@else
    @foreach ($posts as $post)
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="{{ $post->image }}" alt="Blog Post 1"
            class="w-full h-48 object-cover">
        <div class="p-6">
            <span class="text-sm text-gray-500">{{ $post->created_at->format('Y-m-d') }}</span>
            <h3 class="text-xl font-bold text-gray-800 mt-2">{{ Str::limit($post->title, 50, '...') }}</h3>
            <p class="text-gray-600 mt-2">{{ Str::limit($post->content, 75, '...') }}</p>
            <a href="/blog/{{ $post->id }}" class="mt-4 inline-block text-black hover:text-gray-700 font-semibold">Read More
                →</a>
        </div>
    </div>
    @endforeach
@endif
