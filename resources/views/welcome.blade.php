<x-web-layout>

<style>
    .body {
      font-family: 'Plus Jakarta Sans', sans-serif;
    }
  
    .flipped-icon {
      transform: rotate(180deg);
    }
  </style>

    <!-- Navigation Block -->
    {{-- <div class="bg-white shadow-md rounded-xl px-6 py-4 mb-8 flex flex-col md:flex-row md:items-center md:justify-between border border-gray-100  mt-8 mb-8">
      <!-- Breadcrumbs -->
      <nav class="text-sm text-gray-500 mb-3 md:mb-0">
      <ol class="list-reset flex flex-wrap items-center">
        <li class="text-gray-700 font-semibold">Events</li>
      </ol>
      </nav>
    </div> --}}

    <!-- Filters Section -->
    <div class="flex text-gray-700 rounded-lg bg-white w-full bg-white rounded-lg shadow-md mt-8 ">
      <div class="p-4 rounded-lg w-full">
          <form class="space-y-4">
            <!-- First Row: Inputs and dropdowns -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Events From -->
                <div class="flex flex-col">
                <label class="mb-1 text-gray-700 font-medium" for="event-from">Events From</label>
                <input type="date" id="event-from" class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
                </div>
        
                <!-- Event Ending -->
                <div class="flex flex-col">
                <label class="mb-1 text-gray-700 font-medium" for="event-end">Event Ending</label>
                <input type="date" id="event-end" class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
                </div>
        
                <!-- Event Type -->
                <div class="flex flex-col">
                <label class="mb-1 text-gray-700 font-medium" for="event-type">Event Type</label>
                <select id="event-type" class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">All</option>
                    <option value="competition">Competition</option>
                    <option value="training">Training</option>
                    <option value="seminar">Seminar</option>
                </select>
                </div>
        
                <!-- Organizer -->
                <div class="flex flex-col">
                <label class="mb-1 text-gray-700 font-medium" for="organizer">Organizer</label>
                <select id="organizer" class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">All</option>
                    <option value="kari-husso">Kari Husso</option>
                    <option value="ville-pekka-reinio">Ville-Pekka Reinio</option>
                    <option value="soile-reinio">Soile Reinio</option>
                </select>
                </div>
        
                <!-- Judge -->
                <div class="flex flex-col">
                <label class="mb-1 text-gray-700 font-medium" for="judge">Judge</label>
                <select id="judge" class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">All</option>
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
                <label for="reg-open" class="ml-2 text-gray-700 font-medium">Registration is Open</label>
                </div>
        
                <div class="flex items-center">
                <input id="reg-soon" type="checkbox" class="w-5 h-5 text-blue-600 border-gray-300 rounded" />
                <label for="reg-soon" class="ml-2 text-gray-700 font-medium">Registration Soon</label>
                </div>
            </div>
          </form>
      </div>
    </div>
  
    <!-- Table Section -->
    <div class="items-center w-full bg-white rounded-lg shadow-md mt-8">
      <div class="mx-auto">
        <div class="overflow-x-auto">
          
          <table class="w-full table-auto">
            <thead>
              <tr class="text-sm font-normal text-gray-600 border-t border-b text-left bg-gray-50">
                <th class="px-4 py-3">Title</th>
                <th class="px-4 py-3">Participants</th>
                <th class="px-4 py-3">Date</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3"></th>
              </tr>
            </thead>
            <tbody class="text-sm font-normal text-gray-700">
              <tr class="py-10 cursor-pointer border-b border-gray-200 hover:bg-gray-100"
                onclick="toggleDescription('user1')"
                >
                <td class="flex flex-row items-center px-4 py-4">
                  <div class="flex w-10 h-10 mr-4">
                    <a href="#" class="relative block">
                      <img alt="profil"
                        src="https://cdn-icons-png.flaticon.com/512/323/323271.png"
                        class="object-cover w-10 h-10 mx-auto rounded-md" />
                    </a>
                  </div>
                  <div class="flex-1 pl-1">
                    <div class="font-medium">Retrievers school Baltic Paws</div>
                    <div class="text-sm text-blue-600">
                        Jõulu WT'25 / Christmas WT'25
                    </div>
                  </div>
                </td>
                <td class="px-4 py-4">
                    <div x-data="{ showParticipants: false }" class="relative">
                        <button 
                          @click.stop="showParticipants = true" 
                          class="flex items-center justify-center gap-1 text-blue-600 hover:text-blue-800 font-medium"
                        >
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m10-3.13a4 4 0 11-8 0 4 4 0 018 0z" />
                          </svg>
                          <span>20 / 45</span>
                        </button>
                      
                        <!-- Modal Overlay -->
                        <div 
                          x-show="showParticipants"
                          x-cloak
                          @click.self="showParticipants = false"
                          class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
                          x-transition.opacity
                        >
                          <!-- Modal Content -->
                          <div 
                            @click.stop
                            class="bg-white rounded-xl shadow-2xl p-6 w-full max-w-lg relative"
                            x-transition.scale
                          >
                            <!-- Close Button -->
                            <button 
                              @click="showParticipants = false"
                              class="absolute top-3 right-3 text-gray-400 hover:text-gray-600"
                            >
                              ✕
                            </button>
                      
                            <h3 class="text-lg font-semibold mb-4 text-gray-800">Participants</h3>
                      
                            <table class="w-full border border-gray-200 text-sm">
                              <thead class="bg-gray-100">
                                <tr>
                                  <th class="p-2 text-left border">Name</th>
                                  <th class="p-2 text-left border">Class</th>
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
                    12.01.2026-15.01.2026 
                </td>
                <td>
                  <div class="flex items-center pl-1">
                    {{-- <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div> --}}
                    <button type="button" 
                    onclick="event.stopPropagation(); window.location.href='{{ route('registerDog') }}'"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Register</button>
                  </div>
                </td>
                <td class="p-4">
                  <div id="user1Toggle"
                    class="text-white bg-gray-100 border rounded-lg px-4 py-4 text-center inline-flex items-center">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                      <path
                        d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z">
                      </path>
                    </svg>
                  </div>
                </td>
              </tr>
              <tr id="user1Description" class="hidden border-t border-gray-200">
                <td class="px-4 py-4" colspan="5">
                  <div class="w-full p-6 bg-white rounded-xl shadow-md space-y-6">
              
                    <!-- Registration Period -->
                    <div class="p-4 bg-gray-100 rounded-lg flex flex-col md:flex-row justify-between items-start md:items-center">
                      <div>
                        <h2 class="text-lg font-semibold text-gray-800">Registration Period</h2>
                        <p class="text-gray-600">6.10.–16.11.2025</p>
                      </div>
                      <span class="mt-2 md:mt-0 text-sm font-medium text-blue-600">18 days left</span>
                    </div>

                    <div class="p-4 bg-gray-100 rounded-lg flex flex-col md:flex-row justify-between items-start md:items-center mt-4 space-y-2 md:space-y-0">
                      <div>
                        <h2 class="text-lg font-semibold text-gray-800">Location</h2>
                        <p class="text-gray-600">Kanta-Hämeen Noutajakoirayhdistys ry, Example Street 12, 12345 Hämeenlinna</p>
                        <div class="mt-1 flex flex-wrap gap-2">
                          <a href="https://www.google.com/maps/search/?api=1&query=Example+Street+12+Hämeenlinna" target="_blank" class="text-blue-600 hover:underline text-sm font-medium">Google Maps</a>
                          <a href="https://waze.com/ul?ll=60.995,24.465&navigate=yes" target="_blank" class="text-blue-600 hover:underline text-sm font-medium">Waze</a>
                        </div>
                      </div>
                    </div>

                    <!-- Judiciary -->
                    <div class="p-4 bg-gray-50 rounded-lg">
                      <h2 class="text-lg font-semibold text-gray-800 mb-2">Judge(s)</h2>
                      <ul class="list-disc list-inside text-gray-700 space-y-1">
                        <li>Kari Husso</li>
                        <li>Ville-Pekka Reinio</li>
                      </ul>
                      <p class="mt-2 text-gray-700">
                        <span class="font-medium">Exam secretary:</span> Kirsi Launomaa, 040 725 5354, kirsi.launomaa@gmail.com
                      </p>
                    </div>

                    <!-- Additional Information -->
                    <div class="p-4 bg-gray-50 rounded-lg">
                      <h2 class="text-lg font-semibold text-gray-800 mb-2">Additional Information</h2>
                      <p class="text-gray-700 space-y-2">
                        The event is intended only for members of the <span class="font-medium">Kanta-Hämeen Noutajakoirayhdistys ry</span>.
                        Those with a result of <span class="font-medium">ALO1</span> or higher from the official NOME-B tests participate in the Champions class.
                        The champions compete in the afternoon after about 12 o'clock.
                        <br><br>
                        The race is an unofficial checkpoint-type competition, with checkpoints for searching, steering, and marking.
                        Everyone is welcome!
                      </p>
                    </div>
                      
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
                        <tbody class="bg-white">
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
              <!-- Payment Information -->
                  </div>
                </td>
              </tr>
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
</x-web-layout>
