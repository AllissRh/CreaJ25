<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedireccionController extends Controller
{
    public function redirigir(Request $request)
    {
        $rol = $request->input('tipo_usuario');

        if ($rol == 1) {
            return redirect()->route('perfil');
        } elseif ($rol == 2) {
            return redirect()->route('admin');
        } elseif ($rol == 3) {
            return redirect()->route('docVista');
        } else {
            return redirect()->back()->with('error', 'Rol inválido');
        }
    }
}
