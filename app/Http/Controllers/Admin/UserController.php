<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(UserRequest $request)
    {
        $users = User::all();
        return view('admin/user/index',compact('users'));
    }

    public function edit($id, UserRequest $request)
    {
        $roles = Role::all();
        $user = User::find($id);
        return view('admin/user/edit',compact(['user','roles']));
    }

    public function update(UserRequest $request,$id)
    {
        $user = User::find($id);
        if($user)
        {
            $user->update([
                'name' =>  $request->name,
                'email' => $request->email,
                'role_id' => $request->role_id
            ]);
        }
        return redirect()->back()->withInput(['status' => 'SUCCESS']);
    }
}
