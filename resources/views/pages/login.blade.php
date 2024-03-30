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
        <h1>TeamSports</h1>

        <section id="tipo">
            <div id="elegir">
                <h2>Log In</h2>
                <h2>Sing Up</h2>
            </div>
            <div for="cambiar" id="cambiar"></div>
        </section>

        <section id="login">
            <form method='POST' action="{{route('iniciar-sesion')}}">
            @csrf

                <h3>Log in</h3>
                <div>
                    <label for="email">email o usuario</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div>
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <button type="submit">LOGIN</button>
            </form>
        </section>

        <section id="registrar">
            <form method='POST' action="{{route('validar-registro')}}">
            @csrf
                <article id="registrar1">
                    <h3>Sing up</h3>
                    <label for="name">User Name</label>
                    <input type="text" name="name" id="name">

                    <label for="fullname">Full Name</label>
                    <input type="text" name="fullname" id="fullname">

                    <label for="emal">Email</label>
                    <input type="email" name="email" id="email">

                    <label for="contrasenya">Contraseña</label>
                    <input type="password" name="password" id="password" required>

                    <label for="confirmpassword">Confirmar Contraseña</label>
                    <input type="password" name="confirmpassword" id="confirmpassword" required>

                    <button>NEXT</button>
                </article>

                <article id="registrar2">
                    <label for="">Fecha de nacimiento</label>
                    <input type="date" name="date" id="">

                    <label for="">Alguna operación</label>
                    <label for="">Si</label>
                    <input type="radio" name="operacion" value="Si" id="">
                    <label for="">No</label>
                    <input type="radio" name="operacion" value="No" id="">

                    <label for="">Problemas de respiración</label>
                    <label for="">Si</label>
                    <input type="radio" name="problems" value="Si" id="">
                    <label for="">No</label>
                    <input type="radio" name="problems" value="No" id="">

                    <label for="name">Donde fué la operación</label>
                    <input type="text" name="whereoperation" id="whereoperation">

                    <label for="">Descripción soblre la operación</label>
                    <textarea name="description" id="" cols="30" rows="10"></textarea>

                    <button type="submit">SINGUP</button>
                </article>
            </form>
        </section>
    </main>
</body>
</html>
