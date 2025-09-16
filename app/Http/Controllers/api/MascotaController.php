<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mascota;
use Illuminate\Support\Facades\DB;

class MascotaController extends Controller
{
    // Listar todas las mascotas de un usuario
    public function index($userId)
    {
        $mascotas = Mascota::where('user_id', $userId)->get();
        return response()->json($mascotas, 200);
    }

    // Guardar nueva mascota
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'    => 'required|string|max:255',
            'apellido'  => 'required|string|max:255',
            'edad'      => 'required|integer',
            'especie'   => 'required|string|max:255',
            'raza'      => 'required|string|max:255',
            'sexo'      => 'required|string|max:255',
            'color'     => 'required|string|max:255',
            'peso'      => 'required|numeric',
            'alergias'  => 'nullable|string',
            'imagen'    => 'nullable|string', 
            'user_id'   => 'required|integer',
            'est_reproductivo' => 'nullable|string',
        ]);

        $mascota = Mascota::create([
        'nombre' => $data['nombre'],
        'apellido' => $data['apellido'],
        'edad' => $data['edad'],
        'especie' => $data['especie'],
        'raza' => $data['raza'],
        'sexo' => $data['sexo'],
        'color' => $data['color'],
        'peso' => $data['peso'],
        'alergias' => $data['alergias'] ?? '',
        'imagen' => $data['imagen'] ?? null,
        'user_id' => $data['user_id'],
        'est_reproductivo' => $data['est_reproductivo'] ?? '', 
    ]);
   
        return response()->json($mascota, 201);
    }

    // Mostrar detalle de una mascota
    public function show($id)
    {
        $mascota = Mascota::with('user')->findOrFail($id);

        return response()->json([
            'id' => $mascota->id,
            'nombre' => $mascota->nombre,
            'apellido' => $mascota->apellido,
            'edad' => $mascota->edad,
            'especie' => $mascota->especie,
            'raza' => $mascota->raza,
            'sexo' => $mascota->sexo,
            'color' => $mascota->color,
            'peso' => $mascota->peso,
            'alergias' => $mascota->alergias,
            'est_reproductivo' => $mascota->est_reproductivo,
            'nombreTitular' => $mascota->user->name,
            'dui' => $mascota->user->dui,
            'telefono' => $mascota->user->telefono,
            'direccion' => $mascota->user->direccion,
        ]);
    }

    // Actualizar mascota
    public function update(Request $request, $id)
    {
        $mascota = Mascota::findOrFail($id);
        $mascota->update($request->all());
        return response()->json($mascota, 200);
    }

    // Obtener cartilla (vacunas y desparasitaciones)
    public function cartilla($id)
    {
        $mascota = Mascota::with(['vacunaciones', 'desparasitaciones'])->findOrFail($id);

        return response()->json([
            'mascota' => $mascota,
            'vacunas' => $mascota->vacunaciones->sortByDesc('fecha_dosis')->values(),
            'desparasitaciones' => $mascota->desparasitaciones->sortByDesc('fecha_dosis')->values(),
        ]);
    }
}

