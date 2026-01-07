<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'author' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                                    ->store('blogs', 'public');
        }

        Blog::create($data);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog created successfully');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'author' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {

            // Delete old image
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }

            // Store new image
            $data['image'] = $request->file('image')
                                    ->store('blogs', 'public');
        }

        $blog->update($data);

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Blog updated successfully');
    }

    
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // Delete image first
        if ($blog->image && Storage::disk('public')->exists($blog->image)) {
            Storage::disk('public')->delete($blog->image);
        }

        // Then delete blog record
        $blog->delete();

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Blog deleted successfully');
    }
}
