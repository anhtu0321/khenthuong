<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminController extends Controller
{
    function getHome(){
        return view('backend.home');
    }
    
    function getCategory(){
        return view('backend.admin.category.list');
    }
}
