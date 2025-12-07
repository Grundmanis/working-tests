<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $event->name }}
        </h2>
    </x-slot>

    <div class="p-6 dark:bg-gray-900 min-h-screen dark:text-gray-200 flex justify-center">
        <div class="w-full max-w-6xl">

            <x-success-alert :success="session('success')" />
            <x-error-alert :errors="$errors" />

            <form method="POST" action="{{ route('dashboard.event.update', $event->id) }}" x-data="eventForm()"
                class="space-y-6 bg-white dark:bg-gray-900 p-6 rounded-xl shadow-lg">
                @csrf
                @method('PUT')

                <!-- Event Name -->
                <div>
                    <label class="block dark:text-gray-200 font-semibold">Event Name</label>
                    <input type="text" name="name" value="{{ old('name', $event->name) }}"
                        class="mt-1 w-full border dark:border-gray-700 rounded-md px-3 py-2 dark:bg-gray-800 dark:text-gray-100" />
                </div>
                <div>
                    <label class="block dark:text-gray-200 font-semibold">Secretary info</label>
                    <input type="text" name="secretary" value="{{ old('secretary', $event->secretary) }}"
                        class="mt-1 w-full border dark:border-gray-700 rounded-md px-3 py-2 dark:bg-gray-800 dark:text-gray-100" />
                </div>

                <div>
                    <label class="block dark:text-gray-200 font-semibold">Organization</label>
                    <div class="flex gap-2 mt-1">
                        <select name="organization_id"
                            class="w-full border dark:border-gray-700 rounded-md px-3 py-2 dark:bg-gray-800 dark:text-gray-100">
                            @foreach ($organizations as $organization)
                                <option value="{{ $organization->id }}"
                                    @if ($event->organization_id == $organization->id) selected @endif>
                                    {{ $organization->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Event Dates -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block dark:text-gray-200 font-semibold">Event Start</label>
                        <input type="date" name="start_date" value="{{ $event->start_date->format('Y-m-d') }}"
                            class="mt-1 w-full border dark:border-gray-700 rounded-md px-3 py-2 dark:bg-gray-800 dark:text-gray-100" />
                    </div>

                    <div>
                        <label class="block dark:text-gray-200 font-semibold">Event End</label>
                        <input type="date" name="end_date" value="{{ $event->end_date->format('Y-m-d') }}"
                            class="mt-1 w-full border dark:border-gray-700 rounded-md px-3 py-2 dark:bg-gray-800 dark:text-gray-100" />
                    </div>
                </div>

                <!-- Registration Dates -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block dark:text-gray-200 font-semibold">Registration Start</label>
                        <input type="date" name="registration_start"
                            value="{{ $event->registration_start->format('Y-m-d') }}"
                            class="mt-1 w-full border dark:border-gray-700 rounded-md px-3 py-2 dark:bg-gray-800 dark:text-gray-100" />
                    </div>

                    <div>
                        <label class="block dark:text-gray-200 font-semibold">Registration End</label>
                        <input type="date" name="registration_end"
                            value="{{ $event->registration_end->format('Y-m-d') }}"
                            class="mt-1 w-full border dark:border-gray-700 rounded-md px-3 py-2 dark:bg-gray-800 dark:text-gray-100" />
                    </div>
                </div>

                <!-- Additional Info -->
                <div>
                    <label class="block dark:text-gray-200 font-semibold">Additional Information</label>
                    <textarea name="description" rows="4"
                        class="mt-1 w-full border dark:border-gray-700 rounded-md px-3 py-2 dark:bg-gray-800 dark:text-gray-100">{{ $event->description }}</textarea>
                </div>

                <!-- Location -->
                <div x-data="{ newLocation: false }">
                    <label class="block dark:text-gray-200 font-semibold">Location</label>

                    <template x-if="!newLocation">
                        <div class="flex gap-2 mt-1">
                            <select name="location_id"
                                class="w-full border dark:border-gray-700 rounded-md px-3 py-2 dark:bg-gray-800 dark:text-gray-100">
                                @foreach ($locations as $loc)
                                    <option value="{{ $loc->id }}"
                                        @if ($event->location_id == $loc->id) selected @endif>
                                        {{ $loc->name }}
                                    </option>
                                @endforeach
                            </select>

                            <button type="button" @click="newLocation = true"
                                class="px-3 py-2 bg-blue-600 text-white rounded-md">Add</button>
                        </div>
                    </template>

                    <template x-if="newLocation">
                        <div class="mt-2 flex gap-2">
                            <input type="text" name="new_location" placeholder="New location"
                                class="w-full border dark:border-gray-700 rounded-md px-3 py-2 dark:bg-gray-800 dark:text-gray-100" />

                            <button type="button" @click="newLocation = false"
                                class="px-3 py-2 bg-gray-500 text-white rounded-md">Cancel</button>
                        </div>
                    </template>
                </div>

                <!-- Judges -->
                <div>
                    <label class="block dark:text-gray-200 font-semibold">Judges</label>

                    @if ($errors->has('judges'))
                        <p class="text-red-500 text-sm mt-1">
                            {{ $errors->first('judges') }}
                        </p>
                    @endif

                    <div class="flex gap-2 mt-1">
                        <select x-model="selectedJudge"
                            class="w-full border dark:border-gray-700 rounded-md px-3 py-2 dark:bg-gray-800 dark:text-gray-100">
                            <option value="">Select judge...</option>
                            @foreach ($judges as $j)
                                <option value="{{ $j->id }}">{{ $j->name }}</option>
                            @endforeach
                        </select>

                        <button type="button" @click="addJudge"
                            class="px-3 py-2 bg-blue-600 text-white rounded-md">Add</button>

                        <button type="button" @click="showNewJudge = true"
                            class="px-3 py-2 bg-green-600 text-white rounded-md">New</button>
                    </div>

                    <!-- Added judges list -->
                    <div class="mt-3 space-y-1" x-show="judges.length">
                        <template x-for="(judge, index) in judges" :key="index">
                            <div class="flex justify-between bg-gray-100 dark:bg-gray-800 p-2 rounded-md">
                                <span x-text="judge.name" class="dark:text-gray-200"></span>
                                <button type="button" @click="removeJudge" class="text-red-500">Remove</button>
                            </div>
                        </template>
                    </div>

                    <!-- New judge input -->
                    <div class="mt-2" x-show="showNewJudge">
                        <input type="text" x-model="newJudge" placeholder="New judge name"
                            class="w-full border dark:border-gray-700 rounded-md px-3 py-2 dark:bg-gray-800 dark:text-gray-100" />
                        <button type="button" @click="createJudge"
                            class="mt-2 px-3 py-2 bg-green-600 text-white rounded-md">Add judge</button>
                    </div>

                    <!-- Hidden input to submit judge IDs -->
                    <input type="hidden" name="judges" :value="JSON.stringify(judgesToSend)">
                </div>

                <!-- Add Discipline -->
                <div>
                    <label class="text-gray-700 dark:text-gray-200">Add Discipline</label>

                    <div class="flex gap-2 mt-1">
                        <select x-model="selectedDiscipline"
                            class="w-full border dark:border-gray-700 rounded-md px-3 py-2 dark:bg-gray-800 dark:text-gray-100">
                            <option value="">Select discipline…</option>
                            @foreach ($disciplines as $d)
                                <option value="{{ $d->id }}">{{ $d->name }}</option>
                            @endforeach
                        </select>

                        <button type="button" @click="addDiscipline()"
                            class="px-3 py-2 bg-blue-600 text-white rounded-md">Add</button>
                    </div>
                </div>

                @if ($errors->has('disciplines_payload'))
                    <p class="text-red-500 text-sm mt-1">
                        {{ $errors->first('disciplines_payload') }}
                    </p>
                @endif

                <!-- Render disciplines -->
                <div class="space-y-4">
                    <template x-for="(disc, dIndex) in disciplines" :key="disc.id">
                        <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">

                            <!-- Title -->
                            <div class="flex justify-between">
                                <h3 class="font-semibold dark:text-gray-200" x-text="disc.name"></h3>
                                <button type="button" @click="disciplines.splice(dIndex, 1)"
                                    class="text-red-500">Remove</button>
                            </div>

                            <!-- Day -->
                            <div class="mt-3">
                                <label class="dark:text-gray-200">Day</label>
                                <input type="date" x-model="disc.day"
                                    class="w-full border dark:border-gray-700 rounded-md px-3 py-2 dark:bg-gray-800 dark:text-gray-100">
                            </div>
                            <div class="mt-3">
                                <label class="dark:text-gray-200">Max participants</label>
                                <input type="number" x-model="disc.max_participants"
                                    class="w-full border dark:border-gray-700 rounded-md px-3 py-2 dark:bg-gray-800 dark:text-gray-100">
                            </div>

                            <!-- Categories -->
                            <div class="mt-3">
                                <label class="dark:text-gray-200">Categories</label>

                                <div class="flex gap-2 mt-1">
                                    <select x-model="selectedCategory"
                                        class="w-full border dark:border-gray-700 rounded-md px-3 py-2 dark:bg-gray-800 dark:text-gray-100">
                                        <option value="">Select category…</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>

                                    <button type="button" @click="addCategory(dIndex)"
                                        class="px-3 py-2 bg-blue-600 text-white rounded-md">Add</button>

                                    <button type="button" @click="showNewCategory = true"
                                        class="px-3 py-2 bg-green-600 text-white rounded-md">New</button>
                                </div>

                                <div class="mt-2 space-y-1">
                                    <template x-for="(cat, cIndex) in disc.categories" :key="cat.id">
                                        <div class="flex justify-between bg-gray-200 dark:bg-gray-700 p-2 rounded-md">
                                            <span x-text="cat.name" class="dark:text-gray-200"></span>
                                            <button @click="disc.categories.splice(cIndex,1)"
                                                class="text-red-500">Remove</button>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>


                <!-- Hidden output -->
                <textarea hidden name="disciplines_payload" x-text="JSON.stringify(disciplines)"></textarea>

                <button class="mt-6 w-full px-4 py-3 bg-blue-700 text-white font-semibold rounded-md shadow">
                    {{ __('save') }}
                </button>
            </form>
        </div>
    </div>

    @php
        $disciplinesJson = $event->disciplines
            ->map(function ($d) {
                // Use pivot->categories
                $categories = collect($d->pivot->categories ?? [])
                    ->map(function ($c) {
                        return [
                            'id' => $c->id,
                            'name' => $c->name,
                        ];
                    })
                    ->toArray();

                return [
                    'id' => $d->id,
                    'name' => $d->name,
                    'day' => $d->pivot->day ?? '',
                    'max_participants' => $d->pivot->max_participants ?? 0,
                    'categories' => $categories,
                ];
            })
            ->toArray();

        $judgeIds = $event->judges->pluck('id');
    @endphp

    <script>
        function eventForm() {
            return {
                // Judges
                selectedJudge: "",
                judges: @json($event->judges ?? []),
                judgesToSend: @json($judgeIds ?? []),
                showNewJudge: false,
                newJudge: "",

                addJudge() {
                    if (!this.selectedJudge) return;
                    const select = document.querySelector('[x-model=selectedJudge]');
                    const name = select.options[select.selectedIndex].text;
                    this.judges.push({
                        id: this.selectedJudge,
                        name
                    });
                    this.judgesToSend.push(this.selectedJudge);
                    this.selectedJudge = "";
                },

                createJudge() {
                    if (!this.newJudge.trim()) return;
                    this.judges.push({
                        id: null,
                        name: this.newJudge.trim()
                    });
                    this.newJudge = "";
                    this.showNewJudge = false;
                },

                removeJudge(index) {
                    this.judges.splice(index, 1)
                    this.judgesToSend.splice(index, 1)
                },

                // Disciplines with categories
                disciplines: @json($disciplinesJson),

                // Dropdown helpers
                selectedDiscipline: "",
                selectedCategory: "",
                showNewCategory: false,
                newCategoryName: "",

                addDiscipline() {
                    if (!this.selectedDiscipline) return;

                    const option = document.querySelector("[x-model=selectedDiscipline]");
                    const name = option.options[option.selectedIndex].text;

                    this.disciplines.push({
                        id: Number(this.selectedDiscipline),
                        name: name,
                        day: "",
                        max_participants: 0,
                        categories: []
                    });

                    this.selectedDiscipline = "";
                },

                addCategory(dIndex) {
                    if (!this.selectedCategory) return;

                    const select = document.querySelector("[x-model=selectedCategory]");
                    const name = select.options[select.selectedIndex].text;

                    this.disciplines[dIndex].categories.push({
                        id: Number(this.selectedCategory),
                        name
                    });

                    this.selectedCategory = "";
                },

                saveNewCategory() {
                    // backend ajax → return newly created category
                    // for now just push a fake category
                    const newId = Math.floor(Math.random() * 1000000);

                    this.disciplines.forEach(d => {
                        d.categories.push({
                            id: newId,
                            name: this.newCategoryName
                        });
                    });

                    this.newCategoryName = "";
                    this.showNewCategory = false;
                }
            }
        }
    </script>
</x-app-layout>
