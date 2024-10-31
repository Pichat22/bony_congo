<?php

namespace App\Http\Controllers;

use App\Models\compagnie;
use Illuminate\Http\Request;

class CompagnieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compagnies= Compagnie::all();
        return view('compagnies.index',compact('compagnies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('compagnies.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_compagnie'=>'required',
        ],[
           'nom_compagnie.required'=>'Le nom compagnie est obligatoire', 
        ]);
        $compagnie = new compagnie();
        $compagnie->nom_compagnie=$request->nom_compagnie;
        $compagnie->save();
        return redirect()->route('compagnies.index')->with('message',' compagnie ajouter avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(compagnie $compagnie)
    {
        return view('compagnies.detail',compact('compagnie'));
        
    }

    public function showVols($id)
    {
        $compagnie = Compagnie::with('vols')->findOrFail($id);
        return view('compagnies.vols', compact('compagnie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(compagnie $compagnie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, compagnie $compagnie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(compagnie $compagnie)
    {
        //
    }
}
