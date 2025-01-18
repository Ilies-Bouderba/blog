<x-header title="The Journal - Sign Up" />
<x-navbar />
<section class="bg-white flex items-center justify-center min-h-screen">
    <div class="w-full max-w-6xl px-8 flex gap-12">
        <!-- Sign Up Form -->
        <div class="w-1/2">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Create Your Account</h2>
                <p class="text-gray-600">Join our community of bloggers</p>
            </div>

            <!-- Sign Up with Google Button -->
            <a href="#"
                class="w-full flex items-center justify-center gap-2 bg-black rounded-lg py-2.5 px-4 mb-4 text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black">
                <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google Logo" class="w-5 h-5" />
                Sign Up with Google
            </a>

            <div class="flex items-center my-6">
                <div class="flex-grow border-t border-gray-300"></div>
                <span class="mx-4 text-gray-500">or</span>
                <div class="flex-grow border-t border-gray-300"></div>
            </div>

            <!-- Sign Up Form -->
            <form method="POST" action="{{ route('signup') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your full name"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent"
                        required value="{{ old('name') }}" />
                    @error('name')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent"
                        required value="{{ old('Email') }}" />
                    @error('email')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent"
                        required />
                    @error('password')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit"
                    class="w-full bg-black text-white py-2.5 px-4 rounded-lg font-semibold hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black text-center block">
                    Sign Up
                </button>
            </form>

            <!-- Additional Links -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-black hover:text-gray-800">Log in</a>
                </p>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="w-1/2 bg-gray-50 p-8 rounded-lg shadow-sm">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Why Join Us?</h2>
            <ul class="space-y-4">
                <li class="flex items-start">
                    <span class="text-green-500 mr-2">✓</span>
                    <p class="text-gray-600">Access exclusive content and resources.</p>
                </li>
                <li class="flex items-start">
                    <span class="text-green-500 mr-2">✓</span>
                    <p class="text-gray-600">Connect with a community of passionate bloggers.</p>
                </li>
                <li class="flex items-start">
                    <span class="text-green-500 mr-2">✓</span>
                    <p class="text-gray-600">Get personalized recommendations and insights.</p>
                </li>
            </ul>
            <div class="mt-8">
                <p class="text-gray-600 text-sm">"This platform changed the way I share my stories. Highly recommended!"
                </p>
                <p class="text-gray-800 font-semibold mt-2">- Jane Doe, Blogger</p>
            </div>
        </div>
    </div>
</section>
<x-footer />
