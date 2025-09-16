<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Vacunacion;
use Illuminate\Http\Request;

class VacunacionController extends Controller
{
    public function create($id_mascota)
    {
        $mascota = Mascota::findOrFail($id_mascota);
        return view('docCartilla', compact('mascota'));
        
    }

    public function store(Request $request, $id_mascota)
    {
        $request->validate([
            'fecha_dosis.*' => 'required|date',
            'nom_vacuna.*' => 'required|string|max:255',
            'proxima_dosis.*' => 'nullable|date',
        ]);

        foreach ($request->fecha_dosis as $index => $fecha) {
            Vacunacion::create([
                'id_mascota_3' => $id_mascota,
                'fecha_dosis' => $fecha,
                'nom_vacuna' => $request->nom_vacuna[$index],
                'proxima_dosis' => $request->proxima_dosis[$index] ?? null,
            ]);
        }

         return redirect()->back()->with('success_vacunacion', 'Vacunación registradas correctamente.');
   
    }
    public function verCartilla($id)
    {
        $mascota = Mascota::with(['vacunaciones', 'desparasitaciones'])->findOrFail($id);
        return view('docCartillaVer', compact('mascota'));
    }

    
}
