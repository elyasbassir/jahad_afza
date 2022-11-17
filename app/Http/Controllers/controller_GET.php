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
public function show_product(){
    return view('show_product');
}
public function owner_admin(){
    return view('owner_admin');
}

}
