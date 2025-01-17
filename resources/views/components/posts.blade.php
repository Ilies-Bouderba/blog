@props(['posts'])

@foreach ($posts as $post)
<div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <img src="{{ $post->image }}" alt="Blog Post 1"
        class="w-full h-48 object-cover">
    <div class="p-6">
        <span class="text-sm text-gray-500">{{ $post->created_at->format('Y-m-d') }}</span>
        <h3 class="text-xl font-bold text-gray-800 mt-2">{{ Str::limit($post->title, 50, '...') }}</h3>
        <p class="text-gray-600 mt-2">{{ Str::limit($post->content, 75, '...') }}</p>
        <a href="#" class="text-blue-500 font-semibold mt-4 inline-block hover:text-blue-700">Read More
            →</a>
    </div>
</div>
@endforeach
