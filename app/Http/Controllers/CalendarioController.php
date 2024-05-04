<?php
namespace App\Http\Controllers;
    use App\Models\Calendario;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

class CalendarioController extends Controller{

    function mostarCalendario(Request $request){

        $user = Auth::user()->id;
        $mes = $request->input('month');
        $anyo = $request->input('year');
        $diaInicioMes = $request->input('semana');

        $numDiasMesActual = cal_days_in_month(CAL_GREGORIAN, $mes, $anyo);

        $calendario = new Calendario();

        $mesCalendario= $calendario->mesCalendario($mes, $numDiasMesActual, $diaInicioMes, $anyo,  $user);

        return response()->json($mesCalendario);
    }
}

?>
