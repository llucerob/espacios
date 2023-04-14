<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilsController;
use App\Http\Controllers\EspaciosController;

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
    return view('dashboard');
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

    //espacios

    Route::get('espacios/crear', [EspaciosController::class, 'create'])->name('crear.espacio');
    Route::post('espacios/store', [EspaciosController::class, 'store'])->name('espacio.store');
    Route::get('espacios/mostrar', [EspaciosController::class, 'index'])->name('espacios.mostrar');

    


});

require __DIR__.'/auth.php';
