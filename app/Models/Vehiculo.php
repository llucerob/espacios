<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vehiculo extends Model
{
    use HasFactory;

    
    
    protected $table = 'vehiculos';


    /**
     * Get all of the comments for the Vehiculo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mantenciones(): HasMany
    {
        return $this->hasMany(Mantencion::class, 'vehiculo_id', 'id');
    }
    

    public function ruta(): BelongsToMany
    {
        return $this->belongsToMany(Conductor::class, 'rutas','vehiculo_id','conductor_id')
                    ->as('ruta')
                    ->withPivot('horasalida', 'objetivo', 'destino', 'regresoaprox')
                    ->withTimestamps();
    }
    public function rutas(): BelongsToMany
    {
        return $this->belongsToMany(Conductor::class, 'rutas_hechas', 'vehiculo_id', 'conductor_id')
                    ->as('rutas')
                    ->withPivot('kms', 'destino', 'objetivo', 'horasalida', 'regresoaprox', 'horallegada')
                    ->withTimestamps();
    }

    public function rutasxfecha($fecha){
        $arr = [];
        
        foreach($this->rutas as $key => $r){

            if($r->rutas->created_at >= $fecha){
                $arr[$key] = $r->rutas;
            }

                     

        }
        return collect($arr)->values()->all();
    }

    /**
     * Get all of the comments for the Vehiculo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function revisionestecnicas(): HasMany
    {
        return $this->hasMany(Revision::class, 'vehiculo_id', 'id');
    }

    /**
     * Get all of the Aceites for the Vehiculo
     *
     * @return \Illuminate\DatabAceitequent\Relavehiculo_idny
     */
    public function aceites(): HasMany
    {
        return $this->hasMany(Aceite::class, 'vehiculo_id', 'id');
    }



}
