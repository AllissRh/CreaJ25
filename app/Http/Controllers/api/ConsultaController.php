<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consulta;

class ConsultaController extends Controller
{
    // Listar controles de una mascota
    public function index($mascotaId)
    {
        $consultas = Consulta::where('id_mascota', $mascotaId)
            ->orderBy('fecha', 'desc')
            ->get();

        return response()->json($consultas);
    }

    // Crear un nuevo control clínico
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_mascota'          => 'required|exists:mascotas,id',
            'id_doctor'           => 'nullable|integer',
            'fecha'               => 'required|date',
            'motivo'              => 'nullable|string',
            'anamnesico'          => 'nullable|string',
            'estado_reproductivo' => 'nullable|string',
            'alimentacion'        => 'nullable|string',
            'diagnostico'         => 'nullable|string',
        ]);

        $consulta = Consulta::create($validated);

        return response()->json([
            'message' => 'Control clínico registrado',
            'data' => $consulta
        ], 201);
    }
}
