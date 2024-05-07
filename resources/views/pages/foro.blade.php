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
    @include('cabecera')
    @include('nav')
    <main>
        <div id="foro">
            @foreach ( $arrayMensajes as $mensaje)
            <div id="mensaje">
                <p id="usuario-mensaje">{{$mensaje->user_name}}</p>
                <p id="texto">{{$mensaje->text}}</p>
                <div id="time">
                    <a href="{{route('hilo', $mensaje->id)}}">Responder</a>
                    <p>{{$mensaje->time}}</p>
                </div>
                <hr>
            </div>
            @endforeach
        </div>
        @auth
        <form id="mensaje" method="post" action="{{route('enviarMensajeHilo')}}">
        @csrf
            <select name="idCategory" id="category">
                <option value="">Selecciona una categoría</option>
                @foreach ( $arraycategorys as  $id => $category)
                    <option value="{{$id}}">{{$category}}</option>
                @endforeach
            </select>
            <textarea name="text" id="text"></textarea>
            <button type="submit">Enviar</button>
        </form>
        @endauth
    </main>
    @include('footer')

</body>
</html>
