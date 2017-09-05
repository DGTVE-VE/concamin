<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth_user;
use App\Auth_userprofile;
use App\Users;

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
        if (isset(Users::whereemail($email)->first()->email)) {
            return response()->json(['success'=>'2']);
        }
        else{
            if (isset(Auth_user::whereemail($email)->first()->email)) {
                return response()->json(['success'=>'1']);
            }else {
                return response()->json(['error'=>'0']);
            }
        }
    }

    protected function password(Request $request){

      $pws = $request['pwd'];
      $email = $request['email'];


      if (isset(Auth_user::whereemail($email)->first()->email)) {

        $auth_user = Auth_user::whereemail($email)->first();

        $pass = $auth_user->password;
        $pass = explode("$", $pass);

        $password =  base64_encode(hash_pbkdf2 ("SHA256", $pws, $pass[2], $pass[1],0,True));

        if( $password == $pass[3]){

          $username = $auth_user->username;
          $id = $auth_user->id;

          $auth_userprofile = Auth_userprofile::whereuser_id($id)->first();
          $name = $auth_userprofile->name;
          $gender = $auth_userprofile->gender;
          $year_of_birth = $auth_userprofile->year_of_birth;
          $level_of_education = $auth_userprofile->level_of_education;
          $mailing_address = $auth_userprofile->mailing_address;
          $country = $auth_userprofile->country;

          return response()->json(['success'=>'1',
                  'username' => $username,
                   'name' => $name,
                   'gender' => $gender,
                   'year_of_birth' => $year_of_birth,
                   'level_of_education' => $level_of_education,
                   'mailing_address' => $mailing_address,
                   'country' => $country]);
        }
        else {
          return response()->json(['success'=>'0']);
        }

      }else {
        return response()->json(['error'=>'0']);
      }

      $psw = hash_pbkdf2 ("SHA256", $data['password'], $salt, $itera, 0,True);
    }
}
