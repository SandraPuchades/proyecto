let currentDate = new Date();
let month = currentDate.getMonth() + 1;
let year = currentDate.getFullYear();
let primerDiaMes = new Date(year, month - 1, 1);
let diasemana = primerDiaMes.getDay();


obtenerCalendario(month,year,diasemana);
function obtenerCalendario(month,year,diasemana) {
$.ajax({
    type: 'GET',
    url: '/mostarCalendario',
    data: {
        month: month,
        year: year,
        semana:diasemana
    },
    success: function(response) {
        $('#calendario').html(response);

        let menos = document.getElementById('menos');
        let mas = document.getElementById('mas');

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
        })

    },
    error: function(error) {

        console.error(error);
    }
});
}
