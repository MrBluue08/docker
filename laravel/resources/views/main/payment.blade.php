<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/userProfile.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            @include('main.navbarUser')
        </div>
        <div class="container text-white">
            <h2>Datos del pago para {{$room->roomName}}:</h2>
            <form>
                <div class="mb-3">
                    <label for="firstName" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="firstName" placeholder="Introduce tu nombre">
                </div>
                <div class="mb-3">
                    <label for="lastName" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="lastName" placeholder="Introduce tu apellido">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="email" placeholder="Introduce tu correo">
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Edad</label>
                    <input type="date" class="form-control" id="date">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="saveData">
                    <label class="form-check-label" for="saveData">Marque esta casilla si desea guardar sus datos para futuros pagos</label>
                </div>
                <div class="card p-3 bg-dark">
                    <div class="mb-3">
                        <label for="dateDisplay" class="form-label">Fecha:</label>
                        <input type="text" class="form-control" id="dateDisplay" value="{{$room->roomDate}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="maxTime" class="form-label">Tiempo máximo:</label>
                        <input type="text" class="form-control" id="maxTime" value="{{$room->roomMaxTime}}" disabled>
                    </div>
                    @if($user->member === 0)
                    <div class="mb-3">
                        <label for="price" class="form-label">Precio:</label>
                        <input type="text" class="form-control" id="price" value="{{$room->roomInscriptionPrice}}" disabled>
                    </div>
                    @else
                    <div class="mb-3">
                        <label for="price" class="form-label">Precio:</label>
                        <input type="text" class="form-control" id="price" value="{{$room->roomInscriptionPriceMembers}}" disabled>
                    </div>
                    @endif
                    <button type="button" class="btn btn-warning w-25">
                        <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" alt="PayPal">
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>