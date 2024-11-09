@extends('layouts.app')

@section('content')
    <h1>Détails du trajet</h1>

    <ul>
        <li><strong>Ville de départ :</strong> {{ $trajet->villeDepart->nom }}</li>
        <li><strong>Ville d'arrivée :</strong> {{ $trajet->villeArrivee->nom }}</li>
        <li><strong>Date de départ :</strong> {{ $trajet->date_depart->format('d/m/Y') }}</li>
        <li><strong>Durée estimée :</strong> {{ $trajet->duree ?? 'N/A' }}</li>
        <li><strong>Escales :</strong>
            @if($trajet->escales->isEmpty())
                <p>Aucune escale pour ce trajet.</p>
            @else
                <ul>
                    @foreach($trajet->escales as $escale)
                        <li>{{ $escale->ville->nom }} </li>
                    @endforeach
                </ul>
            @endif
        </li>
    </ul>

    <a href="{{ route('trajets.index') }}" class="btn btn-secondary">Retour à la liste</a>
@endsection
