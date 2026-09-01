@extends('layouts.Master')

@section('title', 'Home')

@section('content')

{{-- ================= HERO ================= --}}
<section class="relative overflow-hidden rounded-3xl bg-slate-950 shadow-2xl mb-16">

    {{-- Background --}}
    <div class="absolute inset-0">
        <img
            src="{{ asset('upload/bg.jpg')}}"
            alt="Blog Cover"
            class="w-full h-full object-cover opacity-30"
        >
        <div class="absolute inset-0 bg-gradient-to-br from-slate-950 via-slate-950/90 to-blue-950/80"></div>
    </div>

    {{-- Decorative circles --}}
    <div class="absolute -top-24 -right-24 w-72 h-72 bg-blue-500/20 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-32 -left-20 w-80 h-80 bg-indigo-500/20 rounded-full blur-3xl"></div>

    <div class="relative z-10 px-6 py-20 md:px-16 md:py-28">

        <div class="max-w-3xl">

            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full
                        bg-white/10 border border-white/10 backdrop-blur-md
                        text-blue-300 text-sm font-medium mb-6">

                <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>

                Welcome to My Blog
            </div>

            {{-- Heading --}}
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black
                       tracking-tight text-white leading-tight mb-6">

                Ideas worth
                <span class="text-transparent bg-clip-text bg-gradient-to-r
                             from-blue-400 to-indigo-400">
                    reading.
                </span>

            </h1>

            <p class="text-lg md:text-xl text-slate-300 leading-relaxed
                      max-w-2xl mb-8">

                Discover articles, programming tutorials, technology insights,
                development stories and ideas from my journey as a developer.

            </p>

            {{-- Buttons --}}
            <div class="flex flex-wrap gap-4">

                <a href="{{ route('post') }}"
                   class="inline-flex items-center gap-2
                          bg-blue-600 hover:bg-blue-500
                          text-white font-semibold
                          px-6 py-3.5 rounded-xl
                          shadow-lg shadow-blue-600/20
                          transition-all duration-300
                          hover:-translate-y-1">

                    <i data-lucide="book-open" class="w-5 h-5"></i>

                    Explore Articles
                </a>

                <a href="#latest"
                   class="inline-flex items-center gap-2
                          bg-white/10 hover:bg-white/15
                          border border-white/10
                          text-white font-semibold
                          px-6 py-3.5 rounded-xl
                          backdrop-blur-md
                          transition-all duration-300">

                    Latest Posts

                    <i data-lucide="arrow-down" class="w-4 h-4"></i>

                </a>

            </div>

        </div>

    </div>
</section>


