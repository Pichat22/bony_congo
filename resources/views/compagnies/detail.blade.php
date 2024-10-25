@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        detail N:{{$compagnie->id}}
    </div>
    <div class="card-body">
        <p>nom de la compagnie:{{$compagnie->nom_compagnie}}</p>
        <p>date d'ajout:{{$reservation->created_at}}</p>
        <p>date de modification:{{$reservation->updated_at}}</p>

        

    </div>
</div>
<p>

</p>
@endsection