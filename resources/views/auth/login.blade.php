
<x-guest-layout>
    <div class="relative isolate min-h-screen overflow-hidden bg-slate-950 text-white">

        {{-- Background --}}
        <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-slate-950 via-blue-950/70 to-slate-950"></div>
            <div class="absolute -left-32 -top-32 h-72 w-72 rounded-full bg-blue-500/20 blur-3xl sm:h-96 sm:w-96"></div>
            <div class="absolute -bottom-32 -right-32 h-72 w-72 rounded-full bg-indigo-500/20 blur-3xl sm:h-96 sm:w-96"></div>
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(255,255,255,0.035)_1px,transparent_1px)] [background-size:24px_24px]"></div>
        </div>

        <main class="mx-auto flex min-h-screen w-full max-w-7xl items-center justify-center px-4 py-6 sm:px-6 sm:py-10 lg:px-8">

            <div class="grid w-full max-w-md overflow-hidden rounded-3xl border border-white/10 bg-slate-900/80 shadow-2xl shadow-black/30 backdrop-blur-xl lg:max-w-5xl lg:grid-cols-2">

                {{-- Desktop welcome panel --}}
                <section class="relative hidden flex-col justify-between overflow-hidden bg-gradient-to-br from-blue-700 via-blue-800 to-indigo-950 p-10 lg:flex xl:p-14">

                    <div aria-hidden="true" class="absolute -right-20 top-24 h-64 w-64 rounded-full border border-white/10"></div>
                    <div aria-hidden="true" class="absolute -right-10 top-36 h-44 w-44 rounded-full border border-white/10"></div>
                    <div aria-hidden="true" class="absolute -bottom-24 -left-20 h-72 w-72 rounded-full bg-white/5 blur-2xl"></div>

                    <a href="{{ url('/') }}" class="relative inline-flex w-fit items-center gap-3 rounded-xl focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white">
                        <span class="flex h-12 w-12 items-center justify-center rounded-2xl border border-white/20 bg-white/10 shadow-lg">
                            <i data-lucide="pen-line" class="h-6 w-6"></i>
                        </span>
                        <span class="text-lg font-bold tracking-tight">My Blog</span>
                    </a>

                    <div class="relative my-12">
                        <span class="mb-5 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3 py-1.5 text-xs font-semibold tracking-wide text-blue-100">
                            <span class="h-2 w-2 rounded-full bg-emerald-300"></span>
                            YOUR SPACE TO SHARE IDEAS
                        </span>

                        <h2 class="max-w-md text-4xl font-black leading-tight tracking-tight xl:text-5xl">
                            Every great story starts with a
                            <span class="text-blue-200">single word.</span>
                        </h2>

                        <p class="mt-6 max-w-sm text-base leading-7 text-blue-100/80">
                            Sign in to manage your posts, share your ideas, and continue building your story.
                        </p>

                        <div class="mt-9 flex items-center gap-3 text-sm text-blue-100/80">
                            <span class="flex -space-x-2">
                                <span class="flex h-9 w-9 items-center justify-center rounded-full border-2 border-blue-800 bg-blue-300 text-xs font-bold text-blue-950">W</span>
                                <span class="flex h-9 w-9 items-center justify-center rounded-full border-2 border-blue-800 bg-indigo-300 text-xs font-bold text-indigo-950">R</span>
                                <span class="flex h-9 w-9 items-center justify-center rounded-full border-2 border-blue-800 bg-slate-200 text-xs font-bold text-slate-900">Y</span>
                            </span>
                            <span>A place for your next idea.</span>
                        </div>
                    </div>

                    <p class="relative text-xs text-blue-100/60">
                        Write freely. Share thoughtfully.
                    </p>
                </section>

                {{-- Login form --}}
                <section class="min-w-0 p-5 sm:p-8 md:p-10 lg:p-12 xl:p-14">

                    {{-- Mobile brand --}}
                    <div class="mb-8 flex items-center justify-center gap-3 lg:hidden">
                        <a href="{{ url('/') }}" class="flex items-center gap-3 rounded-xl focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-400">
                            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 shadow-lg shadow-blue-500/20">
                                <i data-lucide="pen-line" class="h-5 w-5"></i>
                            </span>
                            <span class="text-lg font-bold">My Blog</span>
                        </a>
                    </div>

                    <div class="mb-8">
                        <p class="mb-3 text-xs font-bold uppercase tracking-[0.2em] text-blue-400">
                            Welcome back
                        </p>

                        <h1 class="text-2xl font-black tracking-tight sm:text-3xl">
                            Sign in to your account
                        </h1>

                        <p class="mt-2 text-sm leading-6 text-slate-400">
                            Enter your details below to continue.
                        </p>
                    </div>

                    <x-auth-session-status
                        class="mb-5"
                        :status="session('status')"
                    />

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        {{-- Email --}}
                        <div>
                            <label for="email" class="mb-2 block text-sm font-semibold text-slate-200">
                                Email address
                            </label>

                            <div class="relative">
                                <i data-lucide="mail" class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-500"></i>

                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autofocus
                                    autocomplete="username"
                                    inputmode="email"
                                    placeholder="you@example.com"
                                    aria-describedby="email-error"
                                    @class([
                                        'w-full rounded-xl border bg-slate-950/60 py-3.5 pl-12 pr-4 text-base text-white placeholder:text-slate-500 transition duration-200',
                                        'border-red-500 focus:border-red-400 focus:ring-red-400/20' => $errors->has('email'),
                                        'border-slate-700 hover:border-slate-600 focus:border-blue-500 focus:ring-blue-500/20' => !$errors->has('email'),
                                        'focus:outline-none focus:ring-4',
                                    ])
                                >
                            </div>

                            <div id="email-error">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>

                        {{-- Password --}}
                        <div>
                            <div class="mb-2 flex items-center justify-between gap-3">
                                <label for="password" class="text-sm font-semibold text-slate-200">
                                    Password
                                </label>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="rounded text-xs font-semibold text-blue-400 transition hover:text-blue-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-400">
                                        Forgot password?
                                    </a>
                                @endif
                            </div>

                            <div class="relative">
                                <i data-lucide="lock-keyhole" class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-500"></i>

                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                    placeholder="Enter your password"
                                    aria-describedby="password-error"
                                    @class([
                                        'w-full rounded-xl border bg-slate-950/60 py-3.5 pl-12 pr-12 text-base text-white placeholder:text-slate-500 transition duration-200',
                                        'border-red-500 focus:border-red-400 focus:ring-red-400/20' => $errors->has('password'),
                                        'border-slate-700 hover:border-slate-600 focus:border-blue-500 focus:ring-blue-500/20' => !$errors->has('password'),
                                        'focus:outline-none focus:ring-4',
                                    ])
                                >

                                <button
                                    id="toggle-password"
                                    type="button"
                                    aria-label="Show password"
                                    aria-controls="password"
                                    aria-pressed="false"
                                    class="absolute right-2 top-1/2 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-lg text-slate-400 transition hover:bg-white/5 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-400"
                                >
                                    <i id="password-icon" data-lucide="eye" class="h-5 w-5"></i>
                                </button>
                            </div>

                            <div id="password-error">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>

                        {{-- Remember me --}}
                        <div class="flex items-center">
                            <input
                                id="remember_me"
                                type="checkbox"
                                name="remember"
                                value="1"
                                class="h-4 w-4 rounded border-slate-600 bg-slate-950 text-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-slate-900"
                            >

                            <label for="remember_me" class="ml-3 cursor-pointer select-none text-sm text-slate-400">
                                Remember me
                            </label>
                        </div>

                        {{-- Submit --}}
                        <button
                            type="submit"
                            class="group flex min-h-12 w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-4 py-3.5 font-bold text-white shadow-lg shadow-blue-950/30 transition duration-200 hover:from-blue-500 hover:to-indigo-500 hover:shadow-blue-900/40 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-blue-500/40 active:scale-[0.99]"
                        >
                            <i data-lucide="log-in" class="h-5 w-5 transition-transform duration-200 group-hover:translate-x-0.5"></i>
                            <span>Sign in</span>
                        </button>

                        <div class="flex items-center gap-4 py-1">
                            <div class="h-px flex-1 bg-slate-800"></div>
                            <span class="text-xs font-medium uppercase tracking-widest text-slate-500">or</span>
                            <div class="h-px flex-1 bg-slate-800"></div>
                        </div>

                        <p class="text-center text-sm leading-6 text-slate-400">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="ml-1 whitespace-nowrap font-bold text-blue-400 transition hover:text-blue-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-400">
                                Create account
                            </a>
                        </p>
                    </form>

                    <div class="mt-8 border-t border-slate-800 pt-5 text-center">
                        <a href="{{ url('/') }}" class="inline-flex min-h-10 items-center justify-center gap-2 rounded-lg px-3 text-sm text-slate-500 transition hover:text-slate-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-400">
                            <i data-lucide="arrow-left" class="h-4 w-4"></i>
                            Back to website
                        </a>
                    </div>
                </section>
            </div>
        </main>
    </div>

    {{-- Password visibility --}}
    <script>
        (() => {
            const button = document.getElementById('toggle-password');
            const password = document.getElementById('password');
            const icon = document.getElementById('password-icon');

            if (!button || !password || !icon) return;

            button.addEventListener('click', () => {
                const isVisible = password.type === 'password';

                password.type = isVisible ? 'text' : 'password';
                button.setAttribute('aria-label', isVisible ? 'Hide password' : 'Show password');
                button.setAttribute('aria-pressed', String(isVisible));

                icon.setAttribute('data-lucide', isVisible ? 'eye-off' : 'eye');

                if (typeof createIcons === 'function') {
                    createIcons();
                }
            });
        })();
    </script>
</x-guest-layout>
