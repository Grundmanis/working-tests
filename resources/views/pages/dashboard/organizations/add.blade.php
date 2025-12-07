<x-app-layout>
    {{-- <script src="{{ asset('js/usersDropdown.js') }}" defer></script> --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Add new organization
        </h2>
    </x-slot>

    <div class="p-6 bg-gray-900 min-h-screen text-gray-200 flex justify-center">
        <div class="w-full max-w-6xl">

            @if (session('success'))
                <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 p-3 rounded-lg bg-red-100 text-red-800">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('organizations.store') }}"
                class="space-y-6 bg-white dark:bg-gray-900 p-6 rounded-xl shadow-lg">
                @csrf

                <div>
                    <label class="block dark:text-gray-200 font-semibold">Name</label>
                    <input type="text" name="name" value=""
                        class="mt-1 w-full border dark:border-gray-700 rounded-md px-3 py-2 dark:bg-gray-800 dark:text-gray-100" />
                </div>

                <label class="block dark:text-gray-200 font-semibold">Members</label>
                <x-user-dropdown :users="$users" />

                <button class="mt-6 w-full px-4 py-3 bg-blue-700 text-white font-semibold rounded-md shadow">
                    Save
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
