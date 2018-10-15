<?php

namespace App\Http\Controllers;

    use App\Drawing;
    use App\User;
    use Illuminate\Http\Request;
use App\Http\Controllers\Auth;


class DrawingController extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drawing = Drawing::orderBy('created_at','desc')->get();
        return view('drawings.index')->with('drawings', $drawing);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Drawing  $drawing
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $drawing = Drawing::find($id);
      
       
        return view('drawings.show')->with('drawing',$drawing);
    }
    public function create()
    {
        return redirect('drawings');
    }

}