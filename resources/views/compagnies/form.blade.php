@extends('layouts.app')
@section('content')
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Ajouter compagnie
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter une compagnie</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      @if($errors->any())
      <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
      </div>
      @endif
<form method='Post' action="{{route('compagnies.store')}}">
@csrf
<div class="mb-3">

    <label for="exampleInputPassword1" class="form-label">Nom_compagnie</label>
    <input type="text" class="form-control" id="exampleInputPassword1"name="nom_compagnie">
  </div>
  <button type="submit" class="btn btn-warning">Ajouter</button>
</form>
</div>
    </div>
  </div>
</div>
@endsection