@extends('layouts.app')

@section('content')
<div class = "col-lg-offset-2 col-lg-8 col-md-12">
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <div class="col-sm-12">
        <p>Se ha registrado correctamente a Cátedra Virtual Innovatic.</p>

        <p>Hemos enviado un mensaje a su cuenta de correo. En unos minutos le llegará el correo de validación, en caso de que no le haya llegado después de unos minutos por favor revisar su bandeja de SPAM.</p>

        <p>Si no recibió el correo por favor verifique que haya escrito correctamente su correo en el registro eintente de nuevo.</p>
    </div>
    <div class="col-sm-12">
        <a href="{{url('/home')}}">
            <img src="{{url('imagenes/envioCorreo/envioRegistro.png')}}" alt="Envío de correo para activar cuenta" class="image-responsive" style="width:600px; height:400px;"/>
        </a>
    </div>
    <br><br><br><br>
    <br><br>
</div>
@endsection