<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Categorías</title>
    @vite('resources/css/app.css')
</head>

<body>
    <header class="flex items-center justify-between px-6 py-4 border-b bg-muted text-muted-foreground">
        <div class="flex items-center gap-4">
            <button id="BtnVolverAdmin" class="inline-flex items-center justify-center text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 h-9 rounded-md px-3">
                Volver
            </button>
        </div>
    </header>

    <main class="bg-gray-100 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4 bg-gray-800 text-white">
                <h1 class="text-2xl font-bold">Crear Categorías</h1>
            </div>

            <div class="p-6">
                <form action="{{ route('categorias.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" name="nombre" id="nombre" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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

                <div id="categoriasExistentes" class="mt-8 hidden">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Lista de Categorías</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($categorias as $categoria)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $categoria->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $categoria->nombre }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Editar</a>
                                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Estás seguro de que quieres eliminar esta categoría?')">Eliminar</button>
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
            var categoriasExistentes = document.getElementById('categoriasExistentes');
            if (categoriasExistentes.style.display === 'none') {
                categoriasExistentes.style.display = 'block';
                this.textContent = 'Ocultar';
            } else {
                categoriasExistentes.style.display = 'none';
                this.textContent = 'Modificar';
            }
        });
    </script>
    @vite('resources/js/app.js')
</body>

</html>