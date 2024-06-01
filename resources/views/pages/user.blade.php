<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/user.css">
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
        <div id="container">
            <div>
                @auth
                <img src="{{ asset('imagenes/' . $user->image_path) }}" alt="img-usuario" id="imagenUsuario">
                @endauth
            </div>
            <div id="container-info">
                <div class="info">
                    <p class="datos-personales">Nombre:</p>
                    <p class="datos">{{ $user->user_name }}</p>
                </div>
                <div class="info">
                    <p class="datos-personales">Email:</p>
                    <p class="datos">{{ $user->email }}</p>
                </div>
                <div class="info">
                    <p class="datos-personales">Fecha de nacimiento:</p>
                    <p class="datos">{{ date('d-m-Y', strtotime($user->date_birth)) }}</p>
                </div>
            </div>
        </div>
    </main>
    <footer>
        @include('footer')
    </footer>
</body>
</html>
