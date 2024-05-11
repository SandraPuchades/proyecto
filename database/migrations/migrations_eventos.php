<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Evento;
use Carbon\Carbon;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            if (!Schema::hasTable('eventos')) {
            Schema::create('eventos', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('category');
                $table->string('description');
                $table->time('time');
                $table->date('date');
                $table->bigInteger('id_usuario')->unsigned()->nullable();
                $table->foreign('id_usuario')->references('id')->on('users');
            }, ['engine' => 'InnoDB']);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
