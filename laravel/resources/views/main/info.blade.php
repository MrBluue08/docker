<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/userIndex.css')}}">
    <title>Saber más</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            @include('main.navbarUser')
        </div>
        <div class="text-white text-center w-100">
            <div class="row">
                <div class="col-12">
                    <img src="{{asset('images/logo.png')}}" alt="Logo" width="296" height="200">
                </div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-4">
                    <h1>¿Quienes somos?</h1>
                    <p class="fs-4">Somos Scape Run, la primera empresa que busca reenfocar el estilo de las clasicas “Salas de escape” con un toque mas competitivo. Reúnete en grupos de hasta 5 jugadores para competir contra otros grupos para ver quien es capaz de resolver los misterios de nuestas habitaciones mas rapidamente.</p>
                </div>
                <div class="col-4">
                    <h1>Liga</h1>
                    <p class="fs-4">Estamos abiertos también a grupos casuales que quieran probar nuestros desafios, ¡También os aceptamos! Pero nuestro fuerte esta en las ligas, donde competiras a lo largo de los meses por ascender puestos en nuestro ranking y ganar jugosos premios. ¡Crea tu equipo ahora y apuntaos!</p>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </div>
</body>
</html>