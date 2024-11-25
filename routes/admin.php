<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    CompagnieController,
    VolController,
    TrajetController,
    EscaleController
};
Route::get('compagnies/{compagnie}/vols', function (App\Models\Compagnie $compagnie) {
    return response()->json($compagnie->vols); // Vérifiez que la relation 'vols' existe
})->name('compagnies.vols');
// Toutes les routes ci-dessous sont protégées par 'auth' et 'admin'
Route::middleware(['auth', 'admin'])->group(function () {
    // Tableau de bord
    Route::get('/tableudebord', [DashboardController::class, 'index'])->name('tableudebord');

    // Gestion des compagnies
    // Route::resource('compagnies', CompagnieController::class);

    // Gestion des vols
    Route::resource('vols', VolController::class);

    // Gestion des trajets
    Route::resource('trajets', TrajetController::class);

    // Gestion des escales
    Route::prefix('trajets/{trajet}/escales')->group(function () {
        Route::get('create', [EscaleController::class, 'create'])->name('escales.create');
        Route::post('/', [EscaleController::class, 'store'])->name('escales.store');
        Route::get('/', [EscaleController::class, 'index'])->name('escales.index');
        Route::get('{escale}/edit', [EscaleController::class, 'edit'])->name('escales.edit');
        Route::put('{escale}', [EscaleController::class, 'update'])->name('escales.update');
        Route::delete('{escale}', [EscaleController::class, 'destroy'])->name('escales.destroy');
    });
});
