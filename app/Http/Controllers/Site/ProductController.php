<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products',compact('products'));
    }

    public function show($id)
    {
        $product = Product::with(['items'])->find($id);
        return view('product',compact('product'));
    }
}
