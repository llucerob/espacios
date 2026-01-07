<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Encargado;



class UtilsController extends Controller
{
      //CONTROLADORES PARA CATEGORIAS

      public function categorias(){

        $categorias = Categoria::all();
        $encargados = Encargado::all();

        return view('utils.categorias', ['categorias' => $categorias, 'encargados' => $encargados]);

    }


    public function storecategorias(Request $request){
        $newcategoria = new Categoria;

        $newcategoria->nombre           =   $request->nombre;
        $newcategoria->descripcion      =   $request->descripcion;
        $newcategoria->encargado_id     =   $request->encargado; 
        $newcategoria->save();


        return redirect()->route('categorias')->with('success', 'prueba');

    }

    public function destroycategorias(string $id){

        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categorias');

    }


     //CONTROLADORES PARA ENCARGADOS

     public function encargados(){

        $encargados = Encargado::all();

        return view('utils.encargados', ['encargados' => $encargados]);

    }


    public function storeencargado(Request $request){
        $newencargado = new Encargado;

        $newencargado->nombre           =   $request->nombre;
        $newencargado->telefono         =   $request->telefono;
        $newencargado->correo           =   $request->correo;

        $newencargado->save();


        return redirect()->route('encargados');

    }

    public function destroyencargado(string $id){

        $encargado = Encargado::findOrFail($id);
        $encargado->delete();

        return redirect()->route('encargados');

    }


}
