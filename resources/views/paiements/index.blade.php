@extends('layouts.app')
@section('content')
<div class="container">
<div class="card mt-3 hadow-lg p-3 mb-5 rounded" style="margin-left:-8%;">
<div class="card-header bg-warning">
    <h1 class="text-center text-white">Liste des paiements</h1>
    </div>
    <div class="card-body">
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
    </div>
</div>
@endsection
