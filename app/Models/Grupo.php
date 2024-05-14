<?php

namespace App\Models;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Auth;
    use App\Models\User;
class Grupo extends Model{
    protected $table = 'grupos';
    public $timestamps = false;

    static function mostrarGruposUsuario($idGroup){
        $grupo = Grupo::where('id', $idGroup)->get();
        return $grupo;
    }
  static function mostrarGrupos(){
        $grupos = Grupo::pluck('grupo', 'id');
        return $grupos;
    }

}
