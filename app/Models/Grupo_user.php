<?php

namespace App\Models;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Auth;

class Grupo_user extends Model{
    protected $table = 'group-user';
    public $timestamps = false;

    static function mostrarGrupo(){
        $user = Auth::user()->id;
        $grupoUser = Grupo_user::where('id_usuario', $user)->first();
        if ($grupoUser) {
            return $grupoUser->id_grupo;
        }
    }


}
