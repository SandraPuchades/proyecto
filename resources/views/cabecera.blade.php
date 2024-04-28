<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/cabecera-style.css">
    <title>TeamSports</title>
</head>
<body>
    <header>
        <h1>TeamSports</h1>
        <div id="usuario">
            <h2>@auth
            {{Auth::user()->user_name}}
            @endauth</h2>


            <a href="{{route('login')}}"><img src="/imagenes/exit.png" alt=""></a>
        </div>

    </header>
</body>
</html>
