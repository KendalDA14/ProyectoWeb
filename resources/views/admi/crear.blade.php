


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Libro</title>
    
    @vite('resources/css/app.css')
    
</head>

<body class="bg-background text-foreground min-h-screen">
    <header class="flex items-center justify-between px-6 py-4 border-b bg-muted text-muted-foreground">
        <div class="flex items-center gap-4">
            <button id="BtnVolverAdmin" class="inline-flex items-center justify-center text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 h-9 rounded-md px-3">
                Volver
            </button>
            <button id="BtnHomeAdmin" class="inline-flex items-center justify-center text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 h-9 rounded-md px-3">
                Home
            </button>
        </div>
    </header>

    <main class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-6" >Crear Libro </h1>
        <form action="{{ route('GuardaBd') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="autor">Autor</label>
                <input type="text" name="autor" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="fecha_salida">Fecha de Salida</label>
                <input type="date" name="fecha_salida" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="calificacion">Calificación</label>
                <input type="number" name="calificacion" step="0.5" min="0" max="5" required>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="enlace_descarga">Enlace de Descarga</label>
                <input type="text" name="enlace_descarga" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="categoria_id">Categoría</label>
                <select name="categoria_id" class="form-control" required>
                    @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">
                        {{ $categoria->nombre }}
                    </option>
                    @endforeach
                </select>
            </div>
            <a></a>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear</button>
        </form>
            <div class="form-group">
                <button type="button" id="btnModificar" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Modificar</button>
            </div>
        </form>

        <div id="librosExistentes" style="display: none;">
            <h2 class="mt-8">Libros Existentes</h2>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Categoría</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($libros as $libro)
                    <tr>
                        <td>{{ $libro->titulo }}</td>
                        <td>{{ $libro->autor }}</td>
                        <td>{{ $libro->categoria->nombre }}</td>
                        <td>
                            <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este libro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <script>
        document.getElementById('BtnVolverAdmin').onclick = function() {
            window.location.href = '{{ route("ventanaAdmin") }}'
        };
        document.getElementById('BtnHomeAdmin').onclick = function() {
            window.location.href = '{{ route("homeAdmin") }}'
        };

        document.getElementById('btnModificar').addEventListener('click', function(e) {
            e.preventDefault(); 
            var librosExistentes = document.getElementById('librosExistentes');
            if (librosExistentes.style.display === 'none') {
                librosExistentes.style.display = 'block';
                this.textContent = 'Ocultar';
            } else {
                librosExistentes.style.display = 'none';
                this.textContent = 'Modificar';
            }
        });
    </script>
    
</body>

</html>