        <!-- Sidebar -->
        <div class="bg-black text-white w-64 space-y-6 py-7 px-2 border-b border-white">
            <div class="text-2xl font-bold text-center">
                Admin Panel
            </div>
            <nav>
                <a href="{{ route('admin.author') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-900">
                    Manage Authors
                </a>
                <a href="{{ route('admin.posts') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-900">
                    Manage Posts
                </a>
                <a href="{{ route('admin.comments') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-900">
                    Manage Comments
                </a>
            </nav>
        </div>
