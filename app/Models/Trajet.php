<?php

namespace App\Models;

use App\Models\Ville;
use App\Models\Escale;
use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    protected $fillable = ['ville_depart_id', 'ville_arrivee_id', 'duree', 'date_depart',
        'compagnie_id', 'vol_id'];
    protected $casts = [
        'date_depart' => 'date', // Caster en date
    ];
    public function villeDepart()
    {
        return $this->belongsTo(Ville::class, 'ville_depart_id');
    }

    public function villeArrivee()
    {
        return $this->belongsTo(Ville::class, 'ville_arrivee_id');
    }

    public function compagnie()
    {
        return $this->belongsTo(Compagnie::class, 'compagnie_id'); // Relation manquante
    }

    public function vol()
    {
        return $this->belongsTo(Vol::class, 'vol_id');
    }

    public function escales()
    {
        return $this->hasMany(Escale::class);
    }
}
