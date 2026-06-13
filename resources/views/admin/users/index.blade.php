<x-admin-layout>
    @section('title', 'Manage Users - Guitar Hero')
    @section('page_title', 'Users')

    <div class="bg-[#121212] border border-zinc-800 rounded-lg p-6 space-y-6">
        <div class="flex items-center justify-between border-b border-zinc-800 pb-4">
            <h3 class="text-base font-bold text-white uppercase tracking-wider">
                Users List
            </h3>
            <span class="text-xs font-mono text-zinc-500 uppercase">Total: {{ $users->total() }} Users</span>
        </div>

        <!-- Search / Filter -->
        <div class="flex justify-end">
            <form action="{{ route('admin.users.index') }}" method="GET" class="relative w-72">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or email..." class="w-full bg-zinc-900 border border-zinc-800 text-white text-xs px-4 py-2.5 rounded-md focus:outline-none focus:ring-1 focus:ring-yellow-400 font-mono" />
                @if(request('search'))
                    <a href="{{ route('admin.users.index') }}" class="absolute inset-y-0 right-10 flex items-center text-zinc-500 hover:text-white text-xs">Clear</a>
                @endif
                <button type="submit" class="absolute inset-y-0 right-3 flex items-center text-zinc-500 hover:text-yellow-400">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-zinc-400">
                <thead>
                    <tr class="text-[10px] uppercase font-mono tracking-widest text-zinc-500 border-b border-zinc-800 pb-2">
                        <th class="py-2">User Name</th>
                        <th class="py-2">Email</th>
                        <th class="py-2">Role</th>
                        <th class="py-2">Joined Date</th>
                        <th class="py-2 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-850">
                    @foreach($users as $user)
                        <tr class="hover:bg-zinc-900/20 transition-colors">
                            <td class="py-4 font-bold text-white uppercase text-xs">
                                <div class="flex items-center space-x-3">
                                    <div class="h-8 w-8 rounded-full bg-zinc-800 flex items-center justify-center text-yellow-400 font-bold font-mono uppercase text-xs">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <span>{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="py-4 text-xs font-mono text-zinc-450">{{ $user->email }}</td>
                            <td class="py-4 text-xs font-mono">
                                @if($user->role === 'admin')
                                    <span class="bg-yellow-400/10 text-yellow-400 border border-yellow-400/20 text-[9px] font-black tracking-widest px-2 py-0.5 rounded uppercase">ADMIN</span>
                                @else
                                    <span class="bg-zinc-800 text-zinc-400 border border-zinc-700 text-[9px] font-black tracking-widest px-2 py-0.5 rounded uppercase">USER</span>
                                @endif
                            </td>
                            <td class="py-4 text-xs font-mono text-zinc-500">{{ $user->created_at->format('M d, Y') }}</td>
                            <td class="py-4 text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    @if($user->id !== auth()->id())
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-zinc-500 hover:text-red-500 p-1 transition-colors duration-150">
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-[9px] font-mono text-zinc-600 uppercase italic">Logged In</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pt-6">
            {{ $users->links() }}
        </div>
    </div>
</x-admin-layout>
