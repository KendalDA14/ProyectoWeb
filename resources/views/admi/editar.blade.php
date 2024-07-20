<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
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
        <h1 class="text-2xl font-bold mb-6">Editar Libro</h1>
        <form action="{{ route('libros.update', $libro->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" name="titulo" id="titulo" value="{{ $libro->titulo }}"  required>
            </div>
            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="3"  required>{{ $libro->descripcion }}</textarea>
            </div>
            <div class="mb-4">
                <label for="autor" class="block text-sm font-medium text-gray-700">Autor</label>
                <input type="text" name="autor" id="autor" value="{{ $libro->autor }}"  required>
            </div>
            <div class="mb-4">
                <label for="fecha_salida" class="block text-sm font-medium text-gray-700">Fecha de Salida</label>
                <input type="date" name="fecha_salida" id="fecha_salida" value="{{ $libro->fecha_salida }}" required>
            </div>
            <div class="mb-4">
                <label for="calificacion" class="block text-sm font-medium text-gray-700">Calificación</label>
                <input type="number" name="calificacion" id="calificacion" value="{{ $libro->calificacion }}" min="1" max="5" required>
            </div>
            <div class="mb-4">
                <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="mt-1 block w-full">
                @if($libro->imagen)
                <p class="mt-2 text-sm text-gray-500">Imagen actual: {{ $libro->imagen }}</p>
                @endif
            </div>
            <div class="mb-4">
                <label for="enlace_descarga" class="block text-sm font-medium text-gray-700">Enlace de Descarga</label>
                <input type="text" name="enlace_descarga" id="enlace_descarga" value="{{ $libro->enlace_descarga }}"  required>
            </div>
            <div class="mb-4">
                <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                <select name="categoria_id" id="categoria_id">
                    @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $libro->categoria_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit">
                    Actualizar Libro
                </button>
            </div>
        </form>
    </main>

    <script>
        document.getElementById('BtnVolverAdmin').onclick = function() {
            window.location.href = '{{ route("ventanaAdmin") }}';
        };
        document.getElementById('BtnHomeAdmin').onclick = function() {
            window.location.href = '{{ route("homeAdmin") }}';
        };
    </script>
</body>

</html>