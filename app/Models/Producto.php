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

    public function imagenPrincipal()
    {
        return $this->hasOne(
            Imagenes::class,
            'id_producto',
            'id'
        )->where('principal', true);
    }

    public function imagenes()
    {
        return $this->hasMany(
            Imagenes::class,
            'id_producto'
        );
    }

    public function imagenesSecundarias()
    {
        return $this->hasMany(
            Imagenes::class,
            'id_producto',
            'id'
        )->where('principal', false);
    }

}