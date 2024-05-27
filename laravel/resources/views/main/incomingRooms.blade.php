<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/userIndex.css')}}">
    <script src="{{ asset('js/search.js') }}"></script>
    <title>Proximas salas</title>
</head>
<body>
    <div class="container-fluid w-100">
        <div class="row">
            @include('main.navbarUser')
        </div>
        <div class="w-100 text-center">
            <input type="text" id="searchBar" name="searchBar" placeholder="Buscar salas" class="w-50 mb-2 mt-2 rounded">
            <input type="hidden" id="typeSearch" value="/main/searchRoom">
            <div class="row w-100 text-start" id="list">
            @foreach ($incoming as $room)
                <div class="col d-flex justify-content-center mb-1">
                    <div class="card bg-dark h-100 text-start" style="width: 18rem">
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
        </div>
    </div>
</body>
</html>