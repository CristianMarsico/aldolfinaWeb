<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marcas;
use App\Models\Panales;
use App\Models\Edades;
use App\Models\Talles;
use App\Models\Imagenes;

class ProductoController extends Controller {

    public function paginaInicio(){
        $categorias = Categoria::all();
        $productos = Producto::all();
        $oferta=false;
        return view('user.home.home', compact('categorias', 'productos', 'oferta'));
    }

    public function paginaContacto(){
        $categorias = Categoria::all();

        return view('user.contacto.contacto', [
            'categorias' => $categorias
        ]);
    }

    public function productos($categoria, $id_categoria)
    {
        $categorias = Categoria::all();
        $categoriaActual = $categoria;        
        
        $productos = Producto::with('imagenPrincipal')
            ->where('id_categoria', $id_categoria)
            ->get();    
       
        $marcas = Marcas::all();
        $edades = Edades::all();
        $talles = Talles::all();
        $oferta = true;
        return view('user.productos.productos', compact('categorias', 'productos', 'marcas', 'edades', 'talles', 'id_categoria','categoriaActual', 'oferta'));
    }

    public function filtrarProductos(Request $request, $id){
    
        $marcas = $request->marcas ?? [];
        $edad = $request->edad;
        $precio = $request->precio;

        $query = Producto::where('id_categoria', $id);

        if ($edad) $query->where('id_edad', $edad);    

        if (!empty($marcas)) $query->whereIn('id_marca', $marcas);    

        if ($precio) {
            [$min, $max] = explode('-', $precio);
            $query->whereBetween('precio', [$min, $max]);
        }

        $productos = $query->get();    

        return view('user.productos.card', [
            'productos' => $productos
        ]);
    }

    public function paginaDetalleProducto($id){
        
        $categorias = Categoria::all();
        $producto = Producto::with([
            'imagenPrincipal',
            'imagenesSecundarias'
        ])->findOrFail($id);

         return view('user.productos.detalle', compact('categorias', 'producto'));
           
    }

    public function store(Request $request){

        $request->validate([
            'nombre' => 'required',
            'descripcion_corta' => 'required',
            'descripcion_larga' => 'required',
            'edad' => 'required',
            'marca' => 'required',
            'talle' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'imagen' => 'nullable|image|max:2048'
         ]);          

        if ($request->id) {
            $producto = Producto::findOrFail($request->id);
        } else {
            $producto = new Producto();
            $producto->id_categoria = $request->id_categoria;
        }

        $producto->nombre = $request->nombre;
        $producto->id_edad = $request->edad;
        $producto->id_marca = $request->marca;
        $producto->id_talle = $request->talle;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->descripcion_corta = $request->descripcion_corta;
        $producto->descripcion_larga =$request->descripcion_larga;

        $categoria = Categoria::find($request->id_categoria);

        $producto->save();
        return redirect()->route('admin.productos', [
            'categoria' => $categoria->categoria,
            'id_categoria' => $request->id_categoria
        ]);
    }


    public function destroy($id){
       $producto = Producto::findOrFail($id);

        $idCategoria = $producto->id_categoria;

        $categoria = Categoria::findOrFail($idCategoria);

        $producto->delete();

        return redirect()->route('admin.productos', [
            'categoria' => $categoria->categoria,
            'id_categoria' => $categoria->id
        ]);       
    }


    public function buscarProductos(Request $request, $id_categoria){
        $buscar = $request->buscar;

        $productos = Producto::where('id_categoria', $id_categoria)
            ->where('nombre', 'LIKE', "%{$buscar}%")
            ->get();

        return response()->json($productos);
    }


}