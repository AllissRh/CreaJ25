<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class PerfilController extends Controller
{
    public function index()
    {
        // Obtener las mascotas del usuario autenticado
        $mascotas = Auth::user()->mascotas;  

        // Retornar la vista y pasarle las mascotas
        return view('perfil', compact('mascotas'));
        

    }
    
}
