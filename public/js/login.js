document.addEventListener('DOMContentLoaded', function () {
    let cambiar = document.getElementById('cambiar');
    let login = document.getElementById('login');
    let registrar = document.getElementById('registrar');
    let formularioActual = 'login';

    cambiar.addEventListener('click', function () {
        if (formularioActual === 'registrar') {
            login.style.display = 'block';
            registrar.style.display = 'none';
            formularioActual= 'login';
            login.classList.add('girar');
        } else {
            login.style.display = 'none';
            registrar.style.display = 'block';
            formularioActual= 'registrar';
            registrar.classList.add('girar');
        }
    });


});
