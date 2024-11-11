@extends('layouts.app')

@section('content')
    <h1>Rechercher un hôtel</h1>

    <form method="GET" action="{{ route('hotels.search') }}">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <!-- Ville -->
                <div class="form-group">
                    <label for="ville_id">Ville</label>
                    <select name="ville_id" id="ville_id" class="form-control" required>
                        <option value="" disabled selected>Choisissez une ville</option>
                        @foreach($villes as $ville)
                            <option value="{{ $ville->id }}">{{ $ville->nom }} ({{ $ville->pays }})</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Hôtel -->
                <div class="form-group mt-3">
                    <label for="hotel_id">Hôtel</label>
                    <select name="hotel_id" id="hotel_id" class="form-control" required>
                        <option value="" disabled selected>Choisissez un hôtel</option>
                        <!-- Les options seront chargées dynamiquement -->
                    </select>
                </div>
            </div>
        </div>

        <!-- Bouton de soumission -->
        <button type="submit" class="btn btn-primary mt-3">Rechercher</button>
    </form>

    <a href="{{ route('hotels.index') }}" class="btn btn-secondary mt-3">Retour à la liste des hôtels</a>

    <script>
        document.getElementById('ville_id').addEventListener('change', function() {
            let villeId = this.value;
            let hotelSelect = document.getElementById('hotel_id');

            hotelSelect.innerHTML = '';
            hotelSelect.disabled = true;

            fetch(`/villes/${villeId}/hotels`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erreur lors de la récupération des hôtels.');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.length === 0) {
                        let option = document.createElement('option');
                        option.value = '';
                        option.textContent = 'Aucun hôtel disponible pour cette ville';
                        hotelSelect.appendChild(option);
                    } else {
                        data.forEach(hotel => {
                            let option = document.createElement('option');
                            option.value = hotel.id;
                            option.textContent = `${hotel.nom} (${hotel.etoil} étoiles, ${hotel.prix}€)`;
                            hotelSelect.appendChild(option);
                        });
                    }
                    hotelSelect.disabled = false;
                })
                .catch(error => {
                    console.error(error);
                    let option = document.createElement('option');
                    option.value = '';
                    option.textContent = 'Erreur lors du chargement des hôtels';
                    hotelSelect.appendChild(option);
                    hotelSelect.disabled = false;
                });
        });
    </script>
@endsection
