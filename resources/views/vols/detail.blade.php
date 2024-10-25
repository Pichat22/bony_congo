@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        detail N:{{$vol->id}}
    </div>
    <div class="card-body">
        <p>matricule:{{$vol->matricule}}</p>
        <p>nombre de place:{{$vol->nombre_de_place}}</p>
        <p>marque:{{$vol->marque}}</p>
        <p>date de creation:{{$vol->date_de_creation}}</p>
        <p>compagnie:{{$vol->compagnie->nom_compagnie}}</p>
        <p>date d'ajout:{{$vol->created_at}}</p>
        <p>date de modification:{{$vol->updated_at}}</p>

        

    </div>
</div>
<p>

</p>
@endsection