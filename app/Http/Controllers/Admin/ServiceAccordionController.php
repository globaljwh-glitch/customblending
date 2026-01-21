<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceAccordion;
use Illuminate\Http\Request;

class ServiceAccordionController extends Controller
{
    public function index(Service $service)
    {
        $accordions = $service->accordions;

        return view('admin.service-accordions.index', compact('service', 'accordions'));
    }

    public function create(Service $service)
    {
        return view('admin.service-accordions.create', compact('service'));
    }

    public function store(Request $request, Service $service)
    {
        $data = $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'display_order' => 'nullable|integer',
            'status'        => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        $service->accordions()->create($data);

        return redirect()
            ->route('admin.services.accordions.index', $service)
            ->with('success', 'Accordion added successfully');
    }

    public function edit(Service $service, ServiceAccordion $accordion)
    {
        abort_if($accordion->service_id !== $service->id, 404);

        return view('admin.service-accordions.edit', compact('service', 'accordion'));
    }

    public function update(Request $request, Service $service, ServiceAccordion $accordion)
    {
        abort_if($accordion->service_id !== $service->id, 404);

        $data = $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'display_order' => 'nullable|integer',
            'status'        => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        $accordion->update($data);

        return redirect()
            ->route('admin.services.accordions.index', $service)
            ->with('success', 'Accordion updated successfully');
    }

    public function destroy(Service $service, ServiceAccordion $accordion)
    {
        abort_if($accordion->service_id !== $service->id, 404);

        $accordion->delete();

        return back()->with('success', 'Accordion deleted successfully');
    }
}
