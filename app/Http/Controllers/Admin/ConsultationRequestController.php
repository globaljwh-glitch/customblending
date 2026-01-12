<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConsultationRequest;
use Illuminate\Http\Request;

class ConsultationRequestController extends Controller
{
    /**
     * List consultation requests
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $consultations = ConsultationRequest::when($search, function ($query, $search) {
                $query->where('first_name', 'like', "%{$search}%")
                      ->orWhere('last_name', 'like', "%{$search}%")
                      ->orWhere('business_email', 'like', "%{$search}%")
                      ->orWhere('company_name', 'like', "%{$search}%")
                      ->orWhere('phone', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.consultation-requests.index', compact('consultations', 'search'));
    }

    /**
     * View single consultation request
     */
    public function show(ConsultationRequest $consultationRequest)
    {
        return view(
            'admin.consultation-requests.show',
            compact('consultationRequest')
        );
    }
}
