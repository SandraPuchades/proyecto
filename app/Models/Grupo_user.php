<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Grupo_user extends Model
{
    protected $table = 'group-user';
    public $timestamps = false;
    protected $fillable = [
        'id_grupo', 'id_usuario'
    ];

    static function unirseGrupo($userId, $groupId){
        // Verificar si el usuario ya está en el grupo
        $existingEntry = Grupo_user::where('id_usuario', $userId)->where('id_grupo', $groupId)->first();
        if ($existingEntry) {
            return false; // El usuario ya está en este grupo
        }

        // Si el usuario no está en el grupo, se une
        $grupo = new Grupo_user();
        $grupo->id_usuario = $userId;
        $grupo->id_grupo = $groupId;
        $grupo->save();

        return true;
    }

    //Muestra el grupo que esta unido el usario
    static function mostrarGrupo($userId){
        return Grupo_user::where('id_usuario', $userId)->first();
    }

    //Muestra la información del los grupos y los usuarios
    static function mostrarUsuariosGrupos($grupos){
        $arrayUsuarios = [];
        foreach ($grupos as $grupo) {
            $usuariosIds = Grupo_user::where('id_grupo', $grupo->id)->pluck('id_usuario');

            foreach ($usuariosIds as $userId) {
                $usuario = User::find($userId);
                if ($usuario) {
                    $arrayUsuarios[$grupo->id][] = [
                        'user_name' => $usuario->user_name,
                        'image_path' => $usuario->image_path ?? 'usuario.jpg'
                    ];
                }
            }
        }
        return $arrayUsuarios;
    }
}
?>
