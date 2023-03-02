<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <form method="POST" action="{{route('validate_register') }}">
        @csrf
        <div class="form-group">
            <label for="identity_doc">Cedula</label>
            <input name="identity_doc" type="text" class="form-control" id="identity_doc" aria-describedby="identity_doc"
                placeholder="Ingresar cedula">
        </div>

        <div class="mb-3">
            <label for="name">Nombre</label>
            <input  name="name" type="text" class="form-control" id="name" aria-describedby="name"
                placeholder="Ingresar Nombre">
        </div>

        <div class="mb-3">
            <label for="first_lastname">Primero apellido</label>
            <input name="first_lastname" type="text" class="form-control" id="first_lastname" aria-describedby="first_lastname"
                placeholder="Ingresar primer apellido">

        </div>

        <div class="form-group">
            <label for="second_lastname">Segundo apellido</label>
            <input  name="second_lastname" type="text" class="form-control" id="second_lastname" aria-describedby="second_lastname"
                placeholder="Ingresar segundo apellido">
        </div>

        <div class="form-group">
            <label for="email_address">Correo electronico</label>
            <input name="email_address" type="email" class="form-control" id="email_address" aria-describedby="email_address"
                placeholder="Ingresar correo electronico">
        </div>

        <div class="form-group">
            <label for="rol_id">Rol</label>
            <input name="rol_id" type="text" class="form-control" id="rol_id" aria-describedby="rol_id"
                placeholder="Ingresar el rol">
        </div>

        <div class="form-group">
            <label for="user_phone_number">Numero telefonico</label>
            <input name="user_phone_number" type="text" class="form-control" id="user_phone_number"
                aria-describedby="user_phone_number" placeholder="Ingresar numero telefonico">
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input name="password" type="password" class="form-control" id="password" aria-describedby="password"
                placeholder="Ingresar contraseña">
        </div>


        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
