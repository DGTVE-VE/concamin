@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<style>
    p{
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
    }
</style>
<div class = "col-lg-offset-2 col-lg-8 col-md-12">
    <br><br>
    <div class="col-sm-12">
        <h2><p style="padding:20px;">Se ha registrado correctamente a Cátedra Virtual Innovatic.</p></h2>

        <p style="padding:20px;">Hemos enviado un mensaje a su cuenta de correo. En unos minutos le llegará el correo de validación, en caso de que no le haya llegado después de unos minutos por favor revise su bandeja de SPAM.</p>
    </div>
    <div class="col-sm-12">
        <a href="{{url('/home')}}">
            <img src="{{url('imagenes/envioCorreo/envioRegistro.png')}}" alt="Envío de correo para activar cuenta" class="image-responsive"/>
        </a>
    </div>
    <div class="col-sm-12">
        <br>
        <p style="padding:20px;">Si no recibió el correo, por favor verifique que haya escrito correctamente su dirección en el registro e intente de nuevo.</p>
    </div>

    <br><br>
</div>
@endsection