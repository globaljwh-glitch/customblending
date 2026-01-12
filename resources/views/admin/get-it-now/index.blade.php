<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Get It Now Submissions
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- Search --}}
        <form method="GET"
              action="{{ route('admin.get-it-now.index') }}"
              class="mb-4 flex gap-3">
            <input type="text"
                   name="search"
                   value="{{ $search ?? '' }}"
                   placeholder="Search by name, email, company"
                   class="w-72 border-gray-300 rounded px-3 py-2">

            <button class="px-4 py-2 bg-indigo-600 text-white rounded">
                Search
            </button>

            @if($search)
                <a href="{{ route('admin.get-it-now.index') }}"
                   class="px-4 py-2 bg-gray-200 rounded">
                    Clear
                </a>
            @endif
        </form>

        <div class="bg-white shadow rounded overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Company</th>
                        <!-- <th class="px-4 py-2 text-left">Page</th> -->
                        <th class="px-4 py-2 text-left">Submitted</th>
                        <th class="px-4 py-2 text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($submissions as $item)
                        <tr class="border-t">
                            <td class="px-4 py-2">
                                {{ $item->first_name }} {{ $item->last_name }}
                            </td>
                            <td class="px-4 py-2">{{ $item->email }}</td>
                            <td class="px-4 py-2">{{ $item->company_name }}</td>
                            <!-- <td class="px-4 py-2">{{ $item->page_name }}</td> -->
                            <td class="px-4 py-2">
                                {{ $item->created_at->format('d M Y') }}
                            </td>
                            <td class="px-4 py-2 text-right">
                                <a href="{{ route('admin.get-it-now.show', $item) }}"
                                   class="text-indigo-600 hover:underline">
                                    👁 View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6"
                                class="text-center py-6 text-gray-500">
                                No submissions found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $submissions->links() }}
        </div>

    </div>
</x-app-layout>
