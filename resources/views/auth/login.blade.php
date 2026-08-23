<x-guest-layout>

    <div class="min-h-screen
                flex items-center justify-center
                px-4 py-10
                bg-slate-950
                relative overflow-hidden">

        {{-- ================= BACKGROUND ================= --}}

        <div class="absolute inset-0
                    bg-gradient-to-br
                    from-blue-950
                    via-slate-950
                    to-indigo-950">
        </div>

        {{-- Decorative circles --}}
        <div class="absolute
                    -top-32 -left-32
                    w-96 h-96
                    bg-blue-600/20
                    rounded-full
                    blur-3xl">
        </div>

        <div class="absolute
                    -bottom-32 -right-32
                    w-96 h-96
                    bg-indigo-600/20
                    rounded-full
                    blur-3xl">
        </div>


        {{-- ================= LOGIN CARD ================= --}}

        <div class="relative z-10
                    w-full max-w-md">

            <div class="bg-slate-900/90
                        backdrop-blur-xl
                        border border-slate-700
                        rounded-3xl
                        shadow-2xl
                        overflow-hidden">


                {{-- ================= HEADER ================= --}}

                <div class="px-8 pt-10 pb-6 text-center">

                    {{-- Logo --}}
                    <a href="{{ url('/') }}"
                       class="inline-flex
                              items-center justify-center
                              w-16 h-16
                              rounded-2xl
                              bg-gradient-to-br
                              from-blue-500
                              to-indigo-600
                              shadow-lg
                              shadow-blue-500/20
                              mb-5">

                        <i data-lucide="pen-line"
                           class="w-8 h-8 text-white">
                        </i>

                    </a>


                    <h1 class="text-3xl
                               font-black
                               text-white">

                        Welcome Back

                    </h1>


                    <p class="text-slate-400
                              text-sm
                              mt-2">

                        Sign in to continue to
                        <span class="text-blue-400 font-semibold">
                            My Blog
                        </span>

                    </p>

                </div>



                {{-- ================= FORM ================= --}}

                <form method="POST"
                      action="{{ route('login') }}"
                      class="px-8 pb-8">

                    @csrf


                    {{-- Session Status --}}
                    <x-auth-session-status
                        class="mb-5"
                        :status="session('status')"
                    />


                    {{-- ================= EMAIL ================= --}}

                    <div>

                        <label for="email"
                               class="block
                                      text-sm
                                      font-semibold
                                      text-slate-300
                                      mb-2">

                            Email Address

                        </label>


                        <div class="relative">

                            <i data-lucide="mail"
                               class="absolute
                                      left-4 top-1/2
                                      -translate-y-1/2
                                      w-5 h-5
                                      text-slate-500">
                            </i>


                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="username"

                                placeholder="you@example.com"

                                class="w-full
                                       bg-slate-800
                                       border border-slate-700
                                       rounded-xl
                                       py-3.5
                                       pl-12 pr-4
                                       text-white
                                       placeholder-slate-500
                                       outline-none
                                       transition

                                       focus:border-blue-500
                                       focus:ring-2
                                       focus:ring-blue-500/20"
                            >

                        </div>


                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2"
                        />

                    </div>



                    {{-- ================= PASSWORD ================= --}}

                    <div class="mt-5">

                        <div class="flex items-center
                                    justify-between mb-2">

                            <label for="password"
                                   class="block
                                          text-sm
                                          font-semibold
                                          text-slate-300">

                                Password

                            </label>


                            @if (Route::has('password.request'))

                                <a href="{{ route('password.request') }}"
                                   class="text-xs
                                          text-blue-400
                                          hover:text-blue-300
                                          transition">

                                    Forgot password?

                                </a>

                            @endif

                        </div>


                        <div class="relative">

                            <i data-lucide="lock"
                               class="absolute
                                      left-4 top-1/2
                                      -translate-y-1/2
                                      w-5 h-5
                                      text-slate-500">
                            </i>


                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"

                                placeholder="Enter your password"

                                class="w-full
                                       bg-slate-800
                                       border border-slate-700
                                       rounded-xl
                                       py-3.5
                                       pl-12 pr-12
                                       text-white
                                       placeholder-slate-500
                                       outline-none
                                       transition

                                       focus:border-blue-500
                                       focus:ring-2
                                       focus:ring-blue-500/20"
                            >


                            {{-- Show password --}}
                            <button
                                type="button"
                                onclick="togglePassword()"
                                class="absolute
                                       right-4 top-1/2
                                       -translate-y-1/2
                                       text-slate-500
                                       hover:text-slate-300
                                       transition">

                                <i id="passwordIcon"
                                   data-lucide="eye"
                                   class="w-5 h-5">
                                </i>

                            </button>

                        </div>


                        <x-input-error
                            :messages="$errors->get('password')"
                            class="mt-2"
                        />

                    </div>



                    {{-- ================= REMEMBER ================= --}}

                    <div class="mt-5">

                        <label class="inline-flex
                                      items-center
                                      cursor-pointer">

                            <input
                                id="remember_me"
                                type="checkbox"
                                name="remember"

                                class="w-4 h-4
                                       rounded
                                       border-slate-600
                                       bg-slate-800
                                       text-blue-600
                                       focus:ring-blue-500
                                       focus:ring-offset-slate-900"
                            >

                            <span class="ms-3
                                         text-sm
                                         text-slate-400">

                                Remember me

                            </span>

                        </label>

                    </div>



                    {{-- ================= LOGIN BUTTON ================= --}}

                    <button
                        type="submit"

                        class="w-full
                               mt-7
                               flex items-center
                               justify-center
                               gap-2

                               bg-gradient-to-r
                               from-blue-600
                               to-indigo-600

                               hover:from-blue-500
                               hover:to-indigo-500

                               text-white
                               font-bold

                               py-3.5
                               rounded-xl

                               shadow-lg
                               shadow-blue-600/20

                               hover:shadow-blue-600/30
                               hover:-translate-y-0.5

                               transition-all
                               duration-200">

                        <i data-lucide="log-in"
                           class="w-5 h-5">
                        </i>

                        Sign In

                    </button>



                    {{-- ================= DIVIDER ================= --}}

                    <div class="flex items-center
                                gap-4
                                my-7">

                        <div class="h-px
                                    flex-1
                                    bg-slate-700">
                        </div>

                        <span class="text-xs
                                     text-slate-500
                                     uppercase
                                     tracking-wider">

                            or

                        </span>

                        <div class="h-px
                                    flex-1
                                    bg-slate-700">
                        </div>

                    </div>



                    {{-- ================= REGISTER ================= --}}

                    <p class="text-center
                              text-sm
                              text-slate-400">

                        Don't have an account?

                        <a href="{{ route('register') }}"
                           class="font-bold
                                  text-blue-400
                                  hover:text-blue-300
                                  transition">

                            Create Account

                        </a>

                    </p>

                </form>

            </div>



            {{-- Back to website --}}
            <div class="text-center mt-6">

                <a href="{{ url('/') }}"
                   class="inline-flex
                          items-center
                          gap-2
                          text-sm
                          text-slate-500
                          hover:text-slate-300
                          transition">

                    <i data-lucide="arrow-left"
                       class="w-4 h-4">
                    </i>

                    Back to My Blog

                </a>

            </div>

        </div>

    </div>


    {{-- ================= PASSWORD SCRIPT ================= --}}

    <script>

        function togglePassword() {

            const password =
                document.getElementById('password');

            const icon =
                document.getElementById('passwordIcon');


            if (password.type === 'password') {

                password.type = 'text';

                icon.setAttribute('data-lucide', 'eye-off');

            } else {

                password.type = 'password';

                icon.setAttribute('data-lucide', 'eye');

            }


            // Re-render Lucide icon
            if (typeof createIcons !== 'undefined') {
                createIcons();
            }

        }

    </script>

</x-guest-layout>