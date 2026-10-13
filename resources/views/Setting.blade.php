<x-app-layout>

    {{-- Header --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-white">
                    {{ __('Setting') }}
                </h2>

                <p class="mt-1 text-sm text-gray-400">
                    Manage your Setting
                </p>
            </div>

            <div class="hidden sm:flex items-center gap-2 text-sm text-gray-400">
                <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                Setting
            </div>
        </div>
    </x-slot>


    {{-- Main Content --}}
    
    <form action="{{ route('setting.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf


                    <div class="p-6 space-y-6 w-2xl mx-auto">


                        {{-- Phone --}}
                        <div>

                            <label for="Phone"
                                   class="block text-sm font-medium text-gray-300 mb-2">

                                Phone Number

                            </label>

                            <div class="relative">

                                <div class="absolute inset-y-0 left-0
                                            flex items-center pl-3
                                            pointer-events-none">

                                    <i data-lucide="phone"
                                       class="w-5 h-5 text-gray-500">
                                    </i>

                                </div>

                                <input
                                    type="number"
                                    name="phone"
                                    id="phone"
                                    value="{{$setting->phone}}"
                                    placeholder="Enter your Phone Number..."

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

                            @error('phone')

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


                        {{-- Logo --}}
                        <div>

                            <label for="logo"
                                   class="block text-sm font-medium text-gray-300 mb-2">

                                Featured Logo

                            </label>

                            <label for="logo"
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
                                    Click to upload an Logo
                                </span>

                                <span class="text-xs text-gray-600 mt-1">
                                    PNG, JPG, JPEG up to your configured limit
                                </span>

                                <input
                                    type="file"
                                    name="logo"
                                    id="logo"
                                    class="hidden"
                                    value="{{$setting->logo}}"
                                >

                            </label>

                            @error('logo')

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


                        {{-- Facebook --}}
                        <div>

                            <label for="Facebook"
                                   class="block text-sm font-medium text-gray-300 mb-2">

                                Facebook Url

                            </label>

                            <div class="relative">

                                <div class="absolute inset-y-0 left-0
                                            flex items-center pl-3
                                            pointer-events-none">

                                    <span
                                       class="w-5 h-5 text-gray-500">f
                                    </span>

                                </div>

                                <input
                                    type="text"
                                    name="facebook"
                                    id="facebook"
                                    value="{{ $setting->facebook }}"
                                    placeholder="Enter your facebook Url..."

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

                            @error('phone')

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

                            Save Setting 

                        </button>

                    </div>

                </form>



</x-app-layout>