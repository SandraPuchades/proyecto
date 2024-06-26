let currentDate = new Date();
let month = currentDate.getMonth() + 1;
let year = currentDate.getFullYear();
let primerDiaMes = new Date(year, month - 1, 1);
let diasemana = primerDiaMes.getDay();

obtenerCalendario(month,year,diasemana);

function obtenerCalendario(month,year,diasemana) {
$.ajax({
    type: 'GET',
    url: '/calendario-pages',
    data: {
        month: month,
        year: year,
        semana:diasemana
    },
    success: function(response) {
        $('#calendario').html(response);

        let menos = document.getElementById('menos');
        let mas = document.getElementById('mas');
        let anyadir = document.getElementById('anyadir');
        let formulario = document.getElementById('formulario');
        let cancelar = document.getElementById('cancelar');

        formulario.style.display='none';

        menos.addEventListener('click', function () {
            if (month === 1) {
                month = 12;
                year -=1;
            }else{
                month -= 1;
            }
            primerDiaMes = new Date(year, month - 1, 1);
            diasemana = primerDiaMes.getDay();
            obtenerCalendario(month,year,diasemana);
        }),

        mas.addEventListener('click', function () {
            if (month === 12) {
                month = 1;
                year +=1;
            }else{
                month += 1;
            }
            primerDiaMes = new Date(year, month - 1, 1);
            diasemana = primerDiaMes.getDay();
            obtenerCalendario(month,year,diasemana);
        }),

        anyadir.addEventListener('click', function () {
            formulario.style.display='block';
            document.body.style.backgroundColor = 'rgba(128, 128, 128, 0.5)';
        }),

        cancelar.addEventListener('click', function () {
            formulario.style.display='none';
            document.body.style.backgroundColor = 'white'
        })

    },
    error: function(error) {

        console.error(error);
    }
});
}
