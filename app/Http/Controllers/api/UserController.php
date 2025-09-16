<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Obtener un usuario por ID
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'address' => $user->address,
            'dui' => $user->dui,
            'photo' => $user->photo 
            ? (str_starts_with($user->photo, 'users/') 
                ? $user->photo 
                : 'users/' . $user->photo) 
            : null,
        ]);
    }

    public function update(Request $request)
{
    $user = auth()->user(); 

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$user->id,
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
        'dui' => 'nullable|string|max:20',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'dui' => $request->dui,
    ]);

    // Manejo de la foto
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $path = $file->store('users', 'public'); 
        $user->photo = $path;
        $user->save();
    }

    return response()->json([
        'message' => 'Perfil actualizado correctamente',
        'user' => $user
    ]);
}


public function profile(Request $request)
{
    $user = $request->user(); 
    return response()->json([
        'name' => $user->name,
        'email' => $user->email,
        'phone' => $user->phone,
        'address' => $user->address,
        'dui' => $user->dui,
        'photo' => $user->photo 
            ? (str_starts_with($user->photo, 'users/') 
                ? $user->photo 
                : 'users/' . $user->photo) 
            : null,
    ]);
}
 public function getDoctors(Request $request)
    {
        // Solo usuarios tipo 3 (doctores)
        $doctors = User::where('tipo_usuario', 3)->get(['id', 'name', 'email']); 

        return response()->json($doctors);
    }



}


