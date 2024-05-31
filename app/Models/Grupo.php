<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Grupo extends Model
{
    protected $table = 'grupos';
    public $timestamps = false;

    //Muestra los grupos que se une el usuario
    static function mostrarGruposUsuario($userId){
        $grupoUser = Grupo_user::where('id_usuario', $userId)->get();
        $idGrupos = $grupoUser->pluck('id_grupo');

        return Grupo::whereIn('id', $idGrupos)->get();
    }

    //Elimina el usuario del grupo en el cual se le ha dado a eliminar
    static function eliminarUsuarioGrupo($userId, $groupId){
        Grupo_user::where('id_usuario', $userId)->where('id_grupo', $groupId)->delete();
    }

    //Muestra la información del grupo
    static function mostrarGrupos(){
        return Grupo::pluck('grupo', 'id');
    }
}
?>
