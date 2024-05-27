<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Mi perfil</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/userProfile.css')}}">
    <script src="{{ asset('js/teamInvitations.js') }}"></script>
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
            <div class="col-8">
                <h1 class="text-white">Invitaciones pendientes: </h1>
                <p class="text-danger">Advertencia: Solo puedes pertenecer a un equipo a la vez. Si quieres ver las invitaciones o cambiar de equipo,
                    deberas abandonar tu equipo actual</p>
                    @if(count($teams)>0)
                    <table class="table table-striped table-light">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Equipo</th>
                            <th scope="col">Lider</th>
                            <th scope="col">Puntos</th>
                            <th scope="col">Ranking</th>
                            <th scope="col">Unirse</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($teams as $team)
                            <tr>
                                <th id="teamId" scope="row">{{$team->id}}</th>
                                <td id="teamName">{{$team->teamName}}</td>
                                <td>{{$team->teamLeadMail}}</td>
                                <td>{{$team->roomsDone}}</td>
                                <td>{{$team->points}}</td>
                                <td id="enterTeamIcon" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                                    <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                                  </svg></td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                    @elseif(count($teams)<=0)
                        <h3 class="text-white">Parece que nadie te ha invitado a su equipo aun, pasate por aqui mas tarde!</h3>
                    @endif
                    <a href="{{route('userProfile', ['mail' => session('userMail')])}}" class="btn btn-secondary">Atrás</a>
            </div>
            <div class="col-2"></div>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title text-black" id="staticBackdropLabel">Confirmación: </h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body"> 
                           
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <form action="{{route('user.joinTeam')}}" method="post">
                                @csrf
                                <input type="hidden" name="teamId" id="teamId" value="">
                                <button type="submit" class="btn btn-success">Unirme</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>