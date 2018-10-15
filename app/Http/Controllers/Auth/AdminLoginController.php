<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:admin');
    }
    public function showLoginForm(){
        return view('auth.admin-login');
    }

    public function login(Request $request){

        //form validation
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
        ]);
      
        //try to login
        if(Auth::guard('admin')->attempt(['name' => $request->name, 'password' => $request->password], $request->remember)){
            //if successful
            return redirect('admin')->with('success', 'Your are Logged in');
        };

        return redirect()->back()->withInput($request->only('name','password'));
    }
}
