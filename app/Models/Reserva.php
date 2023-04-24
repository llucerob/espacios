<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Reserva extends Model
{
    use HasFactory;
    protected $table = 'reservas';
    /**
     * Get the user that owns the Reserva
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recinto(): BelongsTo
    {
        return $this->belongsTo(Espacio::class, 'espacio_id', 'id');
    }


   
}
