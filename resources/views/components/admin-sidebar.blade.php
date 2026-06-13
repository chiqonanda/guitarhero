<aside class="w-64 bg-[#0F0F0F] border-r border-zinc-800/60 flex flex-col justify-between h-screen sticky top-0 font-sans select-none">
    <div>
        <!-- Profile Header -->
        <div class="pt-8 pb-6 px-6 flex flex-col items-center border-b border-zinc-800/40">
            <div class="relative mb-3 group">
                <div class="absolute -inset-0.5 bg-yellow-400 rounded-full opacity-30 group-hover:opacity-75 transition duration-500 blur-sm"></div>
                <img src="/admin_avatar.png" alt="Guitar Hero Admin" class="relative h-16 w-16 rounded-full object-cover border-2 border-yellow-400/80 shadow-lg" />
            </div>
            <h3 class="text-sm font-black text-white uppercase tracking-wider text-center">Guitar Hero Admin</h3>
            <span class="text-[10px] text-zinc-500 font-bold tracking-widest uppercase mt-0.5">Management Portal</span>
        </div>

        <!-- Links -->
        <nav class="mt-6 px-3 space-y-1">
            <!-- Dashboard Link -->
            <a href="{{ route('admin.dashboard') }}" class="group flex items-center space-x-3 px-4 py-3 text-xs font-bold uppercase tracking-wider transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'border-l-4 border-yellow-400 text-yellow-400 bg-zinc-900/40' : 'border-l-4 border-transparent text-zinc-400 hover:text-zinc-200 hover:bg-zinc-900/20' }}">
                <svg class="h-5 w-5 {{ request()->routeIs('admin.dashboard') ? 'text-yellow-400' : 'text-zinc-500 group-hover:text-zinc-400' }} transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
                </svg>
                <span>Dashboard</span>
            </a>

            <!-- News Link -->
            <a href="{{ route('admin.articles.index') }}" class="group flex items-center space-x-3 px-4 py-3 text-xs font-bold uppercase tracking-wider transition-all duration-200 {{ request()->routeIs('admin.articles.*') ? 'border-l-4 border-yellow-400 text-yellow-400 bg-zinc-900/40' : 'border-l-4 border-transparent text-zinc-400 hover:text-zinc-200 hover:bg-zinc-900/20' }}">
                <svg class="h-5 w-5 {{ request()->routeIs('admin.articles.*') ? 'text-yellow-400' : 'text-zinc-500 group-hover:text-zinc-400' }} transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 4a2 2 0 012 2v8a2 2 0 01-2 2h-3m-1 0H5a2 2 0 00-2 2v3m2-3H3m18-9a2 2 0 00-2-2h-3m3 2h-3M9 9h.01M9 13h.01M9 17h.01" />
                </svg>
                <span>News</span>
            </a>

            <!-- Products Link -->
            <a href="{{ route('admin.products.index') }}" class="group flex items-center space-x-3 px-4 py-3 text-xs font-bold uppercase tracking-wider transition-all duration-200 {{ request()->routeIs('admin.products.*') ? 'border-l-4 border-yellow-400 text-yellow-400 bg-zinc-900/40' : 'border-l-4 border-transparent text-zinc-400 hover:text-zinc-200 hover:bg-zinc-900/20' }}">
                <svg class="h-5 w-5 {{ request()->routeIs('admin.products.*') ? 'text-yellow-400' : 'text-zinc-500 group-hover:text-zinc-400' }} transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <!-- Guitar / instruments custom design -->
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5 8.5a2.121 2.121 0 013 3l-3-3zm6.5-6.5a2.121 2.121 0 013 3l-3-3zM12 5l7 7-3 3-7-7 3-3z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9h4m-2-2v4" />
                </svg>
                <span>Products</span>
            </a>

            <!-- Users Link -->
            <a href="{{ route('admin.users.index') }}" class="group flex items-center space-x-3 px-4 py-3 text-xs font-bold uppercase tracking-wider transition-all duration-200 {{ request()->routeIs('admin.users.*') ? 'border-l-4 border-yellow-400 text-yellow-400 bg-zinc-900/40' : 'border-l-4 border-transparent text-zinc-400 hover:text-zinc-200 hover:bg-zinc-900/20' }}">
                <svg class="h-5 w-5 {{ request()->routeIs('admin.users.*') ? 'text-yellow-400' : 'text-zinc-500 group-hover:text-zinc-400' }} transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <span>Users</span>
            </a>
        </nav>
    </div>

    <!-- Actions Footer -->
    <div class="p-6 border-t border-zinc-800/40 space-y-4">
        <!-- New Listing Button -->
        <a href="{{ route('admin.products.create') }}" class="block w-full bg-yellow-400 hover:bg-yellow-500 text-black font-black uppercase tracking-widest text-[11px] py-3 rounded text-center transition-all duration-250 shadow-md shadow-yellow-400/5">
            New Listing
        </a>

        <!-- Logout Form -->
        <form method="POST" action="{{ route('logout') }}" id="logout-form" class="hidden">
            @csrf
        </form>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center space-x-3 px-4 py-2 text-zinc-400 hover:text-white transition-colors duration-150 text-xs font-bold uppercase tracking-wider">
            <svg class="h-5 w-5 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            <span>Logout</span>
        </a>
    </div>
</aside>
