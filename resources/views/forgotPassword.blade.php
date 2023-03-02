<!doctype html>
<html lang="en">

<head>
    <title>Recuperar contraseña</title>
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
                        <h3 class="text-center mb-4">Recuperar contraseña</h3>
                        <h6 class="text-center mb-2">Sistema SAM</h6>
                        <br>
                        <p style="text-align:justify;">En caso de que haya olvidado su contraseña, digite el correo electrónico registrado en la base de datos. Las instrucciones de recuperación 
                            de contraseña se enviarán al correo ingresado.</p>

                        <form method="POST" action="" class="login-form">
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
                            
                            <div class="form-group">
                                <button type="submit" a href="{{route('login')}}"
                                    class="form-control btn btn-primary rounded submit px-3">Enviar link para recuperar contraseña</button></a>
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
