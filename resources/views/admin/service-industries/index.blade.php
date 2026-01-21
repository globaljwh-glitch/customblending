<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Service Industries – {{ $service->name }}
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
                <h3 class="text-lg font-semibold">Service Industry List</h3>
                <a href="{{ route('admin.services.industries.create', $service) }}"
                        class="mb-4 inline-block px-4 py-2 bg-indigo-600 text-white rounded">
                    + Add Industry
                </a>
            </div>
    <!-- <div class="py-6 max-w-7xl mx-auto">

        <a href="{{ route('admin.services.industries.create', $service) }}"
           class="mb-4 inline-block px-4 py-2 bg-indigo-600 text-white rounded">
            + Add Industry
        </a> -->

        <div class="bg-white shadow rounded">
            <table class="w-full text-sm">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Order</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($industries as $industry)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $industry->title }}</td>
                            <td class="px-4 py-2">{{ $industry->display_order }}</td>
                            <td class="px-4 py-2">
                                    @if ($industry->status)
                                        <span class="text-green-600 font-medium">Active</span>
                                    @else
                                        <span class="text-red-600 font-medium">Inactive</span>
                                    @endif    
                            </td>
                            <td class="px-4 py-2 text-right">
                                <a href="{{ route('admin.services.industries.edit', [$service, $industry]) }}"
                                   class="text-indigo-600 mr-3">Edit</a>

                                <form method="POST"
                                      action="{{ route('admin.services.industries.destroy', [$service, $industry]) }}"
                                      class="inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Delete this industry?')"
                                            class="text-red-600">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4"
                                class="px-4 py-6 text-center text-gray-500">
                                No industries added yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        </div>
    </div>
</x-app-layout>
