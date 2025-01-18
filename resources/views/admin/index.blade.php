<x-header title="The Journal - Admin Dashboard" />
<x-navbar />

<!-- Dashboard Layout -->
<div class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <x-admin-sidebar />

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Content Area -->
        <main class="flex-1 overflow-y-auto p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Authors Card -->
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Authors</h3>
                        <i class="fas fa-users text-blue-500 text-2xl"></i>
                    </div>
                    <p class="text-gray-600 mb-4">Manage authors and their permissions.</p>
                    <a href="{{ route('admin.author') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                        View Authors →
                    </a>
                </div>

                <!-- Posts Card -->
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Posts</h3>
                        <i class="fas fa-newspaper text-green-500 text-2xl"></i>
                    </div>
                    <p class="text-gray-600 mb-4">Manage blog posts and drafts.</p>
                    <a href="{{ route('admin.posts') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                        View Posts →
                    </a>
                </div>

                <!-- Comments Card -->
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Comments</h3>
                        <i class="fas fa-comments text-purple-500 text-2xl"></i>
                    </div>
                    <p class="text-gray-600 mb-4">Manage user comments and moderation.</p>
                    <a href="{{ route('admin.comments') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                        View Comments →
                    </a>
                </div>
            </div>
        </main>
    </div>
</div>

<x-footer />
