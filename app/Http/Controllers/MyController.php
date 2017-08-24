<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }


    public function searchState()
    {
      $states = \App\Escuelas::distinct()->get(['entidad']);
      echo $_GET['callback'] . "(" . json_encode($states) . ")";
      // return $states;

    }

    public function searchMunicipality()
    {
      $states = \App\Escuelas::distinct()->get(['entidad']);
      // echo $_GET['callback'] . "(" . json_encode($states) . ")";
      return $states;
    }

    public function searchPlantel()
    {
      $states = \App\Escuelas::distinct()->get(['entidad']);
      // echo $_GET['callback'] . "(" . json_encode($states) . ")";
      return $states;
    }
}
