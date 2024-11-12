<?php

namespace App\Models;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ville extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'adresse', 'etoil', 'prix', 'ville_id'];
    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }

}
