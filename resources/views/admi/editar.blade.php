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

    <main class="bg-gray-100 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4 bg-gray-800 text-white">
                <h1 class="text-2xl font-bold">Editar Libro</h1>
            </div>

            <div class="p-6">
                <form action="{{ route('libros.update', $libro->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                        <input type="text" name="titulo" id="titulo" value="{{ $libro->titulo }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div>
                        <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                        <textarea name="descripcion" id="descripcion" rows="3" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $libro->descripcion }}</textarea>
                    </div>

                    <div>
                        <label for="autor" class="block text-sm font-medium text-gray-700">Autor</label>
                        <input type="text" name="autor" id="autor" value="{{ $libro->autor }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div>
                        <label for="fecha_salida" class="block text-sm font-medium text-gray-700">Fecha de Salida</label>
                        <input type="date" name="fecha_salida" id="fecha_salida" value="{{ $libro->fecha_salida }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div>
                        <label for="calificacion" class="block text-sm font-medium text-gray-700">Calificación</label>
                        <input type="number" name="calificacion" id="calificacion" step="0.5" min="0" max="5" value="{{ $libro->calificacion }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div>
                        <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen</label>
                        <input type="file" name="imagen" id="imagen" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                        @if($libro->imagen)
                        <p class="mt-2 text-sm text-gray-500">Imagen actual: {{ $libro->imagen }}</p>
                        @endif
                    </div>

                    <div>
                        <label for="enlace_descarga" class="block text-sm font-medium text-gray-700">Enlace de Descarga</label>
                        <input type="text" name="enlace_descarga" id="enlace_descarga" value="{{ $libro->enlace_descarga }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div>
                        <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                        <select name="categoria_id" id="categoria_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $libro->categoria_id == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium 
                                   rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none 
                                   focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Actualizar
                        </button>
                        <a href="{{ route('libroCrear') }}" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
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