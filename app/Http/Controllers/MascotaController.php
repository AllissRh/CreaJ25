<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;
use Illuminate\Support\Facades\Auth;

class MascotaController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $mascotas = $user->mascotas;

        return view('perfil', compact('mascotas')); // Esta vista debe existir
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'edad' => 'required|integer',
            'especie' => 'required|string|max:255',
            'raza' => 'required|string|max:255',
            'sexo' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'peso' => 'required|numeric',
            'alergias' => 'nullable|string',
            'imagen' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('mascotas', 'public');
        }

        $data['user_id'] = Auth::id();

        Mascota::create($data);

        return redirect()->back()->with('success', 'Mascota registrada correctamente.');
    }
   //esto ayuda a ver el perfil de la mascota esto quitar
    public function show($id)
    {
        $mascota = Mascota::findOrFail($id);
        return view('perfilPet', compact('mascota'));
    }
    public function index()
    {
        $mascotas = Mascota::all();  
        return view('perfil', compact('mascotas'));
    }

}


