<x-header title="The Journal" />
<x-navbar />

<div class="bg-black text-white py-20">
    <div class="container mx-auto text-center">
        <h1 class="text-5xl font-bold mb-4">Welcome to Bloggers</h1>
        <p class="text-xl mb-8">Your go-to place for the latest insights, stories, and trends.</p>
        <a href="#"
            class="bg-white text-black px-6 py-3 rounded-lg font-semibold hover:bg-gray-200 transition duration-300">Explore
            Blogs</a>
    </div>
</div>


<div class="container mx-auto px-6 py-12 ">
    <h2 class="text-3xl font-bold text-gray-800 mb-8" id='posts-section-0'>Latest Blog Posts</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-4">
        <x-posts :posts="$posts" />
    </div>
        {{ $posts->links('vendor.pagination.simple-default') }}
</div>

<x-tags />

<x-category :categoryPosts="$categoryPosts" />

<x-footer />
