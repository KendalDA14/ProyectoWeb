<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Categorías</h1>
        <ul class="list-group">
            @foreach($categorias as $categoria)
                <li class="list-group-item">
                    <a href="{{ route('categorias.mostrar', $categoria->id) }}">{{ $categoria->nombre }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
