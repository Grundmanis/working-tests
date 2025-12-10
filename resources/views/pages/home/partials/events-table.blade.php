<!-- Table Section -->
<div class="items-center w-full bg-white rounded-lg shadow-md mt-8">
    <div class="mx-auto">
        <div class="overflow-x-auto">

            <table class="w-full table-auto">
                <thead>
                    <tr class="text-sm font-normal text-gray-600 border-t border-b text-left bg-gray-50">
                        <th class="px-4 py-3">{{ __('title') }}</th>
                        <th class="px-4 py-3">{{ __('participants') }}</th>
                        <th class="px-4 py-3">{{ __('dates') }}</th>
                        <th class="px-4 py-3">{{ __('status') }}</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                </thead>
                <tbody class="text-sm font-normal text-gray-700">
                    @foreach ($events as $event)
                        <tr class="py-10 cursor-pointer border-b border-gray-200 hover:bg-gray-100"
                            onclick="toggleDescription('{{ $event->id }}')">
                            <td class="flex flex-row items-center px-4 py-d4">
                                <div class="flex w-10 h-10 mr-4">
                                    <a href="#" class="relative block">
                                        <img alt="profil" src="https://cdn-icons-png.flaticon.com/512/323/323271.png"
                                            class="object-cover w-10 h-10 mx-auto rounded-md" />
                                    </a>
                                </div>
                                <div class="flex-1 pl-1">
                                    <div class="font-medium">
                                        {{ $event->organization ? $event->organization->name : $event->user->name }}
                                    </div>
                                    <div class="text-sm text-blue-600">
                                        {{ $event->name }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4">
                                <div x-data="{ showParticipants: false }" class="relative">
                                    <button @click.stop="showParticipants = true"
                                        class="flex items-center justify-center gap-1 text-blue-600 hover:text-blue-800 font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m10-3.13a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                        <span>0 / {{ $event->total_discipline_participants }}</span>
                                    </button>

                                    <!-- Modal Overlay -->
                                    <div x-show="showParticipants" x-cloak @click.self="showParticipants = false"
                                        class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
                                        x-transition.opacity>
                                        <!-- Modal Content -->
                                        <div @click.stop
                                            class="bg-white rounded-xl shadow-2xl p-6 w-full max-w-lg relative"
                                            x-transition.scale>
                                            <!-- Close Button -->
                                            <button @click="showParticipants = false"
                                                class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
                                                ✕
                                            </button>

                                            <h3 class="text-lg font-semibold mb-4 text-gray-800">
                                                {{ __('participants') }}</h3>

                                            <table class="w-full border border-gray-200 text-sm">
                                                <thead class="bg-gray-100">
                                                    <tr>
                                                        <th class="p-2 text-left border">{{ __('name') }}</th>
                                                        <th class="p-2 text-left border">{{ __('class') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="hover:bg-gray-50">
                                                        <td class="p-2 border">John Doe</td>
                                                        <td class="p-2 border">A</td>
                                                    </tr>
                                                    <tr class="hover:bg-gray-50">
                                                        <td class="p-2 border">Jane Smith</td>
                                                        <td class="p-2 border">B</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>

                            </td>
                            <td class="px-4 py-4">
                                {{ $event->start_date }}-{{ $event->end_date }}
                            </td>
                            <td>
                                <div class="flex items-center pl-1">
                                    {{-- <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div> --}}
                                    @if ($event->registration_status === 'Open')
                                        <button type="button"
                                            onclick="event.stopPropagation(); window.location.href='{{ route('events.registerForm', $event->id) }}'"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Register</button>
                                    @else
                                        {{ $event->registration_status }}
                                    @endif

                                </div>
                            </td>
                            <td class="p-4">
                                <div id="{{ $event->id }}Toggle"
                                    class="text-white bg-gray-100 border rounded-lg px-4 py-4 text-center inline-flex items-center">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z">
                                        </path>
                                    </svg>
                                </div>
                            </td>
                        </tr>
                        <tr id="{{ $event->id }}Description" class="hidden border-t border-gray-200">
                            <td class="px-4 py-4" colspan="5">
                                <div class="w-full p-6 bg-white rounded-xl shadow-md space-y-6">

                                    <!-- Registration Period -->
                                    <div
                                        class="p-4 bg-gray-100 rounded-lg flex flex-col md:flex-row justify-between items-start md:items-center">
                                        <div>
                                            <h2 class="text-lg font-semibold text-gray-800">
                                                {{ __('registrationPeriod') }}</h2>
                                            <p class="text-gray-600">
                                                {{ $event->registration_start }}–{{ $event->registration_end }}</p>
                                        </div>
                                        @if ($event->days_left_to_registration_start)
                                            <span
                                                class="mt-2 md:mt-0 text-sm font-medium text-blue-600">{{ $event->days_left_to_registration_start }}
                                                {{ __('daysLeft') }}</span>
                                        @endif
                                    </div>

                                    <div
                                        class="p-4 bg-gray-100 rounded-lg flex flex-col md:flex-row justify-between items-start md:items-center mt-4 space-y-2 md:space-y-0">
                                        <div>
                                            <h2 class="text-lg font-semibold text-gray-800">{{ __('location') }}</h2>
                                            <p class="text-gray-600">{{ $event->location->address }}</p>
                                            <div class="mt-1 flex flex-wrap gap-2">
                                                <a href="https://www.google.com/maps/search/?api=1&query=Example+Street+12+Hämeenlinna"
                                                    target="_blank"
                                                    class="text-blue-600 hover:underline text-sm font-medium">Google
                                                    Maps</a>
                                                <a href="https://waze.com/ul?ll=60.995,24.465&navigate=yes"
                                                    target="_blank"
                                                    class="text-blue-600 hover:underline text-sm font-medium">Waze</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Judiciary -->
                                    <div class="p-4 bg-gray-50 rounded-lg">
                                        <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ __('judges') }}</h2>
                                        <ul class="list-disc list-inside text-gray-700 space-y-1">
                                            @foreach ($event->judges as $judge)
                                                <li>{{ $judge->name }}</li>
                                            @endforeach
                                        </ul>
                                        @if ($event->secretary)
                                            <p class="mt-2 text-gray-700">
                                                <span class="font-medium">{{ __('examSecretary') }}:</span>
                                                {{ $event->secretary }}
                                            </p>
                                        @endif
                                    </div>

                                    @if ($event->description)
                                        <!-- Additional Information -->
                                        <div class="p-4 bg-gray-50 rounded-lg">
                                            <h2 class="text-lg font-semibold text-gray-800 mb-2">
                                                {{ __('additionalInformation') }}</h2>
                                            <p class="text-gray-700 space-y-2">
                                                {{ $event->description }}
                                            </p>
                                        </div>
                                    @endif

                                    <!-- Participants / Test Sites Table -->
                                    <div class="p-4 bg-gray-50 rounded-lg overflow-x-auto">
                                        <h2 class="text-lg font-semibold text-gray-800 mb-3">{{ __('participants') }}
                                        </h2>
                                        <table class="min-w-full border border-gray-300">
                                            <thead class="bg-gray-100">
                                                <tr>
                                                    <th class="border border-gray-300 px-4 py-2 text-left">
                                                        {{ __('class') }}</th>
                                                    <th class="border border-gray-300 px-4 py-2 text-left">
                                                        {{ __('day') }}</th>
                                                    <th class="border border-gray-300 px-4 py-2 text-left">
                                                        {{ __('palces') }}</th>
                                                    <th class="border border-gray-300 px-4 py-2 text-left">
                                                        {{ __('registered') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white">
                                                @foreach ($event->disciplines as $discipline)
                                                    <tr class="hover:bg-gray-50">
                                                        <td class="border border-gray-300 px-4 py-2">
                                                            {{ $discipline->name }}</td>
                                                        <td class="border border-gray-300 px-4 py-2">
                                                            {{ $discipline->pivot->day }}</td>
                                                        <td class="border border-gray-300 px-4 py-2">
                                                            {{ $discipline->pivot->max_participants }}</td>
                                                        <td class="border border-gray-300 px-4 py-2">0</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Payment Information -->
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

<script>
    let activeDescriptionId = null;

    function toggleDescription(userId) {
        const descriptionRow = document.getElementById(`${userId}Description`);
        const toggleIcon = document.getElementById(`${userId}Toggle`).querySelector('svg');

        if (activeDescriptionId !== null && activeDescriptionId !== userId) {
            const activeDescriptionRow = document.getElementById(`${activeDescriptionId}Description`);
            const activeToggleIcon = document.getElementById(`${activeDescriptionId}Toggle`).querySelector('svg');
            activeDescriptionRow.classList.add('hidden');
            activeToggleIcon.classList.remove('flipped-icon');
        }

        descriptionRow.classList.toggle('hidden');
        toggleIcon.classList.toggle('flipped-icon');

        if (!descriptionRow.classList.contains('hidden')) {
            activeDescriptionId = userId;
        } else {
            activeDescriptionId = null;
        }
    }
</script>
