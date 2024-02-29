<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutSettingRequest;
use App\Http\Requests\HistoryRequest;
use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(HistoryRequest $request)
    {
        $histories = History::all();
        return view('admin.about.history.index', compact('histories'));
    }

    public function create(HistoryRequest $request)
    {
        return view('admin.about.history.create');
    }

    public function store(HistoryRequest $request)
    {
        History::create([
            'year' => $request->year['en'],
            'year_fa' => $request->year['fa'],
            'year_ar' => $request->year['ar'] ?? '',
            'text' => $request->text['en'],
            'text_fa' => $request->text['fa'],
            'text_ar' => $request->text['ar'] ?? '',
        ]);

        return redirect()->to('admin/histories')->withErrors(['store' => 'SUCCESS']);
    }

    public function edit($id, HistoryRequest $request)
    {
        $history = History::find($id);
        return view('admin.about.history.edit', compact('history'));
    }

    public function update($id, HistoryRequest $request)
    {
        History::find($id)->update([
            'year' => $request->year['en'],
            'year_fa' => $request->year['fa'],
            'year_ar' => $request->year['ar'] ?? '',
            'text' => $request->text['en'],
            'text_fa' => $request->text['fa'],
            'text_ar' => $request->text['ar'] ?? '',
        ]);

        return redirect()->back()->withErrors(['update' => 'SUCCESS']);
    }

    public function delete($id, HistoryRequest $request)
    {
        History::find($id)->delete();
        return redirect()->back()->withErrors(['delete' => 'SUCCESS']);
    }
}
