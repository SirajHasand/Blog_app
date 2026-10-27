<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /*
     * Show the About page.
     * Passes the page title 'About' to the about view.
     */
    public function index(){
        $page = 'About';
        return view('about')->with('page',$page);
    }
}
