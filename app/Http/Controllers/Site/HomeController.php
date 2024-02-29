<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Other;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index(Request $request){
        
        $homeData = [];
        $homeData['homeHeaderText'] = Other::where('key', 'homeHeaderText')->first();
        $homeData['homeDescriptionText'] = Other::where('key', 'homeDescriptionText')->first();
        $homeData['homeEnvironmentImageLarge'] = Other::where('key', 'homeEnvironmentImageLarge')->first();
        $homeData['homeEnvironmentImageSmall'] = Other::where('key', 'homeEnvironmentImageSmall')->first();
        $homeData['homeEnvironmentText'] = Other::where('key', 'homeEnvironmentText')->first();
        $last_news = News::where('display',1)->orderBy('created_at','DESC')->limit(6)->get();
        $sliders = Slider::all();
        $products = Product::all();
        return view('Home',compact(['sliders','last_news','homeData','products']));
    }
}
