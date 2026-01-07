<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Blog Listing
     * GET /api/blogs
     */
    public function index()
    {
        return response()->json(
            Blog::latest()->paginate(10)
        );
    }

    /**
     * Add New Blog
     * POST /api/blogs
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|string',
            'author'      => 'nullable|string|max:255',
        ]);

        $blog = Blog::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Blog created successfully',
            'data' => $blog,
        ], 201);
    }

    /**
     * Blog Details
     * GET /api/blogs/{id}
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);

        return response()->json($blog);
    }

    /**
     * Update Blog
     * PUT /api/blogs/{id}
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|string',
            'author'      => 'nullable|string|max:255',
        ]);

        $blog->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Blog updated successfully',
            'data' => $blog,
        ]);
    }

    /**
     * Delete Blog
     * DELETE /api/blogs/{id}
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return response()->json([
            'status' => true,
            'message' => 'Blog deleted successfully',
        ]);
    }
}
