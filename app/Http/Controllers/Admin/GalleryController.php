<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(GalleryRequest $request)
    {
        $galleries = Gallery::all();
        return view('admin.gallery.index', compact(['galleries']));
    }

    public function create(GalleryRequest $request)
    {
        return view('admin.gallery.create');
    }

    public function store(GalleryRequest $request)
    {
        $file = $request->file('url');
        $fileName = time() . $file->getClientOriginalName();
        $targetPath = 'dist/images/gallery';
        $file->move($targetPath, $fileName);
        $filePath = $targetPath . '/' . $fileName;
        Gallery::create([
            'title' => $request->title['en'],
            'title_fa' => $request->title['fa'],
            'title_ar' => $request->title['ar'] ?? '',
            'url' => $filePath
        ]);

        return redirect()->to('admin/galleries')->withErrors(['store' => 'SUCCESS']);
    }

    public function edit($id, GalleryRequest $request)
    {
        $gallery = Gallery::find($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update($id, GalleryRequest $request)
    {
        $gallery = Gallery::find($id);
        $filePath = $gallery->url;
        $file = $request->file('url');
        if ($file) {
            $fileName = time() . $file->getClientOriginalName();
            $targetPath = 'dist/images/gallery';
            $file->move($targetPath, $fileName);
            $filePath = $targetPath . '/' . $fileName;
            if (file_exists(public_path() . '/' . $gallery->url)) {
                unlink($gallery->url);
            }
        }
        $gallery->update([
            'title' => $request->title['en'],
            'title_fa' => $request->title['fa'],
            'title_ar' => $request->title['ar'] ?? '',
            'url' => $filePath
        ]);

        return redirect()->back()->withErrors(['update' => 'SUCCESS']);
    }

    public function delete($id, GalleryRequest $request)
    {

        $gallery = Gallery::find($id);
        if (file_exists(public_path() . '/' . $gallery->url)) {
            unlink($gallery->url);
        }
        $gallery->delete();
        return redirect()->back()->withErrors(['delete' => 'SUCCESS']);
    }
}
