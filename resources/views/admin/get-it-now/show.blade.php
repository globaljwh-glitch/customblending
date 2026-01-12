<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Get It Now Details
        </h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded p-6">

            <div class="grid grid-cols-2 gap-6">

                <div>
                    <p class="text-sm text-gray-500">First Name</p>
                    <p class="font-semibold">{{ $getItNow->first_name }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Last Name</p>
                    <p class="font-semibold">{{ $getItNow->last_name }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Email</p>
                    <p class="font-semibold">{{ $getItNow->email }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Company</p>
                    <p class="font-semibold">{{ $getItNow->company_name }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">
                        What Best Describes You
                    </p>
                    <p class="font-semibold">
                        {{ $getItNow->what_best_describe_you }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">
                        Services Interested In
                    </p>
                    @if(is_array($getItNow->services_interested_in))
                        <ul class="list-disc pl-5">
                            @foreach($getItNow->services_interested_in as $service)
                                <li>{{ $service }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="font-semibold">—</p>
                    @endif
                </div>

                <!-- <div class="col-span-2">
                    <p class="text-sm text-gray-500">Page Name</p>
                    <p class="font-semibold">{{ $getItNow->page_name }}</p>
                </div>

                <div class="col-span-2">
                    <p class="text-sm text-gray-500">Type</p>
                    <p class="font-semibold">{{ $getItNow->type }}</p>
                </div> -->

                @if(!empty($getItNow->other_data))
                    <!-- <div class="col-span-2">
                        <p class="text-sm text-gray-500">Other Data</p>
                        <pre class="bg-gray-100 p-3 rounded text-sm">
{{ json_encode($getItNow->other_data, JSON_PRETTY_PRINT) }}
                        </pre>
                    </div> -->
                @endif

                <div class="col-span-2">
                    <p class="text-sm text-gray-500">Submitted On</p>
                    <p class="font-semibold">
                        {{ $getItNow->created_at->format('d M Y, h:i A') }}
                    </p>
                </div>

            </div>

            <div class="mt-6 text-right">
                <a href="{{ route('admin.get-it-now.index') }}"
                   class="px-4 py-2 bg-gray-200 rounded">
                    Back to List
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
