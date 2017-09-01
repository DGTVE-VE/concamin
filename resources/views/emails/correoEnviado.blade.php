@extends('layouts.app')

@section('content')
<div class = "col-lg-offset-4 col-lg-8 col-md-12">
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <div class="col-sm-12">{{$mensaje}}</div>
    <div class="col-sm-12">
        <a href="{{url('/home')}}">
            <img src="{{url('imagenes/envioCorreo/envioRegistro.png')}}" alt="Envío de correo para activar cuenta" class="image-responsive" style="width:600px; height:400px;"/>
        </a>
    </div>
    <br><br><br><br>
    <br><br>
</div>
@endsection