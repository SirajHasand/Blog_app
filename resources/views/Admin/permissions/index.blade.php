<x-app-layout>
    <div class="min-h-screen bg-gray-950 py-10">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-8">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-blue-500/10 text-blue-400">
                        <i data-lucide="key" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-white">Permissions</h1>
                        <p class="text-sm text-gray-500 mt-1">Available system permissions.</p>
                    </div>
                </div>
            </div>

            <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-950">
                            <tr class="text-left">
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800">
                            @forelse($permissions as $permission)
                                <tr class="hover:bg-gray-800/40 transition">
                                    <td class="px-6 py-5"><span class="text-sm text-gray-500">#{{ $permission->id }}</span></td>
                                    <td class="px-6 py-5"><span class="text-sm font-semibold text-white">{{ $permission->name }}</span></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-6 py-16 text-center">
                                        <div class="flex flex-col items-center">
                                            <div class="w-16 h-16 flex items-center justify-center rounded-2xl bg-gray-800 text-gray-500 mb-4">
                                                <i data-lucide="key" class="w-8 h-8"></i>
                                            </div>
                                            <h3 class="text-lg font-semibold text-white">No Permissions yet</h3>
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
