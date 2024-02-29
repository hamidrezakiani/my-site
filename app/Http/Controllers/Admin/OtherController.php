<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OtherRequest;
use App\Models\Other;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    public function edit(OtherRequest $request)
    {
        $otherSettings = [];
        $otherSettings['homeHeaderText'] = Other::where('key', 'homeHeaderText')->first();
        $otherSettings['homeDescriptionText'] = Other::where('key', 'homeDescriptionText')->first();
        $otherSettings['homeEnvironmentImageLarge'] = Other::where('key', 'homeEnvironmentImageLarge')->first();
        $otherSettings['homeEnvironmentImageSmall'] = Other::where('key', 'homeEnvironmentImageSmall')->first();
        $otherSettings['homeEnvironmentText'] = Other::where('key', 'homeEnvironmentText')->first();
        $otherSettings['footerText'] = Other::where('key', 'footerText')->first();
        $otherSettings['footerAddress'] = Other::where('key', 'footerAddress')->first();
        $otherSettings['marquee'] = Other::where('key', 'marquee')->first();

        return view('admin.other.index', compact('otherSettings'));
    }

    public function update(OtherRequest $request)
    {
        Other::where('key', 'homeHeaderText')->update([
            'value' => $request->homeHeaderText['en'],
            'value_fa' => $request->homeHeaderText['fa'],
            'value_ar' => $request->homeHeaderText['ar'] ?? ''
        ]);
        Other::where('key', 'homeDescriptionText')->update([
            'value' => $request->homeDescriptionText['en'],
            'value_fa' => $request->homeDescriptionText['fa'],
            'value_ar' => $request->homeDescriptionText['ar'] ?? ''
        ]);
        Other::where('key', 'homeEnvironmentText')->update([
            'value' => $request->homeEnvironmentText['en'],
            'value_fa' => $request->homeEnvironmentText['fa'],
            'value_ar' => $request->homeEnvironmentText['ar'] ?? ''
        ]);
        Other::where('key', 'marquee')->update([
            'value' => $request->marquee['en'],
            'value_fa' => $request->marquee['fa'],
            'value_ar' => $request->marquee['ar'] ?? ''
        ]);
        Other::where('key', 'footerText')->update([
            'value' => $request->footerText['en'],
            'value_fa' => $request->footerText['fa'],
            'value_ar' => $request->footerText['ar'] ?? ''
        ]);
        Other::where('key', 'footerAddress')->update([
            'value' => $request->footerAddress['en'],
            'value_fa' => $request->footerAddress['fa'],
            'value_ar' => $request->footerAddress['ar'] ?? ''
        ]);

        $homeEnvironmentImageLarge = Other::where('key', 'homeEnvironmentImageLarge')->first();
        $filePath = $homeEnvironmentImageLarge->value;
        $file = $request->file('homeEnvironmentImageLarge');
        if ($file) {
            $fileName = time() . $file->getClientOriginalName();
            $targetPath = 'dist/images';
            $file->move($targetPath, $fileName);
            $filePath = $targetPath . '/' . $fileName;
            if (file_exists($homeEnvironmentImageLarge->value))
                unlink($homeEnvironmentImageLarge->value);
        }
        $homeEnvironmentImageLarge->update([
            'value' => $filePath
        ]);

        $homeEnvironmentImageSmall = Other::where('key', 'homeEnvironmentImageSmall')->first();
        $filePath = $homeEnvironmentImageSmall->value;
        $file = $request->file('homeEnvironmentImageSmall');
        if ($file) {
            $fileName = time() . $file->getClientOriginalName();
            $targetPath = 'dist/images';
            $file->move($targetPath, $fileName);
            $filePath = $targetPath . '/' . $fileName;
            if (file_exists($homeEnvironmentImageSmall->value))
                unlink($homeEnvironmentImageSmall->value);
        }
        $homeEnvironmentImageSmall->update([
            'value' => $filePath
        ]);

        return redirect()->back()->withErrors(['update' => 'SUCCESS']);
    }
}
