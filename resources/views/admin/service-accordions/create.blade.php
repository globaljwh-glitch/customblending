<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            {{ isset($accordion) ? 'Edit Accordion' : 'Add Accordion' }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto">
        <div class="bg-white shadow rounded p-6">

            <form method="POST"
                  action="{{ isset($accordion)
                        ? route('admin.services.accordions.update', [$service, $accordion])
                        : route('admin.services.accordions.store', $service) }}">

                @csrf
                @isset($accordion) @method('PUT') @endisset

                <input name="title"
                       value="{{ old('title', $accordion->title ?? '') }}"
                       placeholder="Accordion Title"
                       class="w-full mb-3 border rounded p-2">

                <textarea name="description"
                          class="w-full mb-3 border rounded p-2"
                          placeholder="Description">{{ old('description', $accordion->description ?? '') }}</textarea>

                <input type="number"
                       name="display_order"
                       value="{{ old('display_order', $accordion->display_order ?? 0) }}"
                       class="w-full mb-3 border rounded p-2"
                       placeholder="Display Order">

                <label class="flex items-center gap-2">
                    <input type="checkbox"
                           name="status"
                           value="1"
                           {{ old('status', $accordion->status ?? true) ? 'checked' : '' }}>
                    Active
                </label>

                <button class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded">
                    Save
                </button>

            </form>

        </div>
    </div>
</x-app-layout>
