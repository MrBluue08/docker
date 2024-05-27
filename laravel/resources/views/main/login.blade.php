<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/loginUser.css') }}">
    <title>Login</title>
</head>
<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container">
        <input type="checkbox" id="flip">
        <div class="cover">
          <div class="front">
            <div class="text">
            </div>
          </div>
          <div class="back">
            <div class="text">
              <span class="text-1">Adentrate en lo desconocido</span>
            </div>
          </div>
        </div>
        <div class="forms">
            <div class="form-content">
              <div class="login-form">
                <img src="{{asset('images/logoFondoBlanco.png')}}" alt="Logo" width="200" height="135">
                <div class="title">Login</div>
              <form action="{{route('user.login.auth')}}" method="post">
                @csrf
                <div class="input-boxes">
                  <div class="input-box">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Enter your email" name="mail">
                  </div>
                  <div class="input-box">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Enter your password" name="passwd">
                  </div>
                  <div class="button input-box">
                    <input type="submit" value="Entrar">
                  </div>
                  <div class="text sign-up-text">Aun no tienes cuenta? <label for="flip">Registrate aqui</label></div>
                </div>
            </form>
          </div>
            <div class="signup-form">
            <img src="{{asset('images/logoFondoBlanco.png')}}" alt="Logo" width="200" height="135">
              <div class="title">Registro</div>
            <form action="{{route('user.register')}}" method="post">
                @csrf
                <div class="input-boxes">
                  <div class="input-box">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Introduce tu nombre" name="name">
                  </div>
                  <div class="input-box">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Introduce tu apellido" name="surname">
                  </div>
                  <div class="input-box">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Introduce tu email" name="mail">
                  </div>
                  <div class="input-box">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Introduce tu direccion" name="adress">
                  </div>
                  <div class="input-box">
                    <label for="date">Fecha de nacimiento</label>
                    <input type="date" name="birthDate">
                  </div>
                  <div class="input-box">
                    <label for="gender">Genero</label>
                    <select name="gender" id="gender" class="fa-user" name="gender">
                        <option value="male">Hombre</option>
                        <option value="female">Mujer</option>
                        <option value="">No binarie</option>
                    </select>
                  </div>
                  <div class="input-box">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Introduce tu contraseña" name="passwd">
                  </div>
                  <div class="input-box">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Introduce tu contraseña de" name="passwdAgain">
                  </div>
                  <div class="button input-box">
                    <input type="submit" value="Registrarse">
                  </div>
                  <div class="text sign-up-text">Ya tienes cuenta?<label for="flip">Entra aqui</label></div>
                </div>
          </form>
        </div>
        </div>
        </div>
      </div>
</body>
</html>