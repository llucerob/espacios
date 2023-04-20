<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Encargado extends Model
{
    use HasFactory;
    protected $table = 'encargados';

    /**
     * obtiene al encargado del espacio
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria(): HasMany
    {
        return $this->hasMany(Categoria::class, 'encargado_id', 'id');
    }

 
}
