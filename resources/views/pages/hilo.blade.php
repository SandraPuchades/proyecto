<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/chat-style.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TeamSports</title>
</head>
<body>
    @include('cabecera')
    @include('nav')
    <main>
        @foreach ( $arrayMensajePadre as $mensajePadre)
        <div id="mesajepadre">
            <div class="mensaje mensajeprincipal">
                <p class="usuario">{{$mensajePadre->user_name}}</p>
                <div class="time">
                    <p class="texto">{{$mensajePadre->text}}</p>
                    <p>{{ \Carbon\Carbon::parse($mensajePadre->time)->format('H:i') }}</p>
                </div>
            </div>
        </div>
        <div id="foro">
            @foreach ( $arrayMensajes as $mensaje)
                <div class="mensaje">
                    <p class="usuario">{{$mensaje->user_name}}</p>
                    <div class="time">
                        <p class="texto">{{$mensaje->text}}</p>
                        <p>{{ \Carbon\Carbon::parse($mensaje->time)->format('H:i') }}</p>
                    </div>
                    <hr>
                </div>
            @endforeach
        </div>
        @auth
        <form id="mensaje" method="post" action="{{route('enviarMensajeHilo', $mensajePadre->id)}}">
        <div id="formulario">
        @csrf
        <input type="hidden" name="category" value="{{$mensajePadre->category}}">
            <textarea name="text" id="text" required></textarea>
        </div>
            <button type="submit" id="submit"><img src="/imagenes/enviar.png" id="enviar" alt=""></button>
        </form>
        @endauth
        @endforeach
    </main>
    @include('footer')

</body>
</html>
