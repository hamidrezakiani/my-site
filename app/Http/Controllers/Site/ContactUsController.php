<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $contactSettings = [];
        $contactSettings['address'] = ContactSetting::where('name','ADDRESS')->first();
        $contactSettings['email'] = ContactSetting::where('name','EMAIL')->first();
        $contactSettings['phone_sales'] = ContactSetting::where('name','PHONE_SALES')->first();
        $contactSettings['phone_support'] = ContactSetting::where('name','PHONE_SUPPORT')->first();
        $contactSettings['days'] = ContactSetting::where('name','DAYS')->first();
        $contactSettings['hours'] = ContactSetting::where('name','HOURS')->first();
        return view('contact-us',compact('contactSettings'));
    }
}
