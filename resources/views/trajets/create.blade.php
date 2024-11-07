@extends('layouts.app')

@section('content')
    <h1>Créer un nouveau trajet</h1>

    <form method="POST" action="{{ route('trajets.store') }}">
        @csrf

        <!-- Ville de départ -->
        <div class="form-group">
            <label for="ville_depart_id">Ville de départ</label>
            <select name="ville_depart_id" id="ville_depart_id" class="form-control" required>
                <option value="" disabled selected>Choisissez une ville</option>
                @foreach($villes as $ville)
                    <option value="{{ $ville->id }}">{{ $ville->nom }} ({{ $ville->pays }})</option>
                @endforeach
            </select>
        </div>

        <!-- Ville d'arrivée -->
        <div class="form-group mt-3">
            <label for="ville_arrivee_id">Ville d'arrivée</label>
            <select name="ville_arrivee_id" id="ville_arrivee_id" class="form-control" required>
                <option value="" disabled selected>Choisissez une ville</option>
                @foreach($villes as $ville)
                    <option value="{{ $ville->id }}">{{ $ville->nom }} ({{ $ville->pays }})</option>
                @endforeach
            </select>
        </div>

        <!-- Compagnie -->
        <div class="form-group mt-3">
            <label for="compagnie_id">Compagnie</label>
            <select name="compagnie_id" id="compagnie_id" class="form-control" required>
                <option value="" disabled selected>Choisissez une compagnie</option>
                @foreach($compagnies as $compagnie)
                    <option value="{{ $compagnie->id }}">{{ $compagnie->nom_compagnie }}</option>
                @endforeach
            </select>
        </div>

        <!-- Vol -->
        <div class="form-group mt-3">
            <label for="vol_id">Vol</label>
            <select name="vol_id" id="vol_id" class="form-control" required>
                <option value="" disabled selected>Choisissez un vol</option>
                <!-- Les options seront filtrées dynamiquement via JavaScript -->
            </select>
        </div>

        <!-- Durée estimée -->
        <div class="form-group mt-3">
            <label for="duree">Durée estimée</label>
            <input type="time" name="duree" id="duree" class="form-control">
        </div>

        <!-- Date de départ -->
        <div class="form-group mt-3">
            <label for="date_depart">Date de départ</label>
            <input type="date" name="date_depart" id="date_depart" class="form-control" required>
        </div>

        <!-- Escales -->
        {{-- <div class="form-group mt-3">
            <label for="escales">Escales (optionnel)</label>
            <select name="escales[]" id="escales" class="form-control" multiple>
                @foreach($villes as $ville)
                    <option value="{{ $ville->id }}">{{ $ville->nom }} ({{ $ville->pays }})</option>
                @endforeach
            </select>
            <small class="form-text text-muted">Vous pouvez sélectionner plusieurs escales.</small>
        </div> --}}
        
        <!-- Bouton de soumission -->
        <button type="submit" class="btn btn-primary mt-3">Créer le trajet</button>
    </form>

    <a href="{{ route('trajets.index') }}" class="btn btn-secondary mt-3">Retour à la liste des trajets</a>
    <script>
        document.getElementById('compagnie_id').addEventListener('change', function() {
     let compagnieId = this.value; // ID de la compagnie sélectionnée
     let volSelect = document.getElementById('vol_id');
 
     volSelect.innerHTML = ''; // Réinitialiser la liste des vols
     volSelect.disabled = true; // Désactiver la sélection des vols pendant le chargement
 
     fetch(`/compagnies/${compagnieId}/vols`) // URL de la route définie dans web.php
         .then(response => {
             if (!response.ok) {
                 throw new Error('Erreur lors de la récupération des vols.');
             }
             return response.json();
         })
         .then(data => {
             if (data.length === 0) {
                 let option = document.createElement('option');
                 option.value = '';
                 option.textContent = 'Aucun vol disponible pour cette compagnie';
                 volSelect.appendChild(option);
             } else {
                 data.forEach(vol => {
                     let option = document.createElement('option');
                     option.value = vol.id;
                     option.textContent = `${vol.matricule} (${vol.nombre_de_place} places)`;
                     volSelect.appendChild(option);
                 });
             }
             volSelect.disabled = false; // Réactiver la sélection
         })
         .catch(error => {
             console.error(error);
             let option = document.createElement('option');
             option.value = '';
             option.textContent = 'Erreur lors du chargement des vols';
             volSelect.appendChild(option);
             volSelect.disabled = false; // Réactiver même en cas d'erreur
         });
 });
 
     </script>
@endsection


    

