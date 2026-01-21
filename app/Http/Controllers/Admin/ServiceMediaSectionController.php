<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceMediaSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceMediaSectionController extends Controller
{
    public function index(Service $service)
    {
        $sections = $service->mediaSections;

        return view('admin.service-media-sections.index', compact('service', 'sections'));
    }

    public function create(Service $service)
    {
        return view('admin.service-media-sections.create', compact('service'));
    }

    public function store(Request $request, Service $service)
    {
        $data = $request->validate([
            'title'         => 'nullable|string|max:255',
            'description'   => 'nullable|string',
            'media_type'    => 'required|in:image,video',
            'media_path'    => 'nullable|string',
            'media_file'    => 'nullable|file|mimes:jpg,jpeg,png,webp,mp4',
            'thumbnail'     => 'nullable|image|max:2048',
            'display_order' => 'nullable|integer',
            'status'        => 'nullable|boolean',
        ]);

        if ($request->media_type === 'image' && $request->hasFile('media_file')) {
            $data['media_path'] = $request->file('media_file')
                ->store('service-media/images', 'public');
        }

        if ($request->media_type === 'video') {
            $data['media_path'] = $request->media_path; // YouTube/Vimeo URL
        }

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')
                ->store('service-media/thumbnails', 'public');
        }

        $data['status'] = $request->has('status');

        $service->mediaSections()->create($data);

        return redirect()
            ->route('admin.services.media.index', $service)
            ->with('success', 'Media section added successfully');
    }

    public function edit(Service $service, ServiceMediaSection $media)
    {
        abort_if($media->service_id !== $service->id, 404);

        return view('admin.service-media-sections.edit', compact('service', 'media'));
    }

    public function update(Request $request, Service $service, ServiceMediaSection $media)
    {
        abort_if($media->service_id !== $service->id, 404);

        $data = $request->validate([
            'title'         => 'nullable|string|max:255',
            'description'   => 'nullable|string',
            'media_type'    => 'required|in:image,video',
            'media_path'    => 'nullable|string',
            'media_file'    => 'nullable|file|mimes:jpg,jpeg,png,webp,mp4',
            'thumbnail'     => 'nullable|image|max:2048',
            'display_order' => 'nullable|integer',
            'status'        => 'nullable|boolean',
        ]);

        if ($request->media_type === 'image' && $request->hasFile('media_file')) {
            if ($media->media_path) {
                Storage::disk('public')->delete($media->media_path);
            }

            $data['media_path'] = $request->file('media_file')
                ->store('service-media/images', 'public');
        }

        if ($request->media_type === 'video') {
            $data['media_path'] = $request->media_path;
        }

        if ($request->hasFile('thumbnail')) {
            if ($media->thumbnail) {
                Storage::disk('public')->delete($media->thumbnail);
            }

            $data['thumbnail'] = $request->file('thumbnail')
                ->store('service-media/thumbnails', 'public');
        }

        $data['status'] = $request->has('status');

        $media->update($data);

        return redirect()
            ->route('admin.services.media.index', $service)
            ->with('success', 'Media section updated successfully');
    }

    public function destroy(Service $service, ServiceMediaSection $media)
    {
        abort_if($media->service_id !== $service->id, 404);

        if ($media->media_path && $media->media_type === 'image') {
            Storage::disk('public')->delete($media->media_path);
        }

        if ($media->thumbnail) {
            Storage::disk('public')->delete($media->thumbnail);
        }

        $media->delete();

        return back()->with('success', 'Media section deleted successfully');
    }
}
