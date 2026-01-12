<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GetItNow;
use Illuminate\Http\Request;

class GetItNowController extends Controller
{
    /**
     * Store Get It Now form submission
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name'               => 'nullable|string|max:255',
            'last_name'                => 'nullable|string|max:255',
            'email'                    => 'nullable|email|max:255',
            'company_name'             => 'nullable|string|max:255',
            'what_best_describe_you'   => 'nullable|string|max:255',
            'services_interested_in'   => 'nullable|array',
            'services_interested_in.*' => 'string|max:255',
            'page_name'                => 'nullable|string|max:255',
            'type'                     => 'nullable|string|max:100',
            'other_data'               => 'nullable|array',
        ]);

        $getItNow = GetItNow::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Form submitted successfully',
            'data'    => $getItNow,
        ], 201);
    }
}
