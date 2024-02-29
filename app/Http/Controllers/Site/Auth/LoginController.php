<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user()->role->id ?? false == 1)
              return redirect('/admin/dashboard');
            return redirect()->back();
        }
        if($request->ln ?? 'en' == 'fa')
           $errorText = 'نام کاربری یا رمز عبور صحیح نمیباشد';
        elseif($request->ln ?? 'en' == 'ar')
           $errorText = 'نام کاربری یا رمز عبور صحیح نمیباشد';
        else
           $errorText = 'The provided credentials do not match our records.';

        return back()->withErrors([
            'email' => $errorText,
            'login' => true,
            'auth'  => false
        ])->onlyInput('email');
    }
}
