<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminController extends Controller
{
    function getLogin(){
        if(auth()->check()){
            return view('backend.home');
        }
        return view('backend.login');
    }
    function postLogin(Request $request){
        if(auth()->attempt([
            'username' => $request->username, 
            'password' => $request->password
        ])){
            return redirect()->to('admin');
        }else{
            dd($request->username);
        }
    }
    function logout(){
        auth()->logout();
        return redirect()->route('admin.home');
    }
    
}
