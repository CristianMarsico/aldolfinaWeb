<?php
namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Imagenes;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        $imagenes = Imagenes::with('producto')->get();
       
        return view('admin.imagenes.index', compact('imagenes', 'categorias'));
    }

public function store(Request $request)
    {
        try {

            $request->validate([
                'id_producto' => 'required|exists:productos,id',
                'imagen'      => 'required|image|max:2048',
            ]);

            if ($request->filled('id')) {

                $imagen = Imagenes::findOrFail($request->id);

            } else {

                $imagen = new Imagenes();
            }

            $imagen->id_producto = $request->id_producto;
            $imagen->principal = $request->has('principal');

            if ($request->hasFile('imagen')) {

                // crear carpeta si no existe
                if (!file_exists(public_path('img/img_productos'))) {
                    mkdir(public_path('img/img_productos'), 0777, true);
                }

                // eliminar imagen anterior
                if (
                    !empty($imagen->imagen) &&
                    file_exists(public_path('img/img_productos/' . $imagen->imagen))
                ) {
                    unlink(public_path('img/img_productos/' . $imagen->imagen));
                }

                $nombreImagen =
                    uniqid('imgProducto_') . '.' .
                    $request->file('imagen')->getClientOriginalExtension();

                $request->file('imagen')->move(
                    public_path('img/img_productos'),
                    $nombreImagen
                );

                $imagen->imagen = $nombreImagen;
            }

            $imagen->save();

            return redirect()
                ->route('admin.imagenes')
                ->with('success', 'Imagen guardada correctamente');

        } catch (\Exception $e) {

            dd(
                'ERROR',
                $e->getMessage(),
                $e->getFile(),
                $e->getLine()
            );
        }
    }
    public function destroy($id)
    {
        Imagenes::destroy($id);
        return redirect()->route('admin.imagenes');
    }
}
