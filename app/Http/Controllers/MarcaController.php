<?php
namespace App\Http\Controllers;

use App\Models\Marcas;
use App\Models\Categoria;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        $marcas = Marcas::all();
        return view('admin.marcas.index', compact('marcas', 'categorias'));
    }

     public function store(Request $request)
{
    $request->validate([
        'marca' => 'required|string|max:255',
    ]);

    if ($request->id) {
        $marca = Marcas::findOrFail($request->id);
        $marca->update(['marca' => $request->marca]);
    } else {
        Marcas::create(['marca' => $request->marca]);
    }

    return redirect()->route('admin.marcas');
}

    public function destroy($id)
    {
        Marcas::destroy($id);
        return redirect()->route('admin.marcas');
    }
}
