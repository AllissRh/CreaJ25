<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    
    public function register(Request $request)
    {
        // Validación de campos
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'dui' => 'required|string|max:20|unique:users,dui',
            'password' => 'required|string|min:6|confirmed',
            'photo' => 'nullable|image',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Manejo de foto
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('users', 'public');
        }

        // Crear usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'dui' => $request->dui,
            'password' => Hash::make($request->password),
            'photo' => $photoPath,
            'tipo_usuario' => 1, 
        ]);
        // Generar código de verificación
    $code = mt_rand(100000, 999999);
    $user->verification_code = $code;
    $user->save();

    // Enviar código por correo
    Mail::raw("Tu código de verificación es: $code", function($message) use ($user){
        $message->to($user->email)
                ->subject('Código de verificación VitalVet');
    });

    return response()->json([
        'status' => true,
        'message' => 'Usuario registrado. Revisa tu correo para el código de verificación',
        'user_id' => $user->id
    ], 201);
    }


    public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|string'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ], 422);
    }

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            'status' => false,
            'message' => 'Credenciales incorrectas'
        ], 401);
    }

    //  login si el email no está verificado
    if (!$user->email_verified_at) {
        return response()->json([
            'status' => false,
            'message' => 'Debes verificar tu correo antes de iniciar sesión'
        ], 403);
    }

    // Crear token de autenticación
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'status' => true,
        'message' => 'Login exitoso',
        'user' => $user,
        'access_token' => $token,
        'token_type' => 'Bearer'
    ]);
}

//METODO PARA LA VERIFICACION DEL CODIFO
public function verifyCode(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'code' => 'required|string',
    ]);

    $user = User::find($request->user_id);

    if ($user->verification_code === $request->code) {
        $user->email_verified_at = now();
        $user->verification_code = null;
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Correo verificado correctamente'
        ]);
    }

    return response()->json([
        'status' => false,
        'message' => 'Código incorrecto'
    ], 400);
}

 public function sendResetCode(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $user = User::where('email', $request->email)->first();

        //code temporal 
        $code = mt_rand(100000, 999999);
        $user->password_reset_code = $code; 
        $user->save();

        Mail::raw("Tu código para restablecer contraseña es: $code", function($message) use ($user){
            $message->to($user->email)
                    ->subject('Restablecer contraseña VitalVet');
        });

        return response()->json([
            'status' => true,
            'message' => 'Código enviado al correo'
        ]);
    }
    public function verifyResetCode(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'code' => 'required|string',
    ]);

    $user = User::where('email', $request->email)->first();

    if ($user->password_reset_code === $request->code) {
        return response()->json([
            'status' => true,
            'message' => 'Código correcto'
        ]);
    }

    return response()->json([
        'status' => false,
        'message' => 'Código incorrecto'
    ], 400);
}
public function resetPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required|string|min:8|confirmed', 
        'code' => 'required|string',
    ]);

    $user = User::where('email', $request->email)->first();

    if ($user->password_reset_code !== $request->code) {
        return response()->json([
            'status' => false,
            'message' => 'Código incorrecto'
        ], 400);
    }

    $user->password = Hash::make($request->password);
    $user->password_reset_code = null; 
    $user->save();

    return response()->json([
        'status' => true,
        'message' => 'Contraseña restablecida correctamente'
    ]);
}

}