
<x-guest-layout>

    <div class="relative isolate flex min-h-screen items-center justify-center
                overflow-hidden bg-slate-950 px-4 py-8 sm:py-12">

        {{-- Background --}}
        <div class="absolute inset-0 bg-gradient-to-br
                    from-blue-950 via-slate-950 to-indigo-950"></div>

        <div class="absolute -right-32 -top-32 h-80 w-80 rounded-full
                    bg-blue-600/20 blur-3xl sm:h-96 sm:w-96"></div>

        <div class="absolute -bottom-32 -left-32 h-80 w-80 rounded-full
                    bg-indigo-600/20 blur-3xl sm:h-96 sm:w-96"></div>

        <div class="absolute left-1/2 top-1/2 h-72 w-72 -translate-x-1/2
                    -translate-y-1/2 rounded-full bg-blue-500/5 blur-3xl"></div>

        {{-- Register Card --}}
        <div class="auth-card relative z-10 w-full max-w-md">

            <div class="overflow-hidden rounded-3xl border border-slate-700
                        bg-slate-900/90 shadow-2xl shadow-black/30
                        backdrop-blur-xl">

                {{-- Header --}}
                <div class="px-5 pb-6 pt-8 text-center sm:px-8 sm:pt-9">

                    <a href="{{ url('/') }}"
                       aria-label="Return to homepage"
                       class="mb-5 inline-flex h-16 w-16 items-center justify-center
                              rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600
                              shadow-lg shadow-blue-500/20 transition duration-300
                              hover:scale-105 hover:shadow-blue-500/30">

                        <i data-lucide="user-plus"
                           class="h-8 w-8 text-white"></i>
                    </a>

                    <h1 class="text-2xl font-black tracking-tight text-white sm:text-3xl">
                        Create Account
                    </h1>

                    <p class="mt-2 text-sm leading-6 text-slate-400">
                        Join
                        <span class="font-semibold text-blue-400">My Blog</span>
                        and start exploring.
                    </p>
                </div>

                {{-- Registration Form --}}
                <form method="POST"
                      action="{{ route('register') }}"
                      class="px-5 pb-7 sm:px-8 sm:pb-8">

                    @csrf

                    {{-- Full Name --}}
                    <div>
                        <label for="name"
                               class="mb-2 block text-sm font-semibold text-slate-300">
                            Full Name
                        </label>

                        <div class="relative">
                            <i data-lucide="user"
                               class="pointer-events-none absolute left-4 top-1/2
                                      h-5 w-5 -translate-y-1/2 text-slate-500"></i>

                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                autocomplete="name"
                                placeholder="Enter your name"
                                class="w-full rounded-xl border border-slate-700
                                       bg-slate-800 py-3.5 pl-12 pr-4 text-white
                                       placeholder-slate-500 outline-none
                                       transition duration-200
                                       focus:border-blue-500 focus:ring-2
                                       focus:ring-blue-500/20"
                            >
                        </div>

                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    {{-- Email --}}
                    <div class="mt-5">
                        <label for="email"
                               class="mb-2 block text-sm font-semibold text-slate-300">
                            Email Address
                        </label>

                        <div class="relative">
                            <i data-lucide="mail"
                               class="pointer-events-none absolute left-4 top-1/2
                                      h-5 w-5 -translate-y-1/2 text-slate-500"></i>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="username"
                                placeholder="you@example.com"
                                class="w-full rounded-xl border border-slate-700
                                       bg-slate-800 py-3.5 pl-12 pr-4 text-white
                                       placeholder-slate-500 outline-none
                                       transition duration-200
                                       focus:border-blue-500 focus:ring-2
                                       focus:ring-blue-500/20"
                            >
                        </div>

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    {{-- Password --}}
                    <div class="mt-5">
                        <label for="password"
                               class="mb-2 block text-sm font-semibold text-slate-300">
                            Password
                        </label>

                        <div class="relative">
                            <i data-lucide="lock"
                               class="pointer-events-none absolute left-4 top-1/2
                                      h-5 w-5 -translate-y-1/2 text-slate-500"></i>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                placeholder="Create a password"
                                class="w-full rounded-xl border border-slate-700
                                       bg-slate-800 py-3.5 pl-12 pr-12 text-white
                                       placeholder-slate-500 outline-none
                                       transition duration-200
                                       focus:border-blue-500 focus:ring-2
                                       focus:ring-blue-500/20"
                            >

                            <button
                                type="button"
                                onclick="togglePassword('password', 'passwordIcon')"
                                aria-label="Show or hide password"
                                aria-controls="password"
                                class="absolute right-3 top-1/2 -translate-y-1/2
                                       rounded-lg p-1.5 text-slate-500
                                       transition hover:text-blue-400
                                       focus-visible:outline-none
                                       focus-visible:ring-2 focus-visible:ring-blue-500">

                                <i id="passwordIcon"
                                   data-lucide="eye"
                                   class="h-5 w-5"></i>
                            </button>
                        </div>

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    {{-- Confirm Password --}}
                    <div class="mt-5">
                        <label for="password_confirmation"
                               class="mb-2 block text-sm font-semibold text-slate-300">
                            Confirm Password
                        </label>

                        <div class="relative">
                            <i data-lucide="shield-check"
                               class="pointer-events-none absolute left-4 top-1/2
                                      h-5 w-5 -translate-y-1/2 text-slate-500"></i>

                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="Confirm your password"
                                class="w-full rounded-xl border border-slate-700
                                       bg-slate-800 py-3.5 pl-12 pr-12 text-white
                                       placeholder-slate-500 outline-none
                                       transition duration-200
                                       focus:border-blue-500 focus:ring-2
                                       focus:ring-blue-500/20"
                            >

                            <button
                                type="button"
                                onclick="togglePassword('password_confirmation', 'confirmPasswordIcon')"
                                aria-label="Show or hide confirmation password"
                                aria-controls="password_confirmation"
                                class="absolute right-3 top-1/2 -translate-y-1/2
                                       rounded-lg p-1.5 text-slate-500
                                       transition hover:text-blue-400
                                       focus-visible:outline-none
                                       focus-visible:ring-2 focus-visible:ring-blue-500">

                                <i id="confirmPasswordIcon"
                                   data-lucide="eye"
                                   class="h-5 w-5"></i>
                            </button>
                        </div>

                        <x-input-error
                            :messages="$errors->get('password_confirmation')"
                            class="mt-2"
                        />
                    </div>

                    {{-- Create Account Button --}}
                    <button
                        type="submit"
                        class="mt-7 flex min-h-12 w-full items-center justify-center
                               gap-2 rounded-xl bg-gradient-to-r from-blue-600
                               to-indigo-600 px-4 py-3.5 font-bold text-white
                               shadow-lg shadow-blue-600/20 transition-all
                               duration-200 hover:-translate-y-0.5
                               hover:from-blue-500 hover:to-indigo-500
                               hover:shadow-blue-600/30
                               focus-visible:outline-none focus-visible:ring-2
                               focus-visible:ring-blue-400
                               focus-visible:ring-offset-2
                               focus-visible:ring-offset-slate-900
                               active:translate-y-0">

                        <i data-lucide="user-plus" class="h-5 w-5"></i>
                        <span>Create Account</span>
                    </button>

                    {{-- Divider --}}
                    <div class="my-7 flex items-center gap-4">
                        <div class="h-px flex-1 bg-slate-700"></div>

                        <span class="whitespace-nowrap text-xs uppercase
                                     tracking-wider text-slate-500">
                            Already a member?
                        </span>

                        <div class="h-px flex-1 bg-slate-700"></div>
                    </div>

                    {{-- Login Link --}}
                    <a
                        href="{{ route('login') }}"
                        class="flex min-h-12 w-full items-center justify-center
                               gap-2 rounded-xl border border-slate-700 px-4 py-3
                               font-semibold text-slate-300 transition-all duration-200
                               hover:border-blue-500/50 hover:bg-slate-800
                               hover:text-white
                               focus-visible:outline-none focus-visible:ring-2
                               focus-visible:ring-blue-500">

                        <i data-lucide="log-in" class="h-4 w-4"></i>
                        <span>Sign In</span>
                    </a>
                </form>
            </div>

            {{-- Back to Website --}}
            <div class="mt-6 text-center">
                <a href="{{ url('/') }}"
                   class="inline-flex items-center gap-2 rounded-lg px-3 py-2
                          text-sm text-slate-500 transition-colors duration-200
                          hover:text-blue-400
                          focus-visible:outline-none focus-visible:ring-2
                          focus-visible:ring-blue-500">

                    <i data-lucide="arrow-left" class="h-4 w-4"></i>
                    <span>Back to My Blog</span>
                </a>
            </div>
        </div>
    </div>

    {{-- Page Animation: No additional files required --}}
    <style>
        @keyframes auth-fade-in {
            from {
                opacity: 0;
                transform: translateY(12px) scale(0.99);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .auth-card {
            animation: auth-fade-in 350ms ease-out both;
        }

        @media (prefers-reduced-motion: reduce) {
            .auth-card {
                animation: none;
            }
        }
    </style>

    {{-- Password Visibility --}}
    <script>
        function togglePassword(inputId, iconId) {
            const password = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            if (!password || !icon) return;

            const isHidden = password.type === 'password';

            password.type = isHidden ? 'text' : 'password';
            icon.setAttribute('data-lucide', isHidden ? 'eye-off' : 'eye');

            if (typeof createIcons === 'function') {
                createIcons();
            }
        }
    </script>

</x-guest-layout>
