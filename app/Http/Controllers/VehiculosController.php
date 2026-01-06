<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Conductor;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Mantencion;
use App\Models\Revision;
use App\Models\Aceite;


class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autitos = Vehiculo::all();

        $arr = [];

        foreach($autitos as $key => $a){
            $arr[$key]['id']        = $a->id;
            $arr[$key]['modelo']    = $a->modelo;
            $arr[$key]['kms']       = $a->kilometraje;
            $arr[$key]['ano']       = $a->ano;
            $arr[$key]['revision']  = $a->periodorevision;
            $arr[$key]['estado']    = $a->estado;
            $arr[$key]['patente']   = $a->patente;
            if(count($a->ruta) > 0){
                $arr[$key]['msje']  = $a->ruta()->latest()->first()->ruta->regresoaprox;
            }else{
                $arr[$key]['msje']  = ' ';
            }
            

        }


        return view('vehiculos.listar', ['vehiculos' => collect($arr)->values()->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        

        return view('vehiculos.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $auto = new Vehiculo;
        $auto->patente          = $request->patente;
        $auto->modelo           = $request->modelo;
        $auto->ano              = $request->ano;
        $auto->kilometraje      = $request->km;
        $auto->periodorevision  = $request->revision;

        $auto->save();

        return redirect()->route('vehiculo.listar');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $auto = Vehiculo::findOrFail($id);

        //dd($auto->revisionestecnicas()->where('estado', 'aprobado')->latest()->first());

        if(count($auto->revisionestecnicas) > 0 && count($auto->aceites) > 0){
            
        
            

        $proxrevision = Carbon::parse($auto->revisionestecnicas()->where('estado', 'aprobado')->latest()->first()->created_at)->addmonth($auto->periodorevision)->format('d/m/Y');

        $aceite = $auto->aceites()->latest()->first();

        $rutas = Vehiculo::findOrFail($id)->rutasxfecha($aceite->created_at);
        $kms = 0;

        $eventos = [];
        $recorridos = [];
        $j = 0;
        $i = 0;
        foreach($auto->mantenciones as $a){
            $eventos[$i]['fecha']   = $a->created_at;
            $eventos[$i]['titulo']    = 'Atención';
            if($a->comentario != null){
                $eventos[$i]['mensaje'] = $a->comentario;
            }else{
                $eventos[$i]['mensaje'] = ' ';
            }
            $i = $i + 1;
        }

        foreach($auto->revisionestecnicas as $tec){
            $eventos[$i]['fecha']       = $tec->created_at;
            $eventos[$i]['titulo']      = $tec->estado;
            if($tec->comentario != null){
                $eventos[$i]['mensaje']     = $tec->comentario;
            }else{
                $eventos[$i]['mensaje']     = ' ';
            }
            $i = $i +1;

        }   
    
        foreach($auto->rutas as $r){
            $recorridos[$j]['fecha']        = $r->rutas->created_at;
            $recorridos[$j]['titulo']       = 'Salida';
            $recorridos[$j]['mensaje']      = 'Salida a '.$r->rutas->destino.' para '.$r->rutas->objetivo.' '.$r->rutas->kms.' kms. recorridos.';
            $j = $j+1;
        }
    
        foreach($auto->aceites as $a){
            $eventos[$i]['fecha']        = $a->created_at;
            $eventos[$i]['titulo']       = 'Cambio de Aceite';
            if($a->comentario == null){
                $eventos[$i]['mensaje']      = 'Rendimiendo de '.$a->aceite.' kms.';
            }else{
                $eventos[$i]['mensaje']      = 'Rendimiendo de '.$a->aceite.' kms.  Además; '.$a->comentario;
            }
            $i = $i+1;
        
        }
        $lista = collect($eventos)->sortByDesc('fecha')->values()->all();

        $rutashechas = collect($recorridos)->sortByDesc('fecha')->values()->all();
       

        foreach($rutas as $h){
            $kms = $kms + $h->kms;
        }

        return view('vehiculos.show', ['vehiculo' => $auto, 'proxrevision' => $proxrevision, 'lista' => $lista, 'cambioaceite' => $aceite->aceite - $kms, 'rutashechas' => $rutashechas]);
    

        
        }else{
            
            $eventos = [];
            $recorridos = [];
            $j = 0;
            $kms = 0;
            $i = 0;
            foreach($auto->mantenciones as $a){
                $eventos[$i]['fecha']   = $a->created_at;
                $eventos[$i]['titulo']    = 'Atención';
                if($a->comentario != null){
                    $eventos[$i]['mensaje'] = $a->comentario;
                }else{
                    $eventos[$i]['mensaje'] = ' ';
                }
                $i = $i + 1;
            }

            foreach($auto->revisionestecnicas as $tec){
                $eventos[$i]['fecha']       = $tec->created_at;
                $eventos[$i]['titulo']      = $tec->estado;
                if($tec->comentario != null){
                    $eventos[$i]['mensaje']     = $tec->comentario;
                }else{
                    $eventos[$i]['mensaje']     = ' ';
                }
                $i = $i +1;

            }
        
            foreach($auto->rutas as $r){
                $recorridos[$j]['fecha']        = $r->rutas->created_at;
                $recorridos[$j]['titulo']       = 'Salida';
                $recorridos[$j]['mensaje']      = 'Salida a '.$r->rutas->destino.' para '.$r->rutas->objetivo.' '.$r->rutas->kms.' kms. recorridos.';
                $kms = $kms + $r->rutas->kms;
                $j = $j+1;
            }
        
            foreach($auto->aceites as $a){
                $eventos[$i]['fecha']        = $a->created_at;
                $eventos[$i]['titulo']       = 'Cambio de Aceite';
                if($a->comentario == null){
                    $eventos[$i]['mensaje']      = 'Rendimiendo de '.$a->aceite.' kms.';
                }else{
                    $eventos[$i]['mensaje']      = 'Rendimiendo de '.$a->aceite.' kms.  Además; '.$a->comentario;
                }
                $i = $i+1;
            
            }
        

            $lista = collect($eventos)->sortByDesc('fecha')->values()->all();

            $rutashechas = collect($recorridos)->sortByDesc('fecha')->values()->all();

        
            return view('vehiculos.show', ['vehiculo' => $auto, 'proxrevision' => '-', 'lista' => $lista, 'cambioaceite' => 15000 - $kms, 'rutashechas' => $rutashechas]);
        }

       
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $auto = Vehiculo::findOrfail($id);

        return view('vehiculos.edit', ['auto' => $auto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $auto = Vehiculo::findOrfail($id);
        $auto->patente      = $request->patente;
        $auto->modelo       = $request->modelo;
        $auto->ano          = $request->ano;
        $auto->save();

        return redirect()->route('vehiculo.listar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $auto = Vehiculo::findOrFail($id);

        $auto->delete();
        
        return redirect()->route('listar.vehiculo', ['auto' => $auto]);
    }

    public function imprimirruta(string $id){

        $vehiculo = Vehiculo::findOrFail($id);

        $ruta = $vehiculo->ruta()->first();

        $arr = [];

        //dd($ruta);

       
        $arr['modelo']      = $vehiculo->modelo;
        $arr['patente']     = $vehiculo->patente;
        $arr['nombre']      = $ruta->nombre.' '.$ruta->apellido;
        $arr['rut']         = $ruta->rut;
        $arr['horasalida']  = $ruta->ruta->horasalida;
        $arr['poliza']      = $ruta->poliza;
        $arr['objetivo']    = $ruta->ruta->objetivo;
        $arr['inicial']     = $vehiculo->kilometraje;
        $arr['destino']     = $ruta->ruta->destino;
        $arr['regreso']     = $ruta->ruta->regresoaprox;

        

        view()->share('datos', $arr);

        $pdf = PDF::loadView('pdfs.ruta', $arr);
        

        return $pdf->download('ruta'.$vehiculo->patente.'.pdf');
        

    }

    public function entregavehiculo($id, Request $request){
        $vehiculo = Vehiculo::findOrFail($id);

        $kilometros = $request->kms - $vehiculo->kilometraje;


        $vehiculo->kilometraje = $vehiculo->kilometraje + $kilometros;

       
        $vehiculo->rutas()->attach($vehiculo->ruta->first()->id, ['kms' => $kilometros, 'destino' => $vehiculo->ruta->first()->ruta->destino, 'objetivo' => $vehiculo->ruta->first()->ruta->objetivo, 'horasalida' => $vehiculo->ruta->first()->ruta->horasalida, 'regresoaprox' => $vehiculo->ruta->first()->ruta->regresoaprox, 'horallegada' =>  Carbon::now()->format('d-m-Y H:i')]);
        
        $vehiculo->estado = 'Libre';
        $vehiculo->update();

        $vehiculo->ruta()->detach();
        
        //mensaje de cambio de estado vehiculo
        return redirect()->route('vehiculo.listar');
    }

    public function ingresomensaje($id, Request $request){

        $vehiculo = Vehiculo::findOrFail($id);

        $mantencion = new Mantencion(['comentario' => $request->mensaje]);

        //dd($vehiculo->mantenciones());
        
        $vehiculo->mantenciones()->save($mantencion);

        $vehiculo->refresh();

        return back();

    }
    
    public function ingresorevision($id, Request $request){


        $vehiculo = Vehiculo::findOrFail($id);

        $revision = new Revision(['fecha' => Carbon::now()->format('d-m-Y H:i'), 'estado' => $request->estado, 'comentario' => $request->mensaje]);

        $vehiculo->revisionestecnicas()->save($revision);

        $vehiculo->refresh();

        return back();

    }

    public function ingresoaceite($id, Request $request){

        $vehiculo = Vehiculo::findOrFail($id);

        $aceite = new Aceite(['aceite' => $request->aceite, 'comentario' => $request->mensaje]);

        $vehiculo->aceites()->save($aceite);

        $vehiculo->refresh();

        return back();

    }
    
}
