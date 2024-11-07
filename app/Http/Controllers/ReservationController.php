<?php

namespace App\Http\Controllers;

use id;
use App\Models\vol;
use App\Models\Ville;
use App\Models\Trajet;
use App\Models\compagnie;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=Auth::user();
        if($user->role==='client'){
            $reservations=Reservation::where('user_id',$user->id)->get();
        }
        
        if($user->role==='admin'){
        $reservations = Reservation::all();

        }
        return view('reservations.index',compact('reservations'));
    }

    public function create()
    {
        $villes = Ville::all(); // Pour permettre la sélection des villes de départ et d'arrivée
        return view('reservations.form', compact('villes'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'ville_depart_id' => 'required|exists:villes,id',
            'ville_arrivee_id' => 'required|exists:villes,id|different:ville_depart_id',
        ]);

        $trajets = Trajet::where('ville_depart_id', $request->ville_depart_id)
            ->where('ville_arrivee_id', $request->ville_arrivee_id)
            ->where('date_depart', $request->date)
            ->with('compagnie', 'vol')
            ->get();

        return view('reservations.voldispo', compact('trajets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'trajet_id' => 'required|exists:trajets,id',
            'nombre_de_place' => 'required|integer|min:1',
        ]);

        Reservation::create([
            'user_id' => Auth::id(),
            'trajet_id' => $request->trajet_id,
            'nombre_de_place' => $request->nombre_de_place,
            'date' => now(),
            'statut' => 'confirmée',
            'classe' => $request->classe,
        ]);

        return redirect()->route('reservations.index')->with('success', 'Réservation créée avec succès.');
    }
    /**
     * Display the specified resource.
     */
    public function show(reservation $reservation)
    {
        $reservation = Reservation::with(['user', 'vol.compagnie'])->findOrFail($id);
        
        return view('reservations.detail',compact('reservation'));
        
    }
    public function ReservationByUser(){

        $reservation = Reservation::with('user')->get()->groupBy('user_id');
        
        return view('reservation.user', compact('reservation'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index');
        
    }
}
