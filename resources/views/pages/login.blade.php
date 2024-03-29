<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <title>TeamSports</title>
    <script src="js/login.js"></script>
</head>
<body>
    <main>
        <h2>log in</h2>
        <h2>Sing Up</h2>
        <div for="myCheckbox" id="custom-checkbox"></div>

        <form method='POST' action="{{route('iniciar-sesion')}}">
        @csrf
            <section id="login">
                    <h1>Log in</h1>
                    <div>
                        <label for="email">email o usuario</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div>
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <button type="submit">LOGIN</button>
            </section>
        </form>
    </main>
</body>
</html>
