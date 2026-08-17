
@extends('layouts.Master')

@section('title', 'Admin')
@section('content')
<div class="bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-4xl font-bold text-blue-600 mb-4">
         {{ $page }} Page
    </h1>
     <!-- // showing success message for 3 seconds -->
                @if(session('success'))
                    <div class= text-green-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Success! </strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

    <!-- table for showing posts -->
    <div class="overflow-x-auto">
        <div class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <!-- create new post button -->
            <div class="flex  justify-end p-4">
                <a href="{{ route('admin.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Create Post
                </a>
               
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr class="text-left text-gray-600 uppercase text-sm font-semibold">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Content</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($posts as $post)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $post->id }}</td>
                            <td class="px-4 py-2">{{ $post->title }}</td>
                            <td class="px-4 py-2">@php echo substr($post->content,0,80) @endphp...</td>
                            <td class="px-4 py-2 flex space-x-2">
                               <a href="{{route('admin.edit', $post->id)}}" class="text-blue-600 hover:text-blue-800" ><i data-lucide="pencil"></i></a>
                                <a href="{{route('delete', $post->id)}}" class="text-red-600 hover:text-red-800"><i data-lucide="trash-2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection