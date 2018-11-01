<?php

namespace App\Http\Controllers;

use App\Drawing;
use App\User;
use Illuminate\Http\Request;
//use App\Http\Controllers\Auth;
use Auth;

class DrawingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * Gets all drawings from database who are set active by an admin
         * returns the drawings index view with the drawings from the database
         */
        $drawing = Drawing::orderBy('created_at','desc')->get()->where('is_active', 'Active');
        return view('drawings.index')->with('drawings', $drawing);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // returns the create view from the admin/drawings folder
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
        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' =>'required',
            'image' => 'required|nullable|image:jpg,png'
        ]);

        if($request->hasFile('image')){
          
            // Getting filename if there is no file uploaded set it as nofilename.png
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExtension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExtension;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        }
        else {
            $fileNameToStore = 'nofilename.png';
        }

        // Add Drawing to the database
        $drawing = new Drawing;
        $drawing->name = $request->input('name');
        $drawing->description = $request->input('description');
        $drawing->price = $request->input('price');
        $drawing->image = $fileNameToStore;
        if($request->input('is_active')){
            $drawing->is_active = 'Active';
        }
        else{
            $drawing->is_active = 'Deactive';
        }
       
        $drawing->save();

        // redirects to the admin/drawings route with a success message
        return redirect('drawings')->with('success', 'Drawing Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /**
         * Sets a drawing variable with the data from a specific drawing
         * and returns the drawings show view with the drawing variable
         */
        $drawing = Drawing::find($id);
        return view('drawings.show')->with('drawing',$drawing);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /**
         * sets variable with all the information from the database of the specific
         * and returns the admin drawings edit view with the drawing variable
         */
        $drawing = Drawing::find($id);
        return view('drawings.edit')->with('drawing',$drawing);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drawing $drawing)
    {
        // Form Validation
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        if($request->hasFile('image')){
          
        // Getting filename if there is no file uploaded set it as nofilename.png
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExtension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExtension;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        }
        else {
            $fileNameToStore = 'nofilename.png';
        }
        // Add Drawing to the database
        $drawing = Drawing::find($drawing->id);
        $drawing->name = $request->input('name');
        $drawing->description = $request->input('description');
        $drawing->price = $request->input('price');
        if($fileNameToStore == 'nofilename.png'){}
            else{
                $drawing->image = $fileNameToStore;
            }
        
        $drawing->save();

        // redirects to the admin/drawings route with a success message
        return redirect('/drawings')->with('success', 'Drawing Updated');
    }

    public function isActive($id)
    {
        /**
         * gets the specific drawing from the database and checks if the drawing is active or not 
         * redirects to admin/drawings with success message
         */
        $drawing = Drawing::find($id);

        if($drawing->is_active == 'Deactive'){
            $drawing->is_active = 'Active';
            $drawing->save();
        }
        else{
            $drawing->is_active = 'Deactive';
            $drawing->save();
        }
        return redirect('/admin')->with('success', 'Drawing Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /**
         * gets the specific drawing and removes it from the database
         * redirects to /drawings with error message
         */
        $drawing = Drawing::find($id);
        $drawing->delete();
        return redirect('/drawings')->with('error', 'Drawing Deleted');
    }

    public function search(Request $request)
    {
        $search = $request->input('name');
        $filter = $request->input('price');


        if($search != ''){
            $drawings = Drawing::where('name', 'LIKE', '%' .$search. '%')->orWhere('price', $search)->where('is_active', 'Active')->get();
        }
       else{
           $drawings = [];
       }
     
       return view('drawings.index')->with('drawings', $drawings);


    }

    public function filter(Request $request)
    {  
            $filter = $request->input('filter');
            $drawings = Drawing::where('price', '<=', $filter)->where('is_active', 'Active')->get();

            return view('drawings.index')->with('drawings', $drawings);
    }

    /**
     * Favorite a particular drawing
     */

    public function favoriteDrawing(Drawing $drawing)
    {
        Auth::user()->favorites()->attach($drawing->id);

        return back();
    }

    /**
     * Unfavorite a particular drawing
     */

    public function unFavoriteDrawing(Drawing $drawing)
    {
        Auth::user()->favorites()->detach($drawing->id);

        return back();
    }

}
