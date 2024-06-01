<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            <h3 id="crear">Crea tu evento</h3>
            <form action="{{route('crearEvento')}}" method="post">
            @csrf
                <div>
                    <label for="categoria">Categoria:</label>
                    <input type="text" name="category" id="category" required>
                </div>
                <div>
                    <label for="descripcion">Descripción:</label>
                    <input type="text" name="description" id="description">
                </div>
                <div>
                    <label for="hora">Hora:</label>
                    <input type="time" name="time" id="time" required>
                </div>
                <div>
                    <label for="fecha">Fecha:</label>
                    <input type="date" name="date" id="date" required>
                </div>
                <div>
                    <button type="submit" id="aceptar">Aceptar</button>
                    <button type="button" id="cancelar">Cancelar</button>
                </div>
            </form>
        </div>
    </main>
    <footer>
        @include('footer')
    </footer>
    <script src="js/evento.js"></script>
</body>
</html>
