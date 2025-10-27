<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Habitacion\Habitaciones;
use App\Http\Livewire\Habitacion\ShowHabitaciones;
use App\Http\Livewire\Pabellon\createPabellon;
use App\Http\Livewire\EstadosPagos;
use App\Http\Livewire\ShowEstadoPago;
use App\Http\Livewire\Enterrados;
use App\Http\Livewire\ShowEnterrados;
use App\Http\Livewire\ShowServicios;
use App\Http\Livewire\Servicios;
use App\Http\Livewire\Traslados;
use App\Http\Livewire\ShowTraslados;
use App\Http\Livewire\Tumba\Tumbas;
use App\Http\Livewire\Tumba\ShowTumbas;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Habitacion\Seccion;

use App\Http\Livewire\Administracion\Usuario\ShowUsuarios;
use App\Http\Livewire\Administracion\Usuario\Usuarios;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::view('/', 'welcome');
    Route::view('/home', 'welcome');

    Route::get('show-usuarios', function () { return view('viewMain.usuariosLista'); })->name('show-usuarios');
    Route::get('/usuarios', Usuarios::class)->name('usuarios');
    Route::get('/list-usuarios', ShowUsuarios::class)->name('list-usuarios');

    Route::post('/usuarios/crear', [UserController::class, 'create'])->name('crearUsuario');
    Route::get('/usuarios/{usuario}/editar', [UserController::class, 'edit'])->name('editarUsuario');
    Route::put('/usuarios/{usuario}/actualizar', [UserController::class, 'update'])->name('actualizarUsuario');
    Route::post('/usuarios/delete/{usuario}', [UserController::class, 'destroy'])->name('eliminarUsuario');
    Route::post('/usuarios/activar/{usuario}', [UserController::class, 'activar'])->name('activarUsuario');

    Route::post('resetpass/{id}', [UserController::class, 'resetPassword'])->name('user.resetpass');
    Route::post('updatepass', [UserController::class, 'updatepass'])->name('user.updatepass');
    Route::get('profile',[HomeController::class, 'profile'])->name('profile');
    Route::post('profile/update',[UserController::class, 'updateProfile'])->name('profile.update');
    

    Route::get('show-habitaciones', function () { return view('viewMain.habitacionesLista'); })->name('show-habitaciones');
    Route::get('/habitaciones', Habitaciones::class)->name('habitaciones');
    Route::get('/list-habitaciones', ShowHabitaciones::class)->name('list-habitaciones');

    Route::get('/show-tumbas', ShowTumbas::class)->name('show-tumbas');
    Route::get('/tumbas', Tumbas::class)->name('tumbas');

    Route::get('procesos/show-enterrados', function () { return view('viewMain.enterradosLista'); })->name('show-enterrados');
    Route::get('/enterrados', Enterrados::class)->name('enterrados');
    Route::get('/list-enterrados', ShowEnterrados::class)->name('list-enterrados');

    Route::get('procesos/show-pagos', function () { return view('viewMain.estadoPagoLista'); })->name('show-pago');
    Route::get('/estados-pagos', EstadosPagos::class)->name('estados-pagos');
    Route::get('/list-pagos', ShowEstadoPago::class)->name('list-pagos');

    Route::get('procesos/show-traslados', function () { return view('viewMain.traladosLista'); })->name('show-tralados');
    Route::get('/traslados', Traslados::class)->name('traslados');
    Route::get('/list-tralados', ShowTraslados::class)->name('list-tralados');

    Route::get('show-servicios', function () { return view('viewMain.serviciosLista'); })->name('show-servicios');
    Route::get('/list-servicios', ShowServicios::class)->name('list-servicios');
    Route::get('/servicios', Servicios::class)->name('servicios');

    /* Route::get('/pabellonesLista', ShowPabellones::class)->name('pabellonesLista'); */
    /* Route::get('/create-pabellon', createPabellon::class)->name('create-pabellon'); */

    /* EXPORT */
    Route::get('users/export/', [UsersController::class, 'export']);

});


