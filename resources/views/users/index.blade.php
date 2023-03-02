@extends('layouts.app')
<div id="layoutSidenav_content">
    @section('content')
        <div class="container-fluid px-4">
            <h1 class="mt-4">Usuarios</h1>
            <a class="btn btn-outline-primary" href="{{ route('users.create') }}"><i class="fa fa-plus"></i> Agregar usuario</a>
            <a class="btn btn-outline-dark" href="{{ route('export_users') }}"><i class="fa fa-download"></i> Exportar a PDF</a>
            <p></p>
            @if (session('create_user'))
                <div class="alert alert-primary">
                    <strong>{{ session('create_user') }}</strong>

                </div>
            @endif
            @if (session('update_user'))
                <div class="alert alert-success">
                    <strong>{{ session('update_user') }}</strong>

                </div>
            @endif
            @if (session('delete_user'))
            <div class="alert alert-danger">
                <strong>{{ session('delete_user') }}</strong>

            </div>
        @endif


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Información de los usuarios
                </div>
                <div class="card-body">
                    <table class="display" style="width: 100%" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Cédula</th>
                                <th>Nombre</th>
                                <th>Primer apellido</th>
                                <th>Segundo apellido</th>
                                <th>Correo electrónico</th>
                                <th>Rol</th>
                                <th>Teléfono</th>
                                <th>Acciones</th>


                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->identity_doc }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->first_lastname }}</td>
                                    <td>{{ $user->second_lastname }}</td>
                                    <td>{{ $user->email_address }}</td>
                                    <td>{{ $user->description }}</td>
                                    <td>{{ $user->user_phone_number }}</td>


                                    <td width="10px" class="btn-group">
                                        <form action="{{ route('users.destroy', $user) }}" class="form_delete"
                                            method="POST">
                                        <a class="btn btn-outline-primary" href="{{ route('users.edit', $user) }}"><i class="fa fa-pencil"></i> Editar</i></a>
                                        
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger" onclick="fun();"><i class="fa fa-trash"></i> Eliminar</button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
   

    <script type="text/javascript">
        function fun() {
            /*delete-confirmation script*/
            $('.form_delete').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: '¿Está seguro que quiere eliminar este usuario?',
                    text: "!No se puede revertir esta acción!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '!Si, eliminar!',
                    cancelButtonText: '!Cancelar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        /*Swal.fire('Deleted!','Your file has been deleted.','success')*/
                        this.submit();
                    }
                })
            });
        }
    </script>
 @endsection