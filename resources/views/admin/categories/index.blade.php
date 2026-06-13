<x-admin-layout>
    @section('title', 'Manage Categories - Guitar Hero')
    @section('page_title', 'Categories')

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
        <!-- Category Table list -->
        <div class="lg:col-span-2 bg-[#121212] border border-zinc-800 rounded-lg p-6 space-y-6">
            <h3 class="text-base font-bold text-white uppercase tracking-wider border-b border-zinc-800 pb-4">
                Categories List
            </h3>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-zinc-400">
                    <thead>
                        <tr class="text-[10px] uppercase font-mono tracking-widest text-zinc-500 border-b border-zinc-800 pb-2">
                            <th class="py-2">Category Name</th>
                            <th class="py-2">Slug</th>
                            <th class="py-2 text-center">Products</th>
                            <th class="py-2 text-center">Articles</th>
                            <th class="py-2 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-850">
                        @foreach($categories as $cat)
                            <tr class="hover:bg-zinc-900/20 transition-colors" x-data="{ editing: false, name: '{{ $cat->name }}' }">
                                <!-- View Mode -->
                                <template x-if="!editing">
                                    <td class="py-4 font-bold text-white uppercase text-xs">{{ $cat->name }}</td>
                                </template>
                                <template x-if="!editing">
                                    <td class="py-4 text-xs font-mono text-zinc-500">{{ $cat->slug }}</td>
                                </template>

                                <!-- Edit Mode -->
                                <template x-if="editing">
                                    <td class="py-3" colspan="2">
                                        <form action="{{ route('admin.categories.update', $cat->id) }}" method="POST" class="flex items-center space-x-2">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="name" x-model="name" class="bg-zinc-900 border border-zinc-800 text-white text-xs px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-yellow-400 w-full font-bold uppercase" required />
                                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white text-[10px] font-bold uppercase px-3 py-2 rounded-md">Save</button>
                                            <button type="button" @click="editing = false" class="bg-zinc-800 hover:bg-zinc-700 text-zinc-300 text-[10px] font-bold uppercase px-3 py-2 rounded-md">Cancel</button>
                                        </form>
                                    </td>
                                </template>

                                <td class="py-4 text-center text-xs font-mono">{{ $cat->products_count }}</td>
                                <td class="py-4 text-center text-xs font-mono">{{ $cat->articles_count }}</td>

                                <td class="py-4 text-right">
                                    <div class="flex items-center justify-end space-x-2" x-show="!editing">
                                        <button type="button" @click="editing = true" class="text-zinc-400 hover:text-yellow-400 p-1 transition-colors duration-150">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-2.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </button>
                                        <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category? This will delete all associated products and articles.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-zinc-500 hover:text-red-500 p-1 transition-colors duration-150">
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add Category Form -->
        <div class="bg-[#121212] border border-zinc-800 rounded-lg p-6 space-y-6">
            <h3 class="text-base font-bold text-white uppercase tracking-wider border-b border-zinc-800 pb-4">
                Add Category
            </h3>

            <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
                @csrf
                <div class="space-y-2">
                    <label for="name" class="text-xs font-bold text-zinc-400 uppercase tracking-widest font-mono">Category Name</label>
                    <input type="text" id="name" name="name" placeholder="e.g. ELECTRIC GUITAR" class="w-full bg-zinc-900 border border-zinc-800 text-white text-xs px-4 py-3 rounded-md focus:outline-none focus:ring-1 focus:ring-yellow-400 font-bold uppercase @error('name') border-red-500 @enderror" required />
                    @error('name')
                        <p class="text-xs text-red-500 font-bold uppercase tracking-wider font-mono">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-black uppercase tracking-wider text-xs py-3.5 rounded-md transition-colors duration-250 shadow-md">
                        Add Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
