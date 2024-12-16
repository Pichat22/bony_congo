@extends('layouts.app')

@section('content')
<div class="container py-4" style="background-color: #f8f9fa;">
    <div class="card mt-3 shadow-lg p-3 mb-5 rounded flex-grow-1" style="background-color: #ffffff;">
        <div class="row g-0">
            <div class="card-header bg-warning">
                
                <div class="scrolling-title-wrapper">
                    <h1 class="text-center text-white scrolling-title">Détails du trajet</h1>
                </div>
            </div>
            <div class="card-body">
                <ul>
                    <li><strong>Ville de départ :</strong> {{ $trajet->villeDepart->nom }}</li>
                    <li><strong>Ville d'arrivée :</strong> {{ $trajet->villeArrivee->nom }}</li>
                    <li><strong>Date de départ :</strong> {{ $trajet->date_depart->format('d/m/Y') }}</li>
                    <li><strong>Durée estimée :</strong> {{ $trajet->duree ?? 'N/A' }}</li>
                    <li><strong class="text-primary">Escales :</strong>
                        @if($trajet->escales->isEmpty())
                            <p>Aucune escale pour ce trajet.</p>
                        @else
                            <ul>
                                @foreach($trajet->escales as $escale)
                                    <li class="text-primary">{{ $escale->ville->nom }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                </ul>
                <!-- <a href="{{ route('trajets.index') }}" class="btn btn-secondary">Retour à la liste</a>  -->
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .scrolling-title-wrapper {
        overflow: hidden;
        position: relative;
        height: 50px;
    }

    .scrolling-title {
        position: absolute;
        white-space: nowrap;
        animation: scroll-left 10s linear infinite;
    }

    @keyframes scroll-left {
        from {
            transform: translateX(100%);
        }
        to {
            transform: translateX(-100%);
        }
    }
</style>