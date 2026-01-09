<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Service
        </h2>
    </x-slot>

    @php
        $extraData = $service->extra_data ?? [];
    @endphp


    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded p-6">

                <form method="POST"
                      action="{{ route('admin.services.update', $service) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium">Short Service Name</label>
                        <input name="name" value="{{ $service->name }}"
                               class="mt-1 w-full border-gray-300 rounded"
                               placeholder="Service Name" required>
                    </div>

                    <div class="grid grid-cols-3 gap-4 mb-4">
                        <input name="title1" value="{{ $service->title1 }}" placeholder="Sub Title 1" class="border-gray-300 rounded">
                        <input required name="title2" value="{{ $service->title2 }}" placeholder="Full Service Name" class="border-gray-300 rounded">
                        <input required name="title3" value="{{ $service->title3 }}" placeholder="Sub Title 2" class="border-gray-300 rounded">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium">Description</label>
                        <textarea required name="description" id="description-editor"
                              class="w-full border-gray-300 rounded mb-4"
                              rows="4">{{ $service->description }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium">Highlight Block</label>
                        <textarea name="highlight_block" id="highlight-editor"
                              class="w-full border-gray-300 rounded mb-4"
                              rows="3">{{ $service->highlight_block }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium">Image</label>
                        <input type="file" name="image" class="mb-4">
                        @if ($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}"
                                alt="Service Image"
                                class="h-32 rounded border">
                        @endif
                    </div>

                    <label class="inline-flex items-center mb-6">Status &nbsp;&nbsp;
                        <input type="checkbox" name="status" value="1"
                               {{ $service->status ? 'checked' : '' }}
                               class="rounded border-gray-300 text-indigo-600">
                        <span class="ml-2">Active</span>
                    </label>

                    <!-- <div id="black-box-wrapper"></div>
                    <div id="plus-minus-wrapper"></div>
                    <div id="industry-wrapper"></div> -->
                    <h3 class="text-lg font-bold mt-6 mb-2">Black Box Section</h3>
                    <div id="black-box-wrapper"></div>
                    <button type="button"
                            onclick="addBlackBox()"
                            class="mt-2 px-3 py-1 bg-indigo-600 text-white rounded">
                        + Add Black Box
                    </button>

                    <h3 class="text-lg font-bold mt-6 mb-2">Plus / Minus Section</h3>
                    <div id="plus-minus-wrapper"></div>
                    <button type="button" onclick="addPlusMinus()" class="mt-2 px-3 py-1 bg-indigo-600 text-white rounded">
                                            + Add Plus/Minus
                    </button>

                    <h3 class="text-lg font-bold mt-6 mb-2">Industry Section</h3>
                    <div id="industry-wrapper"></div>
                    <button type="button"
                            onclick="addIndustryItem()"
                            class="mt-2 px-3 py-1 bg-indigo-600 text-white rounded">
                        + Add Industry Item
                    </button>



                    {{-- Existing JSON data can be looped here similarly --}}
                    <div class="text-right">
                        <button class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                            Update Service
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

                <script>
                    const existingData = @json($extraData);
                </script>

            </div>
        </div>
    </div>
</x-app-layout>

<script>
    console.log('EXTRA DATA FROM PHP:', @json($service->extra_data));
</script>

@include('admin.services.partials.scripts')
