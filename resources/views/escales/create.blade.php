@extends('layouts.app')

@section('content')
    <h1>Ajouter une escale pour le trajet : {{ $trajet->villeDepart->nom }} → {{ $trajet->villeArrivee->nom }}</h1>

    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Ajouter une scale
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter une scale</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

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

        <div>
        <a href="{{ route('trajets.index', $trajet->id) }}" class="btn btn-secondary mt-3">Retour au trajet</a>

        <button type="submit" class="btn btn-warning mt-3">Ajouter l'escale</button>
   
    </div>
    </form>
    </div>
    </div>
    </div>
@endsection