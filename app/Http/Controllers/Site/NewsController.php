<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $all_news = News::where('display',1)->get();
        return view('all-news',compact(['all_news']));
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        $last_news = News::where('display', 1)->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('news',compact(['news','last_news']));
    }

    public function search(Request $request)
    {
        if($request->ln == 'fa'){
           $all_news = News::where('title_fa','like','%'.$request->search.'%')
                            ->orWhere('text_fa','like', '%' . $request->search .'%')->get();
        }elseif($request->ln == 'ar'){
            $all_news = News::where('title_ar', 'like', '%' . $request->search . '%')
                ->orWhere('text_ar', 'like', '%' . $request->search . '%')->get();
        }else{
            $all_news = News::where('title', 'like', '%' . $request->search . '%')
                ->orWhere('text', 'like', '%' . $request->search . '%')->get();
        }
        return view('news-search', compact(['all_news']));
    }
}
