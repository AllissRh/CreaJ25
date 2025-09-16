<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
    'id_mascota',
    'id_doctor',
    'fecha',
    'motivo',
    'anamnesico',
    'estado_reproductivo',
    'alimentacion',
    'diagnostico',
];
    
    public function doctor()
    {
        return $this->belongsTo(User::class, 'id_doctor'); // si usas la tabla users
    }

    
    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'id_mascota');
    }
}

