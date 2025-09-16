<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\UserController;

use App\Http\Controllers\api\MascotaController;
use App\Http\Controllers\api\RecetaController;

use App\Http\Controllers\api\ConsultaController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\DoctorChatController;
use App\Http\Controllers\api\DoctorChatApiController;
use App\Http\Controllers\api\VCitaController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
// routes/api.php
Route::get('/users/{id}', [UserController::class, 'show']);


Route::get('/usuario/{id}', [UserController::class, 'show']);

//CONFIG PERFIL DE USU

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user/profile', [UserController::class, 'profile']);
    Route::put('/user/update', [UserController::class, 'update']);
});

//MASCOTA
Route::get('/users/{user_id}/mascotas', [MascotaController::class, 'index']);

Route::post('mascotas', [MascotaController::class, 'store']);

Route::get('/mascotas/{id}', [MascotaController::class, 'show']);

Route::put('mascotas/{id}', [MascotaController::class, 'update']);

//RECETA
// routes/api.php
Route::get('recetas/{id_mascota}', [RecetaController::class, 'historialRecetas']);


//CARTILLA
// routes/api.php
Route::get('/mascotas/{id}/cartilla', [MascotaController::class, 'cartilla']);

//CONTROL-CONSULTA
Route::get('/consultas/{mascotaId}', [ConsultaController::class, 'index']);


Route::post('/consultas', [ConsultaController::class, 'store']);

//VERIFICACION DE CODIGO EMAIL 

Route::post('/verify-code', [AuthController::class, 'verifyCode']);

//RECU CUENTA
Route::post('/login', [AuthController::class, 'login']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);

Route::post('/send-verification-code', [AuthController::class, 'sendVerificationCode']);


//RESET PASS
Route::post('/send-reset-code', [AuthController::class, 'sendResetCode']);

Route::post('/verify-reset-code', [AuthController::class, 'verifyResetCode']);



//CHAT DOC-USU



Route::middleware('auth:sanctum')->group(function () {
    Route::get('/chats', [ChatController::class, 'index']);
    Route::get('/chats/{chat}/messages', [ChatController::class, 'messages']);

    Route::post('/chats/{chat}/messages', [MessageController::class, 'store']);
    Route::post('/chats/{chat}/mark-read', [MessageController::class, 'markRead']);
});

Route::middleware('auth:sanctum')->get('/doctors', [UserController::class, 'getDoctors']);

Route::post('/chats/start', [ChatController::class, 'start']);

Route::middleware('auth:sanctum')->post('/chats/start', [ChatController::class, 'startChat']);

// Mostrar chat
Route::get('/doctor/chats/{chat}', [DoctorChatController::class, 'show'])
     ->name('doctor.chat.show')
     ->middleware('auth');

// Enviar mensaje
Route::middleware('auth:sanctum')->post('/doctor/chats/{chat}/send', [DoctorChatApiController::class, 'send']);


//citas
Route::get('/doctors', [UserController::class, 'getDoctors']);

Route::post('/citas', [VCitaController::class, 'store']);
Route::get('/citas', [VCitaController::class, 'index']);
Route::patch('/citas/{id}/estado', [VCitaController::class, 'updateEstado']);

