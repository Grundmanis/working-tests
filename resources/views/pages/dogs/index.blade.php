<x-web-layout>

    <!-- Navigation Block -->
    <div
        class="bg-white shadow-md rounded-lg px-6 py-4 mb-8 flex flex-col md:flex-row md:items-center md:justify-between border border-gray-100 mt-8">
        <!-- Breadcrumbs -->
        <nav class="text-sm text-gray-500 mb-3 md:mb-0">
            <ol class="list-reset flex flex-wrap items-center">
                <li>
                    <a href="/" class="text-blue-600 hover:underline font-medium">{{ __('events') }}</a>
                </li>
                <li><span class="mx-2 text-gray-400">/</span></li>
                <li class="text-gray-700 font-semibold">{{ __('myDogs') }}</li>
            </ol>
        </nav>

        <!-- Add New Dog Button -->
        <a href="{{ route('dogs.create') }}"
            class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            {{ __('addNewDog') }}
        </a>
    </div>

    <div class="items-center w-full bg-white rounded-lg shadow-md mt-8 mb-8">
        <div class="mx-auto">
            <div class="overflow-x-auto">

                <table class="w-full table-auto">
                    <thead>
                        <tr class="text-sm font-normal text-gray-600 border-t border-b text-left bg-gray-50">
                            <th class="px-4 py-3">{{ __('registeredName') }}</th>
                            <th class="px-4 py-3">{{ __('homeName') }}</th>
                            <th class="px-4 py-3">{{ __('registrationNumber') }}</th>
                            <th class="px-4 py-3">{{ __('microchip') }}</th>
                            <th class="px-4 py-3">{{ __('dob') }}</th>
                            <th class="px-4 py-3">{{ __('gender') }}</th>
                            <th class="px-4 py-3">{{ __('breed') }}</th>
                            <th class="px-4 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-normal text-gray-700">
                        @foreach ($dogs as $dog)
                            <tr onclick="event.stopPropagation(); window.location.href='{{ route('dogs.edit', $dog->id) }}'"
                                class="py-10 cursor-pointer border-b border-gray-200 hover:bg-gray-100">
                                <td class="px-4 py-4">
                                    <div class="font-medium">{{ $dog->registeredName }}</div>
                                </td>
                                <td class="px-4 py-4">
                                    <div class="font-medium">{{ $dog->homeName }}</div>
                                </td>
                                <td class="px-4 py-4">
                                    <div class="font-medium">{{ $dog->registrationNumber }}</div>
                                </td>
                                <td>
                                    <div class="font-medium">{{ $dog->microchip }}</div>
                                </td>
                                <td class="p-4">
                                    <div class="font-medium">{{ $dog->dob }}</div>
                                </td>
                                <td class="p-4">
                                    <div class="font-medium">{{ $dog->gender }}</div>
                                </td>
                                <td class="p-4">
                                    <div class="font-medium">{{ $dog->breed }}</div>
                                </td>
                                <td class="p-4">
                                    <button type="button"
                                        onclick="event.stopPropagation(); window.location.href='{{ route('dogs.edit', $dog->id) }}'"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Payment Information -->


</x-web-layout>
