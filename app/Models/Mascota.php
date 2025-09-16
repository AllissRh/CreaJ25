<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    protected $table = 'mascotas'; 

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
        'est_reproductivo',
    ];

    // Relación con usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vacunaciones()
    {
        return $this->hasMany(Vacunacion::class, 'id_mascota_3'); 
    }

    public function desparasitaciones()
    {
        return $this->hasMany(Desparasitacion::class, 'mascota_id'); 
    }


}
