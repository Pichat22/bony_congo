<?php

namespace App\Models;

use App\Models\Trajet;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class reservation extends Model
{
    protected $fillable = [
        'user_id',
        'trajet_id',
        'nombre_de_place',
        'date',
        'statut',
        'classe',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trajet()
    {
        return $this->belongsTo(Trajet::class);
    }

}
