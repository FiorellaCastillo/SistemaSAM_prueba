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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
