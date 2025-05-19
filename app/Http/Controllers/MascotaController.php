<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;
use Illuminate\Support\Facades\Auth;

class MascotaController extends Controller
{
    public function create()
    {
        return view('mascotas.create');
    }

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
            'imagen'    => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('mascotas', 'public');
        }

        $data['user_id'] = Auth::id();

        Mascota::create($data);

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
}
