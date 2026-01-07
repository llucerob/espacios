<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilsController;
use App\Http\Controllers\EspaciosController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\VehiculosController;
use App\Http\Controllers\ConductoresController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('espacios.mostrar');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //Utils

    Route::get('utils/categorias', [UtilsController::class, 'categorias'])->name('categorias');
    Route::post('utils/categorias/guardar', [UtilsController::class, 'storecategorias'])->name('categorias.store');
    Route::get('utils/categorias/destroy/{id}', [UtilsController::class, 'destroycategorias'])->name('destroy.categoria');
   
    
    
    //Encargados

    Route::get('utils/encargados', [UtilsController::class, 'encargados'])->name('encargados');
    Route::post('utils/encargados/guardar', [UtilsController::class, 'storeencargado'])->name('encargado.store');
    Route::get('utils/encargados/destroy/{id}', [UtilsController::class, 'destroyencargado'])->name('destroy.encargado');

    //Espacios

     
    Route::get('espacios/crear', [EspaciosController::class, 'create'])->name('crear.espacio');
    Route::post('espacios/store', [EspaciosController::class, 'store'])->name('espacio.store');
    Route::get('espacios/mostrar', [EspaciosController::class, 'index'])->name('espacios.mostrar');
    Route::get('espacios/mostrar/{id}', [EspaciosController::class, 'show'])->name('ver.reserva');
    Route::get('espacios/agendar', [EspaciosController::class, 'agendar'])->name('espacio.agendar');
    Route::post('espacios/agendar/store', [EspaciosController::class, 'storereserva'])->name('reserva.store');
    Route::post('espacios/ver/agenda', [EspaciosController::class, 'veragenda'])->name('ver.agenda');
    Route::get('espacios/agendarecurrente', [EspaciosController::class, 'agendarecurrente'])->name('agenda.recurrente');
    Route::post('espacios/agendarecurrente/store', [EspaciosController::class, 'storerecurrente'])->name('store.recurrente');
    Route::get('espacios/mostrarlista/{id}', [EspaciosController::class, 'mostrarlista'])->name('mostrar.lista');
    Route::get('reservas/editar/{id}',[ReservasController::class, 'edit'])->name('editar.reserva');
    Route::post('reservas/update/{id}', [ReservasController::class, 'update'])->name('reserva.update');
    Route::get('reservas/destroy/{id}', [ReservasController::class, 'destroy'])->name('destroy.reserva');
Route::post('reservas/drop/{id}', [App\Http\Controllers\ReservasController::class, 'dropUpdate'])->name('reserva.drop');


    //conductores

    Route::get('conductores/listar', [ConductoresController::class, 'index'])->name('conductor.listar');
    Route::get('conductores/crear', [ConductoresController::class, 'create'])->name('conductor.crear');
    Route::post('conductores/store', [ConductoresController::class, 'store'])->name('conductor.store');
    Route::get('conductores/mostrarficha/{id}', [ConductoresController::class, 'show'])->name('conductor.show');
    Route::get('conductores/editar/{id}', [ConductoresController::class, 'edit'])->name('conductor.edit');
    Route::post('conductores/update/{id}', [ConductoresController::class, 'update'])->name('conductor.update');
    Route::get('conductores/delete/{id}', [ConductoresController::class, 'delete'])->name('conductor.delete');
    Route::post('conductores/crear/ruta/{id}', [ConductoresController::class, 'crearuta'])->name('crear.ruta');
    

    //vehiculos
    Route::get('vehiculos/listar', [VehiculosController::class, 'index'])->name('vehiculo.listar');
    Route::get('vehiculos/crear', [VehiculosController::class, 'create'])->name('vehiculo.crear');
    Route::post('vehiculos/store', [VehiculosController::class, 'store'])->name('vehiculo.store');
    Route::get('vehiculos/mostrarficha/{id}', [VehiculosController::class, 'show'])->name('vehiculo.show');
    Route::get('vehiculos/editar/{id}', [VehiculosController::class, 'edit'])->name('vehiculo.edit');
    Route::post('vehiculos/update/{id}', [VehiculosController::class, 'update'])->name('vehiculo.update');
    Route::get('vehiculoss/delete/{id}', [VehiculosController::class, 'delete'])->name('vehiculo.delete');
    Route::get('vehiculo/imprimir/{id}', [VehiculosController::class, 'imprimirruta'])->name('vehiculo.imprimir');
    Route::post('vehiculo/entregar/{id}', [VehiculosController::class, 'entregavehiculo'])->name('vehiculo.entregar');
    Route::post('vehiculo/ingresomensaje/{id}', [VehiculosController::class, 'ingresomensaje'])->name('vehiculo.ingmensaje');
    Route::post('vehiculo/ingresorevision/{id}', [VehiculosController::class, 'ingresorevision'])->name('vehiculo.ingrevision');   
    Route::post('vehiculo/ingresoaceite/{id}', [VehiculosController::class, 'ingresoaceite'])->name('vehiculo.ingaceite');  
    Route::post('reservas/drop/{id}', [App\Http\Controllers\ReservasController::class, 'dropUpdate'])->name('reserva.drop');

});

require __DIR__.'/auth.php';
