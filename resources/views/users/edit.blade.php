@extends('layouts.app')
<link href="/../css/styles.css" rel="stylesheet" />

<div id="layoutSidenav_content">
    @section('content')

        <div class="container-fluid px-4">

            <div class="card-body">

                <h2>Editar usuario</h2>
                <div class="col-6">
                    <a href={{ route('users.index') }} class="btn btn-outline-danger"><i class="fa fa-angle-left"></i></i> Regresar</a>
                </div>
                <br>


                <form method="POST" action="{{ route('users.update', $user) }}" class="row g-3">
                    @csrf 
                    @method('PUT')

                    <div class="col-md-4">
                        <label for="identity_doc" class="form-label">Cédula</label>
                        <input name="identity_doc" type="text" class="form-control" id="identity_doc"
                            value="{{ $user->identity_doc }}" maxlength="9">
                    </div>
                    <div class="col-md-4">
                        <label for="name" class="form-label">Nombre</label>
                        <input name="name" type="text" class="form-control" id="name"
                            value="{{ $user->name }}" onkeypress="return ((event.charCode >= 65 && event.charCode <= 122) || event.charCode == 32)">
                    </div>
                    <div class="col-4">
                        <label for="first_lastname" class="form-label">Primero apellido</label>
                        <input name="first_lastname" type="text" class="form-control" id="first_lastname"
                            value="{{ $user->first_lastname }}" onkeypress="return (event.charCode >= 65 && event.charCode <= 122)">
                    </div>
                    <div class="col-4">
                        <label for="second_lastname" class="form-label">Segundo apellido</label>
                        <input name="second_lastname" type="text" class="form-control" id="second_lastname"
                            value="{{ $user->second_lastname }}" onkeypress="return (event.charCode >= 65 && event.charCode <= 122)">
                    </div>
                    <div class="col-md-4">
                        <label for="email_address" class="form-label">Correo</label>
                        <input name="email_address" type="email" class="form-control" id="email_address"
                            value="{{ $user->email_address }}">
                    </div>


                    <div class="col-md-4">
                        <label for="rol_id" class="form-label">Rol</label>
                        <select name="rol_id" id="rol_id" class="form-select">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->description }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="user_phone_number" class="form-label">Número telefónico</label>
                        <input name="user_phone_number" type="text" class="form-control" id="user_phone_number"
                            value="{{ $user->user_phone_number }}" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                    </div>



                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-success"><i class="fa fa-rotate"></i> Editar usuario</button>
                    </div>
                    




                </form>
            </div>



        </div>

        @endsection
