<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marcas;
use App\Models\Panales;
use App\Models\Edades;
use App\Models\Talles;

class ProductoController extends Controller {
    
    // public function paginaInicio(){
    //     $categorias = Categoria::all();

    //     return view('paginaHome', [
    //         'categorias' => $categorias
    //     ]);
    // }


    public function paginaInicio(){
        $categorias = Categoria::all();
        $productos = Producto::all();
        $oferta=false;
        return view('user.home.home', compact('categorias', 'productos', 'oferta'));
    }

    // public function paginaContacto(){
    //     $categorias = Categoria::all();

    //     return view('paginaContacto', [
    //         'categorias' => $categorias
    //     ]);
    // }


    public function paginaContacto(){
        $categorias = Categoria::all();

        return view('user.contacto.contacto', [
            'categorias' => $categorias
        ]);
    }


    // public function verPanales($id){
    //     $productos = Producto::where('id_categoria', $id)->get();
    //     $categorias = Categoria::all();
    //     $marcas = Marcas::all();
    //     $edades = Edades::all();        

    //     return view('paginaPanales', [
    //         'categorias' => $categorias,
    //         'marcas' => $marcas,
    //         'edades' => $edades,
    //         'productos' => $productos,
    //         'id' => $id
    //     ]);
    // }


    public function productos($categoria, $id_categoria)
    {
        $categorias = Categoria::all();
        $categoriaActual = $categoria;
        $productos = Producto::where('id_categoria', $id_categoria)->get();
        $marcas = Marcas::all();
        $edades = Edades::all();
        $talles = Talles::all();
        $oferta = true;
        return view('user.productos.productos', compact('categorias', 'productos', 'marcas', 'edades', 'talles', 'id_categoria','categoriaActual', 'oferta'));
    }


// public function filtrarPanales(Request $request, $id)
// {
 
//     $marcas = $request->marcas ?? [];
//     $edad = $request->edad;
//     $precio = $request->precio;

//     $query = Producto::where('id_categoria', $id);

//     if ($edad) $query->where('id_edad', $edad);    

//     if (!empty($marcas)) $query->whereIn('id_marca', $marcas);    

//     if ($precio) {
//         [$min, $max] = explode('-', $precio);
//         $query->whereBetween('precio', [$min, $max]);
//     }

//     $productos = $query->get();

//     return view('componentCard', [
//         'productos' => $productos
//     ]);
// }
public function filtrarPanales(Request $request, $id)
{
 
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

    // public function verHigiene($id){
    //     $productos = Producto::where('id_categoria', $id)->get();
    //     $categorias = Categoria::all();
        
    //     $marcas = Marcas::whereHas('productos', function ($query) use ($id) {
    //         $query->where('id_categoria', $id);
    //     })->get();
      

    //     return view('paginaHigiene', [
    //         'productos' => $productos,
    //         'categorias' => $categorias,
    //         'marcas' => $marcas,
    //         'id' => $id
    //     ]);
    // }

    public function paginaDetalleProducto($id){
        
        return view('paginaDetalle');
           
    }

    public function filtrarHigiene(Request $request, $id)
{

    $marcas = $request->marcas ?? [];
    $precio = $request->precio;
   

    $query = Producto::where('id_categoria', $id);

    // MARCAS
    if (!empty($marcas)) {
        $query->whereIn('id_marca', $marcas);
    }

    // PRECIO
    if ($precio) {

        [$min, $max] = explode('-', $precio);

        $query->whereBetween('precio', [$min, $max]);
    }

    $productos = $query->get();

    return view('user.productos.card', [
        'productos' => $productos
    ]);
}

//  public function formulario($id = null)
//     {
//         $marcas = Marcas::all();
//         $producto = null;
//         if ($id) {
//             $producto = Producto::findOrFail($id);
//         }
//         return view('productos.formulario', compact('marcas', 'producto'));
//     }
    // public function agregar(Request $request)
    // {
    //     $request->validate([
    //         'nombre' => 'required',
    //         'marca' => 'required|exists:marcas,id',
    //         'imagen' => 'nullable|image|max:2048',
    //         // otras validaciones
    //     ]);
    //     $producto = new Producto();
    //     $producto->nombre = $request->nombre;
    //     $producto->marca_id = $request->marca;
    //     // cargar más campos...
    //     if ($request->hasFile('imagen')) {
    //         $path = $request->file('imagen')->store('imagenes', 'public');
    //         $producto->imagen = $path;
    //     }
    //     $producto->save();
    //     return redirect()->route('productos.formulario')->with('success', 'Producto agregado');
    // }
    // public function editar(Request $request, $id)
    // {
    //     $request->validate([
    //         'nombre' => 'required',
    //         'marca' => 'required|exists:marcas,id',
    //         'imagen' => 'nullable|image|max:2048',
    //     ]);
    //     $producto = Producto::findOrFail($id);
    //     $producto->nombre = $request->nombre;
    //     $producto->marca_id = $request->marca;
    //     // cargar más campos...
    //     if ($request->hasFile('imagen')) {
    //         if ($producto->imagen) {
    //             \Storage::disk('public')->delete($producto->imagen);
    //         }
    //         $path = $request->file('imagen')->store('imagenes', 'public');
    //         $producto->imagen = $path;
    //     }
    //     $producto->save();
    //     return redirect()->route('productos.formulario', $id)->with('success', 'Producto editado');
    // }





}