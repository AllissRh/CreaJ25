<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Mascota;

class RecetaController extends Controller
{
    //

    public function guardar(Request $request)
    {
        // Validar entrada mínima
        $request->validate([
            'paciente_id' => 'required|integer',
            'fecha' => 'required|string',
            'cantidad' => 'required|array',
            'producto' => 'required|array',
            'dosis' => 'required|array',
            'cuidados' => 'nullable|array',
        ]);

        try {
            // Convertir fecha de dd/mm/yyyy → yyyy-mm-dd
            $fecha = Carbon::createFromFormat('d/m/Y', $request->input('fecha'))->format('Y-m-d');

            $id_mascota = $request->input('paciente_id');
            $cantidades = $request->input('cantidad');
            $productos = $request->input('producto');
            $dosis = $request->input('dosis');
            $cuidados = $request->input('cuidados') ?? [];

            // guardar cada medicamento como una receta
            foreach ($productos as $i => $producto) {
                DB::table('recetas')->insert([
                    'id_mascota3' => $id_mascota,
                    'Cantidad' => $cantidades[$i],
                    'nom_producto' => $producto,
                    'Dosis' => $dosis[$i],
                    'Cuidados' => implode('; ', $cuidados),
                    'Fecha' => $fecha,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return back()->with('success', 'Receta guardada correctamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al guardar receta: ' . $e->getMessage());
        }
        
    }
    public function docReceta($id)
    {
        $mascota = \App\Models\Mascota::find($id); // obtener la mascota por su id

        if (!$mascota) {
            return redirect()->back()->with('error', 'Mascota no encontrada');
        }

        return view('docReceta', compact('mascota'));
    }


   public function verRecetaIndividual($id)
    {
        $recetas = DB::table('recetas')
                    ->where('id_mascota3', $id)
                    ->get();

        $mascota = Mascota::find($id); // para mostrar el nombre

        return view('docRecetaVer', compact('recetas', 'mascota'));
    }


}
