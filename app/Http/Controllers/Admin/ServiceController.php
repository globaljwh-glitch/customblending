<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'title1'      => 'nullable|string|max:255',
            'title2'      => 'nullable|string|max:255',
            'title3'      => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|max:2048',
            'status'      => 'nullable|boolean',

            'industry_section_title'       => 'nullable|string|max:255',
            'industry_section_description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                                     ->store('services', 'public');
        }

        $data['status'] = $request->has('status');

        $service = Service::create($data);

        return redirect()
            ->route('admin.services.edit', $service)
            ->with('success', 'Service created successfully');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'title1'      => 'nullable|string|max:255',
            'title2'      => 'nullable|string|max:255',
            'title3'      => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|max:2048',
            'status'      => 'nullable|boolean',

            'industry_section_title'       => 'nullable|string|max:255',
            'industry_section_description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }

            $data['image'] = $request->file('image')
                                     ->store('services', 'public');
        }

        $data['status'] = $request->has('status');

        $service->update($data);

        return back()->with('success', 'Service updated successfully');
    }

    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return back()->with('success', 'Service deleted successfully');
    }
}
