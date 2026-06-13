<x-app-layout>
    @section('title', 'Guitar Hero Shop - Premium Electric, Acoustic & Bass Guitars')

    <!-- Header Banner -->
    <section class="bg-[#090909] border-b border-zinc-900 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <h1 class="text-4xl sm:text-5xl font-black uppercase tracking-wider text-white font-display">
                Instrument Catalog
            </h1>
            <p class="text-zinc-400 text-sm max-w-xl mx-auto leading-relaxed">
                Explore our curated range of professional guitars. From vintage reissues to heavy metal 8-string machines.
            </p>
        </div>
    </section>

    <!-- Filters & Catalog -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-12 pb-6 border-b border-zinc-900">
            <!-- Category Tabs -->
            <div class="flex items-center space-x-2 overflow-x-auto pb-2 md:pb-0">
                <a href="{{ route('products.index') }}" class="px-5 py-2.5 rounded-md text-xs font-bold uppercase tracking-wider transition-all {{ !request('category') ? 'bg-yellow-400 text-black' : 'bg-zinc-900 text-zinc-400 hover:text-white border border-zinc-800' }}">
                    All Guitars
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('products.index', ['category' => $category->slug]) }}" class="px-5 py-2.5 rounded-md text-xs font-bold uppercase tracking-wider transition-all {{ request('category') === $category->slug ? 'bg-yellow-400 text-black' : 'bg-zinc-900 text-zinc-400 hover:text-white border border-zinc-800' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>

            <!-- Search Form -->
            <form action="{{ route('products.index') }}" method="GET" class="flex w-full md:w-80">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <input type="text" name="search" value="{{ request('search') }}" placeholder="SEARCH GUITARS..." class="w-full bg-zinc-900 border border-zinc-800 text-white text-xs px-4 py-3 rounded-l-md focus:outline-none focus:ring-1 focus:ring-yellow-400" />
                <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-black px-4 py-3 rounded-r-md text-xs font-bold uppercase tracking-wider transition-colors duration-200">
                    Search
                </button>
            </form>
        </div>

        @if($products->count() > 0)
            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                @foreach($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pt-8 border-t border-zinc-900">
                {{ $products->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20 space-y-4">
                <svg class="h-16 w-16 text-zinc-700 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <h3 class="text-xl font-bold text-white">No Guitars Found</h3>
                <p class="text-zinc-500 text-sm">We couldn't find any instruments matching your search query.</p>
                <a href="{{ route('products.index') }}" class="inline-block bg-zinc-900 border border-zinc-800 hover:text-yellow-400 text-white text-xs font-bold uppercase tracking-wider px-6 py-3 rounded-md transition-all">
                    Reset Filters
                </a>
            </div>
        @endif
    </section>
</x-app-layout>
