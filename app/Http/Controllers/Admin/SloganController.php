<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SloganRequest;
use App\Models\Slogan;
use Illuminate\Http\Request;

class SloganController extends Controller
{
    public function index(SloganRequest $request)
    {
        $slogans = Slogan::all();
        return view('admin.about.slogan.index',compact('slogans'));
    }

    public function create(SloganRequest $request)
    {
        return view('admin.about.slogan.create');
    }

    public function store(SloganRequest $request)
    {
        $file = $request->file('image');
        $fileName = time() . $file->getClientOriginalName();
        $targetPath = 'dist/images/slogan';
        $file->move($targetPath, $fileName);
        $filePath = $targetPath . '/' . $fileName;
        Slogan::create([
            'title' => $request->title['en'],
            'title_fa' => $request->title['fa'],
            'title_ar' => $request->title['ar'] ?? '',
            'text' => $request->text['en'],
            'text_fa' => $request->text['fa'],
            'text_ar' => $request->text['ar'] ?? '',
            'image' => $filePath
        ]);

        return redirect()->to('admin/slogans')->withErrors(['store' => 'SUCCESS']);
    }

    public function edit($id, SloganRequest $request)
    {
        $slogan = Slogan::find($id);
        return view('admin.about.slogan.edit', compact('slogan'));
    }

    public function update($id, SloganRequest $request)
    {
        $slogan = Slogan::find($id);
        $filePath = $slogan->image;
        $file = $request->file('image');
        if ($file) {
            $fileName = time() . $file->getClientOriginalName();
            $targetPath = 'dist/images/slogan';
            $file->move($targetPath, $fileName);
            $filePath = $targetPath . '/' . $fileName;
            unlink($slogan->image);
        }
        $slogan->update([
            'title' => $request->title['en'],
            'title_fa' => $request->title['fa'],
            'title_ar' => $request->title['ar'] ?? '',
            'text' => $request->text['en'],
            'text_fa' => $request->text['fa'],
            'text_ar' => $request->text['ar'] ?? '',
            'image' => $filePath
        ]);

        return redirect()->back()->withErrors(['update' => 'SUCCESS']);
    }

    public function delete($id, SloganRequest $request)
    {

        $slogan = Slogan::find($id);
        if (file_exists(public_path() . '/' . $slogan->image)) {
            unlink($slogan->image);
        }
        $slogan->delete();
        return redirect()->back()->withErrors(['delete' => 'SUCCESS']);
    }
}
