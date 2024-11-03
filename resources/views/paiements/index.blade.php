@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Liste des paiements</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Reservation</th>
                <th>Montant</th>
                <th>Date de Paiement</th>
                <th>Moyen de Paiement</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paiements as $paiement)
                <tr>
                    <td>{{ $paiement->reservation->id }}</td>
                    <td>{{ $paiement->montant }}</td>
                    <td>{{ $paiement->date_paiement }}</td>
                    <td>{{ $paiement->moyen_paiement }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
