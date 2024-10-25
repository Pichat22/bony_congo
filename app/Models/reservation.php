<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class reservation extends Model
{
    use HasFactory;
    public function vol(){
        return $this->belongsTo(vol::class);
    }

}
