<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Grupo;
use Carbon\Carbon;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            if (!Schema::hasTable('grupos')) {
            Schema::create('grupos', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('grupo');
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
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};
