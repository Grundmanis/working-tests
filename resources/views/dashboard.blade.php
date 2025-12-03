<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('MyEvents') }}
        </h2>
    </x-slot>   

    <div class="p-6 bg-gray-900 min-h-screen text-gray-200 flex justify-center"
  x-data="{
    events: [
      {id:1, name:'Working Test 1', date:'2025-11-02', type:'working', organizer:'Kari', registrationOpen:true},
      {id:2, name:'Dummy Trial 1', date:'2025-11-03', type:'dummy', organizer:'Ville', registrationOpen:false},
      {id:3, name:'Training Session', date:'2025-11-04', type:'training', organizer:'Soile', registrationOpen:true},
      {id:4, name:'Working Test 2', date:'2025-11-05', type:'working', organizer:'Kari', registrationOpen:true},
      {id:5, name:'Dummy Trial 2', date:'2025-11-06', type:'dummy', organizer:'Ville', registrationOpen:false},
      {id:6, name:'Training Session 2', date:'2025-11-07', type:'training', organizer:'Soile', registrationOpen:true},
    ],
    filters: { type:'', registrationOpen:false, organizer:'', search:'' },
    sortField: '', sortAsc: true,
    currentPage: 1, perPage: 3, totalPages: 1,
    get filteredEvents() {
      let filtered = this.events
        .filter(e => (!this.filters.type || e.type===this.filters.type))
        .filter(e => (!this.filters.registrationOpen || e.registrationOpen))
        .filter(e => (!this.filters.organizer || e.organizer.toLowerCase().includes(this.filters.organizer.toLowerCase())))
        .filter(e => (!this.filters.search || e.name.toLowerCase().includes(this.filters.search.toLowerCase())));

      if(this.sortField){
        filtered.sort((a,b) => (a[this.sortField] > b[this.sortField] ? 1 : -1) * (this.sortAsc ? 1 : -1));
      }

      this.totalPages = Math.ceil(filtered.length / this.perPage);
      return filtered.slice((this.currentPage-1)*this.perPage, this.currentPage*this.perPage);
    },
    sortBy(field){
      if(this.sortField===field) this.sortAsc=!this.sortAsc;
      else { this.sortField=field; this.sortAsc=true; }
    },
    prevPage(){ if(this.currentPage>1) this.currentPage--; },
    nextPage(){ if(this.currentPage<this.totalPages) this.currentPage++; }
  }" 
  class="p-6 bg-gray-900 min-h-screen text-gray-200"
>
<div class="w-full max-w-6xl">

  <!-- Filters -->
  <div class="flex flex-col md:flex-row gap-4 mb-4 items-end">
    <div>
      <label class="block text-sm font-medium">Event Type</label>
      <select x-model="filters.type" class="mt-1 block w-full bg-gray-800 text-gray-200 border border-gray-700 rounded p-2">
        <option value="">All</option>
        <option value="working">Working Test</option>
        <option value="dummy">Dummy Trial</option>
        <option value="training">Training</option>
      </select>
    </div>
    <div class="flex items-center mt-1">
      <input type="checkbox" x-model="filters.registrationOpen" id="registrationOpen" class="mr-2">
      <label for="registrationOpen" class="text-sm">Registration Open</label>
    </div>
    <div>
      <label class="block text-sm font-medium">Organizer</label>
      <input type="text" x-model="filters.organizer" placeholder="Organizer name" class="mt-1 block w-full bg-gray-800 text-gray-200 border border-gray-700 rounded p-2">
    </div>
    <div class="flex-1">
      <label class="block text-sm font-medium">Search</label>
      <input type="text" x-model="filters.search" placeholder="Search events" class="mt-1 block w-full bg-gray-800 text-gray-200 border border-gray-700 rounded p-2">
    </div>
  </div>

  <!-- Events Table -->
  <div class="overflow-x-auto bg-gray-800 rounded-lg shadow">
    <table class="min-w-full divide-y divide-gray-700">
      <thead class="bg-gray-700 text-gray-200">
        <tr>
          <th @click="sortBy('name')" class="px-4 py-2 cursor-pointer">Event Name</th>
          <th @click="sortBy('date')" class="px-4 py-2 cursor-pointer">Date</th>
          <th @click="sortBy('type')" class="px-4 py-2 cursor-pointer">Type</th>
          <th @click="sortBy('organizer')" class="px-4 py-2 cursor-pointer">Organizer</th>
          <th @click="sortBy('registration')" class="px-4 py-2 cursor-pointer">Registration</th>
          <th class="px-4 py-2">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-700 bg-gray-900">
        <template x-for="event in filteredEvents" :key="event.id">
          <tr class="hover:bg-gray-700 transition-colors">
            <td class="px-4 py-2" x-text="event.name"></td>
            <td class="px-4 py-2" x-text="event.date"></td>
            <td class="px-4 py-2" x-text="event.type"></td>
            <td class="px-4 py-2" x-text="event.organizer"></td>
            <td class="px-4 py-2" x-text="event.registrationOpen ? 'Open' : 'Closed'"></td>
            <td class="px-4 py-2 flex gap-2">
              <button class="px-2 py-1 bg-blue-600 rounded hover:bg-blue-700">View</button>
              <button class="px-2 py-1 bg-green-600 rounded hover:bg-green-700">Edit</button>
            </td>
          </tr>
        </template>
        <tr x-show="filteredEvents.length === 0">
          <td colspan="6" class="px-4 py-4 text-center text-gray-400">No events found.</td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="mt-4 flex justify-end items-center gap-2">
    <button @click="prevPage" :disabled="currentPage === 1" class="px-3 py-1 bg-gray-700 rounded disabled:opacity-50">Prev</button>
    <span x-text="currentPage + ' / ' + totalPages"></span>
    <button @click="nextPage" :disabled="currentPage === totalPages" class="px-3 py-1 bg-gray-700 rounded disabled:opacity-50">Next</button>
  </div>
</div>
</div>

      

</x-app-layout>
