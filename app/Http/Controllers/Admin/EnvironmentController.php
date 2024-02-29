<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EnvironmentRequest;
use App\Models\Other;
use Illuminate\Http\Request;

class EnvironmentController extends Controller
{
    public function edit(EnvironmentRequest $request)
    {
        $environment = [];
        $environment['title'] = Other::where('key', 'environmentTitle')->first();
        $environment['text'] = Other::where('key', 'environmentText')->first();
        $environment['image'] = Other::where('key', 'environmentImage')->first();
        $environment['image1'] = Other::where('key', 'environmentImage1')->first();
        return view('admin.environment.index', compact('environment'));
    }

    public function update(EnvironmentRequest $request)
    {
        Other::where('key', 'environmentTitle')->update([
            'value' => $request->title['en'],
            'value_fa' => $request->title['fa'],
            'value_ar' => $request->title['ar'] ?? ''
        ]);
        Other::where('key', 'environmentText')->update([
            'value' => $request->text['en'],
            'value_fa' => $request->text['fa'],
            'value_ar' => $request->text['ar'] ?? ''
        ]);

        $image = Other::where('key', 'environmentImage')->first();
        $filePath = $image->value;
        $file = $request->file('image');
        if ($file) {
            $fileName = time() . $file->getClientOriginalName();
            $targetPath = 'dist/images';
            $file->move($targetPath, $fileName);
            $filePath = $targetPath . '/' . $fileName;
            if (file_exists($image->value))
                unlink($image->value);
        }
        $image->update([
            'value' => $filePath
        ]);

        $image1 = Other::where('key', 'environmentImage1')->first();
        $filePath = $image1->value;
        $file = $request->file('image1');
        if ($file) {
            $fileName = time() . $file->getClientOriginalName();
            $targetPath = 'dist/images';
            $file->move($targetPath, $fileName);
            $filePath = $targetPath . '/' . $fileName;
            if (file_exists($image1->value))
                unlink($image1->value);
        }
        $image1->update([
            'value' => $filePath
        ]);

        return redirect()->back()->withErrors(['update' => 'SUCCESS']);
    }
}
