<div class="flex text-gray-700 rounded-lg bg-white w-full bg-white rounded-lg shadow-md mt-8 ">
    <div class="p-4 rounded-lg w-full">
        <form class="space-y-4">
            <!-- First Row: Inputs and dropdowns -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Events From -->
                <div class="flex flex-col">
                    <label class="mb-1 text-gray-700 font-medium" for="event-from">{{ __('eventsFrom') }}</label>
                    <input type="date" id="event-from"
                        class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
                </div>

                <!-- Event Ending -->
                {{-- <div class="flex flex-col">
              <label class="mb-1 text-gray-700 font-medium" for="event-end">Event Ending</label>
              <input type="date" id="event-end" class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
              </div> --}}

                <!-- Event Type -->
                <div class="flex flex-col">
                    <label class="mb-1 text-gray-700 font-medium" for="event-type">{{ __('eventType') }}</label>
                    <select id="event-type"
                        class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">{{ __('all') }}</option>
                        <option value="competition">Competition</option>
                        <option value="training">Training</option>
                        <option value="seminar">Seminar</option>
                    </select>
                </div>

                <!-- Organizer -->
                <div class="flex flex-col">
                    <label class="mb-1 text-gray-700 font-medium" for="organizer">{{ __('organizer') }}</label>
                    <select id="organizer"
                        class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">{{ __('all') }}</option>
                        <option value="kari-husso">Kari Husso</option>
                        <option value="ville-pekka-reinio">Ville-Pekka Reinio</option>
                        <option value="soile-reinio">Soile Reinio</option>
                    </select>
                </div>

                <!-- Judge -->
                <div class="flex flex-col">
                    <label class="mb-1 text-gray-700 font-medium" for="judge">{{ __('judge') }}</label>
                    <select id="judge"
                        class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">{{ __('all') }}</option>
                        <option value="kari-husso">Kari Husso</option>
                        <option value="ville-pekka-reinio">Ville-Pekka Reinio</option>
                        <option value="soile-reinio">Soile Reinio</option>
                    </select>
                </div>
            </div>

            <!-- Second Row: Toggles -->
            <div class="flex flex-col md:flex-row md:items-center md:space-x-6 space-y-2 md:space-y-0">
                <div class="flex items-center">
                    <input id="reg-open" type="checkbox" class="w-5 h-5 text-blue-600 border-gray-300 rounded" />
                    <label for="reg-open" class="ml-2 text-gray-700 font-medium">{{ __('registrationIsOpen') }}</label>
                </div>

                <div class="flex items-center">
                    <input id="reg-soon" type="checkbox" class="w-5 h-5 text-blue-600 border-gray-300 rounded" />
                    <label for="reg-soon" class="ml-2 text-gray-700 font-medium">{{ __('registrationSoon') }}</label>
                </div>
            </div>
        </form>
    </div>
</div>
