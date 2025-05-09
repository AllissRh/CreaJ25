<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // para usar Auth::routes()
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\MascotaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar rutas web para tu aplicación.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(); // 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/configuracion', [UserController::class, 'configuracion'])->name('confi_perfil');
});

Route::put('/profile/photo', [UserController::class, 'updatePhoto'])->name('profile.updatePhoto');

Route::put('/perfil', [UserController::class, 'update'])->name('profile.update');


Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil');



Route::get('/mascotas/crear', [MascotaController::class, 'create'])->name('mascotas.create');

Route::post('/mascotas', [MascotaController::class, 'store'])->name('mascotas.store');

//esto modifii


Route::middleware(['auth'])->get('/perfil', [PerfilController::class, 'index'])->name('perfil');

Route::post('/mascotas', [MascotaController::class, 'store'])->middleware('auth')->name('mascotas.store');


Route::middleware(['auth'])->group(function () {
    Route::get('/perfilPet', [MascotaController::class, 'create'])->name('perfilPet');
    Route::post('/guardar-mascota', [MascotaController::class, 'store'])->name('mascota.store');
});

//pasamos el ID de la mascota a la ruta.
//Route::get('/perfil-mascota/{id}', [MascotaController::class, 'show'])->name('perfilPet');

//Route::get('/mascota/{id}', [MascotaController::class, 'show'])->name('perfilPet');

//Route::get('mascota/{id}', [MascotaController::class, 'show'])->name('perfilPet');
