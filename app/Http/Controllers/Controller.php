<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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
    
    public function plantelEdu($municipio)
    {
        $states = \App\Escuelas::distinct()->where('municipio', '=', $municipio)->orderBy('centro_educativo')->get(['centro_educativo']);
        return $states;
    }
    
}
