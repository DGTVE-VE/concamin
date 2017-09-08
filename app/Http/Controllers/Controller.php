<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Auth_user;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function estado()
    {
        $states = \App\Escuelas::distinct()->orderBy('entidad')->get(['entidad']);
        return $states;
    }

    public function municipio($entidad)
    {
        $states = \App\Escuelas::distinct()->where('entidad', '=', $entidad)->orderBy('municipio')->get(['municipio']);
        return $states;
    }

    public function plantelEdu($entidad, $municipio)
    {
        $states = \App\Escuelas::distinct()->where('entidad', '=', $entidad)->where('municipio', '=', $municipio)->orderBy('centro_educativo')->get(['centro_educativo']);
        return $states;
    }

    public function activaCorreo(Request $request, $correo, $hash) {
        $user = \App\Auth_user::where('email', '=', $correo)->first();
        $contracmp = explode('$', $user->password);
        $contrasenia = $contracmp[3];
        $contrasenia = str_replace('/','',$contrasenia);
        if ($user->is_active == 1) {
            $mensaje = 'Liga Expiró';
            return view('emails.correoEnviado')->with('mensaje', $mensaje);
        } else {
            if ($contrasenia == $hash) {
                $user->is_active = 1;
                $user->save();
                return Redirect::home()->with('message','¡Bienvenido! Activaste tu cuenta en Cátedra Innovatic 2.0. Ya puedes iniciar sesión');
            } else {
                $mensaje = 'Liga invalida';
                return view('emails.correoEnviado')->with('mensaje', $mensaje);
            }
        }
    }
    
    public function activacion()
    {
        return view('emails.activacion');
    }
}
