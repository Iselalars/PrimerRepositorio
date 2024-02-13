<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    public function nivel(){
        return $this->belongsTo(Nivel::class, 'nivel_id', 'id');
    }
}
