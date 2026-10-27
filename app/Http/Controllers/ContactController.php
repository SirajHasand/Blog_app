<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /*
     * Show the Contact page.
     * Passes the page title 'Contact' to the contact view.
     */
    public function index(){
        $page = 'Contact';
        // Render the contact view with page title
        return view('contact')->with('page',$page);
    }
}
