<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Guitar Hero Admin Panel')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;600;700;900&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#0D0D0D] text-zinc-100 selection:bg-yellow-400 selection:text-black">
        <div class="flex min-h-screen">
            <!-- Sidebar -->
            <x-admin-sidebar />

            <!-- Content Area -->
            <div class="flex-1 flex flex-col min-h-screen overflow-x-hidden">
                <!-- Topbar -->
                <header class="bg-[#0D0D0D] border-b border-zinc-800/40 h-20 flex items-center justify-between px-8 select-none">
                    <!-- Brand Logo -->
                    <div class="flex items-center">
                        <span class="font-sans font-black italic uppercase tracking-tighter text-2xl text-yellow-400">Guitar<span class="text-white">Hero</span></span>
                    </div>

                    <!-- Search Input -->
                    <div class="flex items-center space-x-6">
                        <div class="relative w-64">
                            <span class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                                <svg class="h-4 w-4 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </span>
                            <input type="text" placeholder="Search..." class="w-full bg-[#121212] border border-zinc-800/60 rounded px-4 py-2 text-xs text-white placeholder-zinc-650 focus:outline-none focus:border-yellow-400/50 transition-colors" />
                        </div>
                    </div>
                </header>

                <!-- Page Content -->
                <main class="flex-1 p-8">
                    <!-- Flash Messages -->
                    @if (session('success'))
                        <div class="mb-6 bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded text-xs font-bold uppercase tracking-wider flex items-center justify-between">
                            <span>{{ session('success') }}</span>
                            <button onclick="this.parentElement.remove()" class="text-green-400 hover:text-white">&times;</button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="mb-6 bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded text-xs font-bold uppercase tracking-wider flex items-center justify-between">
                            <span>{{ session('error') }}</span>
                            <button onclick="this.parentElement.remove()" class="text-red-400 hover:text-white">&times;</button>
                        </div>
                    @endif

                    @if (isset($slot))
                        {{ $slot }}
                    @else
                        @yield('content')
                    @endif
                </main>
            </div>
        </div>
    </body>
</html>
