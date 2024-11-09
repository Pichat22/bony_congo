<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compagnie;
use App\Models\Trajet;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function index()
    {
        $nombreDeCompagnies = Compagnie::count();

        $volsParCompagnie = Compagnie::withCount('vols')->get();

        $nombreDeTrajetsSemaine = Trajet::whereBetween('date_depart', [now()->startOfWeek(), now()->endOfWeek()])->count();

        $joursSemaine = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
        
        $nombreTrajetsParJour = Trajet::selectRaw('DAYNAME(date_depart) as jour, COUNT(*) as total')
            ->whereBetween('date_depart', [now()->startOfWeek(), now()->endOfWeek()])
            ->groupBy('jour')
            ->pluck('total', 'jour')
            ->toArray();

       
        $nombreTrajetsParJourComplet = collect($joursSemaine)->mapWithKeys(function ($jour) use ($nombreTrajetsParJour) {
            return [$jour => $nombreTrajetsParJour[$jour] ?? 0];
        });
        return view('dashboard.index', compact(
            'nombreDeCompagnies',
            'volsParCompagnie',
            'nombreDeTrajetsSemaine',
            'joursSemaine',
            'nombreTrajetsParJourComplet'
        ));
    }
    
}
