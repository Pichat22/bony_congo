<?php

use Illuminate\Support\Facades\Route;
use App\Models\reservation;
use App\Http\Controllers\{
    ProfileController,
    ReservationController,
    PaiementController,
    HotelController

};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Ces routes sont accessibles à tous les utilisateurs authentifiés.
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});
// Route vers le tableau de bord (accessible après authentification et vérification email)
Route::get('/dashboard', function () {
    $user=Auth::user();
    $reservations=[];
    if ($user->role === 'client') {
        $reservations = Reservation::where('user_id', $user->id)->get();
    }

    return view('dashboard', compact('reservations'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Groupement des routes accessibles à tous les utilisateurs authentifiés
Route::middleware('auth')->group(function () {

    // Gestion du profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Recherche et gestion des réservations
    Route::post('reservations/search', [ReservationController::class, 'search'])->name('reservations.search');
    Route::resource('reservations', ReservationController::class);
    Route::get('/user_reservation', [ReservationController::class, 'ReservationByUser'])->name('reservations.user');
    Route::get('reservations/{id}/download', [ReservationController::class, 'downloadPDF'])->name('reservations.download');

    // Gestion des paiements
    Route::resource('paiements', PaiementController::class);

    // Gestion des hotels
    Route::resource('hotels', HotelController::class);
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
