<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ConsultationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminFormNotification;
use App\Mail\UserFormConfirmation;

class ConsultationRequestController extends Controller
{
    /**
     * Store consultation request
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name'               => 'nullable|string|max:255',
            'last_name'                => 'nullable|string|max:255',
            'business_email'           => 'nullable|email|max:255',
            'company_name'             => 'nullable|string|max:255',
            'phone'                    => 'nullable|string|max:50',
            'what_best_describe_you'   => 'nullable|string|max:255',
            'industry'                 => 'nullable|string|max:255',
            'description'              => 'nullable|string',
            'type'                     => 'nullable|string|max:100',
            'page_name'                => 'nullable|string|max:255',
            'extra_data'               => 'nullable|array',
        ]);

        $consultation = ConsultationRequest::create($data);

        // Mail::to(config('mail.admin_email'))
        //     ->send(new AdminFormNotification(
        //         'New Consultation Request',
        //         $consultation->toArray()
        //     ));

        // Mail::to($consultation->business_email)
        //     ->send(new UserFormConfirmation(
        //         $consultation->first_name,
        //         'Thank you for requesting a consultation. Our team will reach out soon.'
        //     ));


        return response()->json([
            'success' => true,
            'message' => 'Consultation request submitted successfully',
            'data'    => $consultation,
        ], 201);
    }
}
