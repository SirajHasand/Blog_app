<x-app-layout>

 


    {{-- Main Content --}}
    <div class="min-h-screen bg-gray-950 py-10">

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- Page Header --}}
            <div class="mb-8">

                <div class="flex items-center gap-3">

                    <div class="w-12 h-12
                                flex items-center justify-center
                                rounded-xl
                                bg-blue-500/10
                                text-blue-400">

                        <i data-lucide="file-plus-2" class="w-6 h-6"></i>

                    </div>

                    <div>

                        <h1 class="text-2xl font-bold text-white">
                            Create New Post
                        </h1>

                        <p class="text-sm text-gray-500 mt-1">
                            Share something interesting with your readers.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Form Card --}}
            <div class="bg-gray-900
                        border border-gray-800
                        rounded-2xl
                        shadow-xl
                        overflow-hidden">


                {{-- Card Header --}}
                <div class="px-6 py-5
                            border-b border-gray-800">

                    <h2 class="text-lg font-semibold text-white">
                        Post Information
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Fill in the information below to create your post.
                    </p>

                </div>


                {{-- Form --}}
                <form action="{{ route('admin.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf


                    <div class="p-6 space-y-6">


                        {{-- Title --}}
                        <div>

                            <label for="title"
                                   class="block text-sm font-medium text-gray-300 mb-2">

                                Post Title

                            </label>

                            <div class="relative">

                                <div class="absolute inset-y-0 left-0
                                            flex items-center pl-3
                                            pointer-events-none">

                                    <i data-lucide="heading"
                                       class="w-5 h-5 text-gray-500">
                                    </i>

                                </div>

                                <input
                                    type="text"
                                    name="title"
                                    id="title"
                                    value="{{ old('title') }}"
                                    placeholder="Enter your post title..."

                                    class="w-full
                                           pl-10 pr-4 py-3
                                           bg-gray-950
                                           border border-gray-700
                                           rounded-xl
                                           text-white
                                           placeholder-gray-600
                                           focus:border-blue-500
                                           focus:ring-2
                                           focus:ring-blue-500/20
                                           focus:outline-none
                                           transition"
                                >

                            </div>

                            @error('title')

                                <p class="flex items-center gap-1
                                          text-red-400
                                          text-sm
                                          mt-2">

                                    <i data-lucide="circle-alert"
                                       class="w-4 h-4">
                                    </i>

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>


                        {{-- Image --}}
                        <div>

                            <label for="image"
                                   class="block text-sm font-medium text-gray-300 mb-2">

                                Featured Image

                            </label>

                            <label for="image"
                                   class="flex flex-col items-center justify-center
                                          w-full
                                          h-40
                                          border-2 border-dashed
                                          border-gray-700
                                          rounded-xl
                                          bg-gray-950
                                          hover:bg-gray-800/50
                                          hover:border-blue-500/50
                                          cursor-pointer
                                          transition">

                                <i data-lucide="image-plus"
                                   class="w-8 h-8 text-gray-500 mb-3">
                                </i>

                                <span class="text-sm text-gray-400">
                                    Click to upload an image
                                </span>

                                <span class="text-xs text-gray-600 mt-1">
                                    PNG, JPG, JPEG up to your configured limit
                                </span>

                                <input
                                    type="file"
                                    name="image"
                                    id="image"
                                    class="hidden"
                                >

                            </label>

                            @error('image')

                                <p class="flex items-center gap-1
                                          text-red-400
                                          text-sm
                                          mt-2">

                                    <i data-lucide="circle-alert"
                                       class="w-4 h-4">
                                    </i>

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>


                        {{-- Content --}}
                        <div>

                            <label for="content"
                                   class="block text-sm font-medium text-gray-300 mb-2">

                                Post Content

                            </label>

                            <div class="relative">

                                <div class="absolute top-3 left-3
                                            pointer-events-none">

                                    <i data-lucide="align-left"
                                       class="w-5 h-5 text-gray-500">
                                    </i>

                                </div>

                                <textarea
                                    name="content"
                                    id="content"
                                    rows="10"
                                    placeholder="Write your post content here..."

                                    class="w-full
                                           pl-10 pr-4 py-3
                                           bg-gray-950
                                           border border-gray-700
                                           rounded-xl
                                           text-white
                                           placeholder-gray-600
                                           focus:border-blue-500
                                           focus:ring-2
                                           focus:ring-blue-500/20
                                           focus:outline-none
                                           transition
                                           resize-y"
                                >{{ old('content') }}</textarea>

                            </div>

                            @error('content')

                                <p class="flex items-center gap-1
                                          text-red-400
                                          text-sm
                                          mt-2">

                                    <i data-lucide="circle-alert"
                                       class="w-4 h-4">
                                    </i>

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                    </div>


                    {{-- Form Footer --}}
                    <div class="px-6 py-5
                                bg-gray-950
                                border-t border-gray-800
                                flex flex-col sm:flex-row
                                sm:items-center
                                sm:justify-between
                                gap-3">


                        {{-- Cancel --}}
                        <a href="{{ route('dashboard') }}"
                           class="inline-flex items-center justify-center gap-2
                                  px-5 py-2.5
                                  rounded-lg
                                  border border-gray-700
                                  text-gray-300
                                  hover:bg-gray-800
                                  hover:text-white
                                  transition">

                            <i data-lucide="x" class="w-4 h-4"></i>

                            Cancel

                        </a>


                        {{-- Submit --}}
                        <button
                            type="submit"

                            class="inline-flex items-center justify-center gap-2
                                   px-6 py-2.5
                                   rounded-lg
                                   bg-blue-600
                                   hover:bg-blue-500
                                   text-white
                                   font-semibold
                                   shadow-lg
                                   shadow-blue-600/20
                                   hover:-translate-y-0.5
                                   transition-all">

                            <i data-lucide="send" class="w-4 h-4"></i>

                            Create Post

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>