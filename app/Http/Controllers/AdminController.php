<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Marcas;
use App\Models\Edades;
use App\Models\Talles;

class AdminController extends Controller{
    public function dashboard(){
        $categorias = Categoria::all();
        return view('admin.dashboard', compact('categorias'));
    }
    public function productos($categoria, $id_categoria){
        $categorias = Categoria::all();
        $categoriaActual = $categoria;   
        $productos = Producto::where('id_categoria', $id_categoria)->get();

    
        $marcas = Marcas::all();
        $edades = Edades::all();
        $talles = Talles::all();
        return view('admin.productos.productos', compact('categorias', 'categoriaActual', 'productos', 'marcas', 'edades', 'talles', 'id_categoria'));
    }

}
