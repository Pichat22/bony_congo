  @extends('layouts.app')
  @section('content')
<div class="card mt-3 hadow-lg p-3 mb-5 rounded" style="margin-left:-8%;">
  <div class="card-header bg-warning">
     <h1 class="text-center text-white">Liste des reservations</h1>
  </div>
  <div class="card-body">
      <a href="{{ route('reservations.create') }}" class="btn btn-warning text-light">Ajouter réservation</a>
      
      @if(session()->has('message'))
          <div class="alert alert-success">
              {{ session()->get('message') }}
          </div>
      @endif

      <table class="table">
          <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">Date</th>
                  <th scope="col">Statut</th>
                  <th scope="col">Classe</th>
                  <th scope="col">Matricule</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Action</th>
              </tr>
          </thead>
          <tbody>
              @foreach($reservations as $reservation)
                  <tr>
                      <th scope="row">{{ $reservation->id }}</th>
                      <td>{{ $reservation->date }}</td>
                      <td>{{ $reservation->statut }}</td>
                      <td>{{ $reservation->classe }}</td>
                      <td>{{ $reservation->trajet->vol->matricule ?? 'N/A' }}</td> {{-- Si vol est null --}}
                      <td>{{ $reservation->user->nom }}</td>
                      <td class="d-flex ">
          <a href="{{route('reservations.show',$reservation->id)}}" class="btn btn-success m-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
  </svg></a>
          <a href="{{route('reservations.edit',$reservation)}}" class="btn btn-warning m-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
  </svg></a>
  <form action="{{route('reservations.destroy',$reservation->id)}}" method="POST" onsubmit="return confirm('Etes-vous sur de vouloir suprrimer?')">
      @csrf
      @method('delete')
          <button type="submit" class="btn btn-danger m-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
          <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
  </svg></button>
  </form>

  <a href="{{ route('reservations.download', $reservation->id) }}" class="btn btn-info m-1">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708"/>
</svg>
</a>
        </td>


      </tr>
      @endforeach
    
    </tbody>
  </table>
  </div>
  </div>
  @endsection