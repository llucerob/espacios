<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias';

    /**
     * Get the espacio associated with the Categoria
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function espacio(): HasOne
    {
        return $this->hasOne(Espacio::class, 'categoria_id', 'id');
    }

    /**
     * Get the user that owns the Categoria
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function encargado(): BelongsTo
    {
        return $this->belongsTo(Encargado::class, 'encargado_id', 'id');
    }




}
