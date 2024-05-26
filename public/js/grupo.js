
let anyadir = document.getElementById('newgrupo');
let formulario = document.getElementById('formulario');
let eliminar = document.getElementById('eliminar');

formulario.style.display='none';

anyadir.addEventListener('click', function () {
    formulario.style.display='block';
});

eliminar.addEventListener('click', function () {
    $.ajax({
        type: 'GET',
        url: '/calendario-pages',
        data: {
            month: month,
            year: year,
            semana:diasemana
        },}
    .then(data => {
        if (data.status === 'success') {
            alert(data.message);
            location.reload();
        }
    })
    .catch(error => console.error('Error:', error));
});
