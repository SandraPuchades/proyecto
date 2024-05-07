<?php
namespace App\Http\Controllers;
    use App\Models\Evento;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

class EventoController extends Controller{

    function mostarCalendario(Request $request){

        $user = Auth::user()->id;
        $mes = $request->input('month');
        $anyo = $request->input('year');
        $diaInicioMes = $request->input('semana');

        $numDiasMesActual = cal_days_in_month(CAL_GREGORIAN, $mes, $anyo);

        $evento = new Evento();

        $mesCalendario= $evento->mesCalendario($mes, $numDiasMesActual, $diaInicioMes, $anyo,  $user);

        return response()->json($mesCalendario);
    }
    static function getDatesCategory(){
        $evento = new Evento();
        $arrayCategorys = $evento->categorys();
        return $arrayCategorys;
    }

    function crearEvento(Request $request){
        $user = Auth::user()->id;
        $evento = new Evento();
        $category = $request->input('category');
        $description= $request->input('description');
        $time= $request->input('time');
        $date= $request->input('date');

        $evento->category = $category;
        $evento->description = $description;
        $evento->time = $time;
        $evento->date = $date;
        $evento->id_usuario = $user;
        $evento->save();
        $currentDate = now();
        $year = $currentDate->year;
        $month = $currentDate->month;

        return redirect()->route('mostarCalendario', ['year' => $year, 'month' => $month]);
    }
}

?>
