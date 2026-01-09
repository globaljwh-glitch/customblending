<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Edit Industry</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded p-6">

            <form method="POST"
                  action="{{ route('admin.industries.update', $industry) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                        <label class="block text-sm font-medium">Short Service Name</label>
                    <input required name="name" value="{{ $industry->name }}"
                        class="w-full border rounded mb-4">
                </div>

                <div class="grid grid-cols-3 gap-4 mb-4">
                    <input placeholder="Sub Title 1" name="title1" value="{{ $industry->title1 }}" class="border rounded">
                    <input placeholder="Title" required name="title2" value="{{ $industry->title2 }}" class="border rounded">
                    <input placeholder="Sub Title 2" required name="title3" value="{{ $industry->title3 }}" class="border rounded">
                </div>

                <textarea required name="description" id="description-editor" 
                          rows="4"
                          class="w-full border rounded mb-4">{{ $industry->description }}</textarea>

                @if($industry->image)
                    <img src="{{ asset('storage/'.$industry->image) }}"
                         class="h-32 mb-3 rounded border">
                @endif

                <input type="file" name="image" class="mb-4">

                <label class="inline-flex items-center mb-6">
                    <input type="checkbox" name="status"
                           {{ $industry->status ? 'checked' : '' }}
                           class="rounded border-gray-300 text-indigo-600">
                    <span class="ml-2">Active</span>
                </label>

                <div class="text-right">
                    <button class="px-6 py-2 bg-indigo-600 text-white rounded">
                        Update Industry
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
