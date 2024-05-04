<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/chat-style.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/calendario.js"></script>
    <link rel="stylesheet" href="/css/calendario.css">
    <title>TeamSports</title>

</head>
<body>
    <head>
        @include('cabecera')
    </head>
    <nav>
        @include('nav')
    </nav>
    <main>
        <div id="calendario"></div>
        <div id="formulario">
            <form action="" method="post">
                <div>
                <label for="Category">Categoria:</label>
                <input type="text" name="category" id="">
                </div>
                <div>
                <label for="Category">descripción:</label>
                <input type="text" name="description" id="">
                </div>
                <div>
                <label for="Category">Hora:</label>
                <input type="time" name="time" id="">
                </div>
                <div>
                <label for="Category">Fecha:</label>
                <input type="date" name="date" id="">
                </div>
                <div>
                <button type="submit">Aceptar</button>
                <button>Cancelar</button>
                </div>
            </form>
        </div>
    </main>
    <footer>
        @include('footer')
    </footer>

</body>
</html>
