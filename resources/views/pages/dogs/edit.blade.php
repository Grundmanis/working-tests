<x-web-layout>
    <!-- Navigation Block -->
    <div
        class="bg-white mt-8 shadow-md rounded-lg px-6 py-4 mb-8 flex flex-col md:flex-row md:items-center md:justify-between border border-gray-100">
        <!-- Breadcrumbs -->
        <nav class="text-sm text-gray-500 mb-3 md:mb-0">
            <ol class="list-reset flex flex-wrap items-center">
                <li>
                    <a href="/" class="text-blue-600 hover:underline font-medium">{{ __('events') }}</a>
                </li>
                <li><span class="mx-2 text-gray-400">/</span></li>
                <li>
                    <a href="/dogs" class="text-blue-600 hover:underline font-medium">{{ __('myDogs') }}</a>
                </li>
                <li><span class="mx-2 text-gray-400">/</span></li>
                <li class="text-gray-700 font-semibold">{{ $dog->homeName }}</li>
            </ol>
        </nav>
    </div>

    <div class="items-center w-full bg-white rounded-lg shadow-md mt-8 mb-8">
        <div class="mx-auto">
            <form method="POST" action="{{ route('dogs.update', $dog->id) }}">
                @csrf
                @method('PUT')
                <div class="overflow-x-auto">

                    <div class="mx-auto bg-white p-8">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-6">{{ __('dogInformation') }}</h2>
                        <x-success-alert :success="session('success')" />
                        <x-error-alert :errors="$errors" />

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">{{ __('registeredName') }}</label>
                                <input type="text" name="registeredName"
                                    value="{{ old('registeredName', $dog->registeredName) }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                            </div>

                            <div>
                                <label class="block text-gray-700 font-medium mb-2">{{ __('homeName') }}</label>
                                <input type="text" name="homeName" value="{{ old('homeName', $dog->homeName) }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                            </div>

                            <div>
                                <label
                                    class="block text-gray-700 font-medium mb-2">{{ __('registrationNumber') }}</label>
                                <input type="text" name="registrationNumber"
                                    value="{{ old('registrationNumber', $dog->registrationNumber) }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                            </div>

                            <div>
                                <label class="block text-gray-700 font-medium mb-2">{{ __('microchip') }}</label>
                                <input type="text" name="microchip" value="{{ old('microchip', $dog->microchip) }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                            </div>

                            <div>
                                <label class="block text-gray-700 font-medium mb-2">{{ __('dob') }}</label>
                                <input type="date" name="dob" value="{{ old('dob', $dog->dob) }}"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                            </div>

                            <div>
                                <label class="block text-gray-700 font-medium mb-2">{{ __('gender') }}</label>
                                <select name="gender"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus:ring-2 focus:ring-blue-400 focus:outline-none">
                                    <option value="">{{ __('select') }}</option>
                                    <option @if (old('gender', $dog->gender) == 'm') selected @endif value="m">
                                        {{ __('male') }}</option>
                                    <option @if (old('gender', $dog->gender) == 'f') selected @endif value="f">
                                        {{ __('female') }}</option>
                                </select>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-gray-700 font-medium mb-2">{{ __('breed') }}</label>
                                <select name="breed"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus:ring-2 focus:ring-blue-400 focus:outline-none">
                                    <option value="">{{ __('select') }}</option>
                                    @foreach ($breeds as $key => $breed)
                                        <option @if (old('breed', $dog->breed) == $key) selected @endif
                                            value="{{ $key }}">{{ $breed }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end">
                            <button type="submit"
                                class="bg-blue-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition-colors">
                                {{ __('update') }}
                            </button>
                        </div>
                    </div>


                </div>
            </form>
        </div>
    </div>

</x-web-layout>
