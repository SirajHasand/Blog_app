<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Faker\Core\File;
use Illuminate\Http\Request;
use Str;
use function Laravel\Prompts\title;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.index')
        ->with('page',"Admin")
        ->with('posts',Post::all());
    }

    /***  Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.create')
        ->with('page',"Create Post");
    }

    /** Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255|unique:posts,title|',
            'content' => 'required|string|max:5000',
            'image' => 'required|image'
        ],
        [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'title.unique' => 'The title has already been taken.',
            'content.required' => 'The content field is required.',
            'content.string' => 'The content must be a string.',
            'content.max' => 'The content may not be greater than 5000 characters.',
        ]);
        $image_new_name = '';
        if($request->has('image')){
            $image = $request->image;
            $image_new_name = time(). $image->getClientOriginalName();
            $image->move('upload',$image_new_name);
        }

        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image'=> $image_new_name,
            'slug' => Str::slug($request->title)
        ]);
        return redirect()->route('admin.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $admin)
    {
        return view('Admin.edit')
        ->with('page',"Edit Post")
        ->with('post',$admin);
        
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $admin)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:posts,title,' . $admin->id,
            'content' => 'required|string|max:5000',
        ],
        [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'title.unique' => 'The title has already been taken.',
            'content.required' => 'The content field is required.',
            'content.string' => 'The content must be a string.',
            'content.max' => 'The content may not be greater than 5000 characters.',
        ]);
        if($request->has('image')){

            unlink('upload/'.$admin->image);
            $image = $request->image;
            $image_new_name = time(). $image->getClientOriginalName();
            $image->move('upload',$image_new_name);
            $admin->image = $image_new_name;
            $admin->save();

        }

        $admin->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
           'slug'=> Str::slug($request->title)
        ]);


        return redirect()->route('admin.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $admin)
    {
        unlink('upload/'.$admin->image);
        $admin->delete();

        return redirect()->route('admin.index')->with('success', 'Post deleted successfully.');
    }
}
