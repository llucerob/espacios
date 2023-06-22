<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aceite extends Model
{
    use HasFactory;

    protected $table = 'aceites';
    protected $fillable = ['aceite', 'comentario'];

    /**
     * Get the user that owns the Aceite
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehiculo(): BelongsTo
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id', 'id');
    }
    
}
