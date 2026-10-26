<x-app-layout>
    <div class="min-h-screen bg-gray-950 py-10" >
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
         {{-- Page Header --}}
            <div class="mb-8">

                <div class="flex items-center gap-3">

                    <div class="w-12 h-12
                                flex items-center justify-center
                                rounded-xl
                                bg-blue-500/10
                                text-blue-400">

                        <i data-lucide="user-plus" class="w-6 h-6"></i>

                    </div>

                    <div>

                        <h1 class="text-2xl font-bold text-white">
                            Create New User 
                        </h1>

                        <p class="text-sm text-gray-500 mt-1">
                            Share something interesting with your readers.
                        </p>

                    </div>

                </div>

            </div>
            <div class="border border-gray-800 bg-gray-900 rounded-xl shadow-2xl overflow-hidden">
                <form action="{{route('storeUser')}}"
                      method="POST"
                      enctype="multipart/form-data">
                      @csrf
                
                      <div class="p-6 space-y-6">
                        <div>
                            <label for="name"
                                   class="block text-sm font-medium text-gray-300 mb-2">

                                Name

                            </label>
                            <input type="text"
                            name="name"
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
                      </div>
                      <div class="p-6 space-y-6">
                        <div>
                            <label for="email"
                                   class="block text-sm font-medium text-gray-300 mb-2">

                                Email

                            </label>
                            <input type="text"
                            name="email"
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
                      </div>
                      <div class="p-6 space-y-6">
                        <div>
                            <label for="Password"
                                   class="block text-sm font-medium text-gray-300 mb-2">

                                Password

                            </label>
                            <input type="text"
                            name="password"
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
                      </div>
                      <div class="p-6 space-y-6">
                        <div>
                            <label for="image"
                                   class="block text-sm font-medium text-gray-300 mb-2">

                                Image

                            </label>
                            <input type="text"
                            name="image"
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

                      <div class="p-6 space-y-6">
                        <div>
                            <label for="role"
                                   class="block text-sm font-medium text-gray-300 mb-2">
                                Role
                            </label>
                            <select name="role"
                                    class="w-full pl-10 pr-4 py-3 bg-gray-950 border border-gray-700 rounded-xl text-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none transition">
                                <option value="editor">Editor</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                      </div>
                            <button
                            type="submit"

                            class="inline-flex items-center justify-center gap-2
                                   px-6 py-2.5
                                   mt-2
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

                            Create User

                        </button>
                        </div>
                      </div>


                </form>
            </div>
        </div>
    </div>
</x-app-layout>
