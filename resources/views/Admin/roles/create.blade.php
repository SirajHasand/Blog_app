<x-app-layout>
    <div class="min-h-screen bg-gray-950 py-10">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Page Header: Create Role -->
            <div class="mb-8">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-blue-500/10 text-blue-400">
                        <i data-lucide="user-plus" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-white">Create Role</h1>
                        <p class="text-sm text-gray-500 mt-1">Create a new role and assign permissions.</p>
                    </div>
                </div>
                <!-- Back to roles list -->
                <a href="{{ route('roles.index') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-lg border border-gray-700 text-gray-300 hover:bg-gray-800 hover:text-white transition">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    Back
                </a>
            </div>

            <!-- Role Creation Form -->
            <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-xl overflow-hidden">
                <form action="{{ route('roles.store') }}" method="POST" class="p-6">
                    @csrf

                    <div class="space-y-6">
                        <!-- Role Name Field -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Role Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="w-full pl-10 pr-4 py-3 bg-gray-950 border border-gray-700 rounded-xl text-white placeholder-gray-600 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none transition">
                            @error('name')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Permissions Assignment -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-3">Assign Permissions</label>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                @foreach($permissions as $permission)
                                    <label class="flex items-center gap-3 p-3 bg-gray-950 border border-gray-800 rounded-xl hover:border-gray-700 hover:bg-gray-900 transition cursor-pointer">
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" class="w-4 h-4 rounded border-gray-700 bg-gray-900 text-blue-600 focus:ring-blue-500 focus:ring-offset-gray-950">
                                        <span class="text-sm text-gray-300">{{ $permission->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-800">
                            <a href="{{ route('roles.index') }}" class="px-5 py-2.5 rounded-lg border border-gray-700 text-gray-300 hover:bg-gray-800 transition">Cancel</a>
                            <button type="submit" class="px-5 py-2.5 rounded-lg bg-blue-600 hover:bg-blue-500 text-white font-semibold shadow-lg shadow-blue-600/20 transition">Create Role</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
