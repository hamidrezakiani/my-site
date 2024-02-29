<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index($id,ItemRequest $request)
    {
        $product = Product::with('items')->find($id);
        return view('admin.item.index', compact(['product']));
    }

    public function store($id, ItemRequest $request)
    {
        $product = Product::find($id);
        if(!$product)
           return redirect()->back();
        $file = $request->file('pdf');
        $fileName = time() . $file->getClientOriginalName();
        $targetPath = 'dist/book';
        $file->move($targetPath, $fileName);
        $filePath = $targetPath . '/' . $fileName;
        $product->items()->create([
            'name' => $request->name['en'],
            'name_fa' => $request->name['fa'],
            'name_ar' => $request->name['ar'] ?? '',
            'pdf' => $filePath
        ]);

        return redirect()->to('admin/products/'.$id.'/items')->withErrors(['store' => 'SUCCESS']);
    }

    public function create($id, ItemRequest $request)
    {
        $product = Product::find($id);
        return view('admin.item.create',compact('product'));
    }

    public function edit($id, ItemRequest $request)
    {
        $item = Item::with('product')->find($id);
        return view('admin.item.edit', compact(['item']));
    }

    public function update($id, ItemRequest $request)
    {
        $item = Item::find($id);
        $filePath = $item->pdf;
        $file = $request->file('pdf');
        if ($file) {
            $fileName = time() . $file->getClientOriginalName();
            $targetPath = 'dist/book';
            $file->move($targetPath, $fileName);
            $filePath = $targetPath . '/' . $fileName;
            unlink($item->pdf);
        }
        $item->update([
            'name' => $request->name['en'],
            'name_fa' => $request->name['fa'],
            'name_ar' => $request->name['ar'] ?? '',
            'pdf' => $filePath
        ]);

        return redirect()->back()->withErrors(['update' => 'SUCCESS']);
    }


    public function delete($id, ItemRequest $request)
    {
        $item = Item::find($id);
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
        return redirect()->back()->withErrors(['delete' => 'SUCCESS']);
    }
}
