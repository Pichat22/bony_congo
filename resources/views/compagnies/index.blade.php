@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Liste des Compagnies Aériennes</h1>
    <a href="{{ route('compagnies.create') }}" class="btn btn-primary mb-3">Ajouter une Compagnie</a>
    @if(session()->has('message'))
<div class="alert alert-success">
  {{session()->get('message')}}
</div>
@endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
    </tr>
  </thead>
  <tbody>
    @foreach($compagnies as $compagnie)
    <tr>
    <td>{{$compagnie->id}}</td>
      <td>{{$compagnie->nom_compagnie}}</td>
    </tr>
    @endforeach
   
  </tbody>
</table>
</div>
@endsection