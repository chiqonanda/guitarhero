<x-admin-layout>
    @section('title', 'Dashboard - Guitar Hero Admin')

    <div class="space-y-8">
        <!-- Title and Export Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 select-none">
            <div class="space-y-1.5">
                <h1 class="text-white text-5xl font-black uppercase tracking-wide font-['Bebas_Neue']">Dashboard Overview</h1>
                <p class="text-zinc-500 text-xs font-mono uppercase font-bold tracking-wider">{{ now()->format('l, F j, Y') }}</p>
            </div>

            <div>
                <a href="{{ route('admin.export-report') }}" class="bg-[#121212] border border-zinc-800/80 hover:border-zinc-700 text-zinc-300 hover:text-white px-5 py-2.5 rounded text-[11px] font-black uppercase tracking-wider flex items-center space-x-2 transition-all duration-200 shadow-md">
                    <svg class="h-4 w-4 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    <span>Export Report</span>
                </a>
            </div>
        </div>

        <!-- Statistics Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1: Total Articles -->
            <div class="relative bg-[#121212] border border-zinc-800/60 rounded-lg p-6 flex flex-col justify-between overflow-hidden shadow-lg select-none min-h-[135px]">
                <!-- Watermark -->
                <div class="absolute -right-6 -bottom-6 text-zinc-800/15 pointer-events-none transform -rotate-12">
                    <svg class="h-32 w-32" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 4a2 2 0 012 2v8a2 2 0 01-2 2h-3m-1 0H5a2 2 0 00-2 2v3m2-3H3m18-9a2 2 0 00-2-2h-3m3 2h-3M9 9h.01M9 13h.01M9 17h.01" />
                    </svg>
                </div>
                <div class="flex items-start justify-between">
                    <div class="space-y-1.5 z-10">
                        <span class="text-[9px] font-black text-zinc-500 uppercase tracking-widest font-mono">Total Articles</span>
                        <p class="text-3xl font-black text-white font-mono tracking-tight">{{ number_format($totalArticles) }}</p>
                    </div>
                    <div class="p-2.5 bg-[#1C1A14] border border-yellow-400/20 text-yellow-400 rounded-md z-10 shadow-sm shadow-yellow-400/5">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 4a2 2 0 012 2v8a2 2 0 01-2 2h-3m-1 0H5a2 2 0 00-2 2v3m2-3H3m18-9a2 2 0 00-2-2h-3m3 2h-3M9 9h.01M9 13h.01M9 17h.01" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center text-[10px] font-bold uppercase tracking-wider font-mono text-zinc-500 mt-4 z-10">
                    <span class="text-yellow-400 flex items-center mr-1">
                        <svg class="h-3.5 w-3.5 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        +12%
                    </span>
                    <span>from last month</span>
                </div>
            </div>

            <!-- Card 2: Total Products -->
            <div class="relative bg-[#121212] border border-zinc-800/60 rounded-lg p-6 flex flex-col justify-between overflow-hidden shadow-lg select-none min-h-[135px]">
                <!-- Watermark -->
                <div class="absolute -right-6 -bottom-6 text-zinc-800/15 pointer-events-none transform -rotate-12">
                    <svg class="h-32 w-32" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <div class="flex items-start justify-between">
                    <div class="space-y-1.5 z-10">
                        <span class="text-[9px] font-black text-zinc-500 uppercase tracking-widest font-mono">Total Products</span>
                        <p class="text-3xl font-black text-white font-mono tracking-tight">{{ number_format($totalProducts) }}</p>
                    </div>
                    <div class="p-2.5 bg-[#1C1A14] border border-yellow-400/20 text-yellow-400 rounded-md z-10 shadow-sm shadow-yellow-400/5">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center text-[10px] font-bold uppercase tracking-wider font-mono text-zinc-500 mt-4 z-10">
                    <span class="text-yellow-400 flex items-center mr-1">
                        <svg class="h-3.5 w-3.5 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        +5%
                    </span>
                    <span>from last month</span>
                </div>
            </div>

            <!-- Card 3: Total Views -->
            <div class="relative bg-[#121212] border border-zinc-800/60 rounded-lg p-6 flex flex-col justify-between overflow-hidden shadow-lg select-none min-h-[135px]">
                <!-- Watermark -->
                <div class="absolute -right-6 -bottom-6 text-zinc-800/15 pointer-events-none transform -rotate-12">
                    <svg class="h-32 w-32" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <div class="flex items-start justify-between">
                    <div class="space-y-1.5 z-10">
                        <span class="text-[9px] font-black text-zinc-500 uppercase tracking-widest font-mono">Total Views</span>
                        <p class="text-3xl font-black text-white font-mono tracking-tight">{{ $totalViewsFormatted }}</p>
                    </div>
                    <div class="p-2.5 bg-[#1C1A14] border border-yellow-400/20 text-yellow-400 rounded-md z-10 shadow-sm shadow-yellow-400/5">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center text-[10px] font-bold uppercase tracking-wider font-mono text-zinc-500 mt-4 z-10">
                    <span class="text-yellow-400 flex items-center mr-1">
                        <svg class="h-3.5 w-3.5 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        +24%
                    </span>
                    <span>from last month</span>
                </div>
            </div>

            <!-- Card 4: Total Users -->
            <div class="relative bg-[#121212] border border-zinc-800/60 rounded-lg p-6 flex flex-col justify-between overflow-hidden shadow-lg select-none min-h-[135px]">
                <!-- Watermark -->
                <div class="absolute -right-6 -bottom-6 text-zinc-800/15 pointer-events-none transform -rotate-12">
                    <svg class="h-32 w-32" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div class="flex items-start justify-between">
                    <div class="space-y-1.5 z-10">
                        <span class="text-[9px] font-black text-zinc-500 uppercase tracking-widest font-mono">Total Users</span>
                        <p class="text-3xl font-black text-white font-mono tracking-tight">{{ number_format($totalUsers) }}</p>
                    </div>
                    <div class="p-2.5 bg-[#1C1A14] border border-yellow-400/20 text-yellow-400 rounded-md z-10 shadow-sm shadow-yellow-400/5">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center text-[10px] font-bold uppercase tracking-wider font-mono text-zinc-500 mt-4 z-10">
                    <span class="text-red-500 flex items-center mr-1">
                        <svg class="h-3.5 w-3.5 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 17h8m0 0v-8m0 8l-8-8-4 4-6-6" />
                        </svg>
                        -2%
                    </span>
                    <span>from last month</span>
                </div>
            </div>
        </div>

        <!-- Recent Articles Container -->
        <div class="bg-[#121212] border border-zinc-800/60 rounded-lg p-6 space-y-6 shadow-xl">
            <!-- Section Header -->
            <div class="flex items-center justify-between border-b border-zinc-800/40 pb-4 select-none">
                <h3 class="text-white text-2xl font-bold uppercase tracking-wide font-['Bebas_Neue']">Recent Articles</h3>
                
                <div class="flex items-center space-x-2">
                    <button class="text-zinc-500 hover:text-white p-1.5 rounded-md hover:bg-zinc-900 transition-colors">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 8.293A1 1 0 013 7.586V4z" />
                        </svg>
                    </button>
                    <button class="text-zinc-500 hover:text-white p-1.5 rounded-md hover:bg-zinc-900 transition-colors">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-zinc-400 select-none">
                    <thead>
                        <tr class="text-[9px] uppercase font-mono tracking-widest text-zinc-500 border-b border-zinc-800/80 pb-2">
                            <th class="py-2.5">Thumbnail</th>
                            <th class="py-2.5">Title</th>
                            <th class="py-2.5">Author</th>
                            <th class="py-2.5">Date</th>
                            <th class="py-2.5">Status</th>
                            <th class="py-2.5 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-850">
                        @foreach($recentArticles as $art)
                            @php
                                // Map Unsplash image URLs based on mock filename
                                $imageSrc = 'https://images.unsplash.com/photo-1510915361894-db8b60106cb1?q=80&w=300';
                                if ($art->image === 'article1.jpg') $imageSrc = 'https://images.unsplash.com/photo-1510915361894-db8b60106cb1?q=80&w=300';
                                if ($art->image === 'article2.jpg') $imageSrc = 'https://images.unsplash.com/photo-1525201548942-d8b8967d0a57?q=80&w=300';
                                if ($art->image === 'article3.jpg') $imageSrc = 'https://images.unsplash.com/photo-1564186763535-ebb21ef5277f?q=80&w=300';
                                if ($art->image === 'article4.jpg') $imageSrc = 'https://images.unsplash.com/photo-1516924962500-2b4b3b99ea02?q=80&w=300';
                                if ($art->image === 'article5.jpg') $imageSrc = 'https://images.unsplash.com/photo-1485278537138-4e8911a13c02?q=80&w=300';
                            @endphp
                            <tr class="hover:bg-zinc-900/15 transition-colors">
                                <!-- Thumbnail -->
                                <td class="py-3.5">
                                    <div class="h-10 w-16 bg-zinc-950 border border-zinc-850 rounded overflow-hidden">
                                        <img src="{{ $imageSrc }}" alt="Thumbnail" class="h-full w-full object-cover" />
                                    </div>
                                </td>

                                <!-- Title -->
                                <td class="py-3.5 font-bold text-white text-xs max-w-xs truncate">
                                    <a href="{{ route('articles.show', $art->slug) }}" target="_blank" class="hover:text-yellow-400 transition-colors">
                                        {{ $art->title }}
                                    </a>
                                </td>

                                <!-- Author -->
                                <td class="py-3.5 text-xs text-zinc-300 font-medium">
                                    {{ $art->author->name }}
                                </td>

                                <!-- Date -->
                                <td class="py-3.5 text-xs text-zinc-450 font-mono">
                                    {{ $art->created_at->format('M d, Y') }}
                                </td>

                                <!-- Status Badge -->
                                <td class="py-3.5 text-xs font-mono">
                                    @if(strtoupper($art->status) === 'PUBLISHED')
                                        <span class="bg-[#1C1A14] text-yellow-400 border border-yellow-400/20 text-[9px] font-black tracking-widest px-2.5 py-0.5 rounded-full">PUBLISHED</span>
                                    @elseif(strtoupper($art->status) === 'DRAFT')
                                        <span class="bg-zinc-900 text-zinc-400 border border-zinc-800 text-[9px] font-black tracking-widest px-2.5 py-0.5 rounded-full">DRAFT</span>
                                    @else
                                        <span class="bg-blue-500/5 text-blue-400 border border-blue-500/20 text-[9px] font-black tracking-widest px-2.5 py-0.5 rounded-full">REVIEW</span>
                                    @endif
                                </td>

                                <!-- Actions -->
                                <td class="py-3.5 text-right">
                                    <div class="flex items-center justify-end space-x-2">
                                        <!-- Edit -->
                                        <a href="{{ route('admin.articles.edit', $art->id) }}" class="text-zinc-500 hover:text-white p-1 transition-colors">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-2.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('admin.articles.destroy', $art->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-zinc-500 hover:text-red-500 p-1 transition-colors">
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

            <!-- Custom Mockup Pagination -->
            @if ($recentArticles->hasPages())
                <div class="flex flex-col sm:flex-row items-center justify-between border-t border-zinc-800/40 pt-6 mt-6 select-none text-xs font-mono text-zinc-500">
                    <div>
                        Showing {{ $recentArticles->firstItem() }} to {{ $recentArticles->lastItem() }} of {{ $recentArticles->total() }} entries
                    </div>
                    <div class="flex items-center space-x-1.5 mt-4 sm:mt-0">
                        {{-- Previous Page Link --}}
                        @if ($recentArticles->onFirstPage())
                            <span class="bg-[#121212]/50 border border-zinc-900 text-zinc-650 px-3 py-1.5 rounded text-[11px] font-bold uppercase tracking-wider cursor-not-allowed">Prev</span>
                        @else
                            <a href="{{ $recentArticles->previousPageUrl() }}" class="bg-[#121212] border border-zinc-800 text-zinc-400 hover:text-white px-3 py-1.5 rounded text-[11px] font-bold uppercase tracking-wider transition">Prev</a>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($recentArticles->getUrlRange(1, $recentArticles->lastPage()) as $page => $url)
                            @if ($page == $recentArticles->currentPage())
                                <span class="bg-[#1C1A14] border border-yellow-400 text-yellow-400 px-3 py-1.5 rounded text-[11px] font-black transition">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="bg-[#121212] border border-zinc-800 text-zinc-400 hover:text-white px-3 py-1.5 rounded text-[11px] font-bold transition">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($recentArticles->hasMorePages())
                            <a href="{{ $recentArticles->nextPageUrl() }}" class="bg-[#121212] border border-zinc-800 text-zinc-400 hover:text-white px-3 py-1.5 rounded text-[11px] font-bold uppercase tracking-wider transition">Next</a>
                        @else
                            <span class="bg-[#121212]/50 border border-zinc-900 text-zinc-650 px-3 py-1.5 rounded text-[11px] font-bold uppercase tracking-wider cursor-not-allowed">Next</span>
                        @endif
                    </div>
                </div>
            @else
                <div class="flex flex-col sm:flex-row items-center justify-between border-t border-zinc-800/40 pt-6 mt-6 select-none text-xs font-mono text-zinc-500">
                    <div>
                        Showing 1 to {{ $recentArticles->count() }} of {{ $recentArticles->total() }} entries
                    </div>
                    <div class="flex items-center space-x-1.5 mt-4 sm:mt-0">
                        <span class="bg-[#121212]/50 border border-zinc-900 text-zinc-650 px-3 py-1.5 rounded text-[11px] font-bold uppercase tracking-wider cursor-not-allowed">Prev</span>
                        <span class="bg-[#1C1A14] border border-yellow-400 text-yellow-400 px-3 py-1.5 rounded text-[11px] font-black transition">1</span>
                        <span class="bg-[#121212]/50 border border-zinc-900 text-zinc-650 px-3 py-1.5 rounded text-[11px] font-bold uppercase tracking-wider cursor-not-allowed">Next</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>
