<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Encargado;
use App\Models\Espacio;
use Illuminate\Support\Facades\Storage;


class EspaciosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

           
        $espacios   = Espacio::all();



        return view('espacios.ver-espacios', ['espacios' => $espacios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $encargados     = Encargado::all();
        $categorias     = Categoria::all();

        return view('espacios.crear-espacios', ['encargados' => $encargados, 'categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_espacio    = new Espacio;
        $new_espacio->nombre    =   $request->nombre;
        $new_espacio->direccion =   $request->direccion;
        $new_espacio->categoria_id =   $request->categoria;
        $new_espacio->encargado_id =   $request->encargado;
        
        if($request->file('imagen')){
            $ruta = Storage::disk('public')->put('imagen', $request->file('imagen'));
        }

        $new_espacio->imagen    =   $ruta;
        $new_espacio->horario_apertura  =   $request->apertura;
        $new_espacio->horario_cierre    =   $request->cierre;
        $new_espacio->save();


        return redirect()->route('espacios.mostrar');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        
        return view('espacios.ver-programacion');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
