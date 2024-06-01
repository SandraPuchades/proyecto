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
                <h2>Registrarse</h2>
            </div>
            <div for="cambiar" id="cambiar"><img src="imagenes/flecha.png" alt="flecha" id="img"></div>
        </section>

        <section id="login">
            <form method='POST' action="{{route('iniciar-sesion')}}" id="form-login">
            @csrf

                <h3 id="titulo">Log in</h3>
                <div id="email">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email_login" required>
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
                <h3>Registrarse</h3>
                <article id="registrar1">
                    <div>
                        <label for="user_name">Nombre usuario</label>
                        <input type="text" name="user_name" id="name">
                    </div>
                    <div>
                        <label for="fullname">Nombre completo</label>
                        <input type="text" name="fullname" id="fullname">
                    </div>
                    <div>
                        <label for="emal">Email</label>
                        <input type="email" name="email" id="email">
                    </div>
                    @if (session('register_error'))
                        <div id="errorLogin">
                            <p>Inserte otro usuario o email</p>
                        </div>
                    @endif
                    @if (session('password_error'))
                        <div id="errorLogin">
                            <p>Las contraseñas no son identicas</p>
                        </div>
                    @endif

                    <div class="buttons">
                        <p id="next">Next</p>
                    </div>
                </article>

                <article id="registrar2">
                    <div>
                        <label for="contrasenya">Contraseña</label>
                        <input type="password" name="contrasenya" id="contrasenya" required>
                    </div>
                    <div>
                        <label for="confirm_password">Confirmar Contraseña</label>
                        <input type="password" name="confirm_password" id="confirmpassword" required>
                    </div>
                    <div>
                        <label for="">Fecha de nacimiento</label>
                        <input type="date" name="date_birth">
                    </div>
                    <div class="buttons">
                        <p id="back">Back</p>
                        <p id="next2">Next</p>
                    </div>

                </article>

                <article id="registrar3">
                    <div>
                        <label for="weight">Peso</label>
                        <input type="text" name="weight" id="weight">
                    </div>
                    <div>
                        <label for="name">Imagen</label>
                        <input type="file" name="img">
                    </div>
                    <div>
                        <label for="">Alguna operación :</label>
                        <label for="">Si</label>
                        <input type="radio" name="operations" value="Si">
                        <label for="">No</label>
                        <input type="radio" name="operations" value="No">
                    </div>

                    <div class="buttons">
                        <p id="back2">Back</p>
                    </div>
                    <button type="submit">Registrarse</button>
                </article>
            </form>
        </section>
    </main>
</body>
</html>
