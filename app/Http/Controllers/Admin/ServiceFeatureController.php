<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceFeatureController extends Controller
{
    public function index(Service $service)
    {
        $features = $service->features;

        return view('admin.service-features.index', compact('service', 'features'));
    }

    public function create(Service $service)
    {
        return view('admin.service-features.create', compact('service'));
    }

    public function store(Request $request, Service $service)
    {
        $data = $request->validate([
            'title'         => 'nullable|string|max:255',
            'sub_title'     => 'nullable|string|max:255',
            'description'   => 'nullable|string',
            'image'         => 'nullable|image|max:2048',
            'display_order' => 'nullable|integer',
            'status'        => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('service-features', 'public');
        }

        $data['status'] = $request->has('status');

        $service->features()->create($data);

        return redirect()
            ->route('admin.services.features.index', $service)
            ->with('success', 'Feature added successfully');
    }

    public function edit(Service $service, ServiceFeature $feature)
    {
        abort_if($feature->service_id !== $service->id, 404);

        return view('admin.service-features.edit', compact('service', 'feature'));
    }

    public function update(Request $request, Service $service, ServiceFeature $feature)
    {
        abort_if($feature->service_id !== $service->id, 404);

        $data = $request->validate([
            'title'         => 'nullable|string|max:255',
            'sub_title'     => 'nullable|string|max:255',
            'description'   => 'nullable|string',
            'image'         => 'nullable|image|max:2048',
            'display_order' => 'nullable|integer',
            'status'        => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($feature->image) {
                Storage::disk('public')->delete($feature->image);
            }

            $data['image'] = $request->file('image')
                ->store('service-features', 'public');
        }

        $data['status'] = $request->has('status');

        $feature->update($data);

        return redirect()
            ->route('admin.services.features.index', $service)
            ->with('success', 'Feature updated successfully');
    }

    public function destroy(Service $service, ServiceFeature $feature)
    {
        abort_if($feature->service_id !== $service->id, 404);

        if ($feature->image) {
            Storage::disk('public')->delete($feature->image);
        }

        $feature->delete();

        return back()->with('success', 'Feature deleted successfully');
    }
}
