<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Conductor extends Model
{
    use HasFactory;
    protected $table = 'conductores';

    /**
     * The roles that belong to the Conductor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ruta(): BelongsToMany
    {
        return $this->belongsToMany(Vehiculo::class, 'rutas', 'conductor_id', 'vehiculo_id')
                    ->as('ruta')
                    ->withPivot('horasalida', 'objetivo', 'destino', 'regresoaprox')
                    ->withTimestamps();
    }

    public function rutas(): BelongsToMany
    {
        return $this->belongsToMany(Conductor::class, 'rutas_hechas', 'conductor_id', 'vehiculo_id')
                    ->as('rutas')
                    ->withPivot('kms', 'destino', 'objetivo', 'horasalida', 'regresoaprox', 'horallegada')
                    ->withTimestamps();
    }

    
}
