<x-app-layout>
    <div class="min-h-screen bg-gray-950 py-10">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Page Header: Roles List -->
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
                <!-- Actions: Create Role -->
                <div class="flex gap-3">
                    <a href="{{ route('roles.create') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-lg bg-blue-600 hover:bg-blue-500 text-white font-semibold shadow-lg shadow-blue-600/20 hover:-translate-y-0.5 transition-all">
                        <i data-lucide="plus" class="w-4 h-4"></i>
                        Create Role
                    </a>
                </div>
            </div>

            <!-- Roles Table -->
            <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-950">
                            <tr class="text-left">
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Permissions</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800">
                            <!-- List all roles with their permissions -->
                            @forelse($roles as $role)
                                <tr class="hover:bg-gray-800/40 transition">
                                    <td class="px-6 py-5"><span class="text-sm text-gray-500">#{{ $role->id }}</span></td>
                                    <td class="px-6 py-5"><span class="text-sm font-semibold text-white capitalize">{{ $role->name }}</span></td>
                                    <td class="px-6 py-5">
                                        <div class="flex flex-wrap gap-2">
                                            @forelse($role->permissions as $permission)
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-blue-500/10 text-blue-400 border border-blue-500/20">{{ $permission->name }}</span>
                                            @empty
                                                <span class="text-xs text-gray-600">No permissions</span>
                                            @endforelse
                                        </div>
                                    </td>
                                    <td class="px-6 py-5 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <!-- Edit role -->
                                            <a href="{{ route('roles.edit', $role->id) }}" class="p-2 rounded-lg hover:bg-gray-800 text-gray-400 hover:text-white transition" title="Edit">
                                                <i data-lucide="pencil" class="w-4 h-4"></i>
                                            </a>
                                            <!-- Delete role -->
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this role?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 rounded-lg hover:bg-red-500/10 text-gray-400 hover:text-red-400 transition" title="Delete">
                                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <!-- No roles found -->
                                <tr>
                                    <td colspan="4" class="px-6 py-10 text-center text-gray-500">No roles found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
