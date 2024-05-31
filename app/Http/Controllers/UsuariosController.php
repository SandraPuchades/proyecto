<?php

namespace App\Http\Controllers;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Auth;
    use App\Models\Usuario;
    use Illuminate\Http\Request;

    class UsuariosController extends Controller
{

    //Obtener los datos de otro usuario
    public function getDatosUsuario($nombre){

        $user = Usuario::where('user_name', $nombre)->first();
        return view('pages.user', compact('user'));

    }
}
?>
