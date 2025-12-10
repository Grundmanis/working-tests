<x-web-layout>

    <!-- Navigation Block -->
    <div
        class="bg-white shadow-md rounded-lg px-6 py-4 mb-8 flex flex-col md:flex-row md:items-center md:justify-between border border-gray-100  mt-8 mb-8">
        <!-- Breadcrumbs -->
        <nav class="text-sm text-gray-500 mb-3 md:mb-0">
            <ol class="list-reset flex flex-wrap items-center">
                <li>
                    <a href="/" class="text-blue-600 hover:underline font-medium">Events</a>
                </li>
                {{-- <li><span class="mx-2 text-gray-400">/</span></li>
        <li>
        <a href="/dogs" class="text-blue-600 hover:underline font-medium">My Dogs</a>
        </li> --}}
                <li><span class="mx-2 text-gray-400">/</span></li>
                <li class="text-gray-700 font-semibold">Register dog</li>
            </ol>
        </nav>
    </div>

    <div class="items-center w-full bg-white rounded-lg shadow-md mt-8 mb-8">
        <div class="mx-auto">
            <div class="overflow-x-auto" x-data="eventInfo()">

                <div class="max-w-7xl mx-auto bg-white rounded-xl p-10">

                    <h1 class="text-3xl font-semibold text-gray-800 mb-10 text-center">
                        {{ __('registerToEvent', ['eventName' => $event->name]) }}</h1>

                    <form action="#" method="POST" class="space-y-10">

                        <!-- Event Section -->
                        <!-- Event Information Section -->
                        <div class="space-y-6 p-6 bg-white rounded-xl shadow-md">

                            <h2 class="text-2xl font-semibold">{{ __('eventInfo') }}</h2>


                            <!-- Day Selection Row -->
                            <div class="grid grid-cols-3 gap-4 items-end">
                                <div>
                                    <label class="block text-gray-700 mb-1 font-medium">{{ __('selectDay') }}</label>
                                    <select x-model="selectedDay" class="w-full border rounded-lg p-2">
                                        <option value="">-- {{ __('selectDay') }} --</option>
                                        <template x-for="(date, key) in daysData" :key="key">
                                            <option x-text="key"></option>
                                        </template>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-gray-700 mb-1 font-medium">Select Type</label>
                                    <select x-model="selectedType" class="w-full border rounded-lg p-2">
                                        <option value="">-- Select Type --</option>
                                        <template x-for="type in availableTypes(selectedDay)" :key="type">
                                            <option x-text="type"></option>
                                        </template>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-gray-700 mb-1 font-medium">Select Class</label>
                                    <select x-model="selectedClass" class="w-full border rounded-lg p-2">
                                        <option value="">-- Select Class --</option>
                                        <template x-for="category in availableClasses(selectedDay, selectedType)"
                                            :key="category.id">
                                            <option x-text="category.name"></option>
                                        </template>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Add Day Button -->
                        <button type="button" @click="addDay"
                            class="mt-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            Add Day
                        </button>

                        <!-- List of Added Days -->
                        <template x-if="registrations.length">
                            <div class="mt-6 border-t pt-4">
                                <h3 class="text-lg font-semibold mb-2">Added Days</h3>
                                <ul class="space-y-2">
                                    <template x-for="(reg, index) in registrations" :key="index">
                                        <li class="flex justify-between bg-gray-50 p-3 rounded-lg border">
                                            <span>
                                                <strong x-text="reg.day"></strong> —
                                                <span x-text="reg.cls"></span> (<span x-text="reg.type"></span>)
                                            </span>
                                            <button type="button" class="text-red-500 hover:underline"
                                                @click="removeDay(index)">
                                                Remove
                                            </button>
                                        </li>
                                    </template>
                                </ul>
                            </div>
                        </template>

                </div>

                <!-- Dog Section -->
                <div class="p-6 bg-white rounded-xl shadow-md space-y-3">
                    <h2 class="text-xl font-semibold mb-3">Dog Information</h2>

                    <!-- Saved Dogs Dropdown -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-1">Select Saved Dog</label>
                        <select x-model="selectedDog" @change="selectDog(selectedDog)"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">-- Select Dog --</option>
                            <template x-for="dog in dogs" :key="dog.id">
                                <option :value="dog.id" x-text="dog.registeredName"></option>
                            </template>
                        </select>
                    </div>

                    <!-- Dog Fields -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Registered Name</label>
                            <input type="text" x-model="dogInfo.registrationNumber"
                                class="w-full border-gray-300 rounded-lg p-2" />
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Home Name</label>
                            <input type="text" x-model="dogInfo.homeName"
                                class="w-full border-gray-300 rounded-lg p-2" />
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Registration Number</label>
                            <input type="text" x-model="dogInfo.registrationNumber"
                                class="w-full border-gray-300 rounded-lg p-2" />
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Microchip</label>
                            <input type="text" x-model="dogInfo.microchip"
                                class="w-full border-gray-300 rounded-lg p-2" />
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Date of Birth</label>
                            <input type="date" x-model="dogInfo.dob" class="w-full border-gray-300 rounded-lg p-2" />
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Sex</label>
                            <select x-model="dogInfo.gender" class="w-full border-gray-300 rounded-lg p-2">
                                <option value="">Select</option>
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label class="block text-gray-700 font-medium mb-1">Breed</label>
                            <select x-model="dogInfo.breed" class="w-full border-gray-300 rounded-lg p-2">
                                <option value="">Select</option>
                                <template x-for="(breed, key) in breeds" :key="key">
                                    <option :value="key" x-text="breed"></option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>


                <!-- Owner Section -->
                <section class="p-6 bg-white rounded-xl shadow-md space-y-3">
                    <div>
                        <h2 class="text-xl font-semibold mb-3">Owner Information</h2>

                        <!-- Existing Owner Dropdown -->
                        {{-- <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-1">Existing Owner</label>
                            <select @change="selectOwner($event.target.value)" class="w-full border rounded-lg p-2">
                                <option value="">-- Select Existing Owner --</option>
                                <template x-for="o in existingOwners" :key="o.id">
                                    <option :value="o.id" x-text="o.fullName"></option>
                                </template>
                            </select>
                        </div> --}}

                        <!-- Owner Inputs -->
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Full Name -->
                            <div>
                                <label class="block text-gray-700 font-medium mb-1">Full Name</label>
                                <input type="text" value="{{ $user->name }}"
                                    class="w-full border rounded-lg p-2" placeholder="Owner full name" />
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="block text-gray-700 font-medium mb-1">Email</label>
                                <input type="email" value="{{ $user->email }}"
                                    class="w-full border rounded-lg p-2" placeholder="Owner email" />
                            </div>

                            <!-- Address -->
                            <div class="col-span-2">
                                <label class="block text-gray-700 font-medium mb-1">Address</label>
                                <input type="text" value="{{ $user->address }}"
                                    class="w-full border rounded-lg p-2" placeholder="Street, City, Postal code" />
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Handler Section -->
                <section class="p-6 bg-white rounded-xl shadow-md space-y-3">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-700 mb-4">Handler Information</h2>

                        <!-- Existing Handler Dropdown -->
                        {{-- <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-1">Existing Handler</label>
                            <select @change="selectHandler($event.target.value)" class="w-full border rounded-lg p-2">
                                <option value="">-- Select Existing Handler --</option>
                                <template x-for="h in existingHandlers" :key="h.id">
                                    <option :value="h.id" x-text="h.fullName"></option>
                                </template>
                            </select>
                        </div> --}}

                        <!-- Handler Inputs -->
                        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            <!-- Full Name -->
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                <input type="text" value={{ $user->name }}
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <!-- Email -->
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" value={{ $user->email }}
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <!-- Phone Number -->
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Phone
                                    Number</label>
                                <input type="tel" value="{{ $user->phone }}"
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="+371 1234 5678">
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Notes Section -->
                <div class="p-6 bg-white rounded-xl shadow-md space-y-3">
                    <h2 class="text-xl font-semibold">Notes</h2>
                    <textarea name="notes" rows="4"
                        class="w-full border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Any general notes about your registration..."></textarea>
                </div>

                <!-- Accommodation Section -->
                <section class="p-6 bg-white rounded-xl shadow-md space-y-4">
                    <h2 class="text-xl font-semibold mb-3">Accommodation</h2>

                    <!-- Breakfast + Price -->
                    <div class="flex flex-wrap items-center gap-4 mb-4">
                        @if ($event->accommodation_price)
                            <span
                                class="inline-block bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">
                                Price per night: €{{ $event->accommodation_price }}
                            </span>
                        @endif
                        @if ($event->per_dog_price)
                            <span
                                class="inline-block bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">
                                Price per dog: €{{ $event->per_dog_price }}
                            </span>
                        @endif
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Check-in -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Check-in Date</label>
                            <input type="date" name="accommodation_checkin" x-model="accommodation.checkin"
                                class="w-full border rounded-lg p-2">
                        </div>

                        <!-- Check-out -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Check-out Date</label>
                            <input type="date" x-model="accommodation.checkout" name="accommodation_checkout"
                                class="w-full border rounded-lg p-2">
                        </div>

                        <!-- Number of Dogs -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Number of Dogs</label>
                            <input type="number" min="0" x-model="accommodation.dogs"
                                class="w-full border rounded-lg p-2" placeholder="0">
                        </div>

                        <!-- Number of People -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Number of People</label>
                            <input type="number" min="0" x-model="accommodation.people"
                                name="accommodation_people" class="w-full border rounded-lg p-2" placeholder="0">
                        </div>

                        <!-- Additional Notes -->
                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-gray-700 font-medium mb-1">Additional Notes</label>
                            <textarea name="accommodation_notes" x-model="accommodation.notes" rows="3"
                                class="w-full border rounded-lg p-2" placeholder="E.g. special requests, room preferences, etc."></textarea>
                        </div>
                    </div>
                </section>

                <!-- Meals Section -->
                <div class="p-6 bg-white rounded-xl shadow-md space-y-4">
                    <h2 class="text-xl font-semibold">Meals</h2>

                    TODO: everyone comes a day before the test - need to update

                    <!-- Price badges -->
                    <div class="flex flex-wrap items-center gap-4 mb-4">
                        @if ($event->is_breakfast_included)
                            <span
                                class="inline-block bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full">
                                Breakfast included
                            </span>
                        @endif
                        @if ($event->lunch_price)
                            <span
                                class="inline-block bg-yellow-100 text-yellow-800 text-sm font-medium px-3 py-1 rounded-full">
                                Lunch: €{{ $event->lunch_price }}
                            </span>
                        @endif
                        @if ($event->dinner_price)
                            <span
                                class="inline-block bg-orange-100 text-orange-800 text-sm font-medium px-3 py-1 rounded-full">
                                Dinner: €{{ $event->dinner_price }}
                            </span>
                        @endif
                    </div>

                    <!-- Days and meal selection -->
                    <template x-for="(date, key) in mealsDates()" :key="key">
                        <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 space-y-2">
                            <h3 class="font-medium text-gray-800" x-text="key"></h3>
                            <div class="flex items-center space-x-4">
                                @if (!$event->is_breakfast_included)
                                    <label class="flex items-center gap-2">
                                        <input type="checkbox" :model="meals.breakfast[key]" />
                                        <span>Breakfast</span>
                                    </label>
                                @endif
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" x-model="meals.lunch[key]" />
                                    <span>Lunch</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" x-model="meals.dinner[key]" />
                                    <span>Dinner</span>
                                </label>
                            </div>
                        </div>
                    </template>

                    <!-- Number of people -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Number of People</label>
                            <input type="number" name="meals_people" min="1"
                                class="w-full border-gray-300 rounded-lg p-2" x-model="mealsPeople"
                                placeholder="People eating">
                        </div>
                    </div>

                    <!-- Additional notes -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Additional Notes</label>
                        <textarea name="meals_notes" rows="3"
                            class="w-full border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Allergies, vegetarian/non-meat preferences, etc."></textarea>
                    </div>
                </div>

                <!-- Membership and Terms -->
                <section class="p-4 bg-gray-50 rounded-lg border border-gray-200 space-y-2">

                    <div class="flex items-center space-x-2">
                        <input id="helper" type="checkbox" name="helper" x-model="agreeToHelp"
                            class="text-blue-600 border-gray-300 rounded">
                        <label for="helper" class="text-gray-700">I agree to help</label>
                    </div>

                    <div class="flex items-center space-x-2">
                        <input id="membership" type="checkbox" name="membership" x-model="memberOfClub"
                            class="text-blue-600 border-gray-300 rounded">
                        <label for="membership" class="text-gray-700">I am a club member</label>
                    </div>

                    <div class="flex items-center space-x-2">
                        <input id="terms" type="checkbox" name="terms" required
                            class="text-blue-600 border-gray-300 rounded">
                        <label for="terms" class="text-gray-700">I agree to the <a href="#"
                                class="text-blue-600 hover:underline">terms and conditions</a></label>
                    </div>
                </section>

                <!-- Payment Section -->
                @if ($event->is_prepayment_required)
                    <div class="p-6 bg-white rounded-xl shadow-md space-y-3 border border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-800">Payment</h2>

                        <div class="text-gray-700 space-y-2">
                            <p>Please transfer the participation fee to the following bank account:</p>
                            <div class="bg-gray-50 border border-gray-200 rounded-lg p-3 text-sm">
                                <p><strong>Bank:</strong> Swedbank</p>
                                <p><strong>Account Holder:</strong> Retriever Club Latvia</p>
                                <p><strong>IBAN:</strong> LV00HABA0000000000000</p>
                                <p><strong>Reference:</strong> Participant’s Name + Event Name</p>
                                <p><strong>Amount:</strong> {{ $event->prepayment_price }} €</p>
                            </div>

                            <p class="text-sm text-gray-600 mt-2">
                                ⚠️ After completing the payment, please upload a screenshot or PDF confirming the
                                successful transaction.
                            </p>
                        </div>

                        <!-- File Upload -->
                        <div>
                            <label for="payment_screenshot" class="block text-gray-700 font-medium mb-1">Attach
                                Payment Proof</label>
                            <input type="file" id="payment_screenshot" name="payment_screenshot"
                                accept=".jpg,.jpeg,.png,.pdf"
                                class="w-full border border-gray-300 rounded-lg p-2 file:mr-4 file:py-2 file:px-4 
                          file:rounded-lg file:border-0 file:text-sm file:font-semibold 
                          file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                        </div>

                        <!-- Optional Notes -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-1">Additional Payment Notes</label>
                            <textarea name="payment_notes" rows="3"
                                class="w-full border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Add any details about your payment, e.g. partial payment, joint payment, etc."></textarea>
                        </div>
                    </div>
                @endif

                <!-- Summary Section -->
                <div
                    class="p-8 rounded-2xl bg-gradient-to-b from-blue-50 to-blue-100 border border-blue-200 shadow-md space-y-6 mt-8">
                    <h2 class="text-2xl font-bold text-blue-800 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17v-6a2 2 0 012-2h8m-8 6h8m-8 6h8m-8 6h8" />
                        </svg>
                        Registration Summary
                    </h2>

                    <!-- Participating Days -->
                    <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-200">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="font-semibold text-gray-800">Participating Days</h3>
                            <span class="text-sm bg-blue-100 text-blue-700 font-semibold px-3 py-1 rounded-lg">
                                €<span x-text="getParticipatingTotal()"></span>
                            </span>
                        </div>

                        <ul class="space-y-1 text-gray-700">
                            <template x-for="(registration, index) in registrations" :key="index">
                                <li class="flex items-center gap-2">
                                    <span class="text-blue-500 font-medium" x-text="registration.day"></span> –
                                    <span x-text="registration.type"></span>,
                                    <span class="italic text-gray-600" x-text="registration.cls"></span>
                                </li>
                            </template>
                        </ul>
                    </div>

                    <!-- Accommodation -->
                    <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-200">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="font-semibold text-gray-800">Accommodation</h3>
                            <span class="text-sm bg-blue-100 text-blue-700 font-semibold px-3 py-1 rounded-lg">
                                €<span x-text="getAccommodationTotal()"></span>
                            </span>
                        </div>
                        <dl class="grid grid-cols-2 text-sm gap-y-1 text-gray-700">
                            <dt>Check-in:</dt>
                            <dd x-text="accommodation.checkin"></dd>
                            <dt>Check-out:</dt>
                            <dd x-text="accommodation.checkout"></dd>
                            <dt>Dogs:</dt>
                            <dd x-text="accommodation.dogs"></dd>
                            <dt>People:</dt>
                            <dd x-text="accommodation.people"></dd>
                            <dt>Notes:</dt>
                            <dd x-text="accommodation.notes"></dd>
                            <dt>Nights:</dt>
                            <dd x-text="getTotalNights()"></dd>
                        </dl>
                    </div>

                    <!-- Meals -->
                    <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-200">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="font-semibold text-gray-800">Meals</h3>
                            <span class="text-sm bg-blue-100 text-blue-700 font-semibold px-3 py-1 rounded-lg">
                                €<span x-text="getMealsTotal()"></span>
                            </span>
                        </div>
                        <template x-for="(mealType, index) in Object.keys(meals)" :key="mealType">
                            <div class="flex justify-between text-sm text-gray-700">
                                <!-- Meal type title -->
                                <span class="font-medium"
                                    x-text="mealType.charAt(0).toUpperCase() + mealType.slice(1)"></span>

                                <!-- Selected days for this meal -->
                                <span
                                    x-text="Object.entries(meals[mealType] || {})
            .filter(([day, selected]) => selected)
            .map(([day]) => day)
            .join(', ') || 'No meals selected'"></span>
                            </div>
                        </template>

                        <p class="text-xs text-gray-500 mt-1">For <span x-text="mealsPeople"></span> person(s)
                        </p>
                    </div>

                    <!-- General Info -->
                    <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-200">
                        <div class="grid md:grid-cols-2 gap-3 text-gray-700 text-sm">
                            <div>
                                <p><strong>Agree to help:</strong> <span x-text="agreeToHelp ? 'Yes' : 'No'"></span>
                                </p>
                            </div>
                            <div>
                                <p><strong>Member of club:</strong> <span x-text="memberOfClub ? 'Yes' : 'No'"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Price -->
                    <div class="bg-blue-600 text-white rounded-xl shadow-lg p-4 flex items-center justify-between">
                        <h3 class="text-lg font-semibold">Total Price</h3>
                        <div class="text-2xl font-bold">€<span x-text="getGrandTotal()"></span></div>
                    </div>
                </div>


                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row justify-center gap-4 pt-6">
                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Register
                    </button>
                    <button type="submit" name="register_another" value="1"
                        class="px-6 py-3 bg-gray-100 text-gray-800 rounded-lg hover:bg-gray-200 transition">
                        Submit & Register Another Dog
                    </button>
                </div>

                </form>
            </div>
        </div>
    </div>
    </div>

    @php
        // $preparedDates = $disciplines->groupBy('day')->map(function ($itemsByDay) {
        //     return $itemsByDay
        //         ->groupBy(function ($item) {
        //             return $item->discipline->name; // ✅ group by name
        //         })
        //         ->map(function ($itemsByType) {
        //             return $itemsByType
        //                 ->flatMap(function ($discipline) {
        //                     return $discipline->categories->pluck('name');
        //                 })
        //                 ->unique()
        //                 ->values();
        //         });
        // });
        // dd($preparedDates);
        // $preparedDates = $disciplines->map(function ($discipline) {
        //     return ['day' => $discipline->day];
        // });

        // dd($preparedDates);

        // $preparedTypes = $disciplines->map(function ($discipline) {
        //     return $discipline->map(function ($itemsByType) {
        //         // return $itemsByType
        //         //     ->flatMap(function ($discipline) {
        //         //         return $discipline->categories->pluck('name');
        //         //     })
        //         //     ->unique()
        //         //     ->values();
        //         dd($itemsByType);
        //     });
        // });
    @endphp

    <script>
        function eventInfo() {
            return {
                selectedDay: '',
                selectedType: '',
                daysData: @json($dates),
                meals: {},
                disciplines: @json($disciplines),
                selectedClass: '',
                registrations: [],
                selectedDays: [
                    // {
                    //     day: 'Monday',
                    //     type: 'Working Test',
                    //     class: 'Open'
                    // },
                    // {
                    //     day: 'Tuesday',
                    //     type: 'Dummy Trial',
                    //     class: 'Winner'
                    // }
                ],
                accommodation: {
                    checkin: null,
                    checkout: null,
                    dogs: 1,
                    people: 1,
                    notes: "",
                    pricePerNight: @json($event->accommodation_price),
                    pricePerDog: @json($event->per_dog_price),
                },
                meals: {
                    'breakfast': {},
                    'lunch': {},
                    'dinner': {}
                },
                mealsPeople: 1,
                agreeToHelp: false,
                memberOfClub: false,
                init() {
                    // prepare meals
                    const dateKeys = Object.keys(this.daysData);
                    Object.keys(this.meals).map(key => {
                        dateKeys.map(dateKey => {
                            this.meals[key][dateKey] = false;
                        })
                    });
                },
                getTotalNights() {
                    const checkin = new Date(this.accommodation.checkin);
                    const checkout = new Date(this.accommodation.checkout);
                    const diff = (checkout - checkin) / (1000 * 60 * 60 * 24);
                    return diff > 0 ? diff : 0;
                },
                getAccommodationTotal() {
                    return (this.getTotalNights() * (this.accommodation.pricePerNight * this.accommodation.people) + this
                        .accommodation.dogs * this.accommodation.pricePerDog);
                },
                getMealsTotal() {
                    const prices = {
                        breakfast: Number(@json($event->breakfast_price)),
                        lunch: Number(@json($event->lunch_price)),
                        dinner: Number(@json($event->dinner_price))
                    };
                    let total = 0;
                    Object.entries(this.meals).forEach(([mealType, days]) => {
                        Object.values(days).forEach(isSelected => {
                            if (isSelected) {
                                total += prices[mealType] * this.mealsPeople;
                            }
                        });
                    });
                    return total;
                },
                getParticipatingTotal() {
                    let total = 0;
                    this.registrations.map(registration => {
                        const target = this.daysData[registration.day][registration.type][0];
                        if (this.memberOfClub) {
                            total += Number(target.member_price);
                        } else {
                            total += Number(target.price);
                        }
                    })
                    return total
                },
                getGrandTotal() {
                    return this.getAccommodationTotal() + this.getMealsTotal() + this.getParticipatingTotal();
                },
                mealsDates() {
                    return this.daysData;
                },
                availableTypes(dayName) {
                    if (!dayName) {
                        return [];
                    }
                    const day = this.daysData[dayName];
                    const disciplines = Object.keys(day);
                    console.log("disc", disciplines);
                    return disciplines;
                },
                availableClasses(dayName, type) {
                    if (!type) {
                        return [];
                    }
                    const day = this.daysData[dayName];
                    const discipline = day[type];
                    console.log("discipline[0].categories", discipline[0].categories);
                    return discipline[0].categories;
                },
                addDay() {
                    if (!this.selectedDay || !this.selectedType || !this.selectedClass) {
                        alert('Please select day, type and class');
                        return;
                    }
                    this.registrations.push({
                        day: this.selectedDay,
                        type: this.selectedType,
                        cls: this.selectedClass
                    });
                    // reset selections
                    this.selectedDay = '';
                    this.selectedType = '';
                    this.selectedClass = '';
                },
                removeDay(index) {
                    this.registrations.splice(index, 1);
                },
                // dogs
                dogs: @json($userDogs),
                breeds: @json($breeds),
                selectedDog: null,
                dogInfo: {
                    name: '',
                    homeName: '',
                    regNumber: '',
                    microchip: '',
                    dob: '',
                    sex: '',
                    breed: ''
                },
                selectDog(id) {
                    const dog = this.dogs.find(d => d.id == id);
                    if (dog) this.dogInfo = {
                        ...dog
                    };
                    else this.dogInfo = {
                        registeredName: '',
                        homeName: '',
                        registrationNumber: '',
                        microchip: '',
                        dob: '',
                        gender: '',
                        breed: ''
                    };
                },
            }
        }
    </script>

</x-web-layout>
