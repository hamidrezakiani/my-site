<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkillRequest;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index(SkillRequest $request)
    {
        $skills = Skill::all();
        return view('admin.about.skill.index', compact('skills'));
    }

    public function create(SkillRequest $request)
    {
        return view('admin.about.skill.create');
    }

    public function store(SkillRequest $request)
    {
        Skill::create([
            'title' => $request->title['en'],
            'title_fa' => $request->title['fa'],
            'title_ar' => $request->title['ar'] ?? '',
            'value' => $request->value,
        ]);

        return redirect()->to('admin/skills')->withErrors(['store' => 'SUCCESS']);
    }

    public function edit($id, SkillRequest $request)
    {
        $skill = Skill::find($id);
        return view('admin.about.skill.edit', compact('skill'));
    }

    public function update($id, SkillRequest $request)
    {
        Skill::find($id)->update([
            'title' => $request->title['en'],
            'title_fa' => $request->title['fa'],
            'title_ar' => $request->title['ar'] ?? '',
            'value' => $request->value,
        ]);

        return redirect()->back()->withErrors(['update' => 'SUCCESS']);
    }

    public function delete($id, SkillRequest $request)
    {
        Skill::find($id)->delete();
        return redirect()->back()->withErrors(['delete' => 'SUCCESS']);
    }
}
