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
            <div class="col-8">
                <div class="row">
                    <div class="col-10">
                        <h1 class="text-white">Salas aseguradas por {{$insurance -> insuranceName}} </h1>
                    </div>
                    <div class="col-2">
                        <a class="btn btn-secondary mt-2" href="{{ route('admin.editInsuranceForm', ['CIF' => $insurance-> CIF ]) }}">Atras</a>
                    </div>
                    <div class="row">
                        <div class="col-11">
                            <?php $vuelta=1; ?>
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (count($rooms) == 0)
                                <h3 class="text-white mt-5"> No tiene salas aseguradas </h3>
                            @elseif(count($rooms)>0)
                                <form action="{{route('admin.desInsureRoom')}}" method="POST">
                                    @csrf
                                    <table class="table table-dark table-hover">
                                        <thead>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                Nombre
                                            </th>
                                            <th>
                                                Precio
                                            </th>
                                            <th>
                                                Desasegurar
                                            </th>
                                        </thead>
                                        <tbody>
                                        <input type="hidden" name="CIF" id="CIF" value="{{$insurance -> CIF }}">
                                        @foreach ($rooms as $room)
                                            <tr <?php if($vuelta==1){ echo 'class="table-active"';}?>> 
                                            <th scope="row"><?php echo $vuelta; ?></th>
                                            <td>{{$room-> roomName }}</td>
                                            <td>{{$room-> roomInsuranceCost }}</td>
                                            <td><input type="checkbox" name="salas[]" value="{{$room -> id}}"></td>
                                            </tr>
                                            <?php  $vuelta += 1; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-danger me-2">Desasegurar Selección</button>
                            </form>
                            @endif
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>