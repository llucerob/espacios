<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilsController;
use App\Http\Controllers\EspaciosController;
use App\Http\Controllers\ReservasController;

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

    

    


});

require __DIR__.'/auth.php';
