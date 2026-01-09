<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Contact Details
        </h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded p-6">

            <div class="grid grid-cols-2 gap-6">

                <div>
                    <p class="text-sm text-gray-500">First Name</p>
                    <p class="font-semibold">{{ $contact->first_name }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Last Name</p>
                    <p class="font-semibold">{{ $contact->last_name }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Business Email</p>
                    <p class="font-semibold">{{ $contact->business_email }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Company Name</p>
                    <p class="font-semibold">{{ $contact->company_name }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Phone Number</p>
                    <p class="font-semibold">{{ $contact->phone }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">What Best Describes You</p>
                    <p class="font-semibold">{{ $contact->what_best_describe_you }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Industry</p>
                    <p class="font-semibold">{{ $contact->industry }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Submitted On</p>
                    <p class="font-semibold">
                        {{ $contact->created_at->format('d M Y, h:i A') }}
                    </p>
                </div>

                <div class="col-span-2">
                    <p class="text-sm text-gray-500">Message</p>
                    <p class="font-semibold whitespace-pre-line">
                        {{ $contact->message }}
                    </p>
                </div>

            </div>

            <div class="mt-6 text-right">
                <a href="{{ route('admin.contacts.index') }}"
                   class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                    Back to List
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
