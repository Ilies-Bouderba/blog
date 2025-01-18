<x-header title="The Journal - Posts Dashboard" />
<x-navbar />

<!-- Dashboard Layout -->
<div class="flex">

    <x-admin-sidebar />

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">

        <!-- Content Area -->
        <main class="flex-1 p-6">
            <div class="bg-white p-6 rounded-lg">

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-6">
                    <form action="#" method="GET" class="flex items-center">
                        <input type="text" name="search" placeholder="Search Posts..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none" />
                        <button type="submit"
                            class="bg-black text-white px-4 py-2 rounded-r-lg hover:bg-gray-900 focus:outline-none">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

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
                            @foreach ($posts as $post)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4 border-b">{{ $post->id }}</td>
                                    <td class="py-3 px-4 border-b">{{ Str::limit($post->title, 40, '...') }}</td>
                                    <td class="py-3 px-4 border-b">{{ $post->author->name }}</td>
                                    <td class="py-3 px-4 border-b">
                                        <form action="{{ route('admin.posts.delete', $post->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this post?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <span class="m-0 p-0">
                {{ $posts->links('vendor.pagination.simple-default') }}
            </span>
        </main>
    </div>
</div>

<!-- FontAwesome Icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<x-footer />
