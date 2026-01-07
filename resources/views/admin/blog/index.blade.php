<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Blog List
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Success Message --}}
            @if(session('success'))
                <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">Blogs</h3>
                <a href="{{ route('admin.blog.create') }}"
                   class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                    + Add Blog
                </a>
            </div>

            <div class="bg-white shadow rounded overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">ID</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Title</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Author</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Created</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($blogs as $blog)
                            <tr>
                                <td class="px-4 py-3">{{ $blog->id }}</td>
                                <td class="px-4 py-3">{{ $blog->title }}</td>
                                <td class="px-4 py-3">{{ $blog->author }}</td>
                                <td class="px-4 py-3">
                                    {{ $blog->created_at->format('d M Y') }}
                                </td>
                                <td class="px-4 py-3 space-x-3">
                                    <a href="{{ route('admin.blog.edit', $blog->id) }}"
                                       class="text-indigo-600 hover:underline">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.blog.delete', $blog->id) }}"
                                          method="POST"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-red-600 hover:underline"
                                                onclick="return confirm('Delete this blog?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5"
                                    class="px-4 py-6 text-center text-gray-500">
                                    No blogs found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="p-4">
                    {{ $blogs->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
