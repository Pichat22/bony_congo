@extends('layouts.app')

@section('content')
    <h1>Rechercher un hotel</h1>

    <form method="POST" action="{{ route('hotels.search') }}">
        @csrf


        <!-- Ville -->
        <div class="form-group mt-3">
            <label for="ville_depart_id">Ville</label>
            <select name="ville_depart_id" id="ville_depart_id" class="form-control" required>
                <option value="" disabled selected>Recherchez un hotel</option>
                @foreach($villes as $ville)
                    <option value="{{ $ville->id }}">{{ $ville->nom }} ({{ $ville->pays }})</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Rechercher</button>
    </form>
@endsection
