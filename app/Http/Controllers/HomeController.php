<?php

namespace App\Http\Controllers;
use App\Models\Post;

class HomeController extends Controller
{
    /*
     * Show the homepage.
     * Passes the page title and the latest posts (newest first, paginated to 3)
     * to the home view.
     */
    public function index(){
        $page = 'Home';
        // Render the home view with page title and paginated posts
        return view('home')
        ->with('page', $page)
        ->with('posts', Post::orderBy('created_at','DESC')->paginate(3));

    }

}
    