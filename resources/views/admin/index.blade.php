<x-header title="The Journal - Admin Dashboard" />
<x-navbar />

    <!-- Dashboard Layout -->
    <div class="flex h-screen">
    <x-admin-sidebar />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">

            <!-- Content Area -->
            <main class="flex-1 p-6">
                <div class="bg-white p-6 rounded-lg">
                    <h2 class="text-lg font-semibold mb-4">Dashboard Overview</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Authors Card -->
                        <div class="bg-gray-50 p-4 rounded-lg shadow">
                            <h3 class="font-semibold">Authors</h3>
                            <p class="text-gray-600">Manage authors and their permissions.</p>
                            <a href="#" class="text-blue-600 hover:text-blue-800">View Authors →</a>
                        </div>

                        <!-- Posts Card -->
                        <div class="bg-gray-50 p-4 rounded-lg shadow">
                            <h3 class="font-semibold">Posts</h3>
                            <p class="text-gray-600">Manage blog posts and drafts.</p>
                            <a href="#" class="text-blue-600 hover:text-blue-800">View Posts →</a>
                        </div>

                        <!-- Comments Card -->
                        <div class="bg-gray-50 p-4 rounded-lg shadow">
                            <h3 class="font-semibold">Comments</h3>
                            <p class="text-gray-600">Manage user comments and moderation.</p>
                            <a href="#" class="text-blue-600 hover:text-blue-800">View Comments →</a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

<x-footer />
