@extends('layouts.app')

@section('content')
    <h1>Vols disponibles</h1>

    @if($trajets->isEmpty())
        <p>Aucun vol trouvé pour les critères sélectionnés.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Ville de départ</th>
                    <th>Ville d'arrivée</th>
                    <th>Compagnie</th>
                    <th>Vol</th>
                    <th>Date de départ</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trajets as $trajet)
                    <tr>
                        <td>{{ $trajet->villeDepart->nom }}</td>
                        <td>{{ $trajet->villeArrivee->nom }}</td>
                        <td>{{ $trajet->compagnie->nom_compagnie }}</td>
                        <td>{{ $trajet->vol->matricule }}</td>
                        <td>{{ $trajet->date_depart }}</td>
                        <td>
                            <form method="POST" action="{{ route('reservations.store') }}">
                                @csrf
                                <input type="hidden" name="trajet_id" value="{{ $trajet->id }}">
                                <input type="number" name="nombre_de_place" min="1" class="form-control mb-2" placeholder="Nombre de places" required>
                                <button type="submit" class="btn btn-success">Réserver</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
