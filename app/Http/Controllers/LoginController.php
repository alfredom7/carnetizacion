<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{

    //protected $username = 'username';

    public function index(){
    		return view('login');
    	}

    public function authenticate(Request $request)
    {
       // return $request->all();

        if (Auth::attempt(['username' => $request->input('user'), 'password' => $request->input('password')])) {

            return redirect()->intended('/');

        }else{

            \Session::flash('message', "Error a iniciar sesion");

            return redirect('login'); 
        }
    }

    public function salir(){
        Auth::logout();
        return redirect('login');
    }
}
