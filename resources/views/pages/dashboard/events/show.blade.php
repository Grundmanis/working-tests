<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $event->name }}
        </h2>
    </x-slot>


    <a href="{{ route('dashboard.event.edit', $event->id) }}" class="px-2 py-1 bg-green-600 rounded hover:bg-green-700">
        Edit
    </a>

    <div class="p-6 dark:bg-gray-900 min-h-screen dark:text-gray-200 flex justify-center">
        <div class="w-full max-w-6xl">

            <!-- Registration Period -->
            <div
                class="p-4 bg-gray-100 rounded-lg flex flex-col md:flex-row justify-between items-start md:items-center">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">Registration Period</h2>
                    <p class="text-gray-600">{{ $event->registration_start }}–{{ $event->registration_end }}</p>
                </div>
                @if ($event->days_left_to_registration_start)
                    <span
                        class="mt-2 md:mt-0 text-sm font-medium text-blue-600">{{ $event->days_left_to_registration_start }}
                        days left</span>
                @endif
            </div>

            <div
                class="p-4 bg-gray-100 rounded-lg flex flex-col md:flex-row justify-between items-start md:items-center mt-4 space-y-2 md:space-y-0">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">Location</h2>
                    <p class="text-gray-600">{{ $event->location->address }}</p>
                    <div class="mt-1 flex flex-wrap gap-2">
                        <a href="https://www.google.com/maps/search/?api=1&query=Example+Street+12+Hämeenlinna"
                            target="_blank" class="text-blue-600 hover:underline text-sm font-medium">Google Maps</a>
                        <a href="https://waze.com/ul?ll=60.995,24.465&navigate=yes" target="_blank"
                            class="text-blue-600 hover:underline text-sm font-medium">Waze</a>
                    </div>
                </div>
            </div>

            <!-- Judiciary -->
            <div class="p-4 bg-gray-50 rounded-lg">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">Judge(s)</h2>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    @foreach ($event->judges as $judge)
                        <li>{{ $judge->name }}</li>
                    @endforeach
                </ul>
                @if ($event->secretary)
                    <p class="mt-2 text-gray-700">
                        <span class="font-medium">Exam secretary:</span> {{ $event->secretary }}
                    </p>
                @endif
            </div>

            @if ($event->description)
                <!-- Additional Information -->
                <div class="p-4 bg-gray-50 rounded-lg">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Additional Information</h2>
                    <p class="text-gray-700 space-y-2">
                        {{ $event->description }}
                    </p>
                </div>
            @endif

            <!-- Participants / Test Sites Table -->
            <div class="p-4 bg-gray-50 rounded-lg overflow-x-auto">
                <h2 class="text-lg font-semibold text-gray-800 mb-3">Participants</h2>
                <table class="min-w-full border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-left">Class</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Day(s)</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Places</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Priority</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Non-priority</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2">Beginners</td>
                            <td class="border border-gray-300 px-4 py-2">Sun 2.11.</td>
                            <td class="border border-gray-300 px-4 py-2">31</td>
                            <td class="border border-gray-300 px-4 py-2">0</td>
                            <td class="border border-gray-300 px-4 py-2">17</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2">Open</td>
                            <td class="border border-gray-300 px-4 py-2">Sun 2.11.</td>
                            <td class="border border-gray-300 px-4 py-2">22</td>
                            <td class="border border-gray-300 px-4 py-2">0</td>
                            <td class="border border-gray-300 px-4 py-2">9</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2">Winner</td>
                            <td class="border border-gray-300 px-4 py-2">Sun 2.11.</td>
                            <td class="border border-gray-300 px-4 py-2">37</td>
                            <td class="border border-gray-300 px-4 py-2">0</td>
                            <td class="border border-gray-300 px-4 py-2">15</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</x-app-layout>
