@extends('layouts.app')
<link href="../css/styles.css" rel="stylesheet" />

<div id="layoutSidenav_content">
</div>
@section('content')
    <div class="container-fluid px-4">
        <div class="card-body">

            <h2>Crear empresa</h2>
            <div class="col-6">
                <a href={{ route('companies.index') }} class="btn btn-outline-danger"><i class="fa fa-angle-left"></i></i> Regresar</a>
            </div>
            <br>
            <form method="POST" action="{{ route('companies.store') }}" class="row g-3" enctype="multipart/form-data">
                @csrf
                <div class="col-md-4">
                    <label for="legal_company_id" class="form-label">Cédula jurídica</label>
                    <input name="legal_company_id" type="text" class="form-control" id="legal_company_id"
                        placeholder="Ingrese la cédula jurídica de la empresa" required
                        onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                </div>
                <div class="col-md-4">
                    <label for="logo" class="form-label">Logo</label>
                    <input name="logo" type="file" class="form-control" id="logo" required>
                </div>
                <div class="col-4">
                    <label for="company_name" class="form-label">Nombre de la empresa</label>
                    <input name="company_name" type="text" class="form-control" id="company_name"
                        placeholder="Ingrese el nombre de la empresa" required
                        onkeypress="return (event.charCode >= 65 && event.charCode <= 122 && event.charCode=0)">
                </div>
                <div class="col-4">
                    <label for="company_email" class="form-label">Correo</label>
                    <input name="company_email" type="email" class="form-control" id="company_email"
                        placeholder="Ingrese el correo electrónico de la empresa" required>
                </div>




                <div class="col-12">
                    <button type="submit" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Agregar nueva empresa</button>
                </div>
            




            </form>

        </div>
    </div>
@endsection
