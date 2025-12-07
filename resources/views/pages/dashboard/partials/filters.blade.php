<!-- Filters -->
<div class="flex flex-col md:flex-row gap-4 mb-4 items-end">
    <div>
        <label class="block text-sm font-medium">Event Type</label>
        <select x-model="filters.type"
            class="mt-1 block w-full dark:bg-gray-800 dark:text-gray-200 border border-gray-700 rounded p-2">
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
        <input type="text" x-model="filters.organizer" placeholder="Organizer name"
            class="mt-1 block w-full dark:bg-gray-800 dark:text-gray-200 border dark:border-gray-700 rounded p-2">
    </div>
    <div class="flex-1">
        <label class="block text-sm font-medium">Search</label>
        <input type="text" x-model="filters.search" placeholder="Search events"
            class="mt-1 block w-full dark:bg-gray-800 dark:text-gray-200 border dark:border-gray-700 rounded p-2">
    </div>
</div>
