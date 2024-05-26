<?php
namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Grupo_user;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GruposController extends Controller
{
    function unirseGrupo(Request $request)
    {
        $user = Auth::user()->id;
        $idGroup = $request->input('grupos');
        $grupoExistente = Grupo_user::where('id_usuario', $user)
        ->where('id_grupo', $idGroup)
        ->exists();

        if ($grupoExistente) {
            return $this->mostrarGruposUsuario();
        }

        $grupo = new Grupo_user();
        $grupo->id_usuario = $user;
        $grupo->id_grupo = $idGroup;
        $grupo->save();

        return $this->mostrarGruposUsuario();
    }

    function elimiarUsuarioGrupo(){
        $user = Auth::user()->id;
        Grupo_user::where('id_usuario', $userId)->where('id_grupo', $grupoId)->delete();
        return $this->mostrarGruposUsuario();
    }

    function mostrarGruposUsuario() {
        $user = Auth::user()->id;
        $grupoUser = Grupo_user::where('id_usuario', $user)->get();
        $idGrupos = $grupoUser->pluck('id_grupo');

        $arrayGrupos = Grupo::whereIn('id', $idGrupos)->get();
        $arrayUsuarios = [];

        foreach ($idGrupos as $groupId) {
            $usuariosIds = Grupo_user::where('id_grupo', $groupId)->pluck('id_usuario');

            foreach ($usuariosIds as $userId) {
                $usuario = User::find($userId);
                if ($usuario) {
                    $arrayUsuarios[$groupId][] = [
                        'user_name' => $usuario->user_name,
                        'image_path' => $usuario->image_path ?? 'usuario.jpg'
                    ];
                }
            }
        }

        $arrayGroupSelect = Grupo::mostrarGrupos();

        return view('pages.grupo', compact('arrayGrupos', 'arrayGroupSelect', 'arrayUsuarios'));
    }
}
