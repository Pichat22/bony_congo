@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-warning text-white">
            <h3>Détail Vol N° {{$vol->id}}</h3>
        </div>
        <div class="card-body">
            <p><strong>Matricule :</strong> {{$vol->matricule}}</p>
            <p><strong>Nombre de places :</strong> {{$vol->nombre_de_place}}</p>
            <p><strong>Marque :</strong> {{$vol->marque}}</p>
            <p><strong>Date de création :</strong> {{$vol->date_de_creation}}</p>
            <p><strong>Compagnie :</strong> {{$vol->compagnie->nom_compagnie}}</p>
            <p><strong>Date d'ajout :</strong> {{$vol->created_at}}</p>
            <p><strong>Date de modification :</strong> {{$vol->updated_at}}</p>
        </div>
    </div>
</div>
@endsection
