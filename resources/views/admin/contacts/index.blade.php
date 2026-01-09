<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Contact Submissions
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="GET" action="{{ route('admin.contacts.index') }}"
      class="mb-4 flex gap-3">

    <input type="text"
           name="search"
           value="{{ $search ?? '' }}"
           placeholder="Search by name, email or phone"
           class="w-72 border-gray-300 rounded px-3 py-2">

    <button type="submit"
            class="px-4 py-2 bg-indigo-600 text-white rounded">
        Search
    </button>

    @if(!empty($search))
        <a href="{{ route('admin.contacts.index') }}"
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
                        <th class="px-4 py-2 text-left">Phone</th>
                        <th class="px-4 py-2 text-left">Submitted On</th>
                        <th class="px-4 py-2 text-right">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($contacts as $contact)
                        <tr class="border-t">
                            <td class="px-4 py-2">
                                {{ $contact->first_name }} {{ $contact->last_name }}
                            </td>
                            <td class="px-4 py-2">{{ $contact->business_email }}</td>
                            <td class="px-4 py-2">{{ $contact->phone }}</td>
                            <td class="px-4 py-2">
                                {{ $contact->created_at->format('d M Y, h:i A') }}
                            </td>
                            <td class="px-4 py-2 text-right">
                                <a href="{{ route('admin.contacts.show', $contact) }}"
                                   title="View Details"
                                   class="text-indigo-600 hover:text-indigo-800">
                                    👁 View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-6 text-gray-500">
                                No contact submissions found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $contacts->links() }}
        </div>

    </div>
</x-app-layout>
