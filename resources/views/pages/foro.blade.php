<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/chat-style.css">
    <script src="js/foro.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        <div id="foro">
            @foreach ( $arrayMensajes as $mensaje)
            <div class="mensaje">
                <div class="time">
                    <p class="usuario-mensaje">{{$mensaje->user_name}}</p>
                    <p id="texto">{{$mensaje->category}}</p>
                </div>
                <p id="texto">{{$mensaje->text}}</p>

                <div class="time">
                    <a href="{{route('hilo', $mensaje->id)}}">Responder</a>
                    <p>{{$mensaje->time}}</p>
                </div>
                <hr>
            </div>
            @endforeach
        </div>
        @auth
        <form  method="post" action="{{route('enviarMensajeHilo')}}">
        @csrf
        <div id="formulario">
            <select name="category" id="categoria" required>
                <option value="">Selecciona una categoría</option>
                @foreach ( $arraycategorys as $category)
                    <option value="{{$category}}">{{$category}}</option>
                @endforeach
            </select>
            <textarea name="text" id="text" required></textarea>
        </div>
            <button type="submit" id="submit"><img src="/imagenes/enviar.png" id="enviar" alt=""></button>
        </form>
        @endauth
    </main>
    <footer>
        @include('footer')
    </footer>

</body>
</html>
