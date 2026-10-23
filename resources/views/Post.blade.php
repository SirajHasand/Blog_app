@extends('layouts.Master')

@section('title', 'Articles')

@section('content')

{{-- =========================================================
     PAGE HEADER
========================================================= --}}
<section class="relative overflow-hidden rounded-3xl
                bg-slate-950
                px-6 py-14 md:px-12 md:py-20
                mb-12">

    {{-- Background --}}
    <div class="absolute inset-0
                bg-gradient-to-br
                from-blue-950
                via-slate-950
                to-indigo-950">
    </div>

    {{-- Decorative circles --}}
    <div class="absolute -top-32 -right-20
                w-96 h-96
                rounded-full
                bg-blue-600/20
                blur-3xl">
    </div>

    <div class="absolute -bottom-40 -left-20
                w-96 h-96
                rounded-full
                bg-indigo-600/20
                blur-3xl">
    </div>


    <div class="relative z-10 max-w-3xl">

        {{-- Badge --}}
        <div class="inline-flex items-center gap-2
                    px-4 py-2
                    rounded-full
                    bg-white/10
                    border border-white/10
                    backdrop-blur-md
                    text-blue-300
                    text-sm font-medium
                    mb-5">

            <i data-lucide="rss" class="w-4 h-4"></i>

            My Blog Feed

        </div>


        {{-- Heading --}}
        <h1 class="text-4xl md:text-6xl
                   font-black
                   text-white
                   tracking-tight
                   mb-5">

            Discover
            <span class="text-transparent
                         bg-clip-text
                         bg-gradient-to-r
                         from-blue-400
                         to-indigo-400">

                Stories

            </span>

        </h1>


        <p class="text-lg
                  text-slate-300
                  leading-relaxed
                  max-w-2xl">

            Explore programming tutorials, technology,
            development ideas and stories from my journey.

        </p>

    </div>

</section>



{{-- =========================================================
     FEED HEADER
========================================================= --}}
<section class="max-w-2xl mx-auto">

    <div class="flex items-center justify-between mb-6">

        <div>

            <h2 class="text-2xl
                       font-black
                       text-slate-900">

                Latest Posts

            </h2>

            <p class="text-sm text-slate-500 mt-1">

                Fresh articles and ideas

            </p>

        </div>


        @if(isset($posts))

            <span class="hidden sm:block
                         text-sm
                         text-slate-500">

                {{ $posts->total() }}

                {{ Str::plural('post', $posts->total()) }}

            </span>

        @endif

    </div>



{{-- =========================================================
     NO POSTS
========================================================= --}}
@if(!isset($posts) || $posts->count() === 0)

    <div class="bg-white
                border border-slate-200
                rounded-3xl
                p-12
                text-center
                shadow-sm">

        <div class="w-16 h-16
                    mx-auto mb-5
                    flex items-center justify-center
                    rounded-2xl
                    bg-slate-100">

            <i data-lucide="file-text"
               class="w-8 h-8 text-slate-400">
            </i>

        </div>

        <h3 class="text-xl
                   font-bold
                   text-slate-800">

            No posts yet

        </h3>

        <p class="text-slate-500 mt-2">

            Check back later for new articles.

        </p>

    </div>


@else


{{-- =========================================================
     SOCIAL FEED
========================================================= --}}
<div class="space-y-8">


@foreach($posts as $post)

