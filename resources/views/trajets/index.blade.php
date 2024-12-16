@extends('layouts.app')

@section('content')
    <!-- <h1>Liste des trajets</h1> -->

    <a href="{{ route('trajets.create') }}" class="btn btn-warning mb-3">Créer un nouveau trajet</a>

    @if($trajets->isEmpty())
        <p>Aucun trajet trouvé.</p>
    @else
        
     <div class="card mt-3 hadow-lg p-3 mb-5 rounded" style="margin-left:-8%;">
     <div class="card-header bg-warning">
          <h2 class="text-center text-white">Liste des trajets</h2>
     </div>
     <div class="card-body">
     <table class="table">
     <thead>
             <tr>
               <th>Ville de départ</th>
                <th>Ville d'arrivée</th>
                <th>Date de départ</th>
                <th>Durée estimée</th>
                 <th>Actions</th>
             </tr>
     </thead>
     <tbody>
 @foreach($trajets as $trajet)
             <tr>
                 <td>{{ $trajet->villeDepart->nom }}</td>
                 <td>{{ $trajet->villeArrivee->nom }}</td>
                 <td>{{ $trajet->date_depart->format('d/m/Y') }}</td>
                 <td>{{ $trajet->duree ?? 'N/A' }}</td>
                 <td class="d-flex">
                     <!-- Bouton Détails -->
     <a href="{{ route('trajets.show', $trajet->id) }}" class="btn btn-success m-1">
     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
     <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
     <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
     </svg></a>
                                    
                   <!-- Bouton Ajouter Escale -->
    <a href="{{ route('escales.create', $trajet->id) }}" class="btn btn-primary m-1">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
    </svg></a> 

                     <!-- Bouton Supprimer -->
    <form action="{{ route('trajets.destroy', $trajet->id) }}" method="POST" class="d-inline">
 @csrf
 @method('DELETE')
     <button type="submit" class="btn btn-danger m-1">
     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
     <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
     </svg>
     </button>
     </form>
         </td>
        </tr>
 @endforeach
     </tbody>
    </table>
     </div>
     </div>
    @endif
@endsection
