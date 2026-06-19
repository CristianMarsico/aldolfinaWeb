<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    public $timestamps = false;

    protected $table = 'imagenes';

    protected $fillable = ['id_producto', 'imagen', 'principal'];

    public function producto()
    {
        return $this->belongsTo(
            Producto::class,
            'id_producto',
            'id'
        );
    }

}

