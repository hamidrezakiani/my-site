<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
         Auth::logout();
         if($request->ln)
          $url = '?ln='.$request->ln;
         else
          $url = '';
         return redirect($url);
    }
}
