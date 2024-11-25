
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un Paiement</h1>
    <form action="{{ route('paiements.store') }}" method="POST">
        @csrf
        <!-- <div class="mb-3">
            <label for="user_id" class="form-label">Utilisateur</label>
            <select name="user_id" id="user_id" class="form-select">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->nom }}</option>
                @endforeach
            </select>
        </div> -->
        <div class="mb-3">
            <label for="reservation_id" class="form-label">Reservation</label>
            <select name="reservation_id" id="reservation_id" class="form-select">
                @foreach($reservations as $reservation)
                    <option value="{{ $reservation->id }}">{{ $reservation->date }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $reservation->classe }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="montant" class="form-label">Montant</label>
            <input type="number" name="montant" class="form-control" id="montant">
        </div>
        <div class="mb-3">
            <label for="moyen_paiement" class="form-label">Moyen de Paiement</label>
            <input type="text" name="moyen" class="form-control" id="moyen">
        </div>
        <button type="submit" class="btn btn-warning">Ajouter le Paiement</button>
    </form>
</div>
@endsection
