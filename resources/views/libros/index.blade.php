<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen p-4">
    <header class="flex items-center justify-between px-6 py-4 border-b bg-muted text-muted-foreground">
        <div class="flex items-center gap-4">
            <button id="BtnVolver" class="inline-flex items-center justify-center text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 h-9 rounded-md px-3">
                Volver
            </button>
        </div>
    </header>

    <main class="bg-gray-100 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <div class="max-w-3xl mx-auto">
                <div class="bg-white shadow rounded-lg p-6">
                    <h1 class="text-2xl font-bold mb-4 text-gray-800">Categorías</h1>
                    <ul class="space-y-2">
                        @foreach($categorias as $categoria)
                        <li class="bg-gray-50 hover:bg-gray-100 transition duration-150 ease-in-out rounded">
                            <a href="{{ route('categorias.mostrar', $categoria->id) }}" class="block px-4 py-3 text-gray-700 hover:text-indigo-600">
                                {{ $categoria->nombre }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </main>
    <script>
        document.getElementById('BtnVolver').onclick = function() {
            window.location.href = '{{ route("home") }}';
        }
    </script>
</body>

</html>