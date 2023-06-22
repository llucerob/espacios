<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conductor;
use App\Models\Vehiculo;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;


class ConductoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conductores = Conductor::all();
        $vehiculos = Vehiculo::where('estado', 'Libre')->get();


        return view('conductores.listar', ['conductores' => $conductores, 'vehiculos' => $vehiculos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('conductores.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $conductor = new Conductor;

        $conductor->nombre      = $request->nombre;
        $conductor->apellido    = $request->apellido;
        $conductor->rut         = $request->rut;
        $conductor->poliza      = $request->poliza;

        $conductor->save();


        return redirect()->route('conductor.listar');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $conductor  = Conductor::findOrFail($id);


        return view('conductores.show', ['conductor' => $conductor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $conductor = Conductor::findOrFail($id);

        return view('conductores.edit', ['conductor' => $conductor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $conductor = Conductor::fondOrFail($id);

        $conductor->nombre      = $request->nombre;
        $conductor->apellido    = $request->apellido;
        $conductor->rut         = $request->rut;
        $conductor->poliza      = $request->poliza;

        $conductor->update();

        return redirect()->route('listar.conductor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $conductor      = Conductor::findOrFail($id);
        $conductor->delete();

        return redirect()->route('listar.conductor');
    }

    public function crearuta(string $id, Request $request)
    {
        $conductor = Conductor::findOrFail($id);

        $auto = Vehiculo::findOrFail($request->auto);

        

        $conductor->ruta()->attach($request->auto, ['horasalida' => Carbon::now()->format('d-m-Y H:i'), 'objetivo' => $request->objetivo, 'destino' => $request->destino, 'regresoaprox' => $request->regreso]);

        $auto->estado = 'En Ruta';
        $auto->update();


        return redirect()->route('vehiculo.listar');
        

    }
}
