<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            {{ isset($media) ? 'Edit Media Section' : 'Add Media Section' }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto">
        <div class="bg-white shadow rounded p-6">

            <form method="POST"
                  action="{{ isset($media)
                        ? route('admin.services.media.update', [$service, $media])
                        : route('admin.services.media.store', $service) }}"
                  enctype="multipart/form-data">

                @csrf
                @isset($media) @method('PUT') @endisset

                <input name="title"
                       value="{{ old('title', $media->title ?? '') }}"
                       placeholder="Title"
                       class="w-full mb-3 border rounded p-2">

                <textarea name="description"
                          class="w-full mb-3 border rounded p-2"
                          placeholder="Description">{{ old('description', $media->description ?? '') }}</textarea>

                <select name="media_type" class="w-full mb-3 border rounded p-2">
                    <option value="image" @selected(old('media_type', $media->media_type ?? '') === 'image')>Image</option>
                    <option value="video" @selected(old('media_type', $media->media_type ?? '') === 'video')>Video</option>
                </select>

                <input type="file" name="media_file" class="mb-3">
                <input type="text" name="media_path" placeholder="Video URL (if video)"
                       value="{{ old('media_path', $media->media_path ?? '') }}"
                       class="w-full mb-3 border rounded p-2">

                <input type="file" name="thumbnail" class="mb-3">

                <input type="number" name="display_order"
                       value="{{ old('display_order', $media->display_order ?? 0) }}"
                       class="w-full mb-3 border rounded p-2"
                       placeholder="Display Order">

                <label class="flex items-center gap-2">
                    <input type="checkbox" name="status" value="1"
                           {{ old('status', $media->status ?? true) ? 'checked' : '' }}>
                    Active
                </label>

                <button class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded">
                    Save
                </button>

            </form>

        </div>
    </div>
</x-app-layout>
