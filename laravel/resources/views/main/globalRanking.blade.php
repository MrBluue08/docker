<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Ranking global</title>
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
                <div class="col-8 ">
                    <h1 class="text-white">Ranking global: </h1>    
                    
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-2 align-self-end  text-center">
                            <div class="align-self-end" style="color: #c0c0c0"> 
                                <p>{{$top3[1]->teamName}}</p>
                                <p>{{$top3[1]->points}}</p>
                            </div>
                            <h2 style="height: 200px;  background-color: #c0c0c0" >Top 2: </h2>
                        </div>
                        <div class="col-2 align-self-end  text-center" >
                            <div class="align-self-end" style="color: #d3af37 "> 
                                <p>{{$top3[0]->teamName}}</p>
                                <p>{{$top3[0]->points}}</p>
                            </div>
                            <h1 style="height: 300px; background-color: #d3af37 " >Top 1: </h1>
                        </div>
                        <div class="col-2 align-self-end text-center"> 
                            <div class="align-self-end" style="color: #A97142"> 
                                <p>{{$top3[2]->teamName}}</p>
                                <p>{{$top3[2]->points}}</p>
                            </div>
                            <h3 style="height: 100px; background-color: #A97142">Top 3: </h3>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row">
                        <table class="table text-white mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">Puesto</th>
                                    <th scope="col">Equipo</th>
                                    <th scope="col">Salas terminadas</th>
                                    <th scope="col">Puntuacion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $puesto=4; ?>
                                @foreach($top as $team)
                                    <tr>
                                        <th scope="row"><?php echo($puesto); ?></th>
                                        <td>{{$team->teamName}}</td>
                                        <td>{{$team->roomsDone}}</td>
                                        <td>{{$team->points}}</td>
                                    </tr>
                                <?php $puesto+=1; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>
</html>