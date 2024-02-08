<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <style>
        body{
            background-color: rgb(238, 202, 149);
        }
        h1{
            text-align: center;
            background-color:rgba(0, 0, 0, 0.76);
            color:white;
            padding:30px;
            font-size: 40px;
        }
        p{
            text-align: center;
            font-size: 20px;
        }
        .horaris{
            margin: 0 auto;

            text-align: center;
            width:300px;
            padding:20px;

            background-color:rgba(0, 0, 0, 0.76);
            color:white;
                    }

        .footer{
            text-align: right;
            background-color:rgba(0, 0, 0, 0.76);
            color:white;
            padding:30px;
            font-size: 15px;
        }
    </style>
</head>
<body>
    <h1>RESTAURANTE BOLA</h1>
    <p>La mesa se ha reservado correctamente</p>

    <p>Estimado/a {{Auth::user()->name}} {{Auth::user()->surname}}, queremos dar las gracias por confiar en nuestro restaurante y esperamos que su experiencia sea exepcional</p>    <div class="horaris">
        <p>Le recordamos los horarios de los turnos: </p>
        <p>Comidas: de 13:00 -- 16:00</p>
        <p>Cenas: de 20:00 -- 23:00</p>
    </div>
    <p>Recuerde que la reserva solo es valida hoy</p>
    <p>¡Buen provecho!</p>
    <p class="footer">© Restaurantes bola</p>
    

</body>
</html>