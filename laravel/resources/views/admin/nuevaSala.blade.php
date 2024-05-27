<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nueva Sala</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/nuevaInsuranceform.css')}}">
    <script src="{{asset('js/nuevaSalaForm.js')}}"></script>
</head>
<body class="bg-dark bg-gradient fw-bold no-repeat">
    <div class="container-fluid">
        <div class="row w-100 p-3"> 
            <div class="col-3">
                @include('admin.navbarAdmin')
            </div>
            <div class="col-9">
                <div class="row">
                    <div class="col-10">
                        <h1  class="text-white"> Nueva Sala <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
                            <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/></svg>
                        </h1>
                    </div>
                    <div class="col-2">
                        <a class="btn btn btn-secondary" href="{{route('createRoomForm')}}" role="button">Registrar sala</a>
                    </div>
                </div>
                <div>
                    <form action="{{route('storeRoom')}}"  class="row g-3" method="post" id="formNewRoom" enctype="multipart/form-data">
                      @csrf
                          <div class="col-md-12">
                            <label for="inputName" class="text-white">Nombre: </label>
                            <input type="text" class="form-control" id="inputName" placeholder="Introduzca el nombre de la sala" name="roomName">
                          </div>
                          <div class="col-md-12">
                            <label for="inputDescription" class="text-white">Descripcion: </label>
                            <textarea class="form-control" id="inputDescription" rows="3" placeholder="Introduzca la descrpción aqui (máximo 255 caracteres)" name="roomDescription" maxlength="255"></textarea>
                          </div>
                          <div class="col-md-12">                       
                              <label for="inputDate" class="text-white">Fecha y hora: </label>
                              <input type="datetime-local" class="form-control" id="inputDate" name="roomDate" required>                                                   
                          </div>
                          <div class="col-md-6">
                            <label for="inputMaxCapacity" class="text-white">Capacidad Máxima: </label>
                            <input type="number" class="form-control" id="inputMaxCapacity" placeholder="Maximo de equipos posibles" name="roomMaxCapacity" required>
                          </div>
                          <div class="col-md-6">
                            <label for="inputMaxTime" class="text-white">Tiempo limite (en minutos) : </label>
                            <input type="number" class="form-control" id="inputMaxTime" placeholder="Tiempo maximo establecido" name="roomMaxTime" required>
                          </div> 
                          <div class="col-md-3">
                            <label for="inputPromoCost" class="text-white">Costo de promocion: </label>
                            <input type="number" class="form-control" id="inputPromoCost"  name="roomPromoCost" required>
                          </div>
                          <div class="col-md-3">
                            <label for="inputInsuranceCost" class="text-white">Costo asegurar: </label>
                            <input type="number" class="form-control" id="inputInsuranceCost"  name="roomInsuranceCost" required>
                          </div>
                          <div class="col-md-3">
                            <label for="inputBaseCost" class="text-white">Costo base: </label>
                            <input type="number" class="form-control" id="inputBaseCost"  name="roomBaseCost" required>
                          </div>
                          <div class="col-md-3">
                            <label for="inputTotalCost" class="text-white">Costo total: </label>
                            <input type="number" class="form-control" id="inputTotalCost"  name="roomTotalCost" required readonly>
                          </div>
                          <div class="col-md-6">
                            <label for="inputPromotionalImage" class="text-white">Imagen Promocional: </label>
                            <input type="file" class="form-control" id="inputPromotionalImage"  name="roomPromotionalImage" required>
                          </div>
                          <div class="col-md-6">
                            <label for="inputStrcutureImage" class="text-white">Estructura de la sala: </label>
                            <input type="file" class="form-control" id="inputStrcutureImage"  name="roomEstructureImage" required>
                          </div>
                          <div class="col-md-6">
                            <img src="{{asset('storage/sponsorLogo/preview.png')}}" alt="logo sponsor" class="preview-img text-white" id="imgPreProm">
                          </div>
                          <div class="col-md-6">
                            <img src="{{asset('storage/sponsorLogo/preview.png')}}" alt="logo sponsor" class="preview-img text-white" id="imgPreSt">
                          </div>
                          <div class="mt-3 text-end">
                            <button type="submit" class="btn btn-success me-2">Crear</button>
                            <a href="{{route('listRoom')}}" class="btn btn-danger" > Cancelar </a>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>