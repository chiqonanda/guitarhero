<x-admin-layout>
    @section('title', 'Edit Instrument - ' . $product->name)
    @section('page_title', 'Edit Instrument')

    <div class="max-w-4xl bg-[#121212] border border-zinc-800 rounded-lg p-8">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div class="space-y-2">
                    <label for="name" class="text-xs font-bold text-zinc-400 uppercase tracking-widest font-mono">Instrument Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" placeholder="e.g. OBSIDIAN V-CORE 7" class="w-full bg-zinc-900 border border-zinc-800 text-white text-xs px-4 py-3.5 rounded-md focus:outline-none focus:ring-1 focus:ring-yellow-400 font-bold uppercase @error('name') border-red-500 @enderror" required />
                    @error('name')
                        <p class="text-xs text-red-500 font-bold uppercase tracking-wider font-mono">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Brand -->
                <div class="space-y-2">
                    <label for="brand" class="text-xs font-bold text-zinc-400 uppercase tracking-widest font-mono">Brand</label>
                    <input type="text" id="brand" name="brand" value="{{ old('brand', $product->brand) }}" placeholder="e.g. OBSIDIAN" class="w-full bg-zinc-900 border border-zinc-800 text-white text-xs px-4 py-3.5 rounded-md focus:outline-none focus:ring-1 focus:ring-yellow-400 font-bold uppercase @error('brand') border-red-500 @enderror" required />
                    @error('brand')
                        <p class="text-xs text-red-500 font-bold uppercase tracking-wider font-mono">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Category -->
                <div class="space-y-2">
                    <label for="category_id" class="text-xs font-bold text-zinc-400 uppercase tracking-widest font-mono">Category</label>
                    <select id="category_id" name="category_id" class="w-full bg-zinc-900 border border-zinc-800 text-zinc-300 text-xs px-4 py-3.5 rounded-md focus:outline-none focus:ring-1 focus:ring-yellow-400 font-bold @error('category_id') border-red-500 @enderror" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-xs text-red-500 font-bold uppercase tracking-wider font-mono">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price -->
                <div class="space-y-2">
                    <label for="price" class="text-xs font-bold text-zinc-400 uppercase tracking-widest font-mono">Price ($)</label>
                    <input type="number" step="0.01" id="price" name="price" value="{{ old('price', $product->price) }}" placeholder="e.g. 1899.00" class="w-full bg-zinc-900 border border-zinc-800 text-white text-xs px-4 py-3.5 rounded-md focus:outline-none focus:ring-1 focus:ring-yellow-400 font-bold font-mono @error('price') border-red-500 @enderror" required />
                    @error('price')
                        <p class="text-xs text-red-500 font-bold uppercase tracking-wider font-mono">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Stock -->
                <div class="space-y-2">
                    <label for="stock" class="text-xs font-bold text-zinc-400 uppercase tracking-widest font-mono">Stock Quantity</label>
                    <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" class="w-full bg-zinc-900 border border-zinc-800 text-white text-xs px-4 py-3.5 rounded-md focus:outline-none focus:ring-1 focus:ring-yellow-400 font-bold font-mono @error('stock') border-red-500 @enderror" required />
                    @error('stock')
                        <p class="text-xs text-red-500 font-bold uppercase tracking-wider font-mono">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Body Material -->
                <div class="space-y-2">
                    <label for="body_material" class="text-xs font-bold text-zinc-400 uppercase tracking-widest font-mono">Body Material</label>
                    <input type="text" id="body_material" name="body_material" value="{{ old('body_material', $product->body_material) }}" placeholder="e.g. Mahogany" class="w-full bg-zinc-900 border border-zinc-800 text-white text-xs px-4 py-3.5 rounded-md focus:outline-none focus:ring-1 focus:ring-yellow-400 font-bold uppercase @error('body_material') border-red-500 @enderror" required />
                    @error('body_material')
                        <p class="text-xs text-red-500 font-bold uppercase tracking-wider font-mono">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image -->
                <div class="space-y-4">
                    <label for="image" class="text-xs font-bold text-zinc-400 uppercase tracking-widest font-mono block">Product Image</label>
                    
                    @if($product->image)
                        <div class="h-28 w-28 rounded-md overflow-hidden border border-zinc-800 bg-zinc-950 flex items-center justify-center p-2">
                            @php
                                use Illuminate\Support\Str;
                                $imageSrc = Str::startsWith($product->image, 'http') ? $product->image : asset('storage/' . $product->image);
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
                            <img src="{{ $imageSrc }}" alt="Current Product Image" class="h-full w-full object-contain" />
                        </div>
                    @endif

                    <input type="file" id="image" name="image" class="w-full bg-zinc-900 border border-zinc-800 text-zinc-300 text-xs px-4 py-3 rounded-md focus:outline-none focus:ring-1 focus:ring-yellow-400 font-bold @error('image') border-red-500 @enderror" />
                    <p class="text-[10px] text-zinc-500 uppercase tracking-wider font-mono">Select a new image only if you want to replace the current one. Max size: 2MB.</p>
                    @error('image')
                        <p class="text-xs text-red-500 font-bold uppercase tracking-wider font-mono">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Description -->
            <div class="space-y-2">
                <label for="description" class="text-xs font-bold text-zinc-400 uppercase tracking-widest font-mono">Description</label>
                <textarea id="description" name="description" rows="6" placeholder="Describe the guitar, its pick-ups, feel, and features..." class="w-full bg-zinc-900 border border-zinc-800 text-white text-sm px-4 py-4 rounded-md focus:outline-none focus:ring-1 focus:ring-yellow-400 leading-relaxed @error('description') border-red-500 @enderror" required>{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <p class="text-xs text-red-500 font-bold uppercase tracking-wider font-mono">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex items-center space-x-4 pt-4">
                <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-black px-8 py-3.5 rounded-md text-xs font-bold uppercase tracking-wider transition-colors duration-250 shadow-md">
                    Update Instrument
                </button>
                <a href="{{ route('admin.products.index') }}" class="bg-transparent border border-zinc-850 hover:bg-zinc-900 text-zinc-400 hover:text-white px-8 py-3 rounded-md text-xs font-bold uppercase tracking-wider transition-colors duration-200">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
