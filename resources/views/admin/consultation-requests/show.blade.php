<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Consultation Requests
        </h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded p-6">

            <div class="grid grid-cols-2 gap-6">

                <div>
                    <p class="text-sm text-gray-500">First Name</p>
                    <p class="font-semibold">{{ $consultationRequest->first_name }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Last Name</p>
                    <p class="font-semibold">{{ $consultationRequest->last_name }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Business Email</p>
                    <p class="font-semibold">{{ $consultationRequest->business_email }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Phone Number</p>
                    <p class="font-semibold">{{ $consultationRequest->phone }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Company Name</p>
                    <p class="font-semibold">{{ $consultationRequest->company_name }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">
                        What Best Describes You
                    </p>
                    <p class="font-semibold">
                        {{ $consultationRequest->what_best_describe_you }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">
                        Industry
                    </p>
                    <p class="font-semibold">
                        {{ $consultationRequest->industry }}
                    </p>
                </div>

                <!-- <div>
                    <p class="text-sm text-gray-500">
                        Services Interested In
                    </p>
                    @if(is_array($consultationRequest->services_interested_in))
                        <ul class="list-disc pl-5">
                            @foreach($consultationRequest->services_interested_in as $service)
                                <li>{{ $service }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="font-semibold">—</p>
                    @endif
                </div> -->

                <div>
                    <p class="text-sm text-gray-500">Description</p>
                    <p class="font-semibold">{{ $consultationRequest->description }}</p>
                </div>

                @if(!empty($consultationRequest->other_data))
                    <!-- <div class="col-span-2">
                        <p class="text-sm text-gray-500">Other Data</p>
                        <pre class="bg-gray-100 p-3 rounded text-sm">
{{ json_encode($consultationRequest->other_data, JSON_PRETTY_PRINT) }}
                        </pre>
                    </div> -->
                @endif

                <div class="col-span-2">
                    <p class="text-sm text-gray-500">Submitted On</p>
                    <p class="font-semibold">
                        {{ $consultationRequest->created_at->format('d M Y, h:i A') }}
                    </p>
                </div>

            </div>

            <div class="mt-6 text-right">
                <a href="{{ route('admin.consultation-requests.index') }}"
                   class="px-4 py-2 bg-gray-200 rounded">
                    Back to List
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
