<?php
namespace App\Http\Controllers;
    use App\Models\Evento;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

class EventoController extends Controller{

    function mostrarCalendario(Request $request){

        $user = Auth::user()->id;
        $month = $request->input('month');
        $year = $request->input('year');
        $diaInicioMes = $request->input('semana');
        if(!$month && !$year){
            $currentDate = now();
            $year = $currentDate->year;
            $month = $currentDate->month;
        }
        $numDiasMesActual = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        $evento = new Evento();

        $mesCalendario= $evento->mesCalendario($month, $numDiasMesActual, $diaInicioMes, $year,  $user);

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

        return redirect()->route('calendario');
    }
}

?>
