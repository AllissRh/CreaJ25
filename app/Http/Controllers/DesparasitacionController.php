<?php
// app/Http/Controllers/DesparasitacionController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desparasitacion;
use App\Models\Mascota;

class DesparasitacionController extends Controller
{
    public function store(Request $request, $mascotaId)
    {
        // Validar datos
        $request->validate([
            'fecha_dosis.*' => 'required|date',
            'producto.*' => 'required|string|max:255',
            'externo_interno.*' => 'required|in:Externo,Interno',
            'proxima_dosis.*' => 'nullable|date',
        ]);

        $count = count($request->fecha_dosis);

        for ($i = 0; $i < $count; $i++) {
            Desparasitacion::create([
                'mascota_id' => $mascotaId,
                'fecha_dosis' => $request->fecha_dosis[$i],
                'producto' => $request->producto[$i],
                'externo_interno' => $request->externo_interno[$i],
                'proxima_dosis' => $request->proxima_dosis[$i] ?? null,
            ]);
        }

        return redirect()->back()->with('success_desparasitacion', 'Desparasitaciones registradas correctamente.');
    }
    public function mostrarCartilla($id)
    {
        $mascota = Mascota::findOrFail($id);
        return view('docCartillaVer', compact('mascota'));
    }
    public function verCartilla($id)
    {
        $mascota = Mascota::with(['vacunaciones', 'desparasitaciones'])->findOrFail($id);
        return view('docCartillaVer', compact('mascota'));
    }

}
