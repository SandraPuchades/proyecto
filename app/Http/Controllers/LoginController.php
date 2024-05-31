<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Grupo;
use App\Models\Grupo_user;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        try{
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
        $user->password = Hash::make($request->contrasenya);
        $user->confirm_password = Hash::make($request->confirm_password);
        $user->date_birth = $request->date_birth;
        $user->operations = $request->operations;
        $user->weight = $request->weight;

        if ($request->contrasenya === $request->confirm_password) {
            $user->save();
            $this->assignGroup($user);
            Auth::login($user);
            return redirect(route('mostrar'));
        }
        return redirect()->back()->with('password_error', 'Error');
    }
    catch (\Exception $e) {
        return redirect()->back()->with('register_error', 'Error');
    }
    }
    protected function assignGroup(User $user)
    {
        $weight = $user->weight;
        $operations = $user->operations;

        if ($operations == 'Si') {
            $group = Grupo::where('grupo', 'Nadar')->first();
        } else {
            if ($weight < 60) {
                $group = Grupo::where('grupo', 'Triatlon')->first();
            } elseif ($weight >= 60 && $weight < 80) {
                $group = Grupo::where('grupo', 'Fútbol')->first();
            } elseif ($weight >= 80 && $weight < 100) {
                $group = Grupo::where('grupo', 'Padel')->first();
            } else {
                $group = Grupo::where('grupo', 'Andar')->first();
            }
        }

        if ($group) {
            Grupo_user::create([
                'id_grupo' => $group->id,
                'id_usuario' => $user->id
            ]);
        }
    }

    //Logearse y autenticar los datos
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

    //Redirigir al login
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}
?>
