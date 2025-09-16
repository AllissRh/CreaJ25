<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mascota;
use Carbon\Carbon;

class RecetaController extends Controller
{
    public function ultimaReceta($id_mascota)
    {
        // buscamos la última fecha de receta registrada para esa mascota
        $ultimaFecha = DB::table('recetas')
                        ->where('id_mascota3', $id_mascota)
                        ->max('created_at');

        if (!$ultimaFecha) {
            return response()->json(null, 404);
        }

        // obtenemos todos los productos de esa última receta
        $productos = DB::table('recetas')
                    ->where('id_mascota3', $id_mascota)
                    ->where('created_at', $ultimaFecha)
                    ->get();

        $mascota = Mascota::find($id_mascota);

        return response()->json([
            'id_mascota' => $id_mascota,
            'nombre_mascota' => $mascota ? $mascota->nombre : 'N/A',
            'fecha' => $productos->first()->Fecha,
            'cuidados' => $productos->first()->Cuidados,
            'productos' => $productos->map(function ($p) {
                return [
                    'nom_producto' => $p->nom_producto,
                    'cantidad' => $p->Cantidad,
                    'dosis' => $p->Dosis,
                ];
            })->values(), 
            ]);

    }
    public function historialRecetas($id_mascota)
{
    $recetasPorFecha = DB::table('recetas')
        ->where('id_mascota3', $id_mascota)
        ->orderBy('created_at', 'desc')
        ->get()
        ->groupBy(function($item) {
            return Carbon::parse($item->created_at)->format('Y-m-d'); // convierte string a fecha
        });

    $mascota = Mascota::find($id_mascota);

    $resultado = [];

    foreach ($recetasPorFecha as $fecha => $recetas) {
        $resultado[] = [
            'fecha' => $fecha,
            'nombre_mascota' => $mascota ? $mascota->nombre : 'N/A',
            'cuidados' => $recetas->first()->Cuidados,
            'productos' => $recetas->map(function ($p) {
                return [
                    'nom_producto' => $p->nom_producto,
                    'cantidad' => $p->Cantidad,
                    'dosis' => $p->Dosis,
                ];
            })->values(),
        ];
    }

    return response()->json($resultado);
}



}

