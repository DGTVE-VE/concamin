<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth_user;

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

    public function searchUsername(Request $request){

      $username = $request['username'];

      if (isset(Auth_user::whereusername($username)->first()->username)) {
        return response()->json(['success'=>'1']);
        }else {
          return response()->json(['error'=>'0']);
      }
    }

    public function searchEmail(Request $request){

      $email = $request['email'];

      if (isset(Auth_user::whereemail($email)->first()->email)) {
        return response()->json(['success'=>'1']);
        }else {
          return response()->json(['error'=>'0']);
      }

    }
}
