<nav class="border-gray-200 px-2 py-5 bg-black border-b">
    <div class="container mx-auto flex flex-wrap items-center justify-between">
        <!-- Logo -->
        <a href="#" class="flex items-center">
            <svg class="h-10 mr-3" width="51" height="70" viewBox="0 0 51 70" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0)">
                    <path d="M1 53H27.9022C40.6587 53 51 42.7025 51 30H24.0978C11.3412 30 1 40.2975 1 53Z"
                        fill="#4A5568"></path>
                    <path
                        d="M-0.876544 32.1644L-0.876544 66.411C11.9849 66.411 22.4111 55.9847 22.4111 43.1233L22.4111 8.87674C10.1196 8.98051 0.518714 19.5571 -0.876544 32.1644Z"
                        fill="#718096"></path>
                    <path d="M50 5H23.0978C10.3413 5 0 15.2975 0 28H26.9022C39.6588 28 50 17.7025 50 5Z" fill="#2D3748">
                    </path>
                </g>
                <defs>
                    <clipPath id="clip0">
                        <rect width="51" height="70" fill="white"></rect>
                    </clipPath>
                </defs>
            </svg>
            <span class="self-center text-lg font-semibold whitespace-nowrap text-white">The Journal</span>
        </a>

        <!-- Search, Login Button, and Mobile Menu Button -->
        <div class="flex md:order-2">
            <!-- Search Bar (Visible on medium and larger screens) -->
            @if (Route::is('home') || Route::is('blog.search'))
                <form action="{{ route('blog.search') }}" method="POST" class="ml-3 relative mr-5 hidden md:block">
                    @csrf
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" name="search"
                        class="bg-gray-50 text-gray-900 sm:text-sm rounded-lg block w-72 pl-10 p-2 focus:outline-none focus:ring-0 focus:border-transparent"
                        placeholder="Search...">
                </form>
            @endif

            <!-- Dropdown for Authenticated Users -->
            @if (Auth::check())
                <div class="relative ml-3" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="text-gray-300 hover:text-white px-4 py-1 rounded-lg transition duration-300 focus:outline-none">
                        {{ Auth::user()->name }}
                        <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" @click.away="open = false" x-cloak
                        class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Create Posts</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}"
                    class="text-gray-300 hover:text-white px-4 py-1 rounded-lg transition duration-300">
                    Login
                </a>
            @endif

            <!-- Mobile Menu Button -->
            <button data-collapse-toggle="mobile-menu-3" type="button"
                class="md:hidden text-gray-400 hover:text-white focus:outline-none focus:ring-0 rounded-lg inline-flex items-center justify-center"
                aria-controls="mobile-menu-3" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <!-- Navigation Links -->
        <div class="hidden md:flex justify-between items-center w-full md:w-auto md:order-1" id="desktop-menu">
            <ul class="flex-col md:flex-row flex md:space-x-8 mt-4 md:mt-0 md:text-sm md:font-medium">
                <li>
                    <a href="{{ route('home') }}"
                        class="{{ Route::is('home') ? 'text-white' : 'text-gray-300 hover:text-white' }} border-b border-gray-700 md:border-0 block pl-3 pr-4 py-2 md:p-0"
                        aria-current="page">Home</a>
                </li>
                @if (Auth::check() && Auth::user()->role == 'admin')
                    <li>
                        <a href="{{ route('admin') }}"
                            class="{{ Route::is('admin') || Route::is('admin/*') ? 'text-white' : 'text-gray-300 hover:text-white' }} border-b border-gray-700 md:border-0 block pl-3 pr-4 py-2 md:p-0">Admin
                            Panel</a>
                    </li>
                @endif
                @if (Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'author'))
                    <li>
                        <a href="{{ route('author') }}"
                            class="{{ Route::is('author') ? 'text-white' : 'text-gray-300 hover:text-white' }} border-b border-gray-700 md:border-0 block pl-3 pr-4 py-2 md:p-0">Author
                            Panel</a>
                    </li>
                @endif
                <li>
                    <a href="#"
                        class="text-gray-300 hover:text-white border-b border-gray-700 md:border-0 block pl-3 pr-4 py-2 md:p-0">About</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Mobile Menu (Hidden by default on larger screens) -->
    <div class="md:hidden hidden w-full" id="mobile-menu-3">
        <!-- Search Bar for Mobile -->
        @if (Route::is('home') || Route::is('blog.search'))
            <form action="{{ route('blog.search') }}" method="POST" class="relative mt-4 mx-4">
                @csrf
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" name="query"
                    class="bg-gray-50 text-gray-900 sm:text-sm rounded-lg block w-full pl-10 p-2 focus:outline-none focus:ring-0 focus:border-transparent"
                    placeholder="Search...">
            </form>
        @endif

        <!-- Mobile Menu Links -->
        <ul class="flex flex-col space-y-2 mt-4 px-4">
            <li class="border-b border-gray-700">
                <a href="{{ route('home') }}"
                    class="{{ Route::is('home') ? 'text-white' : 'text-gray-300 hover:text-white' }} block pl-3 pr-4 py-2 rounded">Home</a>
            </li>
            @if (Auth::check() && Auth::user()->role == 'admin')
                <li class="border-b border-gray-700">
                    <a href="{{ route('admin') }}"
                        class="{{ Route::is('admin') || Route::is('admin/*') ? 'text-white' : 'text-gray-300 hover:text-white' }} block pl-3 pr-4 py-2 rounded">Admin
                        Panel</a>
                </li>
            @endif
            @if (Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'author'))
                <li class="border-b border-gray-700">
                    <a href="{{ route('author') }}"
                        class="{{ Route::is('author') ? 'text-white' : 'text-gray-300 hover:text-white' }} block pl-3 pr-4 py-2 rounded">Author
                        Panel</a>
                </li>
            @endif
            <li class="border-b border-gray-700">
                <a href="#" class="text-gray-300 block pl-3 pr-4 py-2 rounded">About</a>
            </li>
        </ul>

        <!-- Mobile Dropdown for Authenticated Users -->
        @if (Auth::check())
            <div class="mt-4 px-4">
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="text-gray-300 hover:text-white px-4 py-1 rounded-lg transition duration-300 focus:outline-none">
                        {{ Auth::user()->name }}
                        <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" @click.away="open = false" x-cloak
                        class="mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Create Posts</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.querySelector('[data-collapse-toggle="mobile-menu-3"]');
        const mobileMenu = document.getElementById('mobile-menu-3');

        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    });
</script>
