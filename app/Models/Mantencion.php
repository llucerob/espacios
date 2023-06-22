<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Mantencion extends Model
{
    use HasFactory;

    protected $table = 'mantenciones';
    protected $fillable = ['comentario'];

    /**
     * Get the user that owns the Mantencion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehiculo(): BelongsTo
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id', 'id');
    }
}
