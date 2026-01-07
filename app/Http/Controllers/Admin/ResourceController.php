<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::latest()->paginate(10);
        return view('admin.resource.index', compact('resources'));
    }

    public function create()
    {
        return view('admin.resource.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_featured' => 'nullable|in:on,1,true,false',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data['is_featured'] = $request->boolean('is_featured');


        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                                     ->store('resources', 'public');
        }

        //$data['is_featured'] = $request->has('is_featured');

        Resource::create($data);

        return redirect()
            ->route('admin.resource.index')
            ->with('success', 'Resource created successfully');
    }

    public function edit($id)
    {
        $resource = Resource::findOrFail($id);
        return view('admin.resource.edit', compact('resource'));
    }

    public function update(Request $request, $id)
    {
        $resource = Resource::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($resource->image) {
                Storage::disk('public')->delete($resource->image);
            }

            $data['image'] = $request->file('image')
                                     ->store('resources', 'public');
        }

        $data['is_featured'] = $request->has('is_featured');

        $resource->update($data);

        return redirect()
            ->route('admin.resource.index')
            ->with('success', 'Resource updated successfully');
    }

    public function destroy($id)
    {
        $resource = Resource::findOrFail($id);

        if ($resource->image) {
            Storage::disk('public')->delete($resource->image);
        }

        $resource->delete();

        return redirect()
            ->route('admin.resource.index')
            ->with('success', 'Resource deleted successfully');
    }
}
