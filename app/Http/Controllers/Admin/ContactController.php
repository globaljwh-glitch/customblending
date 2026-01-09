<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Contact listing
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $contacts = Contact::when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('business_email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(15)
            ->withQueryString(); // IMPORTANT

        return view('admin.contacts.index', compact('contacts', 'search'));
    }


    /**
     * View single contact
     */
    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }
}
