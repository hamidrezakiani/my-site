<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(RoleRequest $request)
    {
        $roles = Role::all();
        return view('admin.role.index',compact('roles'));
    }

    public function store(RoleRequest $request)
    {
        Role::create(['name' => $request->name]);
        return redirect()->back()->withErrors(['store' => 'SUCCESS']);
    }

    public function show($id, RoleRequest $request)
    {
        $permissions = Permission::all();
        $permissions->map(function($permission) use($id){
           if($permission->roles()->where('role_id',$id)->first()){
             $permission->allow = true;
           }else{
            $permission->allow = false;
           }
        });
        $role = Role::find($id);
        return view('admin.role.permission',compact(['permissions','role']));
    }

    public function updatePermission($id, RoleRequest $request)
    {
        $new = [];
        foreach($request->permission as $permission)
        {
            if($permission['value'] ?? 'off' == 'on')
             array_push($new,$permission['id']);
        }
        Role::find($id)->permissions()->sync($new);
        return redirect()->back();
    }

    public function update($id, RoleRequest $request)
    {
        Role::find($id)->update([
            'name' => $request->name
        ]);
        return redirect()->back()->withErrors(['update' => 'SUCCESS']);
    }

    public function delete($id, RoleRequest $request)
    {
        Role::find($id)->delete();
        return redirect()->back()->withErrors(['delete' => 'SUCCESS']);
    }
}
