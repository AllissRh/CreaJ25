<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desparasitacion extends Model
{
    protected $table = 'desparasitaciones';  

    protected $fillable = [
        'mascota_id',
        'fecha_dosis',
        'producto',
        'externo_interno',
        'proxima_dosis',
    ];

    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }
}
