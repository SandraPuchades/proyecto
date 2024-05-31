<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Foro extends Model {
    protected $table = 'foro';
    public $timestamps = false;
    private $user_name;
    private $text;
    private $time;
    private $id_padre;
    private $category;

    //Mostrar los mensajes del padre
    public static function mostrarMensajes($id){
        $mensaje=Foro::where('id_padre', $id)->get();
        return $mensaje;
    }
    //Mostrar los mensjaes dependiendo del id
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

    public function getId_padre() {
        return $this->id_padre;
    }

    public function setId_padre($id_padre) {
        $this->id_padre = $id_padre;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category = $category;
    }
}
?>
