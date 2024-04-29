<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Foro extends Model
{
    protected $table = 'foro';
    public $timestamps = false;
    private $user_name;
    private $text;
    private $time;

    public static function mostrarMensajes($id){
        $mensaje=Foro::where('id_padre', $id)->get();
        return $mensaje;
    }
    public static function mostrarMensajePadre($id){
        $mensaje=Foro::where('id', $id)->get();
        return $mensaje;
    }
    public function getUser_name() {
        $this->user_name = $user_name;
    }

    public function setUser_name($user_name) {
        $this->user_name = $user_name;
    }
    public function getText() {
        return $this->text;
    }

    public function setText($text) {
        $this->text = $text;
    }
    public function getTime() {
        return $this->time;
    }

    public function setTime($time) {
        $this->time = $time;
    }
}
