<?php
namespace App\Http\Controllers;
    use App\Models\Calendario;
    use Illuminate\Http\Request;
class CalendarioController extends Controller{

    function mostarCalendario(Request $request){

        $mes = $request->input('month');
        $anyo = $request->input('year');
        $diaInicioMes = $request->input('semana');

        $numDiasMesActual = cal_days_in_month(CAL_GREGORIAN, $mes, $anyo);

        $calendario = new Calendario();

        $mesCalendario= $calendario->mesCalendario($mes,$numDiasMesActual,$diaInicioMes, $anyo);

        return response()->json($mesCalendario);
    }
}

?>
