<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">Industries</h2>
            <a href="{{ route('admin.industries.create') }}"
               class="px-4 py-2 bg-indigo-600 text-white rounded">
                + Add Industry
            </a>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="mx-6 mt-4 bg-green-50 text-green-700 p-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="px-4 py-2">Industry Name</th>
                        <th class="px-4 py-2">Sub Title 1</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Sub Title 2</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($industries as $industry)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $industry->name }}</td>
                            <td class="px-4 py-2">{{ $industry->title1 }}</td>
                            <td class="px-4 py-2">{{ $industry->title2 }}</td>
                            <td class="px-4 py-2">{{ $industry->title3 }}</td>
                            <td class="px-4 py-2">
                                {{ $industry->status ? 'Active' : 'Inactive' }}
                            </td>
                            <td class="px-4 py-2 text-right">
                                <a href="{{ route('admin.industries.edit', $industry) }}"
                                   class="text-indigo-600 mr-3">Edit</a>

                                <form method="POST"
                                      action="{{ route('admin.industries.destroy', $industry) }}"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Delete this industry?')"
                                            class="text-red-600">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $industries->links() }}
        </div>
    </div>
</x-app-layout>
