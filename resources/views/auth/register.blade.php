<x-guest-layout>
    <!-- Back to Site Link -->
    <div class="mb-6">
        <a href="/" class="inline-flex items-center space-x-2 text-[10px] font-black text-zinc-500 hover:text-yellow-400 uppercase tracking-widest font-mono transition-colors duration-150">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
            </svg>
            <span>Back to Site</span>
        </a>
    </div>

    <div class="text-center space-y-2 mb-8">
        <h2 class="text-xl font-extrabold text-white uppercase tracking-wider font-display">
            Register Account
        </h2>
        <p class="text-zinc-500 text-xs font-semibold uppercase tracking-wider font-mono">
            Join the Guitar Hero band today.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div class="space-y-2">
            <label for="name" class="text-[10px] font-black tracking-widest text-zinc-500 uppercase font-mono block">
                Rocker Name
            </label>
            <div class="relative flex items-center">
                <div class="absolute left-4 text-zinc-500">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Slash" required autofocus autocomplete="name" class="w-full bg-zinc-950 border border-zinc-850 text-white text-xs pl-12 pr-4 py-3.5 rounded-md focus:outline-none focus:ring-1 focus:ring-yellow-400 font-mono @error('name') border-red-500 @enderror" />
            </div>
            @error('name')
                <p class="text-xs text-red-500 font-bold uppercase tracking-wider font-mono mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="space-y-2">
            <label for="email" class="text-[10px] font-black tracking-widest text-zinc-500 uppercase font-mono block">
                Email Address
            </label>
            <div class="relative flex items-center">
                <div class="absolute left-4 text-zinc-500">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="slash@guitarhero.com" required autocomplete="username" class="w-full bg-zinc-950 border border-zinc-850 text-white text-xs pl-12 pr-4 py-3.5 rounded-md focus:outline-none focus:ring-1 focus:ring-yellow-400 font-mono @error('email') border-red-500 @enderror" />
            </div>
            @error('email')
                <p class="text-xs text-red-500 font-bold uppercase tracking-wider font-mono mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="space-y-2">
            <label for="password" class="text-[10px] font-black tracking-widest text-zinc-500 uppercase font-mono block">
                Access Code (Password)
            </label>
            <div class="relative flex items-center">
                <div class="absolute left-4 text-zinc-500">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <input id="password" type="password" name="password" placeholder="••••••••" required autocomplete="new-password" class="w-full bg-zinc-950 border border-zinc-850 text-white text-xs pl-12 pr-4 py-3.5 rounded-md focus:outline-none focus:ring-1 focus:ring-yellow-400 font-mono @error('password') border-red-500 @enderror" />
            </div>
            @error('password')
                <p class="text-xs text-red-500 font-bold uppercase tracking-wider font-mono mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="space-y-2">
            <label for="password_confirmation" class="text-[10px] font-black tracking-widest text-zinc-500 uppercase font-mono block">
                Verify Access Code
            </label>
            <div class="relative flex items-center">
                <div class="absolute left-4 text-zinc-500">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="••••••••" required autocomplete="new-password" class="w-full bg-zinc-950 border border-zinc-850 text-white text-xs pl-12 pr-4 py-3.5 rounded-md focus:outline-none focus:ring-1 focus:ring-yellow-400 font-mono @error('password_confirmation') border-red-500 @enderror" />
            </div>
            @error('password_confirmation')
                <p class="text-xs text-red-500 font-bold uppercase tracking-wider font-mono mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-black uppercase tracking-wider text-xs py-4 rounded-sm transition-colors duration-150 shadow-md hover:shadow-yellow-400/20 font-display">
                Join the Band
            </button>
        </div>

        <div class="text-center pt-6 text-[10px] font-bold uppercase tracking-wider font-mono text-zinc-500">
            Already have a key? 
            <a href="{{ route('login') }}" class="text-yellow-400 hover:text-yellow-500 transition-colors duration-150">Sign In</a>
        </div>
    </form>
</x-guest-layout>
