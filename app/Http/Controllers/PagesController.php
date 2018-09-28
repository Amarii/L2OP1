<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $drawings = array(
            'title' => 'Drawings',
            'drawings' => ['drawing1','drawing2','drawing3']
        );
        return view('pages.drawings')->with($drawings);
    }
}
