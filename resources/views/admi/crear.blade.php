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
        </div>
    </header>

    <main class="bg-gray-100 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4 bg-gray-800 text-white">
                <h1 class="text-2xl font-bold">Crear Libro</h1>
            </div>

            <div class="p-6">
                <form action="{{ route('GuardaBd') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div>
                        <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                        <input type="text" name="titulo" id="titulo" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div>
                        <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                        <textarea name="descripcion" id="descripcion" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                    </div>

                    <div>
                        <label for="autor" class="block text-sm font-medium text-gray-700">Autor</label>
                        <input type="text" name="autor" id="autor" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div>
                        <label for="fecha_salida" class="block text-sm font-medium text-gray-700">Fecha de Salida</label>
                        <input type="date" name="fecha_salida" id="fecha_salida" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div>
                        <label for="calificacion" class="block text-sm font-medium text-gray-700">Calificación</label>
                        <input type="number" name="calificacion" step="0.5" min="0" max="5" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div>
                        <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen</label>
                        <input type="file" name="imagen" id="imagen" required class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    </div>

                    <div>
                        <label for="enlace_descarga" class="block text-sm font-medium text-gray-700">Enlace de Descarga</label>
                        <input type="text" name="enlace_descarga" id="enlace_descarga" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div>
                        <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                        <select name="categoria_id" id="categoria_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex space-x-4">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Crear
                        </button>
                        <button type="button" id="btnModificar" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Modificar
                        </button>
                    </div>
                </form>

                <div id="librosExistentes" class="mt-8 hidden">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Libros Existentes</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Autor</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($libros as $libro)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $libro->titulo }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $libro->autor }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $libro->categoria->nombre }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('libros.edit', $libro->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Editar</a>
                                        <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Estás seguro de que quieres eliminar este libro?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('BtnVolverAdmin').onclick = function() {
            window.location.href = '{{ route("ventanaAdmin") }}'
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