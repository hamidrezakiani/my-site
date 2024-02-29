<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function index()
    {
        return view('reset-password.index');
    }

    public function sendToken(ResetPasswordRequest $request)
    {
        $token = Hash::make(80);
        DB::delete('delete from password_resets where email = ?', [$request->email]);
        DB::insert('insert into password_resets (email,token,created_at) values(?,?,?)',[$request->email,$token,Carbon::now()]);
        $success = 'SUCCESS';
        return view('reset-password.index',compact('success'));
    }

    public function newPassword(Request $request)
    {
        $token = $request->token;
        if($request->ln)
          $ln = '?ln='.$request->ln;
        else
          $ln='/';
        if(!$token)
         return redirect($ln);
        return view('reset-password.new',compact('token'));
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $email = DB::select('select * from password_resets where token = ?',[$request->token])[0]->email ?? null;
        if($email)
        {
           $user = User::where('email',$email)->first();
           $user->password = $request->password;
           $user->save();
            DB::delete('delete from password_resets where email = ?', [$email]);
           $success = 'SUCCESS';
           return view('reset-password.new',compact(['success']));
        }
        else
        {
            $error = 'ERROR';
            return view('reset-password.index', compact('error'));
        }
    }
}
