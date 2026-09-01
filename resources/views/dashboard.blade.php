<x-app-layout>

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
            </div>

            <div class="hidden sm:flex items-center gap-2 text-sm text-gray-400">
                <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                Dashboard
            </div>
        </div>
    </x-slot>
--}}

    {{-- Main Content --}}
    <div class="min-h-screen bg-gray-950 py-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- Welcome Section --}}
            <div class="mb-8">

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                    <div>
                        <h1 class="text-3xl font-bold text-white">
                            {{ $page }} Page
                        </h1>

                        <p class="text-gray-400 mt-2">
                            Welcome back! Here's what's happening with your blog.
                        </p>
                    </div>

                    {{--  Button --}}
                    <div class=" flex gap-4">
                    <a href="{{ route('admin.create') }}"
                       class="inline-flex items-center justify-center gap-2
                              bg-blue-600 hover:bg-blue-500
                              text-white font-semibold
                              px-5 py-3 rounded-xl
                              shadow-lg shadow-blue-600/20
                              transition-all duration-200
                              hover:-translate-y-0.5">

                        <i data-lucide="plus" class="w-5 h-5"></i>

                        Create Post
                    </a>
                    <a href="{{ route('posts.trash') }}"
                       class="inline-flex items-center justify-center gap-1
                              bg-red-600 hover:bg-red-500
                              text-white font-semibold
                              px-5 py-3 rounded-xl
                              shadow-lg shadow-blue-600/20
                              transition-all duration-200
                              hover:-translate-y-0.5">

                        <i data-lucide="Trash-2" class="w-5 h-5"></i>

                       Trash
                    </a>
                    </div>
                </div>

            </div>


            {{-- Success Message --}}
            @if(session('success'))

                <div class="mb-6 flex items-center gap-3
                            bg-green-500/10
                            border border-green-500/20
                            text-green-400
                            px-5 py-4
                            rounded-xl">

                    <div class="flex items-center justify-center
                                w-9 h-9
                                bg-green-500/10
                                rounded-full">

                        <i data-lucide="check-circle" class="w-5 h-5"></i>

                    </div>

                    <div>
                        <p class="font-semibold">
                            Success!
                        </p>

                        <p class="text-sm text-green-400/80">
                            {{ session('success') }}
                        </p>
                    </div>

                </div>

            @endif


            {{-- Statistics --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-8">


                {{-- Total Posts --}}
                <div class="bg-gray-900
                            border border-gray-800
                            rounded-2xl
                            p-6
                            shadow-xl
                            hover:border-gray-700
                            transition">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-gray-400">
                                Total Posts
                            </p>

                            <h3 class="text-3xl font-bold text-white mt-2">
                                {{ $posts->count() }}
                            </h3>

                        </div>

                        <div class="w-12 h-12
                                    flex items-center justify-center
                                    rounded-xl
                                    bg-blue-500/10
                                    text-blue-400">

                            <i data-lucide="file-text" class="w-6 h-6"></i>

                        </div>

                    </div>

                    <p class="text-xs text-gray-500 mt-4">
                        All posts in your blog
                    </p>

                </div>


                {{-- Published --}}
                <div class="bg-gray-900
                            border border-gray-800
                            rounded-2xl
                            p-6
                            shadow-xl
                            hover:border-gray-700
                            transition">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-gray-400">
                                Published
                            </p>

                            <h3 class="text-3xl font-bold text-white mt-2">
                                {{ $posts->count() }}
                            </h3>

                        </div>

                        <div class="w-12 h-12
                                    flex items-center justify-center
                                    rounded-xl
                                    bg-green-500/10
                                    text-green-400">

                            <i data-lucide="globe" class="w-6 h-6"></i>

                        </div>

                    </div>

                    <p class="text-xs text-gray-500 mt-4">
                        Currently visible posts
                    </p>

                </div>


                {{-- Account --}}
                <div class="bg-gray-900
                            border border-gray-800
                            rounded-2xl
                            p-6
                            shadow-xl
                            hover:border-gray-700
                            transition">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-gray-400">
                                Account
                            </p>

                            <h3 class="text-lg font-bold text-white mt-2 truncate max-w-[180px]">
                                {{ Auth::user()->name }}
                            </h3>

                        </div>

                        <div class="w-12 h-12
                                    flex items-center justify-center
                                    rounded-xl
                                    bg-purple-500/10
                                    text-purple-400">

                            <i data-lucide="user" class="w-6 h-6"></i>

                        </div>

                    </div>

                    <p class="text-xs text-gray-500 mt-4">
                        Logged in administrator
                    </p>

                </div>

            </div>


            {{-- Posts Section --}}
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
                            Your Posts
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            Manage and organize your blog content.
                        </p>

                    </div>

                    <div class="flex items-center gap-2 text-sm text-gray-500">

                        <i data-lucide="layers" class="w-4 h-4"></i>

                        {{ $posts->count() }} Posts

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
                                    Post
                                </th>

                                <th class="px-6 py-4
                                           text-xs font-semibold
                                           text-gray-500
                                           uppercase tracking-wider">
                                    Content
                                </th>

                                <th class="px-6 py-4
                                           text-xs font-semibold
                                           text-gray-500
                                           uppercase tracking-wider">
                                    Status
                                </th>

                                <th class="px-6 py-4
                                           text-xs font-semibold
                                           text-gray-500
                                           uppercase tracking-wider text-right">
                                    Actions
                                </th>

                            </tr>

                        </thead>


                        {{-- Table Body --}}
                        <tbody class="divide-y divide-gray-800">

                            @forelse($posts as $post)

                                <tr class="hover:bg-gray-800/40 transition">


                                    {{-- ID --}}
                                    <td class="px-6 py-5">

                                        <span class="text-sm text-gray-500">
                                            #{{ $post->id }}
                                        </span>

                                    </td>


                                    {{-- Title --}}
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
                                                    {{ $post->title }}
                                                </p>

                                                <p class="text-xs text-gray-500 mt-1">
                                                    Blog Post
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- Content --}}
                                    <td class="px-6 py-5 max-w-md">

                                        <p class="text-sm text-gray-400 truncate">

                                            {{ Str::limit($post->content, 80) }}

                                        </p>

                                    </td>


                                    {{-- Status --}}
                                    <td class="px-6 py-5">

                                        <span class="inline-flex items-center gap-1.5
                                                     px-3 py-1
                                                     rounded-full
                                                     text-xs font-medium
                                                     bg-green-500/10
                                                     text-green-400">

                                            <span class="w-1.5 h-1.5
                                                         rounded-full
                                                         bg-green-400">
                                            </span>

                                            Published

                                        </span>

                                    </td>


                                    {{-- Actions --}}
                                    <td class="px-6 py-5">

                                        <div class="flex justify-end items-center gap-2">


                                            {{-- Edit --}}
                                            <a href="{{ route('admin.edit', $post->id) }}"
                                               class="w-9 h-9
                                                      flex items-center justify-center
                                                      rounded-lg
                                                      bg-blue-500/10
                                                      text-blue-400
                                                      hover:bg-blue-500
                                                      hover:text-white
                                                      transition"
                                               title="Edit">

                                                <i data-lucide="pencil"
                                                   class="w-4 h-4">
                                                </i>

                                            </a>


                                            {{-- Delete --}}
                                           <form action="{{ route('admin.destroy', ['admin' => $post->id]) }}"
      method="POST"
      class="inline">

    @csrf
    @method('DELETE')

    <button type="submit"
            class="w-9 h-9 flex items-center justify-center
                   rounded-lg
                   bg-red-500/10
                   text-red-400
                   hover:bg-red-500
                   hover:text-white
                   transition">

        <i data-lucide="trash-2" class="w-4 h-4"></i>

    </button>

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
                                                No posts yet
                                            </h3>

                                            <p class="text-sm text-gray-500 mt-1 mb-5">
                                                Start creating your first blog post.
                                            </p>

                                            <a href="{{ route('admin.create') }}"
                                               class="inline-flex items-center gap-2
                                                      bg-blue-600 hover:bg-blue-500
                                                      text-white
                                                      px-5 py-2.5
                                                      rounded-lg
                                                      font-medium
                                                      transition">

                                                <i data-lucide="plus"
                                                   class="w-4 h-4">
                                                </i>

                                                Create Post

                                            </a>

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