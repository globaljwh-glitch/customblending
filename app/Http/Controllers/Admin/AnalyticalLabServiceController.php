<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnalyticalLabService;
use Illuminate\Http\Request;

class AnalyticalLabServiceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $records = AnalyticalLabService::when($search, function ($query, $search) {
                $query->where('first_name', 'like', "%{$search}%")
                      ->orWhere('last_name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('company_name', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.analytical-lab-services.index', compact('records', 'search'));
    }

    public function show(AnalyticalLabService $analyticalLabService)
    {
        return view(
            'admin.analytical-lab-services.show',
            compact('analyticalLabService')
        );
    }
}
