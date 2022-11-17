<?php

namespace App\Http\Controllers;

use App\Enums\UserLevelEnum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class controller_POST extends Controller
{
    public function signIn(Request $request)
    {
        $credentials = $request->validate([
            'phone' => ['required', 'regex:/^09[0-9]{9}$/'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function signUp(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'max:50'],
            'phone' => ['required', 'regex:/^09[0-9]{9}$/'],
            'password' => ['required'],
        ]);

        $user = DB::table('users')
            ->where('phone', (int) $request->post('phone'))
            ->exists();

        if ($user){
            return back()->withErrors('شما قبلا ثبت نام کرده اید');
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
