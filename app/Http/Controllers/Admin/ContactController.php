<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(ContactRequest $request)
    {
        $contacts = Contact::orderBy('isNew','DESC')->orderBy('created_at','DESC')->get();
        return view('admin.contact.index',compact('contacts'));
    }

    public function show($id,ContactRequest $request)
    {
        $contact = Contact::find($id);
        $contact->isNew = 0;
        $contact->save();
        return view('admin.contact.show',compact('contact'));
    }
}
