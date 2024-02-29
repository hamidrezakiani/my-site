<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(ProductRequest $request)
    {
        $products = Product::all();
        return view('admin.product.index', compact(['products']));
    }

    public function store(ProductRequest $request)
    {
        $file = $request->file('image');
        $fileName = time() . $file->getClientOriginalName();
        $targetPath = 'dist/images/products';
        $file->move($targetPath, $fileName);
        $filePath = $targetPath . '/' . $fileName;
        Product::create([
            'title' => $request->title['en'],
            'title_fa' => $request->title['fa'],
            'title_ar' => $request->title['ar'] ?? '',
            'text' => $request->text['en'],
            'text_fa' => $request->text['fa'],
            'text_ar' => $request->text['ar'] ?? '',
            'image' => $filePath
        ]);

        return redirect()->to('admin/products')->withErrors(['store' => 'SUCCESS']);
    }

    public function create(ProductRequest $request)
    {
        return view('admin.product.create');
    }

    public function edit($id, ProductRequest $request)
    {
        $product = Product::find($id);
        return view('admin.product.edit', compact(['product']));
    }

    public function update($id, ProductRequest $request)
    {
        $product = Product::find($id);
        $filePath = $product->image;
        $file = $request->file('image');
        if ($file) {
            $fileName = time() . $file->getClientOriginalName();
            $targetPath = 'dist/images/products';
            $file->move($targetPath, $fileName);
            $filePath = $targetPath . '/' . $fileName;
            if (file_exists(public_path() . '/' . $product->image)) {
                unlink($product->image);
            }
        }
        $product->update([
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


    public function delete($id, ProductRequest $request)
    {

        $product = Product::find($id);
        if (file_exists(public_path() . '/' . $product->image)) {
            unlink($product->image);
        }
        $items = $product->items;
        foreach($items as $item)
        {
            if (file_exists(public_path() . '/' . $item->pdf)) {
                unlink($item->pdf);
            }
            $catalogs = $item->catalogs;
            foreach ($catalogs as $catalog) {
                if (file_exists(public_path() . '/' . $catalog->pdf)) {
                    unlink($catalog->pdf);
                }
                $catalog->delete();
            }
            $item->delete();
        }
        $product->delete();
        return redirect()->back()->withErrors(['delete' => 'SUCCESS']);
    }
}
