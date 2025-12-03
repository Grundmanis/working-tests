<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;


class PeopleController extends Controller
{
      /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        return view('people.index', [
            'dogs' => [],
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('people.edit', [
            'dog' => [],
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function add(Request $request): View
    {
        return view('people.add', [
            'dog' => [],
        ]);
    }
}
