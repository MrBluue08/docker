<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Sala {{$room->roomName}}</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/userProfile.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            @include('main.navbarUser')
        </div>
        <div class="row mt-5">
            <div class="col-2"></div>
                <div class="col-8 text-white">
                    <div class="row">
                        <img src="{{asset('storage/roomImg/'.$room->roomPromotionImg)}}" class="img-fluid banner-room mb-4"  alt="Imagen promocional de la sala {{$room->roomName}}">
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <img src="{{asset('storage/roomImg/'.$room->roomStructueImg)}}" class="img-fluid structure-room" alt="Imagen estructural de la sala {{$room->roomName}}">
                        </div>
                        <div class="col-7">
                            <div class="row">
                                <h2>Escape {{$room->roomName}}</h2>
                            </div>
                            <div class="row">
                                <p>{{$room->roomDescription}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 mb-5">
                        <h2>Detalles de la sala:</h2>
                        <div class="col-6">
                            <p>Capacidad maxima: </p>
                            <p>Equipos apuntados: </p>
                            <p>Tiempo maximo: </p>
                            <p>Fecha: </p>
                            <p>Hora: </p>
                            <p>Precio por equipo: </p>
                        </div>
                        <?php 
                            $fechaHora = new DateTime($room->roomDate);
                            // Extraer la fecha en formato dd-mm-yyyy
                            $fechaFormateada = $fechaHora->format('d-m-Y');
                            // Extraer la hora en formato hh:mm
                            $horaFormateada = $fechaHora->format('H:i');
                        ?>
                        <div class="col-6 text-end">
                            <p>{{$room->roomMaxTeams}}</p>
                            <p>{{$room->roomTotalTeams}}</p>
                            <p>{{$room->roomMaxTime}} min</p>
                            <p><?php echo $fechaFormateada; ?></p>
                            <p><?php echo $horaFormateada; ?></p>
                            <p>{{$room->roomInscriptionPrice}} €</p>
                        </div>
                    </div>
                    <div class="row mb-5">
                    <?php
                    $roomDay = new DateTime($room->roomDate);
                    $currentDay = new DateTime();
                    if($currentDay < $roomDay){
                        echo'
                        <div class= "col-6">';
                            ?>
                                <a class="btn btn-primary" href="{{route('loadPayment', ['roomId' => $room->id ])}}">Inscribirme</a>
                            <?php                        
                        echo '</div>';
                        
                    }else{
                        echo'
                    <div class="col-6">';
                        ?>
                        <a class="btn btn-primary" href="{{route('user.roomResults', ['roomId' => $room->id])}}">Consultar resultados</a>
                        <?php
                        echo'
                    </div>    
                    <div class="col-6 text-end">
                        <a class="btn btn-primary" href="{{route("user.imageCarousel")}}">Recuerda el día con nuestra sección de fotos</a>
                    </div>  
                        ';
                    }
                    ?>
                    </div>
                </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>
</html>