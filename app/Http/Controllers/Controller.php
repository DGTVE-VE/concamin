<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
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
        $states = \App\Escuelas::distinct()->where('entidad', '=', $entidad)->where('municipio', '=', $municipio)->orderBy('centro_educativo')->get();
        return $states;
    }

    public function activaCorreo(Request $request, $correo, $hash) {
        $user = \App\Auth_user::where('email', '=', $correo)->first();
        $contracmp = explode('$', $user->password);
        $contrasenia = $contracmp[3];
        $contrasenia = str_replace('/','',$contrasenia);
        if ($user->is_active == 1) {
            return view('registro.ligaInvalida');
        } else {
            if ($contrasenia == $hash) {
                $user->is_active = 1;
                $user->save();
                return view('registro.activada');
            } else {
                return view('registro.ligaInvalida');
            }
        }
    }

    public function activacion()
    {
        $correo = Auth::user()->email;
        $valorActivo = \App\Auth_user::whereemail($correo)->first()->is_active;
        Auth::logout();
        if($valorActivo==0){
            return view('registro.correoEnviado');
        }
        if($valorActivo==1){
            return view('registro.activada');
        }
    }
}
