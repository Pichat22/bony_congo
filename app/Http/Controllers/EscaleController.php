<?php

namespace App\Http\Controllers;

use App\Models\Escale;
use App\Models\Trajet;
use App\Models\Ville;
use Illuminate\Http\Request;

class EscaleController extends Controller
{
    // Afficher toutes les escales pour un trajet spécifique
    public function index(Trajet $trajet)
    {
        $escales = $trajet->escales()->with('ville')->orderBy('ordre')->get();
        return view('escales.index', compact('trajet', 'escales'));
    }
    // Afficher le formulaire pour ajouter une escale
    public function create($trajetId)
    {
        $trajet = Trajet::findOrFail($trajetId);
        $villes = Ville::all();
        return view('escales.create', compact('trajet', 'villes'));
    }

    // Enregistrer une nouvelle escale
    public function store(Request $request, $trajetId)
    {
        $request->validate([
            'ville_id' => 'required|exists:villes,id',
            'ordre' => 'nullable|integer',
        ]);

        Escale::create([
            'trajet_id' => $trajetId,
            'ville_id' => $request->ville_id,
            'ordre' => $request->ordre ?? Escale::where('trajet_id', $trajetId)->max('ordre') + 1,
        ]);

        return redirect()->route('escales.index', $trajetId)->with('success', 'Escale ajoutée avec succès.');
    }

    // Afficher le formulaire pour modifier une escale
    public function edit($id)
    {
        $escale = Escale::findOrFail($id);
        $villes = Ville::all();
        return view('escales.edit', compact('escale', 'villes'));
    }

    // Mettre à jour une escale
    public function update(Request $request, $id)
    {
        $request->validate([
            'ville_id' => 'required|exists:villes,id',
            'ordre' => 'nullable|integer',
        ]);

        $escale = Escale::findOrFail($id);
        $escale->update($request->all());

        return redirect()->route('escales.index', $escale->trajet_id)->with('success', 'Escale mise à jour avec succès.');
    }

    // Supprimer une escale
    public function destroy($id)
    {
        $escale = Escale::findOrFail($id);
        $trajetId = $escale->trajet_id;
        $escale->delete();

        return redirect()->route('escales.index', $trajetId)->with('success', 'Escale supprimée avec succès.');
    }
}
