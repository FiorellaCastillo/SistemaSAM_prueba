<!doctype html>
<html lang="en">

<head>
    <title>Iniciar sesión</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">

            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    
                        <div class="login-wrap p-4 p-md-5">
                            <div class="text-center">
                            <img src="images/monteCristo.png" alt="" height="60" class="mx-auto">
                        </div>
                        <br>
                        <h3 class="text-center mb-4">Iniciar sesión</h3>
                        <h6 class="text-center mb-2">Sistema SAM</h6>
                        <br>
                        {{-- @foreach($errors->all() as $error){{$error}} @endforeach --}}
                        <form method="POST" action="{{route('login')}}" class="login-form">
                            @csrf
                            <div class="form-group">
                                <input name="email_address" type="email" class="form-control rounded-left @error('email_address') is-invalid @enderror" 
                                 placeholder="Correo electrónico"
                                    required>
                                
                                @error('email_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               
                                @enderror

                            </div>
                            <div class="form-group d-flex">
                                <input name="password" type="password" class="form-control rounded-left @error('password') is-invalid @enderror" placeholder="Contraseña" required>

                                    @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror

                            </div>
                            <div class="form-group">
                                <button type="submit"
                                    class="form-control btn btn-primary rounded submit px-3">Ingresar</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Recordar correo electrónico
                                        <input name="remember" type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="{{route('forgotPassword')}}">Olvidó la contraseña?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
