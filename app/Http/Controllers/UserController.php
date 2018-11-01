<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    public function myFavorites()
{
    $myFavorites = Auth::user()->favorites;

    return view('pages.my_favorites', compact('myFavorites'));
}

    public function myInfo()
    {
        $myInfo = Auth::user();
        return view('pages.my_info', compact('myInfo'));
    }

    public function editMyInfo()
    {
        
    }
}
