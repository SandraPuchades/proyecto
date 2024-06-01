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
        <img src="{{ asset('imagenes/' . Auth::user()->image_path) }}" alt="img-usuario" id="imagenUsuario">
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
                <p class="datos">{{ date('d-m-Y', strtotime($user->date_birth)) }}</p>
            </div>
        </div>
        @if (isset($error))
            <div id="errorLogin">
                <p>{{ $error }}</p>
            </div>
        @endif
        <button id="modificarboton">Modificar</button>
        <div id="formulario">
            <h3 id="modificar">Modificar datos</h3>
            <form action="{{route('modificar')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div>
                    <label for="name">Imagen</label>
                    <input type="file" name="img">
                </div>
                <div>
                    <label for="nameuser">Nambre usuario:</label>
                    <input type="text" name="nameuser">
                </div>
                <div>
                    <label for="fullname">Nombre completo:</label>
                    <input type="text" name="fullname">
                </div>
                <div>
                    <label for="fecha">Gmail:</label>
                    <input type="email" name="email">
                </div>
                <div>
                    <label for="fecha">Año de naciemiento:</label>
                    <input type="date" name="date">
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
    <script src="js/usuario.js"></script>
</body>
</html>
