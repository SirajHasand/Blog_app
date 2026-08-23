@extends('layouts.Master')

@section('content')

<div class="bg-slate-900 p-4 rounded-lg shadow-md flex gap-6">
    <div class="w-1/4">
            <img src="{{asset('upload/'.$post->image)}}"
                 alt="{{$post->image}}"
                 class=" object-cover">
    </div>
    <div class="w-3/4">
            <h2 class="text-2xl font-semibold text-blue-600  mb-2">{{ $post['title'] }}</h2>
            <p class="text-gray-700 mb-4">{{ $post['content'] }}</p>
    </div>
    
    
</div>
            <a href="{{route('post')}}" class="text-blue-600 hover:underline float-end bg-blue-300 p-3 rounded-md mt-2">show all posts</a>

@endsection

