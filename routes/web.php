<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DogController;
use App\Http\Controllers\EventControler;
use App\Http\Controllers\PeopleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('events');


Route::get('/registerDog', function () {
    return view('registerDog');
})->name('registerDog');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/dogs', [DogController::class, 'index'])->name('dogs.index');
    Route::get('/dogs/edit', [DogController::class, 'edit'])->name('dogs.edit');
    Route::get('/dogs/add', [DogController::class, 'add'])->name('dogs.add');

    Route::get('/people', [PeopleController::class, 'index'])->name('people.index');
    Route::get('/people/edit', [PeopleController::class, 'edit'])->name('people.edit');
    Route::get('/people/add', [PeopleController::class, 'add'])->name('people.add');

    Route::get('/events', [EventControler::class, 'index'])->name('events.index');
    Route::get('/events/edit', [EventControler::class, 'edit'])->name('events.edit');
    Route::get('/events/add', [EventControler::class, 'add'])->name('events.add');
});

require __DIR__.'/auth.php';
