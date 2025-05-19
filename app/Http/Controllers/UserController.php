<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function configuracion()
    {
        $user = Auth::user();
        return view('confi_perfil', compact('user'));
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $user = Auth::user();
    
        // Eliminar la foto anterior si existe
        if ($user->photo && Storage::disk('public')->exists($user->photo)) {
            Storage::disk('public')->delete($user->photo);
        }
    
        // Guardar la nueva foto
        $path = $request->file('photo')->store('profile_photos', 'public');
    
        // Actualizar al usuario
        $user->photo = $path;
        $user->save();
    
        return redirect()->back()->with('success', 'Foto actualizada correctamente.');
    }

    public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
    ]);

    return redirect()->back()->with('success', 'Perfil actualizado correctamente.');
    //dd($request->all());
}

// esto es la modifiiiii


public function perfil()
{
    $mascotas = Auth::user()->mascotas; // Asegúrate que el usuario esté autenticado
    return view('perfil', compact('mascotas'));
}




}



