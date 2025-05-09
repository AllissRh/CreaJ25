<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class PerfilController extends Controller
{
    public function index()
    {
        // Obtener las mascotas del usuario autenticado
        $mascotas = Auth::user()->mascotas;  // Asumiendo que tienes una relación llamada 'mascotas' en el modelo User

        // Retornar la vista y pasarle las mascotas
        return view('perfil', compact('mascotas'));
    }
}
