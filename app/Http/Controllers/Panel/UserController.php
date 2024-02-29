<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit()
    {
        return view('panel.profile.index');
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $file = $request->file('image');
        if ($file) {
            $fileName = time() . $file->getClientOriginalName();
            $targetPath = 'dist/images/avatar';
            $file->move($targetPath, $fileName);
            $filePath = $targetPath . '/' . $fileName;
            if ($user->image && file_exists(public_path() . '/' . $user->image)) {
                unlink($user->image);
            }
            $user->avatar = $filePath;
        }

        if($request->password)
        {
            $user->password = $request->password;
        }

        $user->save();
        return redirect()->back()->withErrors(['profile' => 'SUCCESS']);
    }
}
