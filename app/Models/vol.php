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

    public function reservations(){
        return $this->hasmany(reservation::class);
    }
}
