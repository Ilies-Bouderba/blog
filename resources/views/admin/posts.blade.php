<x-header title="The Journal - Posts Dashboard" />
<x-navbar />

<!-- Debugging Search Results -->
@if (isset($searchPost))
    @dd($searchPost)
@endif

<!-- Dashboard Layout -->
<div class="flex">
    <x-admin-sidebar />

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Content Area -->
        <main class="flex-1 p-6">
            <div class="bg-white p-6 rounded-lg shadow-sm">

                <!-- Session Messages -->
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Search Bar -->
                @if ($posts->isNotEmpty())
                    <div class="mb-6">
                        <form action="{{ route('admin.posts.search') }}" method="POST" class="flex items-center">
                            @csrf
                            <input type="text" name="search" placeholder="Search Posts..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent"
                                value="{{ $search ?? '' }}" />
                            <button type="submit"
                                class="bg-black text-white px-4 py-2 rounded-r-lg hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-black">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                @endif

                <h2 class="text-lg font-semibold mb-4">Manage Posts</h2>

                <!-- Posts Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-3 px-4 border-b text-left">ID</th>
                                <th class="py-3 px-4 border-b text-left">Title</th>
                                <th class="py-3 px-4 border-b text-left">Author</th>
                                <th class="py-3 px-4 border-b text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <tr class="hover:bg-gray-50 transition duration-200">
                                    <td class="py-3 px-4 border-b">{{ $post->id }}</td>
                                    <td class="py-3 px-4 border-b">{{ Str::limit($post->title, 40, '...') }}</td>
                                    <td class="py-3 px-4 border-b">{{ $post->author->name }}</td>
                                    <td class="py-3 px-4 border-b">
                                        <form action="{{ route('admin.posts.delete', $post->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this post?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-800 focus:outline-none">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-6 text-center">
                                        <!-- Empty State -->
                                        <div class="flex flex-col items-center justify-center p-8 rounded-lg">
                                            <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            </svg>
                                            <p class="text-gray-600 text-lg font-medium mb-4">No posts found.</p>
                                            <a href="{{ route('admin.posts') }}"
                                                class="inline-flex items-center px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-900 transition duration-300">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                                    </path>
                                                </svg>
                                                Go to the First Page
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($posts->hasPages())
                    <div class="mt-6">
                        {{ $posts->links('vendor.pagination.simple-default') }}
                    </div>
                @endif
            </div>
        </main>
    </div>
</div>
<x-footer />
