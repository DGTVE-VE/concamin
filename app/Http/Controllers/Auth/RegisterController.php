<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Auth_user;
use App\Auth_userprofile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;

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

      if( isset(Auth_user::whereemail($data['email'])->first()->email) == true ){
        print_r(Auth_user::whereemail($data['email'])->first()->email);
          $pass = Auth_user::whereemail($data['email'])->first()->password;
          $pass = explode("$", $pass);
          $psw = base64_encode(hash_pbkdf2 ("SHA256", $data['password'], $pass[2], $pass[1], 0,True));
      }

      if(isset(Auth_user::whereemail($data['email'])->first()->email) && ( $psw ==  $pass[3] ) ){

        if($data['is_student'] == 1){
          return Validator::make($data, [
              'username' => 'required|string|max:255|unique:users',
              'email' => 'required|string|email|max:255|unique:users',
              'password' => 'required|string|min:6|confirmed',
              'is_student' => 'required|integer|min:0|max:1',
              'mode' => 'string',
              'grade' => 'integer|min:1|max:15',
              'level_of_education' => 'string',
              'country_study' => 'string',
              'state_study' => 'string',
              'municipality_study' => 'string',
              'plantelEducativo' => 'string',
              'titulo' => 'string',
              'degree' => 'string',
          ]);
        }
        else{
          return Validator::make($data, [
              'username' => 'required|string|max:255|unique:users',
              'email' => 'required|string|email|max:255|unique:users',
              'password' => 'required|string|min:6|confirmed',
              'is_student' => 'required|integer|min:0|max:1',
          ]);
        }

      }
      else {

        if($data['is_student'] == 1){
          return Validator::make($data, [
              'username' => 'required|string|max:255|unique:users',
              'email' => 'required|string|email|max:255|unique:users',
              'password' => 'required|string|min:6|confirmed',
              'dateOfBirth' => 'required|date',
              'gender' => 'required',
              'country' => 'required|string',
              'cp' => 'required|integer|min:1000|max:99999',
              'is_student' => 'required|integer|min:0|max:1',
              'mode' => 'string',
              'grade' => 'integer|min:1|max:15',
              'level_of_education' => 'string',
              'country_study' => 'string',
              'state_study' => 'string',
              'municipality_study' => 'string',
              'plantelEducativo' => 'string',
              'titulo' => 'string',
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
              'is_student' => 'required|integer|min:0|max:1',
              'grade' => 'integer|min:1|max:15',
              'titulo' => 'string',
              'degree' => 'string',
          ]);
        }

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
      // Crea una contraseña encriptada lista para concatenar y guardar en MéxicoX
      $salt = substr(md5(uniqid()),1,12);
      $itera = '20000';
      $psw = base64_encode(hash_pbkdf2 ("SHA256", $data['password'], $salt, $itera, 0,True));
      //


      if(isset(Auth_user::whereemail($data['email'])->first()->email)){
          $pass = Auth_user::whereemail($data['email'])->first()->password;
          $pass = explode("$", $pass);
          $psw = base64_encode(hash_pbkdf2 ("SHA256", $data['password'], $pass[2], $pass[1], 0,True));
      }

      if(isset(Auth_user::whereemail($data['email'])->first()->email) && ( $psw ==  $pass[3] ) ){
          $auth_user = Auth_user::whereemail($data['email'])->first();

          return User::create([
              'username' => $data['username'],
              'user_id' => $auth_user->id,
              'is_student' => $data['is_student'],
              'email' => $data['email'],
              'password' => bcrypt($data['password']),
              'id_profesion' => $data['degree'],
              'titulo' => $data['titulo'],
          ]);

        }
        else {

          $auth_user = new Auth_user;
          $auth_user->username = $data['username'];
          $auth_user->first_name = '';
          $auth_user->last_name = '';
          $auth_user->is_active = '0';
          $auth_user->is_staff = '0';
          $auth_user->is_superuser = '0';
          $auth_user->email = $data['email'];
          $auth_user->password = 'pbkdf2_sha256$'.$itera.'$'.$salt.'$'.$psw;
          $auth_user->last_login = date("Y-m-d H:i:s");
          $auth_user->date_joined = date("Y-m-d H:i:s");
          $auth_user->save();

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
          $auth_userprofile->city = '';
          $auth_userprofile->save();

          $pswAct = str_replace('/','',$psw);
          $this->enviaCorreoActivacion($data['email'], $pswAct, filter_input (INPUT_POST, 'back_url'));

          return User::create([
              'username' => $data['username'],
              'user_id' => $auth_user->id,
              'is_student' => $data['is_student'],
              'email' => $data['email'],
              'password' => bcrypt($data['password']),
              'id_profesion' => '10',
              'titulo' => $data['titulo'],
          ]);

        }
    }

    public function enviaCorreoActivacion($correo, $hash, $back_url) {
        Mail::send('emails.activacion', ['correo' => $correo, 'hash' => $hash], function ($m) use ($correo) {
            $m->from('activacion@catedrainnovatic.mx', 'Catedra Innovatic');
            $m->to($correo)->subject('Activación de correo!');
        });
        //        return redirect ($back_url);
        return view('emails.correoEnviado')->with('mensaje', '');
    }

}
