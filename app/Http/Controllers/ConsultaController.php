<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Mascota;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
 
    public function index(Request $request)
{
    $query = Consulta::with('mascota');

    // Filtro por nombre de la mascota
    if ($request->filled('nombre')) {
        $query->whereHas('mascota', function ($q) use ($request) {
            $q->where('nombre', 'like', '%' . $request->nombre . '%');
        });
    }

    // Filtro por fecha exacta
    if ($request->filled('fecha')) {
        $query->whereDate('fecha', $request->fecha);
    }

    $consultas = $query->latest()->get();

    return view('docControlMedicoVer', compact('consultas'));
}

    
    public function docControlMedicoPet($id_mascota)
    {
        $mascota = Mascota::findOrFail($id_mascota);

        // Ordenar consultas de la más reciente a la más antigua
        $consultas = Consulta::where('id_mascota', $id_mascota)
                    ->orderBy('id', 'desc')
                    ->get();


        return view('docControlMedicoPet', compact('mascota', 'consultas'));
    }



    public function create($id_mascota)
    {
        $mascota = Mascota::findOrFail($id_mascota); // Solo la mascota seleccionada
        return view('docControlMedico', compact('mascota'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'id_mascota' => 'required|exists:mascotas,id',
            'motivo' => 'required|string',
            'anamnesico' => 'nullable|string',
            'estado_reproductivo' => 'nullable|string',
            'alimentacion' => 'nullable|string',
            'diagnostico' => 'nullable|string',
        ]);

        // Verificar si ya existe la misma consulta hoy
        $existe = Consulta::where('id_mascota', $request->id_mascota)
                        ->whereDate('fecha', now()->toDateString())
                        ->where('motivo', $request->motivo)
                        ->first();

        if($existe) {
            return back()->with('error', 'Esta consulta ya fue registrada. Coloque nuevos datos');
        }

        // Guardar consulta con fecha actuall
        $data = $request->all();
        $data['fecha'] = now();
        $data['id_doctor'] = auth()->user()->id; // Usuario logueado
        Consulta::create($data);

        // REDIRECCIÓN CORRECTA CON EL ID DE LA MASCOTA
        return redirect()->route('consultas.docControlMedicoPet', ['id_mascota' => $request->id_mascota])
                        ->with('success', 'Consulta registrada correctamente');
    }



    //Para mostrar solo la consulta de la mascota 
        public function storeForMascota(Request $request, $id_mascota)
    {
        $request->validate([
            'motivo' => 'required|string',
            'anamnesico' => 'nullable|string',
            'estado_reproductivo' => 'nullable|string',
            'alimentacion' => 'nullable|string',
            'diagnostico' => 'nullable|string',
        ]);

        // Verificar si ya existe la misma consulta hoy
        $existe = Consulta::where('id_mascota', $id_mascota)
                        ->whereDate('fecha', now()->toDateString())
                        ->where('motivo', $request->motivo)
                        ->first();

        if ($existe) {
            return back()->with('error', 'Esta consulta ya fue registrada hoy. Coloque nuevos datos');
        }
        $data = $request->all();
        $data['fecha'] = now();
        $data['id_doctor'] = auth()->user()->id; // Usuario logueado
        Consulta::create($data);

        // Guardar consulta con fecha actual
        Consulta::create([
            'id_mascota' => $id_mascota,
            'id_doctor' => auth()->user()->id,
            'fecha' => now(),
            'motivo' => $request->motivo,
            'anamnesico' => $request->anamnesico,
            'estado_reproductivo' => $request->estado_reproductivo,
            'alimentacion' => $request->alimentacion,
            'diagnostico' => $request->diagnostico,
        ]);

     // REDIRECCIÓN CORRECTA CON PARAMETRO
        return redirect()->route('consultas.docControlMedicoPet', ['id_mascota' => $id_mascota])
                        ->with('success', 'Consulta registrada correctamente');
        }



}