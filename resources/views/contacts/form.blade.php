@extends('layouts.app')
@section('content')
<div class="container mt-5">
  <div class="card">
    <div class="card-header bg-warning">
    <h3 class="text-center text-white ">Contactez-nous</h3>
    </div>
    <div class="card-body">
  @if($errors->any())
      <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
      </div>
      @endif
      <form method="Post" action="/contact">
      @csrf
      <div class="row">
      <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Nom</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="nom" >
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Prenom</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="prenom" >
</div>
</div>
<div class="row">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Sujet</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="sujet" >
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" name="email" >
</div>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Message</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3"></textarea>
</div>
<div class="d-flex justify-content-end">
<button type="submit" class="btn btn-warning">Contacter</button>
</div>

      </form>
      </div>
      </div>
      </div>

@endsection