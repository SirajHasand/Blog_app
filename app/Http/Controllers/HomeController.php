<?php

namespace App\Http\Controllers;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(){
        $page = 'Home';
        return view('home')
        ->with('page', $page)
        ->with('posts', Post::orderBy('created_at','DESC')->paginate(3));

    }

}
    