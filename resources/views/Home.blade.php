@extends('layouts.Master')

@section('title', 'Home')

@section('content')

<!-- ===== HERO SECTION ===== -->
<section class="relative bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-2xl overflow-hidden shadow-2xl mb-12">
    {{-- Hero Background Image --}}
    <div class="absolute inset-0 opacity-20">
        <img src="upload/cover.jpg"
             alt="Hero Background"
             class="w-full h-full object-cover">
    </div>

    <div class="relative z-10 px-8 py-16 md:py-24 md:px-16 text-center md:text-left">
        <div class="max-w-3xl">
            <span class="inline-block bg-white/20 backdrop-blur-sm text-white text-sm font-semibold px-4 py-1 rounded-full mb-4">
                 Welcome to My Blog
            </span>
            <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-4">
                {{ $page }} Page
            </h1>
            <p class="text-lg md:text-xl text-white/90 mb-6 max-w-2xl">
                Discover insightful articles, latest updates, and stories from our community.
            </p>
            <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                <a href="{{ route('post') }}"
                   class="bg-white text-blue-600 font-semibold px-8 py-3 rounded-full shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                    📖 View All Posts
                </a>
                <a href="#latest"
                   class="border-2 border-white/50 text-white font-semibold px-8 py-3 rounded-full hover:bg-white/10 transition-all duration-300">
                    Browse Topics
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ===== FEATURED POSTS ===== -->
<section id="latest" class="mb-12">
    
    
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800">🔥 Featured Posts</h2>
        <a href="{{ route('post') }}" class="text-blue-600 hover:text-blue-800 font-medium">
            View all →
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @if(!isset($posts) || count($posts) === 0)
    <p class="text-gray-600">No posts available.</p>
     @endif
       
  @foreach($posts as $post)
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <img src="{{asset('upload/'.$post->image)}}"
                 alt="{{$post->image}}"
                 class="w-full h-48 object-cover">
            <div class="p-5">
                <span class="text-xs font-semibold text-blue-600 uppercase">Category</span>
                <h3 class="text-lg font-bold text-gray-800 mt-1">{{ $post['title'] }}</h3>
                <p class="text-gray-600 text-sm mt-2">@php echo substr($post->content,0,80) @endphp...</p>
                <a href="{{route('show',['slug'=>$post->slug])}}" class="text-blue-600 font-medium text-sm mt-3 inline-block hover:underline">
                    Read More →
                </a>
            </div>
        </div>
    @endforeach 

    </div>
</section>

<!-- ===== STATS / SOCIAL PROOF (Optional) ===== -->
<section class="bg-gray-50 rounded-2xl p-8 text-center">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <div>
            <p class="text-3xl font-bold text-blue-600">500+</p>
            <p class="text-gray-600 text-sm">Articles</p>
        </div>
        <div>
            <p class="text-3xl font-bold text-blue-600">10K</p>
            <p class="text-gray-600 text-sm">Readers</p>
        </div>
        <div>
            <p class="text-3xl font-bold text-blue-600">50+</p>
            <p class="text-gray-600 text-sm">Categories</p>
        </div>
        <div>
            <p class="text-3xl font-bold text-blue-600">4.9★</p>
            <p class="text-gray-600 text-sm">Rating</p>
        </div>
    </div>
</section>

@endsection