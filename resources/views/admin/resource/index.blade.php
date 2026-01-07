<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Resource List
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 bg-green-100 text-green-800 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between mb-4">
                <h3 class="text-lg font-semibold">Resources</h3>
                <a href="{{ route('admin.resource.create') }}"
                   class="px-4 py-2 bg-indigo-600 text-white rounded">
                    + Add Resource
                </a>
            </div>

            <div class="bg-white shadow rounded">
                <table class="min-w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 text-left">Title</th>
                            <th class="p-3 text-left">Sub Title</th>
                            <th class="p-3">Featured</th>
                            <th class="p-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($resources as $resource)
                        <tr class="border-t">
                            <td class="p-3">{{ $resource->title }}</td>
                            <td class="p-3">{{ $resource->sub_title }}</td>
                            <td class="p-3 text-center">
                                {{ $resource->is_featured ? 'Yes' : 'No' }}
                            </td>
                            <td class="p-3 space-x-2">
                                <a href="{{ route('admin.resource.edit', $resource->id) }}"
                                   class="text-indigo-600">Edit</a>

                                <form method="POST"
                                      action="{{ route('admin.resource.delete', $resource->id) }}"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600"
                                            onclick="return confirm('Delete this resource?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="p-4">
                    {{ $resources->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
