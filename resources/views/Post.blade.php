@extends('layouts.Master')

@section('title', 'Post')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-md"> 
    <h1 class="text-4xl font-bold text-blue-600 mb-4">
        Welcome to Our {{ $page }} Page
    </h1>

@if(!isset($posts) || count($posts) === 0)
    <p class="text-gray-600">No posts available.</p>
@endif
   
<!-- showing the posts in  a card layout -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($posts as $post)
        <div class="bg-gray-100 p-4 rounded-lg shadow-md">
            <img src="{{asset('upload/'.$post->image)}}"
                 alt="{{$post->image}}"
                 class="w-full h-48 object-cover">
            <h2 class="text-2xl font-semibold text-blue-600 mb-2">{{ $post['title'] }}</h2>
            <p class="text-gray-700 mb-4">@php echo substr($post->content,0,80) @endphp...</p>
            <a href="{{route('show',['slug'=>$post->slug])}}" class="text-blue-600 hover:underline">Read More</a>
        </div>
    @endforeach
     
    {{$posts->links()}}
</div>


@endsection