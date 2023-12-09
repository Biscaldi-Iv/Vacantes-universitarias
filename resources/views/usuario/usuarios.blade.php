@extends('base')

@section('titulo')
    <title>Usuarios</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb" href="/">Página principal</a>
        /<a class="breadcrumb" href="/admin/usuarios">Usuarios</a>
    </p>
@endsection

@section('contenido')
    <div class="row-4 my-3">
        <button type="button" class="btn btn-primary btn-lg" onclick="location.href='/admin/usuarios/registrar'">
            Registrar usuario
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-striped
    table-hover
    table-borderless
    table-light
    align-middle"
            aria-label="Listado de usuarios">
            <thead class="table-light">
                <caption>Listado de usuarios</caption>
                <tr>
                    <th>Documento</th>
                    <th>Nombre y apellido</th>
                    <th>Contacto</th>
                    <th>Tipo de Usuario</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($usuarios as $u)
                    <tr class="table-light">
                        <td>
                            <p>{{ $u->tipodoc }} {{ $u->ndoc }}</p>
                        </td>
                        <td>
                            <p>{{ $u->nombre }} {{ $u->apellido }} </p>
                        </td>
                        <td>
                            <p>
                                <a href="mailto:{{ $u->email }}">{{ $u->email }}</a> <br>
                                {{ $u->telefono }}
                            </p>
                        </td>
                        <td>
                            <p>{{ $u->privilegio == 1 ? 'Postulante' :( $u->privilegio == 2 ? 'Jefe de Cátedra' : 'Administrador')}} </p>
                        </td>
                        <td>
                            @if ($u->privilegio == 1)
                                <button type="button" class="btn btn-outline-primary" onclick="location.href='/usuario/perfil/{{ $u->id }}'">
                                    Ver perfil
                                </button>
                            @endif
                        </td>
                        <td>
                            <div class="d-grid gap-2">
                                @php
                                    if ($u->privilegio == 2) {
                                        foreach ($pu as $pv) {
                                            if ($pv->fkIdUser == $u->id) {
                                                $idxuni = 0;
                                                foreach ($universidades as $un) {
                                                    if ($pv->fkIdUni == $un->idUniversidad) {
                                                        //$idUni=$un->idUniversidad;
                                                        break;
                                                    }
                                                    $idxuni += 1;
                                                }
                                                break;
                                            }
                                        }
                                    } else {
                                        $idxuni = 0;
                                    }
                                @endphp
                                <button type="button" class="btn btn-primary"
                                    onclick="editar('{{ $u->id }}','{{ $u->nombre }}','{{ $u->apellido }}','{{ $u->email }}','{{ $u->telefono }}','{{ $u->privilegio }}', '{{ $idxuni }}',
                                '{{ $u->tipodoc }}','{{ $u->ndoc }}','{{ $u->direccion }}')"
                                    data-bs-target="#modalU" data-bs-toggle="modal">Editar</button>
                            </div>
                        </td>
                        <td>
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-danger"
                                    onclick="eliminar('{{ $u->id }}','{{ $u->nombre }}','{{ $u->apellido }}','{{ $u->email }}','{{ $u->telefono }}','{{ $u->privilegio }}', '{{ $idxuni }}',
                                '{{ $u->tipodoc }}','{{ $u->ndoc }}','{{ $u->direccion }}')"
                                    data-bs-target="#modalU" data-bs-toggle="modal">Eliminar</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>

    <div class="modal fade" id="modalU" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Informacion del Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar modal"></button>
                </div>
                <form action="/admin/usuarios" id="formU" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-sm-12 p-2" hidden>
                                <label for="id">ID</label>
                                <input type="number" class="form-control" name="id" id="id"
                                    placeholder="id del usuario">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 p-2">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" minlength="2"
                                    placeholder="Primer nombre" required>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" name="apellido" id="apellido" minlength="5"
                                    placeholder="Apellidos" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 p-2">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email"
                                    readonly>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="telefono">Teléfono</label>
                                <input type="number" class="form-control" name="telefono" id="telefono" minlength="7"
                                    placeholder="Teléfono" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 p-2">
                                <label for="privilegio">Privilegio</label>
                                <select name="privilegio" id="privilegio" class="form-select form-select-lg"
                                    onchange="cambiar(this)">
                                    <option value="1" selected>Usuario</option>
                                    <option value="2">Personal universitario</option>
                                    <option value="3">Administrator</option>
                                </select>
                            </div>
                            <div class="col-sm-6 p-2" id="selUni" hidden>
                                <label for="fkIdUni" class="form-label">Universidad</label>
                                <select class="form-select form-select-lg" name="fkIdUni" id="fkIdUni">
                                    @foreach ($universidades as $u)
                                        <option value="{{ $u->idUniversidad }}">{{ $u->nombreUniversidad }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 p-2">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" name="direccion" id="direccion"
                                    minlength="5" placeholder="direccion" required>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="ndoc">Documento</label>
                                <select name="tipodoc" id="tipodoc" class="form-grup-text">
                                    <option value="DNI">DNI</option>
                                    <option value="ID">ID</option>
                                    <option value="LC">LC</option>
                                    <option value="LE">LE</option>
                                    <option value="CI">CI</option>
                                </select>
                                <input type="number" class="form-control" name="ndoc" id="ndoc" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 p-2">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" oninput="checkpass()" name="password"
                                    id="password" placeholder="contraseña" minlength="8" maxlength="16">
                                    <button class="btn" style=" border-color: #ced4da;" type="button" id="togglePassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="password_confirmacion">Confirmar Contraseña</label>
                                <input type="password" class="form-control" oninput="checkpass()"
                                    name="password_confirmacion" id="password_confirmacion" placeholder="contraseña"
                                    minlength="8" maxlength="16">
                                    <button class="btn" style=" border-color: #ced4da;" type="button" id="togglePasswordConfirmation">
                                        <i class="bi bi-eye"></i>
                                    </button>
                            </div>
                        </div>
                        <h6 class="alert alert-success" id="success" hidden></h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="sumbit" id="send" class="btn btn-success">Guardar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        //const danger=document.getElementById("danger");
        const success = document.getElementById("success");
        const c1 = document.getElementById("password");
        const c2 = document.getElementById("password_confirmacion");

        function checkpass() {
            success.removeAttribute("hidden");
            if (c1.value == c2.value) {
                success.setAttribute("class", "alert alert-success");
                success.innerHTML = "Las contraseñas coinciden";
                return true;
            } else {
                success.setAttribute("class", "alert alert-danger");
                success.innerHTML = "Las contraseñas NO coinciden";
                return false;
            }
        }

        var form = document.getElementById("formU");
        form.addEventListener("submit", function(event) {
            if (!checkpass()) {
                //alert("Password mismatch");
                event.preventDefault();
                event.stopPropagation();
            } else if (form.checkValidity() == false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add("was-validated");
            //c2.parentNode.removeChild(c2);
        }, false);


        function cambiar(sel) {
            console.log("cambiar");
            if (sel.value == 2) {
                document.getElementById("selUni").hidden = false;
            } else {
                document.getElementById("selUni").hidden = true;
            }
        }

        function editar(id, nombre, apellido, email, telefono, privilegio, universidad, tipodoc, ndoc, direccion) {
            document.getElementById('id').value = id;
            document.getElementById('nombre').value = nombre;
            document.getElementById('apellido').value = apellido;
            document.getElementById('email').value = email;
            document.getElementById('telefono').value = telefono;
            document.getElementById('privilegio').selectedIndex = privilegio - 1;
            cambiar(document.getElementById('privilegio'));
            document.getElementById('fkIdUni').selectedIndex = universidad;
            switch (tipodoc) {
                case "DNI": {
                    document.getElementById('tipodoc').selectedIndex = 0;
                    break;
                }
                case "ID": {
                    document.getElementById('tipodoc').selectedIndex = 1;
                    break;
                }
                case "LC": {
                    document.getElementById('tipodoc').selectedIndex = 2;
                    break;
                }
                case "LE": {
                    document.getElementById('tipodoc').selectedIndex = 3;
                    break;
                }
                case "CI": {
                    document.getElementById('tipodoc').selectedIndex = 4;
                    break;
                }
            }
            document.getElementById('ndoc').value = ndoc;
            document.getElementById('direccion').value = direccion;
            document.getElementById('password').value = "";
            document.getElementById('password_confirmacion').value = "";

            document.getElementById('nombre').removeAttribute("readonly", false);
            document.getElementById('apellido').removeAttribute("readonly", false);
            //document.getElementById('email').removeAttribute("readonly" , false);
            document.getElementById('telefono').removeAttribute("readonly", false);
            document.getElementById('ndoc').removeAttribute("readonly", false);
            document.getElementById('direccion').removeAttribute("readonly", false);
            document.getElementById('password').removeAttribute("readonly", false);
            document.getElementById('password_confirmacion').removeAttribute("readonly", false);

            document.getElementById('formU').setAttribute('action', '/admin/usuarios/actualizar', false);
            document.getElementById('send').setAttribute('class', 'btn btn-success', false);
            document.getElementById('send').innerHTML = "Guardar";
        }

        function eliminar(id, nombre, apellido, email, telefono, privilegio, universidad, tipodoc, ndoc, direccion) {
            document.getElementById('id').value = id;
            document.getElementById('nombre').value = nombre;
            document.getElementById('apellido').value = apellido;
            document.getElementById('email').value = email;
            document.getElementById('telefono').value = telefono;
            document.getElementById('privilegio').selectedIndex = privilegio - 1;
            cambiar(document.getElementById('privilegio'));
            document.getElementById('fkIdUni').selectedIndex = universidad;
            switch (tipodoc) {
                case "DNI": {
                    document.getElementById('tipodoc').selectedIndex = 0;
                    break;
                }
                case "ID": {
                    document.getElementById('tipodoc').selectedIndex = 1;
                    break;
                }
                case "LC": {
                    document.getElementById('tipodoc').selectedIndex = 2;
                    break;
                }
                case "LE": {
                    document.getElementById('tipodoc').selectedIndex = 3;
                    break;
                }
                case "CI": {
                    document.getElementById('tipodoc').selectedIndex = 4;
                    break;
                }
            }
            document.getElementById('ndoc').value = ndoc;
            document.getElementById('direccion').value = direccion;
            document.getElementById('password').value = "password123";
            document.getElementById('password_confirmacion').value = "password123";

            document.getElementById('id').setAttribute("readonly", "readonly", false);
            document.getElementById('nombre').setAttribute("readonly", "readonly", false);
            document.getElementById('apellido').setAttribute("readonly", "readonly", false);
            document.getElementById('email').setAttribute("readonly", "readonly", false);
            document.getElementById('telefono').setAttribute("readonly", "readonly", false);
            document.getElementById('ndoc').setAttribute("readonly", "readonly", false);
            document.getElementById('direccion').setAttribute("readonly", "readonly", false);
            document.getElementById('password').setAttribute("readonly", "readonly", false);
            document.getElementById('password_confirmacion').setAttribute("readonly", "readonly", false);

            document.getElementById('formU').setAttribute('action', '/admin/usuarios/borrar', false);
            document.getElementById('send').setAttribute('class', 'btn btn-danger', false);
            document.getElementById('send').innerHTML = "Eliminar";
        }

        function togglePasswordVisibility(passwordField, toggleButton) {
            toggleButton.addEventListener('click', function() {
                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);
                this.classList.toggle('password-visible');
            });
        }

        const passwordField = document.getElementById('password');
        const togglePasswordButton = document.getElementById('togglePassword');
        togglePasswordVisibility(passwordField, togglePasswordButton);

        const passwordConfirmField = document.getElementById('password_confirmacion');
        const togglePasswordConfirmButton = document.getElementById('togglePasswordConfirmation');
        togglePasswordVisibility(passwordConfirmField, togglePasswordConfirmButton);

    </script>
@endsection
