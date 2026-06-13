<x-app-layout>
    @section('title', 'Guitar Hero - Riff Without Limits')

    <!-- Hero Section -->
    <section class="relative h-[85vh] flex items-center justify-center bg-black overflow-hidden border-b border-zinc-900">
        <!-- Hero Background with Dark Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1508186225823-0963cf9ab0de?q=80&w=1600" alt="Guitar Hero Background" class="w-full h-full object-cover opacity-40 filter grayscale contrast-125" />
            <div class="absolute inset-0 bg-gradient-to-t from-[#0D0D0D] via-transparent to-black/80"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-[#0D0D0D]/90 via-transparent to-[#0D0D0D]/90"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative z-10 max-w-5xl mx-auto text-center px-4 sm:px-6 lg:px-8 space-y-6">
            <h1 class="text-5xl sm:text-7xl md:text-8xl font-black tracking-tight text-white uppercase font-display leading-none">
                Riff Without <br class="hidden sm:inline">
                <span class="text-yellow-400 bg-clip-text">Limits</span>
            </h1>
            <p class="max-w-2xl mx-auto text-zinc-300 text-lg sm:text-xl font-medium leading-relaxed">
                Experience the raw power of premium instruments. Curated gear for the modern player.
            </p>
            <div class="pt-4">
                <a href="{{ route('products.index') }}" class="inline-flex items-center space-x-3 bg-yellow-400 hover:bg-yellow-500 text-black px-8 py-4 rounded-md text-sm font-black uppercase tracking-widest transition-all duration-300 transform hover:scale-105 shadow-xl hover:shadow-yellow-400/20">
                    <span>Shop Guitars</span>
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="flex items-end justify-between mb-12 border-b border-zinc-850 pb-6">
            <div>
                <h2 class="text-3xl sm:text-4xl font-black text-white uppercase tracking-wider font-display">
                    The Hub News
                </h2>
                <p class="text-zinc-500 text-xs uppercase tracking-widest font-mono mt-1">LATEST MUSIC NEWS & GEAR STORIES</p>
            </div>
            <a href="{{ route('articles.index') }}" class="text-yellow-400 hover:text-yellow-500 text-xs font-bold uppercase tracking-widest font-mono transition-colors duration-150 flex items-center space-x-1.5">
                <span>View All News</span>
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($articles as $article)
                <x-article-card :article="$article" />
            @endforeach
        </div>
    </section>

    <!-- Products Section -->
    <section class="bg-[#070707] border-y border-zinc-900 py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-end justify-between mb-12 border-b border-zinc-850 pb-6">
                <div>
                    <h2 class="text-3xl sm:text-4xl font-black text-white uppercase tracking-wider font-display">
                        Trending Gear
                    </h2>
                    <p class="text-zinc-500 text-xs uppercase tracking-widest font-mono mt-1">HOTTEST GUITARS IN STOCK</p>
                </div>
                <a href="{{ route('products.index') }}" class="text-yellow-400 hover:text-yellow-500 text-xs font-bold uppercase tracking-widest font-mono transition-colors duration-150 flex items-center space-x-1.5">
                    <span>Shop All Guitars</span>
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
