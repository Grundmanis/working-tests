<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DogController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\EventController as DashboardEventController;
use App\Http\Controllers\OrganizationController;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    $locale = 'en';
    if (Session::has('locale')) {
        $locale = Session::get('locale');
    }

    return redirect('/' . $locale);
});

Route::prefix('{locale}')
    ->where(['locale' => implode('|', config('app.available_locales'))])
    ->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('events');
    });

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


    Route::get('events/create', [DashboardEventController::class, 'create'])->name('dashboard.event.create');
    Route::get('/events/{event}', [DashboardEventController::class, 'show'])->name('dashboard.event.show');
    Route::get('/events/{event}/edit', [DashboardEventController::class, 'edit'])->name('dashboard.event.edit');

    Route::put('/events/{event}', [DashboardEventController::class, 'update'])
        ->name('dashboard.event.update');


    Route::post('/events', [DashboardEventController::class, 'store'])
        ->name('dashboard.event.store');

    Route::resource('organizations', OrganizationController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/{event}/register', [EventController::class, 'registerForm'])->name('events.registerForm');


    Route::resource('dogs', DogController::class);
});

require __DIR__ . '/auth.php';
