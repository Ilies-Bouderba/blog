<x-header title="The Journal - Admin Dashboard" />
<x-navbar />

<div class="flex min-h-screen">
    <!-- Main Content -->
    <div class="flex-1 p-8">
        <h1 class="text-2xl font-bold mb-6">Welcome, {{ Auth::user()->name }}!</h1>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Published Posts Card -->
            <div class="p-6 rounded-lg shadow bg-gray-900">
                <h3 class="text-lg font-semibold mb-2 text-white">Published Posts</h3>
                <p class="text-2xl font-bold text-white">{{ $count }}</p>
            </div>
        </div>


        <!-- Recent Posts Table -->


        <div class="bg-white rounded-lg">

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <div class="flex justify-between items-center mb-4">
                <!-- Recent Posts Heading -->
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Recent Posts</h2>

                <!-- New Post Button -->
                <a href="{{ route('author.create') }}" class="inline-flex items-center bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-900 transition duration-300 dark:bg-black dark:hover:bg-gray-900">
                    <i class="fas fa-plus mr-2"></i> New Post
                </a>
            </div>

            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-left">Title</th>
                        <th class="py-2 px-4 border-b text-left">Date</th>
                        <th class="py-2 px-4 border-b text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b">{{ $post->title }}</td>
                            <td class="py-2 px-4 border-b">{{ $post->created_at->format('Y-m-d') }}</td>
                            <td class="py-2 px-4 border-b">
                                <div class="flex space-x-2">
                                    <!-- View Button -->
                                    <a href="{{ route('blog', $post->id) }}"
                                        class="inline-flex items-center bg-gray-700 text-white px-4 py-2 rounded-lg hover:bg-gray-900 transition duration-300 dark:bg-gray-700 dark:hover:bg-gray-900">
                                        <i class="fas fa-eye mr-2"></i> View
                                    </a>

                                    <!-- Edit Button -->
                                    <form action="{{ route('author.edit', $post->id) }}" method="GET">
                                        @csrf
                                        <button type="submit"
                                            class="inline-flex items-center bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition duration-300 dark:bg-green-600 dark:hover:bg-green-700">
                                            <i class="fas fa-trash mr-2"></i> Edit
                                        </button>
                                    </form>

                                    <form action="{{ route('author.delete', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300 dark:bg-red-600 dark:hover:bg-red-700"
                                            onclick="return confirm('Are you sure you want to delete this post?');">
                                            <i class="fas fa-trash mr-2"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-6 text-center">
                            <!-- Empty State -->
                            <div class="flex flex-col items-center justify-center p-8 rounded-lg">
                                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="text-gray-600 text-lg font-medium mb-4">No comments found.</p>
                                <a href="{{ route('admin.comments') }}"
                                    class="inline-flex items-center px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-900 transition duration-300">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
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
        <span class="mt-4 block">
            {{ $posts->links('vendor.pagination.simple-default') }}
        </span>
    </div>
</div>
<x-footer />
