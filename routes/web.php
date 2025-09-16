<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\RedireccionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\VacunacionController;
use App\Http\Controllers\DesparasitacionController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\VCitaController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\DoctorChatController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FacturaController;


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
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');//esto puse
    
    //botones admin
    //Route::get('/usuarios/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('usuarios.show');
    //Route::get('/usuarios/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('usuarios.edit');
    //Route::delete('/usuarios/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('usuarios.destroy');



// Gestión usuarios

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/usuarios/crear', [AdminController::class, 'store'])->name('admin.usuarios.crear');

    //ver
    Route::get('/admin/usuarios/{id}', [UserController::class, 'mostrar'])->name('admin.usuarios.mostrar');
    //editar
    Route::get('/admin/usuarios/{id}/editar', [UserController::class, 'editar'])->name('admin.usuarios.editar');
    Route::put('/admin/usuarios/{id}', [UserController::class, 'actualizar'])->name('admin.usuarios.actualizar');
    Route::put('/admin/usuarios/foto/{id}', [UserController::class, 'actualizarFoto'])->name('admin.usuarios.actualizarFoto');
    //eliminar
    Route::delete('/admin/usuarios/{id}', [UserController::class, 'destroy'])->name('admin.usuarios.eliminar');

    Route::get('/admin/adminPerfil/{id}', [UserController::class, 'mostrarPerfil'])->name('adminPerfil');
    // Nueva ruta para perfil propio
Route::get('/admin/mi-perfil', [UserController::class, 'miPerfil'])->name('adminMiPerfil');
        
    Route::get('/mascotas/{id}/editar', [MascotaController::class, 'edit'])->name('mascotas.edit');
    
    Route::get('/mascota/{id}', [MascotaController::class, 'mostrarPerfil'])->name('perfilPet');


    Route::put('/mascotas/{id}', [MascotaController::class, 'update'])->name('mascotas.update');





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


    //crear doc
    Route::get('/doc/doctor-vista', function () {
    return view('docVista');
    });
    //admin gene
    Route::get('/admin/admin-vista', function () {
    return view('admin');
    });
    //crear usuario
    Route::get('/admin/crear-usuario', function () {
    return view('adminCrearUsu');
    });

    
    Route::post('/redireccionar-por-rol', [RedireccionController::class, 'redirigir'])->name('redirigir.por.rol');
    
    Route::get('/perfil', function () {
        return view('perfil');
    })->name('perfil');

    Route::get('/docVista', function () {
        return view('docVista');
    })->name('docVista');

    Route::get('/docVista/perfil-doctor', function () {
        return view('docPerfil');
    })->name('docPerfil');

    Route::get('/docVista/perfil-doctor/configuración', function () {
        return view('confi_doc');
    })->name('confi_doc');

    Route::get('/docVista/perfil-doctor/perfil-pet', function () {
        return view('docPerfilPet');
    })->name('docPerfilPet');
    
    //admin
    Route::get('/admin/adminPerfil', function () {
        return view('adminPerfil'); // Asegúrate de que esta vista exista
    })->name('adminPerfil');
 

    //buscar titulares 
    Route::get('/buscar-titulares', [UserController::class, 'buscarTitulares']);

    Route::get('/docVerPerfil/{id}', [UserController::class, 'verPaciente']);
    
    Route::get('/mascota/{id}', [MascotaController::class, 'mostrar']);

    Route::get('/mascota/{id}', [UserController::class, 'verMascota'])->name('ver.mascota');

    Route::get('/perfil-mascota/{id}', [UserController::class, 'verPerfil']);
    

    //Route::get('/mascota/{id}', [UserController::class, 'verMascota'])->name('ver.mascota');

    //Route::get('/docVerPerfil/docPerfil/{id}', [UserController::class, 'mostrarPanelDoctor'])->name('doctor.panel');

    Route::get('/docPerfilPet/{id}', [UserController::class, 'verMascota'])->name('docPerfilPet');

    Route::get('/docPerfilPet/docReceta/{id}', [UserController::class, 'Receta'])->name('docReceta');//este es del boton de doc para hacer y ver receta

    Route::get('/doctor/mascota/{id}', [MascotaController::class, 'mostrar'])->name('docMascota');  

    //para form de recetas de doctor
    Route::post('/guardar-receta', [RecetaController::class, 'guardar'])->name('guardarReceta');

    Route::get('/recetas/ver/{id}', function ($id) {
    return view('docRecetaVer', ['id' => $id]);
})->name('docReceta');

    Route::get('/recetas/ver/{id}', [RecetaController::class, 'verRecetaIndividual'])->name('docReceta');



    Route::get('/recetas/crear/{id}', [RecetaController::class, 'docReceta'])->name('docRecetaCrear');


    // Mostrar formulario con método GET
    Route::get('/vacunacion/form/{id_mascota}', [VacunacionController::class, 'create'])->name('vacunacion.form');

    // Guardar datos con método POST
    Route::post('/vacunacion/store/{id_mascota}', [VacunacionController::class, 'store'])->name('vacunacion.store');

    Route::post('/desparasitacion/store/{mascota}', [DesparasitacionController::class, 'store'])->name('desparasitacion.store');
    
    Route::get('/cartilla/ver/{id}', [DesparasitacionController::class, 'mostrarCartilla'])->name('cartilla.ver');



    //agreguee esto 19-8-2025:
    Route::get('/consultas', [ConsultaController::class, 'index'])->name('consultas.index');
    Route::get('/consultas/create/{id_mascota}', [ConsultaController::class, 'create'])->name('consultas.create');
    Route::post('/consultas', [ConsultaController::class, 'store'])->name('consultas.store');
    //es solo para ver la mascota seleccionada en vista consulta doctor
    Route::post('/consultas/{id_mascota}', [ConsultaController::class, 'storeForMascota'])->name('consultas.store.mascota');
    // Ver consultas de una mascota específica
    Route::get('/consultas/mascota/{id_mascota}', [ConsultaController::class, 'verConsultaMascota'])
    ->name('consultas.verConsultaMascota');
    
    // Para el control médico del doctor
    Route::get('/consultas/mascota/{id_mascota}/control', [ConsultaController::class, 'docControlMedicoPet'])
    ->name('consultas.docControlMedicoPet');

