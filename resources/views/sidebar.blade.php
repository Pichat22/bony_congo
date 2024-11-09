<div class="d-flex flex-column bg-warning   flex-shrink-0 p-3 opacity-75 " style="width:250px; height:100vh; margin-left: -13px;  ">

    <a href="" class="d-flex align-items-center mb-3 mb-md-0 link-dark text-decoration-none">
        <span class="fs-4 text-center">Menu</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li><a href="{{ route('tableudebord')}}"class="nav-link link-dark" style="color:black; font-size:1.3rem;">
            <i class="bi bi-speedometer2"></i>
            Dashboard</a></li>
        <li><a href="{{ route('trajets.index') }}"class="nav-link link-dark" style="color:black; font-size:1.3rem;">
        <i class="bi  bi-house"></i>
            Accueil </a></li>
        <li><a href="{{ route('trajets.index')}}"class="nav-link link-dark" style="color:black; font-size:1.3rem;">
        <i class="bi bi-gear"></i>
            Parametre</a></li>
        <li><a href=""class="nav-link link-dark" style="color:black; font-size:1.3rem;">
        <i class="bi bi-person"></i>
            Profil</a></li>
    </ul>
</div>