<x-app-layout>
    <div class="min-h-screen bg-gray-950 py-10">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-8">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-blue-500/10 text-blue-400">
                        <i data-lucide="edit" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-white">Edit Role</h1>
                        <p class="text-sm text-gray-500 mt-1">Update role name and permissions.</p>
                    </div>
                </div>
                <a href="{{ route('roles.index') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-lg border border-gray-700 text-gray-300 hover:bg-gray-800 hover:text-white transition">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    Back
                </a>
            </div>

            <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-xl overflow-hidden">
                <form action="{{ route('roles.update', $role->id) }}" method="POST" class="p-6">
                    @csrf @method('PUT')

                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Role Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $role->name) }}"
                                class="w-full pl-10 pr-4 py-3 bg-gray-950 border border-gray-700 rounded-xl text-white placeholder-gray-600 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none transition">
                            @error('name')
                                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Permissions</label>
                            <p class="text-xs text-gray-500 mb-3">Select the permissions this role will have.</p>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 max-h-96 overflow-y-auto border border-gray-700 rounded-xl p-3 bg-gray-950">
                                @php
                                    $selected = $role->permissions->pluck('id')->toArray();
                                @endphp
                                @foreach($permissions as $permission)
                                    <div class="flex items-center gap-2">
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                            {{ in_array($permission->id, $selected) ? 'checked' : '' }}
                                            class="w-4 h-4 text-blue-600 bg-gray-900 border-gray-600 rounded focus:ring-blue-500">
                                        <label for="" class="text-sm text-gray-300 cursor-pointer">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('roles.index') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-lg border border-gray-700 text-gray-300 hover:bg-gray-800 hover:text-white transition">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex items-center justify-center gap-2 px-6 py-2.5 rounded-lg bg-blue-600 hover:bg-blue-500 text-white font-semibold shadow-lg shadow-blue-600/20 hover:-translate-y-0.5 transition-all">
                            <i data-lucide="save" class="w-4 h-4"></i>
                            Update Role
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
