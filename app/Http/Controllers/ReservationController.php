<?php

namespace App\Http\Controllers;

use App\Models\vol;
use App\Models\reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vols = vol::all();

        return view('reservations.form',compact('vols'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'statut'=>'required',
            'classe'=>'required',
            'vol_id'=>'required'
        ],[
           'date.required'=>'La date est obligatoire',
            'statut.required'=>'Le statut est obligatoire',
            'classe.required'=>'La classe est obligatoire',
            'vol_id.required'=>'le vol_id est obligatoire' 
        ]);
        $reservation = new reservation();
        $reservation->date=$request->date;
        $reservation->statut=$request->statut;
        $reservation->classe=$request->classe;
        $reservation->vol_id=$request->vol_id;
        $reservation->save();
        return redirect()->route('reservation.index')->with('message',' reserver avec succes');


    }

    /**
     * Display the specified resource.
     */
    public function show(reservation $reservation)
    {
        return view('reservations.detail',compact('reservation'));
        
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
        return redirect()->route('reservation.index');
        
    }
}
