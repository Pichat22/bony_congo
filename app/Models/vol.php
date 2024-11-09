<?php

namespace App\Models;

use App\Models\compagnie;
use App\Models\reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class vol extends Model
{
    use HasFactory;
    public function compagnie(){
        return $this->belongsTo(compagnie::class);
    }

   
  

    public function reservations()
    {
        return $this->hasManyThrough(Reservation::class, Trajet::class, 'vol_id', 'trajet_id');
    }

    public function placesDisponibles()
    {
        $placesRéservées = $this->reservations()->sum('nombre_de_place');
        return $this->nombre_de_place - $placesRéservées;
    }
}
