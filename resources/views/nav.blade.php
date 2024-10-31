<nav class="navbar navbar-expand-lg bg-black opacity-75">
  <div class="container-fluid">
    <img src="{{asset('image/logo-removebg-preview.png')}}" width="90" alt="" srcset="">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item mr-3">
          <a class="nav-link active text-warning" aria-current="page" href="{{route('vols.index')}}">Accueil</a>
        </li>
        <li class="nav-item mr-3">
          <a class="nav-link active text-warning" href="{{route('vols.create')}}">Vol</a>
        </li>
        <li class="nav-item dropdown mr-3">
          <a class="nav-link active text-warning " href="{{route('reservations.index')}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Reservation
          </a>
        </li>
        <li class="nav-item mr-3">
          <a class="nav-link active text-warning " aria-disabled="true">Contactez-nous</a>
        </li>
      </ul>
      
      <form action="{{ route('logout') }}" class="btn btn-warning" method="Post">
      @csrf
      <button>Deconnexion</button>
      </form>
                                    
    </div>
  </div>
</nav>