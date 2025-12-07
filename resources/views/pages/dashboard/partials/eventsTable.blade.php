<!-- Events Table -->
<div class="overflow-x-auto dark:bg-gray-800 rounded-lg shadow">
    <table class="min-w-full divide-y dark:divide-gray-700">
        <thead class="dark:bg-gray-700 dark:text-gray-200">
            <tr>
                <th @click="sortBy('name')" class="px-4 py-2 cursor-pointer">Event Name</th>
                <th @click="sortBy('date')" class="px-4 py-2 cursor-pointer">Date</th>
                <th @click="sortBy('organizer')" class="px-4 py-2 cursor-pointer">Registration starts</th>
                <th @click="sortBy('organizer')" class="px-4 py-2 cursor-pointer">Registration ends</th>
                <th @click="sortBy('registration')" class="px-4 py-2 cursor-pointer">Registration is open</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y dark:divide-gray-700 dark:bg-gray-900">
            {{-- <template x-for="event in filteredEvents" :key="event.id"> --}}
            @foreach ($events as $event)
                <tr class="dark:hover:bg-gray-700 transition-colors">
                    <td class="px-4 py-2">{{ $event->name }}</td>
                    <td class="px-4 py-2">{{ $event->start_date }}</td>
                    <td class="px-4 py-2">{{ $event->registration_start }}</td>
                    <td class="px-4 py-2">{{ $event->registration_end }}</td>
                    <td class="px-4 py-2">{{ $event->is_registration_open ? 'Yes' : 'No' }}</td>
                    <td class="px-4 py-2 flex gap-2">
                        <button onclick="location.href = '{{ route('dashboard.event.show', $event->id) }}'"
                            class="px-2 py-1 bg-blue-600 rounded hover:bg-blue-700">View</button>
                        <button onclick="location.href = '{{ route('dashboard.event.edit', $event->id) }}'"
                            class="px-2 py-1 bg-green-600 rounded hover:bg-green-700">Edit</button>
                    </td>
                </tr>
            @endforeach
            {{-- </template> --}}
            <tr x-show="filteredEvents.length === 0">
                <td colspan="6" class="px-4 py-4 text-center text-gray-400">No events found.</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Pagination -->
{{ $events->links() }}
