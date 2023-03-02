@extends('layouts.app')
<link href="../css/styles.css" rel="stylesheet" />
@section('content')
    <div class="container-fluid px-4">
        <div class="card-body">
            <h2>Crear sede</h2>
            <div class="col-6">
                <a href={{ route('locations.index') }} class="btn btn-outline-danger"><i class="fa fa-angle-left"></i>
                    Regresar</a>
            </div>
            <br>

            <form method="POST" action="{{ route('locations.store') }}" class="row g-3">
                @csrf
                <div class="col-md-4">
                    <label for="location_name_id" class="form-label">Nombre de la empresa</label>
                    <select name="location_name_id" id="location_name_id" class="form-select" required>
                        @foreach ( $companies as $company )
                            <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="location_province_id" class="form-label">Provincia</label>
                    <select name="location_province_id" id="location_province_id" class="form-select" required>
                        @foreach ( $provinces as $province )
                            <option value="{{ $province->id }}">{{ $province->provinces_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="location_phone_number" class="form-label">Número telefónico</label>
                    <input name="location_phone_number" type="text" class="form-control" id="location_phone_number"
                        placeholder="Ingrese el número telefónico de la sede" required
                        onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                </div>

                <div class="col-md-6">
                    <label for="location_address" class="form-label">Direccion exacta de la sede</label>
                    <input name="location_address" type="text" class="form-control" id="location_address"
                        placeholder="Ingrese la dirección de la sede" required>

                </div>



                <div class="col-12">
                    <button type="submit" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Agregar sede</button>
                </div>


            </form>
        </div>
    </div>
@endsection