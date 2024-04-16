document.addEventListener('DOMContentLoaded', function () {
    let cambiar = document.getElementById('cambiar');
    let login = document.getElementById('login');
    let formLogin = document.getElementById('form-login');
    let formRegistrar = document.getElementById('form-registrar');
    let registrar = document.getElementById('registrar');
    let registrar2 = document.getElementById('registrar2');
    let registrar1 = document.getElementById('registrar1');
    let registrar3 = document.getElementById('registrar3');
    let next = document.getElementById('next');
    let next2 = document.getElementById('next2');
    let back = document.getElementById('back');
    let back2 = document.getElementById('back2');
    let img = document.getElementById('img');
    let formularioActual = 'login';

    cambiar.addEventListener('click', function () {
        if (formularioActual === 'registrar') {
            formularioActual= 'login';
            registrar.style.display='none';
            login.style.display='block';
            img.classList.remove('flecha2');

            login.classList.add('girar');
            formLogin.classList.add('girar2');
            img.classList.add('flecha');

        } else {
            formularioActual= 'registrar';
            login.style.display='none';
            registrar.style.display='block';
            img.classList.remove('flecha');

            registrar.classList.add('girar');
            formRegistrar.classList.add('girar2');
            img.classList.add('flecha2');
        }
    });

    next.addEventListener('click', function () {
        registrar1.style.display='none';
        registrar2.style.display='block';
    });

    next2.addEventListener('click', function () {
        registrar2.style.display='none';
        registrar3.style.display='block';
    });

    back.addEventListener('click', function () {
        registrar2.style.display='none';
        registrar1.style.display='block';
    });

    back2.addEventListener('click', function () {
        registrar3.style.display='none';
        registrar2.style.display='block';
    });

});
