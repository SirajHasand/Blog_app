<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="description"
          content="My personal technology and development blog">

    <title>
        @yield('title', 'My Blog')
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>


<body class="bg-slate-900 text-slate-900
             min-h-screen flex flex-col">


{{-- ================= NAVBAR ================= --}}

<header class="sticky top-0 z-50
               bg-slate-950/95
               backdrop-blur-xl
               border-b border-white/10">

    <div class="max-w-7xl mx-auto px-5 lg:px-8">

        <div class="flex items-center
                    justify-between h-16">


            {{-- Logo --}}
            <a href="/"
               class="flex items-center gap-3 group">

                <div class="w-9 h-9
                            flex items-center justify-center
                            rounded-xl
                            bg-gradient-to-br
                            from-blue-500 to-indigo-600
                            text-white font-black
                            shadow-lg shadow-blue-500/20">

                    @if ($setting && $setting->logo)
                        <img
                            src="{{ asset('upload/' . $setting->logo) }}"
                            alt="Company Logo"
                            class=" w-auto rounded-lg h-9 object-cover"
                        >
                    @endif

                </div>

                <div>

                    <span class="text-white
                                 font-bold text-lg
                                 tracking-tight">

                        My Blog

                    </span>

                    <span class="hidden sm:block
                                 text-[10px]
                                 text-slate-500
                                 -mt-1">

                        Ideas • Code • Stories

                    </span>

                </div>

            </a>


            {{-- Desktop Navigation --}}
            <nav class="hidden md:flex
                        items-center gap-2">

                <a href="/"
                   class="px-4 py-2 rounded-lg
                          text-sm font-medium
                          transition

                          @if($page === 'Home')
                              bg-white/10 text-white
                          @else
                              text-slate-400 hover:text-white
                              hover:bg-white/5
                          @endif">

                    Home

                </a>


                <a href="{{ route('post') }}"
                   class="px-4 py-2 rounded-lg
                          text-sm font-medium
                          transition

                          @if($page === 'Post')
                              bg-white/10 text-white
                          @else
                              text-slate-400 hover:text-white
                              hover:bg-white/5
                          @endif">

                    Articles

                </a>

            </nav>


            {{-- Right Side --}}
            <div class="flex items-center gap-3">

                @guest

                    <a href="{{ route('login') }}"
                       class="hidden sm:block
                              px-4 py-2
                              text-sm font-medium
                              text-slate-300
                              hover:text-white
                              transition">

                        Login

                    </a>

                    <a href="{{ route('register') }}"
                       class="inline-flex items-center
                              px-4 py-2
                              rounded-lg
                              bg-blue-600
                              hover:bg-blue-500
                              text-white
                              text-sm font-semibold
                              transition
                              shadow-lg shadow-blue-600/20">

                        Get Started

                    </a>

                @else

                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center gap-2
                              px-4 py-2
                              rounded-lg
                              bg-white/10
                              hover:bg-white/15
                              border border-white/10
                              text-white
                              text-sm font-medium
                              transition">

                        <i data-lucide="layout-dashboard"
                           class="w-4 h-4">
                        </i>

                        Dashboard

                    </a>

                @endguest

            </div>

        </div>

    </div>

</header>



{{-- ================= MAIN ================= --}}

<main class="flex-1">

    <div class="max-w-7xl mx-auto
                px-5 lg:px-8
                py-8 md:py-12">

        @yield('content')

    </div>

</main>



{{-- ================= FOOTER ================= --}}

<footer class="bg-slate-950
               border-t border-white/10
               text-slate-400">

    <div class="max-w-7xl mx-auto
                px-5 lg:px-8
                py-12">

        <div class="grid
                    grid-cols-1
                    md:grid-cols-3
                    gap-10">


            {{-- About --}}
            <div>

                <div class="flex items-center gap-3 mb-4">

                    <div class="w-9 h-9
                                flex items-center justify-center
                                rounded-xl
                                bg-gradient-to-br
                                from-blue-500 to-indigo-600
                                text-white font-black">

                        M

                    </div>

                    <span class="text-white
                                 font-bold text-lg">

                        My Blog

                    </span>

                </div>

                <p class="text-sm leading-relaxed
                          max-w-sm">

                    A place for technology,
                    programming, development,
                    ideas and everything
                    I'm learning along the way.

                </p>

            </div>


            {{-- Navigation --}}
            <div>

                <h3 class="text-white
                           font-semibold mb-4">

                    Explore

                </h3>

                <div class="space-y-3 text-sm">

                    <a href="/"
                       class="block hover:text-white transition">

                        Home

                    </a>

                    <a href="{{ route('post') }}"
                       class="block hover:text-white transition">

                        Articles

                    </a>

                    @guest

                        <a href="{{ route('login') }}"
                           class="block hover:text-white transition">

                            Login

                        </a>

                    @else

                        <a href="{{ route('dashboard') }}"
                           class="block hover:text-white transition">

                            Dashboard

                        </a>

                    @endguest

                </div>

            </div>


            {{-- Social --}}
            <div>

                <h3 class="text-white
                           font-semibold mb-4">

                    Connect

                </h3>

                <div class="flex gap-3">

                    <a href="#"
                       class="w-10 h-10
                              flex items-center justify-center
                              rounded-lg
                              bg-white/5
                              hover:bg-blue-600
                              hover:text-white
                              transition">

                        <span 
                           class="w-5 h-5">Gh
                        </span>

                    </a>

                    <a href="#"
                       class="w-10 h-10
                              flex items-center justify-center
                              rounded-lg
                              bg-white/5
                              hover:bg-blue-600
                              hover:text-white
                              transition">

                        <span 
                           class="w-5 h-5">ln
                        </span>

                    </a>
                    <a href="#"
                       class="w-1/2
                              flex items-center justify-center
                              rounded-lg
                              bg-white/5
                              hover:bg-blue-600
                              hover:text-white
                              transition">

                        <dev 
                           class="w-5 h-5">{{$setting->phone}}
                        </dev>

                    </a>

                </div>

            </div>

        </div>


        {{-- Bottom --}}
        <div class="border-t border-white/10
                    mt-10 pt-6
                    flex flex-col sm:flex-row
                    justify-between gap-3
                    text-sm">

            <p>
                © {{ date('Y') }} My Blog.
                All rights reserved.
            </p>

            <p class="text-slate-600">
                Built with Laravel & Tailwind CSS
            </p>

        </div>

    </div>

</footer>


</body>
</html>