<!DOCTYPE html>
<html lang="es">

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
            <nav class="hidden md:flex items-center gap-4">
                <a href="{{ route('libros.index') }}" class="hover:text-primary-foreground">Categorías</a>
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
        <section class="text-center space-y-6 bg-muted text-foreground p-8 rounded-lg">
            <h1 class="text-4xl font-bold font-serif">Bienvenido a Librería Online</h1>
            <p class="max-w-md mx-auto">
                Descubre una amplia selección de libros, desde clásicos hasta las últimas novedades.
            </p>
            Con nosotros podras descargar todos los libros gratos.
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
    <main class="px-4 py-8">
        <section class="text-center space-y-4 bg-muted text-foreground p-8 rounded-lg max-w-2xl mx-auto">
            <h3 class="text-2xl font-bold font-serif">¿Quieres que traigamos un libro en específico?</h3>
            <p class="max-w-md mx-auto mb-6">
                Envíanos un mensaje con el nombre del libro, el autor, y el motivo por el que deberíamos agregarlo y
                haremos lo posible por traerlo a nuestra librería.
            </p>
            <form id="Formulario" class="max-w-md mx-auto space-y-7">
                <input id="name" class="w-full p-2 rounded border" type="text" placeholder="Tu nombre" required>
                <input id="book_name" class="w-full p-2 rounded border" type="text" placeholder="Nombre del libro" required>
                <input id="author" class="w-full p-2 rounded border" type="text" placeholder="Autor del libro" required>
                <textarea id="reason" class="w-full p-2 rounded border" placeholder="Motivo" required></textarea>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Enviar</button>
            </form>
            <p id="Mensaje" class="hidden max-w-md mx-auto bg-green-100 text-green-700 border border-green-300 rounded-lg p-4 shadow-md">
                Enviado
            </p>
        </section>
    </main>


    <footer class="bg-muted py-6 text-center text-muted-foreground">
        &copy; 2024 Librería Online. Todos los derechos reservados.
    </footer>

    <script>
        document.getElementById('BtIniciarH').onclick = function() {
            window.location.href = '{{ route("login") }}'
        };
        document.getElementById('BtnRegistroH').onclick = function() {
            window.location.href = '{{ route("SignUp") }}'
        };

        document.getElementById('Formulario').addEventListener('submit', function(event) {
            event.preventDefault();
            document.getElementById('Formulario').reset();
            document.getElementById('Mensaje').classList.remove('hidden');
            setTimeout(function() {
                document.getElementById('Mensaje').classList.add('hidden');
            }, 3000);
        });
    </script>
</body>

</html>