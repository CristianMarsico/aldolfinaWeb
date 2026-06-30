<?php
namespace App\Http\Controllers;

use App\Models\Marcas;
use App\Models\Categoria;
use Illuminate\Http\Request;

class MarcaController extends Controller{
   
    public function index(){
        $categorias = Categoria::all();
        $marcas = Marcas::all();
        return view('admin.marcas.index', compact('marcas', 'categorias'));
    }

    public function store(Request $request){
        $request->validate([
            'marca' => 'required|string|max:255',
            'imagen' => 'nullable|image|max:2048'
        ]);

        if ($request->id)  $marca = Marcas::findOrFail($request->id);
        else  $marca = new Marcas();

        $marca->marca = $request->marca;

        if ($request->hasFile('imagen')) {

            if (
                $marca->imagen &&
                file_exists(public_path('img/marcas/' . $marca->imagen))
            ) {
                unlink(public_path('img/marcas/' . $marca->imagen));
            }

            $nombreImagen =
                uniqid('marca_') . '.' .
                $request->file('imagen')->getClientOriginalExtension();

            $request->file('imagen')->move(
                public_path('img/marcas'),
                $nombreImagen
            );

            $marca->imagen = $nombreImagen;
        }

        $marca->save();

        return redirect()->route('admin.marcas');
    }

    public function destroy($id){
        Marcas::destroy($id);
        return redirect()->route('admin.marcas');
    }
}
