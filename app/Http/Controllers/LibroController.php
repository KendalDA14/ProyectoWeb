<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Categoria;
use Illuminate\View\View;

class LibroController extends Controller
{


    public function crear(): View
    {
        $categorias = Categoria::all();
        $libros = Libro::all();  
        return view('admi.crear', compact('categorias',"libros"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:20',
            'descripcion' => 'required|string',
            'autor' => 'required|string|max:20',
            'fecha_salida' => 'required|date',
            'calificacion' => 'required|integer|min:1|max:5',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'enlace_descarga' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        if ($request->hasFile('imagen')) {
            $imageName = time().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        }

        $libro = new Libro();
        $libro->titulo = $request->titulo;
        $libro->descripcion = $request->descripcion;
        $libro->autor = $request->autor;
        $libro->fecha_salida = $request->fecha_salida;
        $libro->calificacion = $request->calificacion;
        $libro->imagen = $imagePath;
        $libro->enlace_descarga = $request->enlace_descarga;
        $libro->categoria_id = $request->categoria_id;
        $libro->save();

        return redirect()->route('homeAdmin')->with('success', 'Libro creado');
    }

    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        $categorias = Categoria::all();
        return view('admi.editar', compact('libro', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:20',
            'descripcion' => 'required|string',
            'autor' => 'required|string|max:20',
            'fecha_salida' => 'required|date',
            'calificacion' => 'required|integer|min:1|max:5',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'enlace_descarga' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
        ]);
    
        $libro = Libro::findOrFail($id);
        $libro->titulo = $request->titulo;
        $libro->descripcion = $request->descripcion;
        $libro->autor = $request->autor;
        $libro->fecha_salida = $request->fecha_salida;
        $libro->calificacion = $request->calificacion;
        $libro->enlace_descarga = $request->enlace_descarga;
        $libro->categoria_id = $request->categoria_id;
    
        if ($request->hasFile('imagen')) {
            if ($libro->imagen && file_exists(public_path($libro->imagen))) {
                unlink(public_path($libro->imagen));
            }
    
            $imageName = time().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
            $libro->imagen = $imagePath;
        }
    
        $libro->save();
    
        return redirect()->route('libroCrear')->with('success', 'Libro actualizado exitosamente');
    }

    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
    
        if ($libro->imagen && file_exists(public_path($libro->imagen))) {
            unlink(public_path($libro->imagen));
        }
 
        $libro->delete();
    
        return redirect()->route('libroCrear')->with('success', 'Libro eliminado exitosamente');
    }
}
