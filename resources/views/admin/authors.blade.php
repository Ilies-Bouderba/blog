<x-header title="The Journal - Authors Dashboard" />
<x-navbar />

<div class="flex h-screen">
    <!-- Sidebar -->
    <x-admin-sidebar />

    <div class="flex-1 flex flex-col">
        <main class="flex-1 p-6">
            <div class="bg-white p-6 rounded-lg">
                <h2 class="text-lg font-semibold mb-4">Manage Authors</h2>

                <!-- Search Bar -->
                <div class="mb-6">
                    <form action="#" method="GET" class="flex items-center">
                        <input type="text" name="search" placeholder="Search authors..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none" />
                        <button type="submit"
                            class="bg-black text-white px-4 py-2 rounded-r-lg hover:bg-gray-900 focus:outline-none">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

                <!-- Add New Author Form -->
                <div class="mb-6">
                    <h3 class="text-md font-semibold mb-2">Add New Author</h3>
                    <form action="#" method="POST" class="flex items-center gap-4">
                        <!-- Email Input -->
                        <input type="email" name="email" placeholder="Enter author's email"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none"
                            required />
                        <!-- Add Button -->
                        <button type="submit"
                            class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-900 focus:outline-none">
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

                            @foreach ($authors as $author)
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-4 border-b">{{ $author->id }}</td>
                                <td class="py-3 px-4 border-b">{{ $author->name }}</td>
                                <td class="py-3 px-4 border-b">{{ $author->email }}</td>
                                <td class="py-3 px-4 border-b">
                                    <a href="#" class="text-red-600 hover:text-red-800">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <span class="m-0 p-0">
                {{ $authors->links('vendor.pagination.simple-default') }}
            </span>
        </main>
    </div>
</div>

<!-- FontAwesome Icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<x-footer />
