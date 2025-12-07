<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Discipline;
use App\Models\DisciplineEvent;
use App\Models\Event;
use App\Models\Judge;
use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            // Seed base data
            $locations = Location::factory(5)->create();
            $judges = Judge::factory(5)->create();
            $categories = Category::factory(5)->create();
            $disciplines = Discipline::factory(3)->create();
            $user = User::first();

            // Create events
            Event::factory(3)->create()->each(function ($event) use ($disciplines, $categories, $judges, $locations, $user) {

                // Attach disciplines to event with random day
                $disciplineSync = $disciplines->mapWithKeys(function ($discipline) {
                    return [
                        $discipline->id => ['day' => now()->addDays(rand(1, 30)), 'max_participants' => 25],
                    ];
                })->toArray();

                $event->disciplines()->sync($disciplineSync);

                // Fetch actual pivot records (DisciplineEvent) for attaching categories
                $disciplineEvents = DisciplineEvent::where('event_id', $event->id)->get();

                // Attach 1-3 random categories per discipline
                $disciplineEvents->each(function ($disciplineEvent) use ($categories) {
                    $randomCategories = $categories->random(rand(1,3))->pluck('id')->toArray();
                    $disciplineEvent->categories()->sync($randomCategories);
                });

                // Attach judges
                $event->judges()->sync($judges->pluck('id'));

                // Assign location and user
                $event->location()->associate($locations->random());
                $event->user()->associate($user);
                $event->save();
            });
        });
    }
}
