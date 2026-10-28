<x-app-layout>
    <div class="min-h-screen bg-gray-950 py-10">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-8">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-blue-500/10 text-blue-400">
                        <i data-lucide="shield-check" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-white">Roles</h1>
                        <p class="text-sm text-gray-500 mt-1">Manage roles and their permissions.</p>
                    </div>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('roles.create') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-lg bg-blue-600 hover:bg-blue-500 text-white font-semibold shadow-lg shadow-blue-600/20 hover:-translate-y-0.5 transition-all">
                        <i data-lucide="plus" class="w-4 h-4"></i>
                        Create Role
                    </a>
                </div>
            </div>

            <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-950">
                            <tr class="text-left">
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Permissions</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800">
                            @forelse($roles as $role)
                                <tr class="hover:bg-gray-800/40 transition">
                                    <td class="px-6 py-5"><span class="text-sm text-gray-500">#{{ $role->id }}</span></td>
                                    <td class="px-6 py-5"><span class="text-sm font-semibold text-white">{{ $role->name }}</span></td>
                                    <td class="px-6 py-5">
                                        <div class="flex flex-wrap gap-1">
                                            @if($role->permissions->count())
                                                @foreach($role->permissions as $permission)
                                                    <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-gray-800 text-gray-300 border border-gray-700">
                                                        {{ $permission->name }}
                                                    </span>
                                                @endforeach
                                            @else
                                                <span class="text-xs text-gray-500">No permissions</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-5 flex gap-2">
                                        <a href="{{ route('roles.edit', $role->id) }}" class="text-blue-400 hover:text-blue-300 text-sm">Edit</a>
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this role?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-300 text-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-16 text-center">
                                        <div class="flex flex-col items-center">
                                            <div class="w-16 h-16 flex items-center justify-center rounded-2xl bg-gray-800 text-gray-500 mb-4">
                                                <i data-lucide="shield-off" class="w-8 h-8"></i>
                                            </div>
                                            <h3 class="text-lg font-semibold text-white">No Roles yet</h3>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
