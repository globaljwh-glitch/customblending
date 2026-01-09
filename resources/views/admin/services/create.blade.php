<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Service
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="mx-6 mt-4 bg-red-50 p-4 text-red-700 rounded">
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
                      action="{{ route('admin.services.store') }}"
                      enctype="multipart/form-data">
                    @csrf

                    {{-- Name --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium">Short Service Name</label>
                        <input name="name"
                               class="mt-1 w-full border-gray-300 rounded"
                               placeholder="Service Name" required>
                    </div>

                    {{-- Titles --}}
                    <div class="grid grid-cols-3 gap-4 mb-4">
                        <input name="title1" placeholder="Sub Title 1" class="border-gray-300 rounded">
                        <input required name="title2" placeholder="Full Service Name" class="border-gray-300 rounded">
                        <input required name="title3" placeholder="Sub Title 2" class="border-gray-300 rounded">
                    </div>

                    {{-- Description --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium">Description</label>
                        <textarea required name="description" id="description-editor"
                                  rows="4"
                                  class="mt-1 w-full border-gray-300 rounded"></textarea>
                    </div>

                    {{-- Highlight Block --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium">Highlight Block</label>
                        <textarea name="highlight_block" id="highlight-editor"
                                  rows="3"
                                  class="mt-1 w-full border-gray-300 rounded"></textarea>
                    </div>

                    {{-- Image --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium">Image</label>
                        <input type="file" name="image" class="mt-1 w-full border-gray-300 rounded">
                    </div>

                    {{-- Status --}}
                    <div class="mb-6">
                        <label class="inline-flex items-center">Status &nbsp;&nbsp;
                            <input type="checkbox" name="status" value="1" checked
                                   class="rounded border-gray-300 text-indigo-600">
                            <span class="ml-2 text-sm">Active</span>
                        </label>
                    </div>

                    {{-- JSON Sections --}}
                    <h3 class="font-semibold mb-2">Black Box</h3>
                    <div id="black-box-wrapper"></div>
                    <button type="button" onclick="addBlackBox()" class="text-indigo-600 text-sm mb-4">
                        + Add Black Box
                    </button>

                    <h3 class="font-semibold mb-2">Plus / Minus</h3>
                    <div id="plus-minus-wrapper"></div>
                    <button type="button" onclick="addPlusMinus()" class="text-indigo-600 text-sm mb-4">
                        + Add Plus/Minus
                    </button>

                    <h3 class="font-semibold mb-2">Industry</h3>
                    <input name="industry[title]" placeholder="Industry Title"
                           class="w-full border-gray-300 rounded mb-2">
                    <textarea name="industry[description]"
                              class="w-full border-gray-300 rounded mb-2"
                              placeholder="Industry Description"></textarea>
                    <div id="industry-wrapper"></div>
                    <button type="button" onclick="addIndustryItem()" class="text-indigo-600 text-sm mb-6">
                        + Add Industry Item
                    </button>

                    <div class="text-right">
                        <button class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                            Save Service
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
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            ClassicEditor
                                .create(document.querySelector('#highlight-editor'))
                                .catch(error => {
                                    console.error(error);
                                });
                        });
                    </script>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        addBlackBox();
        addPlusMinus();
        addIndustryItem();
    });
</script>

@include('admin.services.partials.scripts')
