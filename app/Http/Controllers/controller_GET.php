<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\table_product as product;

use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class controller_GET extends Controller
{
    public function index()
    {
        $data = product::get();
        return view('index', compact('data'));
    }

    public function login_user()
    {
        if (Auth::check()) {
            return redirect('/');
        }

        return view('login_user');
    }

    public function show_product($id)
    {

        $data = product::where('id', $id)->get();
        if (count($data) < 1) {
            Alert::error('', 'متاسفانه همچین آگهی وجود ندارد.');
            return redirect(route('index'));
        }
        return view('show_product', compact('data'));
    }

    public function owner_admin()
    {
        return view('owner_admin');
    }

    public function search_product(Request $request)
    {
        $data = product::where('description', 'LIKE', '%' . $request->get('q') . '%')->orWhere('title', 'LIKE', '%' . $request->get('q') . '%')->get();
        return view('search_product', compact('data'));
    }

    public function add_new_post()
    {
        return view('add_new_post');
    }

    public function my_order()
    {
        $phone=auth()->user()->phone;
        $data=product::where('phone',$phone)->get();
        return view('my_order',compact('data'));
    }
}
