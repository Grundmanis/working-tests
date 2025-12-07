<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Category;
use App\Models\Discipline;
use App\Models\DisciplineEvent;
use App\Models\Event;
use App\Models\Judge;
use App\Models\Location;
use App\Models\Organization;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::all();
        $judges = Judge::all();
        $disciplines = Discipline::all();
        $categories = Category::all();
        $userId = auth()->id();
        $organizations = Organization::whereHas('members', function($query) use ($userId) {
            $query->where('users.id', $userId);
        })->get();

        return view('pages.dashboard.events.create', [
            'locations' => $locations,
            'judges' => $judges,
            'disciplines' => $disciplines,
            'categories' => $categories,
            'organizations' => $organizations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        DB::transaction(function () use ($request) {
            $event = new Event();
            $event->fill([
                'name' => $request->name,
                'registration_start' => $request->registration_start,
                'registration_end' => $request->registration_end,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'description' => $request->description,
                'location_id' => $request->location_id,
                'secretary' => $request->secretary,
                'user_id' => auth()->id(),
                'organization_id' => $request->organization_id
            ])->save();

            // judges
            $event->judges()->sync($request->judges ?? []);

            // disciplines
            $disciplines = $request->disciplines_payload;
            $pivotData = [];
            foreach ($disciplines as $d) {
                $pivotData[$d['id']] = [
                    'day' => $d['day'] ?? null,
                    'max_participants' => $d['max_participants'],
                ];
            }

            $event->disciplines()->sync($pivotData);

            foreach ($disciplines as $d) {
                $disciplineEvent = $event
                    ->disciplines()
                    ->where('discipline_id', $d['id'])
                    ->first()
                    ->pivot; // this is DisciplineEvent model

                $categoryIds = collect($d['categories'])->pluck('id')->toArray();
                $disciplineEvent->categories()->sync($categoryIds);
            }

        });

        return redirect()
            ->route('dashboard')
            ->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('pages.dashboard.events.show', [
            'event' => $event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $locations = Location::all();
        $judges = Judge::all();
        $disciplines = Discipline::all();
        $categories = Category::all();
        $userId = auth()->id();
        $organizations = Organization::whereHas('members', function($query) use ($userId) {
            $query->where('users.id', $userId);
        })->get();

        // Load event with disciplines and pivot
        $event->load([
            'disciplines' => function ($q) {
                $q->withPivot('id', 'day');
            }
        ]);

        // Fetch pivot models with their categories
        $disciplineEventIds = $event->disciplines->pluck('pivot.id');
        $disciplineEvents = DisciplineEvent::with('categories')
            ->whereIn('id', $disciplineEventIds)
            ->get()
            ->keyBy('id'); // key by pivot id for easy lookup

        // Attach categories to the pivot directly
        $event->disciplines->each(function ($discipline) use ($disciplineEvents) {
            $pivot = $discipline->pivot;
            if (isset($disciplineEvents[$pivot->id])) {
                $pivot->categories = $disciplineEvents[$pivot->id]->categories;
            } else {
                $pivot->categories = collect();
            }
        });
    
        return view('pages.dashboard.events.edit', [
            'event' => $event,
            'locations' => $locations,
            'judges' => $judges,
            'disciplines' => $disciplines,
            'categories' => $categories,
            'disciplineEvents' => $disciplineEvents,
            'organizations' => $organizations,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        DB::transaction(function () use ($event, $request) {
            $event->fill([
                'name' => $request->name,
                'registration_start' => $request->registration_start,
                'registration_end' => $request->registration_end,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'description' => $request->description,
                'location_id' => $request->location_id,
                'secretary' => $request->secretary,
                'organization_id' => $request->organization_id
            ])->save();

            // judges
            $event->judges()->sync($request->judges ?? []);

            // disciplines
            $disciplines = $request->disciplines_payload;
            $pivotData = [];
            foreach ($disciplines as $d) {
                $pivotData[$d['id']] = [
                    'day' => $d['day'] ?? null,
                    'max_participants' => $d['max_participants'],
                ];
            }

            $event->disciplines()->sync($pivotData);

            foreach ($disciplines as $d) {
                $disciplineEvent = $event
                    ->disciplines()
                    ->where('discipline_id', $d['id'])
                    ->first()
                    ->pivot; // this is DisciplineEvent model

                $categoryIds = collect($d['categories'])->pluck('id')->toArray();
                $disciplineEvent->categories()->sync($categoryIds);
            }

        });

        return redirect()
            ->route('dashboard.event.edit', $event->id)
            ->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
