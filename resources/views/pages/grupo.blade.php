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
    <header>
        @include('cabecera')
    </header>
    <nav>
        @include('nav')
    </nav>
    <main>
        <div id="newgrupo">Unirme a un grupo</div>
        <div id="formulario">
            <form action="{{ route('unirseGrupo') }}" method="post">
                @csrf
                <select name="grupos" id="gruposselect">
                    <option value="">Selecciona una categoría</option>
                    @foreach ($arrayGroupSelect as $id => $grupo)
                        <option value="{{ $id }}">{{ $grupo }}</option>
                    @endforeach
                </select>
                <button type="submit">Unirse</button>
            </form>
        </div>
        <div id="infogrupos">
        @foreach ($arrayGrupos as $grupo)
                <div class="grupo">
                    <div id="titulogrupo">
                        <p class="nombregrupo">{{ $grupo->grupo }}</p>
                        <p id="eliminar">X</p>
                    </div>
                    @if(isset($arrayUsuarios[$grupo->id]))
                        <div class="tablausuario">
                            @foreach ($arrayUsuarios[$grupo->id] as $index => $nombreUsuario)
                                <div class="enlacesusuarios">
                                    <img src="{{ asset('imagenes/' . $nombreUsuario['image_path']) }}" alt="img-usuario" class="imagenUsuario">
                                    <a class="usuarios" href="{{ route('user-name', ['nombre' => $nombreUsuario['user_name']]) }}">{{ $nombreUsuario['user_name'] }}</a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </main>
    <footer>
        @include('footer')
    </footer>
    <script src="js/grupo.js"></script>
</body>
</html>
