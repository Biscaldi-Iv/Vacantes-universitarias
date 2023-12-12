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
                            <p>{{ $u->privilegio == 1 ? 'Postulante' : ($u->privilegio == 2 ? 'Jefe de Cátedra' : 'Administrador') }}
                            </p>
                        </td>
                        <td>
                            @if ($u->privilegio != 3)
                                <button type="button" class="btn btn-outline-primary"
                                    onclick="location.href='/usuario/perfil/{{ $u->id }}'">
                                    Ver perfil
                                </button>
                            @endif
                        </td>
                        <td>
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-primary"
                                    onclick="editar('{{ $u->id }}','{{ $u->nombre }}','{{ $u->apellido }}','{{ $u->email }}','{{ $u->telefono }}','{{ $u->privilegio }}', '{{ $u->personalUniversidad->fkIdUni ?? 0 }}',
                                '{{ $u->tipodoc }}','{{ $u->ndoc }}','{{ $u->direccion }}', '{{ $u->personalUniversidad->fkIdCatedra ?? 0 }}')"
                                    data-bs-target="#modalU" data-bs-toggle="modal">Editar</button>
                            </div>
                        </td>
                        <td>
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-danger"
                                    onclick="eliminar('{{ $u->id }}','{{ $u->nombre }}','{{ $u->apellido }}','{{ $u->email }}','{{ $u->telefono }}','{{ $u->privilegio }}', '{{ $u->personalUniversidad->fkIdUni ?? 0 }}',
                                '{{ $u->tipodoc }}','{{ $u->ndoc }}','{{ $u->direccion }}', '{{ $u->personalUniversidad->fkIdCatedra ?? 0 }}')"
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
                    <x-user-inputs :universidades=$universidades></x-user-inputs>
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
        const cb = document.getElementById("cambio");

        const Universidades = @json($universidades);

        let catForm = document.getElementById("formCatedras");
        let catSelect = document.getElementById("fkIdCatedra");

        function showCatedras(uni, catedra = undefined) {
            if (document.getElementById('privilegio').value != 2) {
                catForm.hidden = true;
                return;
            }
            catForm.hidden = false;
            //remover opciones
            while (catSelect.options.length > 0) {
                catSelect.remove(0);
            }
            //agregar opciones
            Universidades.find(element => element.idUniversidad == uni).catedras.forEach(cat => {
                let option = document.createElement('option');
                option.value = cat.idCatedra;
                option.text = cat.nombreCatedra;
                catSelect.appendChild(option);
            });
            //seleccionar catedra
            if (catedra) {
                catSelect.value = catedra;
            }
        }

        function checkpass() {
            success.removeAttribute("hidden");
            if (!cb.checked) {
                success.setAttribute("class", "hidden");
                return true;
            }

            if (c1.value.length < 8 || c1.value.length > 16 || c2.value.length < 8 || c2.value.length > 16) {
                success.setAttribute("class", "alert alert-danger");
                success.innerHTML = "La contraseña debe tener entre 8 y 16 caracteres";
                return false;
            }
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
            if (sel.value == 2) {
                document.getElementById("selUni").hidden = false;
            } else {
                document.getElementById("selUni").hidden = true;
            }
        }

        function editar(id, nombre, apellido, email, telefono, privilegio, universidad, tipodoc, ndoc, direccion,
            idCatedra = undefined) {
            document.getElementById('id').value = id;
            document.getElementById('nombre').value = nombre;
            document.getElementById('apellido').value = apellido;
            document.getElementById('email').value = email;
            document.getElementById('telefono').value = telefono;
            document.getElementById('privilegio').selectedIndex = privilegio - 1;
            cambiar(document.getElementById('privilegio'));
            document.getElementById('fkIdUni').value = universidad;
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
            showCatedras(universidad, idCatedra);

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

        function eliminar(id, nombre, apellido, email, telefono, privilegio, universidad, tipodoc, ndoc, direccion,
            idCatedra = undefined) {
            document.getElementById('id').value = id;
            document.getElementById('nombre').value = nombre;
            document.getElementById('apellido').value = apellido;
            document.getElementById('email').value = email;
            document.getElementById('telefono').value = telefono;
            document.getElementById('privilegio').selectedIndex = privilegio - 1;
            cambiar(document.getElementById('privilegio'));
            document.getElementById('fkIdUni').value = universidad;
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
            showCatedras(universidad, idCatedra);

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

        function cambiarContras(b) {
            if (b) {
                document.getElementById('password').removeAttribute("readonly", false);
                document.getElementById('password_confirmacion').removeAttribute("readonly", false);
            } else {
                document.getElementById('password').setAttribute("readonly", "readonly", false);
                document.getElementById('password_confirmacion').setAttribute("readonly", "readonly", false);
            }
            document.getElementById("claves").hidden = !b;
        }
    </script>
@endsection
