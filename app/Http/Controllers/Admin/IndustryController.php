<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::latest()->paginate(10);
        return view('admin.industries.index', compact('industries'));
    }

    public function create()
    {
        return view('admin.industries.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'nullable|string|max:255',
            'title1'      => 'nullable|string|max:255',
            'title2'      => 'nullable|string|max:255',
            'title3'      => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data['status'] = $request->has('status');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('industries', 'public');
        }

        Industry::create($data);

        return redirect()->route('admin.industries.index')
            ->with('success', 'Industry created successfully');
    }

    public function edit(Industry $industry)
    {
        return view('admin.industries.edit', compact('industry'));
    }

    public function update(Request $request, Industry $industry)
    {
        $data = $request->validate([
            'name'        => 'nullable|string|max:255',
            'title1'      => 'nullable|string|max:255',
            'title2'      => 'nullable|string|max:255',
            'title3'      => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data['status'] = $request->has('status');

        if ($request->hasFile('image')) {
            if ($industry->image && Storage::disk('public')->exists($industry->image)) {
                Storage::disk('public')->delete($industry->image);
            }

            $data['image'] = $request->file('image')
                ->store('industries', 'public');
        }

        $industry->update($data);

        return redirect()->route('admin.industries.index')
            ->with('success', 'Industry updated successfully');
    }

    public function destroy(Industry $industry)
    {
        if ($industry->image && Storage::disk('public')->exists($industry->image)) {
            Storage::disk('public')->delete($industry->image);
        }

        $industry->delete();

        return redirect()->route('admin.industries.index')
            ->with('success', 'Industry deleted successfully');
    }
}
