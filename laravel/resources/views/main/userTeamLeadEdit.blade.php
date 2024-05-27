<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                    <div class="row">
                        @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <div class="row">
                            <h2 class="text-white col-10">Miembros:</h2>
                            <button type="button" class="btn btn-danger btn-sm col-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><small>Eliminar Equipo</small></button>
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title text-danger" id="staticBackdropLabel">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                                        <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                                                        <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                                                    </svg>
                                                    ¡ADVERTENCIA!   
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                                        <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                                                        <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                                                    </svg> 
                                                </h2>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body"> 
                                                <p>
                                                    Esta a punto de eliminar su equipo. Todos los demas jugadores serán expulsados. ¿Desea continuar?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <a href="{{route('user.destroyTeam')}}" class="btn btn-danger" >Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        @if(count($teamMembers)<=1)
                            <p class="text-white">Aun no has invitado ningun miembro</p>
                        @elseif(counter($teamMembers>1))
                            <table class="table table-striped table-light mt-5">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre </th>
                                        <th scope="col">Correo </th>
                                        <th scpoe="col">Expulsar </th>
                                    </tr>
                                </thead>
                                <tbody>                                
                                    @foreach($teamMembers as $member)
                                        @if($member->userMail != session('userMail'))
                                        <tr>
                                            <th scope="row"> {{$member->id}} </th>
                                            <td>{{$member->userName}} {{$member->userSurname}}</td>
                                            <td>{{$member->userMail}}</td>
                                            <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                            </svg>
                                            </td>
                                        </tr>
                                        @endif                               
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <div class="row">
                        <h2 class="text-white">Invitar usuarios:</h2>
                        @if(count($teamMembers)<5)
                        <div class="table-responsive">
                            <table class="table table-striped table-light">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre </th>
                                        <th scope="col">Correo </th>
                                        <th scpoe="col">Invitar </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <div id="list">
                                    <form action="{{route('user.inviteUsers')}}" method="post">
                                        @csrf
                                        @foreach($freeUsers as $user)
                                            <tr>
                                                <th scope="row"> {{$user->id}} </th>
                                                <td>{{$user->userName}} {{$user->userSurname}}</td>
                                                <td>{{$user->userMail}}</td>
                                                <td><input type="checkbox" name="invitaciones[]" value="{{$user->userMail}}"></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </div>
                            </table>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Invitar Usuarios</button>
                                </form>
                        @elseif(count($teamMembers)>=5)
                                <p class="text-warning">Capacidad maxima alcanzada</p>
                                <p class="text-white">Debe expulsar un miembro de su equipo antes de invitar a otro </p>
                        @endif
                </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>
</html>