//CORREO VERIFICACION





// Verificación de email
Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verify'])
    ->middleware(['signed'])->name('verification.verify');

// Reenvío de email de verificación
Route::post('/email/resend', [AuthController::class, 'resendVerificationEmail']);


 //CHAT DOCTOR-USU
    Route::get('/doctor/chats', [App\Http\Controllers\DoctorChatController::class, 'index'])
     ->name('doctor.chats')
     ->middleware('auth');

    Route::get('/doctor/chats/{chat}', [App\Http\Controllers\DoctorChatController::class, 'show'])
        ->name('doctor.chat.show')
     ->middleware('auth');

     Route::post('/doctor/chats/{chat}/send', [DoctorChatController::class, 'send'])
     ->name('doctor.chat.send')
     ->middleware('auth');

Route::get('/doctor/chats/{chat}/messages', [DoctorChatController::class, 'getMessages']);

Route::get('/docchats/refresh', [App\Http\Controllers\DoctorChatController::class, 'refresh'])->name('docchats.refresh');



// Mostrar factura
Route::get('/factura/{usuario}', [FacturaController::class, 'show'])
    ->name('factura.form');

// Guardar y enviar factura
Route::post('/factura/{usuario}/guardar', [FacturaController::class, 'guardar'])->name('factura.guardar');

Route::get('/docVerPerfil/{usuario}', [UserController::class, 'verPerfil'])->name('docVerPerfil');//yo jenny cambie esto por que esta usuario controller a Usery no existe


//-----Cita------

    Route::resource('vcitas', VCitaController::class);
    Route::post('vcitas/store/{usuarioId}', [VCitaController::class, 'store'])->name('vcitas.store');
    
// Grupo para rutas que requieren autenticación
Route::middleware(['auth'])->group(function () {

    // Ruta para ver el formulario de crear cita según mascota
    Route::get('vcitas/crear/{mascotaId}', [VCitaController::class, 'create'])
        ->name('vcitas.create');

    
    // Guardar citas
    Route::post('/vcitas/store/{usuarioId}', [VCitaController::class, 'store'])->name('vcitas.store');

    // Ver citas de un usuario (docCitaVer)
    Route::get('/docCita/ver/{usuarioId}', [VCitaController::class, 'docCitaVer'])->name('docCita.ver');

    //para ver solo la del usuario
    Route::get('usuarios/{usuarioId}/mascotas/{mascotaId}/citas', 
        [VCitaController::class, 'mascotaCitas'])->name('citas.mascota');
    
    //para ver todas la del usuario
    Route::get('usuarios/{usuarioId}/citas', 
    [VCitaController::class, 'todasCitas'])->name('citas.todas');

    
    //Mostar por Cada Usuatio asignado de cit
    Route::get('usuarios/{usuarioId}/mascotas/{mascotaId}/citas', [VCitaController::class, 'mascotaCitas'])
    ->name('vcitas.porMascota');

    // Mostrar todas las citas de un usuario con filtros
    Route::get('usuarios/{usuarioId}/citas', [VCitaController::class, 'todasCitas'])
        ->name('vcitas.todas');

    //-------------------Acción de editar de cita por cada mascota---------------------
    Route::get('vcitas/{cita}/editar', [VCitaController::class, 'edit'])->name('vcitas.edit');
    Route::put('vcitas/{cita}', [VCitaController::class, 'update'])->name('vcitas.update');
    
    //-------------------Acción de editar de Todas las citas---------------------
    // Mostrar formulario de edición
    Route::get('vcitas/{cita}/edit', [VCitaController::class, 'edit'])->name('vcitas.edit');

    // Actualizar la cita
    Route::put('vcitas/{cita}', [VCitaController::class, 'update'])->name('vcitas.update');


});
});

