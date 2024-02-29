<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request){
        $user = User::create([
            'name' =>  $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        Auth::login($user);
        return redirect()->back();
    }
}
