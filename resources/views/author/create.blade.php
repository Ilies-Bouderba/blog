<x-header title="The Journal - Create Post" />
<x-navbar />

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Create Post</h1>

    <!-- Display Success Message -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Create Form -->
    <form action="{{ route('author.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Image Upload Field -->
        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-bold mb-2">Upload Image</label>
            <input type="file" name="image" id="image"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none">
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Title Field -->
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none" required>
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Category Field -->
        <div class="mb-4">
            <label for="category" class="block text-gray-700 font-bold mb-2">Category</label>
            <select name="category_id" id="category"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-0 bg-white text-gray-900 hover:outline-none ">
                <option value="" disabled selected>Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" class="hover:bg-gray-900 hover:text-white">{{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Content Field -->
        <div class="mb-4">
            <label for="content" class="block text-gray-700 font-bold mb-2">Content</label>
            <textarea name="content" id="content" rows="10"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none" required>{{ old('content') }}</textarea>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit"
                class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-900 transition duration-300">
                Create Post
            </button>
        </div>
    </form>
</div>

<x-footer />
