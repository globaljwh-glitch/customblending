<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Resource
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="mb-4 rounded bg-red-50 p-4 text-sm text-red-700">
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

                <form method="POST" action="{{ route('admin.resource.store') }}"
                    enctype="multipart/form-data">

                    @csrf
                    <div class="mb-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox"
                                name="is_featured"
                                value="1"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                            <span class="ml-2 text-sm text-gray-700">Featured</span>
                        </label>
                    </div>


                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text"
                               name="title"
                               class="mt-1 block w-full border-gray-300 rounded"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Sub Title</label>
                        <input type="text"
                               name="sub_title"
                               class="mt-1 block w-full border-gray-300 rounded"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description"
                                  rows="4"
                                  class="mt-1 block w-full border-gray-300 rounded"
                                  required></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Resource Image
                        </label>

                        <input type="file"
                            name="image"
                            accept="image/*"
                            class="mt-1 block w-full border-gray-300 rounded">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                            Save
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>
