<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Blog
        </h2>
    </x-slot>
    
    @if ($errors->any())
    <div class="mb-4 text-red-600">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded p-6">

                <form method="POST"
                      action="{{ route('admin.blog.update', $blog->id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text"
                               name="title"
                               value="{{ $blog->title }}"
                               class="mt-1 block w-full border-gray-300 rounded"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description"
                                  rows="4"
                                  class="mt-1 block w-full border-gray-300 rounded"
                                  required>{{ $blog->description }}</textarea>
                    </div>

                    {{-- Existing Image Preview --}}
                    @if($blog->image)
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">
                                Current Image
                            </label>
                            <img src="{{ asset('storage/' . $blog->image) }}"
                                 class="h-24 rounded border">
                        </div>
                    @endif

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Replace Image (optional)
                        </label>
                        <input type="file"
                               name="image"
                               accept="image/*"
                               class="mt-1 block w-full border-gray-300 rounded">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Author</label>
                        <input type="text"
                               name="author"
                               value="{{ $blog->author }}"
                               class="mt-1 block w-full border-gray-300 rounded">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                            Update
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>
