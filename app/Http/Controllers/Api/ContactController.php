<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'business_email' => 'nullable|email|max:255',
            'company_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'what_best_describe_you' => 'nullable|string|max:255',
            'industry' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        Contact::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Contact submitted successfully'
        ], 201);
    }
}
