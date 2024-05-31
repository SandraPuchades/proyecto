<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Creacón de la migración con sus datos
     */
    public function up(): void
    {
        Schema::create('foro', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_name');
            $table->string('text');
            $table->time('time');
            $table->string('category');
            $table->bigInteger('id_padre')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('foro');
    }
};
?>
