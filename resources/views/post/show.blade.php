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
            <img src="{{ route('image.show', ['filename' => basename($post->image)]) }}" alt="{{ $post->title }}" class="w-full h-auto mb-8 rounded-lg">
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
    <div class="max-w-3xl mx-auto mt-16 border-t-2 border-gray-200 pt-8">
        <h2 class="text-3xl font-bold text-black mb-8">Comments</h2>

        <!-- Comment Submission Form -->
        @if (Auth::check())
        <form action="{{ route('blog.comment', $post->id) }}" method="POST" class="mb-8">
            @csrf
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Your Comment</label>
                <textarea name="content" id="content" rows="8"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none" placeholder="Please write your comment here ..." required></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-black text-white font-semibold rounded-lg hover:bg-gray-800 focus:outline-none">
                Submit Comment
            </button>
            </div>
        </form>
        @else
            please login to be able to post a comment
        @endif

        <!-- Display Comments -->
        <div class="space-y-8">
            @forelse ($post->comments as $comment)
                <div class="border-l-4 border-black pl-4">
                    <div class="flex items-center mb-2">
                        <span class="font-semibold text-black">{{ $comment->user->name }}</span>
                        <span class="text-sm text-gray-600 ml-2">{{ $comment->created_at->format('Y-m-d - H:m') }}</span>
                        @if (Auth::check() && (Auth::user()->id == $comment->user_id || Auth::user()->role == "admin" || Auth::user()->id == $post->author_id))
                            <form action="{{ route('blog.comment.delete', $comment->id) }}" method="POST" class="ml-auto">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </form>
                        @endif
                    </div>
                    <p class="text-gray-700">{{ $comment->content }}</p>
                </div>
            @empty
                <div class="flex flex-col items-center justify-center p-8 rounded-lg">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    <p class="text-gray-600 text-lg font-medium mb-4">No Comments found.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<x-footer />
