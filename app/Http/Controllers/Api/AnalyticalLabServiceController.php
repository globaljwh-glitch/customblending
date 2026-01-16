<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AnalyticalLabService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminFormNotification;
use App\Mail\UserFormConfirmation;

class AnalyticalLabServiceController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name'    => 'nullable|string|max:255',
            'last_name'     => 'nullable|string|max:255',
            'company_name'  => 'nullable|string|max:255',
            'position'      => 'nullable|string|max:255',
            'email'         => 'nullable|email|max:255',
            'phone'         => 'nullable|string|max:50',
            'interested_in' => 'nullable|string|max:255',
            'message'       => 'nullable|string',
            'type'          => 'nullable|string|max:100',
            'page_name'     => 'nullable|string|max:255',
            'extra_data'    => 'nullable|array',
        ]);

        $record = AnalyticalLabService::create($data);

        // Mail::to(config('mail.admin_email'))
        //     ->send(new AdminFormNotification(
        //         'New Analytical Lab Services Request Submission',
        //         $record->toArray()
        //     ));

        // Mail::to($record->email)
        //     ->send(new UserFormConfirmation(
        //         $record->first_name,
        //         'Thank you for your interest. We have received your request.'
        //     ));

        return response()->json([
            'success' => true,
            'message' => 'Analytical Lab Service request submitted successfully',
            'data'    => $record,
        ], 201);
    }
}
