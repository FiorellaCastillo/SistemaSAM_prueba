@extends('layouts.app')
<div class="container-fluid px-4">
    @section('content')
        <div class="container-fluid px-4">
            <h1 class="mt-4">Empresas</h1>
            <a class="btn btn-outline-primary" href="{{ route('companies.create') }}"><i class="fa fa-plus"></i> Agregar
                empresa</a>
                <a class="btn btn-outline-success" href="{{ route('locations.index') }}"><i class="fa fa-building"></i> Sedes</a>
                
            <a class="btn btn-outline-dark" href="{{ route('export_companies') }}"><i class="fa fa-download"></i> Exportar a
                PDF</a>
                
            <p></p>
            @if (session('create_company'))
                <div class="alert alert-primary">
                    <strong>{{ session('create_company') }}</strong>

                </div>
            @endif
            @if (session('update_company'))
                <div class="alert alert-success">
                    <strong>{{ session('update_company') }}</strong>

                </div>
            @endif
            @if (session('delete_company'))
                <div class="alert alert-danger">
                    <strong>{{ session('delete_company') }}</strong>

                </div>
            @endif

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Información de empresas
                </div>
                <div class="card-body">
                    <table class="display" style="width: 100%" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Cédula jurídica</th>
                                <th>Logo</th>
                                <th>Nombre</th>
                                <th>Correo electrónico</th>
                                <th>Acciones</th>


                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{ $company->legal_company_id }}</td>
                                    <td>
                                        <img src="{{ asset($company->logo) }}" alt="{{ $company->name }}"
                                            class="img-fluid img-thumbnail" width="180px">
                                    </td>
                                    <td>{{ $company->company_name }}</td>
                                    <td>{{ $company->company_email }}</td>
                                    <td>
                                        <form action="{{ route('companies.destroy', $company) }}" class="form_delete"
                                            method="POST">
                                            <a class="btn btn-outline-primary"
                                                href="{{ route('companies.edit', $company) }}"><i class="fa fa-pencil"></i>
                                                Editar</a>
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger" onclick="fun();"><i
                                                    class="fa fa-trash"></i> Eliminar</button>
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
                        title: '¿Está seguro que quiere eliminar esta empresa?',
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
