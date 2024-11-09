@extends('layouts.app')

@section('content')
    <h1>Liste des escales pour le trajet : {{ $trajet->villeDepart->nom }} → {{ $trajet->villeArrivee->nom }}</h1>

    <a href="{{ route('escales.create', $trajet->id) }}" class="btn btn-primary mb-3">Ajouter une escale</a>

    @if($escales->isEmpty())
        <p>Aucune escale trouvée.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <!-- <th>Ordre</th> -->
                    <th>Ville</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($escales as $escale)
                    <tr>
                        <!-- <td>{{ $escale->ordre }}</td> -->
                        <td>{{ $escale->ville->nom }}</td>
                        <td>
                            <a href="{{ route('escales.edit', [$trajet->id, $escale->id]) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('escales.destroy', [$trajet->id, $escale->id]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette escale ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('trajets.index') }}" class="btn btn-secondary mt-3">Retour aux trajets</a>
@endsection
