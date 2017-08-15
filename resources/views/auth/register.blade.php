@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrarse</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dateOfBirth') ? ' has-error' : '' }}">
                            <label for="dateOfBirth" class="col-md-4 control-label">Fecha de Nacimineto</label>

                            <div class="col-md-6">
                                <input id="dateOfBirth" type="date" class="form-control" name="dateOfBirth" value="{{ old('dateOfBirth') }}" required autofocus>

                                @if ($errors->has('dateOfBirth'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dateOfBirth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Género</label>

                            <div class="col-md-6">

                                    <input id="gender" type="radio" name="gender" value="mujer" required autofocus> Mujer<br>
                                    <input id="gender" type="radio" name="gender" value="hombre" required autofocus> Hombre<br>
                                    <input id="gender" type="radio" name="gender" value="otro" required autofocus> Otro<br> 
                                
                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
<div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="country" class="col-md-4 control-label">País donde vives</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control" name="country" value="{{ old('country') }}" required autofocus>

                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">Estado donde vives</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}" required autofocus>

                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('municipality') ? ' has-error' : '' }}">
                            <label for="municipality" class="col-md-4 control-label">Municipio donde vives</label>

                            <div class="col-md-6">
                                <input id="municipality" type="text" class="form-control" name="municipality" value="{{ old('municipality') }}" required autofocus>

                                @if ($errors->has('municipality'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('municipality') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('is_student') ? ' has-error' : '' }}">
                            <label for="is_student" class="col-md-4 control-label">¿Eres estudiante?</label>

                            <div class="col-md-6">

                                    <input id="is_student" type="radio" name="is_student" value="true" required autofocus> Si<br>
                                    <input id="is_student" type="radio" name="is_student" value="false" required autofocus> No<br>
                                
                                @if ($errors->has('is_student'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('is_student') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('mode') ? ' has-error' : '' }}">
                            <label for="mode" class="col-md-4 control-label">¿Elige la modalidad en la que cursas tus estudios?</label>

                            <div class="col-md-6">

                                <input id="mode" type="radio" name="mode" value="anual" required autofocus> Anual<br>
                                <input id="mode" type="radio" name="mode" value="semestral" required autofocus> Semestral<br>
                                <input id="mode" type="radio" name="mode" value="cuatrimestral" required autofocus> Cuatrimestral<br>
                                <input id="mode" type="radio" name="mode" value="trimestral" required autofocus> Trimestral<br>
                                
                                @if ($errors->has('mode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('grade') ? ' has-error' : '' }}">
                            <label for="grade" class="col-md-4 control-label">¿Qué nivel cursas actualmente?</label>

                            <select class="control-label col-md-6">

                                <option id="grade" type="radio" name="grade" value="" required autofocus> -</option>
                                <option id="grade" type="radio" name="grade" value="1" required autofocus> 1</option>
                                <option id="grade" type="radio" name="grade" value="2" required autofocus> 2</option>
                                <option id="grade" type="radio" name="grade" value="3" required autofocus> 3</option>
                                <option id="grade" type="radio" name="grade" value="4" required autofocus> 4</option>
                                <option id="grade" type="radio" name="grade" value="5" required autofocus> 5</option>
                                <option id="grade" type="radio" name="grade" value="6" required autofocus> 6</option>
                                <option id="grade" type="radio" name="grade" value="7" required autofocus> 7</option>
                                <option id="grade" type="radio" name="grade" value="8" required autofocus> 8</option>
                                <option id="grade" type="radio" name="grade" value="9" required autofocus> 9</option>
                                <option id="grade" type="radio" name="grade" value="10" required autofocus> 10</option>
                                <option id="grade" type="radio" name="grade" value="11" required autofocus> 11</option>
                                <option id="grade" type="radio" name="grade" value="12" required autofocus> 12</option>
                                <option id="grade" type="radio" name="grade" value="13" required autofocus> 13</option>
                                <option id="grade" type="radio" name="grade" value="14" required autofocus> 14</option>
                                <option id="grade" type="radio" name="grade" value="15" required autofocus> 15</option>
                                
                                @if ($errors->has('grade'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('grade') }}</strong>
                                    </span>
                                @endif
                            </select>
                        </div>
                        
                        <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                            <label for="level" class="col-md-4 control-label">Máximo nivel educativo en curso o completado</label>

                            <select class="control-label col-md-6">

                                <option id="level" type="radio" name="level" value="" required autofocus> -</option>    
                                <option id="level" type="radio" name="level" value="primaria" required autofocus> Primaria</option>
                                <option id="level" type="radio" name="level" value="secundaria" required autofocus> Secundaria</option>
                                <option id="level" type="radio" name="level" value="bachillerato" required autofocus> Bachillerato</option> 
                                <option id="level" type="radio" name="level" value="licenciatura" required autofocus> Licenciatura</option>
                                <option id="level" type="radio" name="level" value="tecnico" required autofocus> Técnico Superior</option>
                                <option id="level" type="radio" name="level" value="maestria" required autofocus> Maestría</option> 
                                <option id="level" type="radio" name="level" value="doctorado" required autofocus> Doctorado</option> 
                                <option id="level" type="radio" name="level" value="otro" required autofocus> Otro</option> 
                                <option id="level" type="radio" name="level" value="ninguno" required autofocus> Ninguno</option> 
                                
                                @if ($errors->has('level'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                @endif
                            </select>
                        </div>
                        
                        <div class="form-group{{ $errors->has('country_study') ? ' has-error' : '' }}">
                            <label for="country_study" class="col-md-4 control-label">País donde estudias</label>

                            <div class="col-md-6">
                                <input id="country_study" type="text" class="form-control" name="country_study" value="{{ old('country_study') }}" required autofocus>

                                @if ($errors->has('country_study'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country_study') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('state_study') ? ' has-error' : '' }}">
                            <label for="state_study" class="col-md-4 control-label">Estado donde estudias</label>

                            <div class="col-md-6">
                                <input id="state_study" type="text" class="form-control" name="state_study" value="{{ old('state_study') }}" required autofocus>

                                @if ($errors->has('state_study'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state_study') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('municipality_study') ? ' has-error' : '' }}">
                            <label for="municipality_study" class="col-md-4 control-label">Municipio donde estudias</label>

                            <div class="col-md-6">
                                <input id="municipality_study" type="text" class="form-control" name="municipality_study" value="{{ old('municipality_study') }}" required autofocus>

                                @if ($errors->has('municipality_study'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('municipality_study') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('plantelEducativo') ? ' has-error' : '' }}">
                            <label for="plantelEducativo" class="col-md-4 control-label">Plantel Educativo</label>

                            <div class="col-md-6">
                                <input id="plantelEducativo" type="text" class="form-control" name="plantelEducativo" value="{{ old('plantelEducativo') }}" required autofocus>

                                @if ($errors->has('plantelEducativo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('plantelEducativo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('degree') ? ' has-error' : '' }}">
                            <label for="degree" class="col-md-4 control-label">Carrera</label>

                            <div class="col-md-6">
                                <input id="degree" type="text" class="form-control" name="degree" value="{{ old('degree') }}" required autofocus>

                                @if ($errors->has('degree'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('degree') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
