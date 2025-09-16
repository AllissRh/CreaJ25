<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Vacunacion extends Model
{
    protected $table = 'vacunacion';
    protected $fillable = [
        'id_mascota_3',
        'fecha_dosis',
        'nom_vacuna',
        'proxima_dosis'
    ];
    protected $casts = [
        'proxima_dosis' => 'datetime',
    ];
     public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'id_mascota_3');
    }
}