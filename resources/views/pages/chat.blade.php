<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/chat-style.css">
    <title>TeamSports</title>
</head>
<body>
    @include('cabecera')
    <main>
        <form action="{{route('buscar-usuario')}}" method="post">
            <input type="text" name="usuario" id="">
        </form>
    </main>
    @include('footer')
</body>
</html>
