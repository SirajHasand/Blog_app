<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index(){
         return view('Post')
        ->with('page',"Post")
        ->with('posts',Post::orderBy('created_at','DESC')->paginate(6));
        
    }
    public function show($slug)  {
        
    $post = Post::where('slug',$slug)->first();
         return view('show')
         ->with('page',"Post")
         ->with('post',$post);
    }
    public function trash(){
        return view('trash')
                    ->with('page',"Trush")
                    ->with('posts',Post::onlyTrashed()->paginate(10));
    }
    public function delete($id){
            $post = Post::withTrashed()->where('id',$id)->first();
            $post ->forceDelete();
            return redirect()->route('dashboard')->with('success', 'Post permenetly deleted successfully.');

    }
    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first();
            $post ->restore();
            return redirect()->route('dashboard')->with('success', 'Post Restored successfully.');

        
    }
} 
