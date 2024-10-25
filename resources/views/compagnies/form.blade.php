@extends('layouts.app')
@section('content')
<div class="contener">
<h1>Ajouter une compagnie</h1>
</div>
@if($errors->any())
      <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
      </div>
      @endif
<form method='Post' action="{{route('compagnie.store')}}">
@csrf
<div class="mb-3">
  
    <label for="exampleInputPassword1" class="form-label">Nom_compagnie</label>
    <input type="text" class="form-control" id="exampleInputPassword1"name="nom_compagnie">
  </div>
  <button type="submit" class="btn btn-warning">Ajouter</button>
</form>
</div>
@endsection