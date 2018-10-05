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
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drawings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image:jpg,png'
        ]);
           // dd($request->all());

       // dd($_FILES);


        if($request->hasFile('image')){
          
            //get file name
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExtension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExtension;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        }
        else {
            $fileNameToStore = 'nofilename.png';
        }

        // Add Drawing
        $drawing = new Drawing;
        $drawing->name = $request->input('name');
        $drawing->description = $request->input('description');
        $drawing->price = $request->input('price');
        $drawing->image = $fileNameToStore;
        $drawing->save();

        return redirect('/drawings')->with('success', 'Drawing Added');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Drawing  $drawing
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $drawing = Drawing::find($id);
        return view('drawings.edit')->with('drawing',$drawing);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Drawing  $drawing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drawing $drawing)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
        if($request->hasFile('image')){
          
            //get file name
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExtension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExtension;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        }
        else {
            $fileNameToStore = 'nofilename.png';
        }
        // Add Drawing
        $drawing = Drawing::find($drawing->id);
        $drawing->name = $request->input('name');
        $drawing->description = $request->input('description');
        $drawing->price = $request->input('price');
        $drawing->image = $fileNameToStore;
        $drawing->save();

        return redirect('/drawings')->with('success', 'Drawing Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Drawing  $drawing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drawing $drawing)
    {
        $drawing =Drawing::find($drawing->id);
        $drawing->delete();
        return redirect('/drawings')->with('error', 'Drawing Deleted');
    }
}
