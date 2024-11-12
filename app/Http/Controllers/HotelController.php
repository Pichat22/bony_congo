<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Ville;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels= hotel::all();
        return view('hotels.index',compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villes = Ville::all(); // Pour permettre la sélection des villes de départ et d'arrivée

        return view('hotels.form',compact('villes'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
       $request->validate([
        'nom'=>'required',
        'adresse'=>'required',
        'etoil'=>'required',
        'prix'=>'required',
        'ville_id'=>'required',


       ]);
       
       Hotel::create($request->all());

       
       return redirect()->route('hotels.index')->with('success', 'hotel enregistré avec succès');



    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        return view('hotels.detail',compact('hotel'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete(); 
        return redirect()->route('hotels.index');
    }
    public function getHotels($villeId)
{
    $hotels = Hotel::where('ville_id', $villeId)->get();
    return response()->json($hotels);
}
public function search(Request $request)
{
    $request->validate([
        'ville_id' => 'required|exists:villes,id',
    ]);

    $hotels = Hotel::where('ville_id', $request->ville_id)->get();

    return view('hotels.result', compact('hotels'));
}
public function searchForm()
{
    $villes = Ville::all();

    return view('hotels.search', compact('villes'));

}}
