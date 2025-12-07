<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
    * Display the user's profile form.
    */
   public function index(Request $request): View
   {
        $events = Event::with('location', 'judges', 'disciplines', 'organization')->paginate();
        return view('pages.home.index', [
           'events' => $events,
        ]);
   }
}
