<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Service Accordions – {{ $service->name }}
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
                <h3 class="text-lg font-semibold">Service Accordion List</h3>
                <a href="{{ route('admin.services.accordions.create', $service) }}"
                        class="mb-4 inline-block px-4 py-2 bg-indigo-600 text-white rounded">
                    + Add Accordion
                </a>
            </div>
    <!-- <div class="py-6 max-w-7xl mx-auto">

        <a href="{{ route('admin.services.accordions.create', $service) }}"
           class="mb-4 inline-block px-4 py-2 bg-indigo-600 text-white rounded">
            + Add Accordion
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
                    @forelse($accordions as $accordion)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $accordion->title }}</td>
                            <td class="px-4 py-2">{{ $accordion->display_order }}</td>
                            <td class="px-4 py-2">
                                    @if ($accordion->status)
                                        <span class="text-green-600 font-medium">Active</span>
                                    @else
                                        <span class="text-red-600 font-medium">Inactive</span>
                                    @endif    
                            </td>
                            <td class="px-4 py-2 text-right">
                                <a href="{{ route('admin.services.accordions.edit', [$service, $accordion]) }}"
                                   class="text-indigo-600 mr-3">Edit</a>

                                <form method="POST"
                                      action="{{ route('admin.services.accordions.destroy', [$service, $accordion]) }}"
                                      class="inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Delete this accordion?')"
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
                                No accordions added yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        </div>
    </div>
</x-app-layout>
