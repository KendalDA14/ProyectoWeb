<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría</title>
    @vite('resources/css/app.css')
</head>

<body>
    <main class="bg-gray-100 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4 bg-gray-800 text-white">
                <h1 class="text-2xl font-bold">Editar Categoríaaaaaa</h1>
            </div>

            <div class="p-6">
                <form action="{{ route('categorias.update', $categoria) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="{{ $categoria->nombre }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                                  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium 
                                   rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none 
                                   focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Actualizar
                        </button>
                        <a href='{{ route("categorias.create") }}' class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium 
                              rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none 
                              focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>

</html>