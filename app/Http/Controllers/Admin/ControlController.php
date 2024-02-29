<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ControlRequest;
use App\Models\Control;
use Illuminate\Http\Request;

class ControlController extends Controller
{
    public function edit(ControlRequest $request)
    {
        $controls = Control::all();
        return view('admin.control.index',compact('controls'));
    }

    public function update(ControlRequest $request)
    {
        $roleEnable = $request->ROLE == 'on';
        $arabicEnable = $request->ARABIC == 'on';
        $ticketEnable = $request->TICKET == 'on';
        Control::where('key','ROLE')->update([
            'enable' => $roleEnable
        ]);
        Control::where('key', 'ARABIC')->update([
            'enable' => $arabicEnable
        ]);
        Control::where('key', 'TICKET')->update([
            'enable' => $ticketEnable
        ]);
        return redirect()->back()->withErrors(['update' => 'SUCCESS']);
    }
}
