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

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre completo</label>

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

                                    <input id="gender" type="radio" name="gender" value="f" required autofocus> Mujer<br>
                                    <input id="gender" type="radio" name="gender" value="m" required autofocus> Hombre<br>
                                    <input id="gender" type="radio" name="gender" value="o" required autofocus> Otro<br>

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

                        <div class="form-group{{ $errors->has('cp') ? ' has-error' : '' }}">
                            <label for="cp" class="col-md-4 control-label">Código Postal</label>

                            <div class="col-md-6">
                                <input id="cp" type="number" min="1000" max="99999" class="form-control" name="cp" value="{{ old('cp') }}" required autofocus>

                                @if ($errors->has('cp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cp') }}</strong>
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

                        <div class="form-group{{ $errors->has('is_student') ? ' has-error' : '' }}">
                            <label for="is_student" class="col-md-4 control-label">¿Eres estudiante?</label>

                            <div class="col-md-6">

                                    <input id="is_student" type="radio" name="is_student" value="1" required autofocus> Si<br>
                                    <input id="is_student" type="radio" name="is_student" value="0" required autofocus> No<br>

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

                            <select class="control-label col-md-6" id="grade" name="grade">

                                <option type="radio" value="" required autofocus> -</option>
                                <option value="1"> 1</option>
                                <option value="2"> 2</option>
                                <option value="3"> 3</option>
                                <option value="4"> 4</option>
                                <option value="5"> 5</option>
                                <option value="6"> 6</option>
                                <option value="7"> 7</option>
                                <option value="8"> 8</option>
                                <option value="9"> 9</option>
                                <option value="10"> 10</option>
                                <option value="11"> 11</option>
                                <option value="12"> 12</option>
                                <option value="13"> 13</option>
                                <option value="14"> 14</option>
                                <option value="15"> 15</option>

                                @if ($errors->has('grade'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('grade') }}</strong>
                                    </span>
                                @endif
                            </select>
                        </div>

                        <div class="form-group{{ $errors->has('level_of_education') ? ' has-error' : '' }}">
                            <label for="level_of_education" class="col-md-4 control-label">Máximo nivel educativo en curso o completado</label>

                            <select class="control-label col-md-6" name="level_of_education" id="level_of_education">

                                <option value=""> -</option>
                                <option value="el"> Primaria</option>
                                <option value="jhs"> Secundaria</option>
                                <option value="hs"> Bachillerato</option>
                                <option value="b"> Licenciatura</option>
                                <option value="a"> Técnico Superior</option>
                                <option value="m"> Maestría</option>
                                <option value="p"> Doctorado</option>
                                <option value="other"> Otro</option>
                                <option value="none"> Ninguno</option>

                                @if ($errors->has('level_of_education'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('level_of_education') }}</strong>
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
