<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class MascotaController extends Controller
{
    public function create()
    {
        return view('perfilPet');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'nullable|string|max:255',
            'edad' => 'required|integer',
            'especie' => 'required|string|max:255',
            'raza' => 'nullable|string|max:255',
            'sexo' => 'required|string',
            'color' => 'nullable|string|max:255',
            'peso' => 'nullable|numeric',
            'alergias' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'user_id' => 'required|integer|exists:users,id', 
            'est_reproductivo' => 'required|string',
        ]);

        $mascota = new Mascota();
        $mascota->nombre = $request->nombre;
        $mascota->apellido = $request->apellido;
        $mascota->edad = $request->edad;
        $mascota->especie = $request->especie;
        $mascota->raza = $request->raza;
        $mascota->sexo = $request->sexo;
        $mascota->color = $request->color;
        $mascota->peso = $request->peso;
        $mascota->alergias = $request->alergias;

        $mascota->user_id = $request->user_id;
        $mascota->est_reproductivo = $request->est_reproductivo; 
 

        if ($request->hasFile('imagen')) {
        // Guardar la imagen en storage
        $ruta = $request->file('imagen')->store('mascotas', 'public');
        $mascota->imagen = $ruta;
        }

        $mascota->save();


        return redirect()->back()->with('success', 'Mascota registrada correctamente.');
    }

    // aca se modifico por que para que se vea el id del dueño 
    public function show($id)
    {
        $mascota = Mascota::findOrFail($id);
        $propietario = $mascota->user; // Obtener el dueño relacionado

        return view('perfilPet', compact('mascota', 'propietario'));
    }

    public function index()
    {
        $mascotas = Auth::user()->mascotas;
        return view('perfil', compact('mascotas'));
    }

    public function edit($id)
    {
        $mascota = Mascota::findOrFail($id);

        $propietario = $mascota->user; 
        return view('confi_mascota', compact('mascota', 'propietario'));
    }

public function update(Request $request, $id)
{
    $mascota = Mascota::findOrFail($id);

    $mascota->nombre = $request->nombre;
    $mascota->apellido = $request->apellido;
    $mascota->edad = $request->edad;
    $mascota->especie = $request->especie;
    $mascota->raza = $request->raza;
    $mascota->sexo = $request->sexo;
    $mascota->color = $request->color;
    $mascota->peso = $request->peso;
    $mascota->alergias = $request->alergias;
    $mascota->est_reproductivo = $request->est_reproductivo; 



    if ($request->hasFile('imagen')) {
        // Eliminar imagen anterior si existe
        if ($mascota->imagen && Storage::disk('public')->exists($mascota->imagen)) {
            Storage::disk('public')->delete($mascota->imagen);
        }

        // Guardar nueva imagen
        $mascota->imagen = $request->file('imagen')->store('mascotas', 'public');
    }

    $mascota->save();
    $mascota->refresh();

    $propietario = $mascota->user;

    return view('confi_mascota', compact('mascota', 'propietario'))
        ->with('success', 'Mascota actualizada correctamente.');
}
    public function mostrar($id)
    {
        $mascota = Mascota::findOrFail($id);
        $usuario = $mascota->user;

        return view('docPerfilPet', compact('mascota', 'usuario'));
    }
    
    public function mostrarCartilla($id)
    {
        $mascota = Mascota::with(['vacunaciones', 'desparasitaciones'])->findOrFail($id);

        return view('docCartillaVer', compact('mascota'));
    }
}
