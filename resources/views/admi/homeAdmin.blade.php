<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería Online</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-background text-foreground min-h-screen">
    <header class="flex items-center justify-between px-6 py-4 border-b bg-muted text-muted-foreground">
        <div class="flex items-center gap-4">
            <a href="#" class="text-2xl font-bold">Librería Online</a>
        </div>
        <div class="flex justify-center">
            <a href="#" class="text-2xl font-bold" style="color: black;">Area Administrativa</a>
        </div>

        <div class="flex items-center gap-4">
             
                <button type="button" class="inline-flex items-center justify-center text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 h-9 rounded-md px-3" onclick="window.location.href='{{ route('ventanaAdmin') }}'">
                    Administración
                </button>
            <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="inline-flex items-center justify-center text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 h-9 rounded-md px-3" id="logoutBtn">Cerrar Sesión</button>
                </form>
        </div>
    </header>

    <main class="px-6 py-8">
        <h2 class="text-2xl font-bold">Libros</h2>

        <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mt-8">
            @foreach ($libros as $libro)
            <div class="bg-muted rounded-lg overflow-hidden">
                <img src="{{ $libro->imagen }}" alt="{{ $libro->titulo }}" width="400" height="500" class="w-full h-56 object-cover" />
                <div class="p-4 space-y-2">
                    <h3 class="text-xl font-bold">{{ $libro->titulo }}</h3>
                    <p class="text-muted-foreground">Autor: {{ $libro->autor }}</p>
                    <p class="text-muted-foreground">Categoría: {{ $libro->categoria->nombre }}</p>
                    <p class="text-muted-foreground">{{ $libro->descripcion }}</p>
                    <p class="text-muted-foreground">Fecha de lanzamiento: {{ $libro->fecha_salida }}</p>
                    <div class="flex items-center gap-2">
                        @for ($i = 1; $i <= 5; $i++) @if ($i <=$libro->calificacion)

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M10 15l-3.39 1.78 0.64-3.75-2.7-2.63 3.76-0.55L10 7l1.7 3.04 3.76 0.55-2.7 2.63 0.64 3.75L10 15z" />
                            </svg>
                            @elseif ($i - 0.5 <= $libro->calificacion)
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M10 15l-3.39 1.78 0.64-3.75-2.7-2.63 3.76-0.55L10 7l1.7 3.04 1.88 1.76L10 15z" />
                                </svg>
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M10 15l-3.39 1.78 0.64-3.75-2.7-2.63 3.76-0.55L10 7l1.7 3.04 3.76 0.55-2.7 2.63 0.64 3.75L10 15z" />
                                </svg>
                                @endif
                                @endfor
                                <span class="text-sm text-muted-foreground">{{ number_format($libro->calificacion, 1) }}</span>
                    </div>
                    <a href="{{ $libro->enlace_descarga }}" class="text-black">Descargar</a>
                </div>
            </div>
            @endforeach
        </section>
    </main>

    <footer class="bg-muted py-6 text-center text-muted-foreground">
        &copy; 2024 Librería Online. Todos los derechos reservados.
    </footer>

    <!-- <script src="{{ asset('js/Botones.js') }}"></script>-->
    <script>
        document.getElementById('BtnVolver').onclick = function() {
            window.location.href = '{{ route("home") }}';
        }
        document.getElementById('BtnVentanaAdmin').onclick = function() {
            window.location.href = '{{ route("ventanaAdmin") }}';
        }
    </script>

</body>

</html>