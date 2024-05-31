<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Mostrar la información del usuario autenticado
    function mostrarUsuario(){
        $user = Auth::user();
        return view('pages.infouser', compact('user'));
    }
}
?>
