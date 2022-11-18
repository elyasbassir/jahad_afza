<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< Updated upstream
use App\Models\table_product as product;
=======
use Illuminate\Support\Facades\Auth;
>>>>>>> Stashed changes

class controller_GET extends Controller
{
public function index(){
    $data=product::get();
   return view('index',compact('data'));
}
public function login_user(){
    if (Auth::check()){
        return redirect('/');
    }

    return view('login_user');
}
public function show_product(){
    return view('show_product');
}
public function owner_admin(){
    return view('owner_admin');
}
public function search_product(Request $request){
    $data=product::where('description','LIKE','%'.$request->get('q').'%')->orWhere('title','LIKE','%'.$request->get('q').'%')->get();
    return view('search_product',compact('data'));
}

}
