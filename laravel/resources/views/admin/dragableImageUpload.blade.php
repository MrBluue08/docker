<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Editar Sala</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/imageUploader.css')}}">
    <script src="{{asset('js/massUpload.js')}}"></script>
</head>
<body class="bg-dark bg-gradient fw-bold no-repeat">
    <div class="container-fluid">
        <div class="row w-100 p-3"> 
            <div class="col-3">
                @include('admin.navbarAdmin')
            </div>
            <div class="col-9">
                <h1 class="h4 mb-3 text-white">Guardar fotos de la carrera</h1>
                <div id="drop-area">
                    <form class="my-form">
                        @csrf
                        <input type="hidden" id="roomId" name="roomId" value="{{$roomId}}">
                        <p class="text-white">Arrastre aqui sus imagenes <br> o <br></p>
                        <input type="file" id="fileElem" multiple accept="image/*" onchange="handleFiles(this.files)">
                        <label class="button btn btn-primary" for="fileElem">Haga clic aqui</label>
                    </form>
                    <progress id="progress-bar" max=100 value=0></progress>
                    <div id="gallery"></div>
                  </div>
                  <a href="{{route('admin.editRoomForm',['roomId' => $roomId ])}}" class="btn btn-secondary mt-3">Atrás</a>
            </div>
        </div>
    </div>
</body>
</html>

