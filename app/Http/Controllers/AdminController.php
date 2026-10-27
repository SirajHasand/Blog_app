<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use function Laravel\Prompts\title;

class AdminController extends Controller
{
    /*
     * Show the admin dashboard.
     * Loads the dashboard view and passes the currently authenticated user's posts
     * (User::find(Auth::user()->id)->posts).
     */
    public function index()
    {
        return view('dashboard')
        ->with('page',"Admin")
        ->with('posts',User::find(Auth::user()->id)->posts);
    }
    /*
     * Show the form for creating a new post.
     */
    public function create()
    {
        return view('Admin.Create')
        ->with('page',"Create Post");
    }

    /*
     * Store a newly created post.
     * Validates title, content and image, moves the uploaded image to the
     * upload folder with a unique name, generates a slug from the title,
     * and links the post to the authenticated user's profile.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255|unique:posts,title|',
            'content' => 'required|string|max:5000',
            'image' => 'required|image',
            
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
            'slug' => Str::slug($request->title),
            'profile_id' => Auth::user()->profile->id
        ]);
        return redirect()->route('dashboard')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /*
     * Show the form for editing a post.
     * Route model binding injects the Post instance ($admin).
     */
    public function edit(Post $admin)
    {
        return view('Admin.edit')
        ->with('page',"Edit Post")
        ->with('post',$admin);
        
    }


    /*
     * Update the specified post in storage.
     * Validates title and content (unique title excludes the current post id).
     * If a new image is uploaded, the old image file is unlinked from disk and
     * replaced; then the post title, content and slug are updated.
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


        return redirect()->route('dashboard')->with('success', 'Post updated successfully.');
    }

    /*
     * Remove the specified post from storage.
     * Deletes the post's image file from disk if it exists, then soft-deletes
     * the post record and redirects back to the dashboard.
     */
    public function destroy(Post $admin)
{
    if ($admin->image) {
        $imagePath = 'upload/' . $admin->image;

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    $admin->delete();

    return redirect()->route('dashboard')
        ->with('success', 'Post deleted successfully.');
}
}
