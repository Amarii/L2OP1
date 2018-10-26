<?php

namespace App\Http\Controllers;

use App\Drawing;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class AdminController extends Controller
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
        $drawing = Drawing::orderBy('created_at','desc')->get();
        return view('admindashboard')->with('drawings', $drawing);
    }
}
