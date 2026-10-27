<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
   /*
    * Show the post listing page.
    * Fetches posts ordered by newest first (DESC), paginated to 6 per page.
    */
   public function index(){
         return view('Post')
        ->with('page',"Post")
        ->with('posts',Post::orderBy('created_at','DESC')->paginate(6));
        
    }
    /*
     * Show a single post by its slug.
     * Looks up the post where the slug column matches the $slug parameter.
     */
    public function show($slug)  {
        
    $post = Post::where('slug',$slug)->first();
         // Render the single post view with the found post data
         return view('show')
         ->with('page',"Post")
         ->with('post',$post);
    }
    /*
     * Show the trash page with soft-deleted posts.
     * Post::onlyTrashed() returns only records that have been soft-deleted
     * (deleted_at is not null). Paginated to 10 per page.
     */
    public function trash(){
        return view('trash')
                    ->with('page',"Trush")
                    ->with('posts',Post::onlyTrashed()->paginate(10));
    }
    /*
     * Permanently delete a post by ID (force delete).
     * withTrashed() includes soft-deleted records in the query so we can
     * find the post even though it is already in the trash, then forceDelete()
     * removes it from the database permanently.
     */
    public function delete($id){
            $post = Post::withTrashed()->where('id',$id)->first();
            $post ->forceDelete();
            return redirect()->route('dashboard')->with('success', 'Post permenetly deleted successfully.');

    }
    /*
     * Restore a soft-deleted post by ID.
     * withTrashed() finds the soft-deleted post, then restore() sets
     * deleted_at back to null so the post becomes visible again.
     */
    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first();
            $post ->restore();
            return redirect()->route('dashboard')->with('success', 'Post Restored successfully.');

        
    }
}
