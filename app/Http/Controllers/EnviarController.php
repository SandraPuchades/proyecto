<?php
namespace App\Http\Controllers;
    use App\Models\Foro;
    use DateTime;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Models\Grupo;

class EnviarController extends Controller{

    // Enviar mesnaje para todos asingnadolo como nullo o se asigna el id
    // del padre si es para contenstar un hilo
    public function enviar(Request $request, $id = null){
        $user = Auth::user()->user_name;
        $groupName = $request->input('category');
        $text= $request->input('text');
        $time = new DateTime();
        $timeFormat = $time->format('G:i');
        $foro = new Foro();

        $foro->user_name = $user;
        $foro->text = $text;
        $foro->time = $timeFormat;
        $foro->id_padre = $id;
        $foro->category = $groupName;
        $foro->save();

        if ($id === null) {
            return redirect()->route('mostrar', $id);
        } else {
            return redirect()->route('hilo', $id);
        }
    }

    //Mostrar los mesjaes y los selectores para elegir el grupo
    public function mostrar($id = null){
        $arraycategorys = Grupo::mostrarGrupos();
        $arrayMensajes = Foro::mostrarMensajes($id);

        return view('pages.foro', compact('arrayMensajes','arraycategorys'));
    }

    //Mostrar el mensaje padre y los demás mensajes relacionados con este
    public function mostarPadre($id){
        $arrayMensajePadre = Foro::mostrarMensajePadre($id);
        $arrayMensajes = Foro::mostrarMensajes($id);

        return view('pages.hilo', compact('arrayMensajePadre','arrayMensajes'));
    }
}

?>
