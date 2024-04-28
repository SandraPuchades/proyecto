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
    <main id="calendario">

    </main>
    <footer>
        @include('footer')
    </footer>

</body>
</html>
