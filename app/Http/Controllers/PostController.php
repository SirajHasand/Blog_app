<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index(){
         return view('Post')
        ->with('page',"Post")
        ->with('posts',Post::paginate(6));
        
    }
    public function show($slug)  {
        
    $post = Post::where('slug',$slug)->first();
         return view('show')
         ->with('page',"Post")
         ->with('post',$post);
    }
}
