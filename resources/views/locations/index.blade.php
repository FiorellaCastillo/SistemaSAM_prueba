@extends('layouts.app')
<div class="container-fluid px-4">
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Sedes</h1>
        <a class="btn btn-outline-primary" href="{{ route('locations.create') }}"><i class="fa fa-plus"></i> Agregar
        sede</a>
        <p></p>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Información de las sedes
            </div>
            <div class="card-body">
                <table class="display" style="width: 100%" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Cédula jurídica</th>
                            <th>Nombre de la empresa</th>
                            <th>Provincia</th>
                            <th>Direeción de la sede</th>
                            <th>Número de teléfono de la sede</th>
                            <th>Acciones</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($locations as $locations)
                        <tr>
                            <td>{{ $locations->legal_company_id }}</td>
                            <td>{{ $locations->company_name }}</td>
                            <td>{{ $locations->provinces_name }}</td>
                            <td>{{ $locations->location_address }}</td>
                            <td>{{ $locations->location_phone_number }}</td>
                            <td>
                                <form action="#"
                                    method="POST">
                                    <a class="btn btn-outline-primary" href="#"><i
                                            class="fa fa-pencil"></i> Editar</i></a>
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger" onclick="fun();"><i
                                            class="fa fa-trash"></i> Eliminar</button>
                                </form>
                            </td>
                        </tr>


                        </tr>
                        @endforeach

                    </tbody>
                </table>


            </div>


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js%22%3E"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9%22%3E"></script>
@endsection