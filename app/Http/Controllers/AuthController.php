<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Marcas;
use App\Models\Edades;
use App\Models\Talles;

class AuthController extends Controller {
    
    function paginaLogin(){
        return view('paginaLogin');
    }

    public function verifyLogin(Request $request){
        $usuario = $request->usuario;
        $password = $request->password;

        if (!$usuario || !$password) {
            return back()->with(
                'error',
                'Datos obligatorios'
            );
        }

        if (Auth::attempt([
            'usuario' => $usuario,
            'password' => $password
        ])) {

            $request->session()->regenerate();
            $user = Auth::user();

            session([
                'ID_USER'  => $user->id,
                'USERNAME' => $user->usuario                
            ]);

            return redirect('administracion');
        }

        return back()->with(
            'error',
            'Datos incorrectos'
        );
    }

    public function logout(){
        session()->flush();
        return redirect('/');
    }


    function paginaAdministracion(){
        $categorias = Categoria::all();

        return view('paginaAdministracion', ['categorias' => $categorias]);
    }

    public function abmPanales($id_categoria){
        $categorias = Categoria::all();

        $productos = Producto::where(
            'id_categoria',
            $id_categoria
        )->get();

        $marcas = Marcas::all();
        $edades = Edades::all();
        $talles = Talles::all();

        $producto = null;      

        return view(
            'paginaAbmPanales',
            compact(
                'categorias',
                'productos',
                'marcas',
                'edades',
                'talles',
                'id_categoria',
                'producto'
            )
        );
    }


    public function editarPanal($id){
        $producto = Producto::findOrFail($id);

        $productos = Producto::where(
            'id_categoria',
            $producto->id_categoria
        )->get();

        $categorias = Categoria::all();
        $marcas = Marcas::all();
        $edades = Edades::all();
        $talles = Talles::all();

        $id_categoria = $producto->id_categoria;

        return view(
            'paginaAbmPanales',
            compact(
                'categorias',
                'productos',
                'marcas',
                'edades',
                'talles',
                'producto',
                'id_categoria'
            )
        );
    }

    // public function guardarPanal(Request $request){
    //     $request->validate([
    //         'nombre' => 'required',
    //         'descripcion_corta' => 'required',
    //         'descripcion_larga' => 'required',
    //         'edad' => 'required',
    //         'marca' => 'required',
    //         'talle' => 'required',
    //         'precio' => 'required|numeric',
    //         'stock' => 'required|integer',
    //         'imagen' => 'nullable|image|max:2048'
    //      ]);

    //     if ($request->id) {
    //         $producto = Producto::findOrFail($request->id);
    //     } else {
    //         $producto = new Producto();
    //         $producto->id_categoria = $request->id_categoria;
    //     }

    //     $producto->nombre = $request->nombre;
    //     $producto->id_edad = $request->edad;
    //     $producto->id_marca = $request->marca;
    //     $producto->id_talle = $request->talle;
    //     $producto->precio = $request->precio;
    //     $producto->stock = $request->stock;
    //     $producto->descripcion_corta = $request->descripcion_corta;
    //     $producto->descripcion_larga =$request->descripcion_larga;

    //     // IMAGEN
    //     if ($request->hasFile('imagen')) {

    //         if ($producto->imagen && file_exists(public_path('img/' . $producto->imagen))) {
    //             unlink(public_path('img/' . $producto->imagen));
    //         }

    //         $nombreImagen = time() . '.' .$request->imagen->extension();

    //         $request->imagen->move( public_path('img'),$nombreImagen);

    //         $producto->imagen = $nombreImagen;
    //     }

    //         $producto->save();

    //         return redirect()->route('administracionPañales',$producto->id_categoria);
    // }

    public function guardarPanal(Request $request)
{
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
    $producto->descripcion_corta = $request->descripcion_corta;
    $producto->descripcion_larga = $request->descripcion_larga;
    $producto->id_edad = $request->edad;
    $producto->id_marca = $request->marca;
    $producto->id_talle = $request->talle;
    $producto->precio = $request->precio;
    $producto->stock = $request->stock;

    // SUBIR IMAGEN
    if ($request->hasFile('imagen')) {

        // Borra imagen anterior al editar
        if (
            $producto->imagen &&
            file_exists(public_path('img/' . $producto->imagen))
        ) {
            unlink(public_path('img/' . $producto->imagen));
        }

        $nombreImagen =
            uniqid('producto_') . '.' .
            $request->file('imagen')->getClientOriginalExtension();

        $request->file('imagen')->move(
            public_path('img'),
            $nombreImagen
        );

        $producto->imagen = $nombreImagen;
    }

    $producto->save();

    return redirect()->route(
        'administracionPañales',
        $producto->id_categoria
    );
}

 public function eliminarPanal($id)
{
    $producto = Producto::findOrFail($id);

    $id_categoria = $producto->id_categoria;

    if (
        $producto->imagen &&
        file_exists(public_path('img/' . $producto->imagen))
    ) {
        unlink(
            public_path('img/' . $producto->imagen)
        );
    }

    $producto->delete();

    return redirect()->route(
        'administracionPañales',
        $id_categoria
    );
}


    public function buscarProductos(Request $request, $id_categoria){
        $buscar = $request->buscar;

        $productos = Producto::where('id_categoria', $id_categoria)
            ->where('nombre', 'LIKE', "%{$buscar}%")
            ->get();

        return response()->json($productos);
    }


}