<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Creacón de la migración con sus datos y usuario creado por defecto y user_name y email son unicos
     */
    public function up(): void
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('user_name')->unique();
                $table->string('fullname');
                $table->string('email')->unique();
                $table->string('password');
                $table->string('confirm_password');
                $table->string('date_birth');
                $table->string('weight');
                $table->string('operations');
                $table->string('image_path')->nullable();
                $table->timestamps();
            });

            // Crear el primer usuario
            $user = new User();
            $user->user_name = 'root';
            $user->fullname = 'root';
            $user->email = 'root@gmail.com';
            $user->password = bcrypt('root');
            $user->confirm_password = bcrypt('root');
            $user->date_birth = '1990-01-01';
            $user->operations = 'si';
            $user->weight = '50';
            $user->image_path = 'usuario.jpg';
            $user->save();
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
?>
