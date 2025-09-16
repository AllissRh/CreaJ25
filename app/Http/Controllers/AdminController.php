<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('admin', compact('usuarios'));
    }

    public function store(Request $request)
{
    // Validar datos
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
        'tipo_usuario' => 'required|integer|in:1,2,3,4',
        'phone' => 'required|string|max:20',   
        'address' => 'required|string|max:255',
        'dui' => 'required|string|max:20',
    ]);

    // Crear usuario 
    $user = new User();
    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->password = Hash::make($validated['password']);
    $user->tipo_usuario = $validated['tipo_usuario'];
    $user->phone = $validated['phone'];
    $user->address = $validated['address'];
    $user->dui = $validated['dui'];
    $user->save();

    return redirect()->route('admin.index')->with('success', 'Usuario creado exitosamente.');
}

}
