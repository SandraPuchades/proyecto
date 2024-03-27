<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TeamSports</title>
</head>
<body>
    <header>
        <h1>@auth
            {{Auth::user('name')}}
        @endauth</h1>

        <a href="{{route('login')}}">logout</a>
    </header>
</body>
</html>
