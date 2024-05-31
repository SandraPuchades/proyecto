<?php
namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Grupo_user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GruposController extends Controller
{
    // Unirse al grupo que se elija
    function unirseGrupo(Request $request)
    {
        $user = Auth::user()->id;
        $idGroup = $request->input('grupos');

        // Verificar si el usuario ya está en el grupo
        $grupoExistente = Grupo_user::mostrarGrupo($user);
        if ($grupoExistente && $grupoExistente->id_grupo === $idGroup) {
            return redirect()->back()->with('error', 'Ya estás en este grupo.');
        }

        Grupo_user::unirseGrupo($user, $idGroup);

        return $this->mostrarGruposUsuario();
    }

    // Eliminar el usuario dependiendo del id del grupo
    function eliminarUsuarioGrupo(Request $request){
        $user = Auth::user()->id;
        $grupoId = $request->input('grupoId');
        Grupo::eliminarUsuarioGrupo($user, $grupoId);

        return response()->json(['success' => true]);
    }

    // Mostrar los grupos a los que se suscribe el usuario autenticado
    function mostrarGruposUsuario() {
        $user = Auth::user()->id;
        $arrayGrupos = Grupo::mostrarGruposUsuario($user);
        $arrayUsuarios = Grupo_user::mostrarUsuariosGrupos($arrayGrupos);

        $arrayGroupSelect = Grupo::mostrarGrupos();

        return view('pages.grupo', compact('arrayGrupos', 'arrayGroupSelect', 'arrayUsuarios'));
    }
}
?>
