<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ModificarUserController extends Controller
{
    //Mostrar la información del usuario autenticado
    function modificarDatos(Request $request){
        try{
            $userId = Auth::user()->id;

            $updateDatos = [];

            if($request->filled('nameuser')){
                $updateDatos['user_name'] = $request->input('nameuser');
            }else{
                $updateDatos['user_name'] = Auth::user()->user_name;
            }
            if($request->filled('fullname')){
                $updateDatos['fullname'] = $request->input('fullname');
            }else{
                $updateDatos['fullname'] = Auth::user()->fullname;
            }
            if($request->filled('email')){
                $updateDatos['email'] = $request->input('email');
            }else{
                $updateDatos['email']= Auth::user()->email;
            }
            if($request->filled('date')){
                $updateDatos['date_birth'] = $request->input('date');
            }else{
                $updateDatos['date_birth'] = Auth::user()->date_birth;
            }

            if ($request->hasFile('img')) {
                $imageName = time() . '.' . $request->img->extension();
                $request->img->move(public_path('imagenes'), $imageName);
                $updateDatos['image_path'] = $imageName;
            }else{
                $updateDatos['image_path'] = Auth::user()->image_path;
            }

            $userModelo = new Usuario();
            $userModelo->updateDatosUsuario($userId,$updateDatos);
            $user= $userModelo->getDatosUsuarioId($userId );
            return view('pages.infouser', compact('user'));
        }
        catch (\Exception $e) {
            $userModelo = new Usuario();
            $user = $userModelo->getDatosUsuarioId(Auth::user()->id);
            return view('pages.infouser', compact('user'))->with('error', 'Ya existe ese usuario o email');
        }
    }
}

