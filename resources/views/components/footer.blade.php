<footer class="bg-[#070707] border-t border-zinc-900 text-zinc-400 py-16 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
            <!-- Brand & Tagline -->
            <div class="space-y-4">
                <span class="text-3xl font-black tracking-wider text-yellow-400 uppercase">
                    Guitar<span class="text-white">Hero</span>
                </span>
                <p class="text-zinc-500 text-sm leading-relaxed uppercase tracking-wider font-mono">
                    @ 2026 GUITAR HERO. HIGH VOLTAGE PERFORMANCE.
                </p>
                <div class="flex space-x-4 pt-2">
                    <a href="#" class="text-zinc-500 hover:text-yellow-400 transition-colors duration-200">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.315 2c2.43 0 2.784.01 3.752.054 9.4 1.71 1.7 9.4 1.71 12.315 0 2.43-.01 2.784-.054 3.752-.44 9.4-1.71 1.7-9.4 1.71H12.3c-2.43 0-2.784-.01-3.752-.054-9.4-1.71-1.7-9.4-1.71-12.315 0-2.43.01-2.784.054-3.752.44-9.4 1.71-1.7 9.4-1.71h.03zM12 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
                        </svg>
                    </a>
                    <a href="#" class="text-zinc-500 hover:text-yellow-400 transition-colors duration-200">
                        <span class="sr-only">YouTube</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.163a3.003 3.003 0 00-2.11-2.11C19.517 3.545 12 3.545 12 3.545s-7.517 0-9.388.508a3.003 3.003 0 00-2.11 2.11C0 8.033 0 12 0 12s0 3.967.502 5.837a3.003 3.003 0 002.11 2.11c1.871.508 9.388.508 9.388.508s7.517 0 9.388-.508a3.003 3.003 0 002.11-2.11c.502-1.87.502-5.837.502-5.837s0-3.967-.502-5.837zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                        </svg>
                    </a>
                    <a href="#" class="text-zinc-500 hover:text-yellow-400 transition-colors duration-200">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Links -->
            <div class="space-y-4">
                <h3 class="text-sm font-bold text-white uppercase tracking-wider">Links</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="https://wa.me/6285349661585" target="_blank" class="hover:text-yellow-400 transition-colors duration-150 flex items-center space-x-1"><span>WhatsApp Chat</span></a></li>
                    <li><a href="{{ route('cart.index') }}" class="hover:text-yellow-400 transition-colors duration-150">Shopping Cart</a></li>
                    <li><a href="{{ route('wishlist.index') }}" class="hover:text-yellow-400 transition-colors duration-150">My Wishlist</a></li>
                    <li><a href="https://wa.me/6285349661585" target="_blank" class="hover:text-yellow-400 transition-colors duration-150">Contact Us</a></li>
                </ul>
            </div>

            <!-- Explore -->
            <div class="space-y-4">
                <h3 class="text-sm font-bold text-white uppercase tracking-wider">Explore</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('products.index') }}" class="hover:text-yellow-400 transition-colors duration-150">Shop Instruments</a></li>
                    <li><a href="{{ route('articles.index') }}" class="hover:text-yellow-400 transition-colors duration-150">News & Updates</a></li>
                    <li><a href="{{ route('articles.index', ['category' => 'review']) }}" class="hover:text-yellow-400 transition-colors duration-150">Gear Reviews</a></li>
                    <li><a href="{{ route('home') }}" class="hover:text-yellow-400 transition-colors duration-150">Return to Home</a></li>
                </ul>
            </div>

            <!-- Newsletter/Call to Action -->
            <div class="space-y-4">
                <h3 class="text-sm font-bold text-white uppercase tracking-wider">Stay Electric</h3>
                <p class="text-xs text-zinc-500 leading-relaxed">
                    Subscribe to get notified about new instrument listings, gear reviews, and exclusive artist interviews.
                </p>
                <form class="flex space-x-2">
                    <input type="email" placeholder="YOUR EMAIL" class="bg-zinc-900 border border-zinc-800 text-white text-xs px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-yellow-400 w-full" />
                    <button type="button" class="bg-yellow-400 hover:bg-yellow-500 text-black px-4 py-2 rounded-md text-xs font-bold uppercase tracking-wider transition-colors duration-200">
                        Join
                    </button>
                </form>
            </div>
        </div>
    </div>
</footer>
