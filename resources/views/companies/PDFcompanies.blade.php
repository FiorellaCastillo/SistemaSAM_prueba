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
                    <th>Nombre</th>
                    <th>Correo electrónico</th>

                </tr>
            </thead>


            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->legal_company_id }}</td>
                        {{-- Arreglar logos en PDF --}}
                        {{-- <td>
                            <img src="{{ asset($company->logo) }}" alt="{{ $company->name }}"
                                class="img-fluid img-thumbnail" width="180px">
                        </td> --}}
                        <td>{{ $company->company_name }}</td>
                        <td>{{ $company->company_email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
