<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function register(Request $request){

        //FALTA Validar datos

        $user = new User();

        $user-> name = $request->name;
        $user-> fullname = $request->fullname;
        $user-> email = $request->email;
        $user-> password = Hash::make($request->password);
        $user-> confirmpassword = Hash::make($request->confirmpassword);
        $user-> date = $request->date;
        $user-> operacion = $request->operacion;
        $user-> problems = $request->problems;
        $user-> whereoperation = $request->whereoperation;
        $user-> description = $request->description;

        if( $request->password ===  $request->confirmpassword){
            $user->save();
            Auth::login($user);

            return redirect(route('principal'));
        }
        return 'error';

    }

    public function login(Request $request){

        //Validación

        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
            //"active" => true
        ];

        if(Auth::attempt($credentials)){

            $request->session()->regenerate();

            return redirect()->intended(route('principal'));

        }else{
            return redirect(route('login'));
        }

    }


    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }

}
