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
        return view('contact')->with('page',$page);
    }
}
