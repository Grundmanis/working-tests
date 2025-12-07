<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('MyEvents') }}
        </h2>
    </x-slot>
    <div class="py-6 min-h-screen bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 flex justify-center">
        <div class="w-full max-w-7xl">

            <div class="flex justify-end mb-4">
                <a href="{{ route('dashboard.event.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-green-600 text-white font-semibold rounded-lg shadow hover:bg-green-700 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Event
                </a>
            </div>

            {{-- @include('pages.dashboard.partials.filters') --}}

            @include('pages.dashboard.partials.eventsTable')

        </div>
    </div>

</x-app-layout>
