<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use App\Models\Grupo;
use App\Models\Grupo_user;
use Illuminate\Database\Eloquent\Collection;

class Evento extends Model
{
    protected $table = 'eventos';
    public $timestamps = false;

    //Crear el calendiario con sus eventos y grupos suscritos por el usuario autenticado
    public function mesCalendario($mes, $numeroDias, $diaInicioMes, $anyo, $user)
    {
        App::setLocale('es');
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
        foreach ($arraySemana as $diaSemana) {
            $infoMes.= "<td id='dia'> $diaSemana </td>";
        }
        $infoMes.= "</tr>";

        $infoMes.= "<tr>";
        for ($i = 1; $i < $diaInicioMes; $i++) {
            $infoMes.= "<td id='sinnum'></td>";
        }
        for ($i = 1; $i <= $numeroDias; $i++) {
            $infoMes.= "<td id='num'>$i";

            $fecha = Carbon::create($anyo, $mes, $i);

            $diaDeLaSemana = $fecha->dayOfWeek;

            $arrayEventosGrupo = $this->mostrarEventoGrupo($diaDeLaSemana, $user);
            foreach ($arrayEventosGrupo as $eventoDiaGrupo) {
                $eventoDiaGrupo->time = substr($eventoDiaGrupo->time, 0, 5);
                $infoMes .="<div class='events'>";
                $infoMes .= "<p>$eventoDiaGrupo->grupo</p>";
                $infoMes .= "<p>$eventoDiaGrupo->time</p>";
                $infoMes .="</div>";
                $infoMes.="<hr>";
            }


            $arrayEventosPublicos = $this->mostrarEventoPublico($fecha);
            foreach ($arrayEventosPublicos as $eventoDia) {
                $eventoDia->time = substr($eventoDia->time, 0, 5);
                $infoMes .="<div class='events'>";
                $infoMes .= "<p>$eventoDia->category</p>";
                $infoMes .= "<p>$eventoDia->time</p>";
                $infoMes .="</div>";
                $infoMes .= "<p>$eventoDia->description</p>";
                $infoMes.="<hr>";
            }

            $infoMes .="</td>";

            if (!(($i + $diaInicioMes - 1) % 7)) {
                $infoMes.= "</tr><tr>";
            }
        }
        $infoMes.= "</tr></table><br>";

        return $infoMes;
    }

    //Mostrar los eventos de los grupos suscritos
    public function mostrarEventoGrupo($diaSemana, $usuario)
    {

        try {
            $diasSemana = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
            $diaSemanaStr = $diasSemana[$diaSemana];

            $gruposUsuario = Grupo_user::where('id_usuario', $usuario)->pluck('id_grupo');

            $gruposEnDia = Grupo::whereIn('id', $gruposUsuario)->where('horario', $diaSemanaStr)->get();

            return $gruposEnDia;

        } catch (\Exception $e) {
            \Log::error('Error al buscar eventos: ' . $e->getMessage());
            return new Collection();
        }
    }

    //Mostrar los eventos que crea el usuario
    public function mostrarEventoPublico($fecha)
    {
        try {
            $fechaStr = $fecha->toDateString();

            $eventos = Evento::whereDate('date', $fechaStr)->get();
            return $eventos;

        } catch (\Exception $e) {
            \Log::error('Error al buscar eventos: ' . $e->getMessage());
            return new Collection();
        }
    }

    //Obtener las categorías
    public function categorys()
    {
        $datos = Evento::pluck('category', 'id');
        return $datos;
    }
}
?>
