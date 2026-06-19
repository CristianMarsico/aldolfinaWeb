<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    public $timestamps = false; 

    protected $table = 'marcas';
    protected $fillable = ['marca'];


    public function productos()
    {
        return $this->hasMany(//una marca tiene muchos productos
            Producto::class,
            'id_marca'
        );
    }
}