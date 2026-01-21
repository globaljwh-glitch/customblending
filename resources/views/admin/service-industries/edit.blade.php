<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            {{ isset($industry) ? 'Edit Industry' : 'Add Industry' }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto">
        <div class="bg-white shadow rounded p-6">

            <form method="POST"
                  action="{{ isset($industry)
                        ? route('admin.services.industries.update', [$service, $industry])
                        : route('admin.services.industries.store', $service) }}"
                  enctype="multipart/form-data">

                @csrf
                @isset($industry) @method('PUT') @endisset

                <input name="title"
                       value="{{ old('title', $industry->title ?? '') }}"
                       placeholder="Industry Title"
                       class="w-full mb-3 border rounded p-2">

                <textarea name="description"
                          class="w-full mb-3 border rounded p-2"
                          placeholder="Description">{{ old('description', $industry->description ?? '') }}</textarea>

                <label class="block mb-2 text-sm">Icon</label>
                <input type="file" name="icon" class="mb-3">

                <label class="block mb-2 text-sm">Image (optional)</label>
                <input type="file" name="image" class="mb-3">

                <input type="number"
                       name="display_order"
                       value="{{ old('display_order', $industry->display_order ?? 0) }}"
                       class="w-full mb-3 border rounded p-2"
                       placeholder="Display Order">

                <label class="flex items-center gap-2">
                    <input type="checkbox"
                           name="status"
                           value="1"
                           {{ old('status', $industry->status ?? true) ? 'checked' : '' }}>
                    Active
                </label>

                <button class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded">
                    Save
                </button>

            </form>

        </div>
    </div>
</x-app-layout>
