document.addEventListener('DOMContentLoaded', function() {
    let modificar = document.getElementById('modificarboton');
    let formulario = document.getElementById('formulario');
    let cancelar = document.getElementById('cancelar');
    formulario.style.display = 'none';

    modificar.addEventListener('click', function () {
        formulario.style.display='block';
        document.body.style.backgroundColor = 'rgba(128, 128, 128, 0.5)';
    }),

    cancelar.addEventListener('click', function () {
        formulario.style.display='none';
        document.body.style.backgroundColor = 'white'
    })
})
