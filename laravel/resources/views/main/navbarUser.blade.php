<div class="bg-light w-100 h-80">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="row">
                <div class="col-2">
                    <img src="{{asset('images/logoFondoBlanco.png')}}" alt="Logo" width="148" height="100">
                </div>
                <div class="col-10">
                    <nav class="mt-4">
                        <ul class="nav justify-content-end">
                            <li class="nav-item">
                              <a class="nav-link active" href="{{route('user.main')}}">Inicio</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{route('user.incomingRooms')}}">Salas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('user.openGlobalRanking')}}">Ranking Global</a>
                              </li>
                            @if(session('userMail')==null)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('user.login')}}">Iniciar Sesión/Registrarse</a>
                                </li>
                            @elseif(session('userMail')!=null)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('userProfile', ['mail' => session('userMail')])}}">Mi Perfil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-danger" href="{{route('user.logout')}}">Cerrar Sesión</a>
                                </li>
                            @endif
                          </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>