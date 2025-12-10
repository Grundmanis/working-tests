<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        return view('pages.events.index', [
            'dogs' => [],
        ]);
    }

    public function registerForm(Request $request, Event $event): View
    {
        $event->load('disciplineEvents.discipline');
        $event->load('disciplineEvents.categories');

        $userDogs = Dog::where('user_id', auth()->id())->get();

        $preparedDates = $event->disciplineEvents
            ->groupBy('day')
            ->map(function ($itemsByDay) {
                return $itemsByDay
                    ->groupBy(fn($item) => $item->discipline->name);
            });

        $disciplines = $event->disciplineEvents
            ->pluck('discipline.name')
            ->unique()
            ->values();

        $user = auth()->user();

        return view('pages.events.register', [
            'event' => $event,
            'dates' => $preparedDates,
            'disciplines' => $disciplines,
            'userDogs' => $userDogs,
            'breeds' => Dog::$breeds,
            'user' => $user,
        ]);
    }
}
