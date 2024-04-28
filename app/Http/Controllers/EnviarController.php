<?php
namespace App\Http\Controllers;
    use App\Models\Foro;
    use Illuminate\Support\Facades\Auth;
    use DateTime;
    use Illuminate\Http\Request;

class EnviarController extends Controller{

    public function enviar(Request $request){

        $text= $request->input('text');
        $usuario = Auth::user()->user_name;
        $time = new DateTime();
        $timeFormat = $time->format('G:i');

        $mensaje = new Foro();

        $mensaje->user_name = $usuario;
        $mensaje->text = $text;
        $mensaje->time = $timeFormat;
        $mensaje->save();
        return $this->mostrar();
    }

    public function mostrar(){
        $arrayMensajes = Foro::mostrarMensajes();

        return view('pages.foro', compact('arrayMensajes'));
    }
}

?>
