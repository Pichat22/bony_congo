<?php

namespace App\Models;

use App\Models\vol;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class compagnie extends Model
{
    use HasFactory;
    public function vols(){
        return $this->hasMany(vol::class);
    }
    public function trajets()
    {
        return $this->hasMany(Trajet::class); // Relation inverse
    }
}
