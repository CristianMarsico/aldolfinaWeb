<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edades;
use App\Models\Categoria;

class EdadController extends Controller
{
    public function index()
    {
        $edades = Edades::all();
         $categorias = Categoria::all();
        return view('admin.edades.index', compact('edades', 'categorias'));
    }

   public function store(Request $request)
{
    $request->validate([
        'edades' => 'required|string|max:255',
    ]);

    if ($request->id) {
        $edad = Edades::findOrFail($request->id);
        $edad->update(['edades' => $request->edades]);
    } else {
        Edades::create(['edades' => $request->edades]);
    }

    return redirect()->route('admin.edades');
}

    public function destroy($id)
    {
        Edades::destroy($id);
        return redirect()->route('admin.edades');
    }
}
