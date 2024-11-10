@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        detail N:{{$hotel->id}}
    </div>
    <div class="card-body">
        <p>nom:{{$hotel->nom}}</p>
        <p>adresse:{{$hotel->adresse}}</p>
        <p>nom:{{$hotel->etoil}}</p>
        <p>nom:{{$hotel->prix}}</p>
        

        

    </div>
</div>
<p>

</p>
@endsection