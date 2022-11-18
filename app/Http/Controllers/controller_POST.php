<?php

namespace App\Http\Controllers;

use App\Enums\UserLevelEnum;
use App\Models\table_product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class controller_POST extends Controller
{
    public function signIn(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'phone' => ['required', 'regex:/^09[0-9]{9}$/'],
            'password' => ['required'],
        ]);

        if ($validation->fails()) {
            Alert::error('', $validation->getMessageBag()->first());
            return back();
        }

        $user = DB::table('users')
            ->where('phone', $request->post('phone'))
            ->exists();

        if (!$user) {
            Alert::error('', 'شما ثبت نام نکرده اید لطفا از قسمت ثبت نام اقدام به ثبت نام کنید');
            return back();
        }

        $user = DB::table('users')
            ->where('phone', $request->post('phone'))
            ->where('password', hash('sha256', $request->post('password')))
            ->first();

        if (!$user) {
            Alert::error('', 'اطلاعات وارد شده صحیح نمیباشد');
            return back();
        }

        Auth::loginUsingId($user->id);

        Alert::success('', 'ورود شما با موفقیت انجام شد');
        return redirect('/');
    }

    public function signUp(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'full_name' => ['required', 'max:50'],
            'phone' => ['required', 'regex:/^09[0-9]{9}$/'],
            'password' => ['required', 'min:6'],
        ]);

        if ($validation->fails()) {
            Alert::error('', $validation->getMessageBag()->first());
            return back();
        }

        $user = DB::table('users')
            ->where('phone', $request->post('phone'))
            ->exists();

        if ($user) {
            Alert::error('', 'شما قبلا با این شماره ثبت نام کرده اید لطفا از قسمت ورود وارد برنامه شوید');
            return back();
        }

        $user = DB::table('users')
            ->insertGetId([
                'full_name' => $request->post('full_name'),
                'phone' => $request->post('phone'),
                'password' => hash('sha256', $request->post('password')),
                'level' => UserLevelEnum::user->value,
            ]);

        Auth::loginUsingId($user);

        Alert::success('', 'ثبت نام شما با موفقیت انجام شد');
        return redirect('/');
    }

    public function post_add_new_post(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required|min:5|max:100',
            'my_image' => 'mimes:jpeg,jpg,png,gif|required|max:1000',
            'description' => 'required|min:10|max:4000'
        ]);

        if ($validation->fails()) {
            Alert::error('', $validation->getMessageBag()->first());
            return back();
        }

        $name_image = time() . '.' . $request->file('my_image')->guessClientExtension();
        $request->file('my_image')->move(public_path('upload'), $name_image);
        $add = new table_product();
        $add->title = $request->title;
        $add->description = $request->description;
        $add->phone = auth()->user()->phone;
        $add->image_name = $name_image;
        $add->save();
        Alert::success('', 'با موفقیت اضافه شد.');
        return redirect()->back();
    }

    public function delete_order(Request $request)
    {
        $id = $request->id;

        if (!\auth()->check()) {
            return false;
        }

        $exist = DB::table('product')
            ->where('id', $id)
            ->where('phone', auth()->user()->phone)->exists();

        if (!$exist) {
            return false;
        }

        DB::table('product')
            ->where('id', $id)
            ->where('phone', auth()->user()->phone)->delete();

        return true;
    }
    public function delete_user(Request $request){
        $id = $request->post('id');

        if (auth()->check() && \auth()->user()->level != UserLevelEnum::ownerAdmin){
            return false;
        }

        DB::table('users')
            ->where('id', $id)
            ->delete();

        return true;
    }
}
