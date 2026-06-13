<x-admin-layout>
    @section('title', 'Manage Articles - Guitar Hero')
    @section('page_title', 'Articles')

    <div class="bg-[#121212] border border-zinc-800 rounded-lg p-6 space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-zinc-800 pb-4">
            <!-- Search Form -->
            <form action="{{ route('admin.articles.index') }}" method="GET" class="flex w-full sm:w-80">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="SEARCH BY TITLE..." class="w-full bg-zinc-900 border border-zinc-800 text-white text-xs px-4 py-2.5 rounded-l-md focus:outline-none focus:ring-1 focus:ring-yellow-400 font-bold" />
                <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-black px-4 py-2.5 rounded-r-md text-xs font-bold uppercase tracking-wider transition-colors duration-150">
                    Search
                </button>
            </form>

            <!-- Add Button -->
            <a href="{{ route('admin.articles.create') }}" class="bg-yellow-400 hover:bg-yellow-500 text-black px-6 py-2.5 rounded-md text-xs font-bold uppercase tracking-wider transition-all shadow-md inline-flex items-center space-x-1">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                </svg>
                <span>Write Article</span>
            </a>
        </div>

        <div class="overflow-x-auto">
            @if($articles->count() > 0)
                <table class="w-full text-left text-sm text-zinc-400">
                    <thead>
                        <tr class="text-[10px] uppercase font-mono tracking-widest text-zinc-500 border-b border-zinc-800 pb-2">
                            <th class="py-2">Article Title</th>
                            <th class="py-2">Category</th>
                            <th class="py-2">Author</th>
                            <th class="py-2">Published Date</th>
                            <th class="py-2 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-850">
                        @foreach($articles as $art)
                            <tr class="hover:bg-zinc-900/10 transition-colors">
                                <td class="py-4 font-bold text-white text-xs">{{ $art->title }}</td>
                                <td class="py-4 text-xs uppercase">{{ $art->category->name }}</td>
                                <td class="py-4 text-xs font-mono">{{ $art->author->name }}</td>
                                <td class="py-4 text-xs font-mono text-zinc-500">
                                    {{ $art->published_at ? $art->published_at->format('M d, Y') : 'DRAFT / UNPUBLISHED' }}
                                </td>
                                <td class="py-4 text-right">
                                    <div class="flex items-center justify-end space-x-2">
                                        <a href="{{ route('admin.articles.edit', $art->id) }}" class="text-zinc-400 hover:text-yellow-400 p-1 transition-colors duration-150" title="Edit Article">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-2.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.articles.destroy', $art->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-zinc-500 hover:text-red-500 p-1 transition-colors duration-150" title="Delete Article">
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

                <div class="pt-6 border-t border-zinc-800">
                    {{ $articles->links() }}
                </div>
            @else
                <div class="text-center py-12 space-y-4">
                    <svg class="h-12 w-12 text-zinc-700 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <p class="text-zinc-500 text-sm">No articles found.</p>
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>
