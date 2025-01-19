<x-header title="The Journal - Authors Dashboard" />
<x-navbar />

<div class="flex">
    <!-- Sidebar -->
    <x-admin-sidebar />

    <div class="flex-1 flex flex-col">
        <main class="flex-1 p-6">
            <div class="bg-white p-6 rounded-lg shadow-sm">

                <!-- Session Messages -->
                @if (session('success') || session('error'))
                    <div class="{{ session('success') ? 'bg-green-100 border-green-400 text-green-700' : 'bg-red-100 border-red-400 text-red-700' }} border px-4 py-3 rounded mb-4">
                        {{ session('success') ?? session('error') }}
                    </div>
                @endif

                <!-- Search Bar -->
                @if ($authors->isNotEmpty())
                    <h2 class="text-lg font-semibold mb-4">Manage Authors</h2>
                    <div class="mb-6">
                        <form action="{{ route('admin.author.search') }}" method="POST" class="flex items-center">
                            @csrf
                            <input type="text" name="search" placeholder="Search authors..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent"
                                value="{{ $search ?? '' }}" />
                            <button type="submit"
                                class="bg-black text-white px-4 py-2 rounded-r-lg hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-black">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                @endif

                <!-- Add New Author Form -->
                <div class="mb-6">
                    <h3 class="text-md font-semibold mb-2">Add New Author</h3>
                    <form action="{{ route('admin.author.post') }}" method="POST" class="flex items-center gap-4">
                        @csrf
                        <input type="email" name="email" placeholder="Enter author's email"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent"
                            required />
                        <button type="submit"
                            class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-black">
                            <i class="fas fa-plus"></i>
                        </button>
                    </form>
                </div>

                <!-- Authors Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-3 px-4 border-b text-left">ID</th>
                                <th class="py-3 px-4 border-b text-left">Name</th>
                                <th class="py-3 px-4 border-b text-left">Email</th>
                                <th class="py-3 px-4 border-b text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($authors->isEmpty())
                                <tr>
                                    <td colspan="4" class="py-6 text-center">
                                        <!-- Empty State -->
                                        <div class="flex flex-col items-center justify-center p-8 rounded-lg">
                                            <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <p class="text-gray-600 text-lg font-medium mb-4">No authors found.</p>
                                            <a href="{{ route('admin.author') }}"
                                                class="inline-flex items-center px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-900 transition duration-300">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                                </svg>
                                                Go to the First Page
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @else
                                @foreach ($authors as $author)
                                    <tr class="hover:bg-gray-50 transition duration-200">
                                        <td class="py-3 px-4 border-b">{{ $author->id }}</td>
                                        <td class="py-3 px-4 border-b">{{ $author->name }}</td>
                                        <td class="py-3 px-4 border-b">{{ $author->email }}</td>
                                        <td class="py-3 px-4 border-b">
                                            <form action="{{ route('admin.author.patch', $author->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this author?');">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-red-600 hover:text-red-800 focus:outline-none">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($authors->hasPages())
                    <div class="mt-6">
                        {{ $authors->links('vendor.pagination.simple-default') }}
                    </div>
                @endif
            </div>
        </main>
    </div>
</div>

<!-- FontAwesome Icons -->
<x-footer />
