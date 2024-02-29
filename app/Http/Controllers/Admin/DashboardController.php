<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DashboardRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(DashboardRequest $request)
    {
        $data = [];
        $data['count_users'] = User::count();
        return view('admin/dashboard',compact('data'));
    }
}
