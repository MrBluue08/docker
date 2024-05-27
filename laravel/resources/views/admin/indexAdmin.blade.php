<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Main</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/indexAdmin.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body class="bg-dark bg-gradient fw-bold">
  <div class="container-fluid">
    <div class="row">
      <div class="col-3">
        @include('admin.navbarAdmin')
      </div>
      <div class="col-9">
        <div class="col">
          <h1 class="text-white">Proximas salas</h1>
          <div class="row">
            @foreach($incomingRooms as $room)
            <div class="col-4">
              <div class="card bg-dark h-100" style="width: 18rem;">
                <img src="{{asset('images/placeholderImagenProm.png')}}" class="img-fluid rounded-start" alt="{{$room->roomName}}">
                <div class="card-body">
                  <h5 class="card-title text-white">{{$room->roomName}}</h5>
                  <p class="card-text text-white">{{$room->roomDescription}}</p>
                  <p class="card-text text-white"><small class="text-muted">Equipos apuntados {{$room->roomTotalTeams}}/{{$room->roomMaxTeams}} Equipos maximo</small></p>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-6">
                      <a href="{{route('admin.editRoomForm',['roomId' => $room-> id ])}}" class="btn btn-primary">Detalles</a>
                    </div>
                    <div class="col-6">
                      <a href="{{route('listParties',['roomId' => $room->id ])}}" class="btn btn-primary">Participantes</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
        </div>
        </div>
        <div class="row">
          <div class="col-11">
            <h1  class="text-white" >Top 5</h1>
            <table class="table table-dark table-hover">
              <thead>
                  <th>
                      #
                  </th>
                  <th>
                      Nombre
                  </th>
                  <th>
                      Salas Ganadas
                  </th>
                  <th>
                      Capitan 
                  </th>
              </thead>
              <tbody>
                <?php $vuelta=1; ?>
                @foreach ($topFive as $team)
                  <tr <?php if($vuelta==1){ echo 'class="table-active"';}?>> 
                    <th scope="row"><?php echo $vuelta; ?></th>
                    <td>{{$team-> teamName }}</td>
                    <td>{{$team-> roomsDone }}</td>
                    <td>{{$team-> teamLeadMail}}</td>
                  </tr>
                  <?php  $vuelta += 1; ?>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>