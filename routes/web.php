<?php

use App\Models\vol;
use App\Models\reservation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VolController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompagnieController;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/compagnies/create', [CompagnieController::class, 'create'])->name('compagnie.create');
    Route::get('/compagnies', [CompagnieController::class, 'index'])->name('compagnie.index');
    Route::Post('/compagnies', [CompagnieController::class, 'store'])->name('compagnie.store');
    Route::get('/detail/{compagnie}', [CompagnieController::class, 'show'])->name('compagnie.show');


    Route::get('/vols/create', [VolController::class, 'create'])->name('vol.create');
    Route::Post('/vols', [VolController::class, 'store'])->name('vol.store');
    Route::get('/vols', [VolController::class, 'index'])->name('vol.index');
    Route::get('/detail/{vol}', [VolController::class, 'show'])->name('vol.show');
    Route::put('/update/{vol}', [VolController::class, 'update'])->name('vol.update');
    Route::delete('vol/delete/{vol}', [VolController::class, 'destroy'])->name('vol.delete');

    Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservation.create');
    Route::Post('/reservations', [ReservationController::class, 'store'])->name('reservation.store');
    Route::get('/detail/{reservation}', [ReservationController::class, 'show'])->name('reservation.show');
    Route::put('/update/{reservation}', [ReservationController::class, 'update'])->name('reservation.update');
    Route::delete('/delete/{reservation}', [ReservationController::class, 'destroy'])->name('reservation.delete');


    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservation.index');

});

require __DIR__.'/auth.php';
