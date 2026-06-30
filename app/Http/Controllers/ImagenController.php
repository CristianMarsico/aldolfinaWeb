<?php
namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Imagenes;
use Illuminate\Http\Request;

class ImagenController extends Controller{

    public function index(){
        $categorias = Categoria::all();
        $productos = Producto::with('imagenes')->get();        
        return view('admin.imagenes.index', compact('productos', 'categorias'));
    }

    // public function store(Request $request){
    //     try {

    //         $request->validate([
    //             'id_producto' => 'required|exists:productos,id',
    //             'imagen'      => 'required|image|max:2048',
    //         ]);

    //         if ($request->filled('id')) $imagen = Imagenes::findOrFail($request->id);

    //         else  $imagen = new Imagenes();
            

    //         $imagen->id_producto = $request->id_producto;
    //         $imagen->principal = $request->has('principal');

    //         if ($request->hasFile('imagen')) {

    //             // crear carpeta si no existe
    //             if (!file_exists(public_path('img/img_productos'))) {
    //                 mkdir(public_path('img/img_productos'), 0777, true);
    //             }

    //             // eliminar imagen anterior
    //             if (
    //                 !empty($imagen->imagen) &&
    //                 file_exists(public_path('img/img_productos/' . $imagen->imagen))
    //             ) {
    //                 unlink(public_path('img/img_productos/' . $imagen->imagen));
    //             }

    //             $nombreImagen =
    //                 uniqid('imgProducto_') . '.' .
    //                 $request->file('imagen')->getClientOriginalExtension();

    //             $request->file('imagen')->move(
    //                 public_path('img/img_productos'),
    //                 $nombreImagen
    //             );

    //             $imagen->imagen = $nombreImagen;
    //         }

    //         $imagen->save();

    //         return redirect()
    //             ->route('admin.imagenes')
    //             ->with('success', 'Imagen guardada correctamente');

    //     } catch (\Exception $e) {

    //         dd(
    //             'ERROR',
    //             $e->getMessage(),
    //             $e->getFile(),
    //             $e->getLine()
    //         );
    //     }
    // }
    
    // public function destroy($id){
    //     Imagenes::destroy($id);
    //     return redirect()->route('admin.imagenes');
    // }

    public function store(Request $request)
{
    $request->validate([
        'id_producto' => 'required|exists:productos,id',
        'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
    ]);

    $nombreImagen = time() . '_' .
        $request->file('imagen')->getClientOriginalName();

    $request->file('imagen')->move(
        public_path('img/img_productos'),
        $nombreImagen
    );

    // Si la nueva imagen es principal,
    // quitamos la principal anterior
    if ($request->has('principal')) {

        Imagenes::where(
            'id_producto',
            $request->id_producto
        )->update([
            'principal' => false
        ]);
    }

    Imagenes::create([
        'id_producto' => $request->id_producto,
        'imagen' => $nombreImagen,
        'principal' => $request->has('principal')
    ]);

    return redirect()
        ->route('admin.imagenes')
        ->with(
            'success',
            'Imagen cargada correctamente'
        );
}

    public function principal($id)
{
    $imagen = Imagenes::findOrFail($id);

    Imagenes::where(
        'id_producto',
        $imagen->id_producto
    )->update([
        'principal' => false
    ]);

    $imagen->update([
        'principal' => true
    ]);

    return response()->json([
        'success' => true
    ]);
}


public function destroy($id)
{
    $imagen = Imagenes::findOrFail($id);

    $ruta = public_path(
        'img/img_productos/' .
        $imagen->imagen
    );

    if(file_exists($ruta))
    {
        unlink($ruta);
    }

    $imagen->delete();

    return response()->json([
        'success' => true
    ]);
}


public function destroyAll($idProducto)
{
    $imagenes = Imagenes::where(
        'id_producto',
        $idProducto
    )->get();

    foreach($imagenes as $img)
    {
        $ruta = public_path(
            'img/img_productos/' .
            $img->imagen
        );

        if(file_exists($ruta))
        {
            unlink($ruta);
        }
    }

    Imagenes::where(
        'id_producto',
        $idProducto
    )->delete();

    return response()->json([
        'success' => true
    ]);
}
}
