<?php
namespace App\Http\Controllers;
    use App\Models\Grupo;
    use App\Models\Grupo_user;
    use App\Models\User;
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

    $grupoUser = Grupo_user::where('id_usuario', $user)->get();

    $idGrupos = $grupoUser->pluck('id_grupo');

    $arrayGrupos = Grupo::whereIn('id', $idGrupos)->get();
    $grupo = Grupo::find($idGrupos);

    $arrayUsuarios = [];

    foreach ($idGrupos as $groupId) {
        $usuariosIds = Grupo_user::where('id_grupo', $groupId)->pluck('id_usuario');

        foreach ($usuariosIds as $userId) {
            $usuario = User::find($userId);
            if ($usuario) {
                $arrayUsuarios[$groupId][] = $usuario->user_name;
            }
        }
    }
    $arrayGroupSelect = Grupo::mostrarGrupos();

    return view('pages.grupo', compact('arrayGrupos','arrayGroupSelect', 'arrayUsuarios'));
    }
}

?>
