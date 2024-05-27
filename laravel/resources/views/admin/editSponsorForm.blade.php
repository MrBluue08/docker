<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor sponsors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/sponsorForm.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/sponsorForm.css')}}">
</head>
<body class="bg-dark bg-gradient fw-bold no-repeat">
    <div class="container-fluid">
        <div class="row w-100 p-3">
            <div class="col-3">
                @include('admin.navbarAdmin')
            </div>
            <div class="col-6">
                <h1 class="text-white">{{ $sponsor -> sponsorName }}</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('editSponsor')}}" class="w-100" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="custom-file w-50">
                        <img src="{{ asset('storage/sponsorLogo/'.$sponsor->sponsorLogo) }}" alt="{{$sponsor->sponsorLogo}}" class="preview-img" id="img">
                        <input type="file" class="custom-file-input" id="logo" name="logo">
                        <label class="btn bg-light" for="logo">Cambiar imagen</label>
                    </div>
                    <div class="form-group">
                        <label class="text-white" for="sponsorCIF">CIF:</label>
                        <input type="text" class="form-control" id="sponsorCIF" name="sponsorCIF" value="{{ $sponsor -> CIF }}">
                    </div>
                    <div class="form-group">
                        <label class="text-white" for="sponsorName">Nombre: </label>
                        <input type="text" class="form-control" id="sponsorName" name="sponsorName"  value="{{ $sponsor -> sponsorName }}">
                    </div>
                    <div class="form-group">
                        <label class="text-white" for="sponsorAdress">Dirección: </label>
                        <input type="text" class="form-control" id="sponsorAdress" name="sponsorAdress"  value="{{ $sponsor -> sponsorAdress }}">
                    </div>
                    <div class="form-check form-switch">
                        @if($sponsor->mainPage == 1)
                            <input class="form-check-input" type="checkbox" id="mainPage" name="mainPage" checked>
                        @else
                            <input class="form-check-input" type="checkbox" id="mainPage" name="mainPage">
                        @endif
                        <label class="form-check-label text-white" for="mainPage">Pagina principal</label>
                    </div>

                    <div class="form-check form-switch">
                        @if($sponsor->active == 1)
                            <input class="form-check-input" type="checkbox" id="active" name="active" checked>
                        @else
                            <input class="form-check-input" type="checkbox" id="active" name="active">
                        @endif
                        <label class="form-check-label text-white" for="active">Activo</label>
                    </div>
                    <button class="btn btn-success mt-5 me-5" type="submit">Guardar</button>
                    <a class="btn btn-danger mt-5" href="{{route('listSponsor')}}">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>