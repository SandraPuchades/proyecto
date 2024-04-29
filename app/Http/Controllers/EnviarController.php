<?php
namespace App\Http\Controllers;
    use App\Models\Foro;
    use Illuminate\Support\Facades\Auth;
    use DateTime;
    use Illuminate\Http\Request;

class EnviarController extends Controller{

    public function enviar(Request $request, $id = null){

        $text= $request->input('text');
        $usuario = Auth::user()->user_name;
        $time = new DateTime();
        $timeFormat = $time->format('G:i');

        $mensaje = new Foro();

        $mensaje->user_name = $usuario;
        $mensaje->text = $text;
        $mensaje->time = $timeFormat;
        $mensaje->id_padre = $id;
        $mensaje->save();

        if ($id === null) {
            return redirect()->route('mostrar', $id);
        } else {
            return redirect()->route('hilo', $id);
        }
    }

    public function mostrar($id = null){
        $arrayMensajes = Foro::mostrarMensajes($id);

        return view('pages.foro', compact('arrayMensajes'));
    }

    public function mostarPadre($id){
        $arrayMensajePadre = Foro::mostrarMensajePadre($id);
        $arrayMensajes = Foro::mostrarMensajes($id);

        return view('pages.hilo', compact('arrayMensajePadre','arrayMensajes'));
    }
}

?>
