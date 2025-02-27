<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;
    
    use HasFactory;
    
    protected $fillable = ['nom', 'adresse', 'etoil', 'prix', 'ville_id'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }
}
