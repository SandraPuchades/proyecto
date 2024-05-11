<?php
namespace App\Http\Controllers;
    use App\Models\Grupo;
    use App\Models\Grupo_user;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;

class GruposController extends Controller{

    function unirseGrupo(Request $request){
        $user = Auth::user()->id;
        $idGroup = $request->input('grupos');

        $grupo = new Grupo_user();
        $grupo->id_usuario = $user;
        $grupo->id_grupo = $idGroup;
        $grupo->save();


        return $this->mostrarGruposUsuario();
    }

    function mostrarGruposUsuario(){
        $user = Auth::user()->id;

    // Obtener todos los grupos a los que pertenece el usuario
    $grupoUser = Grupo_user::where('id_usuario', $user)->get();

    // Crear un array para almacenar los IDs de los grupos
    $idGrupos = $grupoUser->pluck('id_grupo');

    // Obtener los detalles de los grupos a partir de los IDs
    $arrayGrupos = Grupo::whereIn('id', $idGrupos)->get();

    $arrayGroupSelect = Grupo::mostrarGrupos();
    return view('pages.grupo', compact('arrayGrupos','arrayGroupSelect'));
    }
}

?>
