<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VCita extends Model
{
    use HasFactory;

    protected $table = 'v_citas';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'usuario_id',
        'mascota_id',
        'fecha',
        'hora',
        'motivo',
        'estado',
    ];


    // Si quieres usar la relación con User

    public function mascota()
{
    return $this->belongsTo(Mascota::class, 'mascota_id');
}


    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }


}
