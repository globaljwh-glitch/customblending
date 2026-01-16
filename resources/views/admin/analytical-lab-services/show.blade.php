<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Analytical Lab Service Details
        </h2>
    </x-slot>
    <div class="py-6 max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded p-6">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <p class="text-sm text-gray-500">Name</p>
                    <p class="font-semibold">
                        {{ $analyticalLabService->first_name }}
                        {{ $analyticalLabService->last_name }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Email</p>
                    <p class="font-semibold">{{ $analyticalLabService->email }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Company</p>
                    <p class="font-semibold">{{ $analyticalLabService->company_name }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Position</p>
                    <p class="font-semibold">{{ $analyticalLabService->position }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Phone</p>
                    <p class="font-semibold">{{ $analyticalLabService->phone }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Interested In</p>
                    <p class="font-semibold">{{ $analyticalLabService->interested_in }}</p>
                </div>

                <div class="col-span-2">
                    <p class="text-sm text-gray-500">Message</p>
                    <p class="font-semibold whitespace-pre-line">
                        {{ $analyticalLabService->message }}
                    </p>
                </div>

                <!-- @if($analyticalLabService->extra_data)
                    <div class="col-span-2">
                        <p class="text-sm text-gray-500">Extra Data</p>
                        <pre class="bg-gray-100 p-3 rounded text-sm">
    {{ json_encode($analyticalLabService->extra_data, JSON_PRETTY_PRINT) }}
                        </pre>
                    </div>
                @endif -->
            </div>
            <div class="mt-6 text-right">
                <a href="{{ route('admin.analytical-lab-services.index') }}"
                   class="px-4 py-2 bg-gray-200 rounded">
                    Back to List
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
