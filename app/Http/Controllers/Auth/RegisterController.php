<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Auth_user;
use App\Auth_userprofile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
      if($data['is_student'] == 1){
        return Validator::make($data, [
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'dateOfBirth' => 'required|date',
            'gender' => 'required',
            'country' => 'required|string',
            'cp' => 'required|integer|min:1000|max:99999',
            'state' => 'required|string',
            'municipality' => 'string',
            'is_student' => 'required|integer|min:0|max:1',
            'mode' => 'string',
            'grade' => 'integer|min:1|max:15',
            'level_of_education' => 'string',
            'country_study' => 'string',
            'state_study' => 'string',
            'municipality_study' => 'string',
            'plantelEducativo' => 'string',
            'degree' => 'string',
        ]);
      }
      else{
        return Validator::make($data, [
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'dateOfBirth' => 'required|date',
            'gender' => 'required',
            'country' => 'required|string',
            'cp' => 'required|integer|min:1000|max:99999',
            'state' => 'required|string',
            'municipality' => 'string',
            'is_student' => 'required|integer|min:0|max:1',
            'grade' => 'integer|min:1|max:15',
            'degree' => 'string',
        ]);
      }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      $salt = substr(md5(uniqid()),1,12);
      $itera = '20000';
      $psw = hash_pbkdf2 ("SHA256", $data['password'], $salt, $itera, 0,True);

      print_r(Auth_user::whereemail($data['email'])->first());

      if(empty(Auth_user::whereemail($data['email'])->first())){

          if(empty(Auth_user::whereusername($data['username'])->first())){
            print_r(base64_encode($psw));
            $auth_user = new Auth_user;
            $auth_user->username = $data['username'];
            $auth_user->first_name = '';
            $auth_user->last_name = '';
            $auth_user->is_active = '0';
            $auth_user->is_staff = '0';
            $auth_user->is_superuser = '0';
            $auth_user->email = $data['email'];
            $auth_user->password = 'pbkdf2_sha256$'.$itera.'$'.$salt.'$'.base64_encode($psw);
            $auth_user->last_login = date("Y-m-d H:i:s");
            $auth_user->date_joined = date("Y-m-d H:i:s");
            $auth_user->save();
            print_r("Error1");

            $auth_userprofile = new Auth_userprofile;
            $auth_userprofile->user_id = $auth_user->id;
            $auth_userprofile->name = $data['name'];
            $auth_userprofile->language = '';
            $auth_userprofile->location = '';
            $auth_userprofile->meta = '{"session_id": null}';
            $auth_userprofile->courseware = 'course.xml';
            $auth_userprofile->gender = $data['gender'];
            $auth_userprofile->mailing_address = $data['cp'];
            $auth_userprofile->year_of_birth = substr($data['dateOfBirth'], 0, 4);
            $auth_userprofile->level_of_education = $data['level_of_education'];
            $auth_userprofile->goals = '';
            $auth_userprofile->allow_certificate = '1';
            $auth_userprofile->country = $data['country'];
            $auth_userprofile->city = $data['state'];
            $auth_userprofile->save();
            print_r("Error2");


            return User::create([
                'username' => $data['username'],
                'user_id' => $auth_user->id,
                'is_student' => $data['is_student'],
                'email' => $data['email'],
                'password' => 'pbkdf2_sha256$'.$itera.'$'.$salt.'$'.base64_encode($psw),
                'id_profesion' => '10',
            ]);
          }
          else {
            print_r("Username ya utilizado");
          }


      }
      else{
        print_r("Correo ya utilizado");
      }


    }
}
