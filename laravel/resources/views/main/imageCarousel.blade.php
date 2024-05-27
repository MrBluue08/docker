<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Imagenes</title>
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
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            {{-- botones para ir a ese numero de imagen (bucle 1 con contador) --}}
                            <?php $slide=0 ?>
                            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $slide; ?>" class="active" data-interval="5000"></li>
                            @foreach($roomImg as $img)
                                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $slide; ?>" ></li>
                                <?php $slide+=1 ?>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                           {{-- Aqui van las imagenes, bucle 2 con los links --}}
                            <?php $numeroImg=0; ?>
                            <div class="carousel-item active" data-interval="5000">
                                <img class="d-block w-100" src="{{asset('storage/coursesImg/ruta.jpg')}}" alt="Imagen numero  <?php echo $numeroImg; ?>" style="height: 400px; width:600px">
                            </div>
                            @foreach($roomImg as $img)
                                <div class="carousel-item" style="heigth: 400px; width:600px">
                                    <img class="d-block w-100" src="{{asset('storage/coursesImg/'.$img->imgRute)}}" alt="Imagen numero  <?php echo $numeroImg; ?>" style="height: 400px; width:600px">
                                </div>
                                <?php $numeroImg+=1; ?>
                            @endforeach 
                          
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <a class="btn btn-secondary mt-5" href="{{route('user.roomDetailsUser',['roomId' => $roomId ])}}">Volver</a>
                </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>
</html>