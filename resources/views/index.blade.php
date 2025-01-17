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


<div class="container mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Latest Blog Posts</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <x-posts :posts="$posts" />
    </div>
</div>

<x-tags />

<x-category :categoryPosts="$categoryPosts" />



<!-- Call to Action Section -->
<div class="bg-black text-white py-16">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-4">Join Our Community</h2>
        <p class="text-xl mb-8">Stay updated with the latest posts and exclusive content.</p>
        <a href="#"
            class="bg-white text-black px-6 py-3 rounded-lg font-semibold hover:bg-gray-200 transition duration-300">Subscribe
            Now</a>
    </div>
</div>
<x-footer />
