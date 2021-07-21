<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    public function episodios()
    {
        return $this->hasMany(Episodios::class);
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
}
