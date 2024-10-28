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
    <form method="Post" action="{{route('reservation.store')}}">
    @csrf
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Vol</label>
    <select class="form-select" aria-label="Default select example"name="vol_id">
  <option selected>Choisir un vol</option>
  @foreach($vols as $vol)
  <option value="{{$vol->id}}">{{$vol->matricule}}</option>
  @endforeach
</select>
</div>
  <div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" class="form-control" id="compagnie" aria-describedby="emailHelp" name="date">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Statut</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="statut">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Classe</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="classe">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nombre de place</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="nombre_de_place">
  </div>
  <button type="submit" class="btn btn-warning">Ajouter</button>
</form>
    </div>
    <div class="col-8">
        <img src="{{asset('image/vol.png')}}"  alt="" srcset="">
    </div>
</div>
@endsection