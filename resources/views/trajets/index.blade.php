@extends('layouts.app')

@section('content')
    <h1>Liste des trajets</h1>

    <a href="{{ route('trajets.create') }}" class="btn btn-primary mb-3">Créer un nouveau trajet</a>

    @if($trajets->isEmpty())
        <p>Aucun trajet trouvé.</p>
    @else
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
                        <td>
                            <a href="{{ route('trajets.show', $trajet->id) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('escales.create', $trajet->id) }}" class="btn btn-primary mt-3">Ajouter une escale</a>

                            <form action="{{ route('trajets.destroy', $trajet->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce trajet ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
