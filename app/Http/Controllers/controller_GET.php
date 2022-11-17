<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controller_GET extends Controller
{
public function index(){
   return view('index');
}
public function login_user(){
    return view('login_user');
}


}
