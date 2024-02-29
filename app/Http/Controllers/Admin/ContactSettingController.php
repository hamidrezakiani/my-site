<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactSettingRequest;
use App\Models\ContactSetting;
use Illuminate\Http\Request;

class ContactSettingController extends Controller
{
    public function index(ContactSettingRequest $request)
    {
        $contactSettings = [];
        $contactSettings['address'] = ContactSetting::where('name','ADDRESS')->first();
        $contactSettings['email'] = ContactSetting::where('name','EMAIL')->first();
        $contactSettings['phone_sales'] = ContactSetting::where('name','PHONE_SALES')->first();
        $contactSettings['phone_support'] = ContactSetting::where('name','PHONE_SUPPORT')->first();
        $contactSettings['days'] = ContactSetting::where('name','DAYS')->first();
        $contactSettings['hours'] = ContactSetting::where('name','HOURS')->first();
        return view('admin.contactus.index',compact('contactSettings'));
    }

    public function update(ContactSettingRequest $request)
    {
        ContactSetting::where('name', 'ADDRESS')->update([
            'value' => $request->address['en'],
            'value_fa' => $request->address['fa'],
            'value_ar' => $request->address['ar'] ?? '',
        ]);
        ContactSetting::where('name', 'DAYS')->update([
            'value' => $request->days['en'],
            'value_fa' => $request->days['fa'],
            'value_ar' => $request->days['ar'] ?? '',
        ]);
        ContactSetting::where('name', 'HOURS')->update([
            'value' => $request->hours['en'],
            'value_fa' => $request->hours['fa'],
            'value_ar' => $request->hours['ar'] ?? ''
        ]);
        ContactSetting::where('name', 'EMAIL')->update([
            'value' => $request->email
        ]);
        ContactSetting::where('name', 'PHONE_SALES')->update([
            'value' => $request->phone_sales['en'],
            'value_fa' => $request->phone_sales['fa'],
            'value_ar' => $request->phone_sales['ar'] ?? '',
        ]);
        ContactSetting::where('name', 'PHONE_SUPPORT')->update([
            'value' => $request->phone_support['en'],
            'value_fa' => $request->phone_support['fa'],
            'value_ar' => $request->phone_support['ar'] ?? '',
        ]);

        return redirect()->back()->withErrors(['update' => 'SUCCESS']);
    }
}
