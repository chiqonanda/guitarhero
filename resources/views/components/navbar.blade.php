@php
    $cartCount = 0;
    $wishlistCount = 0;
    if (auth()->check()) {
        $cart = auth()->user()->cart;
        if ($cart) {
            $cartCount = $cart->items()->sum('quantity');
        }
        $wishlistCount = auth()->user()->wishlists()->count();
    }
@endphp

<nav class="bg-[#0D0D0D]/90 backdrop-blur-md border-b border-zinc-800 sticky top-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <div class="flex items-center">
                <a href="/" class="flex-shrink-0 flex items-center space-x-2">
                    <span class="text-2xl font-black tracking-wider text-yellow-400 font-sans uppercase">
                        Guitar<span class="text-white">Hero</span>
                    </span>
                </a>
                <div class="hidden md:block">
                    <div class="ms-10 flex items-baseline space-x-8">
                        <a href="{{ route('products.index') }}" class="text-zinc-300 hover:text-yellow-400 px-3 py-2 rounded-md text-sm font-semibold uppercase tracking-wider transition-colors duration-200">
                            Shop
                        </a>
                        <a href="{{ route('articles.index') }}" class="text-zinc-300 hover:text-yellow-400 px-3 py-2 rounded-md text-sm font-semibold uppercase tracking-wider transition-colors duration-200">
                            News
                        </a>
                        <a href="{{ route('articles.index', ['category' => 'review']) }}" class="text-zinc-300 hover:text-yellow-400 px-3 py-2 rounded-md text-sm font-semibold uppercase tracking-wider transition-colors duration-200">
                            Reviews
                        </a>
                        @if(auth()->check() && auth()->user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="text-red-500 hover:text-red-400 px-3 py-2 rounded-md text-sm font-semibold uppercase tracking-wider transition-colors duration-200">
                                Admin Panel
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="flex items-center space-x-6">
                <!-- Wishlist -->
                <a href="{{ route('wishlist.index') }}" class="relative text-zinc-400 hover:text-yellow-400 p-2 transition-colors duration-200" title="Wishlist">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    @if($wishlistCount > 0)
                        <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-[#0D0D0D] bg-yellow-400 rounded-full transform translate-x-1/3 -translate-y-1/3 scale-75">
                            {{ $wishlistCount }}
                        </span>
                    @endif
                </a>

                <!-- Cart -->
                <a href="{{ route('cart.index') }}" class="relative text-zinc-400 hover:text-yellow-400 p-2 transition-colors duration-200" title="Shopping Cart">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    @if($cartCount > 0)
                        <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-[#0D0D0D] bg-yellow-400 rounded-full transform translate-x-1/3 -translate-y-1/3 scale-75">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>

                <!-- Auth/User Dropdown -->
                @auth
                    <div class="relative flex items-center space-x-3" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 text-zinc-300 hover:text-yellow-400 font-semibold text-sm focus:outline-none transition-colors duration-200">
                            <span>{{ auth()->user()->name }}</span>
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false" class="absolute right-0 top-8 mt-2 w-48 rounded-md shadow-lg py-1 bg-zinc-900 border border-zinc-800 focus:outline-none z-50" style="display: none;">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-zinc-300 hover:bg-zinc-800 hover:text-yellow-400">
                                My Profile
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-zinc-300 hover:bg-zinc-800 hover:text-yellow-400">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="hidden sm:flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="text-zinc-300 hover:text-yellow-400 text-sm font-semibold uppercase tracking-wider transition-colors duration-200">
                            Log in
                        </a>
                        <a href="{{ route('register') }}" class="bg-yellow-400 hover:bg-yellow-500 text-black px-4 py-2 rounded-md text-sm font-bold uppercase tracking-wider transition-all duration-200 shadow-md hover:shadow-yellow-400/20">
                            Register
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>
