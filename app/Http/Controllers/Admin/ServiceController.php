<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display list of services
     */
    public function index()
    {
        $services = Service::latest()->paginate(10);

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store new service
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'            => 'nullable|string|max:255',
            'title1'          => 'nullable|string|max:255',
            'title2'          => 'nullable|string|max:255',
            'title3'          => 'nullable|string|max:255',
            'description'     => 'nullable|string',
            'highlight_block' => 'nullable|string',
            'status'          => 'nullable|boolean',
            'image'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Checkbox handling
        $data['status'] = $request->has('status');

        // Image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('services', 'public');
        }

        // Build dynamic JSON
        $data['extra_data'] = [
            'black_box'  => $request->black_box ?? [],
            'plus_minus' => $request->plus_minus ?? [],
            'industry'   => $request->industry ?? [],
        ];

        Service::create($data);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service created successfully');
    }

    /**
     * Show edit form
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update service
     */
    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'name'            => 'nullable|string|max:255',
            'title1'          => 'nullable|string|max:255',
            'title2'          => 'nullable|string|max:255',
            'title3'          => 'nullable|string|max:255',
            'description'     => 'nullable|string',
            'highlight_block' => 'nullable|string',
            'status'          => 'nullable|boolean',
            'image'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Checkbox handling
        $data['status'] = $request->has('status');

        // Image update
        if ($request->hasFile('image')) {
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }

            $data['image'] = $request->file('image')
                ->store('services', 'public');
        }

        // Update JSON sections
        $data['extra_data'] = [
            'black_box'  => $request->black_box ?? [],
            'plus_minus' => $request->plus_minus ?? [],
            'industry'   => $request->industry ?? [],
        ];

        $service->update($data);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service updated successfully');
    }

    /**
     * Delete service
     */
    public function destroy(Service $service)
    {
        if ($service->image && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service deleted successfully');
    }
}
