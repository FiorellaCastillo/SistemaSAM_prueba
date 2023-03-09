@extends('layouts.app')
<link href="../css/styles.css" rel="stylesheet" />


<div id="layoutSidenav_content">
    @section('content')
        <div>
            @if ($errors->any())
                <div class="alert alert-danger"> <strong>Parece que ocurrió un problema al ingresar los datos<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                </div>
            @endif
        </div>
        <div class="container-fluid px-4">
            <div class="card-body">

                <h2>Crear usuario</h2>
                <div class="col-6">
                    <a href={{ route('users.index') }} class="btn btn-outline-danger"><i class="fa fa-angle-left"></i></i>
                        Regresar</a>
                </div>
                <br>
                <form method="POST" action="{{ route('users.store') }}" class="row g-3">
                    @csrf
                    <div class="col-md-4">
                        <label for="identity_doc" class="form-label">Cédula</label>
                        <input name="identity_doc" type="text" class="form-control" id="identity_doc"
                            placeholder="Ingrese su número de cédula" required
                            onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                    </div>
                    <div class="col-md-4">
                        <label for="name" class="form-label">Nombre</label>
                        <input name="name" type="text" class="form-control" id="name"
                            placeholder="Ingrese el nombre del usuario" required
                            onkeypress="return ((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32)">
                    </div>
                    <div class="col-4">
                        <label for="first_lastname" class="form-label">Primero apellido</label>
                        <input name="first_lastname" type="text" class="form-control" id="first_lastname"
                            placeholder="Ingrese el primer apellido del usuario" required
                            onkeypress="return (event.charCode >= 65 && event.charCode <= 122)">
                    </div>
                    <div class="col-4">
                        <label for="second_lastname" class="form-label">Segundo apellido</label>
                        <input name="second_lastname" type="text" class="form-control" id="second_lastname"
                            placeholder="Ingrese el primer segundo del usuario" required
                            onkeypress="return (event.charCode >= 65 && event.charCode <= 122)">
                    </div>
                    <div class="col-md-4">
                        <label for="email_address" class="form-label">Correo</label>
                        <input name="email_address" type="email" class="form-control" id="email_address"
                            placeholder="Ingrese el correo electrónico del usuario" required>
                    </div>


                    <div class="col-md-4">
                        <label for="rol_id" class="form-label">Rol</label>
                        <select name="rol_id" id="rol_id" class="form-select" required>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->description }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="user_location_id" class="form-label">Sede</label>
                        <select name="user_location_id" id="user_location_id" class="form-select" required>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->location_address }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="user_phone_number" class="form-label">Número telefónico</label>
                        <input name="user_phone_number" type="text" class="form-control" id="user_phone_number"
                            placeholder="Ingrese el número telefónico del usuario" required
                            onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                    </div>

                    <div class="col-md-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input name="password" type="password" class="form-control" id="password"
                            placeholder="Ingrese la contraseña del usuario" required>
                    </div>

                    <div class="col-md-4">
                        <label for="password_confirm" class="form-label">Confirmar contraseña</label>
                        <input name="password_confirm" type="password" class="form-control" id="password_confirm"
                            placeholder="Confirme la contraseña del usuario" required>
                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Agregar nuevo
                            usuario</button>
                    </div>





                </form>
               
            </div>
            <script src="js/scripts.js"></script>
        </div>


    @endsection
