<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Other;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function index()
    {
        $auctionData = [];
        $auctionData['title'] = Other::where('key', 'auctionTitle')->first();
        $auctionData['text'] = Other::where('key', 'auctionText')->first();
        $auctionData['image'] = [];
        $auctionData['image'][0] = Other::where('key', 'auctionImage')->first();
        $auctionData['image'][1] = Other::where('key', 'auctionImage1')->first();
        return view('auction', compact('auctionData'));
    }
}
