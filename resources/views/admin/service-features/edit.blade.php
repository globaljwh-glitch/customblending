<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            {{ isset($feature) ? 'Edit Feature' : 'Add Feature' }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto">
        <div class="bg-white shadow rounded p-6">

            <form method="POST"
                  action="{{ isset($feature)
                        ? route('admin.services.features.update', [$service, $feature])
                        : route('admin.services.features.store', $service) }}"
                  enctype="multipart/form-data">

                @csrf
                @isset($feature) @method('PUT') @endisset

                <input name="title"
                       value="{{ old('title', $feature->title ?? '') }}"
                       placeholder="Title"
                       class="w-full mb-3 border rounded p-2">

                <input name="sub_title"
                       value="{{ old('sub_title', $feature->sub_title ?? '') }}"
                       placeholder="Sub Title"
                       class="w-full mb-3 border rounded p-2">

                <textarea name="description"
                          class="w-full mb-3 border rounded p-2"
                          placeholder="Description">{{ old('description', $feature->description ?? '') }}</textarea>

                <input type="file" name="image" class="mb-3">

                <input type="number" name="display_order"
                       value="{{ old('display_order', $feature->display_order ?? 0) }}"
                       class="mb-3 border rounded p-2"
                       placeholder="Display Order">

                <label class="flex items-center gap-2">
                    <input type="checkbox" name="status" value="1"
                           {{ old('status', $feature->status ?? true) ? 'checked' : '' }}>
                    Active
                </label>

                <button class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded">
                    Save
                </button>

            </form>

        </div>
    </div>
</x-app-layout>
