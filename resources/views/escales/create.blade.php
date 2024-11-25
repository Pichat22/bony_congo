@extends('layouts.app')

@section('content')
    <h1>Ajouter une escale pour le trajet : {{ $trajet->villeDepart->nom }} → {{ $trajet->villeArrivee->nom }}</h1>

    <form method="POST" action="{{ route('escales.store', $trajet->id) }}">
        @csrf

        <div class="form-group">
            <label for="ville_id">Ville</label>
            <select name="ville_id" id="ville_id" class="form-control" required>
                @foreach($villes as $ville)
                    <option value="{{ $ville->id }}">{{ $ville->nom }} ({{ $ville->pays }})</option>
                @endforeach
            </select>
        </div>

        <!-- <div class="form-group mt-3">
            <label for="ordre">Ordre</label>
            <input type="number" name="ordre" id="ordre" class="form-control" placeholder="Ordre de l'escale">
        </div> -->

        <button type="submit" class="btn btn-warning mt-3">Ajouter l'escale</button>
    </form>

    <a href="{{ route('trajets.show', $trajet->id) }}" class="btn btn-secondary mt-3">Retour au trajet</a>
@endsection
