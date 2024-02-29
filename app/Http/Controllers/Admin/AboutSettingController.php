<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutSettingRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AboutSettingController extends Controller
{
    public function edit(AboutSettingRequest $request)
    {
        $aboutSettings = [];
        $aboutSettings['aboutText'] = About::where('key','aboutText')->first();
        $aboutSettings['aboutImage'] = About::where('key','aboutImage')->first();
        $aboutSettings['slogan'] = About::where('key','slogan')->first();
        $aboutSettings['skillText'] = About::where('key','skillText')->first();
        $aboutSettings['philosophy'] = About::where('key', 'philosophy')->first();
        $aboutSettings['whyUs'] = About::where('key','whyUs')->first();

        return view('admin.about.about',compact('aboutSettings'));
    }

    public function update(AboutSettingRequest $request)
    {
        About::where('key', 'aboutText')->update([
            'value' => $request->aboutText['en'],
            'value_fa' => $request->aboutText['fa'],
            'value_ar' => $request->aboutText['ar'] ?? ''
        ]);
        About::where('key', 'slogan')->update([
            'value' => $request->slogan['en'],
            'value_fa' => $request->slogan['fa'],
            'value_ar' => $request->slogan['ar'] ?? ''
        ]);
        About::where('key', 'skillText')->update([
            'value' => $request->skillText['en'],
            'value_fa' => $request->skillText['fa'],
            'value_ar' => $request->skillText['ar'] ?? ''
        ]);
        About::where('key', 'philosophy')->update([
            'value' => $request->philosophy['en'],
            'value_fa' => $request->philosophy['fa'],
            'value_ar' => $request->philosophy['ar'] ?? ''
        ]);
        About::where('key', 'whyUs')->update([
            'value' => $request->whyUs['en'],
            'value_fa' => $request->whyUs['fa'],
            'value_ar' => $request->whyUs['ar'] ?? ''
        ]);
        $aboutImage = About::where('key', 'aboutImage')->first();
        $filePath = $aboutImage->value;
        $file = $request->file('aboutImage');
        if ($file) {
            $fileName = time() . $file->getClientOriginalName();
            $targetPath = 'dist/images';
            $file->move($targetPath, $fileName);
            $filePath = $targetPath . '/' . $fileName;
            if(file_exists($aboutImage->value))
               unlink($aboutImage->value);
        }
        $aboutImage->update([
            'value' => $filePath
        ]);

        return redirect()->back()->withErrors(['update' => 'SUCCESS']);
    }
}
