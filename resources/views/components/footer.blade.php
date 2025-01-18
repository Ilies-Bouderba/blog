<!-- Call to Action Section -->
<div class="bg-black text-white py-16">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-4">Join Our Community</h2>
        <p class="text-xl mb-8">Stay updated with the latest posts and exclusive content.</p>
        <a href="#"
            class="bg-white text-black px-6 py-3 rounded-lg font-semibold hover:bg-gray-200 transition duration-300">Subscribe
            Now</a>
    </div>
</div>
<!-- Footer -->
<footer class="bg-black text-white border-t border-white py-8">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Column 1 -->
            <div>
                <h3 class="text-xl font-bold mb-4">About Us</h3>
                <p class="text-gray-400">We are a team of passionate bloggers sharing the latest insights and trends.</p>
            </div>

            <!-- Column 2 -->
            <div>
                <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white">Home</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Blog</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Contact</a></li>
                </ul>
            </div>

            <!-- Column 3 -->
            <div>
                <h3 class="text-xl font-bold mb-4">Follow Us</h3>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.56v14.91c0 .97-.79 1.76-1.76 1.76H1.76C.79 21.23 0 20.44 0 19.47V4.56C0 3.59.79 2.8 1.76 2.8h20.48c.97 0 1.76.79 1.76 1.76zM9.6 18.24V9.6H7.2v8.64h2.4zm-1.2-9.84c.84 0 1.44-.6 1.44-1.44-.02-.84-.6-1.44-1.44-1.44-.84 0-1.44.6-1.44 1.44 0 .84.6 1.44 1.44 1.44zm10.8 9.84v-4.8c0-2.52-1.44-3.6-3.36-3.6-1.56 0-2.28.84-2.64 1.44v-1.2H12v8.64h2.4v-4.32c0-1.08.24-2.16 1.56-2.16 1.32 0 1.32 1.2 1.32 2.28v4.2H19.2z"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22.23 5.924c-.806.358-1.67.6-2.577.708a4.515 4.515 0 001.98-2.49 9.02 9.02 0 01-2.86 1.09 4.506 4.506 0 00-7.677 4.108 12.8 12.8 0 01-9.29-4.71 4.506 4.506 0 001.394 6.014 4.49 4.49 0 01-2.04-.563v.057a4.506 4.506 0 003.616 4.415 4.52 4.52 0 01-2.034.077 4.506 4.506 0 004.21 3.128 9.036 9.036 0 01-5.6 1.93c-.364 0-.724-.02-1.08-.063a12.78 12.78 0 006.92 2.03c8.3 0 12.84-6.88 12.84-12.84 0-.195-.004-.39-.013-.584a9.17 9.17 0 002.26-2.34z"/></svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="text-center mt-8">
            <p class="text-gray-400">&copy; {{ now()->format('Y') }} Bloggers. All rights reserved.</p>
        </div>
    </div>
</footer>
