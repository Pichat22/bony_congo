<?php

namespace App\Http\Controllers;

use App\Models\vol;
use App\Models\compagnie;
use Illuminate\Http\Request;

class VolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vols= vol::all();
        return view('vols.index',compact('vols'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $compagnies = compagnie::all();
        return view('vols.form',compact('compagnies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_de_place'=>'required',
            'matricule'=>'required',
            'marque'=>'required',
            'date_de_creation'=>'required',
            'compagnie_id'=>'required'


        ],[
           'nombre_de_place.required'=>'Le nombre de place est obligatoire',
            'matricule.required'=>'Le matricule est obligatoire',
            'marque.required'=>'La marque est obligatoire',
            'date_de_creation.required'=>'La date de creation est obligatoire',
            'compagnie_id.required'=>'La compagnie est obligatoire' 
        ]);
        $vol=new vol();
        $vol->nombre_de_place=$request->nombre_de_place;
        $vol->matricule=$request->matricule;
        $vol->marque=$request->marque;
        $vol->date_de_creation=$request->date_de_creation;
        $vol->compagnie_id=$request->compagnie_id;
        $vol->save();
        return redirect()->route('vols.index')->with('message','vol ajoute avec succes');



        

    }

    /**
     * Display the specified resource.
     */
    public function show(vol $vol)
    {
        return view('vols.detail',compact('vol'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(vol $vol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vol $vol)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vol $vol)
    {
        $vol->delete(); 
        return redirect()->route('vols.index');
        
    }
}
