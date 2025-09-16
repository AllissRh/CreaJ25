<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Mascota;

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

        if ($user->photo && Storage::disk('public')->exists($user->photo)) {
            Storage::disk('public')->delete($user->photo);
        }

        $path = $request->file('photo')->store('profile_photos', 'public');
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
            'dui' => 'nullable|string|max:255',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->back()->with('success', 'Perfil actualizado correctamente.');
    }

    public function perfil()
    {
        $usuario = Auth::user();
        $mascotas = $usuario->mascotas ?? collect(); 

        return view('perfil', compact('usuario', 'mascotas'));
    }


    // ========= MÉTODOS ADMIN ========= //
    public function miPerfil()
{
    $usuario = Auth::user();
    return view('adminPerfil', compact('usuario'));
}

    // Mostrar perfil SOLO modo lectura
    public function mostrar($id)
    {
        $usuario = User::findOrFail($id);
        $mascotas = $usuario->mascotas; 

        return view('perfil', compact('usuario', 'mascotas'));
    }


    // Mostrar perfil editable desde admin
    public function editar($id)
    {
        $usuario = User::findOrFail($id);
        return view('adminPerfil', compact('usuario'));
    }

    // Actualizar información de usuario desde el admin
    public function actualizar(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'tipo_usuario' => 'nullable|integer|in:1,2,3',
        ]);

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->phone = $request->phone;
        $usuario->address = $request->address;

        // Solo admins pueden modificar el tipo de usuario
        if (Auth::user()->tipo_usuario === 2 && $request->filled('tipo_usuario')) {
            $usuario->tipo_usuario = $request->tipo_usuario;
        }

        $usuario->save();

        return redirect()->back()->with('success', 'Usuario actualizado correctamente.');
    }

    // actualizar foto desde el admin
    public function actualizarFoto(Request $request, $id)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $usuario = User::findOrFail($id);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('profile_photos', 'public');
            $usuario->photo = $path;
            $usuario->save();
        }

        return redirect()->back()->with('success', 'Foto actualizada correctamente.');
    }

    // Eliminar usuario
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('admin.index')->with('success', 'Usuario eliminado correctamente.');
    }

    // Mostrar vista admin editable
    public function mostrarPerfil($id)
    {
        $usuario = User::findOrFail($id);
        return view('adminPerfil', compact('usuario'));
    }
    //eliminar si funciona verPaciente
    public function buscarTitulares(Request $request)
    {
        $query = $request->input('q');

        if (!$query) {
            return response()->json([]);
        }

        $usuarios = \App\Models\User::where('name', 'LIKE', '%' . $query . '%')->get(['id', 'name', 'email']);

        return response()->json($usuarios);
    }
    
    
        
    public function verMascota($id)
    {
        $mascota = \App\Models\Mascota::with('usuario')->findOrFail($id);
        $usuario = $mascota->usuario;

        return view('docPerfilPet', compact('mascota', 'usuario'));
    }



        public function verPaciente($id)
    {
        $usuario = User::with('mascotas')->findOrFail($id);
        return view('docVerPacientes', compact('usuario'));
    }

    public function verPerfil($id)
    {
        $usuario = User::with('mascotas')->findOrFail($id);
        return view('docPerfilPet', compact('usuario'));
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mostrarPanelDoctor($idUsuario)
    {
        $usuario = User::with('mascotas')->find($idUsuario);

        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }

        return view('docPerfilPet', compact('usuario')); 
    }

    public function Receta($id)
    {
        $mascota = Mascota::findOrFail($id); 
        return view('docReceta', compact('mascota'));
    }



}
