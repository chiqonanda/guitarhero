<x-app-layout>
    @section('title', 'Shopping Cart - Guitar Hero')

    <section class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl sm:text-4xl font-black text-white uppercase tracking-wider font-display mb-12 border-b border-zinc-900 pb-6">
            Shopping Cart
        </h1>

        <!-- Status Messages -->
        @if (session('success'))
            <div class="mb-6 bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded-md text-sm font-bold uppercase tracking-wider flex items-center justify-between">
                <span>{{ session('success') }}</span>
                <button onclick="this.parentElement.remove()" class="text-green-400 hover:text-white">&times;</button>
            </div>
        @endif
        @if (session('error'))
            <div class="mb-6 bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-md text-sm font-bold uppercase tracking-wider flex items-center justify-between">
                <span>{{ session('error') }}</span>
                <button onclick="this.parentElement.remove()" class="text-red-400 hover:text-white">&times;</button>
            </div>
        @endif

        @if($items->count() > 0)
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
                <!-- Cart Items List -->
                <div class="lg:col-span-2 space-y-6">
                    @foreach($items as $item)
                        @php
                            $product = $item->product;
                            $imageSrc = $product->image ? (\Illuminate\Support\Str::startsWith($product->image, 'http') ? $product->image : asset('storage/' . $product->image)) : 'https://images.unsplash.com/photo-1564186763535-ebb21ef5277f?q=80&w=600';
                            if ($product->image === 'product1.jpg') $imageSrc = 'https://images.unsplash.com/photo-1605020482760-a291cf6f6cae?q=80&w=400';
                            if ($product->image === 'product2.jpg') $imageSrc = 'https://images.unsplash.com/photo-1564186763535-ebb21ef5277f?q=80&w=400';
                            if ($product->image === 'product3.jpg') $imageSrc = 'https://images.unsplash.com/photo-1550985616-10810253b84d?q=80&w=400';
                            if ($product->image === 'product4.jpg') $imageSrc = 'https://images.unsplash.com/photo-1525201548942-d8b8967d0a57?q=80&w=400';
                            if ($product->image === 'product5.jpg') $imageSrc = 'https://images.unsplash.com/photo-1485278537138-4e8911a13c02?q=80&w=400';
                            if ($product->image === 'product6.jpg') $imageSrc = 'https://images.unsplash.com/photo-1526478806334-5fa488f7f9fc?q=80&w=400';
                            if ($product->image === 'product7.jpg') $imageSrc = 'https://images.unsplash.com/photo-1516924962500-2b4b3b99ea02?q=80&w=400';
                            if ($product->image === 'product8.jpg') $imageSrc = 'https://images.unsplash.com/photo-1598125557202-996e56f4bab8?q=80&w=400';
                            if ($product->image === 'product9.jpg') $imageSrc = 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?q=80&w=400';
                            if ($product->image === 'product10.jpg') $imageSrc = 'https://images.unsplash.com/photo-1510915361894-db8b60106cb1?q=80&w=400';
                        @endphp

                        <div class="bg-[#1A1A1A] border border-zinc-800 rounded-lg p-6 flex flex-col sm:flex-row items-center justify-between gap-6 group hover:border-zinc-700 transition-colors duration-200">
                            <!-- Left: Image & Name -->
                            <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-6 w-full sm:w-auto">
                                <div class="bg-zinc-950 p-2 border border-zinc-800 rounded-md h-24 w-24 flex items-center justify-center">
                                    <img src="{{ $imageSrc }}" alt="{{ $product->name }}" class="h-full w-full object-contain" />
                                </div>
                                <div class="text-center sm:text-left">
                                    <span class="text-[10px] font-black tracking-widest text-yellow-400 uppercase font-mono">{{ $product->brand }}</span>
                                    <h3 class="text-lg font-bold text-white uppercase group-hover:text-yellow-400 transition-colors duration-150">
                                        <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                                    </h3>
                                    <p class="text-sm font-mono text-zinc-400 mt-1">${{ number_format($product->price, 2) }}</p>
                                </div>
                            </div>

                            <!-- Right: Controls & Subtotal -->
                            <div class="flex flex-col sm:flex-row items-center gap-6 w-full sm:w-auto justify-between sm:justify-end">
                                <!-- Quantity Form -->
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center space-x-2">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="{{ $product->stock }}" class="w-16 text-center bg-zinc-900 border border-zinc-800 text-white rounded-md text-xs py-2 focus:outline-none focus:ring-1 focus:ring-yellow-400 font-mono font-bold" />
                                    <button type="submit" class="bg-zinc-800 hover:bg-yellow-400 hover:text-black border border-zinc-850 text-zinc-300 font-bold uppercase tracking-wider text-[10px] px-3 py-2.5 rounded-md transition-colors duration-150">
                                        Update
                                    </button>
                                </form>

                                <!-- Subtotal -->
                                <div class="text-right font-mono font-bold text-white w-24">
                                    ${{ number_format($product->price * $item->quantity, 2) }}
                                </div>

                                <!-- Remove button -->
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-zinc-500 hover:text-red-500 p-2 transition-colors duration-150" title="Remove Item">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Order Summary -->
                <div class="bg-[#1A1A1A] border border-zinc-800 rounded-lg p-6 space-y-6">
                    <h3 class="text-lg font-bold text-white uppercase tracking-wider border-b border-zinc-800 pb-4">
                        Order Summary
                    </h3>
                    <div class="space-y-4 text-sm font-mono">
                        <div class="flex justify-between text-zinc-400">
                            <span>Subtotal</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-zinc-400">
                            <span>Shipping</span>
                            <span class="text-green-400 uppercase font-bold">Free</span>
                        </div>
                        <div class="border-t border-zinc-800 pt-4 flex justify-between text-lg font-black text-white">
                            <span>Total</span>
                            <span class="text-yellow-400">${{ number_format($total, 2) }}</span>
                        </div>
                    </div>

                    <div class="pt-6">
                        <button type="button" onclick="alert('Proceeding to dummy payment... Order processed!')" class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-black uppercase tracking-wider text-sm py-4 rounded-md transition-all duration-200 shadow-lg hover:shadow-yellow-400/20 flex items-center justify-center space-x-2">
                            <span>Checkout Now</span>
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-24 bg-[#1A1A1A] border border-zinc-800 rounded-lg space-y-6">
                <svg class="h-20 w-20 text-zinc-700 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <div class="space-y-2">
                    <h3 class="text-2xl font-bold text-white">Your Cart is Empty</h3>
                    <p class="text-zinc-500 text-sm max-w-sm mx-auto leading-relaxed">
                        Looks like you haven't added any guitars to your cart yet. Head back to the store and find your weapon of choice.
                    </p>
                </div>
                <div>
                    <a href="{{ route('products.index') }}" class="inline-flex items-center space-x-2 bg-yellow-400 hover:bg-yellow-500 text-black px-6 py-3.5 rounded-md text-xs font-bold uppercase tracking-wider transition-all shadow-md">
                        <span>Go to Shop</span>
                    </a>
                </div>
            </div>
        @endif
    </section>
</x-app-layout>
