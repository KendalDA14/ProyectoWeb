<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Libro;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.crearr', compact('categorias'));
    }
    public function create()
    {
        $categorias = Categoria::all();
        return view('categorias.crearr', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Categoria::create($request->all());
        return redirect()->route('categorias.create')->with('success', 'Categoría creada');
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.editarr', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $categoria->update($request->all());
        return redirect()->route('categorias.create')->with('success', 'Categoría actualizada');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.create')->with('success', 'Categoría eliminada');
    }

    public function categoriaIndex()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function mostrar($id)
    {
        $categoria = Categoria::findOrFail($id);
        $libros = Libro::where('categoria_id', $id)->get();
        return view('categorias.mostrar', compact('categoria', 'libros'));
    }
}
