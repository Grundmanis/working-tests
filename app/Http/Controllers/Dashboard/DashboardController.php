<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $events = Event::where('user_id',$user->id)->with('location')->paginate();
        return view('pages.dashboard.index', ['events' => $events]);
    }
}
