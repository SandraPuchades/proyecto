<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/grupo.css">
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
        <div id="newgrupo">Unirme a un grupo</div>
        <div id="formulario">
        <form action="{{route('unirseGrupo')}}" method="post">
            @csrf
            <select name="grupos" id="gruposselect">
            <option value="">Selecciona una categoría</option>
                @foreach ( $arrayGroupSelect as  $id => $grupo)
                    <option value="{{$id}}">{{$grupo}}</option>
                @endforeach
            </select>
            <button type="submit">Unirse</button>
        </form>
        </div>
        <div id="infogrupos">
            @foreach ($arrayGrupos as $grupo)
                <div id="mensaje">
                    <p id="usuario-mensaje">{{$grupo->grupo}}</p> <!-- Ajusta el campo según tu estructura de datos -->
                </div>
            @endforeach
        </div>
    </main>
    <footer>
        @include('footer')
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/grupo.js"></script>
</body>
</html>