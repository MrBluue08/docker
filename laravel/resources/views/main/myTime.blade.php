<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/userIndex.css')}}">
    <title>Tiempo de mi equipo</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            @include('main.navbarUser')
        </div>
        <div class="w-100 row">
            <div class="col-3"></div>
            <div class="mt-5 bg-light rounded col-6">
                <h1>Registro de tiempo de sala</h1>
                <h3>Sala: {{ $room->roomName }}</h3>
                <h3>Equipo: {{ $team->teamName }}</h3>
                <h3>Tiempo: {{ $signUp->tiempo }}</h3>
                <h3>Dorsal: {{ $signUp->dorsal }}</h3>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</body>
</html>