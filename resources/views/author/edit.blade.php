<x-header title="The Journal - Edit Post" />
<x-navbar />

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Edit Post</h1>

    <!-- Display Success Message -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Edit Form -->
    <form action="{{ route('author.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Title Field -->
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none"
                   required>
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Content Field -->
        <div class="mb-4">
            <label for="content" class="block text-gray-700 font-bold mb-2">Content</label>
            <textarea name="content" id="content" rows="10"
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none"
                      required>{{ old('content') }}</textarea>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit"
                    class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-900 transition duration-300">
                Update Post
            </button>
        </div>
    </form>
</div>

<x-footer />
