<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <style>
            body{
                font-family: 'Roboto', sans-serif;
                font-size: 16px;
            }
        </style>
    </head>
    <body>
        <div class="col-sm-12">
            <img src="{{url('imagenes/envioCorreo/encabezadoActivacion.png')}}" alt="Cátedra innovatic" class="image-responsive" style="width:100%"/>
        </div>
        <div class="col-sm-12">
            <h2> ¡Hola! </h2>
            <p style="padding: 10px;">Gracias por registrarte en el curso Cátedra Virtual Innovatic 2.0.</p>
            <p style="padding: 10px;">Haz clic en este <a href="{{url ('verificaCorreo')}}/{{$correo}}/{{$hash}}"> LINK </a> para concluir el proceso de validación de email, si eso no funciona, entonces
            copia y pega el link en tu navegador:</p>
            <p style="padding: 10px;">{{url ('verificaCorreo')}}/{{$correo}}/{{$hash}}</p>
        </div>
        <div class="col-sm-12" style="background-color:#94b8b8; padding-top:10px; padding-bottom:10px;">
            <p style="padding: 10px;">Te recordamos que el curso comienza el día 16 de octubre. </p> 
        </div>
            <p style="padding: 10px;">Te estaremos enviando emails de recordatorio para que seas de los primeros en acceder una vez que liberemos el módulo 1.</p>

            <p style="padding: 10px;">Si tú no creaste una cuenta, haz caso omiso de este email. <br> No recibirás más emails de nuestra parte.</p>
            <p style="padding: 10px;">Si necesitas ayuda, por favor no respondas a este email.</p>
            <p style="padding: 10px;"> Revisa la sección de contáctanos de catedrainnovatic.mx.</p>
        </div>
        <div class="col-sm-12">
            <img src="{{url('imagenes/envioCorreo/pieActivacion.png')}}" alt="pie de página" class="image-responsive" style="width:100%"/>
        </div>
    </body>
</html>
