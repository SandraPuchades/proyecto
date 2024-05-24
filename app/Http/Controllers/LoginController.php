<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        // FALTA Validar datos

        $user = new User();

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('imagenes'), $imageName);
            $user->image_path = $imageName;
        } else {
            $user->image_path = 'usuario.jpg';
        }

        $user->user_name = $request->user_name;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->confirm_password = Hash::make($request->confirm_password);
        $user->date_birth = $request->date_birth;
        $user->operations = $request->operations;
        $user->description = $request->description;

        if ($request->password === $request->confirm_password) {
            $user->save();
            Auth::login($user);
            return redirect(route('mostrar'));
        }

        return 'error';
    }

    public function login(Request $request)
    {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('mostrar'));
        } else {
            return redirect()->route('login')->with('error', 'Contraseña o email incorrectos');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}
