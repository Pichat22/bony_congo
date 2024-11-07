<?php

namespace App\Http\Controllers;


use App\Models\Vol;
use App\Models\Ville;
use App\Models\Escale;
use App\Models\Trajet;
use App\Models\Compagnie;
use Illuminate\Http\Request;

class TrajetController extends Controller
{
    /**
     * Afficher la liste des trajets.
     */
    public function index()
    {
        $trajets = Trajet::with(['villeDepart', 'villeArrivee', 'compagnie', 'vol', 'escales.ville'])->get();
        return view('trajets.index', compact('trajets'));
    }

    /**
     * Afficher le formulaire de création d'un trajet.
     */
    public function create()
    {
        $villes = Ville::all();
        $compagnies = Compagnie::all();
        $vols = Vol::all(); // Optionnel si vols filtrés dynamiquement côté client

        return view('trajets.create', compact('villes', 'compagnies', 'vols'));
    }

    /**
     * Enregistrer un nouveau trajet.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ville_depart_id' => 'required|exists:villes,id',
            'ville_arrivee_id' => 'required|exists:villes,id|different:ville_depart_id',
            'compagnie_id' => 'required|exists:compagnies,id',
            'vol_id' => 'required|exists:vols,id',
            'duree' => 'nullable',
            'date_depart' => 'required|date',
            'escales' => 'nullable|array',
            'escales.*' => 'exists:villes,id',
        ]);

        $trajet = Trajet::create($request->only(['ville_depart_id', 'ville_arrivee_id', 'compagnie_id', 'vol_id', 'duree', 'date_depart']));

        if ($request->has('escales')) {
            foreach ($request->escales as $index => $villeId) {
                Escale::create([
                    'trajet_id' => $trajet->id,
                    'ville_id' => $villeId,
                    'ordre' => $index + 1,
                ]);
            }
        }

        return redirect()->route('trajets.index')->with('success', 'Trajet créé avec succès.');
    }

    /**
     * Afficher les détails d'un trajet.
     */
    public function show($id)
    {
        $trajet = Trajet::with(['villeDepart', 'villeArrivee', 'compagnie', 'vol', 'escales.ville'])->findOrFail($id);
        return view('trajets.show', compact('trajet'));
    }

    /**
     * Afficher le formulaire de modification d'un trajet.
     */
    public function edit(Trajet $trajet)
    {
        $villes = Ville::all();
        $compagnies = Compagnie::all();
        $vols = Vol::all();

        return view('trajets.edit', compact('trajet', 'villes', 'compagnies', 'vols'));
    }

    /**
     * Mettre à jour un trajet existant.
     */
    public function update(Request $request, Trajet $trajet)
    {
        $request->validate([
            'ville_depart_id' => 'required|exists:villes,id',
            'ville_arrivee_id' => 'required|exists:villes,id|different:ville_depart_id',
            'compagnie_id' => 'required|exists:compagnies,id',
            'vol_id' => 'required|exists:vols,id',
            'duree' => 'nullable',
            'date_depart' => 'required|date',
        ]);

        $trajet->update($request->only(['ville_depart_id', 'ville_arrivee_id', 'compagnie_id', 'vol_id', 'duree', 'date_depart']));

        return redirect()->route('trajets.index')->with('success', 'Trajet mis à jour avec succès.');
    }

    /**
     * Supprimer un trajet existant.
     */
    public function destroy(Trajet $trajet)
    {
        $trajet->delete();

        return redirect()->route('trajets.index')->with('success', 'Trajet supprimé avec succès.');
    }
}

