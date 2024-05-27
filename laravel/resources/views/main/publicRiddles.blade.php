<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Nuestros mejores acertijos</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/riddle.css')}}">
    <script src="{{asset('js/riddleDragDrop.js')}}"></script>
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
                    <h1 class="text-white text-center">Ves calentando tu ingenio con estos acertijos</h1>
                    <div class="quiz-wrapper">
                        <p class="question-description">Arrastra las respuestas al acertijo correspondiente</p>
                        <ul class="options">
                            <li class="title">Pregunta</li>
                            <li class="option" data-target="p1">¿Cuánto es 2 + 2?</li>
                            <li class="option" data-target="p2">¿Cuál es la raíz cuadrada de 25?</li>
                            <li class="option" data-target="p3">¿Cuál es el resultado de 5 * 7?</li>
                            <li class="option" data-target="p4">¿Cuánto es 10 - 3?</li>
                        </ul>
                        <div class="answers">
                            <ol>
                                <li><span class="target" data-accept="r1">&nbsp;</span> - 4</li>
                                <li><span class="target" data-accept="r2">&nbsp;</span> - 5</li>
                                <li><span class="target" data-accept="r3">&nbsp;</span> - 35</li>
                                <li><span class="target" data-accept="r4">&nbsp;</span> - 7</li>
                            </ol>
                        </div>
                    </div>
                    
                </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>
</html>