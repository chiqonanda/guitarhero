@props(['product'])

@php
    $imageSrc = $product->image ? (\Illuminate\Support\Str::startsWith($product->image, 'http') ? $product->image : asset('storage/' . $product->image)) : 'https://images.unsplash.com/photo-1564186763535-ebb21ef5277f?q=80&w=600';
    if ($product->image === 'product1.jpg') $imageSrc = 'https://images.unsplash.com/photo-1605020482760-a291cf6f6cae?q=80&w=600';
    if ($product->image === 'product2.jpg') $imageSrc = 'https://images.unsplash.com/photo-1564186763535-ebb21ef5277f?q=80&w=600';
    if ($product->image === 'product3.jpg') $imageSrc = 'https://images.unsplash.com/photo-1550985616-10810253b84d?q=80&w=600';
    if ($product->image === 'product4.jpg') $imageSrc = 'https://images.unsplash.com/photo-1525201548942-d8b8967d0a57?q=80&w=600';
    if ($product->image === 'product5.jpg') $imageSrc = 'https://images.unsplash.com/photo-1485278537138-4e8911a13c02?q=80&w=600';
    if ($product->image === 'product6.jpg') $imageSrc = 'https://images.unsplash.com/photo-1526478806334-5fa488f7f9fc?q=80&w=600';
    if ($product->image === 'product7.jpg') $imageSrc = 'https://images.unsplash.com/photo-1510915361894-db8b60106cb1?q=80&w=600';
    if ($product->image === 'product8.jpg') $imageSrc = 'https://images.unsplash.com/photo-1614798228983-6d600b2524a5?q=80&w=600';
    if ($product->image === 'product9.jpg') $imageSrc = 'https://images.unsplash.com/photo-1599940824399-b87987ceb72a?q=80&w=600';
    if ($product->image === 'product10.jpg') $imageSrc = 'https://images.unsplash.com/photo-1605647540924-852290f6b0d5?q=80&w=600';

    // Mock output level matching the mockup
    $outputLevel = 'HIGH';
    if (\Illuminate\Support\Str::contains($product->name, 'Volt')) $outputLevel = 'MEDIUM';
    if (\Illuminate\Support\Str::contains($product->name, 'SC')) $outputLevel = 'VINTAGE';
    if (\Illuminate\Support\Str::contains($product->name, 'Djent')) $outputLevel = 'EXTREME';
    if ($product->category->slug === 'acoustic-guitar') $outputLevel = 'ACOUSTIC';
    if ($product->category->slug === 'bass') $outputLevel = 'SUB-BASS';
@endphp

<div class="bg-[#1A1A1A] border border-zinc-800 rounded-lg overflow-hidden flex flex-col justify-between group hover:border-zinc-700 transition-all duration-300 shadow-lg hover:shadow-yellow-400/5">
    <div class="relative overflow-hidden aspect-square bg-zinc-950 flex items-center justify-center p-4">
        <!-- Badge -->
        @if(Str::contains($product->name, 'V-Core') || Str::contains($product->name, 'SC'))
            <span class="absolute top-4 left-4 bg-yellow-400 text-black text-[9px] font-black tracking-widest px-2 py-0.5 uppercase rounded-sm">
                {{ Str::contains($product->name, 'V-Core') ? 'NEW' : 'VINTAGE' }}
            </span>
        @endif

        <img src="{{ $imageSrc }}" alt="{{ $product->name }}" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500" />
    </div>

    <div class="p-6 space-y-4">
        <div class="space-y-1">
            <span class="text-[10px] font-black tracking-wider text-yellow-400/80 uppercase font-mono">{{ $product->brand }}</span>
            <h3 class="text-lg font-bold text-white group-hover:text-yellow-400 transition-colors duration-200 line-clamp-1">
                <a href="{{ route('products.show', $product->slug) }}">
                    {{ $product->name }}
                </a>
            </h3>
            <p class="text-xl font-extrabold text-white font-mono pt-1">
                ${{ number_format($product->price, 2) }}
            </p>
        </div>

        <div class="pt-4 border-t border-zinc-800/80 flex items-center justify-between text-[10px] text-zinc-500 uppercase tracking-widest font-mono">
            <span>OUTPUT LEVEL</span>
            <span class="text-zinc-300 font-bold">{{ $outputLevel }}</span>
        </div>

        <div class="pt-2">
            <a href="{{ route('products.show', $product->slug) }}" class="block w-full text-center bg-transparent border border-zinc-800 hover:bg-yellow-400 hover:border-yellow-400 hover:text-black text-zinc-300 font-bold uppercase tracking-wider text-xs py-3 rounded-md transition-all duration-200">
                View Details
            </a>
        </div>
    </div>
</div>
