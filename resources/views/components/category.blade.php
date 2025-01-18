@props(['categoryPosts'])

@foreach ($categoryPosts as $categoryPost)
<div class="container mx-auto px-6 py-6">
    <nav class="flex mb-8" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li>
                <div class="flex items-center">
                    <a href="#"
                        class="text-3xl font-bold text-gray-500 hover:text-gray-900 transition duration-300">Category</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="text-3xl font-bold text-gray-700">{{ $categoryPost->name }}</span>
                </div>
            </li>
        </ol>
    </nav>
</div>

    <div class="container mx-auto px-6 pb-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <x-posts :posts="$categoryPost->post" />
        </div>
    </div>

@endforeach
