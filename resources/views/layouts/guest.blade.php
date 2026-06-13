<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Guitar Hero') }} - Portal</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;900&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#0D0D0D] text-zinc-100 selection:bg-yellow-400 selection:text-black">
        <div class="min-h-screen flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8">
            <!-- Centered Logo -->
            <div class="mb-10 text-center">
                <a href="/" class="text-4xl sm:text-5xl font-black tracking-widest text-yellow-400 uppercase font-display block select-none">
                    Guitar<span class="text-white">Hero</span>
                </a>
            </div>

            <!-- Login Card Container -->
            <div class="w-full sm:max-w-md bg-[#121212] border border-zinc-850 rounded-lg p-10 shadow-2xl relative">
                {{ $slot }}
            </div>

            <!-- Secured by Footer -->
            <div class="mt-8 flex items-center space-x-2 text-[10px] text-zinc-600 uppercase tracking-widest font-mono">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
                <span>Secured by High Voltage Infrastructure</span>
            </div>
        </div>
    </body>
</html>
