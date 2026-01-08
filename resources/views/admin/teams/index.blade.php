<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Team Members List
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 rounded bg-green-50 p-4 text-sm text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between mb-4">
                <h3 class="text-lg font-semibold">Members</h3>
                <a href="{{ route('admin.teams.create') }}"
                   class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                    + Add Team Member
                </a>
            </div>

            <div class="bg-white shadow rounded overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Order</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Name</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Designation</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Status</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @foreach ($teams as $team)
                            <tr>
                                <td class="px-4 py-2">{{ $team->display_order }}</td>

                                <td class="px-4 py-2">
                                    <div class="flex items-center gap-2">
                                        @if ($team->image)
                                            <img src="{{ asset('storage/'.$team->image) }}"
                                                 class="h-10 w-10 rounded-full object-cover">
                                        @endif
                                        <span>{{ $team->first_name }} {{ $team->last_name }}</span>
                                    </div>
                                </td>

                                <td class="px-4 py-2">{{ $team->designation }}</td>

                                <td class="px-4 py-2">
                                    @if ($team->status)
                                        <span class="text-green-600 font-medium">Active</span>
                                    @else
                                        <span class="text-red-600 font-medium">Inactive</span>
                                    @endif
                                </td>

                                <td class="px-4 py-2">
                                    <a href="{{ route('admin.teams.edit', $team->id) }}"
                                       class="text-indigo-600 hover:underline mr-2">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.teams.destroy', $team->id) }}"
                                          method="POST"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Delete this team member?')"
                                                class="text-red-600 hover:underline">
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
                {{ $teams->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
