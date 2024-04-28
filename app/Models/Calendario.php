<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Calendario extends Model{


    function mesCalendario($mes,$numeroDias,$diaSemanal, $anyo){
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
        $mes='';
        $mes.= "<div id='fecha'><button id='menos'><</button><h1>".$nombreMes."  ".$anyo."
        </h1><button id='mas'>></button></div>";

        $mes.= "<table>";

        $mes.= "<tr>";
        $arraySemana = ["L", "M", "X", "J", "V", "S", "D"];
        for($i=0; $i<7; $i++){
            $diaSemana=$arraySemana[$i];
            $mes.= "<td id='dia'> $diaSemana</td>";
        }

        $mes.= "</tr>";

        $mes.= "<tr>";
        for($i=1; $i<$diaSemanal; $i++){
            $mes.= "<td></td>";
        }
        for($i=1; $i<=$numeroDias; $i++){
            $mes.= "<td>$i</td>";
            if (!(($i+$diaSemanal-1) % 7)) {
                $mes.= "</tr><tr>";
            }
        }
        $mes.= "</tr></table><br>";




        return $mes;
    }
}
