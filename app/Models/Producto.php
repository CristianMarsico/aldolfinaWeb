<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $timestamps = false;

    protected $table = 'productos';

    public function marca()
    {
        return $this->belongsTo(//El producto pertenece a una marca
            Marca::class,
            'id_marca'
        );
    }
}