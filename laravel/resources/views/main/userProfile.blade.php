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
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="row text-white">
                        @if($userInfo->userGender == 'male')
                            <h1>Bienvenido {{$userInfo->userName}} </h1>
                        @elseif($userInfo-> userGender == 'female')
                            <h1>Bienvenida {{$userInfo->userName}} </h1>
                        @elseif($userInfo->userGender == 'non binary')
                            <h1>Bienvenide {{$userInfo->userName}} </h1>
                        @endif
                    </div>
                    <div class="row mt-5">
                        <div class="col-8 text-white">
                            <h4>Información de contacto:</h4>
                            <p class="ms-4"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1"/>
                              </svg>Correo:<small> {{$userInfo->userMail}}</small></p>
                            <p class="ms-4"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1"/>
                              </svg>Nombre: <small> {{$userInfo->userName}} {{$userInfo->userSurname}}</small></p>
                            <?php 
                                $fecha_nacimiento = $userInfo->userBirthDay;
                                $fecha_nacimiento_dt = new DateTime($fecha_nacimiento);
                                $hoy = new DateTime();
                                $diferencia = $fecha_nacimiento_dt->diff($hoy);
                                $edad = $diferencia->y;
                            ?>
                            <p class="ms-4"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1"/>
                              </svg>Edad:<small> <?php echo($edad)?></small></p>
                            <p class="ms-4"> <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1"/>
                              </svg>Direccion:<small> {{$userInfo->userAdress}}</small></p>
                        </div>
                        <div class="col-4 text-white">
                            @if($userInfo->teamId == 0)
                                <a href="{{route('user.pendingInvites', ['mail' => session('userMail')])}}" class="ms-5">Tienes ({{$pendingInvites}}) invitaciones pendientes</a>
                            @elseif($userInfo->teamId != 0)
                                <p class="ms-5">Consulte aqui sus resultados anteriores</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            @if($userInfo->teamId == 0)
                                <p class="text-white">Aun no formas parte de ningun equipo, desdeas crear el tuyo propio?</p>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <small> ¡Clic aqui!</small></button>
                                <form action="{{route('user.createTeam')}}" method="post">
                                    @csrf
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 class="modal-title text-info" id="staticBackdropLabel">Creación de equipo: </h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body"> 
                                                    <div class="form-group">
                                                        <label for="teamName">Nombre del equipo: </label>
                                                        <input type="text" class="form-control" id="teamName" name="teamName" aria-describedby="teamNameHelp" placeholder="Introduzca el nombre del equipo">
                                                        <small id="teamNameHelp" class="form-text text-muted">Podrá cambiar el nombre más adelante si lo desea.</small>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="leagueParticipantCheck" aria-describedby="leagueParticipantCheckHelp">Marque esta casilla si desea participar en la liga     </label>
                                                        <input type="checkbox" class="form-check-input" id="leagueParticipantCheck" name="leagueParticipantCheck">
                                                        <small id="leagueParticipantCheckHelp" class="form-text text-muted">Si participa en la liga, se le descontará del precio final el costo de las aseguradoras, 
                                                            participará en el ranking de liga y, al finalizar el año, recibirá un premio si queda en el top 3</small>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-success" >Crear</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @elseif($userInfo->teamId != 0)
                                <h4 class="text-white">Equipo {{$teamInfo->teamName}}: </h4>
                                <table class="table table-striped table-light">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Correo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $vuelta=1?>
                                        @foreach($teamMembers as $member)
                                        <tr>
                                            <th scope="row">
                                                @if($member->userMail == $teamInfo->teamLeadMail)
                                                    Capitan
                                                @elseif($member->userMail != $teamInfo->teamLeadMail)
                                                    <?php echo($vuelta);?>
                                                @endif
                                            </th>
                                            <td>{{$member->userName}} {{$member->userSurname}}</td>
                                            <td>{{$member->userMail}}</td>
                                        </tr>
                                        <?php $vuelta+=1;?>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    @if($userInfo->userMail == $teamInfo->teamLeadMail)
                                        <div class="col-3">
                                            <a href="{{route('user.editTeam')}}" class="btn btn-secondary"> <small>Editar Equipo</small> </a>
                                        </div>
                                    @elseif($userInfo->userMail != $teamInfo->teamLeadMail)
                                        <div class="col-3"> 
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <small> Abandonar equipo</small></button>
                                        </div>
                                            
                                        @endif
                                        @if($teamInfo->leagueParticipant == 1)
                                        <div class="col-3">
                                            <a href=""> <small>Ranking de liga</small> </a>
                                        </div>
                                    @endif
                                    <div class="col-3">
                                        <a class="btn btn-primary" href="{{route('user.openGlobalRanking')}}">Ranking Global</a>
                                    </div>
                                </div>
                                </div>
                                <div class="col-4">
                                    <div class="ms-5 mt-5">
                                        @if($teamInfo->leagueParticipant == 1)
                                            <p class="text-white">Ranking: {{$position}}</p>
                                        @endif
                                        <p class="text-white">Salas terminadas: {{$teamInfo->roomsDone }}</p>
                                        <p class="text-white">Puntos: {{$teamInfo->points }}</p>
                                    </div>
                                </div>
                                <form action="{{route('user.leaveTeam')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="userMail" id="userMail" value="{{session('userMail')}}">
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 class="modal-title text-danger" id="staticBackdropLabel">¡ADVERTENCIA!</h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body"> 
                                                    <h4 class="text-black">Esta apunto de abandonar <br>
                                                        el equipo {{$teamInfo->teamName}} <br>
                                                        ¿Esta seguro?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-danger" >Abandonar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endif
                    </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>
</html>