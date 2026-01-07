<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Espacio;
use Illuminate\Support\Carbon;


class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $espacios   = Espacio::all();

        
        $reserva    = Reserva::findOrFail($id);

       



        return view('espacios.editar-agendar-espacio', ['espacios' => $espacios, 'reserva' => $reserva]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reserva                    = Reserva::findOrFail($id);

        $reserva->responsable       = $request->nombre;
        $reserva->telefono          = $request->telefono;
        $reserva->correo            = $request->correo;
        $reserva->motivo            = $request->motivo;
        $reserva->inicio            = Carbon::createFromFormat('d/m/Y H:i:s', $request->inicio)->format('Y-m-d H:i:s');
        $reserva->fin               = Carbon::createFromFormat('d/m/Y H:i:s', $request->cierre)->format('Y-m-d H:i:s');
        $reserva->espacio_id        = $request->espacio;
         
        $reserva->update();

        return redirect()->route('mostrar.lista', [$request->espacio] );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reserva = Reserva::findOrFail($id);

        $recinto      =    $reserva->espacio_id;

        $reserva->delete();

        return redirect()->route('mostrar.lista', [$recinto]);
    }

   public function dropUpdate(Request $request, $id)
    {
        $reserva = Reserva::find($id);
        if ($reserva) {
            $reserva->inicio = Carbon::parse($request->start)->format('Y-m-d H:i:s');
            $reserva->fin    = Carbon::parse($request->end)->format('Y-m-d H:i:s');
            $reserva->save();
            return response()->json(['status' => 'success', 'message' => 'Guardado exitoso']);
        }
        return response()->json(['status' => 'error', 'message' => 'Reserva no encontrada'], 404);
    }
}
