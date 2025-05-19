<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\MascotaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Autenticación
Auth::routes();

// Ruta principal después de iniciar sesión
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {

    // Configuración de perfil
    Route::get('/configuracion', [UserController::class, 'configuracion'])->name('confi_perfil');

    // Actualizar foto de perfil y perfil
    Route::put('/profile/photo', [UserController::class, 'updatePhoto'])->name('profile.updatePhoto');
    Route::put('/perfil', [UserController::class, 'update'])->name('profile.update');

    // Vista del perfil del usuario
    Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil');
});

    // Crear mascota
    Route::get('/mascotas/crear', [MascotaController::class, 'create'])->name('mascotas.create');

    // Guardar mascota
    Route::post('/mascotas', [MascotaController::class, 'store'])->name('mascotas.store');

    // Ruta alterna para crear mascota (perfilPet)
    Route::get('/perfilPet', [MascotaController::class, 'create'])->name('perfilPet');
    

    // Ruta alterna para guardar mascota
    Route::post('/guardar-mascota', [MascotaController::class, 'store'])->name('mascota.store');

    //para mostrar 
    Route::get('/perfilPet/{id}', [MascotaController::class, 'show'])->middleware(['auth'])->name('VerperfilPet');

    Route::middleware(['web'])->get('/test-auth', function () {
    return Auth::check() ? 'Autenticado: ' . Auth::user()->email : 'No autenticado';
    });





    // Mostrar el perfil de una mascota específica (descomenta si la usarás)
    // Route::get('/perfil-mascota/{id}', [MascotaController::class, 'show'])->name('perfilPet');
});