<article
    class="bg-slate-900
           rounded-3xl
           overflow-hidden
           border border-slate-700
           shadow-xl
           hover:shadow-2xl
           transition-all
           duration-300">


    {{-- =====================================================
         POST HEADER
    ====================================================== --}}
    <div class="flex items-center
                justify-between
                px-5 py-4">

        <div class="flex items-center gap-3">

            {{-- Avatar --}}
            <div class="w-11 h-11
                        rounded-full
                        flex items-center justify-center
                        bg-gradient-to-br
                        from-blue-500
                        to-indigo-600
                        text-white
                        font-bold
                        text-lg
                        shadow-lg">

                {{ strtoupper(substr('Admin', 0, 1)) }}

            </div>


            <div>

                <h3 class="text-sm
                           font-bold
                           text-white">

                    
                    <div>{{$post->profile->user->name}}</div>

                </h3>

                <div class="flex items-center gap-2
                            text-xs
                            text-slate-400">

                    <span>
                        {{ $post->created_at?->diffForHumans() }}
                    </span>

                    <span>•</span>

                    <span class="flex items-center gap-1">

                        <i data-lucide="globe"
                           class="w-3 h-3">
                        </i>

                        Public

                    </span>

                </div>

            </div>

        </div>


        {{-- More button --}}
        <button
            class="w-9 h-9
                   rounded-full
                   flex items-center justify-center
                   text-slate-400
                   hover:bg-slate-800
                   hover:text-white
                   transition">

            <i data-lucide="more-horizontal"
               class="w-5 h-5">
            </i>

        </button>

    </div>



    {{-- =====================================================
         POST TITLE
    ====================================================== --}}
    <div class="px-5 pb-4">

        <h2 class="text-xl
                   md:text-2xl
                   font-bold
                   text-white
                   leading-snug">

            {{ $post->title }}

        </h2>

    </div>



    {{-- =====================================================
         POST IMAGE
    ====================================================== --}}
    <div class="relative
                bg-black
                overflow-hidden">

        <img
            src="{{ asset('upload/'.$post->image) }}"
            alt="{{ $post->title }}"
            class="w-full
                   max-h-[650px]
                   object-cover
                   hover:scale-[1.01]
                   transition-transform
                   duration-500"
        >

    </div>



    {{-- =====================================================
         POST ACTIONS
         Ready for future Like / Comment / Share
    ====================================================== --}}
    <div class="px-5 pt-4">

        {{-- Action buttons --}}
        <div class="flex items-center justify-between">

            <div class="flex items-center gap-2">


                {{-- LIKE --}}
                <button
                    type="button"
                    class="group flex items-center gap-2
                           px-3 py-2
                           rounded-full
                           text-slate-300
                           hover:bg-red-500/10
                           hover:text-red-400
                           transition">

                    <i data-lucide="heart"
                       class="w-5 h-5
                              group-hover:fill-current">
                    </i>

                    <span class="text-sm font-medium">
                        0
                    </span>

                </button>



                {{-- COMMENT --}}
                <button
                    type="button"
                    class="flex items-center gap-2
                           px-3 py-2
                           rounded-full
                           text-slate-300
                           hover:bg-blue-500/10
                           hover:text-blue-400
                           transition">

                    <i data-lucide="message-circle"
                       class="w-5 h-5">
                    </i>

                    <span class="text-sm font-medium">
                        0
                    </span>

                </button>



                {{-- SHARE --}}
                <button
                    type="button"
                    class="flex items-center gap-2
                           px-3 py-2
                           rounded-full
                           text-slate-300
                           hover:bg-green-500/10
                           hover:text-green-400
                           transition">

                    <i data-lucide="send"
                       class="w-5 h-5">
                    </i>

                    <span class="hidden sm:inline text-sm font-medium">
                        Share
                    </span>

                </button>

            </div>



            {{-- SAVE --}}
            <button
                type="button"
                class="w-10 h-10
                       flex items-center justify-center
                       rounded-full
                       text-slate-300
                       hover:bg-slate-800
                       hover:text-white
                       transition">

                <i data-lucide="bookmark"
                   class="w-5 h-5">
                </i>

            </button>

        </div>


        {{-- =================================================
             LIKES
        ================================================== --}}
        <p class="text-sm
                  font-semibold
                  text-white
                  mt-3">

            0 likes

        </p>


        {{-- =================================================
             CONTENT
        ================================================== --}}
        <div class="mt-3">

            <p class="text-sm
                      text-slate-300
                      leading-relaxed">

                {{ Str::limit($post->content, 180) }}

            </p>


            {{-- Read article --}}
            <a
                href="{{ route('show', ['slug' => $post->slug]) }}"
                class="inline-flex
                       items-center
                       gap-2
                       mt-3
                       text-sm
                       font-bold
                       text-blue-400
                       hover:text-blue-300">

                Read full article

                <i data-lucide="arrow-right"
                   class="w-4 h-4">
                </i>

            </a>

        </div>


        {{-- =================================================
             COMMENTS PREVIEW
        ================================================== --}}
        <div class="mt-5
                    pt-4
                    border-t
                    border-slate-700">

            <button
                class="text-sm
                       text-slate-400
                       hover:text-blue-400
                       transition">

                View all comments...

            </button>

        </div>

    </div>


    {{-- =====================================================
         FUTURE COMMENT BOX
    ====================================================== --}}
    <div class="px-5 py-4
                border-t
                border-slate-800">

        <div class="flex items-center gap-3">

            <div class="w-8 h-8
                        rounded-full
                        bg-gradient-to-br
                        from-blue-500
                        to-indigo-600
                        flex items-center justify-center
                        text-xs
                        text-white
                        font-bold">

                U

            </div>


            <div class="flex-1">

                <input
                    type="text"
                    placeholder="Write a comment..."
                    disabled
                    class="w-full
                           bg-slate-800
                           border-none
                           rounded-full
                           px-4 py-2
                           text-sm
                           text-slate-300
                           placeholder-slate-500
                           focus:ring-2
                           focus:ring-blue-500"
                >

            </div>

        </div>

    </div>

</article>

@endforeach

</div>



{{-- =========================================================
     PAGINATION
========================================================= --}}
<div class="mt-10 flex justify-center">

    {{ $posts->links() }}

</div>

@endif

</section>

@endsection