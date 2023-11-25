<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::simplePaginate(10);
        return view('backend.contact.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        return view('backend.contact.view', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contact.index')->with('status', 'Contact deleted successfully !!');
    }
}
