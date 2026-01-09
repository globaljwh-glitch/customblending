<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Add Industry</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded p-6">

            <form method="POST"
                  action="{{ route('admin.industries.store') }}"
                  enctype="multipart/form-data">
                @csrf

                <input required name="name" placeholder="Industry Name"
                       class="w-full border rounded mb-4">

                <div class="grid grid-cols-3 gap-4 mb-4">
                    <input name="title1" placeholder="Sub Title 1" class="border rounded">
                    <input required name="title2" placeholder="Title" class="border rounded">
                    <input required name="title3" placeholder="Sub Title 2" class="border rounded">
                </div>

                <textarea required name="description" id="description-editor"
                          rows="4"
                          class="w-full border rounded mb-4"
                          placeholder="Description"></textarea>

                <input type="file" name="image" class="mb-4">

                <label class="inline-flex items-center mb-6">
                    <input type="checkbox" name="status" checked
                           class="rounded border-gray-300 text-indigo-600">
                    <span class="ml-2">Active</span>
                </label>

                <div class="text-right">
                    <button class="px-6 py-2 bg-indigo-600 text-white rounded">
                        Save Industry
                    </button>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        ClassicEditor
                            .create(document.querySelector('#description-editor'))
                            .catch(error => {
                                console.error(error);
                            });
                    });
                </script>
            </form>
        </div>
    </div>
</x-app-layout>
