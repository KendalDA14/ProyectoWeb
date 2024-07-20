<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería Noir</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-background text-foreground min-h-screen">
    <header class="flex items-center justify-between px-6 py-4 border-b bg-muted text-muted-foreground">
        <div class="flex items-center gap-4">
            <a href="#" class="text-2xl font-bold">Librería Noir</a>
            <nav class="hidden md:flex items-center gap-4">
                <a href="#" class="hover:text-primary-foreground">Categorías</a>
                <a href="#" class="hover:text-primary-foreground">Novedades</a>
                <a href="#" class="hover:text-primary-foreground">Más Vendidos</a>
                <a href="#" class="hover:text-primary-foreground">Contacto</a>
            </nav>
        </div>
        <div class="flex items-center gap-4">
            <button id="BtIniciarH" class="inline-flex items-center justify-center text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 h-9 rounded-md px-3">
                Iniciar Sesión
            </button>
            <button id="BtnRegistroH" class="inline-flex items-center justify-center text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 h-9 rounded-md px-3">
                Registrarse
            </button>
        </div>
    </header>

    <main class="px-6 py-8">
        <section class="text-center space-y-4 bg-muted text-foreground p-8 rounded-lg">
            <h1 class="text-4xl font-bold font-serif">Bienvenido a Librería Noir</h1>
            <p class="max-w-md mx-auto">
                Descubre una amplia selección de libros en blanco y negro, desde clásicos hasta las últimas novedades. Sumérgete en un mundo de lectura.
            </p>
        </section>

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
                        @for ($i = 1; $i <= 5; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 {{ $i <= $libro->calificacion ? 'text-yellow-500' : 'text-gray-400' }}" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M10 15l-3.39 1.78 0.64-3.75-2.7-2.63 3.76-0.55L10 7l1.7 3.04 3.76 0.55-2.7 2.63 0.64 3.75L10 15z" />
                            </svg>
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
        &copy; 2023 Librería Noir. Todos los derechos reservados.
    </footer>

    <script>
        document.getElementById('BtIniciarH').onclick = function() {
            window.location.href = '{{ route("login") }}'
        };
        document.getElementById('BtnRegistroH').onclick = function() {
            window.location.href = '{{ route("SignUp") }}'
        };
    </script>
</body>

</html>
