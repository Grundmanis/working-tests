<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateDogRequest;
use App\Models\Dog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DogController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        $dogs = Dog::where('user_id', auth()->id())->get();
        return view('pages.dogs.index', [
            'dogs' => $dogs,
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Dog $dog): View
    {
        return view('pages.dogs.edit', [
            'dog' => $dog,
            'breeds' => Dog::$breeds,
        ]);
    }

    public function update(UpdateDogRequest $request, Dog $dog)
    {
        $dog->fill([
            'registeredName' => $request->registeredName,
            'homeName' => $request->homeName,
            'registrationNumber' => $request->registrationNumber,
            'microchip' => $request->microchip,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'breed' => $request->breed,
        ]);
        $dog->save();

        return redirect()
            ->route('dogs.edit', $dog->id)
            ->with('success', 'Dog updated successfully.');
    }

    /**
     * Display the user's profile form.
     */
    public function create(Request $request): View
    {
        return view('pages.dogs.create', [
            'breeds' => Dog::$breeds,
        ]);
    }

    public function store(UpdateDogRequest $request)
    {
        $dog = new Dog();
        $dog->fill([
            'registeredName' => $request->registeredName,
            'homeName' => $request->homeName,
            'registrationNumber' => $request->registrationNumber,
            'microchip' => $request->microchip,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'breed' => $request->breed,
            'user_id' => auth()->id(),
        ]);
        $dog->save();

        return redirect()
            ->route('dogs.index')
            ->with('success', 'Dog created successfully.');
    }
}
