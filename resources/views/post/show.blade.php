<x-header title="The Journal - {{ $post->title }}" />
    <x-navbar />

    <div class="container mx-auto px-4 py-12">
        <!-- Blog Post Section -->
        <div class="max-w-3xl mx-auto">
            <!-- Blog Title -->
            <h1 class="text-5xl font-bold text-black mb-6">{{ $post->title }}</h1>

            <!-- Blog Meta Information (e.g., author, date) -->
            <div class="flex items-center text-sm text-gray-600 mb-8">
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                    </path>
                </svg>
                <span class="mx-2">By: {{ $post->author->name }}</span>
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
                <span class="mx-2">Published on: {{ $post->created_at->format('F j, Y') }}</span>
            </div>

            <!-- Blog Image (if available) -->
            @if ($post->image)
                <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-auto mb-8 rounded-lg">
            @endif

            <!-- Blog Content -->
            <div class="prose prose-lg max-w-none text-black mb-12">
                {!! $post->content !!}
            </div>

            <!-- Back to Blog List -->
            <div class="mt-8">
                <a href="{{ route('home') }}" class="text-black hover:text-gray-700 font-semibold">← Back to Blog</a>
            </div>
        </div>

        <!-- Comments Section -->
        <div class="max-w-3xl mx-auto mt-16">
            <h2 class="text-3xl font-bold text-black mb-8">Comments</h2>

            <!-- Hard-Coded Comments -->
            <div class="space-y-8">
                @foreach ($post->comments as $comment)
                <div class="border-l-4 border-black pl-4">
                    <div class="flex items-center mb-2">
                        <span class="font-semibold text-black">{{ $comment->user->name }}</span>
                        <span class="text-sm text-gray-600 ml-2">{{ $comment->created_at->format('Y-m-d - H:m') }}</span>
                    </div>
                    <p class="text-gray-700">{{ $comment->content }}</p>
                </div>
                @endforeach
            </div>

        </div>
    </div>

    <x-footer />
