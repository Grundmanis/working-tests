<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('MyOrganizations') }}
        </h2>
    </x-slot>

    <div class="p-6 dark:bg-gray-900 min-h-screen dark:text-gray-200 flex justify-center">
        <div class="w-full max-w-6xl">

            <!-- Button wrapper: flex to move button right -->
            <div class="flex justify-end mb-4">
                <a href="{{ route('organizations.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-green-600 text-white font-semibold rounded-lg shadow hover:bg-green-700 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Organization
                </a>
            </div>

            <!-- Table container -->
            <div class="overflow-x-auto dark:bg-gray-800 rounded-lg shadow">
                <table class="min-w-full divide-y dark:divide-gray-700">
                    <thead class="dark:bg-gray-700 dark:text-gray-200">
                        <tr>
                            <th @click="sortBy('name')" class="px-4 py-2 cursor-pointer text-left">Name</th>
                            <th @click="sortBy('author')" class="px-4 py-2 cursor-pointer text-left">Author</th>
                            <th @click="sortBy('members')" class="px-4 py-2 cursor-pointer text-left">Members</th>
                            <th class="px-4 py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y dark:divide-gray-700 dark:bg-gray-900">
                        @foreach ($organizations as $organization)
                            <tr class="dark:hover:bg-gray-700 transition-colors">
                                <td class="px-4 py-2">{{ $organization->name }}</td>
                                <td class="px-4 py-2">{{ $organization->user->name }}</td>
                                <td class="px-4 py-2">{{ count($organization->members) }}</td>
                                <td class="px-4 py-2 flex gap-2">
                                    <button
                                        onclick="location.href = '{{ route('organizations.edit', $organization->id) }}'"
                                        class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                                        Edit
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        @if ($organizations->isEmpty())
                            <tr>
                                <td colspan="6" class="px-4 py-4 text-center text-gray-400">
                                    No organizations found.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
