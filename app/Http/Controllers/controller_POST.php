<?php

namespace App\Http\Controllers;

use App\Enums\UserLevelEnum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class controller_POST extends Controller
{
    public function signIn(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'regex:/^09[0-9]{9}$/'],
            'password' => ['required'],
        ]);

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

        if (!$user){
            Alert::error('', 'اطلاعات وارد شده صحیح نمیباشد');
            return back();
        }

        Auth::loginUsingId($user->id);

        Alert::success('', 'ورود شما با موفقیت انجام شد');
        return redirect('/');
    }

    public function signUp(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'max:50'],
            'phone' => ['required', 'regex:/^09[0-9]{9}$/'],
            'password' => ['required'],
        ]);

        $user = DB::table('users')
            ->where('phone', $request->post('phone'))
            ->exists();

        if ($user){
            Alert::error('', 'شما قبلا با این شماره ثبت نام کرده اید لطفا از قسمت ورود وارد برنامه شوید');
            return back();
        }

        $user = DB::table('users')
            ->insertGetId([
                'full_name' => $request->post('full_name'),
                'phone' => (int) $request->post('phone'),
                'password' => hash('sha256', $request->post('password')),
                'level' => UserLevelEnum::client->value,
            ]);

        Auth::loginUsingId($user);

        return redirect('/');
    }
}
