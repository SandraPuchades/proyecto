<?php
namespace App\Http\Controllers;
    use App\Models\Foro;
    use DateTime;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

class EnviarController extends Controller{

    public function enviar(Request $request, $id = null){
        $user = Auth::user()->user_name;
        $categoryId = $request->input('category');
        $text= $request->input('text');
        $time = new DateTime();
        $timeFormat = $time->format('G:i');
        $foro = new Foro();

        $foro->user_name = $user;
        $foro->text = $text;
        $foro->time = $timeFormat;
        $foro->id_padre = $id;
        $foro->save();

        if ($id === null) {
            return redirect()->route('mostrar', $id);
        } else {
            return redirect()->route('hilo', $id);
        }
    }

    public function mostrar($id = null){
        $arraycategorys = EventoController::getDatesCategory();
        $arrayMensajes = Foro::mostrarMensajes($id);

        return view('pages.foro', compact('arrayMensajes','arraycategorys'));
    }

    public function mostarPadre($id){
        $arrayMensajePadre = Foro::mostrarMensajePadre($id);
        $arrayMensajes = Foro::mostrarMensajes($id);

        return view('pages.hilo', compact('arrayMensajePadre','arrayMensajes'));
    }
}

?>