{{-- ================= FEATURED POSTS ================= --}}
<section id="latest" class="mb-16">

    {{-- Section Header --}}
    <div class="flex flex-col sm:flex-row sm:items-end
                justify-between gap-4 mb-8">

        <div>

            <div class="flex items-center gap-2 mb-2">

                <span class="w-8 h-[2px] bg-blue-600"></span>

                <span class="text-sm font-semibold text-blue-600 uppercase tracking-wider">
                    Latest
                </span>

            </div>

            <h2 class="text-3xl md:text-4xl font-black text-slate-900">
                Featured Articles
            </h2>

            <p class="text-slate-500 mt-2">
                Explore my latest thoughts, tutorials and stories.
            </p>

        </div>

        <a href="{{ route('post') }}"
           class="inline-flex items-center gap-2
                  text-blue-600 font-semibold
                  hover:text-blue-700 transition">

            View all

            <i data-lucide="arrow-right" class="w-4 h-4"></i>

        </a>

    </div>


    {{-- Posts --}}
    @if(!isset($posts) || count($posts) === 0)

        <div class="bg-gradient-to-br from-slate-800 to-slate-600 border border-slate-200 rounded-2xl
                    p-12 text-center">

            <div class="w-14 h-14 mx-auto mb-4
                        flex items-center justify-center
                        rounded-full bg-slate-100">

                <i data-lucide="file-text"
                   class="w-7 h-7 text-slate-400"></i>

            </div>

            <h3 class="text-lg font-bold text-slate-800">
                No posts yet
            </h3>

            <p class="text-slate-600 mt-1">
                Check back soon for new articles.
            </p>

        </div>

    @else

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">

            @foreach($posts as $post)

                <article
                    class="group bg-gradient-to-br from-slate-800 to-slate-600 rounded-2xl overflow-hidden
                           border border-slate-200
                           shadow-sm hover:shadow-2xl
                           hover:-translate-y-1
                           transition-all duration-300">

                    {{-- Image --}}
                    <div class="relative h-56 overflow-hidden">

                        <img
                            src="{{ asset('upload/'.$post->image) }}"
                            alt="{{ $post->title }}"
                            class="w-full h-full object-cover
                                   group-hover:scale-105
                                   transition-transform duration-500"
                        >

                        {{-- Gradient --}}
                        <div class="absolute inset-0
                                    bg-gradient-to-t
                                    from-black/50
                                    to-transparent">
                        </div>

                        {{-- Category --}}
                        <span class="absolute top-4 left-4
                                     px-3 py-1.5
                                     rounded-full
                                     bg-white/90 backdrop-blur
                                     text-xs font-bold
                                     text-blue-600">

                            Technology

                        </span>

                    </div>


                    {{-- Content --}}
                    <div class="p-6">

                        {{-- Meta --}}
                        <div class="flex items-center gap-4
                                    text-xs text-slate-400 mb-3">

                            <span class="flex items-center gap-1">

                                <i data-lucide="calendar"
                                   class="w-3.5 h-3.5"></i>

                                {{ $post->created_at?->format('M d, Y') }}

                            </span>

                            <span class="flex items-center gap-1">

                                <i data-lucide="clock"
                                   class="w-3.5 h-3.5"></i>

                                5 min read

                            </span>

                        </div>


                        {{-- Title --}}
                        <h3 class="text-xl font-bold
                                   text-slate-200
                                   leading-snug
                                   group-hover:text-blue-600
                                   transition-colors">

                            {{ $post->title }}

                        </h3>


                        {{-- Description --}}
                        <p class="text-slate-400 text-sm
                                  leading-relaxed mt-3">

                            {{ Str::limit($post->content, 110) }}

                        </p>


                        {{-- Read More --}}
                        <a href="{{ route('show', ['slug' => $post->slug]) }}"
                           class="inline-flex items-center gap-2
                                  mt-5
                                  text-sm font-bold
                                  text-blue-600
                                  hover:text-blue-700">

                            Read article

                            <i data-lucide="arrow-up-right"
                               class="w-4 h-4
                                      group-hover:translate-x-1
                                      group-hover:-translate-y-1
                                      transition-transform">
                            </i>

                        </a>

                    </div>

                </article>

            @endforeach

        </div>

    @endif

</section>


{{-- ================= CTA ================= --}}
<section class="relative overflow-hidden rounded-3xl
                bg-gradient-to-br from-blue-300 to-indigo-900
                px-6 py-14 md:px-12
                text-center text-white mb-12">

    <div class="absolute -top-20 -right-20
                w-64 h-64 rounded-full
                bg-white/10 blur-3xl">
    </div>

    <div class="relative">

        <div class="w-14 h-14 mx-auto mb-5
                    flex items-center justify-center
                    rounded-2xl bg-white/10">

            <i data-lucide="pen-line"
               class="w-7 h-7">
            </i>

        </div>

        <h2 class="text-3xl md:text-4xl font-black mb-4">
            Keep learning. Keep building.
        </h2>

        <p class="text-blue-100 max-w-xl mx-auto mb-7">
            Explore more articles and follow along as I share
            my development journey, projects and lessons learned.
        </p>

        <a href="{{ route('post') }}"
           class="inline-flex items-center gap-2
                  bg-white text-blue-700
                  font-bold px-6 py-3
                  rounded-xl
                  hover:bg-blue-50
                  transition">

            Browse Articles

            <i data-lucide="arrow-right"
               class="w-5 h-5">
            </i>

        </a>

    </div>

</section>

@endsection