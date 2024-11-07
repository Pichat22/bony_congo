<?php

namespace App\Http\Controllers;

use id;
use App\Models\vol;
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
        $reservation->nombre_de_place=$request->nombre_de_place;
        $reservation->user_id=Auth::id();

        $reservation->save();
        return redirect()->route('reservations.index')->with('message',' reserver avec succes');


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
