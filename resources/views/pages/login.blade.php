<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/principal-style.css">
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
            <div for="cambiar" id="cambiar"><img src="imagenes/flecha.png" alt="flecha" id="img"></div>
        </section>

        <section id="login">
            <form method='POST' action="{{route('iniciar-sesion')}}" id="form-login">
            @csrf

                <h3 id="titulo">Log in</h3>
                <div id="email">
                    <label for="email">email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div>
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" required>
                </div>
                @if (session('error'))
                    <div id="errorLogin">
                        <p>Contraseña o email incorrectos</p>
                    </div>
                @endif
                <button id="buttonlogin" type="submit">LOGIN</button>
            </form>
        </section>

        <section id="registrar">
            <form method='POST' action="{{route('validar-registro')}}" enctype="multipart/form-data"  id="form-registrar">
            @csrf
                <h3>Sing up</h3>
                <article id="registrar1">
                    <div>
                        <label for="user_name">User Name</label>
                        <input type="text" name="user_name" id="name">
                    </div>
                    <div>
                        <label for="fullname">Full Name</label>
                        <input type="text" name="fullname" id="fullname">
                    </div>
                    <div>
                        <label for="emal">Email</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div id="next">next</div>
                </article>

                <article id="registrar2">
                    <div>
                        <label for="contrasenya">Contraseña</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div>
                        <label for="confirm_password">Confirmar Contraseña</label>
                        <input type="password" name="confirm_password" id="confirmpassword" required>
                    </div>
                    <div>
                        <label for="">Fecha de nacimiento</label>
                        <input type="date" name="date_birth" id="">
                    </div>
                    <div>
                        <label for="">Alguna operación :</label>
                        <label for="">Si</label>
                        <input type="radio" name="operations" value="Si" id="">
                        <label for="">No</label>
                        <input type="radio" name="operations" value="No" id="">
                    </div>
                    <div id="back">back</div>
                    <div id="next2">next</div>
                </article>

                <article id="registrar3">

                    <label for="name">Imagen</label>
                    <input type="file" name="img" id="">

                    <label for="">Descripción soblre la operación</label>
                    <textarea name="description" id="" cols="30" rows="10"></textarea>
                    <div id="back2">back</div>
                    <button type="submit">SINGUP</button>
                </article>
            </form>
        </section>
    </main>
</body>
</html>
