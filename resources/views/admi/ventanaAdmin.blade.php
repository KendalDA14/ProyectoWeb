<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>

<body>
    <div class="absolute top-4 right-4">
        <button id="BtnVolverAdmin" class="inline-flex items-center justify-center text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 h-9 rounded-md px-3">
            Volver</button>
    </div>
    <h1>Admin</h1>
    



    <div class="absolute top-4 right-4">
        <button id="BtnCrearCateAdmin" class="inline-flex items-center justify-center text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 h-9 rounded-md px-3"
        >Crear una categoria</button>
    </div>

    <div class="absolute top-4 right-4">
        <button id="BtnCrearLibroAdmin" class="inline-flex items-center justify-center text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 h-9 rounded-md px-3"
        >Crear un libro</button>
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