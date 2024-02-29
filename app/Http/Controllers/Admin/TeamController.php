<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(TeamRequest $request)
    {
        $team = Team::all();
        return view('admin.about.team.index', compact('team'));
    }

    public function create(TeamRequest $request)
    {
        return view('admin.about.team.create');
    }

    public function store(TeamRequest $request)
    {
        $file = $request->file('image');
        $fileName = time() . $file->getClientOriginalName();
        $targetPath = 'dist/images/team';
        $file->move($targetPath, $fileName);
        $filePath = $targetPath . '/' . $fileName;
        Team::create([
            'name' => $request->name['en'],
            'name_fa' => $request->name['fa'],
            'name_ar' => $request->name['ar'] ?? '',
            'description' => $request->description['en'],
            'description_fa' => $request->description['fa'],
            'description_ar' => $request->description['ar'] ?? '',
            'image' => $filePath
        ]);

        return redirect()->to('admin/team')->withErrors(['store' => 'SUCCESS']);
    }

    public function edit($id, TeamRequest $request)
    {
        $person = Team::find($id);
        return view('admin.about.team.edit', compact('person'));
    }

    public function update($id, TeamRequest $request)
    {
        $person = Team::find($id);
        $filePath = $person->image;
        $file = $request->file('image');
        if ($file) {
            $fileName = time() . $file->getClientOriginalName();
            $targetPath = 'dist/images/team';
            $file->move($targetPath, $fileName);
            $filePath = $targetPath . '/' . $fileName;
            unlink($person->image);
        }
        $person->update([
            'name' => $request->name['en'],
            'name_fa' => $request->name['fa'],
            'name_ar' => $request->name['ar'] ?? '',
            'description' => $request->description['en'],
            'description_fa' => $request->description['fa'],
            'description_ar' => $request->description['ar'] ?? '',
            'image' => $filePath
        ]);

        return redirect()->back()->withErrors(['update' => 'SUCCESS']);
    }

    public function delete($id, TeamRequest $request)
    {

        $person = Team::find($id);
        if (file_exists(public_path() . '/' . $person->image)) {
            unlink($person->image);
        }
        $person->delete();
        return redirect()->back()->withErrors(['delete' => 'SUCCESS']);
    }
}
