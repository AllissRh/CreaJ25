<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VCita;
use App\Models\Mascota;
use App\Models\User;


class VCitaController extends Controller
{
public function index($usuarioId)
{
    $usuario = User::with('mascotas.citas')->findOrFail($usuarioId);

    // Todas las citas planas también
    $todasCitas = $usuario->citas;

    return view('docCitaVer', compact('usuario', 'todasCitas'));
}


public function store(Request $request, $usuarioId)
{
    // Validación
    $validated = $request->validate([
        'fecha' => 'required|date',
        'hora' => 'required',
        'mascota_id' => 'required|integer',
        'motivo' => 'required|string',
        'estado' => 'required|string',
    ]);

    // Guardar la cita
    $cita = new VCita();
    $cita->usuario_id = $usuarioId;
    $cita->fecha = $validated['fecha'];
    $cita->hora = $validated['hora'];
    $cita->mascota_id = $validated['mascota_id'];
    $cita->motivo = $validated['motivo'];
    $cita->estado = $validated['estado'];
    $cita->save();
 
    //la vista de citas de ese usuario
    return redirect()->route('vcitas.porMascota', [
        'usuarioId' => $usuarioId,
        'mascotaId' => $validated['mascota_id']
    ])->with('success', 'Cita creada correctamente.');

}    



    public function create($mascotaId)
    {
        $usuario = auth()->user(); // o User::find($usuarioId) si viene por URL
        $mascota = Mascota::findOrFail($mascotaId); // Trae la mascota seleccionada
        $mascotas = Mascota::all(); // si quieres llenar el select

        

        return view('docCita', compact('usuario', 'mascota', 'mascotas'));
    }

    public function mascotaCitas(Request $request, $usuarioId, $mascotaId)
    {
        $usuario = User::findOrFail($usuarioId);
        $mascota = Mascota::findOrFail($mascotaId);

        $query = VCita::where('usuario_id', $usuarioId)
                    ->where('mascota_id', $mascotaId);

        // 🔹 Filtrar por estado si viene
        if ($request->estado) {
            $query->where('estado', $request->estado);
        }

        // 🔹 Filtrar por fecha si viene
        if ($request->fecha) {
            $query->where('fecha', $request->fecha);
        }

        $citas = $query->get();

        return view('docCitaPorMascota', compact('usuario', 'mascota', 'citas'));
    }



    public function todasCitas(Request $request, $usuarioId)
    {
        $query = VCita::with('mascota')
                    ->where('usuario_id', $usuarioId);

        if ($request->nombre) {
            $query->whereHas('mascota', function($q) use ($request) {
                $q->where('nombre', 'like', '%'.$request->nombre.'%');
            });
        }

        if ($request->estado) {
            $query->where('estado', $request->estado);
        }

        if ($request->fecha) {
            $query->where('fecha', $request->fecha);
        }

        // Mostrar primero las más recientes
        $todasCitas = $query->orderBy('fecha', 'desc')->orderBy('hora', 'desc')->get();

        $usuario = User::findOrFail($usuarioId);
        return view('docCitaVer', compact('usuario', 'todasCitas'));
    }


    public function destroy($id)
{
    $cita = VCita::findOrFail($id);
    $cita->delete();

    return redirect()->back()->with('success', 'Cita eliminada correctamente.');
}

public function updateEstado(Request $request, $id)
{
    $cita = VCita::findOrFail($id);
    $cita->estado = $request->estado;
    $cita->save();

    return redirect()->back()->with('success', 'Estado de la cita actualizado.');
}

public function mostrarVista($usuarioId)
{
    $usuario = User::findOrFail($usuarioId);
    return view('docVista', compact('usuario'));
}
public function show($id)
{
    $cita = VCita::findOrFail($id);
    return view('vcitas.show', compact('cita'));
}

public function docCitaVer($usuarioId)
{
    // Trae al usuario con sus mascotas y citas
    $usuario = User::with('mascotas.citas')->findOrFail($usuarioId);

    // También podrías traer las citas planas
    $todasCitas = VCita::where('usuario_id', $usuarioId)->get();

    return view('docCitaVer', compact('usuario', 'todasCitas'));
    
}

//-------------------Acción de editar de cita por cada mascota---------------------
public function edit($id)
{
    $cita = VCita::findOrFail($id);
    $mascotas = Mascota::all(); // Para llenar el select de mascotas si lo deseas
    return view('vcitas.edit', compact('cita', 'mascotas'));
}
public function update(Request $request, $id)
{
    $cita = VCita::findOrFail($id);

    $request->validate([
        'fecha' => 'required|date',
        'hora' => 'required',
        'motivo' => 'required|string',
        'estado' => 'required|in:pendiente,confirmada,cancelada',
    ]);

    $cita->fecha = $request->fecha;
    $cita->hora = $request->hora;
    $cita->motivo = $request->motivo;
    $cita->estado = $request->estado;

    $cita->save();

    // Redirige a la página de citas de la mascota
    return redirect()->route('vcitas.porMascota', [
        'usuarioId' => $cita->usuario_id,
        'mascotaId' => $cita->mascota_id
    ])->with('success', 'Cita actualizada correctamente.');
}



}
