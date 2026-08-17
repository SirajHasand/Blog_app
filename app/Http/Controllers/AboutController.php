<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $page = 'About';
        return view('about')->with('page',$page);
    }
}
