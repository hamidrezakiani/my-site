<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(NewsRequest $request)
    {
        $news = News::all();
        return view('admin.news.index',compact(['news']));
    }

    public function store(NewsRequest $request)
    {
        $file = $request->file('image');
        $fileName = time() . $file->getClientOriginalName();
        $targetPath = 'dist/images/news';
        $file->move($targetPath, $fileName);
        $filePath = $targetPath.'/'.$fileName;
        $display = ($request->display ?? 'off') == 'on';
        News::create([
          'title' => $request->title['en'],
          'title_fa' => $request->title['fa'],
          'title_ar' => $request->title['ar'] ?? '',
          'text' => $request->text['en'],
          'text_fa' => $request->text['fa'],
          'text_ar' => $request->text['ar'] ?? '',
          'image' => $filePath,
          'display' => $display
        ]);

        return redirect()->to('admin/news')->withErrors(['store' => 'SUCCESS']);
    }

    public function create(NewsRequest $request)
    {
        return view('admin.news.create');
    }

    public function edit($id, NewsRequest $request)
    {
        $news = News::find($id);
        return view('admin.news.edit',compact(['news']));
    }

    public function update($id, NewsRequest $request)
    {
        $news = News::find($id);
        $filePath = $news->image;
        $file = $request->file('image');
        if($file)
        {
            $fileName = time() . $file->getClientOriginalName();
            $targetPath = 'dist/images/news';
            $file->move($targetPath, $fileName);
            $filePath = $targetPath . '/' . $fileName;
            if (file_exists(public_path() . '/' . $news->image)) {
                unlink($news->image);
            }
        }
        $display = ($request->display ?? 'off') == 'on';
        $news->update([
            'title' => $request->title['en'],
            'title_fa' => $request->title['fa'],
            'title_ar' => $request->title['ar'] ?? '',
            'text' => $request->text['en'],
            'text_fa' => $request->text['fa'],
            'text_ar' => $request->text['ar'] ?? '',
            'image' => $filePath,
            'display' => $display
        ]);

        return redirect()->back()->withErrors(['update' => 'SUCCESS']);
    }


    public function delete($id, NewsRequest $request)
    {

        $news = News::find($id);
        if (file_exists(public_path() . '/' . $news->image)) {
            unlink($news->image);
        }
        $news->delete();
        return redirect()->back()->withErrors(['delete' => 'SUCCESS']);
    }
}
