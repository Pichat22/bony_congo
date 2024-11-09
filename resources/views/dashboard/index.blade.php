@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Tableau de bord</h1>

        <div class="row d-flex align-items-stretch">
            <!-- Nombre total de compagnies -->
            <div class="col-md-4 d-flex">
                <div class="card mb-3 shadow-sm w-100">
                    <div class="card-header text-white bg-primary">
                        Nombre de Compagnies
                    </div>
                    <div class="card-body text-center">
                        <h3 class="card-title">{{ $nombreDeCompagnies }}</h3>
                    </div>
                </div>
            </div>

            <!-- Nombre de vols par compagnie -->
            <div class="col-md-4 d-flex">
                <div class="card mb-3 shadow-sm w-100">
                    <div class="card-header text-white bg-success">
                        Vols par Compagnie
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach($volsParCompagnie as $compagnie)
                                <li class="list-group-item">
                                    {{ $compagnie->nom_compagnie }} : <strong>{{ $compagnie->vols_count }}</strong> vols
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Nombre de trajets cette semaine -->
            <div class="col-md-4 d-flex">
                <div class="card mb-3 shadow-sm w-100">
                    <div class="card-header text-white bg-warning">
                        Trajets cette semaine
                    </div>
                    <div class="card-body text-center">
                        <h3 class="card-title">{{ $nombreDeTrajetsSemaine }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Graphiques -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header">Vols par Compagnie</div>
                    <div class="card-body">
                        <canvas id="volsChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header">Trajets cette semaine</div>
                    <div class="card-body">
                        <canvas id="trajetsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Graphique des vols par compagnie
        const volsChart = new Chart(document.getElementById('volsChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($volsParCompagnie->pluck('nom_compagnie')) !!},
                datasets: [{
                    label: 'Nombre de vols',
                    data: {!! json_encode($volsParCompagnie->pluck('vols_count')) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Graphique des trajets par jour
        const trajetsChart = new Chart(document.getElementById('trajetsChart'), {
            type: 'line',
            data: {
                labels: {!! json_encode($joursSemaine) !!},
                datasets: [{
                    label: 'Trajets',
                    data: {!! json_encode($nombreTrajetsParJourComplet->values()) !!},
                    backgroundColor: 'rgba(255, 206, 86, 0.5)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    </script>
@endsection
