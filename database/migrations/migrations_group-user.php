<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Grupo;
use Carbon\Carbon;
return new class extends Migration
{
   /**
     * Creacón de la migración con sus datos y claves foraneas id_grupo y id_usuario
     */
    public function up(): void
    {
            if (!Schema::hasTable('group-user')) {
            Schema::create('group-user', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('id_grupo')->unsigned();
                $table->bigInteger('id_usuario')->unsigned();
                $table->foreign('id_grupo')->references('id')->on('grupos');
                $table->foreign('id_usuario')->references('id')->on('users');
            }, ['engine' => 'InnoDB']);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('group-user');
    }
};
?>
