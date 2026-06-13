<x-app-layout>
    @section('title', 'My Wishlist - Guitar Hero')

    <section class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl sm:text-4xl font-black text-white uppercase tracking-wider font-display mb-12 border-b border-zinc-900 pb-6">
            My Wishlist
        </h1>

        <!-- Status Messages -->
        @if (session('success'))
            <div class="mb-6 bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded-md text-sm font-bold uppercase tracking-wider flex items-center justify-between">
                <span>{{ session('success') }}</span>
                <button onclick="this.parentElement.remove()" class="text-green-400 hover:text-white">&times;</button>
            </div>
        @endif

        @if($wishlists->count() > 0)
            <!-- Wishlist Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($wishlists as $wishlist)
                    <div class="relative group">
                        <!-- Product Card -->
                        <x-product-card :product="$wishlist->product" />
                        
                        <!-- Remove Overlay/Button at top right -->
                        <form action="{{ route('wishlist.toggle', $wishlist->product_id) }}" method="POST" class="absolute top-4 right-4 z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                            @csrf
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white p-2 rounded-md shadow-md transition-colors duration-150" title="Remove from Wishlist">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-24 bg-[#1A1A1A] border border-zinc-800 rounded-lg space-y-6">
                <svg class="h-20 w-20 text-zinc-700 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                <div class="space-y-2">
                    <h3 class="text-2xl font-bold text-white">Your Wishlist is Empty</h3>
                    <p class="text-zinc-500 text-sm max-w-sm mx-auto leading-relaxed">
                        Save instruments you are interested in here. Go find your favorite rock machine!
                    </p>
                </div>
                <div>
                    <a href="{{ route('products.index') }}" class="inline-flex items-center space-x-2 bg-yellow-400 hover:bg-yellow-500 text-black px-6 py-3.5 rounded-md text-xs font-bold uppercase tracking-wider transition-all shadow-md">
                        <span>Explore Guitars</span>
                    </a>
                </div>
            </div>
        @endif
    </section>
</x-app-layout>
