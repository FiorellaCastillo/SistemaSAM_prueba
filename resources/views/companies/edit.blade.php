@extends('layouts.app')
<link href="/css/styles.css" rel="stylesheet" />

<div id="layoutSidenav_content">
    @section('content')
      
            <div class="container-fluid px-4">
                <div class="card-body">

                    <h2>Editar empresa</h2>
                    <div class="col-6">
                        <a href={{ route('companies.index') }} class="btn btn-outline-danger"><i class="fa fa-angle-left"></i> Regresar</a>
                    </div>
                    <br>
                    <form method="POST" action="{{ route('companies.update', $company) }}" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        @method ('PUT')
                        <div class="col-md-4">
                            <label for="legal_company_id" class="form-label">Cédula jurídica</label>
                            <input name="legal_company_id" type="text" class="form-control" id="legal_company_id"
                                value="{{$company->legal_company_id}}" required onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                        </div>
                        <div class="col-md-4">
                            <label for="logo" class="form-label">Logo actual</label>
                          
                            <input name="logo" type="file" class="form-control" id="logo">
                            <img src="{{asset ($company->logo)}}" alt="{{$company->name}}" class="img-fluid img-thumbnail" width="180px" alt="{{asset ($company->logo)}}">
                        </div>
                        <div class="col-4">
                            <label for="company_name" class="form-label">Nombre de la empresa</label>
                            <input name="company_name" type="text" class="form-control" id="company_name"
                            value="{{$company->company_name}}">
                        </div>
                        <div class="col-4">
                            <label for="company_email" class="form-label">Correo</label>
                            <input name="company_email" type="email" class="form-control" id="company_email"
                            value="{{$company->company_email}}">
                        </div>
                   
                        <div class="col-12">
                            <button type="submit" class="btn btn-outline-success"><i class="fa fa-rotate"></i> Editar empresa</button>
                        </div>
                    




                    </form>

                </div>
            </div>
        
    @endsection
