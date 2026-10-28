<x-app-layout>
    <div class="min-h-screen bg-gray-950 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-white">All Users</h1>
                        <p class="text-sm text-gray-500 mt-1">Manage and organize your users.</p>
                    </div>
                    <a href="{{ route('registerNewUser') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-lg bg-blue-600 hover:bg-blue-500 text-white font-semibold shadow-lg shadow-blue-600/20 hover:-translate-y-0.5 transition-all">
                        <i data-lucide="plus" class="w-4 h-4"></i>
                        Create New User
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="mb-6 p-4 rounded-xl bg-green-900/20 border border-green-500/30 text-green-400 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full">

                        <thead class="bg-gray-950">
                            <tr class="text-left">
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Avatar</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Role</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-800">
                            @forelse($users as $user)
                                <tr class="hover:bg-gray-800/40 transition">
                                    <td class="px-6 py-5">
                                        <span class="text-sm text-gray-500">#{{ $user->id }}</span>
                                    </td>

                                    <td class="px-6 py-5">
                                        <div class="w-10 h-10 flex items-center justify-center rounded-lg bg-blue-500/10 text-blue-400">
                                            <i data-lucide="user" class="w-5 h-5"></i>
                                        </div>
                                    </td>

                                    <td class="px-6 py-5">
                                        <p class="text-sm font-semibold text-white">{{ $user->name }}</p>
                                    </td>

                                    <td class="px-6 py-5">
                                        <p class="text-sm text-gray-400 truncate max-w-md">{{ $user->email }}</p>
                                    </td>

                                    <td class="px-6 py-5">
                                        <form action="{{ route('users.update', $user->id) }}" method="POST" class="inline">
                                            @csrf @method('PUT')
                                            <select name="role_id" onchange="this.form.submit()"
                                                    class="w-full text-sm bg-gray-950 border border-gray-700 rounded text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                                        {{ ucfirst($role->name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </td>

                                    <td class="px-6 py-5 text-right">
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-300 text-sm font-medium">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-16 text-center">
                                        <div class="flex flex-col items-center">
                                            <div class="w-16 h-16 flex items-center justify-center rounded-2xl bg-gray-800 text-gray-500 mb-4">
                                                <i data-lucide="users" class="w-8 h-8"></i>
                                            </div>
                                            <h3 class="text-lg font-semibold text-white">No users yet</h3>
                                            <p class="text-sm text-gray-500 mt-1">Get started by creating a new user.</p>
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
