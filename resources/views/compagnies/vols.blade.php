
@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Vols pour la Compagnie : {{ $compagnie->nom_compagnie }}</h1>

    @if($compagnie->vols->isEmpty())
        <p>Aucun vol trouvé pour cette compagnie.</p>
    @else

    <table class="table">
        <thead>
            <tr>
                <th>Matricule</th>
                <th>Nombre de place</th>
                <th>Marque</th>
                
            </tr>
        </thead>
        <tbody>
        @foreach($compagnie->vols as $vol)
            <td>{{$vol->matricule}}</td>
            <td>{{$vol->nombre_de_place}}</td>
            <td>{{$vol->marque}}</td>

         @endforeach
        </tbody>
        </table>
@endif
    
@endsection