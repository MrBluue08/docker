<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Admin Login</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card border rounded-3 p-4">
                    <h3 class="mb-4">Admin Login</h3>
                    <form action="{{route('admin.login.auth')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="id" class="form-label">Email:</label>
                            @if($error=='mail')
                                <input type="email" class="form-control is-invalid" id="mail" name="mail">
                                <div class='invalid-feedback'>
                                    Usuario inexistente o desactivado
                                </div>
                            @else
                                <input type="email" class="form-control" id="mail" name="mail">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="passwd" class="form-label">Password:</label>
                            @if($error=='passwd')
                                <input type="password" class="form-control is-invalid" id="passwd" name="passwd">
                                <div class='invalid-feedback'>
                                    Contraseña incorrecta
                                </div>
                            @else
                                <input type="password" class="form-control" id="passwd" name="passwd">
                               
                            @endif
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
