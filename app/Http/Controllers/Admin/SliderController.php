<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(SliderRequest $request)
    {
        $sliders = Slider::all();
        return view('admin.slider.index',compact(['sliders']));
    }

    public function create(SliderRequest $request)
    {
        return view('admin.slider.create');
    }

    public function store(SliderRequest $request)
    {
        $file = $request->file('url');
        $fileName = time() . $file->getClientOriginalName();
        $targetPath = 'dist/images/slider';
        $file->move($targetPath, $fileName);
        $filePath = $targetPath . '/' . $fileName;
        Slider::create([
            'title' => $request->title['en'],
            'title_fa' => $request->title['fa'],
            'title_ar' => $request->title['ar'] ?? '',
            'url' => $filePath
        ]);

        return redirect()->to('admin/sliders')->withErrors(['store' => 'SUCCESS']);
    }

    public function edit($id, SliderRequest $request)
    {
        $slide = Slider::find($id);
        return view('admin.slider.edit',compact('slide'));
    }

    public function update($id, SliderRequest $request)
    {
        $slide = Slider::find($id);
        $filePath = $slide->url;
        $file = $request->file('url');
        if ($file) {
            $fileName = time() . $file->getClientOriginalName();
            $targetPath = 'dist/images/slider';
            $file->move($targetPath, $fileName);
            $filePath = $targetPath . '/' . $fileName;
            unlink($slide->url);
        }
        $slide->update([
            'title' => $request->title['en'],
            'title_fa' => $request->title['fa'],
            'title_ar' => $request->title['ar'] ?? '',
            'url' => $filePath
        ]);

        return redirect()->back()->withErrors(['update' => 'SUCCESS']);
    }

    public function delete($id, SliderRequest $request)
    {

        $slider = Slider::find($id);
        if (file_exists(public_path() . '/' . $slider->url)) {
            unlink($slider->url);
        }
        $slider->delete();
        return redirect()->back()->withErrors(['delete' => 'SUCCESS']);
    }
}
