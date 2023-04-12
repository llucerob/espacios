<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;


class UtilsController extends Controller
{
      //CONTROLADORES PARA CATEGORIAS

      public function categorias(){

        $categorias = Categoria::all();

        return view('utils.categorias', ['categorias' => $categorias]);

    }


    public function storecategorias(Request $request){
        $newcategoria = new Categoria;

        $newcategoria->nombre          =   $request->nombre;
        $newcategoria->descripcion     =   $request->descripcion;
        $newcategoria->save();


        return redirect()->route('categorias');

    }

    public function destroycategorias(string $id){

        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categorias');

    }

}
