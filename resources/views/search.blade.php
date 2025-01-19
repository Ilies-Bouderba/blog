<x-header title="The Journal - {{ $search }}" />
<x-navbar />
<div class="container mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-gray-800 mb-8" id='posts-section-0'>Latest Blog Posts</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <x-posts :posts="$posts" />
        {{ $posts->links('vendor.pagination.simple-default') }}
    </div>
</div>
<x-footer />
