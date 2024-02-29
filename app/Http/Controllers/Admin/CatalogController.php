<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CatalogRequest;
use App\Models\Catalog;
use App\Models\Item;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

    public function index($id,CatalogRequest $request)
    {
        $item = Item::with('catalogs')->find($id);
        return view('admin.catalog.index', compact(['item']));
    }

    public function store($id, CatalogRequest $request)
    {
        $item = Item::find($id);
        if (!$item)
            return redirect()->back();
        $file = $request->file('pdf');
        $fileName = time() . $file->getClientOriginalName();
        $targetPath = 'dist/book';
        $file->move($targetPath, $fileName);
        $filePath = $targetPath . '/' . $fileName;
        $item->catalogs()->create([
            'name' => $request->name['en'],
            'name_fa' => $request->name['fa'],
            'name_ar' => $request->name['ar'] ?? '',
            'pdf' => $filePath
        ]);

        return redirect()->to('admin/items/' . $id . '/catalogs')->withErrors(['store' => 'SUCCESS']);
    }

    public function create($id, CatalogRequest $request)
    {
        $item = Item::find($id);
        return view('admin.catalog.create', compact('item'));
    }

    public function edit($id, CatalogRequest $request)
    {
        $catalog = Catalog::with(['item' => function($query){return $query->with('product');}])->find($id);
        return view('admin.catalog.edit', compact(['catalog']));
    }

    public function update($id, CatalogRequest $request)
    {
        $catalog = Catalog::find($id);
        $filePath = $catalog->pdf;
        $file = $request->file('pdf');
        if ($file) {
            $fileName = time() . $file->getClientOriginalName();
            $targetPath = 'dist/book';
            $file->move($targetPath, $fileName);
            $filePath = $targetPath . '/' . $fileName;
            unlink($catalog->pdf);
        }
        $catalog->update([
            'name' => $request->name['en'],
            'name_fa' => $request->name['fa'],
            'name_ar' => $request->name['ar'] ?? '',
            'pdf' => $filePath
        ]);

        return redirect()->back()->withErrors(['update' => 'SUCCESS']);
    }


    public function delete($id, CatalogRequest $request)
    {
        $catalog = Catalog::find($id);
        if (file_exists(public_path() . '/' . $catalog->pdf)) {
            unlink($catalog->pdf);
        }
        $catalog->delete();
        return redirect()->back()->withErrors(['delete' => 'SUCCESS']);
    }
}
