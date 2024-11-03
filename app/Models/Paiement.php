<?php

namespace App\Models;

use App\Models\User;
use App\Models\reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paiement extends Model
{
    use HasFactory;
    public function reservation(){
        return $this->belongsTo(reservation::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
