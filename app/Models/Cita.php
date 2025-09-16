<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'mascota_id',
        'doctor_id',
        'fecha',
        'hora',
        'estado',
        'motivo',
        'comentario',
    ];

    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
