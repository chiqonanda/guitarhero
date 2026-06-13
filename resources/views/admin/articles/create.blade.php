<x-admin-layout>
    @section('title', 'Write Article - Guitar Hero')
    @section('page_title', 'Write Article')

    <div class="max-w-4xl bg-[#121212] border border-zinc-800 rounded-lg p-8">
        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Title -->
            <div class="space-y-2">
                <label for="title" class="text-xs font-bold text-zinc-400 uppercase tracking-widest font-mono">Article Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="e.g. THE FUTURE OF CLASSIC AMPS" class="w-full bg-zinc-900 border border-zinc-800 text-white text-xs px-4 py-3.5 rounded-md focus:outline-none focus:ring-1 focus:ring-yellow-400 font-bold uppercase @error('title') border-red-500 @enderror" required />
                @error('title')
                    <p class="text-xs text-red-500 font-bold uppercase tracking-wider font-mono">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Category -->
                <div class="space-y-2">
                    <label for="category_id" class="text-xs font-bold text-zinc-400 uppercase tracking-widest font-mono">Category</label>
                    <select id="category_id" name="category_id" class="w-full bg-zinc-900 border border-zinc-800 text-zinc-300 text-xs px-4 py-3.5 rounded-md focus:outline-none focus:ring-1 focus:ring-yellow-400 font-bold @error('category_id') border-red-500 @enderror" required>
                        <option value="">SELECT CATEGORY</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-xs text-red-500 font-bold uppercase tracking-wider font-mono">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Published At -->
                <div class="space-y-2">
                    <label for="published_at" class="text-xs font-bold text-zinc-400 uppercase tracking-widest font-mono">Publish Date (Optional)</label>
                    <input type="datetime-local" id="published_at" name="published_at" value="{{ old('published_at') }}" class="w-full bg-zinc-900 border border-zinc-800 text-zinc-300 text-xs px-4 py-3 rounded-md focus:outline-none focus:ring-1 focus:ring-yellow-400 font-bold @error('published_at') border-red-500 @enderror" />
                    @error('published_at')
                        <p class="text-xs text-red-500 font-bold uppercase tracking-wider font-mono">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Image Upload -->
            <div class="space-y-2">
                <label for="image" class="text-xs font-bold text-zinc-400 uppercase tracking-widest font-mono">Cover Image</label>
                <input type="file" id="image" name="image" class="w-full bg-zinc-900 border border-zinc-800 text-zinc-300 text-xs px-4 py-3 rounded-md focus:outline-none focus:ring-1 focus:ring-yellow-400 font-bold @error('image') border-red-500 @enderror" />
                <p class="text-[10px] text-zinc-500 uppercase tracking-wider font-mono">Max size: 2MB. Format: JPEG, PNG, JPG, WEBP.</p>
                @error('image')
                    <p class="text-xs text-red-500 font-bold uppercase tracking-wider font-mono">{{ $message }}</p>
                @enderror
            </div>

            <!-- Content -->
            <div class="space-y-2">
                <label for="content" class="text-xs font-bold text-zinc-400 uppercase tracking-widest font-mono">Article Content</label>
                <textarea id="content" name="content" rows="12" placeholder="Write your music story here..." class="w-full bg-zinc-900 border border-zinc-800 text-white text-sm px-4 py-4 rounded-md focus:outline-none focus:ring-1 focus:ring-yellow-400 leading-relaxed @error('content') border-red-500 @enderror" required>{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-xs text-red-500 font-bold uppercase tracking-wider font-mono">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex items-center space-x-4 pt-4">
                <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-black px-8 py-3.5 rounded-md text-xs font-bold uppercase tracking-wider transition-colors duration-250 shadow-md">
                    Publish Article
                </button>
                <a href="{{ route('admin.articles.index') }}" class="bg-transparent border border-zinc-850 hover:bg-zinc-900 text-zinc-400 hover:text-white px-8 py-3 rounded-md text-xs font-bold uppercase tracking-wider transition-colors duration-200">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
