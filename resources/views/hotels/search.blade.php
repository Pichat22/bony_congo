@extends('layouts.app')

@section('content')
    <h1>Rechercher et réserver un hôtel</h1>

    <form method="POST" action="{{ route('reservations.hotel.store') }}">
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
                    </select>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <!-- Date de réservation -->
                <div class="form-group">
                    <label for="date">Date de réservation</label>
                    <input type="date" name="date" id="date" class="form-control" required>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Nombre de places -->
                <div class="form-group">
                    <label for="nombre_de_place">Nombre de places</label>
                    <input type="number" name="nombre_de_place" id="nombre_de_place" class="form-control" required>
                </div>
            </div>
        </div>

        <!-- Nom du client -->
        <div class="form-group mt-3">
            <label for="nom_personne">Nom du client</label>
            <input type="text" name="nom_personne" id="nom_personne" class="form-control" required>
        </div>

        <!-- Prénom du client -->
        <div class="form-group mt-3">
            <label for="prenom_personne">Prénom du client</label>
            <input type="text" name="prenom_personne" id="prenom_personne" class="form-control" required>
        </div>

        <!-- Téléphone -->
        <div class="form-group mt-3">
            <label for="telephone_personne">Téléphone</label>
            <input type="text" name="telephone_personne" id="telephone_personne" class="form-control" required>
        </div>

        <!-- Numéro d'identité -->
        <div class="form-group mt-3">
            <label for="numero_identite_personne">Numéro d'identité</label>
            <input type="text" name="numero_identite_personne" id="numero_identite_personne" class="form-control" required>
        </div>

        <!-- Bouton de soumission -->
        <button type="submit" class="btn btn-primary mt-3">Réserver</button>
    </form>

    <script>
        document.getElementById('ville_id').addEventListener('change', function() {
            let villeId = this.value;
            let hotelSelect = document.getElementById('hotel_id');

            hotelSelect.innerHTML = '';
            hotelSelect.disabled = true;

            fetch(`/villes/${villeId}/hotels`)
                .then(response => response.json())
                .then(data => {
                    if (data.length === 0) {
                        let option = document.createElement('option');
                        option.value = '';
                        option.textContent = 'Aucun hôtel disponible';
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
                .catch(error => console.error('Erreur:', error));
        });
    </script>
@endsection
