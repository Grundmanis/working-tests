<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('update_organization', ['organization' => $organization->name]) }}
        </h2>
    </x-slot>

    <div class="p-6 dark:bg-gray-900 min-h-screen dark:text-gray-200 flex justify-center">
        <div class="w-full max-w-6xl">

            <x-success-alert :success="session('success')" />
            <x-error-alert :errors="$errors" />

            <form method="POST" action="{{ route('organizations.update', $organization->id) }}"
                class="space-y-6 bg-white dark:bg-gray-900 p-6 rounded-xl shadow-lg">
                @method('PUT')
                @csrf

                <div>
                    <label class="block dark:text-gray-200 font-semibold">{{ __('name') }}</label>
                    <input type="text" name="name" value="{{ old('name', $organization->name) }}"
                        class="mt-1 w-full border dark:border-gray-700 rounded-md px-3 py-2 dark:bg-gray-800 dark:text-gray-100" />
                </div>

                <label class="block dark:text-gray-200 font-semibold">{{ __('members') }}</label>
                <x-user-dropdown :users="$users" :selected="$organization->members->toArray()" />

                <button class="mt-6 w-full px-4 py-3 bg-blue-700 text-white font-semibold rounded-md shadow">
                    {{ __('save') }}
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
