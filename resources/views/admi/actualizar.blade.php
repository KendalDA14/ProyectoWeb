<!DOCTYPE html>
<html>
<head>
    <title>Editar Libro</title>
</head>
<body>
    <h1>Editar Libro</h1>
    <form action="{{ route('libros.actualizar', $libro->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" class="form-control" value="{{ $libro->titulo }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="form-control" required>{{ $libro->descripcion }}</textarea>
        </div>
        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" name="autor" class="form-control" value="{{ $libro->autor }}" required>
        </div>
        <div class="form-group">
            <label for="fecha_salida">Fecha de Salida</label>
            <input type="date" name="fecha_salida" class="form-control" value="{{ $libro->fecha_salida }}" required>
        </div>
        <div class="form-group">
            <label for="calificacion">Calificación</label>
            <input type="number" name="calificacion" class="form-control" value="{{ $libro->calificacion }}" required>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="text" name="imagen" class="form-control" value="{{ $libro->imagen }}" required>
        </div>
        <div class="form-group">
            <label for="enlace_descarga">Enlace de Descarga</label>
            <input type="text" name="enlace_descarga" class="form-control" value="{{ $libro->enlace_descarga }}" required>
        </div>
        <div class="form-group">
            <label for="categoria_id">Categoría</label>
            <select name="categoria_id" class="form-control" required>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $libro->categoria_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</body>
</html>
