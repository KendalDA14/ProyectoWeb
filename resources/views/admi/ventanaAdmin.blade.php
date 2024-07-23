<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-background text-foreground min-h-screen">
    <header class="flex items-center justify-between px-6 py-4 border-b bg-muted text-muted-foreground">
        <div class="flex items-center gap-4">
            <a href="#" class="text-2xl font-bold">Librería Online</a>
        </div>

        <div class="flex items-center gap-4">
            <button id="BtnVolverAdmin" class="inline-flex items-center justify-center text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 h-9 rounded-md px-3">
                Home
            </button>
        </div>
    </header>

    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Panel de Administración</h1>

            <button id="BtnCrearCateAdmin" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-4 rounded-lg transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                Crear Categoría
            </button>

            <button id="BtnCrearLibroAdmin" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 mt-4">
                Crear Libro
            </button>
        </div>
    </div>
    <script>
        document.getElementById('BtnVolverAdmin').onclick = function() {
            window.location.href = '{{ route("homeAdmin") }}';
        }
        document.getElementById('BtnCrearCateAdmin').onclick = function() {
            window.location.href = '{{ route("categorias.create") }}';
        }
        document.getElementById('BtnCrearLibroAdmin').onclick = function() {
            window.location.href = "{{ route('libroCrear') }}";
        }
    </script>
</body>

</html>