<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'edad',
        'especie',
        'raza',
        'sexo',
        'color',
        'peso',
        'alergias',
        'imagen',
        'user_id',
    ];

    // Relación: una mascota pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
