<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TeamSports</title>
</head>
<body>
    <main>
        <form method='POST' action="{{route('validar-registro')}}">
        @csrf
            <section id="login">
                <h2>Sing up</h2>
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
            </section>
        </form>
    </main>
</body>
</html>
