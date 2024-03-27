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
            <section id="singup">
                <h2>Sing up</h2>
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name">
                <label for="emal">Email</label>
                <input type="text" name="email" id="email">
                <label for="contrasenya">Contraseña</label>
                <input type="password" name="contrasenya" id="contrasenya" required>
                <label for="contrasenya2">Confirmar Contraseña</label>
                <input type="password" name="contrasenya2" id="contrasenya2" required>

                <button>NEXT</button>

                <label for="">Fecha de nacimiento</label>
                <input type="date" name="" id="">
                <label for="">Alguna operación</label>
                <label for="">Si</label>
                <input type="radio" name="operacion" id="">
                <label for="">No</label>
                <input type="radio" name="operacion" id="">
                <label for="">Descripción soblre la operación</label>
                <textarea name="" id="" cols="30" rows="10"></textarea>

                <button type="submit">SINGUP</button>
            </section>
        </form>
    </main>
</body>
</html>
