<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reservation;
use App\Models\Paiement;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paiements= Paiement::all();
        return view('paiements.index',compact('paiements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $users = User::all();
        $reservations = Reservation::all();
        return view('paiements.form', compact('users', 'reservations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required',
            'reservation_id'=>'required',
            'montant'=>'required',
            'date_paiement'=>'required',
            'moyen_paiement'=>'required',


        ]);
        Paiement::create($request->all());

        return redirect()->route('paiements.index')->with('success', 'Paiement enregistré avec succès');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Paiement $paiement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paiement $paiement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paiement $paiement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paiement $paiement)
    {
        //
    }
}
