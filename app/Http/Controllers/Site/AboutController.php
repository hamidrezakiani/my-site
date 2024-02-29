<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\History;
use App\Models\Skill;
use App\Models\Slogan;
use App\Models\Team;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $aboutContents = [];
        $aboutContents['aboutText'] = About::where('key','aboutText')->first();
        $aboutContents['aboutImage'] = About::where('key','aboutImage')->first();
        $aboutContents['sloganText'] = About::where('key','slogan')->first();
        $aboutContents['skillText'] = About::where('key','skillText')->first();
        $aboutContents['philosophy'] = About::where('key', 'philosophy')->first();
        $aboutContents['whyUs'] = About::where('key','whyUs')->first();
        $histories = History::all();
        $skills = Skill::all();
        $team = Team::all();
        $slogans = Slogan::all();
        return view('about-us',compact(['histories','team','skills','slogans', 'aboutContents']));
    }
}
