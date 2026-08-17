
    @extends('layouts.Master')

@section('title', 'Edit Post')
@section('content')
<div class="bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-4xl font-bold text-blue-600 mb-4">
        Edit Post
    </h1>

    <form action="{{ route('admin.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">
                Title
            </label>
            <input type="text" name="title" id="title" value="{{ $post->title }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('title')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
        </div>
        <div class="mb-4">
            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">
                Image
            </label>
            <input type="file" name="image"  class="cursor-pointer shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('image') 
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
        </div>
        <div class="mb-4">
            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">
                Content
            </label>
            <textarea name="content" id="content" value="{{ $post->content }}"   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $post->content }}</textarea>
        @error('content')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Edit  Post
            </button>
        </div>
    </form>
</div>
@endsection