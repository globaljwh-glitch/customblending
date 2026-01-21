<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            {{ isset($service) ? 'Edit Service' : 'Add Service' }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto">
        <div class="bg-white shadow rounded p-6">
@if ($errors->any())
    <div class="mb-4 bg-red-50 border border-red-300 text-red-700 p-3 rounded">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <form method="POST"
                  action="{{ isset($service)
                        ? route('admin.services.update', $service)
                        : route('admin.services.store') }}"
                  enctype="multipart/form-data">

                @csrf
                @isset($service) @method('PUT') @endisset

                <input name="name"
                       value="{{ old('name', $service->name ?? '') }}"
                       placeholder="Service Name"
                       class="w-full mb-3 border rounded p-2">

                <input name="title1"
                       value="{{ old('title1', $service->title1 ?? '') }}"
                       placeholder="Title 1"
                       class="w-full mb-3 border rounded p-2">

                <textarea name="description"
                          class="w-full mb-3 border rounded p-2"
                          placeholder="Description">{{ old('description', $service->description ?? '') }}</textarea>

                <input type="file" name="image" class="mb-3">

                <hr class="my-4">

                <h3 class="font-semibold mb-2">Industry Section</h3>

                <input name="industry_section_title"
                       value="{{ old('industry_section_title', $service->industry_section_title ?? '') }}"
                       placeholder="Industry Section Title"
                       class="w-full mb-3 border rounded p-2">

                <textarea name="industry_section_description"
                          class="w-full mb-3 border rounded p-2"
                          placeholder="Industry Section Description">{{ old('industry_section_description', $service->industry_section_description ?? '') }}</textarea>

                <label class="flex items-center gap-2">
                    <input type="checkbox" name="status"
                    value="1" {{ old('status', $service->status) ? 'checked' : '' }}>

                    Active
                </label>

                <button class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded">
                    Save
                </button>
            </form>

            @isset($service)
                <hr class="my-6">

                <h3 class="font-semibold mb-3">Manage Sections</h3>

                <div class="flex gap-3">
                    <a href="{{ route('admin.services.features.index', $service) }}">Features</a>
                    <a href="{{ route('admin.services.accordions.index', $service) }}">Accordions</a>
                    <a href="{{ route('admin.services.industries.index', $service) }}">Industries</a>
                    <a href="{{ route('admin.services.media.index', $service) }}">Media Sections</a>
                </div>
            @endisset

        </div>
    </div>
</x-app-layout>
