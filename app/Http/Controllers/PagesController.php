<?php

namespace App\Http\Controllers;

use App\Drawing;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class PagesController extends Controller
{
    public function index(){
        $title = "Welcome to my Website";
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        return view('pages.about');
    }

    public function drawings(){
        $drawing = Drawing::orderBy('created_at','desc')->get();
        return view('drawings.index')->with('drawings', $drawing);
    }
}
