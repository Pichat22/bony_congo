@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-4">
      
      @if($errors->any())
      <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
      </div>
      @endif
      
    <form method='Post' action="{{route('vol.store')}}">
    @csrf
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Campagnie</label>
    <select class="form-select" aria-label="Default select example"name="compagnie_id">
  <option selected>Choisir une campagnie</option>
  @foreach($compagnies as $compagnie)
  <option value="{{$compagnie->id}}">{{$compagnie->nom_compagnie}}</option>
  @endforeach
</select>
</div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nombre de place</label>
    <input type="number" class="form-control" id="exampleInputPassword1"name="nombre_de_place">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Matricule</label>
    <input type="text" class="form-control" id="exampleInputPassword1"name="matricule">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Marque</label>
    <input type="text" class="form-control" id="exampleInputPassword1"name="marque">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Date de création</label>
    <input type="date" class="form-control" id="exampleInputPassword1"name="date_de_creation">
  </div>
  <button type="submit" class="btn btn-warning">Ajouter</button>
</form>
    </div>
    <div class="col-8">
        <img src="{{asset('image/vol.png')}}"  alt="" srcset="">
    </div>
</div>
@endsection