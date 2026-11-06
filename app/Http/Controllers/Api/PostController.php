<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

// this controller is responsible for handling API requests related to the Post resource. It provides methods for listing, creating, showing, updating, and deleting posts. The controller uses the Post model to interact with the database and the PostResource to format the response data for API consumers.
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::all();
        return PostResource::collection($post );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {
        
        $user = Auth::user();
        $profileId = $user && $user->profile ? $user->profile->id : null;

        $post =   Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            // 'image'=> $image_new_name,
            'slug' => Str::slug($request->title),
            'profile_id' => 1
        ]);        
        // Return the newly created post as a resource
        return PostResource::make($post);
        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        if(!$post){
            return response()->json(['message'=>'Post not found'],404);
        }
        return new PostResource($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        if(!$post){
            return response()->json(['message'=>'Post not found'],404);
        }
        $post->update($request->all());
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     * this controller is fo post
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if(!$post){
            return response()->json(['message'=>'Post not found'],404);
        }
        $post->delete();
        return response()->json(['message'=>'Post deleted successfully']);
    }
}
