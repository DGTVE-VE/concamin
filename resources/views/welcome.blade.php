<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Innovatic</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                /*height: 100vh;*/
                margin: 0;
                /*overflow-y:hidden;*/

                width: 100%;
                height: 100%;
                overflow: hidden;
                margin: 0px;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
          #contenedorframe {
            width: 100%;
            height: 100%;
            overflow: hidden;
          }

          #registro-frame {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            border: none;
            margin-bottom: -10px;
          }

          @media screen and (-webkit-min-device-pixel-ratio:0) {
            @media screen and (max-width:768px) {
              #contenedorframe {
                overflow: auto;
            -webkit-overflow-scrolling: touch;
            }
          }
}
        </style>
    </head>
    <body>
       <div id="contenedorframe">
      <iframe src="http://catedra.grupoplenum.com"  id="registro-frame" width="100%" height="100%" style="border:none;"></iframe>
    <!-- <body> -->
        <!-- <div class="flex-center position-ref full-height"> -->
            <!-- @if (Route::has('login')) -->
                <!-- <div class="top-right links"> -->
                    <!-- @if (Auth::check()) -->
                        <!-- <a href="{{ url('/home') }}">Home</a> -->
                    <!-- @else -->
                        <!-- <a href="{{ url('/login') }}">Iniciar sesión</a>
                        <a href="{{ url('/register') }}">Registrarse</a> -->
                    <!-- @endif -->
                <!-- </div> -->
            <!-- @endif -->

            <!-- <div class="content">
                <div class="title m-b-md">
                    <img src="{{ url('imagenes/innovatic.png') }}" alt="Página en construcción" width="100%">
                </div>
                <div>
                  <h2 style="position:relative">Nos vemos el 8 de Septiembre</h2>
                </div>
            </div>
        </div> -->
    </body>
  </div>
</html>
