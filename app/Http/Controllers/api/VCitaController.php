<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VCita;
use Illuminate\Support\Facades\Auth;

class VCitaController extends Controller
{
    // nueva cita
    public function store(Request $request)
{
    $request->validate([
        'usuario_id' => 'required|integer', 
        'mascota_id' => 'required|integer',
        'fecha' => 'required|date',
        'hora' => 'required|string',
        'motivo' => 'required|string|max:255',
    ]);

    $usuario_id = $request->usuario_id;

    $cita = VCita::create([
        'usuario_id' => $usuario_id,      
        'mascota_id' => $request->mascota_id,
        'fecha' => $request->fecha,
        'hora' => $request->hora,
        'motivo' => $request->motivo,
        'estado' => 'pendiente',           
    ]);

    return response()->json([
        'message' => 'Cita creada con éxito',
        'cita' => $cita
    ], 201);
}



public function index(Request $request){
    $mascota_id = $request->mascota_id; 

    if (!$mascota_id) {
        return response()->json([
            'message' => 'Se requiere el ID de la mascota'
        ], 400);
    }

    $citas = VCita::with(['mascota', 'usuario'])
        ->where('mascota_id', $mascota_id)
        ->get();

    return response()->json($citas);
}




    // q el doc cambie estado
    public function updateEstado(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|in:pendiente,confirmado,cancelado'
        ]);

        $cita = VCita::findOrFail($id);
        $cita->estado = $request->estado;
        $cita->save();

        return response()->json([
            'message' => 'Estado actualizado',
            'cita' => $cita
        ]);
    }
}
