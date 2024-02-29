<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Other;
use Illuminate\Http\Request;

class EnvironmentController extends Controller
{
    public function index()
    {
        $environmentData = [];
        $environmentData['title'] = Other::where('key','environmentTitle')->first();
        $environmentData['text'] = Other::where('key','environmentText')->first();
        $environmentData['image'] = [];
        $environmentData['image'][0] = Other::where('key','environmentImage')->first();
        $environmentData['image'][1] = Other::where('key','environmentImage1')->first();
        return view('environment',compact('environmentData'));
    }
}
