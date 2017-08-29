@extends('layouts.app')

@section('content')
<div class = "col-lg-offset-4 col-md-12">
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <a href="{{url('ventana_educativa')}}">
        {{ HTML::image('imagenes/envioCorreo/envioRegistro.png','Envío de correo para activar cuenta', array('class'=>'image-responsive', 'width' => 600, 'height' => 400)) }}
    </a>
    <br><br><br><br>
    <br><br>
</div>
@endsection