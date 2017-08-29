<!DOCTYPE html>
<html>
    <body>
        <a href="{{url ('verificaCorreo')}}/{{$correo}}/{{$hash}}"> 
            {{ HTML::image('imagenes/envioCorreo/ligaRegistro.jpg','Activa tu correo', array('class'=>'image-responsive', 'width' => 650, 'height' => 350)) }}
         </a>        
    </body>
</html>
