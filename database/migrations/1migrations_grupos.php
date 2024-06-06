<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Grupo;
use Carbon\Carbon;
return new class extends Migration
{
    /**
     * Creacón de la migración con sus datos y grupos creados por defecto
     */
    public function up(): void
    {
            if (!Schema::hasTable('grupos')) {
            Schema::create('grupos', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('grupo')->unique();
                $table->string('horario');
                $table->time('time');
            });

            $grupo = new Grupo();
            $grupo->grupo = 'Correr';
            $grupo->horario = 'Lunes';
            $grupo->time = '7:00';

            $grupo->save();

            $grupo = new Grupo();
            $grupo->grupo = 'Nadar';
            $grupo->horario = 'Martes';
            $grupo->time = '17:00';

            $grupo->save();

            $grupo = new Grupo();
            $grupo->grupo = 'Andar';
            $grupo->horario = 'Martes';
            $grupo->time = '20:00';

            $grupo->save();

            $grupo = new Grupo();
            $grupo->grupo = 'Kunfu';
            $grupo->horario = 'Jueves';
            $grupo->time = '18:00';

            $grupo->save();

            $grupo = new Grupo();
            $grupo->grupo = 'Fútbol';
            $grupo->horario = 'Sabados';
            $grupo->time = '9:00';

            $grupo->save();

            $grupo = new Grupo();
            $grupo->grupo = 'Padel';
            $grupo->horario = 'Lunes';
            $grupo->time = '16:00';

            $grupo->save();

            $grupo = new Grupo();
            $grupo->grupo = 'Triatlon';
            $grupo->horario = 'Domingo';
            $grupo->time = '17:00';

            $grupo->save();

            $grupo = new Grupo();
            $grupo->grupo = 'Tenis';
            $grupo->horario = 'Viernes';
            $grupo->time = '15:00';

            $grupo->save();

            $grupo = new Grupo();
            $grupo->grupo = 'Gimnasio';
            $grupo->horario = 'Martes';
            $grupo->time = '18:00';

            $grupo->save();
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};
?>
