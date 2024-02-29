<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuctionRequest;
use App\Models\Other;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function edit(AuctionRequest $request)
    {
        $auction = [];
        $auction['title'] = Other::where('key', 'auctionTitle')->first();
        $auction['text'] = Other::where('key', 'auctionText')->first();
        $auction['image'] = Other::where('key', 'auctionImage')->first();
        $auction['image1'] = Other::where('key', 'auctionImage1')->first();

        return view('admin.auction.index', compact('auction'));
    }

    public function update(AuctionRequest $request)
    {
        Other::where('key', 'auctionTitle')->update([
            'value' => $request->title['en'],
            'value_fa' => $request->title['fa'],
            'value_ar' => $request->title['ar'] ?? ''
        ]);
        Other::where('key', 'auctionText')->update([
            'value' => $request->text['en'],
            'value_fa' => $request->text['fa'],
            'value_ar' => $request->text['ar'] ?? ''
        ]);

        $image = Other::where('key', 'auctionImage')->first();
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

        $image1 = Other::where('key', 'auctionImage1')->first();
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
