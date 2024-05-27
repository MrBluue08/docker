<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva aseguradora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/nuevaInsuranceform.css')}}">
</head>
<body class="bg-dark bg-gradient fw-bold no-repeat">
    <div class="container-fluid">
        <div class="row w-100 p-3">
            <div class="col-3">
                @include('admin.navbarAdmin')
            </div>
            <div class="col-6">
                <h1 class="text-white">Nueva aseguradora</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('admin.storeInsurance')}}" class="w-100" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="text-white" for="insuranceCIF">CIF:</label>
                        <input type="text" class="form-control" id="insuranceCIF" name="CIF" placeholder="Introduzca el CIF de la empresa aqui">
                    </div>
                    <div class="form-group">
                        <label class="text-white" for="insuranceName">Nombre: </label>
                        <input type="text" class="form-control" id="insuranceName" name="insuranceName" placeholder="Introduzca el nombre de la empresa aqui">
                    </div>
                    <div class="form-group">
                        <label class="text-white" for="insuranceAdress">Dirección: </label>
                        <input type="text" class="form-control" id="insuranceAdress" name="insuranceAdress" placeholder="Introduzca la dirección de la empresa aqui">
                    </div>
                        <button class="btn btn-success mt-5" type="submit">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>