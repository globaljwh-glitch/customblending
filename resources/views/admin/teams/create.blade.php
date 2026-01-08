<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Team Member
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

                <form method="POST"
                      action="{{ route('admin.teams.store') }}"
                      enctype="multipart/form-data">
                    @csrf

                    {{-- Status --}}
                    <div class="mb-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox"
                                   name="status"
                                   value="1"
                                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                   checked>
                            <span class="ml-2 text-sm text-gray-700">Active</span>
                        </label>
                    </div>

                    {{-- First Name --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            First Name
                        </label>
                        <input type="text"
                               name="first_name"
                               value="{{ old('first_name') }}"
                               class="mt-1 block w-full border-gray-300 rounded"
                               required>
                    </div>

                    {{-- Last Name --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Last Name
                        </label>
                        <input type="text"
                               name="last_name"
                               value="{{ old('last_name') }}"
                               class="mt-1 block w-full border-gray-300 rounded">
                    </div>

                    {{-- Designation --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Designation
                        </label>
                        <input type="text"
                               name="designation"
                               value="{{ old('designation') }}"
                               class="mt-1 block w-full border-gray-300 rounded">
                    </div>

                    {{-- Bio --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Bio
                        </label>
                        <textarea id="bio-editor" name="bio"
                                  rows="4"
                                  class="mt-1 block w-full border-gray-300 rounded">{{ old('bio') }}</textarea>
                    </div>

                    {{-- LinkedIn URL --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            LinkedIn URL
                        </label>
                        <input type="url"
                               name="linkedin_url"
                               value="{{ old('linkedin_url') }}"
                               class="mt-1 block w-full border-gray-300 rounded">
                    </div>

                    {{-- Display Order --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Display Order
                        </label>
                        <input type="number"
                               name="display_order"
                               value="{{ old('display_order', 0) }}"
                               class="mt-1 block w-full border-gray-300 rounded">
                    </div>

                    {{-- Image --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Team Member Image
                        </label>
                        <input type="file"
                               name="image"
                               accept="image/*"
                               class="mt-1 block w-full border-gray-300 rounded">
                    </div>

                    {{-- Submit --}}
                    <div class="flex justify-end">
                        <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                            Save
                        </button>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            ClassicEditor
                                .create(document.querySelector('#bio-editor'))
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
