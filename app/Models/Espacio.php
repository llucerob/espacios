<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Espacio extends Model
{
    use HasFactory;

    protected $table = "espacios";

    /**
     * Get the encargados that owns the Espacio
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function encargado(): BelongsTo
    {
        return $this->belongsTo(Encargado::class, 'encargado_id', 'id');
    }


    /**
     * Get all of the comments for the Espacio
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservas(): HasMany
    {
        return $this->hasMany(Reserva::class, 'espacio_id', 'id');

    }
   


 

    /**
     * Get the categoria that owns the Espacio
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }

}
