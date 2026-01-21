<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Media Sections – {{ $service->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Success Message --}}
            @if(session('success'))
                <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">Media Section List</h3>
                <a href="{{ route('admin.services.media.create', $service) }}"
                        class="mb-4 inline-block px-4 py-2 bg-indigo-600 text-white rounded">
                    + Add Media Section
                </a>
            </div>
    <!-- <div class="py-6 max-w-7xl mx-auto">

        <a href="{{ route('admin.services.media.create', $service) }}"
           class="mb-4 inline-block px-4 py-2 bg-indigo-600 text-white rounded">
            + Add Media Section
        </a> -->

        <div class="bg-white shadow rounded">
            <table class="w-full text-sm">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Type</th>
                        <th class="px-4 py-2">Order</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sections as $section)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $section->title }}</td>
                            <td class="px-4 py-2">{{ ucfirst($section->media_type) }}</td>
                            <td class="px-4 py-2">{{ $section->display_order }}</td>
                            <td class="px-4 py-2">
                                    @if ($section->status)
                                        <span class="text-green-600 font-medium">Active</span>
                                    @else
                                        <span class="text-red-600 font-medium">Inactive</span>
                                    @endif    
                            </td>
                            <td class="px-4 py-2 text-right">
                                <a href="{{ route('admin.services.media.edit', [$service, $section]) }}"
                                   class="text-indigo-600 mr-3">Edit</a>

                                <form method="POST"
                                      action="{{ route('admin.services.media.destroy', [$service, $section]) }}"
                                      class="inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Delete this media section?')"
                                            class="text-red-600">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5"
                                class="px-4 py-6 text-center text-gray-500">
                                No media sections added yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        </div>
    </div>
</x-app-layout>
