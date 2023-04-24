<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Encargado;
use App\Models\Espacio;
use App\Models\Reserva;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;


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
      
        $categorias     = Categoria::all();

        return view('espacios.crear-espacios', ['categorias' => $categorias]);
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
        
        
        if($request->file('imagen')){
            $ruta = Storage::disk('public')->put('imagen', $request->file('imagen'));
            $new_espacio->imagen            =   $ruta;
        }

       
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
        
        $espacio   =   Espacio::findOrFail($id);

        $eventos = [];
        foreach ($espacio->reservas as $key => $e){

            $eventos[$key]['title']     = $e->motivo.' pedido por '.$e->responsable.'; Télefono: '.$e->telefono;
            $eventos[$key]['start']     = $e->inicio;
            $eventos[$key]['end']       = $e->fin;
           
            $eventos[$key]['color']     = '#ff9f89';
               
        }

        $recintos = Espacio::all();

        
        

        
        
        return view('espacios.ver-programacion', ['recinto' => $espacio, 'eventos' => $eventos, 'recintos' => $recintos]);
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

    public function agendar()
    {
        $espacios = Espacio::all();


        return view('espacios.agendar-espacio', ['espacios' => $espacios]);

    }

    public function storereserva(Request $request){
        
        
        
        
        
        if($request->repeticion == 'on'){
            $mesinicio      =   Carbon::createFromFormat('d/m/Y H:i:s', $request->inicio)->format('F');
            $mesinicio2      =   Carbon::createFromFormat('d/m/Y H:i:s', $request->inicio)->format('F');
            //dd($mesinicio);
            $i= 0;

            while ($mesinicio == $mesinicio2) {
                $reserva    = new Reserva;
                $reserva->responsable       = $request->nombre;
                $reserva->telefono          = $request->telefono;
                $reserva->correo            = $request->correo;
                $reserva->motivo            = $request->motivo;
                $reserva->inicio            = Carbon::createFromFormat('d/m/Y H:i:s', $request->inicio)->addWeek($i)->format('Y-m-d H:i:s');
                $reserva->fin               = Carbon::createFromFormat('d/m/Y H:i:s', $request->cierre)->addWeek($i)->format('Y-m-d H:i:s');
                $reserva->espacio_id        = $request->espacio;
                              
                

                $i = $i + 1;
                $mesinicio2      =   Carbon::createFromFormat('d/m/Y H:i:s', $request->inicio)->addWeek($i)->format('F');
                $reserva->save();



            }
            

        }else{
            $reserva    = new Reserva;
            $reserva->responsable       = $request->nombre;
            $reserva->telefono          = $request->telefono;
            $reserva->correo            = $request->correo;
            $reserva->motivo            = $request->motivo;
            $reserva->inicio            = Carbon::createFromFormat('d/m/Y H:i:s', $request->inicio)->format('Y-m-d H:i:s');
            $reserva->fin               = Carbon::createFromFormat('d/m/Y H:i:s', $request->cierre)->format('Y-m-d H:i:s');
            $reserva->espacio_id        = $request->espacio;
             
            $reserva->save();


        }
        
          

        return redirect()->route('dashboard');
 
    }

    public function veragenda(Request $request)
    {
        $recinto    =   Espacio::findOrFail($request->recinto)->id;

        return redirect()->route('ver.reserva', [$recinto]);
    }

    public function agendarecurrente()
    {
        $espacios = Espacio::all();


        return view('espacios.agendar-espacio-recurrente', ['espacios' => $espacios]);

    }

    public function mostrarlista($id){
        
        $recinto = Espacio::findOrFail($id);


        return view('espacios.editar-programacion', ['recinto' => $recinto]);
    }
}
