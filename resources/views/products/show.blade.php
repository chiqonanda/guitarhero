<x-app-layout>
    @section('title', $product->name . ' - Guitar Hero')

    @php
        $imageSrc = $product->image ? (\Illuminate\Support\Str::startsWith($product->image, 'http') ? $product->image : asset('storage/' . $product->image)) : 'https://images.unsplash.com/photo-1564186763535-ebb21ef5277f?q=80&w=600';
        if ($product->image === 'product1.jpg') $imageSrc = 'https://images.unsplash.com/photo-1605020482760-a291cf6f6cae?q=80&w=800';
        if ($product->image === 'product2.jpg') $imageSrc = 'https://images.unsplash.com/photo-1564186763535-ebb21ef5277f?q=80&w=800';
        if ($product->image === 'product3.jpg') $imageSrc = 'https://images.unsplash.com/photo-1550985616-10810253b84d?q=80&w=800';
        if ($product->image === 'product4.jpg') $imageSrc = 'https://images.unsplash.com/photo-1525201548942-d8b8967d0a57?q=80&w=800';
        if ($product->image === 'product5.jpg') $imageSrc = 'https://images.unsplash.com/photo-1485278537138-4e8911a13c02?q=80&w=800';
        if ($product->image === 'product6.jpg') $imageSrc = 'https://images.unsplash.com/photo-1526478806334-5fa488f7f9fc?q=80&w=800';
        if ($product->image === 'product7.jpg') $imageSrc = 'https://images.unsplash.com/photo-1510915361894-db8b60106cb1?q=80&w=800';
        if ($product->image === 'product8.jpg') $imageSrc = 'https://images.unsplash.com/photo-1614798228983-6d600b2524a5?q=80&w=800';
        if ($product->image === 'product9.jpg') $imageSrc = 'https://images.unsplash.com/photo-1599940824399-b87987ceb72a?q=80&w=800';
        if ($product->image === 'product10.jpg') $imageSrc = 'https://images.unsplash.com/photo-1605647540924-852290f6b0d5?q=80&w=800';

        // Dynamic type & neck specifications
        $type = '7-String Solidbody';
        $neck = 'Roasted Maple';
        if (\Illuminate\Support\Str::contains($product->name, 'Volt')) {
            $type = '6-String Solidbody';
            $neck = 'Maple';
        }
        if (\Illuminate\Support\Str::contains($product->name, 'SC')) {
            $type = '6-String Singlecut';
            $neck = 'Mahogany';
        }
        if (\Illuminate\Support\Str::contains($product->name, 'Aero') || \Illuminate\Support\Str::contains($product->name, 'Acoustic')) {
            $type = 'Acoustic Dreadnought';
            $neck = 'Mahogany';
        }
        if (\Illuminate\Support\Str::contains($product->name, 'Bass') || \Illuminate\Support\Str::contains($product->name, 'Thunder')) {
            $type = '5-String Active Bass';
            $neck = 'Maple';
        }
        if (\Illuminate\Support\Str::contains($product->name, 'Humbuckers')) {
            $type = 'Active Humbucker Set';
            $neck = 'N/A';
        }
        if (\Illuminate\Support\Str::contains($product->name, 'Pedal')) {
            $type = 'Overdrive / Distortion';
            $neck = 'N/A';
        }
        if (\Illuminate\Support\Str::contains($product->name, 'Cable')) {
            $type = 'Instrument Cable';
            $neck = 'N/A';
        }
    @endphp

    <section class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Back Link -->
        <a href="{{ route('products.index') }}" class="inline-flex items-center space-x-2 text-xs font-bold text-zinc-500 hover:text-yellow-400 uppercase tracking-widest transition-colors duration-150 mb-8 font-mono">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
            </svg>
            <span>Back to Shop</span>
        </a>

        <!-- Flash messages -->
        @if (session('success'))
            <div class="mb-8 bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded-md text-sm font-bold uppercase tracking-wider flex items-center justify-between font-mono">
                <span>{{ session('success') }}</span>
                <button onclick="this.parentElement.remove()" class="text-green-400 hover:text-white">&times;</button>
            </div>
        @endif
        @if (session('error'))
            <div class="mb-8 bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-md text-sm font-bold uppercase tracking-wider flex items-center justify-between font-mono">
                <span>{{ session('error') }}</span>
                <button onclick="this.parentElement.remove()" class="text-red-400 hover:text-white">&times;</button>
            </div>
        @endif

        <!-- Product Block -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
            <!-- Left: Gallery Column -->
            <div class="lg:col-span-7 space-y-6">
                <!-- Large Image Box -->
                <div class="relative bg-zinc-950 border border-zinc-900 rounded-lg overflow-hidden flex items-center justify-center p-8 aspect-square w-full">
                    <!-- Outlined Badge -->
                    <span class="absolute top-6 left-6 border border-yellow-400 text-yellow-400 bg-black/60 backdrop-blur-sm px-3.5 py-1 text-[10px] font-black tracking-widest uppercase rounded-sm font-mono">
                        {{ $product->stock > 0 ? 'IN STOCK' : 'OUT OF STOCK' }}
                    </span>

                    <img src="{{ $imageSrc }}" alt="{{ $product->name }}" class="w-full h-full object-contain max-h-[500px]" />
                </div>

                <!-- Thumbnails Grid -->
                <div class="grid grid-cols-4 gap-4">
                    <div class="aspect-square bg-zinc-950 border-2 border-yellow-400 rounded-md p-2 flex items-center justify-center overflow-hidden cursor-pointer">
                        <img src="{{ $imageSrc }}" alt="Thumb 1" class="h-full w-full object-contain" />
                    </div>
                    <div class="aspect-square bg-zinc-950 border border-zinc-900 hover:border-zinc-800 rounded-md p-2 flex items-center justify-center overflow-hidden cursor-pointer transition-colors duration-150">
                        <img src="https://images.unsplash.com/photo-1550985616-10810253b84d?q=80&w=200" alt="Thumb 2" class="h-full w-full object-cover filter brightness-[0.7] group-hover:brightness-100 transition-all" />
                    </div>
                    <div class="aspect-square bg-zinc-950 border border-zinc-900 hover:border-zinc-800 rounded-md p-2 flex items-center justify-center overflow-hidden cursor-pointer transition-colors duration-150">
                        <img src="https://images.unsplash.com/photo-1525201548942-d8b8967d0a57?q=80&w=200" alt="Thumb 3" class="h-full w-full object-cover filter brightness-[0.7]" />
                    </div>
                    <div class="aspect-square bg-zinc-950 border border-zinc-900 hover:border-zinc-800 rounded-md p-2 flex items-center justify-center overflow-hidden cursor-pointer transition-colors duration-150">
                        <img src="https://images.unsplash.com/photo-1564186763535-ebb21ef5277f?q=80&w=200" alt="Thumb 4" class="h-full w-full object-cover filter brightness-[0.7]" />
                    </div>
                </div>
            </div>

            <!-- Right: Details Column -->
            <div class="lg:col-span-5 space-y-8">
                <!-- Header Info -->
                <div class="space-y-3">
                    <h1 class="text-4xl sm:text-5xl font-black text-white leading-tight uppercase font-display">
                        {{ $product->name }}
                    </h1>
                    <p class="text-3xl font-extrabold text-yellow-400 font-mono">
                        ${{ number_format($product->price, 2) }}
                    </p>
                </div>

                <!-- Description -->
                <p class="text-zinc-400 text-sm leading-relaxed">
                    {{ $product->description }}
                </p>

                <!-- Actions Forms -->
                <div class="space-y-4 pt-4">
                    <!-- Add to Cart Button -->
                    @if($product->stock > 0)
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-black uppercase tracking-wider text-xs py-4 rounded-sm transition-colors duration-150 shadow-md hover:shadow-yellow-400/20 font-display">
                                ADD TO CART
                            </button>
                        </form>
                    @else
                        <button disabled class="w-full bg-zinc-800 text-zinc-500 font-black uppercase tracking-wider text-xs py-4 rounded-sm cursor-not-allowed font-display">
                            OUT OF STOCK
                        </button>
                    @endif

                    <!-- Contact Seller & Wishlist Inline -->
                    <div class="flex items-center space-x-4">
                        <button onclick="alert('Contacting seller for {{ $product->name }}...')" class="flex-1 bg-transparent hover:bg-zinc-900 border border-zinc-800 text-zinc-300 font-bold uppercase tracking-wider text-xs py-4 rounded-sm transition-colors duration-150 text-center font-display">
                            CONTACT SELLER
                        </button>
                        
                        <form action="{{ route('wishlist.toggle', $product->id) }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="border {{ $isInWishlist ? 'border-red-500 bg-red-500/10 text-red-500' : 'border-zinc-800 text-zinc-400 hover:text-white hover:border-zinc-700' }} p-4 rounded-sm transition-colors duration-150" title="{{ $isInWishlist ? 'Remove from Wishlist' : 'Add to Wishlist' }}">
                                <svg class="h-4.5 w-4.5" fill="{{ $isInWishlist ? 'currentColor' : 'none' }}" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                <hr class="border-zinc-900" />

                <!-- Technical Specs Table -->
                <div class="space-y-4">
                    <h3 class="text-base font-bold text-white uppercase tracking-wider font-display">Technical Specs</h3>
                    <div class="border border-zinc-900 rounded-lg overflow-hidden bg-[#121212]/30">
                        <table class="w-full text-left text-sm text-zinc-300">
                            <tbody class="divide-y divide-zinc-900 font-sans">
                                <tr>
                                    <td class="px-6 py-4 text-zinc-500 font-bold text-xs uppercase tracking-wider font-mono w-1/3">Brand</td>
                                    <td class="px-6 py-4 uppercase font-bold text-xs text-white">{{ $product->brand }}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 text-zinc-500 font-bold text-xs uppercase tracking-wider font-mono w-1/3">Type</td>
                                    <td class="px-6 py-4 uppercase font-bold text-xs text-white">{{ $type }}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 text-zinc-500 font-bold text-xs uppercase tracking-wider font-mono w-1/3">Body Material</td>
                                    <td class="px-6 py-4 uppercase font-bold text-xs text-white">{{ $product->body_material }}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 text-zinc-500 font-bold text-xs uppercase tracking-wider font-mono w-1/3">Neck</td>
                                    <td class="px-6 py-4 uppercase font-bold text-xs text-white">{{ $neck }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Gear -->
        @if($relatedProducts->count() > 0)
            <div class="pt-24 space-y-8 border-t border-zinc-900 mt-24">
                <h3 class="text-3xl font-black text-white uppercase tracking-wider font-display text-center md:text-left">
                    Related Gear
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($relatedProducts as $related)
                        <x-product-card :product="$related" />
                    @endforeach
                </div>
            </div>
        @endif
    </section>
</x-app-layout>
