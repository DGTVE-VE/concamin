@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div id="parent" class="panel panel-default" style="opacity: 0.8;">
                <div class="panel-heading text-center">Registro</div>

                @if (Session::has('message'))
                	<div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="email" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 control-label">Correo electrónico</label>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="off" required autofocus onchange="searchEmail()">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="name" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 control-label">Nombre de usuario</label>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <input id="username" type="text" class="form-control" name="username" required autofocus onchange="searchUsername()">
                                <span class="tip tip-input" id="register-username-desc" style="font-size:12px">El nombre que lo identificará al interior de sus cursos - <strong>(No podrá ser cambiado)</strong></span>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="visible-sm col-sm-12"></div>
                        <div id="error-info" style="display: none;" class="alert alert-info col-sm-12"></div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="password" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 control-label">Contraseña</label>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="password-confirm" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 control-label">Confirma tu contraseña</label>

                            <div id="input_password" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                              <button title="Presiona el botón para validar tu contraseña con la que te registraste en MéxicoX y cargar tus datos para tu registro en cátedrainnovatic2.0" id="valida" style="display: none" type="button" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 btn btn-primary" onclick="validar();">Validar</button>
                        </div>
                        <div id="error" style="display: none;" class="alert alert-danger col-sm-12"></div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="name" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 control-label">Nombre completo</label>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                <span class="tip tip-input" id="register-name-desc" style="font-size:12px">Su nombre legal, que aparecerá en los certificados que pueda obtener</span>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dateOfBirth') ? ' has-error' : '' }} col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="dateOfBirth" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 control-label">Fecha de Nacimineto</label>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <input id="dateOfBirth" type="date" class="form-control" name="dateOfBirth" value="{{ old('dateOfBirth') }}" required autofocus>

                                @if ($errors->has('dateOfBirth'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dateOfBirth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }} col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="gender" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Género</label>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                    <input class="col-lg-4 col-md-4 col-sm-4 col-xs-4" id="f" type="radio" name="gender" value="f" required autofocus> Mujer
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                    <input class="col-lg-4 col-md-4 col-sm-4 col-xs-4" id="m" type="radio" name="gender" value="m" required autofocus> Hombre
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                    <input class="col-lg-4 col-md-4 col-sm-4 col-xs-4" id="o" type="radio" name="gender" value="o" required autofocus> Otro
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }} col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="country" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 control-label">País dónde vives</label>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">

                              <select id="country" class="form-control" name="country" value="{{old('country')}}" onchange="hide()" required autofocus>
                                <option value="AF">Afganistán</option>
                                <option value="AL">Albania</option>
                                <option value="DE">Alemania</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                                <option value="AQ">Antártida</option>
                                <option value="AG">Antigua y Barbuda</option>
                                <option value="AN">Antillas Holandesas</option>
                                <option value="SA">Arabia Saudí</option>
                                <option value="DZ">Argelia</option>
                                <option value="AR">Argentina</option>
                                <option value="AM">Armenia</option>
                                <option value="AW">Aruba</option>
                                <option value="AU">Australia</option>
                                <option value="AT">Austria</option>
                                <option value="AZ">Azerbaiyán</option>
                                <option value="BS">Bahamas</option>
                                <option value="BH">Bahrein</option>
                                <option value="BD">Bangladesh</option>
                                <option value="BB">Barbados</option>
                                <option value="BE">Bélgica</option>
                                <option value="BZ">Belice</option>
                                <option value="BJ">Benin</option>
                                <option value="BM">Bermudas</option>
                                <option value="BY">Bielorrusia</option>
                                <option value="MM">Birmania</option>
                                <option value="BO">Bolivia</option>
                                <option value="BA">Bosnia y Herzegovina</option>
                                <option value="BW">Botswana</option>
                                <option value="BR">Brasil</option>
                                <option value="BN">Brunei</option>
                                <option value="BG">Bulgaria</option>
                                <option value="BF">Burkina Faso</option>
                                <option value="BI">Burundi</option>
                                <option value="BT">Bután</option>
                                <option value="CV">Cabo Verde</option>
                                <option value="KH">Camboya</option>
                                <option value="CM">Camerún</option>
                                <option value="CA">Canadá</option>
                                <option value="TD">Chad</option>
                                <option value="CL">Chile</option>
                                <option value="CN">China</option>
                                <option value="CY">Chipre</option>
                                <option value="VA">Ciudad del Vaticano (Santa Sede)</option>
                                <option value="CO">Colombia</option>
                                <option value="KM">Comores</option>
                                <option value="CG">Congo</option>
                                <option value="CD">Congo, República Democrática del</option>
                                <option value="KR">Corea</option>
                                <option value="KP">Corea del Norte</option>
                                <option value="CI">Costa de Marfíl</option>
                                <option value="CR">Costa Rica</option>
                                <option value="HR">Croacia (Hrvatska)</option>
                                <option value="CU">Cuba</option>
                                <option value="DK">Dinamarca</option>
                                <option value="DJ">Djibouti</option>
                                <option value="DM">Dominica</option>
                                <option value="EC">Ecuador</option>
                                <option value="EG">Egipto</option>
                                <option value="SV">El Salvador</option>
                                <option value="AE">Emiratos Árabes Unidos</option>
                                <option value="ER">Eritrea</option>
                                <option value="SI">Eslovenia</option>
                                <option value="ES">España</option>
                                <option value="US">Estados Unidos</option>
                                <option value="EE">Estonia</option>
                                <option value="ET">Etiopía</option>
                                <option value="FJ">Fiji</option>
                                <option value="PH">Filipinas</option>
                                <option value="FI">Finlandia</option>
                                <option value="FR">Francia</option>
                                <option value="GA">Gabón</option>
                                <option value="GM">Gambia</option>
                                <option value="GE">Georgia</option>
                                <option value="GH">Ghana</option>
                                <option value="GI">Gibraltar</option>
                                <option value="GD">Granada</option>
                                <option value="GR">Grecia</option>
                                <option value="GL">Groenlandia</option>
                                <option value="GP">Guadalupe</option>
                                <option value="GU">Guam</option>
                                <option value="GT">Guatemala</option>
                                <option value="GY">Guayana</option>
                                <option value="GF">Guayana Francesa</option>
                                <option value="GN">Guinea</option>
                                <option value="GQ">Guinea Ecuatorial</option>
                                <option value="GW">Guinea-Bissau</option>
                                <option value="HT">Haití</option>
                                <option value="HN">Honduras</option>
                                <option value="HU">Hungría</option>
                                <option value="IN">India</option>
                                <option value="ID">Indonesia</option>
                                <option value="IQ">Irak</option>
                                <option value="IR">Irán</option>
                                <option value="IE">Irlanda</option>
                                <option value="BV">Isla Bouvet</option>
                                <option value="CX">Isla de Christmas</option>
                                <option value="IS">Islandia</option>
                                <option value="KY">Islas Caimán</option>
                                <option value="CK">Islas Cook</option>
                                <option value="CC">Islas de Cocos o Keeling</option>
                                <option value="FO">Islas Faroe</option>
                                <option value="HM">Islas Heard y McDonald</option>
                                <option value="FK">Islas Malvinas</option>
                                <option value="MP">Islas Marianas del Norte</option>
                                <option value="MH">Islas Marshall</option>
                                <option value="UM">Islas menores de Estados Unidos</option>
                                <option value="PW">Islas Palau</option>
                                <option value="SB">Islas Salomón</option>
                                <option value="SJ">Islas Svalbard y Jan Mayen</option>
                                <option value="TK">Islas Tokelau</option>
                                <option value="TC">Islas Turks y Caicos</option>
                                <option value="VI">Islas Vírgenes (EEUU)</option>
                                <option value="VG">Islas Vírgenes (Reino Unido)</option>
                                <option value="WF">Islas Wallis y Futuna</option>
                                <option value="IL">Israel</option>
                                <option value="IT">Italia</option>
                                <option value="JM">Jamaica</option>
                                <option value="JP">Japón</option>
                                <option value="JO">Jordania</option>
                                <option value="KZ">Kazajistán</option>
                                <option value="KE">Kenia</option>
                                <option value="KG">Kirguizistán</option>
                                <option value="KI">Kiribati</option>
                                <option value="KW">Kuwait</option>
                                <option value="LA">Laos</option>
                                <option value="LS">Lesotho</option>
                                <option value="LV">Letonia</option>
                                <option value="LB">Líbano</option>
                                <option value="LR">Liberia</option>
                                <option value="LY">Libia</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LT">Lituania</option>
                                <option value="LU">Luxemburgo</option>
                                <option value="MK">Macedonia, Ex-República Yugoslava de</option>
                                <option value="MG">Madagascar</option>
                                <option value="MY">Malasia</option>
                                <option value="MW">Malawi</option>
                                <option value="MV">Maldivas</option>
                                <option value="ML">Malí</option>
                                <option value="MT">Malta</option>
                                <option value="MA">Marruecos</option>
                                <option value="MQ">Martinica</option>
                                <option value="MU">Mauricio</option>
                                <option value="MR">Mauritania</option>
                                <option value="YT">Mayotte</option>
                                <option value="MX" selected>México</option>
                                <option value="FM">Micronesia</option>
                                <option value="MD">Moldavia</option>
                                <option value="MC">Mónaco</option>
                                <option value="MN">Mongolia</option>
                                <option value="MS">Montserrat</option>
                                <option value="MZ">Mozambique</option>
                                <option value="NA">Namibia</option>
                                <option value="NR">Nauru</option>
                                <option value="NP">Nepal</option>
                                <option value="NI">Nicaragua</option>
                                <option value="NE">Níger</option>
                                <option value="NG">Nigeria</option>
                                <option value="NU">Niue</option>
                                <option value="NF">Norfolk</option>
                                <option value="NO">Noruega</option>
                                <option value="NC">Nueva Caledonia</option>
                                <option value="NZ">Nueva Zelanda</option>
                                <option value="OM">Omán</option>
                                <option value="NL">Países Bajos</option>
                                <option value="PA">Panamá</option>
                                <option value="PG">Papúa Nueva Guinea</option>
                                <option value="PK">Paquistán</option>
                                <option value="PY">Paraguay</option>
                                <option value="PE">Perú</option>
                                <option value="PN">Pitcairn</option>
                                <option value="PF">Polinesia Francesa</option>
                                <option value="PL">Polonia</option>
                                <option value="PT">Portugal</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="QA">Qatar</option>
                                <option value="UK">Reino Unido</option>
                                <option value="CF">República Centroafricana</option>
                                <option value="CZ">República Checa</option>
                                <option value="ZA">República de Sudáfrica</option>
                                <option value="DO">República Dominicana</option>
                                <option value="SK">República Eslovaca</option>
                                <option value="RE">Reunión</option>
                                <option value="RW">Ruanda</option>
                                <option value="RO">Rumania</option>
                                <option value="RU">Rusia</option>
                                <option value="EH">Sahara Occidental</option>
                                <option value="KN">Saint Kitts y Nevis</option>
                                <option value="WS">Samoa</option>
                                <option value="AS">Samoa Americana</option>
                                <option value="SM">San Marino</option>
                                <option value="VC">San Vicente y Granadinas</option>
                                <option value="SH">Santa Helena</option>
                                <option value="LC">Santa Lucía</option>
                                <option value="ST">Santo Tomé y Príncipe</option>
                                <option value="SN">Senegal</option>
                                <option value="SC">Seychelles</option>
                                <option value="SL">Sierra Leona</option>
                                <option value="SG">Singapur</option>
                                <option value="SY">Siria</option>
                                <option value="SO">Somalia</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="PM">St Pierre y Miquelon</option>
                                <option value="SZ">Suazilandia</option>
                                <option value="SD">Sudán</option>
                                <option value="SE">Suecia</option>
                                <option value="CH">Suiza</option>
                                <option value="SR">Surinam</option>
                                <option value="TH">Tailandia</option>
                                <option value="TW">Taiwán</option>
                                <option value="TZ">Tanzania</option>
                                <option value="TJ">Tayikistán</option>
                                <option value="TF">Territorios franceses del Sur</option>
                                <option value="TP">Timor Oriental</option>
                                <option value="TG">Togo</option>
                                <option value="TO">Tonga</option>
                                <option value="TT">Trinidad y Tobago</option>
                                <option value="TN">Túnez</option>
                                <option value="TM">Turkmenistán</option>
                                <option value="TR">Turquía</option>
                                <option value="TV">Tuvalu</option>
                                <option value="UA">Ucrania</option>
                                <option value="UG">Uganda</option>
                                <option value="UY">Uruguay</option>
                                <option value="UZ">Uzbekistán</option>
                                <option value="VU">Vanuatu</option>
                                <option value="VE">Venezuela</option>
                                <option value="VN">Vietnam</option>
                                <option value="YE">Yemen</option>
                                <option value="YU">Yugoslavia</option>
                                <option value="ZM">Zambia</option>
                                <option value="ZW">Zimbabue</option>
                              </select>

                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cp') ? ' has-error' : '' }} col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="cp" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 control-label">Código Postal</label>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <input id="cp" type="number" min="1000" max="99999" class="form-control" name="cp" value="{{ old('cp') }}" onchange="validarcp()" required autofocus>

                                @if ($errors->has('cp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div id="state" style="display: none" class="form-group cp col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <label for="cp" class="col-md-6 control-label">Estado</label>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <input id="viewcp1" type="text" class="form-control" name="viewcp1" disabled>
                            </div>
                        </div>

                        <div id="municipality" style="display: none" class="form-group cp col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <label for="viewcp2" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 control-label">Municipio / Delegación</label>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <input id="viewcp2" type="text" class="form-control" name="viewcp2" disabled>
                            </div>
                        </div>

                        <div id="colony" style="display: none" class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="viewcp3" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 control-label">Colonia</label>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <input id="viewcp3" type="text" class="form-control" name="viewcp3" disabled>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('level_of_education') ? ' has-error' : '' }} col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="level_of_education" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 control-label">¿Cuál es tu nivel educativo?</label>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" name="level_of_education" id="level_of_education">
                                <option value="" selected> -</option>
                                <option value="el"> Primaria</option>
                                <option value="jhs"> Secundaria</option>
                                <option value="hs"> Bachillerato</option>
                                <option value="b"> Licenciatura</option>
                                <option value="a"> Técnico Superior</option>
                                <option value="m"> Maestría</option>
                                <option value="p"> Doctorado</option>
                                <option value="other"> Otro</option>
                                <option value="none"> Ninguno</option>
                              </select>

                                @if ($errors->has('level_of_education'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('level_of_education') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('is_student') ? ' has-error' : '' }} col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="is_student" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">¿Cuál es tu ocupación?</label>

                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="padding:0px;">
                                    <input id="is_student" type="radio" name="is_student" value="1" required autofocus onclick="student()"> Estudiante<br>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="padding:0px;">
                                    <input id="is_student" type="radio" name="is_student" value="2" required autofocus onclick="esDocente()"> Docente<br>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="padding:0px;">
                                    <input id="is_student" type="radio" name="is_student" value="3" required autofocus onclick="esAdtvo()"> Administrativo<br>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="padding:0px;">
                                    <input id="is_student" type="radio" name="is_student" value="0" required autofocus onclick="isnt_student()"> Otro<br>
                                </div>
                                @if ($errors->has('is_student'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('is_student') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div id="ocupacionDiv" class="form-group{{ $errors->has('ocupacion') ? ' has-error' : '' }} col-lg-6 col-md-6 col-sm-6 col-xs-12" style="display:none;">
                            <label for="ocupacion" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 control-label">Especifique</label>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <input id="ocupacion" type="text" class="form-control" name="ocupacion" value="{{ old('ocupacion') }}">

                                @if ($errors->has('ocupacion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ocupacion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div id="modeDiv" style="display: none" class="form-group{{ $errors->has('mode') ? ' has-error' : '' }} col-lg-7 col-md-7 col-sm-6 col-xs-12">
                                <label for="mode" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 control-label">¿En qué modalidad cursas tus estudios?</label>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="padding:0px;">
                                        <input id="mode_input" type="radio" name="mode" value="anual" onchange="cambiaPeriodo(this.value)"> Anual<br>
                                        <input id="mode_input" type="radio" name="mode" value="semestral" onchange="cambiaPeriodo(this.value)"> Semestral<br>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="padding:0px;">
                                        <input id="mode_input" type="radio" name="mode" value="cuatrimestral" onchange="cambiaPeriodo(this.value)"> Cuatrimestral<br>
                                        <input id="mode_input" type="radio" name="mode" value="trimestral" onchange="cambiaPeriodo(this.value)"> Trimestral<br>
                                    </div>

                                    @if ($errors->has('mode'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mode') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div id="gradeDiv" style="display: none" class="form-group{{ $errors->has('grade') ? ' has-error' : '' }} col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                <label for="grade" class="col-lg-9 col-md-9 col-sm-8 col-xs-12 control-label">¿Qué <span id="periodo">año</span> cursas actualmente?</label>

                                  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                    <input id="grade" type="number" min="1" max="15" class="form-control" name="grade" value="{{ old('grade') }}">

                                    @if ($errors->has('grade'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('grade') }}</strong>
                                        </span>
                                    @endif
                                  </div>
                            </div>
                        </div>
                        <div id="localizaPlantel" class="form-group{{ $errors->has('country_study') ? ' has-error' : '' }} col-lg-6 col-md-6 col-sm-6 col-xs-12" style="display: none;">
                            <label for="country_study" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 control-label">¿En un plantel de México?</label>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <input id="country_study" type="radio" name="country_study" value="1" required autofocus onclick="is_mexican()"> Si<br>
                                <input id="country_study" type="radio" name="country_study" value="0" required autofocus onclick="isnt_mexican()"> No<br>

                                @if ($errors->has('country_study'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country_study') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div id="datoPlantelEd" class="col-md-6 col-sm-12 col-xs-12 text-center" style="display: none; font-weight: bold;">
                            <br>
                            <p>Datos del plantel donde <span id="etiquetaUbica">Estudias</span></p>
                        </div>
                        <div id="datosPlantel" class="col-md-12 col-sm-12 col-xs-12" style="display: none; border: solid #d3e0e9 1px; padding:15px;">
                            <div id="state_studyDiv" class="form-group{{ $errors->has('state_study') ? ' has-error' : '' }} col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="state_study" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 control-label">Estado </label>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select id="state_study" type="text" class="form-control" name="state_study" value="{{ old('state_study') }}" onchange="llenaMunicipio(this.value)" autofocus></select>
                                    @if ($errors->has('state_study'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('state_study') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div id="municipality_studyDiv" class="form-group{{ $errors->has('municipality_study') ? ' has-error' : '' }} col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="municipality_study" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 control-label">Municipio</label>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select id="municipality_study" type="text" class="form-control" name="municipality_study" value="{{ old('municipality_study') }}" onchange="llenaPlantelEdu(this.value)"></select>

                                    @if ($errors->has('municipality_study'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('municipality_study') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div id="plantelEducativoDiv" class="form-group{{ $errors->has('plantelEducativo') ? ' has-error' : '' }} col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="plantelEducativo" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 control-label">Plantel Educativo</label>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select id="plantelEducativo" type="text" class="form-control" name="plantelEducativo" value="{{ old('plantelEducativo') }}" ></select>

                                    @if ($errors->has('plantelEducativo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('plantelEducativo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div id="tituloDiv" class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }} col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="titulo" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 control-label">Titulo</label>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select id="titulo" class="form-control" name="titulo" value="{{ old('titulo') }}">
                                        <option> Seleccione </option>
                                        <option value="Lic"> Lic. </option>
                                        <option value="TSU"> T. S. U. </option>
                                        <option value="Ing"> Ing. </option>
                                    </select>

                                    @if ($errors->has('titulo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('titulo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div id="degreeDiv" class="form-group{{ $errors->has('degree') ? ' has-error' : '' }} col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="degree" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 control-label">Carrera</label>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input id="degree" type="text" class="form-control" name="degree" value="{{ old('degree') }}">

                                    @if ($errors->has('degree'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('degree') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="padding-top:20px;">
                            <button id="register" type="submit" class="btn btn-primary">
                                Registrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

  function student(){
    ocultaDatosPlantel();
    muestraDatosEstudiante();
    ocultaDatosOtro();
  }

  function isnt_student(){
    ocultaDatosEstudiante();
    ocultaDatosPlantel();
    muestraDatosOtro();
  }

  function esDocente(){
    ocultaDatosEstudiante();
    ocultaDatosOtro();
    ocultaDatosPlantel();
    muestralocalizaPlantel();
  }

  function esAdtvo(){
    ocultaDatosEstudiante();
    ocultaDatosOtro();
    ocultaDatosPlantel();
  }
  
  function is_mexican(){
    muestraDatosPlantel();
  }

  function isnt_mexican(){
    ocultaDatosPlantel();
  }

  function muestralocalizaPlantel(){
    document.getElementById('localizaPlantel').style.display = 'inline';
    document.getElementById("country_study").value = 0;
    document.getElementById("country_study").checked = false;
  }

  function ocultalocalizaPlantel(){
    document.getElementById('localizaPlantel').style.display = 'none';
  }

  function ocultaDatosPlantel(){
    document.getElementById('datoPlantelEd').style.display = 'none';
    document.getElementById('datosPlantel').style.display = 'none';
    document.getElementById('state_study').required = false;
    document.getElementById('plantelEducativo').required = false;
    document.getElementById('degree').required = false;
    document.getElementById('municipality_study').required = false;
  }

  function muestraDatosPlantel(){
    document.getElementById('datoPlantelEd').style.display = 'inline';
    document.getElementById('datosPlantel').style.display = 'inline';
    document.getElementById('state_study').required = true;
    document.getElementById('plantelEducativo').required = true;
    document.getElementById('degree').required = true;
    document.getElementById('municipality_study').required = true;
  }

  function ocultaDatosEstudiante(){
    document.getElementById('etiquetaUbica').innerHTML = "laboras";
    document.getElementById('modeDiv').style.display = 'none';
    document.getElementById('gradeDiv').style.display = 'none';
    document.getElementById('mode_input').required = false;
    document.getElementById('grade').required = false;
    ocultalocalizaPlantel();
  }

  function muestraDatosEstudiante(){
    document.getElementById('etiquetaUbica').innerHTML = "estudias";
    document.getElementById('modeDiv').style.display = 'inline';
    document.getElementById('gradeDiv').style.display = 'inline';
    document.getElementById('mode_input').required = true;
    document.getElementById('grade').required = true;
    muestralocalizaPlantel();
  }

  function ocultaDatosOtro(){
    document.getElementById('ocupacionDiv').style.display = 'none';
    document.getElementById('ocupacionDiv').required = false;
  }

  function muestraDatosOtro(){
    document.getElementById('ocupacionDiv').style.display = 'inline';
    document.getElementById('ocupacionDiv').required = true;
  }

  function hide(){
    if(document.getElementById('country').value == "MX"){
      document.getElementById('state').style.display = 'inline';
      document.getElementById('municipality').style.display = 'inline';
      document.getElementById('colony').style.display = 'inline';
    }else {
      document.getElementById('state').style.display = 'none';
      document.getElementById('municipality').style.display = 'none';
      document.getElementById('colony').style.display = 'none';
    }

  }

  function validarcp() {
    var cp = document.getElementById("cp").value;
    console.log(cp);
    var country = document.getElementById("country").value;

    var request = $.ajax({
      url: "http://reportes.mexicox.gob.mx/validarcp",
      method: "POST",
      data: {codigopostal : cp },
      dataType: "jsonp",
      async : false,
      success: function(data){
        // success logic
        console.log ('success verify cp');
      }
    });

    request.done(function( ms ) {

      if (country == "MX") {
        if ( JSON.stringify(ms[0].Estado) != "undefined" ) {
          document.getElementById('state').style.display = 'inline';
          document.getElementById('municipality').style.display = 'inline';
          document.getElementById('colony').style.display = 'inline';
          document.getElementById("viewcp1").value = JSON.stringify(ms[0].Estado);
          document.getElementById("viewcp2").value = JSON.stringify(ms[0].Municipio);
          document.getElementById("viewcp3").value = JSON.stringify(ms[0].Colonia);
        }else {
          document.getElementById("viewcp1").value = "Código postal no encontrado";
          document.getElementById("viewcp2").value = ms[0].Estado;
          document.getElementById("viewcp3").value = "";
        }

      }

    });

    request.fail(function(ms) {
      document.getElementById("viewcp1").value = "Código postal no encontrado";
      document.getElementById("viewcp2").value = "";
      document.getElementById("viewcp3").value = "";
    });
  }


  function searchEmail(){

    var email = document.getElementById("email").value;
    $.ajax({
	            url: "{{url('email')}}",
	            type:'GET',
	            data: {email : email },
	            success: function(data) {
                    if(data.success == '2'){
                        alert("Correo registrado en Innovatic.");
                        document.getElementById('email').value = '';
                        document.getElementById('email').focus();
                    }
	                else if($.isEmptyObject(data.error)){
                        document.getElementById("register").disabled = true;
                        document.getElementById("username").disabled = true;
                        document.getElementById('error-info').style.display = 'block';

                        var resp = alert("Este correo esta asociado a una cuenta de MéxicoX.");
                        document.getElementById('error-info').innerHTML = 'Ingresa la contraseña con la que estas registrado en MéxicoX y confirmala, para validar tus datos';
                        document.getElementById("input_password").classList.remove('col-lg-6');
                        document.getElementById("input_password").classList.remove('col-md-6');
                        document.getElementById("input_password").classList.remove('col-sm-6');
                        document.getElementById("input_password").classList.remove('col-xs-12');
                        document.getElementById("input_password").classList.add('col-lg-4');
                        document.getElementById("input_password").classList.add('col-md-4');
                        document.getElementById("input_password").classList.add('col-sm-4');
                        document.getElementById("input_password").classList.add('col-xs-10');
                        document.getElementById('valida').style.display = 'inline';
                        document.getElementById('password').focus();
	                }else{
                        document.getElementById("username").disabled = false;
                        document.getElementById("register").disabled = false;
                        document.getElementById('error').style.display = 'none';
                        document.getElementById('email').style.border = "";
	                }
	            }
	  });


  }

  function searchUsername(){

    var username = document.getElementById("username").value;

    $.ajax({
	            url: "{{url('username')}}",
	            type:'GET',
	            data: {username : username },
	            success: function(data) {
                console.log(username);

                  if($.isEmptyObject(data.error)){
	                	console.log(data.success);
                    document.getElementById("register").disabled = true;
                    document.getElementById("email").disabled = true;
                    document.getElementById('error').style.display = 'block';
                    document.getElementById('error').innerHTML = 'Ya existe un usuario con ese username registrado';
                    document.getElementById('username').style.border = "1px solid rgba(255, 0, 0, 0.6)";
	                }
                  else{
	                	console.log(data.error);
                    document.getElementById("email").disabled = false;
                    document.getElementById("register").disabled = false;
                    document.getElementById('error').style.display = 'none';
                    document.getElementById('username').style.border = "";
	                }
	            }
	  });

  }

  function validar(){

    var data0 = document.getElementById("password").value;
    var data1 = document.getElementById("password-confirm").value;
    var email = document.getElementById("email").value;

    if (data0 == null || data0 == "") {
      console.log("null data 0");
      document.getElementById("register").disabled = true;
      document.getElementById('error').style.display = 'block';
      document.getElementById('error').innerHTML = 'Escribe tu contraseña en el campo requerido';
      document.getElementById('password').style.border = "1px solid rgba(255, 0, 0, 0.6)";
    }
    else if(data1 == null || data1 == ""){
      console.log("data1 null");
      document.getElementById("register").disabled = true;
      document.getElementById('error').style.display = 'block';
      document.getElementById('error').innerHTML = 'Escribe tu contraseña en el campo requerido';
      document.getElementById('password-confirm').style.border = "1px solid rgba(255, 0, 0, 0.6)";
    }
    else if(data0 == data1){
      console.log(" datas ==");
      var pwd = data0;
      $.ajax({
                url: "{{url('pws')}}",
                type:'GET',
                data: {pwd : pwd, email : email },
                success: function(data) {

                    if($.isEmptyObject(data.error) ){
                        if(data.success == '0'){
                            document.getElementById('error').style.display = 'block';
                            document.getElementById('error').innerHTML = 'La contraseña no coincide con la que inicias sesión en MéxicoX';
                            document.getElementById('password').focus();
                        }else{
                          document.getElementById('error-info').style.display = 'none';
                          document.getElementById('error').style.display = 'none';
                          document.getElementById('username').disabled = false;
                          document.getElementById('username').value = data.username;
                          document.getElementById('name').value = data.name;
                          document.getElementById(data.gender).checked = true;
                          document.getElementById('dateOfBirth').value = data.year_of_birth+'-01-01';
                          document.getElementById('level_of_education').value = data.level_of_education;
                          document.getElementById('cp').value = data.mailing_address;
                          document.getElementById('country').value = data.country;
                          console.log(data.country);
                          document.getElementById("register").disabled = false;
                        }
                    }
                    else{
                      console.log(data.error);
                    }
                }
      });
    }
    else {
      document.getElementById("register").disabled = true;
      document.getElementById('error').style.display = 'block';
      document.getElementById('error').innerHTML = 'La contraseña y la confirmación no coinciden';
      document.getElementById('password').style.border = "1px solid rgba(255, 0, 0, 0.6)";
      document.getElementById('password-confirm').style.border = "1px solid rgba(255, 0, 0, 0.6)";
    }
  }


    // ******   Llenar Select de Estados
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(this.readyState==4 && this.status == 200){
                var datosJSON = JSON.parse(this.responseText);
                var textoVacio = document.createTextNode("Seleccione");
                var nodo = document.createElement("option");
                nodo.appendChild(textoVacio);
                document.getElementById("state_study").appendChild(nodo);
                for(var i=0; i< datosJSON.length ;i++ ){
                    var texto = document.createTextNode(datosJSON[i]["entidad"]);
                    var nodo = document.createElement("option");
                    nodo.appendChild(texto);
                    nodo.setAttribute("value",datosJSON[i]["entidad"]);
                    document.getElementById("state_study").appendChild(nodo);
                }
            }
        };
        xhttp.open("GET","{{url('/listaEdos')}}", true);
        xhttp.send();

    // ******   Llenar Select de Municipios
        function llenaMunicipio(estado){
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if(this.readyState==4 && this.status == 200){
                    var lstPlantel = document.getElementById("plantelEducativo");
                    while (lstPlantel.hasChildNodes()) {
                        lstPlantel.removeChild(lstPlantel.firstChild);
                    }
                    var lstMpio = document.getElementById("municipality_study");
                    while (lstMpio.hasChildNodes()) {
                        lstMpio.removeChild(lstMpio.firstChild);
                    }
                    var datosJSON = JSON.parse(this.responseText);
                    var textoVacio = document.createTextNode("Seleccione");
                    var nodo = document.createElement("option");
                    nodo.appendChild(textoVacio);
                    lstMpio.appendChild(nodo);
                    for(var i=0; i< datosJSON.length ;i++ ){
                        var texto = document.createTextNode(datosJSON[i]["municipio"]);
                        var nodo = document.createElement("option");
                        nodo.appendChild(texto);
                        nodo.setAttribute("value",datosJSON[i]["municipio"]);
                        lstMpio.appendChild(nodo);
                    }
                }
            };
            xhttp.open("GET","{{url('/listaMpio')}}" + "/" + estado, true);
            xhttp.send();
        }

    // ******   Llenar Select de centros educativos
        function llenaPlantelEdu(municipio){
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if(this.readyState==4 && this.status == 200){
                    var lstPlantel = document.getElementById("plantelEducativo");
                    while (lstPlantel.hasChildNodes()) {
                        lstPlantel.removeChild(lstPlantel.firstChild);
                    }
                    var datosJSON = JSON.parse(this.responseText);
                    for(var i=0; i< datosJSON.length ;i++ ){
                        var texto = document.createTextNode(datosJSON[i]["centro_educativo"]);
                        var nodo = document.createElement("option");
                        nodo.appendChild(texto);
                        nodo.setAttribute("value",datosJSON[i]["centro_educativo"]);
                        lstPlantel.appendChild(nodo);
                    }
                }
            };
            xhttp.open("GET","{{url('/listaPlantel')}}" + "/" + municipio, true);
            xhttp.send();
        }

        function cambiaPeriodo(periodicidad){
            //alert(periodicidad);
            switch(periodicidad){
                case 'anual':
                    periodo = 'año';
                break;
                case 'semestral':
                    periodo = 'semeste';
                break;
                case 'cuatrimestral':
                    periodo = 'cuatrimeste';
                break;
                case 'trimestral':
                    periodo = 'trimeste';
                break;
                default:
                    periodo = 'año';
                break;
            }
            document.getElementById('periodo').innerHTML = periodo;
        }
</script>
@endsection
