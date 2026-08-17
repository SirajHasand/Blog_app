<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $page = 'Contact';
        return view('contact')->with('page',$page);
    }
}
