<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Resultados de {{$room->roomName}}</title>
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
                    <h1 class="text-center mb-3">Resultados de la sala {{$room->roomName}}</h1>
                    <?php $puntosTotales=count($teamsInfo)*1000; $puesto = 1; ?>
                    <table class="table table-striped table-secondary">
                        <thead>
                            <tr>
                                <th scope="col">Puesto</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Puntos</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($teamsInfo as $team)
                            <tr>
                                <th scope="row"><?php echo $puesto?></th>
                                <td>{{$team}}</td>
                                <td><?php echo $puntosTotales?></td>
                            </tr>
                            <?php 
                      $puntosTotales-=1000; 
                      $puesto++; ?>
                    @endforeach
                </tbody>
              </table>
                    <a class="btn btn-secondary mt-5" href="{{route('user.roomDetailsUser',['roomId' => $room->id ])}}">Volver</a>
                </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>
</html>