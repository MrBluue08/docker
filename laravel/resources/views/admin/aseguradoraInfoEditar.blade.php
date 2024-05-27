<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar aseguradora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/nuevaInsuranceform.css')}}">
    <script src="{{asset('js/insurnaceEditForm.js')}}"></script>
</head>
<body class="bg-dark bg-gradient fw-bold no-repeat">
    <div class="container-fluid">
        <div class="row w-100 p-3">
            <div class="col-3">
                @include('admin.navbarAdmin')
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-6">
                        <h1 class="text-white">{{ $insurance -> insuranceName }}</h1>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-secondary mt-2" href="{{route('admin.roomInsuredList', ['CIF' => $insurance-> CIF ])}}">Salas Aseguradas</a>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-secondary mt-2" href="{{route('admin.roomInsureList', ['CIF' => $insurance-> CIF ])}}">Asegurar nuevas salas</a>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('admin.editInsurance')}}" class="w-100" method="post" id="formEditInsurance">
                    @csrf
                    <div class="form-group">
                        <label class="text-white" for="insuranceCIF">CIF:</label>
                        <input type="text" class="form-control" id="insuranceCIF" name="CIF" value="{{ $insurance -> CIF }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="text-white" for="insuranceName">Nombre: </label>
                        <input type="text" class="form-control" id="insuranceName" name="insuranceName"  value="{{ $insurance -> insuranceName }}">
                    </div>
                    <div class="form-group">
                        <label class="text-white" for="insuranceAdress">Dirección: </label>
                        <input type="text" class="form-control" id="insuranceAdress" name="insuranceAdress"  value="{{ $insurance -> insuranceAdress }}">
                    </div>
                    <div class="form-check form-switch mt-3">
                        <input class="form-check-input" name="active" type="checkbox" id="flexSwitchCheckChecked"
                        @if($insurance-> active == 1)
                            checked  
                        @elseif($insurance-> active == 0)                          
                        @endif
                            value="1" >
                        <input type="hidden" name="">
                        <label class="text-white form-check-label" for="flexSwitchCheckChecked">Activo</label>
                    </div>
                        <button class="btn btn-success mt-5 me-5" type="submit">Guardar</button>
                        <a class="btn btn-danger mt-5" href="{{route('admin.index')}}">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>