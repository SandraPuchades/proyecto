<?php

namespace App\Models;
    use Illuminate\Database\Eloquent\Model;
    use Carbon\Carbon;

class Calendario extends Model{
    protected $table = 'eventos';
    public $timestamps = false;

    function mesCalendario($mes, $numeroDias, $diaSemanal, $anyo,  $user = 1){
        $nombresMeses = [
            1 =>'Enero',
            2 =>'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 =>'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre'
        ];
        $nombreMes = $nombresMeses[$mes];
        $infoMes='';
        $infoMes.= "<div id='fecha'><button id='menos'><</button><h1>".$nombreMes."  ".$anyo."
        </h1><button id='mas'>></button> <div id='anyadir' >+</div></div>";

        $infoMes.= "<table>";

        $infoMes.= "<tr>";
        $arraySemana = ["L", "M", "X", "J", "V", "S", "D"];
        for($i=0; $i<7; $i++){
            $diaSemana=$arraySemana[$i];
            $infoMes.= "<td id='dia'> $diaSemana </td>";
        }

        $infoMes.= "</tr>";

        $infoMes.= "<tr>";
        for($i=1; $i<$diaSemanal; $i++){
            $infoMes.= "<td></td>";
        }
        for($i=1; $i<=$numeroDias; $i++){
            $infoMes.= "<td>$i";

            $fecha = Carbon::create($anyo, $mes, $i);

            $arrayEventosPrivados = $this->mostrarEventoPrivado($fecha, $user);
            foreach ($arrayEventosPrivados as $eventoDiaPrivado) {
                $infoMes .= "<br>$eventoDiaPrivado->category";
            }

            $arrayEventosPublicos = $this->mostrarEventoPublico($fecha);
            foreach ($arrayEventosPublicos as $eventoDia) {
                $infoMes .= "<br>$eventoDia->category";
            }


            $infoMes .="</td>";

            if (!(($i+$diaSemanal-1) % 7)) {
                $infoMes.= "</tr><tr>";
            }
        }
        $infoMes.= "</tr></table><br>";




        return $infoMes;
    }

    public function mostrarEventoPublico($fecha){
        try {
            $fechaStr = $fecha->toDateString();
            $eventos = Calendario::whereDate('date', $fechaStr)->get();
            $eventosTotal = $eventos->where('id_usuario', null);
            return $eventosTotal;

        } catch (\Exception $e) {
            \Log::error('Error al buscar eventos: ' . $e->getMessage());
            return [];
        }
    }

    public function mostrarEventoPrivado($fecha, $user){
        try {
            $fechaStr = $fecha->toDateString();

            $eventos = Calendario::whereDate('date', $fechaStr)->get();
            $eventosTotal = $eventos->where('id_usuario', $user);
            return $eventosTotal;

        } catch (\Exception $e) {
            \Log::error('Error al buscar eventos: ' . $e->getMessage());
            return [];
        }
    }
}
