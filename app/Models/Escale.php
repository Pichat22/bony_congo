<?php

namespace App\Models;

use App\Models\Ville;
use App\Models\Trajet;
use Illuminate\Database\Eloquent\Model;

class Escale extends Model
{
    protected $fillable = ['trajet_id', 'ville_id', 'ordre'];

    // Relation avec le trajet
    public function trajet()
    {
        return $this->belongsTo(Trajet::class);
    }

    // Relation avec la ville
    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }
}
