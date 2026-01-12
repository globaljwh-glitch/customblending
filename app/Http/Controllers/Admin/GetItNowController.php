<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GetItNow;
use Illuminate\Http\Request;

class GetItNowController extends Controller
{
    /**
     * Listing page
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $submissions = GetItNow::when($search, function ($query, $search) {
                $query->where('first_name', 'like', "%{$search}%")
                      ->orWhere('last_name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('company_name', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.get-it-now.index', compact('submissions', 'search'));
    }

    /**
     * View single submission
     */
    public function show(GetItNow $getItNow)
    {
        return view('admin.get-it-now.show', compact('getItNow'));
    }
}
