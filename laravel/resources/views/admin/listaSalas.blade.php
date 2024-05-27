<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Salas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/nuevaInsuranceform.css')}}">
    <script src="{{ asset('js/popUpSponsor.js') }}"></script>
    <script src="{{ asset('js/search.js') }}"></script>
    <script>
        $.ajaxSetup({headers: {'csrftoken' : '{{ csrf_token() }}'}})
    </script>
</head>
<body class="bg-dark bg-gradient fw-bold no-repeat">
    <div class="container-fluid">
        <div class="row w-100 p-3"> 
            <div class="col-3">
                @include('admin.navbarAdmin')
            </div>
            <div class="col-9">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-10">
                        <h1  class="text-white"> Salas <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
                            <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
                          </svg>
                        </h1>
                    </div>
                    <div class="col-2">
                        <a class="btn btn btn-secondary" href="{{route('createRoomForm')}}" role="button">Registrar sala</a>
                    </div>
                    <div>
                        <input type="text" name="searchBar" id="searchBar" class="form-control me-2 mb-5" placeholder="Buscar sala por nombre">
                        <input type="hidden" id="typeSearch" value="/admin/searchRoom">
                    </div>
                </div>
                <div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="row row-cols-2 g-5" id="list">
                    @foreach ($rooms as $room)
                        <div class="col">
                            <div class="card bg-dark h-100" style="width: 25rem">
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
                                    @if(!$sponsor)
                                    <a href="{{route('admin.editRoomForm',['roomId' => $room->id ])}}" class="btn btn-primary mt-3">Detalles</a>
                                    <a href="{{route('listParties',['roomId' => $room->id ])}}" class="btn btn-primary mt-3">Participantes</a>
                                    @else
                                    <button id="{{ $sponsor.','.$room->id }}" class="btn btn-primary mt-3 popUp">Sponsorizar</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    {{$rooms->links()}}
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>