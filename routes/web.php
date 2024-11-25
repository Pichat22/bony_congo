<?php

use Illuminate\Support\Facades\Route;
use App\Models\Ville;

use App\Models\reservation;
use App\Http\Controllers\{
    ProfileController,
    ReservationController,
    PaiementController,
    HotelController,
    CompagnieController

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
Route::get('compagnies/{compagnie}/vols', function (App\Models\Compagnie $compagnie) {
    return response()->json($compagnie->vols); 
})->name('compagnies.vols');
// Groupement des routes accessibles à tous les utilisateurs authentifiés
Route::middleware('auth')->group(function () {

    // Gestion du profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/villes/{ville}/hotels', [HotelController::class, 'getHotels'])->name('hotels.get');

    // Recherche et gestion des réservations
    Route::resource('reservations', ReservationController::class);
    Route::post('reservations/search', [ReservationController::class, 'search'])->name('reservations.search');
    
    Route::get('/user_reservation', [ReservationController::class, 'ReservationByUser'])->name('reservations.user');
    Route::get('reservations/{id}/download', [ReservationController::class, 'downloadPDF'])->name('reservations.download');
    Route::post('/reservations/hotel', [ReservationController::class, 'storeHotel'])->name('reservations.hotel.store');
    // Route::post('/reservations/{id}', [ReservationController::class, 'update'])->name('reservations.update');


    // Gestion des paiements
    Route::resource('paiements', PaiementController::class);
    Route::get('/hotels/search', [HotelController::class, 'searchForm'])->name('hotels.search');
    // Gestion des hotels
    Route::resource('hotels', HotelController::class);
    Route::resource('compagnies', CompagnieController::class);

});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
