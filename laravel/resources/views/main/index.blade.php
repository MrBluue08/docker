<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/userIndex.css')}}">
    <title>Pagina Principal</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            @include('main.navbarUser')
        </div>
        <div class="d-flex flex-column align-items-center w-100 mt-5 mb-5">
            <div class="w-50 text-center">
                <h1 class="text-white">Bienvenidos al primer modelo de escape room competitivo</h1>
            </div>
            <div class="w-50 text-center mb-5">
                <a href="/main/info" class="btn btn-success text-white buttons">Saber más</a>
                <a href="" class="btn btn-danger text-white buttons">Scape room común</a>
            </div>
            <div class="w-50 text-center mb-5">
                <h1 class="text-white">Unete junto hasta 4 compañeros más y desafia a los demas grupos por un puesto como los mejores escapistas del mundo.
                    Tambien podeis pasar por nuestras salas para poner a prueba vuestro ingenio de la forma tradicional.</h1>
            </div>
            <div class="w-50 text-center">
                <h1 class="text-white">Proximos eventos!</h1>
            </div>
            <div class="d-flex flex-row mb-5">
                @foreach($rooms as $room)
                <div class="col">
                    <div class="card bg-dark h-100 mx-2" style="width: 20rem">
                        <img src="{{asset('images/placeholderImagenProm.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-white">{{$room->roomName }}</h5>
                            <p class="text-white">Tiempo límite: {{$room-> roomMaxTime}} min</p>
                            @php
                                $fecha = date('d-m-Y', strtotime($room->roomDate));
                                $hora = date('H:i', strtotime($room->roomDate));
                                $valueNow= ($room->roomTotalTeams * 100)/($room->roomMaxTeams);
                            @endphp
                            <p class="text-white">Fecha: {{ $fecha }} {{ $hora }}</p>
                            <p class="text-white">Participacion: </p>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped 
                                @if($valueNow < 33)
                                    bg-success
                                @elseif($valueNow >= 33 && $valueNow <= 66)
                                    bg-warning
                                @elseif($valueNow > 66)
                                    bg-danger
                                @endif
                                progress-bar-animated" role="progressbar" aria-valuenow="<?php echo intval($valueNow)?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo intval($valueNow)?>%"> <?php echo intval($valueNow)?>% </div>
                            </div>
                            <a href="{{route('user.roomDetailsUser',['roomId' => $room->id ])}}" class="btn btn-primary mt-3">Detalles</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        {{-- botones para ir a ese numero de imagen (bucle 1 con contador) --}}
                        <?php $slide=0 ?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $slide; ?>" class="active" data-interval="5000"></li>
                        @foreach($sponsors as $sponsor)
                            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $slide; ?>" ></li>
                            <?php $slide+=1 ?>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                       {{-- Aqui van las imagenes, bucle 2 con los links --}}
                        <?php $numeroImg=0; ?>
                        <div class="carousel-item active" data-interval="5000">
                            <img class="d-block w-100" src="{{asset('storage/sponsorLogo/agradecimiento.jpg')}}" alt="Imagen de agradecimiento" style="height: 400px; width:600px">
                        </div>
                        @foreach($sponsors as $sponsor)
                            <div class="carousel-item" style="heigth: 400px; width:600px">
                                <img class="d-block w-100" src="{{asset('storage/sponsorLogo/'.$sponsor->sponsorLogo)}}" alt="Logo de {{$sponsor->sponsorName}}" style="height: 400px; width:600px">
                            </div>
                            <?php $numeroImg+=1; ?>
                        @endforeach 
                      
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>   
    </div>
</body>
</html>