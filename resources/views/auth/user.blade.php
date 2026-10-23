<x-app-layout>
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 p-3">

                    <div class="">
                        <h1 class="text-3xl font-bold text-white">
                            {{ $page }} Page
                        </h1>

                        <p class="text-gray-400 mt-2">
                            Welcome back! Here's what's happening with your blog.
                        </p>
                    </div>

                    {{--  Button --}}
                    <div class=" flex gap-4">
                    <a href="{{ route('registerNewUser') }}"
                       class="inline-flex items-center justify-center gap-2
                              bg-blue-600 hover:bg-blue-500
                              text-white font-semibold
                              px-5 py-3 rounded-xl
                              shadow-lg shadow-blue-600/20
                              transition-all duration-200
                              hover:-translate-y-0.5">

                        <i data-lucide="plus" class="w-5 h-5"></i>

                        Create New User
                    </a>
                    
                    </div>
                </div>

    {{-- Header 
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-white">
                    {{ __('Dashboard') }}
                </h2>

                <p class="mt-1 text-sm text-gray-400">
                    Manage your blog posts and content
                </p>
                <div>
                        <p class="font-semibold">
                            Success!
                        </p>

                        <p class="text-sm text-green-400/80">
                            {{ session('success') }}
                        </p>
                </div>
            </div>

            <div class="hidden sm:flex items-center gap-2 text-sm text-gray-400">
                <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                Dashboard
            </div>
        </div>
    </x-slot>
--}}
{{-- User Section --}}
            <div class="bg-gray-900
                        border border-gray-800
                        rounded-2xl
                        shadow-xl
                        overflow-hidden">


                {{-- Section Header --}}
                <div class="px-6 py-5
                            border-b border-gray-800
                            flex flex-col sm:flex-row
                            sm:items-center
                            sm:justify-between
                            gap-4">

                    <div>

                        <h2 class="text-lg font-semibold text-white">
                            All Users
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            Manage and organize your users.
                        </p>

                    </div>

                    <div class="flex items-center gap-2 text-sm text-gray-500">

                        <i data-lucide="layers" class="w-4 h-4"></i>

                        {{ $users->count() }} Users

                    </div>

                </div>


                {{-- Table --}}
                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        {{-- Table Head --}}
                        <thead class="bg-gray-950">

                            <tr class="text-left">

                                <th class="px-6 py-4
                                           text-xs font-semibold
                                           text-gray-500
                                           uppercase tracking-wider">
                                    ID
                                </th>

                                <th class="px-6 py-4
                                           text-xs font-semibold
                                           text-gray-500
                                           uppercase tracking-wider">
                                    Name
                                </th>

                                <th class="px-6 py-4
                                           text-xs font-semibold
                                           text-gray-500
                                           uppercase tracking-wider">
                                    Email
                                </th>

                                <th class="px-6 py-4
                                           text-xs font-semibold
                                           text-gray-500
                                           uppercase tracking-wider">
                                    Password
                                </th>
                                <th class="px-6 py-4
                                           text-xs font-semibold
                                           text-gray-500
                                           uppercase tracking-wider">
                                    Image
                                </th>

                                

                            </tr>

                        </thead>


                        {{-- Table Body --}}
                        <tbody class="divide-y divide-gray-800">

                            @forelse($users as $user)

                                <tr class="hover:bg-gray-800/40 transition">


                                    {{-- ID --}}
                                    <td class="px-6 py-5">

                                        <span class="text-sm text-gray-500">
                                            #{{ $user->id }}
                                        </span>

                                    </td>


                                    {{-- Name --}}
                                    <td class="px-6 py-5">

                                        <div class="flex items-center gap-3">

                                            <div class="w-10 h-10
                                                        flex items-center justify-center
                                                        rounded-lg
                                                        bg-blue-500/10
                                                        text-blue-400">

                                                <i data-lucide="file-text"
                                                   class="w-5 h-5">
                                                </i>

                                            </div>

                                            <div>

                                                <p class="font-semibold text-white">
                                                    {{ $user->name }}
                                                </p>

                                                <p class="text-xs text-gray-500 mt-1">
                                                    Blog User
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- Email --}}
                                    <td class="px-6 py-5 max-w-md">

                                        <p class="text-sm text-gray-400 truncate">

                                            {{ Str::limit($user->email, 80) }}

                                        </p>

                                    </td>


                                    {{-- Password --}}
                                    <td class="px-6 py-5 max-w-md">

                                        <p class="text-sm text-gray-400 truncate">


                                            {{$user->password}}

                                        </span>

                                    </td>
                                    {{-- Email --}}
                                    <td class="px-6 py-5 max-w-md">

                                        <p class="text-sm text-gray-400 truncate">

                                            {{$user->profile->user_pic}}

                                        </p>

                                    </td>

                                    </tbody>



</form>


                                        </div>

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td colspan="5" class="px-6 py-16 text-center">

                                        <div class="flex flex-col items-center">

                                            <div class="w-16 h-16
                                                        flex items-center justify-center
                                                        rounded-2xl
                                                        bg-gray-800
                                                        text-gray-500
                                                        mb-4">

                                                <i data-lucide="file-x"
                                                   class="w-8 h-8">
                                                </i>

                                            </div>

                                            <h3 class="text-lg font-semibold text-white">
                                                No User yet
                                            </h3>

                                            

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>
                        
                </div>

            </div>

        </div>
        </x-app-layout>