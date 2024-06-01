<?php

namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

class Usuario extends Model{
    protected $table = 'users';
    public $timestamps = false;

    public function getDatosUsuario($nombre){

        $user = Usuario::where('user_name', $nombre)->first();
        return $user;
    }
    public function updateDatosUsuario($userId, $datosActualizar){

        return Usuario::where('id', $userId)->update($datosActualizar);
    }
    public function getDatosUsuarioId($userId){

        $user = Usuario::where('id', $userId)->first();
        return $user;
    }
}
?>
