@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        detail N:{{$reservation->id}}
    </div>
    <div class="card-body">
        <p>date:{{$reservation->date}}</p>
        <p>statut:{{$reservation->statut}}</p>
        <p>date de creation:{{$reservation->classe}}</p>
        <p>vol:{{$vol->vol->nom}}</p>
        <p>date d'ajout:{{$reservation->created_at}}</p>
        <p>date de modification:{{$reservation->updated_at}}</p>

        

    </div>
</div>
<p>

</p>
@endsection