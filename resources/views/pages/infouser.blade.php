<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/infouser.css">
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
        <img src="{{ asset('imagenes/' . $user->image_path) }}" alt="img-usuario" id="imagenUsuario">
        <div id="infousu">
            <div class="info">
                <p class="datos-personales">Nombre:</p>
                <p class="datos">{{ $user->user_name }}</p>
            </div>
            <div class="info">
                <p class="datos-personales">Nombre completo:</p>
                <p class="datos">{{ $user->fullname }}</p>
            </div>
            <div class="info">
                <p class="datos-personales">Gmail:</p>
                <p class="datos">{{ $user->email }}</p>
            </div>
            <div class="info">
                <p class="datos-personales">Año de naciemiento:</p>
                <p class="datos">{{ $user->date_birth }}</p>
            </div>
        </div>
    </main>
    <footer>
        @include('footer')
    </footer>
</body>
</html>
