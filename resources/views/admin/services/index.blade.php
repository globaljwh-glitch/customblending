<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Services
            </h2>

            <a href="{{ route('admin.services.create') }}"
               class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                + Add Service
            </a>
        </div>
    </x-slot>

    @if (session('success'))
        <div class="mx-6 mt-4 bg-green-50 text-green-700 p-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-gray-100 text-left">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2 text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($services as $service)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $service->id }}</td>
                                <td class="px-4 py-2">{{ $service->name }}</td>
                                <td class="px-4 py-2">{{ $service->title1 }}</td>

                                <td class="px-4 py-2">
                                    @if ($service->status)
                                        <span class="text-green-600 font-semibold">Active</span>
                                    @else
                                        <span class="text-red-600 font-semibold">Inactive</span>
                                    @endif
                                </td>

                                <td class="px-4 py-2 text-right">
                                    <a href="{{ route('admin.services.edit', $service) }}"
                                       class="text-indigo-600 hover:underline mr-3">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.services.destroy', $service) }}"
                                          method="POST"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                onclick="return confirm('Delete this service?')"
                                                class="text-red-600 hover:underline">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-6 text-gray-500">
                                    No services found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $services->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
