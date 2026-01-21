<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceIndustry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceIndustryController extends Controller
{
    public function index(Service $service)
    {
        $industries = $service->industries;

        return view('admin.service-industries.index', compact('service', 'industries'));
    }

    public function create(Service $service)
    {
        return view('admin.service-industries.create', compact('service'));
    }

    public function store(Request $request, Service $service)
    {
        $data = $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'icon'          => 'nullable|image|max:1024',
            'image'         => 'nullable|image|max:2048',
            'display_order' => 'nullable|integer',
            'status'        => 'nullable|boolean',
        ]);

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')
                ->store('service-industries/icons', 'public');
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('service-industries/images', 'public');
        }

        $data['status'] = $request->has('status');

        $service->industries()->create($data);

        return redirect()
            ->route('admin.services.industries.index', $service)
            ->with('success', 'Industry added successfully');
    }

    public function edit(Service $service, ServiceIndustry $industry)
    {
        abort_if($industry->service_id !== $service->id, 404);

        return view('admin.service-industries.edit', compact('service', 'industry'));
    }

    public function update(Request $request, Service $service, ServiceIndustry $industry)
    {
        abort_if($industry->service_id !== $service->id, 404);

        $data = $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'icon'          => 'nullable|image|max:1024',
            'image'         => 'nullable|image|max:2048',
            'display_order' => 'nullable|integer',
            'status'        => 'nullable|boolean',
        ]);

        if ($request->hasFile('icon')) {
            if ($industry->icon) {
                Storage::disk('public')->delete($industry->icon);
            }

            $data['icon'] = $request->file('icon')
                ->store('service-industries/icons', 'public');
        }

        if ($request->hasFile('image')) {
            if ($industry->image) {
                Storage::disk('public')->delete($industry->image);
            }

            $data['image'] = $request->file('image')
                ->store('service-industries/images', 'public');
        }

        $data['status'] = $request->has('status');

        $industry->update($data);

        return redirect()
            ->route('admin.services.industries.index', $service)
            ->with('success', 'Industry updated successfully');
    }

    public function destroy(Service $service, ServiceIndustry $industry)
    {
        abort_if($industry->service_id !== $service->id, 404);

        if ($industry->icon) {
            Storage::disk('public')->delete($industry->icon);
        }

        if ($industry->image) {
            Storage::disk('public')->delete($industry->image);
        }

        $industry->delete();

        return back()->with('success', 'Industry deleted successfully');
    }
}
